<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Listing extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable =['ingredient_id','supplier_id', 'code','supplier_ref','name','pkg','unit_weight','organic','fairtrade','cosmos','cosmecert','active','infos'];

    protected $attributes =[
        'active' => 1,
        'pkg' => 1
    ];

    protected $casts = [
        'organic' => 'boolean',
        'cosmos' => 'boolean',
        'cosmecert' => 'boolean',
        'fairtrade' => 'boolean'
    ];

    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function supplies()
    {
        return $this->hasMany(Supply::class);
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

    public function getPkgAttribute($attribute){
        return $this->pkgOptions()[$attribute];
    }

    public function pkgOptions(){
        return [
            1 => 'Bidon',
            2 => 'Seau',
            3 => 'Carton',
            4 => 'Fût',
            5 => 'Flacon',
            6 => 'Unitaire',
            7 => 'Vrac',
            10 => 'Sac'
        ];
    }

    public function getOrganicColorAttribute()
    {
        return [
            0 => 'yellow',
            1 => 'green',

        ][$this->organic];
    }



    // public function getOrganicAttribute($attribute){
    //     return [
    //         1 => 'Biologique',
    //         0 => 'Conventionnel',
    //     ][$this->organic];
    // }


    public static function search($search)
    {
        return empty($search) ? static::query()
             : static::where('supplier_ref', 'like', '%'.$search.'%')
                ->orWhere('name', 'like', '%'.$search.'%')
                ->orWhere('code', 'like', '%'.$search.'%')
                ->orWhere('ingredient_id', 'like', '%'.$search.'%')
                ;
    }

}
