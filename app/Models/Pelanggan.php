<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    // Nama tabel (karena tidak mengikuti plural default Laravel)
    protected $table = 'pelanggan';

    // Primary key custom
    protected $primaryKey = 'id_pelanggan';

    // Auto increment & tipe primary key
    public $incrementing = true;
    protected $keyType = 'int';

    // Kolom yang boleh diisi (mass assignment)
    protected $fillable = [
        'kode_pelanggan',
        'nama_pelanggan',
        'alamat',
        'telepon',
        'email',
        'tipe_pelanggan',
    ];

    // Aktifkan timestamps (created_at & updated_at)
    public $timestamps = true;

    // Casting data (opsional tapi direkomendasikan)
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | Accessor (Custom Attribute)
    |--------------------------------------------------------------------------
    */

    // Contoh: ambil nama + kode
    public function getNamaLengkapAttribute()
    {
        return $this->kode_pelanggan . ' - ' . $this->nama_pelanggan;
    }

    /*
    |--------------------------------------------------------------------------
    | Mutator
    |--------------------------------------------------------------------------
    */

    // Contoh: otomatis uppercase kode pelanggan
    public function setKodePelangganAttribute($value)
    {
        $this->attributes['kode_pelanggan'] = strtoupper($value);
    }

    /*
    |--------------------------------------------------------------------------
    | Scope (Query Helper)
    |--------------------------------------------------------------------------
    */

    // Scope untuk tipe retail
    public function scopeRetail($query)
    {
        return $query->where('tipe_pelanggan', 'retail');
    }

    // Scope untuk cari berdasarkan nama
    public function scopeCari($query, $keyword)
    {
        return $query->where('nama_pelanggan', 'like', "%{$keyword}%")
                     ->orWhere('kode_pelanggan', 'like', "%{$keyword}%");
    }

    /*
    |--------------------------------------------------------------------------
    | Relasi (Contoh jika ada tabel lain)
    |--------------------------------------------------------------------------
    */

    // Contoh relasi ke tabel transaksi (jika ada)
    // public function transaksi()
    // {
    //     return $this->hasMany(Transaksi::class, 'id_pelanggan');
    // }
}