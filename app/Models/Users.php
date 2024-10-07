<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
    ];

    public function listPerfil()
    {
        return $this->hasMany(UserPerfil::class, 'user_id', 'id');
    }
}
