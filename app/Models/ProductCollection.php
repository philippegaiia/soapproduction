<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductCollection extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['code', 'name', 'active'];

    protected $casts = ['active' => 'boolean'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getActiveColorAttribute()
    {
        return [
            0 => 'yellow',
            1 => 'green',
        ][$this->active];
    }
}
