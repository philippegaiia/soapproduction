<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['code', 'name', 'active'];

    protected $casts = ['active' => 'boolean'];

    public function productSubcategories()
    {
        return $this->hasMany(ProductSubcategory::class);
    }

    public function getActiveColorAttribute()
    {
        return [
            0 => 'yellow',
            1 => 'green',
        ][$this->active];
    }
}
