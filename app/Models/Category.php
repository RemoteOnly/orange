<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Baum\Node as Node;
use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use PhpParser\Node\Expr\AssignOp\Mod;

/**
 * App\Models\Category
 *
 * @property int $cate_id
 * @property int $parent_id
 * @property int $lft
 * @property int $rgt
 * @property int $depth
 * @property string $name 分类名称
 * @property string $price_range 价格区间,用换行分割
 * @property string $description 分类描述
 * @property string $keywords 分类关键字
 * @property int $is_show 是否显示
 * @property int $is_nav 显示在导航栏
 * @property string $url 自定义链接
 * @property bool $state 状态
 * @property int $order 排序
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @mixin \Eloquent
 */
class Category extends Node
{
    //
    protected $table = 'categories';
    protected $primaryKey = 'cate_id';
    protected $orderColumn = 'order';
   // protected $fillable =['name','$price_range','description','keywords','is_show','is_nav','state','order','url'];

    //获取select下拉分类
    /*
    |-------------------------------------------------------------------------------
    | 获取所有分类的递进式select option
    |-------------------------------------------------------------------------------
    */
    public static function cat_select()
    {
        $str = '<option value="">请选择</option>';
        $roots = Category::roots()->get();

        foreach ($roots as $root) {
            $child_str = Category::cat_child($root);
            $str .= '<option value="' . $root->cate_id . '">' . $root->name . '</option>'
                . $child_str;
        }
        return $str;
    }


    /*
    |-------------------------------------------------------------------------------
    | 获取子节点option
    |-------------------------------------------------------------------------------
    */
    public static function cat_child($node)
    {
        $str = '';
        foreach ($node->children()->get() as $item) {

            //获取间距
            $padding = '';
            for ($i = 0; $i < $item->depth; $i++) {

                $padding .= '&nbsp;&nbsp;&nbsp;&nbsp;';
            }
            $child_str = Category::cat_child($item);
            $str .= '<option value="' . $item->cate_id . '">' . $padding . $item->name . '</option>'
                . $child_str;
        }
        return $str;
    }


    //关联模型
    public function cate_children()
    {
        return $this->hasMany(Category::class, 'cate_id','parent_id');
    }

    public function cate_parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'cate_id');
    }
}
