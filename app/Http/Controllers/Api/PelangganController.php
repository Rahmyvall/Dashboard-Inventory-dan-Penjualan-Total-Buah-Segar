<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * 🔥 GENERATE KODE
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
     * 📋 GET ALL + SEARCH + FILTER
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

        // 🎯 FILTER
        if ($request->tipe) {
            $query->where('tipe_pelanggan', $request->tipe);
        }

        // 🔽 SORT (AMAN)
        $sort = in_array($request->sort, ['asc', 'desc']) ? $request->sort : 'desc';
        $query->orderBy('id_pelanggan', $sort);

        // 📄 PAGINATION + QUERY STRING
        $perPage = $request->per_page ?? 10;
        $data = $query->paginate($perPage)->withQueryString();

        return response()->json([
            'success' => true,
            'message' => 'List Data Pelanggan',
            'filter' => [
                'search' => $request->search,
                'tipe' => $request->tipe,
                'sort' => $sort,
            ],
            'data' => $data
        ]);
    }

    /**
     * ➕ STORE
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:100',
            'alamat' => 'nullable|string',
            'telepon' => 'nullable|max:20',
            'email' => 'nullable|email',
            'tipe_pelanggan' => 'required|in:retail,grosir,corporate',
        ]);

        $data = $request->all();
        $data['kode_pelanggan'] = $this->generateKodePelanggan();

        $pelanggan = Pelanggan::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Pelanggan berhasil ditambahkan',
            'data' => $pelanggan
        ], 201);
    }

    /**
     * 🔍 SHOW
     */
    public function show($id)
    {
        $pelanggan = Pelanggan::find($id);

        if (!$pelanggan) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail Pelanggan',
            'data' => $pelanggan
        ]);
    }

    /**
     * 🔄 UPDATE
     */
    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::find($id);

        if (!$pelanggan) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $data = $request->validate([
            'nama_pelanggan' => 'required|string|max:100',
            'alamat' => 'nullable|string',
            'telepon' => 'nullable|max:20',
            'email' => 'nullable|email',
            'tipe_pelanggan' => 'required|in:retail,grosir,corporate',
        ]);

        $pelanggan->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Pelanggan berhasil diupdate',
            'data' => $pelanggan
        ]);
    }

    /**
     * 🗑️ DELETE
     */
    public function destroy($id)
    {
        $pelanggan = Pelanggan::find($id);

        if (!$pelanggan) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $pelanggan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Pelanggan berhasil dihapus'
        ]);
    }
}
