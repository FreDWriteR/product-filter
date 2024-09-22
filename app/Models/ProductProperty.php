<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductProperty extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'property_name_id', 'property_value'];

    public function propertyName()
    {
        return $this->belongsTo(PropertyName::class);
    }

}
