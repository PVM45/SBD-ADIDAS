<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pesanan;
use App\Models\pembayaran;
use App\Models\produk_pesanan;
use App\Models\Productlog;
use App\Models\omset;
use App\Models\produk;
class PesananController extends Controller
{
    public function konfirmasi()
    {
        $pesanan = pesanan::join('users', 'pesanans.user_id', '=', 'users.id')
        ->join('alamats', 'pesanans.alamat_id', '=', 'alamats.id')
        ->join('pembayarans', 'pesanans.pembayaran_id', '=', 'pembayarans.id')
        ->select('pesanans.id', 'users.name as nama', 'alamats.alamat', 'pembayarans.metode_pembayaran', 'pesanans.total_pembayaran', 
        'pesanans.kode_pembayaran', 'pesanans.status_pesanan', 'pesanans.tanggal_transaksi')
        ->paginate(10);
        return view('layouts.admin.pesanan', compact('pesanan'));
    }

    public function prosesKonfirmasi(Request $request, $id)
    {
        $pesanan = pesanan::findOrFail($id);
    

        $produkPesanan = produk_pesanan::where('pesanan_id', $pesanan->id)->get();
        foreach ($produkPesanan as $produk) {
            $produkItem = Produk::findOrFail($produk->produk_id);
            if ($produk->kuantitas > $produkItem->stok) {
                return redirect()->route('admin.pesanan.konfirmasi', $pesanan->id)->with('error', 'Stok barang tidak mencukupi!');
            }
        }
    
        // Mengonfirmasi pesanan
        $pesanan->status_pesanan = 'terkonfirmasi';
        $pesanan->save();
    
        // Menambahkan total pembayaran ke dalam omset
        $omset = Omset::firstOrNew([]);
        $omset->total += $pesanan->total_pembayaran;
        $omset->save();
    
        // Memasukkan data ke dalam tabel product_logs dan mengurangi stok produk
        foreach ($produkPesanan as $produk) {
            ProductLog::create([
                'product_id' => $produk->produk_id,
                'quantity' => $produk->kuantitas,
                'type' => 'out'
            ]);
    
            $produkItem = Produk::findOrFail($produk->produk_id);
            $produkItem->stok -= $produk->kuantitas;
            $produkItem->save();
        }
    
        return redirect()->route('admin.pesanan.konfirmasi', $pesanan->id)->with('success', 'Pesanan berhasil dikonfirmasi!');
    }
    public function batalkan(Request $request, $id)
    {
        $pesanan = pesanan::findOrFail($id);

        $pesanan->status_pesanan = 'belum_terkonfirmasi';
        $pesanan->save();
        $omset = omset::firstOrNew([]);
        $omset->total -= $pesanan->total_pembayaran;
     $omset->save();
        $produkPesanan = produk_pesanan::where('pesanan_id', $pesanan->id)->get();
        foreach ($produkPesanan as $produk) {
            ProductLog::where('product_id', $produk->produk_id)
                ->where('type', 'out')
                ->where('quantity', $produk->kuantitas)
                ->delete();
                $produkItem = produk::findOrFail($produk->produk_id);
                $produkItem->stok += $produk->kuantitas;
                $produkItem->save();
        }
      
        return redirect()->route('admin.pesanan.konfirmasi', $pesanan->id)->with('success', 'Pesanan berhasil dikonfirmasi!');
    }
    public function index()
    {
        $metodePembayaran = pembayaran::all();
        return view('layouts.admin.viewmetode', compact('metodePembayaran'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'metode_pembayaran' => 'required|string',
            'nomor_pembayaran' => 'required|integer',
        ]);

                pembayaran::create([
                    'metode_pembayaran' => $request->metode_pembayaran,
                    'nomor' => $request->nomor_pembayaran,
                ]);

        return redirect()->route('admin.metode_pembayaran.index')->with('success', 'Metode Pembayaran berhasil ditambahkan!');
    }
    public function destroy($id)
{
    $metode = pembayaran::findOrFail($id);
    $metode->delete();

    return redirect()->route('admin.metode_pembayaran.index')->with('success', 'Metode Pembayaran berhasil dihapus!');
}
public function update(Request $request, $id)
{
    $request->validate([
        'metode_pembayaran' => 'required|string',
        'nomor_pembayaran' => 'required',
    ]);

    $metode = pembayaran::findOrFail($id);
    $metode->update([
        'metode_pembayaran' => $request->metode_pembayaran,
        'nomor' => $request->nomor_pembayaran,
    ]);

    return redirect()->route('admin.metode_pembayaran.index')->with('success', 'Metode Pembayaran berhasil diperbarui!');
}

}
