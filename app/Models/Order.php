<?php

namespace App\Models;

use Carbon\Carbon;
use App\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;


    //
    protected $guarded = [];

    const STATUSES = [
        0 => 'Draft',
        1 => 'Passée',
        2 => 'Confirmée',
        3 => 'Livrée'
    ];

    //  protected $casts = [
    //     'order_date' => 'date:ymd-s',
    //     'delivery_date' => 'date:ymd-s',
    // ];

    protected $casts = [
        'order_date' => 'date',
        'delivery_date' => 'date',
        'amount' => MoneyCast::class,
        'freight' => MoneyCast::class,
    ];

    protected $appends = ['order_date_for_editing', 'delivery_date_for_editing'];

    // protected $attributes =[
    //     'active' => 0,
    // ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function supplies()
    {
        return $this->hasMany(Supply::class);
    }

    public function getActiveColorAttribute()
    {
        return [
            0 => 'gray',
            1 => 'yellow',
            2 => 'indigo',
            3 => 'green'
        ][$this->active] ?? 'gray';
    }

    public function getActiveNameAttribute()
    {
        return [
            0 => 'Draft',
            1 => 'Passée',
            2 => 'Confirmée',
            3 => 'Livrée'
        ][$this->active];
    }

    public function getOrderDateForHumansAttribute()
    {
        return $this->order_date->format('M, d, Y');
    }

    public function getDeliveryDateForHumansAttribute()
    {
        // $orderdate = new Carbon;
        // $orderdate = Carbon::create($this->delivery_date)->locale('fr_FR');
        return $this->delivery_date->format('M, d, Y');
        // dd($orderdate);
        // return $orderdate->toFormattedDateString();
    }


    public function getOrderDateForEditingAttribute()
    {
        return $this->order_date->format('m/d/Y');
    }

    public function setOrderDateForEditingAttribute($value)
    {
        $this->order_date = Carbon::parse($value);
    }

    public function getDeliveryDateForEditingAttribute()
    {
        return $this->delivery_date->format('m/d/Y');
    }

    public function setDeliveryDateForEditingAttribute($value)
    {
        $this->delivery_date = Carbon::parse($value);
    }
}
