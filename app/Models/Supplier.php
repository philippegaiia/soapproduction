<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'code','customer_no','name','active','contact','email','tel','address1','address2','zip','city','country','infos', 'www'
    ];

    protected $attributes =[
        'active' => 1,
    ];

    public function listings()
    {
        return $this->hasMany(Listing::class);
    }

    public function getActiveAttribute($attribute)
    {
        return $this->activeOptions()[$attribute];
    }

     public function activeOptions(){
        return [
            1 => 'Actif',
            0 => 'Inactif',
        ];
    }
}
