<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * 🔥 GENERATE KODE PELANGGAN
     */
    private function generateKodePelanggan()
    {
        $last = Pelanggan::orderBy('id_pelanggan', 'desc')->first();

        if (!$last) {
            return 'PLG-0001';
        }

        $number = (int) substr($last->kode_pelanggan, 4);
        $number++;

        return 'PLG-' . str_pad($number, 4, '0', STR_PAD_LEFT);
    }

    /**
     * 📋 LIST DATA (SEARCH + FILTER READY)
     */
    public function index(Request $request)
    {
        $query = Pelanggan::query();

        // 🔍 SEARCH
        if ($request->search) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('nama_pelanggan', 'like', "%{$search}%")
                  ->orWhere('kode_pelanggan', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('telepon', 'like', "%{$search}%");
            });
        }

        // 🎯 FILTER TIPE
        if ($request->tipe) {
            $query->where('tipe_pelanggan', $request->tipe);
        }

        // 🔽 SORT
        $sort = $request->sort ?? 'desc';
        $query->orderBy('id_pelanggan', $sort);

        // 📄 PAGINATION
        $perPage = $request->per_page ?? 10;
        $pelanggans = $query->paginate($perPage)->withQueryString();

        return view('dashboard.admin.pelanggan.index', compact('pelanggans'));
    }

    /**
     * ➕ FORM CREATE
     */
    public function create()
    {
        $kode_pelanggan = $this->generateKodePelanggan();

        return view('dashboard.admin.pelanggan.create', compact('kode_pelanggan'));
    }

    /**
     * 💾 STORE (SECURE VERSION)
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_pelanggan' => 'required|string|max:100',
            'alamat' => 'nullable|string',
            'telepon' => 'nullable|string|max:20',
            'email' => 'nullable|email',
            'tipe_pelanggan' => 'required|in:retail,grosir,corporate',
        ]);

        $data['kode_pelanggan'] = $this->generateKodePelanggan();

        Pelanggan::create($data);

        return redirect()->route('pelanggan.index')
            ->with('success', 'Pelanggan berhasil ditambahkan');
    }

    /**
     * 🔍 SHOW
     */
    public function show(Pelanggan $pelanggan)
    {
        return view('dashboard.admin.pelanggan.show', compact('pelanggan'));
    }

    /**
     * ✏️ EDIT
     */
    public function edit(Pelanggan $pelanggan)
    {
        return view('dashboard.admin.pelanggan.edit', compact('pelanggan'));
    }

    /**
     * 🔄 UPDATE (FIXED)
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        $data = $request->validate([
            'nama_pelanggan' => 'required|string|max:100',
            'alamat' => 'nullable|string',
            'telepon' => 'nullable|string|max:20',
            'email' => 'nullable|email',
            'tipe_pelanggan' => 'required|in:retail,grosir,corporate',
        ]);

        $pelanggan->update($data);

        return redirect()->route('pelanggan.index')
            ->with('success', 'Pelanggan berhasil diupdate');
    }

    /**
     * 🗑️ DELETE
     */
    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();

        return redirect()->route('pelanggan.index')
            ->with('success', 'Pelanggan berhasil dihapus');
    }
}
