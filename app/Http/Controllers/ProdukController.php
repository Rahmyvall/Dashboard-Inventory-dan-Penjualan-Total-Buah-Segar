<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * LIST PRODUK
     */
    private function generateKodeProduk()
{
    $last = Produk::orderBy('id_produk', 'desc')->first();

    if (!$last) {
        return 'PRD-0001';
    }

    $number = (int) substr($last->kode_produk, 4);
    $number++;

    return 'PRD-' . str_pad($number, 4, '0', STR_PAD_LEFT);
}
    public function index()
    {
        $produks = Produk::with('kategori')
            ->latest()
            ->paginate(12); // wajib collection, aman dari foreach error

        return view('dashboard.admin.produk.index', compact('produks'));
    }

    /**
     * FORM CREATE
     */
    public function create()
{
    $kategoris = Kategori::all();
    $kode_produk = $this->generateKodeProduk();

    return view('dashboard.admin.produk.create', compact('kategoris', 'kode_produk'));
}

    /**
     * SIMPAN DATA
     */
    public function store(Request $request)
{
    $request->validate([
        'kode_produk' => 'required|unique:produk,kode_produk',
        'nama_buah' => 'required|string|max:100',
        'id_kategori' => 'nullable|exists:kategori,id_kategori',
        'satuan' => 'required',
        'harga_beli' => 'nullable|numeric',
        'harga_jual' => 'nullable|numeric',
        'stok' => 'nullable|numeric',
        'stok_minimal' => 'nullable|numeric',
        'shelf_life_days' => 'nullable|integer',
        'deskripsi' => 'nullable|string',
        'foto_file' => 'nullable|image|max:2048',
    ]);

    $data = $request->all();

    // 🔥 AUTO DISKON 5%
    $data['diskon'] = 5;

    // 🔥 STATUS
    $data['is_active'] = $request->has('is_active') ? 1 : 0;

    // 🔥 FOTO UPLOAD FIX
    if ($request->hasFile('foto_file')) {
        $data['foto'] = $request->file('foto_file')->store('produk', 'public');
    }

    // ❌ HAPUS field tidak perlu
    unset($data['foto_file']);

    Produk::create($data);

    return redirect()->route('produk.index')
        ->with('success', 'Produk berhasil disimpan');
}

    /**
     * DETAIL PRODUK
     */
    public function show(Produk $produk)
    {
        $produk->load('kategori');

        return view('dashboard.admin.produk.show', compact('produk'));
    }

    /**
     * FORM EDIT
     */
    public function edit(Produk $produk)
    {
        $kategoris = Kategori::all();

        return view('dashboard.admin.produk.edit', compact('produk', 'kategoris'));
    }

    /**
     * UPDATE DATA
     */
    public function update(Request $request, Produk $produk)
{
    $data = $request->validate([
        'kode_produk' => 'required|string|max:20',
        'nama_buah' => 'required|string|max:100',
        'id_kategori' => 'nullable|exists:kategori,id_kategori',
        'satuan' => 'required|in:kg,buah,ikat,dus,kg_box',
        'harga_beli' => 'nullable|numeric',
        'harga_jual' => 'nullable|numeric',
        'stok' => 'nullable|numeric',
        'stok_minimal' => 'nullable|numeric',
        'shelf_life_days' => 'nullable|integer',
        'deskripsi' => 'nullable|string',
        'foto_file' => 'nullable|image|max:2048',
    ]);

    // 🔥 DISKON 5% FIX
    $data['diskon'] = 5;

    // 🔥 STATUS FIX
    $data['is_active'] = $request->has('is_active') ? 1 : 0;

    // 🔥 FOTO UPDATE FIX TOTAL
    if ($request->hasFile('foto_file')) {

        // hapus foto lama
        if ($produk->foto && Storage::disk('public')->exists($produk->foto)) {
            Storage::disk('public')->delete($produk->foto);
        }

        // simpan baru
        $data['foto'] = $request->file('foto_file')->store('produk', 'public');
    }

    unset($data['foto_file']);

    // 🔥 FORCE SAVE (anti gagal silent)
    $produk->update($data);

    return redirect()->route('produk.index')
        ->with('success', 'Produk berhasil diupdate');
}

    /**
     * DELETE DATA
     */
    public function destroy(Produk $produk)
    {
        // hapus gambar
        if ($produk->foto && Storage::disk('public')->exists($produk->foto)) {
            Storage::disk('public')->delete($produk->foto);
        }

        $produk->delete();

        return redirect()->route('produk.index')
            ->with('success', 'Produk berhasil dihapus');
    }
}
