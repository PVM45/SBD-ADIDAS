<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Models\kategori;
use App\Models\subkategori;

class ContactController extends Controller
{
    public function contact(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email:rfc,dns',
            'isi' => 'required',
        ]);

        $data = [
            'nama' => $request->nama,
            'email' => $request->email,
            'isi' => $request->isi,
        ];

        Mail::to('sbd.adidas02@gmail.com')->send(new ContactMail($data));

        return redirect()->back()->with('success', 'Email has been sent successfully!');
    }

    public function ShowContact()
    {
        $kategoris = kategori::all();
        $subkategoris = subkategori::all();

        return view('frontend.frontend_layout.body.contact', compact('kategoris','subkategoris'));

    }

}
