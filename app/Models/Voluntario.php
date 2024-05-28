<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voluntario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'igreja_id',
    ];

    public function igreja(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Igreja::class);
    }
}
