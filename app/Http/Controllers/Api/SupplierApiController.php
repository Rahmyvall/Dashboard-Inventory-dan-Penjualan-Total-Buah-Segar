<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class SupplierApiController extends Controller
{
    public function index(Request $request)
{
    $query = Supplier::query();

    // 🔍 SEARCH (nama & kode)
    if ($request->search) {
        $query->where(function ($q) use ($request) {
            $q->where('nama_supplier', 'like', '%' . $request->search . '%')
              ->orWhere('kode_supplier', 'like', '%' . $request->search . '%');
        });
    }

    // 📍 FILTER KOTA
    if ($request->kota) {
        $query->where('kota', $request->kota);
    }

    // 🔥 FILTER STATUS
    if ($request->status) {
        $query->where('status', $request->status);
    }

    // 📄 PAGINATION
    $suppliers = $query->latest()->paginate(10);

    return response()->json([
        'success' => true,
        'message' => 'Data supplier',
        'data' => $suppliers
    ]);
}

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_supplier' => 'required|unique:supplier,kode_supplier',
            'nama_supplier' => 'required|string|max:100',
            'alamat' => 'nullable',
            'kota' => 'nullable',
            'telepon' => 'nullable',
            'email' => 'nullable|email',
            'kontak_person' => 'nullable',
            'status' => 'nullable|in:aktif,nonaktif',
            'foto' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('supplier', 'public');
        }

        $supplier = Supplier::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Supplier berhasil ditambahkan',
            'data' => $supplier
        ], 201);
    }

    public function show($id)
    {
        $supplier = Supplier::find($id);

        if (!$supplier) {
            return response()->json([
                'success' => false,
                'message' => 'Supplier tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $supplier
        ]);
    }

    public function update(Request $request, $id)
    {
        $supplier = Supplier::find($id);

        if (!$supplier) {
            return response()->json([
                'success' => false,
                'message' => 'Supplier tidak ditemukan'
            ], 404);
        }

        $data = $request->validate([
            'kode_supplier' => [
                'required',
                Rule::unique('supplier', 'kode_supplier')->ignore($supplier->id_supplier, 'id_supplier')
            ],
            'nama_supplier' => 'required|string|max:100',
            'alamat' => 'nullable',
            'kota' => 'nullable',
            'telepon' => 'nullable',
            'email' => 'nullable|email',
            'kontak_person' => 'nullable',
            'status' => 'nullable|in:aktif,nonaktif',
            'foto' => 'nullable|image|max:2048'
        ]);

        // update foto
        if ($request->hasFile('foto')) {
            if ($supplier->foto && Storage::disk('public')->exists($supplier->foto)) {
                Storage::disk('public')->delete($supplier->foto);
            }

            $data['foto'] = $request->file('foto')->store('supplier', 'public');
        }

        $supplier->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Supplier berhasil diupdate',
            'data' => $supplier
        ]);
    }

    public function destroy($id)
    {
        $supplier = Supplier::find($id);

        if (!$supplier) {
            return response()->json([
                'success' => false,
                'message' => 'Supplier tidak ditemukan'
            ], 404);
        }

        if ($supplier->foto && Storage::disk('public')->exists($supplier->foto)) {
            Storage::disk('public')->delete($supplier->foto);
        }

        $supplier->delete();

        return response()->json([
            'success' => true,
            'message' => 'Supplier berhasil dihapus'
        ]);
    }
}