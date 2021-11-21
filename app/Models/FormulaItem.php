<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormulaItem extends Model
{
    use HasFactory;

    protected $guarded =[];

    const PHASES = [
        0 => 'Saponification',
        5 => 'Milieu réactionnel',
        10 => 'Huile',
        20 => 'Parfum',
        30 => 'Autres additif',
        40 => 'Colorant',
        50 => 'Autre'
    ];

    protected $casts = [
        'organic' => 'boolean',
        'saponify' => 'boolean',
    ];

    public function formula()
    {
        return $this->belongsTo(Formula::class);
    }

    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class);
    }

    public function getOrganicColorAttribute()
    {
        return [
            0 => 'blue',
            1 => 'green',
        ][$this->organic];
    }

    public function getPhaseColorAttribute()
    {
        return [
            0 => 'blue',
            5 => 'red',
            10 => 'indigo',
            20 => 'purple',
            30 => 'yellow',
            40 => 'pink',
            50 => 'gray',
        ][$this->phase];
    }

    public function getPhaseNameAttribute()
    {
        return [
            0 => 'Saponification',
            5 => 'Milieu réactionnel',
            10 => 'Huile',
            20 => 'Parfum',
            30 => 'Autres additif',
            40 => 'Colorant',
            50 => 'Autre'
        ][$this->phase];
    }
}
