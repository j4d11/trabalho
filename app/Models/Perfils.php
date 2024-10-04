<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfils extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'perfils';
    protected $fillable = [
        'name',
    ];

    public function users()
    {
        return $this->hasMany(Users::class, 'perfil_id', 'id');
    }
}

