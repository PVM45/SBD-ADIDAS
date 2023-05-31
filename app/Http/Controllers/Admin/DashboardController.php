<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\produk;
use App\Models\User;
use TCPDF;
use App\Models\omset;
use App\Models\pesanan;
use Illuminate\Support\Facades\Redirect;
class DashboardController extends Controller
{
    public function index() {
        $jumlahProduk = produk::count();
        $users = User::where('role_id', '!=', 1)->get();
        $jumlahUser = $users->count();
        $pesanans=pesanan::where('status_pesanan','=','terkonfirmasi');
        $pesanan=$pesanans->count();
        $pesanann=pesanan::where('status_pesanan','=','belum_terkonfirmasi');
        $pending=$pesanann->count();
        $omset = omset::first(); 
        $total = $omset->total; 
        return view('layouts.admin.dashboard',compact('jumlahProduk','jumlahUser','pesanan','total','pending'));
    }

   
          public function generate()
          {
              // Ambil data yang dibutuhkan untuk laporan (misalnya dari database atau variabel lainnya)
              $jumlahProduk = produk::count();
              $users = User::where('role_id', '!=', 1)->get();
              $jumlahUser = $users->count();
              $Pesanan = pesanan::where('status_pesanan', '=','terkonfirmasi')->get();
              $jumlahPesanan=$Pesanan->count();
              $Pesanans = pesanan::where('status_pesanan','=', 'belum_terkonfirmasi')->get();
              $pesananpending=$Pesanans->count();
              $omset = omset::first(); 
              $total = $omset->total; 
      
              // Buat objek TCPDF
              $pdf = new TCPDF();
      
              // Set dokumen informasi dan header
              $pdf->SetCreator('ADIDAS');
              $pdf->SetAuthor('Kelompok 2');
              $pdf->SetTitle('Laporan Dashboard Admin Adidas');
              $pdf->SetHeaderData('', 0, 'Laporan Dashboard Admin Adidas', '');
      
              // Buat halaman
              $pdf->AddPage();
              $logoPath = storage_path('app/public/bg.jpeg');
              $logoWidth = 80;  // Lebar logo yang diinginkan
              $logoHeight = 60; // Tinggi logo yang diinginkan
              $logoX = ($pdf->getPageWidth() - $logoWidth) / 2;
              $logoY = ($pdf->getPageHeight() - $logoHeight) / 2;
              $pdf->Image($logoPath, $logoX, $logoY, $logoWidth, $logoHeight, 'jpeg', '', '', true, 300, '', false, false, 0);
              // Tambahkan konten ke halaman
              $html = '
                  <h1>Laporan</h1>
                  <p>Jumlah Produk: ' . $jumlahProduk . '</p>
                  <p>Jumlah User: ' . $jumlahUser . '</p>
                  <p>Jumlah Pesanan Sukses: ' . $jumlahPesanan . '</p>
                  <p>Jumlah Pesanan Pending: ' . $pesananpending . '</p>
                  <p>Omset: Rp' . number_format($total, 2) . '</p>
              ';
              $pdf->writeHTML($html, true, false, true, false, '');
      
              $pdf->Output(storage_path('app/public/laporan.pdf'), 'F');

        // Redirect kembali ke halaman sebelumnya
        return Redirect::back();
          }
}
