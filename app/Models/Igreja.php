<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Igreja extends Model
{
    protected $fillable = [
        'nome',
        'endereco',
    ];

    public function voluntarios(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Voluntario::class);
    }
}
