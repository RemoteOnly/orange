<?php

namespace App\Admin\Controllers;

use App\Admin\Extensions\Tool\CreateAttrValue;
use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\AttributeValue;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Grid;
use Encore\Admin\Form;
use Encore\Admin\Layout\Content;
use Encore\Admin\Widgets\Box;
use Encore\Admin\Widgets\Form as Form_Create;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class AttributeValueController extends BaseController
{
    use ModelForm;

    protected function grid()
    {
        return Admin::grid(AttributeValue::class, function (Grid $grid) {
            if (isset($_REQUEST['attr_id'])) {
                $grid->model()->collection(function () {
                    return AttributeValue::where('attr_id', $_REQUEST['attr_id'])->get();
                });
            }
            $grid->order('排序')->editable()->sortable();
            $grid->attr_value('属性值')->editable();
            $grid->created_at('创建时间');
            $grid->updated_at('更新时间');

            $grid->filter(function ($filter) {
                $filter->disableIdFilter();
                $filter->like('attr_value', '属性值');
            });

            //$grid->disableActions()
            $grid->disableCreation();
            $grid->disableBatchDeletion();
            $grid->tools(function ($tools) {
                $tools->append(new CreateAttrValue());
            });

        });
    }

    //返回一个form
    protected function form()
    {
        $pat_info = explode('/',\Request::getPathInfo());
        $attr_value_id = array_last($pat_info,function($value, $key){
            if(is_numeric($value)){
                return $value;
            }
        });

        $show_type = AttributeValue::find($attr_value_id)->attribute()->get()->first()->show_type;

        return Admin::form(AttributeValue::class, function (Form $form) use ($show_type) {
            $form->display('attr_value_id', 'ID');
            switch ($show_type){
                case 1:
                    $form->color('attr_value','属性值');
                    break;
                case 2:
                    $form->image('attr_value','属性值')->disk('admin')->uniqueName();
                    break;
                default:
                    $form->text('attr_value','属性值');
                    break;
            }
            $form->number('order', '排序');
            $form->display('created_at');
            $form->display('updated_at');
        });
    }

    public function index()
    {
        $title = '';
        if (isset($_REQUEST['attr_id'])) {
            $title = Attribute::select('name')->find($_REQUEST['attr_id'])->name;
        }
        return $this->_render($this->grid(), $title);
    }

    //get 更新
    public function edit($attr_value_id)
    {
        return $this->_render($this->form()->edit($attr_value_id), '属性值编辑');
    }

    //get 新建
    public function create()
    {
        return Admin::content(function (Content $content) {
            if (!\Request::has('attr_id')) {
                $fail = new MessageBag([
                    'title' => trans('admin::lang.failed'),
                    'message' => '请从属性页面进入...',
                ]);
                return redirect('admin/attribute_value')->with(compact('fail'));
            }
            $form = new Form_Create(['attr_value' => '#ccc', 'order' => '0']);
            $attr_id = \Request::get('attr_id');
            $attr = Attribute::find($attr_id);
            $attr_name = $attr->name;
            $show_type = $attr->show_type;
            switch ($show_type) {
                case 1:
                    $form->color('attr_value', '属性值');
                    break;
                case 2:
                    $form->image('attr_value', '属性值');
                    break;
                default:
                    $form->text('attr_value', '属性值');
                    break;
            }
            $form->number('order');
            $form->hidden('attr_id')->default($attr_id);
            $form->action(route('attribute_value.add'));
            $content->row("<div class='btn-group'><a href='javascript:window.history.back()' class='btn btn-primary'>返回</a></div>");
            $content->row(new Box('表单', $form));
        });
    }


    //post 新增
    public function add(Request $request)
    {
        $attr_value = AttributeValue::create($request->all());
        if ($attr_value) {
            $success = new MessageBag([
                'title' => trans('admin::lang.succeeded'),
                'message' => trans('admin::lang.save_succeeded'),
            ]);
            return redirect()->route('attribute_value.index', ['attr_id' => $request->get('attr_id')])->with(compact('success'));
        } else {
            $fail = new MessageBag([
                'title' => trans('admin::lang.failed'),
                'message' => trans('admin::lang.failed'),
            ]);
            return back()->withInput()->with(compact('fail'));
        }
    }
}
