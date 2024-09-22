<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyName extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function productProperties()
    {
        return $this->hasMany(ProductProperty::class);
    }
}
