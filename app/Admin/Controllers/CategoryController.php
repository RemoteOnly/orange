<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Widgets\Box;
use Encore\Admin\Widgets\Table;
use Illuminate\Http\Request;
use Encore\Admin\Form;
use Illuminate\Support\Collection;
use Illuminate\Support\MessageBag;

class CategoryController extends BaseController
{
    //use ModelForm;
    //菜单下来选择
    protected function cate_drop_select($is_arr = true)
    {
        $cates = Category::getNestedList('name', 'cate_id', '　　');
        $keys = array_keys($cates);
        array_unshift($keys, 0);
        $values = array_values($cates);
        array_unshift($values, '----请选择----');
        $cates = array_combine($keys, $values);
        array_walk($cates, function (&$v, $k) {
            $v = str_replace_last('　', ' |——', $v);
        });
        return $cates;
    }

    protected function grid()
    {
        return Admin::grid(Category::class, function (Grid $grid) {
            $grid->model()->collection(function (){
                $cates = Category::all();
                //ajax查询处理
                if(isset($_REQUEST['name'])){
                    $cate_after_filtered = $cates->filter(function($item){
                        return str_contains(strtolower($item->name), strtolower($_REQUEST['name']));
                    });
                    return $cate_after_filtered;
                }

                //获取已分好组的分类
                $cates_nest = Category::getNestedList('name', 'cate_id', '　　');
                array_walk($cates_nest, function (&$v, $k) {
                    $v = str_replace_last('　', ' |——', $v);
                });
                $data = collect();
                foreach ($cates_nest as $cate_id => $name) {
                    $data->push($cates->find($cate_id)->setAttribute('name', $name));
                }
                return $data;
            });

            $grid->order('排序')->sortable();
            $grid->name('分类名');
            $grid->price_range('价格区间');

            $grid->description('描述')->limit(20);
            $grid->keywords('关键字');
            $grid->is_nav('导航?')->value(function ($is_nav) {
                return $is_nav ? "<i class='fa fa-check' style='color:green'></i>" :
                    "<i class='fa fa-close' style='color:red'></i>";
            });
            $grid->is_show('显示?')->value(function ($is_show) {
                return $is_show ? "<i class='fa fa-check' style='color:green'></i>" :
                    "<i class='fa fa-close' style='color:red'></i>";
            });
            $grid->url('url')->limit(20);;
            //$grid->updated_at('更新时间');
            $grid->deleted_at('状态')->value(function ($deleted_at) {
                return $deleted_at ? "<i class='fa fa-close' style='color:red'></i>" :
                    "<i class='fa fa-check' style='color:green'></i>";
            });

            $grid->filter(function ($filter) {
                $filter->disableIdFilter();
                $filter->like('name', '分类名');
            });
            $grid->disableBatchDeletion();
        });
    }

    protected function form()
    {
        $cates = $this->cate_drop_select();
        return Admin::form(Category::class, function (Form $form) use ($cates) {
            $form->display('cate_id', 'ID');
            $form->text('name', '分类名');
            $form->select('parent_id', '父分类')->options($cates);
            $form->radio('is_show', '是否显示')->options([0 => '不显示', 1 => '显示'])->default(1);
            $form->radio('is_nav', '是否是导航项')->options([0 => '否', 1 => '是'])->default(1);
            $form->textarea('price_range', '价格区间')->help('每行代表一个价格区');
            $form->url('url', '路径')->value('https://');
            $form->textarea('description', '描述');
            $form->text('keywords', '关键字')->help('用逗号隔开');

            $form->number('order', '排序');
            $form->display('created_at');
            $form->display('updated_at');
        });
    }

