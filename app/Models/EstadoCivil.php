<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoCivil extends Model
{
    use HasFactory;

    protected $table = 'estados_civis';

    protected $fillable = [
        'nome_estado_civil',
    ];

    public function medicos()
    {
        return $this->hasMany(Medico::class);
    }
}
