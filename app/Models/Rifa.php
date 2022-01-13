<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rifa extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_rifa';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'rifa';

    protected $fillable = ['nome', 'dataFechamento', 'limiteParticipantes', 'premio', 'objetivo', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
