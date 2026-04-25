<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualan';

    protected $primaryKey = 'id_penjualan';

    protected $fillable = [
        'no_invoice',
        'tanggal_penjualan',
        'id_pelanggan',
        'subtotal',
        'diskon',
        'total',
        'dibayar',
        'metode_bayar',
        'id_user',
    ];

    protected $casts = [
        'tanggal_penjualan' => 'datetime',
        'subtotal' => 'decimal:2',
        'diskon' => 'decimal:2',
        'total' => 'decimal:2',
        'dibayar' => 'decimal:2',
    ];

    /*
    |---------------------------------------
    | RELASI
    |---------------------------------------
    */

    // ke pelanggan
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id_pelanggan');
    }

    // ke users
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
