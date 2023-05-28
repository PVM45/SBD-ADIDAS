<?php

namespace App\Http\Controllers;

use App\Models\subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscribeController extends Controller
{
    public function subscribe(Request $request)
    {
        $email = $request->input('email');
    
        // Simpan email ke database
        subscription::create(['email' => $email]);
    
        // Kirim email terima kasih
        subscription::KirimEmail($email);
    
        return redirect()->back()->with('success', 'Terima kasih telah subscribe!');
    }
}
