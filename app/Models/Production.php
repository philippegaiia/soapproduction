<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Production extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    const STATUSES = [
        0 => 'Planifiée',
        1 => 'Confirmée',
        2 => 'Terminée',
        3 => 'Annulée'
    ];

    protected $casts = [
        'production_date' => 'date',
        'ready_date' => 'date',
        'cosmecert' => 'boolean',
        'masterbatch' => 'boolean'
    ];

    protected $appends = ['production_date_for_editing', 'ready_date_for_editing'];

    public function formula()
    {
        return $this->belongsTo(Formula::class);
    }

     public function ingredient()
    {
        return $this->belongsTo(Ingredient::class);
    }

    public function production_items()
    {
        return $this->hasMany(ProductionItem::class);
    }

    public function getStatusColorAttribute()
    {
        return [
            0 => 'gray',
            1 => 'indigo',
            2 => 'green',
            3 => 'red'
        ][$this->status] ?? 'gray';
    }

    public function getStatusNameAttribute()
    {
        return [
            0 => 'Planifiée',
            1 => 'Confirmée',
            2 => 'Terminée',
            3 => 'Annulée'
        ][$this->status];
    }

    public function getProductionDateForHumansAttribute()
    {
        return $this->production_date->format('d M, y');
    }

    public function getReadyDateForHumansAttribute()
    {
        return $this->ready_date->format('d M, y');
    }


    public function getProductionDateForEditingAttribute()
    {
        return $this->production_date->format('m/d/Y');
    }

    public function setProductionDateForEditingAttribute($value)
    {
        $this->production_date = Carbon::parse($value);
    }

    public function getReadyDateForEditingAttribute()
    {
        return $this->ready_date->format('m/d/Y');
    }

    public function setReadyDateForEditingAttribute($value)
    {
        $this->ready_date = Carbon::parse($value);
    }
}
