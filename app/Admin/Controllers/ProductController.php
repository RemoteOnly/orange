<?php

namespace App\Admin\Controllers;

use App\Models\Product;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Layout\Content;
use Encore\Admin\Grid;

class ProductController extends BaseController
{
    use ModelForm;

    public function index()
    {
        return Admin::content(function (Content $content) {
            $content->header('商品管理');
            $content->description('设置商品属性');
            $content->body($this->index_grid());
        });
    }

    protected function index_grid()
    {
        return Admin::grid(Product::class, function (Grid $grid) {
            $grid->pid('ID')->sortable();
            $grid->created_at();
            $grid->updated_at();
        });
    }
}
