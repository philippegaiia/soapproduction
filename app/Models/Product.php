<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    const STATUSES = [
        0 => 'Actif',
        1 => 'Inactif',
        2 => 'Arrêté',
    ];

    //  protected $casts = [
    //     'order_date' => 'date:ymd-s',
    //     'delivery_date' => 'date:ymd-s',
    // ];

    protected $casts = [
        'launch_date' => 'date',
    ];

    protected $appends = ['launch_date_for_editing'];

    // protected $attributes =[
    //     'active' => 0,
    // ];

    public function productSubcategory()
    {
         return $this->belongsTo(ProductSubcategory::class);
    }

    public function productCollection()
    {
         return $this->belongsTo(ProductCollection::class);
    }

    public function formulas()
    {
        return $this->belongsToMany(Formula::class);
    }

    public function getActiveColorAttribute()
    {
        return [
            0 => 'green',
            1 => 'yellow',
            2 => 'gray',
        ][$this->active] ?? 'gray';
    }

    public function getActiveNameAttribute()
    {
        return [
            0 => 'Actif',
            1 => 'Inactif',
            2 => 'Arrêté'
        ][$this->active];
    }

    public function getLaunchDateForHumansAttribute()
    {
        return $this->launch_date->format('M, d, Y');
    }

    public function getLaunchDateForEditingAttribute()
    {
        return $this->launch_date->format('m/d/Y');
    }

    public function setLaunchDateForEditingAttribute($value)
    {
        $this->launch_date = Carbon::parse($value);
    }


}
