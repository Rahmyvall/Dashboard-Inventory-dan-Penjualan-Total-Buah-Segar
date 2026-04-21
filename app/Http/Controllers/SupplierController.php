<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// 🔥 TAMBAHAN EXPORT
use App\Exports\SupplierExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Validation\Rule;

class SupplierController extends Controller
{
    /**
     * GENERATE KODE SUPPLIER
     */
    private function generateKodeSupplier()
    {
        $last = Supplier::orderBy('id_supplier', 'desc')->first();

        if (!$last) {
            return 'SUP-0001';
        }

        $number = (int) substr($last->kode_supplier, 4);
        $number++;

        return 'SUP-' . str_pad($number, 4, '0', STR_PAD_LEFT);
    }

    /**
     * LIST SUPPLIER
     */
    public function index()
    {
        $suppliers = Supplier::latest()->paginate(12);
        return view('dashboard.admin.supplier.index', compact('suppliers'));
    }

    /**
     * FORM CREATE
     */
    public function create()
    {
        $kode_supplier = $this->generateKodeSupplier();
        return view('dashboard.admin.supplier.create', compact('kode_supplier'));
    }

    /**
     * SIMPAN DATA
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_supplier' => 'required|unique:supplier,kode_supplier',
            'nama_supplier' => 'required|string|max:100',
            'alamat' => 'nullable|string',
            'kota' => 'nullable|string|max:50',
            'telepon' => 'nullable|string|max:20',
            'email' => 'nullable|email',
            'kontak_person' => 'nullable|string|max:100',
            'foto_file' => 'nullable|image|max:2048',
            'status' => 'nullable|in:aktif,nonaktif',
        ]);

        $data = $request->all();

        $data['status'] = $request->status ?? 'aktif';

        // upload foto
        if ($request->hasFile('foto_file')) {
            $data['foto'] = $request->file('foto_file')->store('supplier', 'public');
        }

        unset($data['foto_file']);

        Supplier::create($data);

        return redirect()->route('supplier.index')
            ->with('success', 'Supplier berhasil disimpan');
    }

    /**
     * DETAIL
     */
    public function show(Supplier $supplier)
    {
        return view('dashboard.admin.supplier.show', compact('supplier'));
    }

    /**
     * FORM EDIT
     */
    public function edit(Supplier $supplier)
    {
        return view('dashboard.admin.supplier.edit', compact('supplier'));
    }

    /**
     * UPDATE
     */
    public function update(Request $request, Supplier $supplier)
{
    $data = $request->validate([
        'kode_supplier' => [
            'required',
            'string',
            'max:20',
            Rule::unique('supplier', 'kode_supplier')->ignore($supplier->id_supplier, 'id_supplier'),
        ],
        'nama_supplier' => 'required|string|max:100',
        'alamat' => 'nullable|string',
        'kota' => 'nullable|string|max:50',
        'telepon' => 'nullable|string|max:20',
        'email' => 'nullable|email',
        'kontak_person' => 'nullable|string|max:100',
        'foto_file' => 'nullable|image|max:2048',
        'status' => 'nullable|in:aktif,nonaktif',
    ]);

    // default status
    $data['status'] = $request->status ?? 'aktif';

    // 🔥 HANDLE FOTO
    if ($request->hasFile('foto_file')) {

        // hapus foto lama
        if ($supplier->foto && Storage::disk('public')->exists($supplier->foto)) {
            Storage::disk('public')->delete($supplier->foto);
        }

        // upload baru
        $data['foto'] = $request->file('foto_file')->store('supplier', 'public');
    }

    // buang field tidak perlu
    unset($data['foto_file']);

    // 🔥 UPDATE
    $supplier->update($data);

    return redirect()->route('supplier.index')
        ->with('success', 'Supplier berhasil diupdate');
}

    /**
     * DELETE
     */
    public function destroy(Supplier $supplier)
    {
        if ($supplier->foto && Storage::disk('public')->exists($supplier->foto)) {
            Storage::disk('public')->delete($supplier->foto);
        }

        $supplier->delete();

        return redirect()->route('supplier.index')
            ->with('success', 'Supplier berhasil dihapus');
    }

}