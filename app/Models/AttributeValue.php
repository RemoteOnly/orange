<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AttributeValue
 *
 * @property int $attr_value_id 主键
 * @property int $attr_id 属性id
 * @property string $attr_value 属性值
 * @property int $order 同一attr_id对应的值的排序
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property-read \App\Models\Attribute $attribute
 * @method static \Illuminate\Database\Query\Builder|\App\Models\AttributeValue whereAttrId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\AttributeValue whereAttrValue($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\AttributeValue whereAttrValueId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\AttributeValue whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\AttributeValue whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\AttributeValue whereOrder($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\AttributeValue whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AttributeValue extends Model
{
    //
    protected $primaryKey = 'attr_value_id';
    protected $fillable = ['attr_id', 'attr_value', 'order'];

    //belongsTo
    public function attribute()
    {
        return $this->belongsTo(Attribute::class, 'attr_value_id', 'attr_id');
    }
}
