<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Product
 *
 * @property int $pid
 * @property string $name
 * @property int $cate_id 分类id
 * @property string $brand_id 品牌id
 * @property int $order 排序
 * @property int $weight 重量,g为单位
 * @property int $stock 库存量
 * @property float $cost_price 进价
 * @property float $market_price 市场价
 * @property float $shop_price 本店售价
 * @property bool $state 状态 0-禁卖 1-开卖
 * @property bool $is_best 是否是精品
 * @property bool $is_hot 是否是热销
 * @property bool $is_new 是否是新品
 * @property bool $is_free_shipping 是否免邮
 * @property bool $is_on_sale 是否上架
 * @property string $on_time 上架时间
 * @property string $description 描述
 * @property string $keywords 关键字
 * @property int $sale_count 销售数量
 * @property int $visit_count 访问数量
 * @property int $review_count 评论数量
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product wherePid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product whereCateId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product whereBrandId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product whereOrder($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product whereWeight($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product whereStock($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product whereCostPrice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product whereMarketPrice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product whereShopPrice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product whereState($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product whereIsBest($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product whereIsHot($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product whereIsNew($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product whereIsFreeShipping($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product whereIsOnSale($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product whereOnTime($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product whereKeywords($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product whereSaleCount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product whereVisitCount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product whereReviewCount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product whereDeletedAt($value)
 * @mixin \Eloquent
 */
class Product extends Model
{
    //
    protected $primaryKey = 'pid';
}
