<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class subscription extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
    ];

    public static function KirimEmail($email)
    {
        $data = ['email' => $email];
        Mail::send('emails.subscription', $data, function ($message) use ($email) {
            $message->to($email)
                ->subject('Terima Kasih Telah Subscribe');
        });
    }
}

