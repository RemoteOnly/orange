<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    //
    protected $primaryKey = 'attr_value_id';
    protected $fillable = ['attr_id', 'attr_value', 'order'];

    //belongsTo
    public function attribute()
    {
        return $this->belongsTo(Attribute::class, 'attr_id', 'attr_value_id');
    }
}
