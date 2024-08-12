<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $table = 'pessoas';
    
    protected $primaryKey = 'idPessoa';
    
    public $incrementing = true;
    
    protected $keyType = 'int';

    protected $fillable = [
        'nome',
        'dataNascimento',
        'salario',
        'observacoes',
        'nomeMae',
        'nomePai',
        'cpf',
    ];

    protected $casts = [
        'dataNascimento' => 'date',
        'salario' => 'decimal:2',
    ];
}
