<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Admin
 *
 */
	class Admin extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Brand
 *
 * @property int $brand_id
 * @property string $name
 * @property string $logo_path logo
 * @property string $description 描述
 * @property string $order 顺序
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Brand whereBrandId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Brand whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Brand whereLogoPath($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Brand whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Brand whereOrder($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Brand whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Brand whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Brand whereDeletedAt($value)
 */
	class Brand extends \Eloquent {}
}

namespace App\Models{
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
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
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
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $mobile
 * @property bool $verify_email 是否邮箱验证
 * @property bool $verify_mobile 是否手机验证
 * @property string $lift_ban_time 解禁时间
 * @property int $level_id 用户等级id
 * @property string $last_visit_time 上次登录时间
 * @property string $last_visit_ip 上次访问的ip
 * @property string $register_ip 注册时的ip
 * @property string $register_rg_id 注册区域
 * @property bool $sex 性别， 0-男 1-女
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $readNotifications
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $unreadNotifications
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereUsername($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereMobile($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereVerifyEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereVerifyMobile($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereLiftBanTime($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereLevelId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereLastVisitTime($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereLastVisitIp($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereRegisterIp($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereRegisterRgId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereSex($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereDeletedAt($value)
 */
	class User extends \Eloquent {}
}

