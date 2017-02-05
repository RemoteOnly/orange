<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Baum\Node as Node;
use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use phpDocumentor\Reflection\Types\Self_;
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
 * @property-read \Baum\Extensions\Eloquent\Collection|\App\Models\Category[] $cate_children
 * @property-read \App\Models\Category $cate_parent
 * @property-read \Baum\Extensions\Eloquent\Collection|\App\Models\Category[] $children
 * @property-read \App\Models\Category $parent
 * @method static \Illuminate\Database\Query\Builder|\Baum\Node limitDepth($limit)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereCateId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereDepth($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereIsNav($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereIsShow($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereKeywords($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereLft($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereOrder($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereParentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category wherePriceRange($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereRgt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereState($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\Baum\Node withoutNode($node)
 * @method static \Illuminate\Database\Query\Builder|\Baum\Node withoutRoot()
 * @method static \Illuminate\Database\Query\Builder|\Baum\Node withoutSelf()
 * @mixin \Eloquent
 */
class Category extends Node
{
    //
    protected $primaryKey = 'cate_id';
    protected $orderColumn = 'order';


    //关联模型
    public function cate_children()
    {
        return $this->hasMany(Category::class, 'cate_id', 'parent_id');
    }

    public function cate_parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'cate_id');
    }

   public static function unlimited_cates($cates, $parent_id = 0){
       $arr = collect();
       foreach ($cates as $cate) {
           if($cate->parent_id == $parent_id){
                $arr->push($cate);
                $arr = $arr->merge(self::unlimited_cates($cates, $cate->cate_id));
           }
        }
        return $arr;
   }
}
