<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'supplier';
    protected $primaryKey = 'id_supplier';

    /**
     * Field yang boleh diisi (mass assignment)
     */
    protected $fillable = [
        'kode_supplier',
        'nama_supplier',
        'alamat',
        'kota',
        'telepon',
        'email',
        'kontak_person',
        'foto',
        'status',
    ];

    /**
     * Casting tipe data
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Default attribute (opsional)
     */
    protected $attributes = [
        'status' => 'aktif',
    ];

    /**
     * Accessor: URL foto supplier
     * Mengembalikan URL lengkap gambar
     */
    public function getFotoUrlAttribute()
    {
        if (!$this->foto) {
            return asset('images/default-supplier.png'); // fallback default image
        }

        return Storage::url($this->foto);
    }

    /**
     * Mutator: simpan kode supplier otomatis uppercase
     */
    public function setKodeSupplierAttribute($value)
    {
        $this->attributes['kode_supplier'] = strtoupper($value);
    }

    /**
     * Scope: hanya supplier aktif
     */
    public function scopeAktif($query)
    {
        return $query->where('status', 'aktif');
    }

    /**
     * Scope: hanya supplier nonaktif
     */
    public function scopeNonaktif($query)
    {
        return $query->where('status', 'nonaktif');
    }

    /**
     * Helper: cek apakah supplier aktif
     */
    public function isAktif()
    {
        return $this->status === 'aktif';
    }
}