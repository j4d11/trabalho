<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'usert';
    protected $fillable = [
        'name',
        'email',
        'perfil_id'
    ];

    public function perfils()
    {
        return $this->hasMany(Perfils::class, 'perfil_id', 'id');
    }
}
