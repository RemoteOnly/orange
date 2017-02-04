<?php

namespace App\Admin\Controllers;

use App\Models\Brand;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Grid;
use Encore\Admin\Form;
use Illuminate\Http\Request;
use Encore\Admin\Facades\Admin;

class BrandController extends BaseController
{
    use ModelForm;

    //返回一个grid
    protected function grid()
    {
        return Admin::grid(Brand::class, function (Grid $grid) {
            $grid->order('排序')->editable()->sortable();
            $grid->name('品牌名')->editable();
            $grid->logo_path('logo')->image('', 60, 60);
            $grid->description('描述')->limit(30);
            $grid->created_at('创建时间');
            $grid->updated_at('更新时间');
            $grid->deleted_at('状态')->value(function ($deleted_at) {
                return $deleted_at ? "<i class='fa fa-close' style='color:red'></i>" :
                    "<i class='fa fa-check' style='color:green'></i>";
            });

            $grid->getFilter()->disableIdFilter();
            $grid->filter(function ($filter) {
                $filter->like('name', '品牌名');
            });
        });
    }

    //返回一个form
    protected function form()
    {
        return Admin::form(Brand::class, function (Form $form) {
            $form->display('brand_id', 'ID');
            $form->text('name', '品牌名');
            $form->image('logo_path', 'logo')->uniqueName();
            $form->textarea('description', '描述');
            $form->number('order', '排序');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }

    //get 首页
    public function index()
    {
        return $this->_render($this->grid(), '品牌管理');
    }

    //get 新增
    public function create()
    {
        return $this->_render($this->form(), '新增品牌');
    }

    //get 编辑更新页
    public function edit(Request $request, $id)
    {
        return $this->_render($this->form()->edit($id), '编辑品牌');
    }

    //put 更新 ModelForm已集成
    //delete 删除 ModelForm已集成
}
