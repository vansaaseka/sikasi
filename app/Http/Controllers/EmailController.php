<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\KirimEmail;
use Illuminate\Http\Request;
use App\Notifications\Informasi;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function kirim ()
    {
        $data = [
            'judul' => 'SIKASI',
            'body' => 'Berhasil'
        ];
        $tujuan='derieri62@gmail.com';
        Mail::to($tujuan)->send(new KirimEmail($data));
        return 'Berhasil';
        // return new KirimEmail();
    }

    // public function notif(){
    //     $user = User::first();
    //     $data = [
    //         'line1' => '',
    //         'action' => '',
    //         'line2' => ''
    //     ]
    //     $user->notify(new Informasi($data));
    // }
}
