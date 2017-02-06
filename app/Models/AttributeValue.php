<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    //
    protected $primarykey = 'attr_value_id';

    //belongsTo
    public function attribute()
    {
        return $this->belongsTo(Attribute::class,'attr_id','attr_value_id');
    }
}
