<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';

    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nama_kategori',
        'deskripsi',
        'gambar',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Ini yang memperbaiki Route Model Binding
     * Supaya Laravel tahu mencari berdasarkan id_kategori, bukan id
     */
    public function getRouteKeyName()
    {
        return 'id_kategori';
    }

    // Optional: Mutator untuk nama kategori
    public function setNamaKategoriAttribute($value)
    {
        $this->attributes['nama_kategori'] = ucwords(strtolower(trim($value)));
    }

    public function getGambarUrlAttribute()
{
    if (!$this->gambar) {
        return asset('images/no-image.png');
    }

    if (str_starts_with($this->gambar, 'http')) {
        return $this->gambar;
    }

    return Storage::url($this->gambar);
}
}