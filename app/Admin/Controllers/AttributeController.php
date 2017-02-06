<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Category;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Widgets\Table;

class AttributeController extends BaseController
{
    use ModelForm;

    //返回一个grid
    protected function grid()
    {
        return Admin::grid(Attribute::class, function (Grid $grid) {
            $grid->order('排序')->editable()->sortable();
            $grid->name('属性名')->editable();

            $grid->column('expand_attr', '属性值')->expand_attr(function () {

                $attr_values = Attribute::find($this->attr_id)->attribute_values()
                    ->getQuery()
                    ->orderBy('order')
                    ->get(['attr_value'])
                    ->toArray();

                $attr_values = array_pluck($attr_values, 'attr_value');

                switch ($this->show_type) {
                    //css 块
                    case 1:
                        foreach ($attr_values as $key => $attr_value) {
                            $attr_values[$key] = "<label class='label' style='color:white;background-color: $attr_value'> &nbsp;$attr_value&nbsp; </label> &nbsp;";
                        }
                        break;
                    //图片
                    case 2:
                        foreach ($attr_values as $key => $attr_value) {
                            $attr_values[$key] = "<img style='width: 40px;height: 30px' src='$attr_value' /> &nbsp;";
                        }
                        break;
                    //文字
                    case 0:
                    default:
                        foreach ($attr_values as $key => $attr_value) {
                            $attr_values[$key] = " <label class='label label-primary'> $attr_value </label> &nbsp; ";
                        }
                        break;
                }

                return join(' ', $attr_values);
                //return new Table(['属性值'], $attr_values);

            }, '查看');

            $grid->is_filter('筛选属性?')->switch(['on' => ['text' => '是'], 'off' => ['text' => '否']]);
            $grid->show_type('展示类型')->display(function ($show_type) {
                switch ($show_type) {
                    case 1:
                        $value = "<label class='bg-primary'>&nbsp;&nbsp; css 块&nbsp;&nbsp; </label> ";
                        break;
                    case 2:
                        $value = "<i class='fa fa-image' style='color: #3c8dbc'> 图片</i>";
                        break;
                    default:
                        $value = "<i class='fa fa-font'> 文字</i>";
                }
                return $value;
            });
            //$grid->state('状态')->radio([1 => '开启', 0 => '关闭']);
            $grid->state('状态')->switch();


            $grid->updated_at('更新时间');
            $grid->created_at('创建时间');

            $grid->filter(function ($filter) {
                $filter->disableIdFilter();
                $filter->like('name', '属性名');
            });
        });
    }

//返回一个form
    protected
    function form()
    {
        return Admin::form(Attribute::class, function (Form $form) {
            $form->display('attr_id', 'ID');
            $form->text('name', '属性名');
            $form->switch('is_filter', '筛选属性?')->default(1)->states(['on' => ['text' => '是'], 'off' => ['text' => '否']]);
            $form->radio('show_type', '展示类型')->options([0 => '文字', 1 => 'css块', 2 => '图片'])->default(0);
            $form->switch('state', '状态')->default(1);
            $form->number('order', '排序');


            $form->display('created_at');
            $form->display('updated_at');
        });
    }


    public
    function index()
    {
        return $this->_render($this->grid(), '属性列表');
    }

//get 编辑
    public
    function edit($attr_id)
    {
        return $this->_render($this->form()->edit($attr_id), '编辑属性');
    }

//get 新增
    protected
    function create()
    {
        return $this->_render($this->form(), '新增属性');
    }

}