    //get 首页
    public function index()
    {
        /*$cates = [
            ['cate_id' => 1, 'name' => 'TV & Home Theather', "price_range" => "0-100,100-300,300-400",
                "description" => "Repudiandae enim ut eaque et nihil.",
                "keywords" => "delectus",
                "is_show" => "1",
                "is_nav" => "1",
                "url" => "http://hayes.com/dicta-ex-quisquam-sunt-porro-sit-voluptas.html",
                "order" => "9"],
            ['cate_id' => 2, 'name' => 'Tablets & E-Readers', "price_range" => "0-100,100-300,300-400",
                "description" => "Repudiandae enim ut eaque et nihil.",
                "keywords" => "delectus",
                "is_show" => "1",
                "is_nav" => "1",
                "url" => "http://hayes.com/dicta-ex-quisquam-sunt-porro-sit-voluptas.html",
                "order" => "9"],
            ['cate_id' => 3, 'name' => 'Computers', "price_range" => "0-100,100-300,300-400",
                "description" => "Repudiandae enim ut eaque et nihil.",
                "keywords" => "delectus",
                "is_show" => "1",
                "is_nav" => "1",
                "url" => "http://hayes.com/dicta-ex-quisquam-sunt-porro-sit-voluptas.html",
                "order" => "9", 'children' => [
                ['cate_id' => 4, 'name' => 'Laptops', "price_range" => "0-100,100-300,300-400",
                    "description" => "Repudiandae enim ut eaque et nihil.",
                    "keywords" => "delectus",
                    "is_show" => "1",
                    "is_nav" => "1",
                    "url" => "http://hayes.com/dicta-ex-quisquam-sunt-porro-sit-voluptas.html",
                    "order" => "9", 'children' => [
                    ['cate_id' => 5, 'name' => 'PC Laptops', "price_range" => "0-100,100-300,300-400",
                        "description" => "Repudiandae enim ut eaque et nihil.",
                        "keywords" => "delectus",
                        "is_show" => "1",
                        "is_nav" => "1",
                        "url" => "http://hayes.com/dicta-ex-quisquam-sunt-porro-sit-voluptas.html",
                        "order" => "9"],
                    ['cate_id' => 6, 'name' => 'Macbooks (Air/Pro)', "price_range" => "0-100,100-300,300-400",
                        "description" => "Repudiandae enim ut eaque et nihil.",
                        "keywords" => "delectus",
                        "is_show" => "1",
                        "is_nav" => "1",
                        "url" => "http://hayes.com/dicta-ex-quisquam-sunt-porro-sit-voluptas.html",
                        "order" => "9"]
                ]],
                ['cate_id' => 7, 'name' => 'Desktops', "price_range" => "0-100,100-300,300-400",
                    "description" => "Repudiandae enim ut eaque et nihil.",
                    "keywords" => "delectus",
                    "is_show" => "1",
                    "is_nav" => "1",
                    "url" => "http://hayes.com/dicta-ex-quisquam-sunt-porro-sit-voluptas.html",
                    "order" => "9"],
                ['cate_id' => 8, 'name' => 'Monitors', "price_range" => "0-100,100-300,300-400",
                    "description" => "Repudiandae enim ut eaque et nihil.",
                    "keywords" => "delectus",
                    "is_show" => "1",
                    "is_nav" => "1",
                    "url" => "http://hayes.com/dicta-ex-quisquam-sunt-porro-sit-voluptas.html",
                    "order" => "9"]
            ]],
            ['cate_id' => 9, 'name' => 'Cell Phones', "price_range" => "0-100,100-300,300-400",
                "description" => "Repudiandae enim ut eaque et nihil.",
                "keywords" => "delectus",
                "is_show" => "1",
                "is_nav" => "1",
                "url" => "http://hayes.com/dicta-ex-quisquam-sunt-porro-sit-voluptas.html",
                "order" => "9"]
        ];*/
        //Category::buildTree($cates);

        return $this->_render($this->grid());
    }

    //get 显示编辑
    public function edit($id)
    {
        return $this->_render($this->form()->edit($id));
    }

    public function create(Request $request)
    {
        return $this->_render($this->form());
    }

    public function show($id)
    {
        return $this->edit($id);
    }

    //post 更新
    public function update(Request $request, $cate_id)
    {
        $data = $request->except(['parent_id']);
        $parent_id = $request->get('parent_id');
        //dd($cate_id);
        $current_node = Category::find($cate_id);
        //判断是否父节点发生变化
        $change_parent = false;
        if ($parent_id != $current_node->parent_id) {
            $change_parent = true;
        }
        $current_node->save($data);
        if ($change_parent) {
            if ($parent_id == 0) {
                $current_node->makeRoot();
            } else {
                $current_node->makeChildOf(Category::find($parent_id));
            }
        }
        $success = new MessageBag([
            'title' => trans('admin::lang.succeeded'),
            'message' => trans('admin::lang.update_succeeded'),
        ]);

        return redirect('admin/category')->with(compact('success'));
    }

    public function destroy($id)
    {
        if ($this->form()->destroy($id)) {
            return response()->json([
                'status' => true,
                'message' => trans('admin::lang.delete_succeeded'),
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => trans('admin::lang.delete_failed'),
            ]);
        }
    }

    //get 删除
    public function delete($cate_id)
    {
        $current_cate = Category::find($cate_id);
        $nodes_delete = $current_cate->getDescendantsAndSelf();

        Category::destroy($cate_id);
    }

    //post 新增
    public function store(Request $request)
    {
        $data = $request->all();
        if ($data['parent_id'] == 0) {
            $data['parent_id'] = null;
            Category::create($data);//创建父节点
        } else {
            Category::find($data['parent_id'])->children()->create($data);//创建子节点
        }

        $success = new MessageBag([
            'title' => trans('admin::lang.succeeded'),
            'message' => trans('admin::lang.save_succeeded'),
        ]);

        return redirect()->back()->with(compact('success'));
        //return $this->form()->store();
    }
    //delete 删除


}