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
 * @property string $name
 * @property string $price_range 价格范围 用,分割区间
 * @property int $parent_id 父id
 * @property bool $layer 级别
 * @property bool $has_child 是否有子节点
 * @property string $path 路径
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereCateId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category wherePriceRange($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereParentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereLayer($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereHasChild($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category wherePath($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereDeletedAt($value)
 * @mixin \Eloquent
 */
class Category extends Node
{
    //
    protected $table = 'categories';
    protected $primaryKey = 'cate_id';
    protected $orderColumn = 'order';

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
