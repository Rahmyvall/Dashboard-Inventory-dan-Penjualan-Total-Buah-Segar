<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukApiController extends Controller
{
    public function index()
    {
        return response()->json(
            Produk::with('kategori')->latest()->get()
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_produk' => 'required|unique:produk,kode_produk',
            'nama_buah' => 'required',
            'id_kategori' => 'nullable',
            'satuan' => 'required',
            'harga_jual' => 'nullable',
            'stok' => 'nullable',
            'foto_file' => 'nullable|image|max:2048',
        ]);

        $data['diskon'] = 5;
        $data['is_active'] = 1;

        if ($request->hasFile('foto_file')) {
            $data['foto'] = $request->file('foto_file')->store('produk', 'public');
        }

        unset($data['foto_file']);

        $produk = Produk::create($data);

        return response()->json($produk);
    }

    public function show($id)
    {
        return Produk::with('kategori')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $data = $request->validate([
            'nama_buah' => 'required',
            'harga_jual' => 'nullable',
        ]);

        if ($request->hasFile('foto_file')) {
            if ($produk->foto) {
                Storage::disk('public')->delete($produk->foto);
            }

            $data['foto'] = $request->file('foto_file')->store('produk', 'public');
        }

        $produk->update($data);

        return response()->json($produk);
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        if ($produk->foto) {
            Storage::disk('public')->delete($produk->foto);
        }

        $produk->delete();

        return response()->json(['message' => 'deleted']);
    }
}