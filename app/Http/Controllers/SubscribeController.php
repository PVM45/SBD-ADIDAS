<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscribeController extends Controller
{
    public function kirimEmail(Request $request)
    {
        $email = $request->input('email'); // Mendapatkan email dari input pengguna

        // Kirim email menggunakan fungsi Mail::to()
        Mail::to($email)->send(new \App\Mail\EmailSubscription());

        return redirect()->back()->with('success', 'Email telah terkirim!');
    }
}
