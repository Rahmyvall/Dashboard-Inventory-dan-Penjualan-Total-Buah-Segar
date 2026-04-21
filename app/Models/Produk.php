<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $primaryKey = 'id_produk';

    protected $fillable = [
        'kode_produk',
        'nama_buah',
        'id_kategori',
        'satuan',
        'harga_beli',
        'harga_jual',
        'stok',
        'stok_minimal',
        'shelf_life_days',
        'deskripsi',
        'foto',
        'is_active',
        'diskon'
    ];

    protected $casts = [
        'harga_beli' => 'decimal:2',
        'harga_jual' => 'decimal:2',
        'stok' => 'decimal:2',
        'stok_minimal' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    /**
     * Relasi ke Kategori
     */
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }
}