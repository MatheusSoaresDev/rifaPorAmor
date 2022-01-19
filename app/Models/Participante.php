<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'participante';

    protected $fillable = ['id', 'nome', 'email', 'contato', 'numeroEscolhido', 'id_rifa'];

    public function rifa()
    {
        return $this->belongsTo(Rifa::class);
    }
}
