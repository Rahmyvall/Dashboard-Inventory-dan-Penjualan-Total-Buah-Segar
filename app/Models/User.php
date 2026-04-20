<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id_user';

    // ❌ HAPUS kalau kamu pakai timestamps di database
   public $timestamps = false;

    protected $fillable = [
        'username',
        'password',
        'nama_lengkap',
        'role',
        'is_active',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'is_active'  => 'boolean',
        'created_at' => 'datetime',
    ];

    // 🔥 PENTING: pakai password (bukan password_hash)
    public function getAuthPassword()
    {
        return $this->password;
    }
}