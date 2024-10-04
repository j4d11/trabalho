<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPerfil extends Model
{
    use HasFactory;
    protected $table = "users_perfils";
    protected $fillable = ['user_id', 'perfil_id',];

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id', 'id');
    }

    public function perfil()
    {
        return $this->belongsTo(Perfils::class, 'perfil_id', 'id');
    }
}
