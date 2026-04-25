<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualanApiController extends Controller
{
    /**
     * 📋 LIST PENJUALAN
     */
    public function index()
    {
        $data = Penjualan::with('pelanggan','user')
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    /**
     * 🔥 CREATE TRANSAKSI (POS CART)
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_pelanggan' => 'nullable|exists:pelanggan,id_pelanggan',
            'dibayar' => 'required|numeric',
            'metode_bayar' => 'required|in:cash,transfer,qris,kartu',
            'cart' => 'required|array'
        ]);

        DB::beginTransaction();

        try {

            // 🔥 HITUNG SUBTOTAL
            $subtotal = 0;

            foreach ($request->cart as $item) {
                $subtotal += $item['harga'] * $item['qty'];
            }

            // 🔥 DISKON 3%
            $diskon = $subtotal * 0.03;

            // 🔥 TOTAL
            $total = $subtotal - $diskon;
            if ($total < 0) $total = 0;

            // 🔥 KEMBALIAN
            $kembalian = $request->dibayar - $total;
            if ($kembalian < 0) $kembalian = 0;

            // 🔥 SIMPAN HEADER PENJUALAN
            $penjualan = Penjualan::create([
                'no_invoice' => 'INV-' . time(),
                'tanggal_penjualan' => now(),
                'id_pelanggan' => $request->id_pelanggan,
                'subtotal' => $subtotal,
                'diskon' => $diskon,
                'total' => $total,
                'dibayar' => $request->dibayar,
                'kembalian' => $kembalian,
                'metode_bayar' => $request->metode_bayar,
                'id_user' => $request->id_user ?? 1,
            ]);

            // 🔥 SIMPAN DETAIL + KURANGI STOK
            foreach ($request->cart as $item) {

                $produk = Produk::find($item['id_produk']);

                DetailPenjualan::create([
                    'id_penjualan' => $penjualan->id_penjualan,
                    'id_produk' => $item['id_produk'],
                    'qty' => $item['qty'],
                    'harga' => $item['harga'],
                    'subtotal' => $item['qty'] * $item['harga'],
                ]);

                // 🔥 UPDATE STOK
                $produk->stok -= $item['qty'];
                $produk->save();
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Transaksi berhasil',
                'data' => $penjualan->load('detail','pelanggan')
            ]);

        } catch (\Exception $e) {
            DB::rollback();

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * 🔍 DETAIL PENJUALAN
     */
    public function show($id)
    {
        $data = Penjualan::with('detail.produk','pelanggan','user')
            ->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    /**
     * 🗑 DELETE PENJUALAN
     */
    public function destroy($id)
    {
        $penjualan = Penjualan::findOrFail($id);

        // rollback stok
        foreach ($penjualan->detail as $item) {
            $produk = Produk::find($item->id_produk);
            $produk->stok += $item->qty;
            $produk->save();
        }

        $penjualan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Penjualan dihapus'
        ]);
    }
}
