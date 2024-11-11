<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Medico extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_completo',
        'data_nascimento',
        'nacionalidade_id',
        'estado_civil_id',
        'rg',
        'cpf',
        'endereco',
        'telefone',
        'email',
        'crm',
    ];

    public function especialidades(): BelongsToMany
    {
        return $this->belongsToMany(Especialidade::class, 'medico_especialidade');
    }

    public function estadoCivil()
    {
        return $this->belongsTo(EstadoCivil::class);
    }

    public function nacionalidade()
    {
        return $this->belongsTo(Nacionalidade::class);
    }

    public function formacoes(): HasMany
    {
        return $this->hasMany(Formacao::class);
    }



}

