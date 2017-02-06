<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Attribute
 *
 * @property int $attr_id
 * @property string $name 属性名称
 * @property bool $is_filter 是否为筛选属性
 * @property bool $show_type 展示类型 0-文字 1-css块,2-图片
 * @property int $order 排序
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Attribute whereAttrId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Attribute whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Attribute whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Attribute whereIsFilter($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Attribute whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Attribute whereOrder($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Attribute whereShowType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Attribute whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Attribute extends Model
{
    //
    protected $primaryKey = 'attr_id';

    //protected $fillable = ['state'];

    //hasmany
    public function attribute_values(){
        return $this->hasMany(AttributeValue::class,'attr_id','attr_id');
    }
}
