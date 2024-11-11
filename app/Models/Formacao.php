<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Formacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'medico_id',
        'nome_instituicao',
        'ano_conclusao',
    ];

    public function medico(): BelongsTo
    {
        return $this->belongsTo(Medico::class);
    }
}
