<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
 * @mixin \Eloquent
 */
class Brand extends Model
{
    //
    protected $primaryKey = 'brand_id';
}
