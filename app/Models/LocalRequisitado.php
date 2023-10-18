<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalRequisitado extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $table = "locais_requisitados";

    public $fillable = [
        'nome',
        'id_endereco',
    ];

    public function requisicoes()
    {
        return $this->belongsToMany(Requisicao::class,'OrigemUsuario', 'id_local_requisitado', 'id_requisicao');
    }

    public function enderecos()
    {
        return $this->hasMany(Endereco::class, 'id_endereco', 'id_local_requisitado');
    }
}
