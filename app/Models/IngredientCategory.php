<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IngredientCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable =['code', 'name', 'name_en'];

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }

}
