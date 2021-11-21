<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingredient extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
            'code',
            'name',
            'name_en',
            'inci',
            'inci_koh',
            'inci_naoh',
            'cas',
            'cas_einecs',
            'einecs',
            'ingredient_category_id',
            'infos',
            'active'
    ];

    protected $attributes =[
        'active' => 1,
    ];

    public function ingredientCategory()
    {
        return $this->belongsTo(IngredientCategory::class);
    }

    public function listings()
    {
        return $this->hasMany(Listing::class);
    }

    public function production_items()
    {
        return $this->hasMany(ProductionItem::class);
    }

    public function documentations()
    {
        return $this->morphMany(Documentation::class, 'documentationable');
    }

    public function getActiveAttribute($attribute){
        return $this->activeOptions()[$attribute];
    }

     public function activeOptions(){
        return [
            1 => 'Actif',
            0 => 'Inactif',
        ];
    }
}
