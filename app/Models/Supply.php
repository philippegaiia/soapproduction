<?php

namespace App\Models;

use Carbon\Carbon;
use App\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supply extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded =[];

    const STOCKSTATUSES = [
        0 => 'Non livré',
        1 => 'En Stock',
        2 => 'Epuisé'
    ];

    protected $casts = [
        'expiry_date' => 'date',
        'price' => MoneyCast::class,
    ];

    protected $appends = ['expiry_date_for_editing'];


    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }

    public function production_items()
    {
        return $this->hasMany(ProductionItem::class);
    }

     public function getExpiryDateForHumansAttribute()
    {
        return $this->expiry_date->format('M, d, Y');
    }

    public function getExpiryDateForEditingAttribute()
    {
        return $this->expiry_date->format('m/d/Y');
    }

    public function setExpiryDateForEditingAttribute($value)
    {
        $this->expiry_date = Carbon::parse($value);
    }

    public function getActiveColorAttribute()
    {
        return [
            0 => 'yellow',
            1 => 'green',
            2 => 'pink',
        ][$this->active] ?? 'gray';
    }

    public function getActiveNameAttribute()
    {
        return [
            0 => 'Non livré',
            1 => 'En Stock',
            2 => 'Epuisé'
        ][$this->active];
    }
}
