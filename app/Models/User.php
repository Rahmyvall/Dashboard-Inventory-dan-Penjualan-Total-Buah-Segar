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

    // ★★★ TAMBAHKAN BARIS INI ★★★
    public $timestamps = false;

    protected $fillable = [
        'username',
        'password_hash',
        'nama_lengkap',
        'role',
        'is_active',
    ];

    protected $hidden = [
        'password_hash',
        // 'remember_token',   // uncomment jika kamu butuh fitur remember me
    ];

    protected function casts(): array
    {
        return [
            'is_active'  => 'boolean',
            'created_at' => 'datetime',
        ];
    }

    // Wajib untuk Login
    public function getAuthPassword()
    {
        return $this->password_hash;
    }
}
