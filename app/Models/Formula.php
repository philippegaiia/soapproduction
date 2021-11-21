<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Formula extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'start_date' => 'date'
    ];

    protected $attributes =[
        'active' => 1,
    ];

    public function formulaItems()
    {
        return $this->hasMany(FormulaItem::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

     public function getActiveAttribute($attribute){
        return $this->activeOptions()[$attribute];
    }

    public function activeOptions(){
        return [
            1 => 'Actif',
            0 => 'Inactif',
            2 => 'Arrêtée'
        ];
    }

     public function getStartDateForHumansAttribute()
    {
        return $this->start_date->format('M Y');
    }

     public function getStartDateForEditingAttribute()
    {
        return $this->start_date->format('Y-m-d');
    }

    public function setStartDateForEditingAttribute($value)
    {
        $this->start_date = Carbon::parse($value);
    }

    //  public function getActiveColorAttribute()
    // {
    //     return [
    //         0 => 'yellow',
    //         1 => 'green',
    //         2 => 'red'
    //     ][$this->active];
    // }

    // public function getActiveNameAttribute()
    // {
    //     return [
    //         1 => 'Actif',
    //         0 => 'Inactif',
    //         2 => 'Arrêtée'
    //     ][$this->active];
    // }
}
