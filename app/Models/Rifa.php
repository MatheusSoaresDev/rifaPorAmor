<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rifa extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'rifa';

    protected $fillable = ['id', 'nome', 'dataFechamento', 'limiteParticipantes', 'premio', 'objetivo', 'valor', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function participantes()
    {
        return $this->hasMany(Participante::class, 'id', 'id');
    }

    public function registro()
    {
        return $this->hasOne(Registro::class, 'id', 'id');
    }
}
