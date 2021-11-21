<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductSubcategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'product_category_id',
        'code',
        'name',
        'hs_code',
        'active'
    ];

     public function getActiveColorAttribute()
    {
        return [
            0 => 'yellow',
            1 => 'green',
        ][$this->active];
    }

    public function productCategory()
    {
         return $this->belongsTo(ProductCategory::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
