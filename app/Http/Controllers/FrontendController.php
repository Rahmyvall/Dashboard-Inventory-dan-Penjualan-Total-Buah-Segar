<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Supplier;
use App\Models\Kategori;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * 🏠 HOME PAGE
     */
   public function index()
{
    return view('welcome', [
        'produks'   => Produk::latest()->take(8)->get(),
        'suppliers' => Supplier::where('status', 'aktif')->latest()->get(),
        'kategoris' => Kategori::all(),

        // ✅ TAMBAHKAN INI
        'pelanggans' => \App\Models\Pelanggan::latest()->get(),
    ]);
}

    /**
     * 🏪 SUPPLIER PRODUK (SHOPEE STYLE)
     */
    public function supplierProduk($id, Request $request)
    {
        $supplier = Supplier::where('status', 'aktif')
            ->findOrFail($id);

        $kategoriId = $request->kategori;

        $categories = Kategori::all();

        $products = Produk::where('supplier_id', $id)
            ->when($kategoriId, function ($q) use ($kategoriId) {
                $q->where('kategori_id', $kategoriId);
            })
            ->latest()
            ->get();

        return view('frontend.supplier-produk', [
            'supplier'    => $supplier,
            'categories'  => $categories,
            'products'    => $products,
            'kategoriId'  => $kategoriId,
        ]);
    }
}