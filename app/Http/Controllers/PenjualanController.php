<?php
namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * 🔥 GENERATE NO INVOICE (AMAN + UNIQUE STYLE)
     */
    private function generateInvoice()
    {
        $last = Penjualan::orderBy('id_penjualan', 'desc')->first();

        $number = $last ? ((int) substr($last->no_invoice, 4)) + 1 : 1;

        return 'INV-' . str_pad($number, 4, '0', STR_PAD_LEFT);
    }

    /**
     * 📋 INDEX
     */
    public function index(Request $request)
    {
        $query = Penjualan::with(['pelanggan', 'user']);

        if ($request->search) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('no_invoice', 'like', "%{$search}%")
                  ->orWhere('metode_bayar', 'like', "%{$search}%")
                  ->orWhere('total', 'like', "%{$search}%");
            });
        }

        $penjualans = $query->latest()->paginate(10);

        return view('dashboard.kasir.penjualan.index', compact('penjualans'));
    }

    /**
     * ➕ CREATE (AUTO PELANGGAN + INVOICE)
     */
    public function create()
    {
        return view('dashboard.kasir.penjualan.create', [
            'no_invoice' => $this->generateInvoice(),
            'pelanggan' => Pelanggan::all()
        ]);
    }

    /**
     * 💾 STORE (AUTO SYSTEM)
     */
    public function store(Request $request)
{
    $data = $request->validate([
        'id_pelanggan' => 'nullable|exists:pelanggan,id_pelanggan',
        'subtotal' => 'required|numeric',
        'dibayar' => 'required|numeric',
        'metode_bayar' => 'required|in:cash,transfer,qris,kartu',
        'id_user' => 'required|exists:users,id_user',
    ]);

    // 🔥 DISKON 3%
    $diskon = $data['subtotal'] * 0.03;

    // 🔥 TOTAL
    $total = $data['subtotal'] - $diskon;
    if ($total < 0) $total = 0;

    // 🔥 KEMBALIAN
    $kembalian = $data['dibayar'] - $total;
    if ($kembalian < 0) $kembalian = 0;

    $data['diskon'] = $diskon;
    $data['total'] = $total;
    $data['kembalian'] = $kembalian;

    $data['no_invoice'] = $this->generateInvoice();
    $data['tanggal_penjualan'] = now();

    Penjualan::create($data);

    return redirect()->route('penjualan.index')
        ->with('success', 'Penjualan berhasil ditambahkan');
}

    public function show(Penjualan $penjualan)
    {
        $penjualan->load(['pelanggan', 'user']);

        return view('dashboard.kasir.penjualan.show', compact('penjualan'));
    }

   public function edit(Penjualan $penjualan)
{
    $pelanggan = Pelanggan::all(); // 👈 INI WAJIB

    return view('dashboard.kasir.penjualan.edit', compact('penjualan', 'pelanggan'));
}

    public function update(Request $request, Penjualan $penjualan)
{
    $data = $request->validate([
        'subtotal' => 'required|numeric',
        'dibayar' => 'required|numeric',
        'metode_bayar' => 'required',
    ]);

    // 🔥 DISKON 3%
    $diskon = $data['subtotal'] * 0.03;

    // 🔥 TOTAL
    $total = $data['subtotal'] - $diskon;

    // 🔥 KEMBALIAN
    $kembalian = $data['dibayar'] - $total;
    if ($kembalian < 0) $kembalian = 0;

    $penjualan->update([
        'subtotal' => $data['subtotal'],
        'diskon' => $diskon,
        'total' => $total,
        'dibayar' => $data['dibayar'],
        'kembalian' => $kembalian,
        'metode_bayar' => $data['metode_bayar'],
    ]);

    return redirect()->route('penjualan.index')
        ->with('success', 'Penjualan berhasil diupdate');
}

    public function destroy(Penjualan $penjualan)
    {
        $penjualan->delete();

        return redirect()->route('penjualan.index')
            ->with('success', '🗑 Penjualan berhasil dihapus');
    }
}
