<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::latest()->paginate(10);
        return view('dashboard.admin.kategori.index', compact('kategoris'));
    }

    public function create()
    {
        return view('dashboard.admin.kategori.create');
    }
public function show(Kategori $kategori)
{
    return view('dashboard.admin.kategori.show', compact('kategori'));
}
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|max:50|unique:kategori,nama_kategori',
            'deskripsi'     => 'nullable|string',
            'gambar_file'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Upload gambar
        if ($request->hasFile('gambar_file')) {
            $validated['gambar'] = $request->file('gambar_file')->store('kategori', 'public');
        }

        Kategori::create($validated);

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit(Kategori $kategori)
    {
        return view('dashboard.admin.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|max:50|unique:kategori,nama_kategori,' . $kategori->id_kategori . ',id_kategori',
            'deskripsi'     => 'nullable|string',
            'gambar_file'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('gambar_file')) {

            // hapus gambar lama
            if ($kategori->gambar) {
                Storage::disk('public')->delete($kategori->gambar);
            }

            $validated['gambar'] = $request->file('gambar_file')->store('kategori', 'public');
        }

        $kategori->update($validated);

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori berhasil diupdate');
    }

    public function destroy(Kategori $kategori)
    {
        if ($kategori->gambar) {
            Storage::disk('public')->delete($kategori->gambar);
        }

        $kategori->delete();

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori berhasil dihapus');
    }
}