<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function sendMessage(Request $request)
    {
        $token = '7668496123:AAEEzQIACOM7TuJ5jb5BXfa0EEVLTIeF0sE'; // Ganti dengan token bot Telegram Anda
        $chat_id = '7643617622'; // Ganti dengan ID chat Telegram Anda

        // Ambil data dari form
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $message = $request->input('message');

        // Format pesan untuk Telegram
        $text = "Formulir Kontak Baru:\n";
        $text .= "Nama: $name\n";
        $text .= "Email: $email\n";
        $text .= "Telepon: $phone\n";
        $text .= "Pesan: $message\n";

        // Kirim pesan ke bot Telegram menggunakan API
        $url = "https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=" . urlencode($text);

        // Melakukan permintaan HTTP ke API Telegram
        $response = file_get_contents($url);

        if ($response) {
            return back()->with('success', 'Pesan berhasil dikirim!');
        } else {
            return back()->with('error', 'Terjadi kesalahan dalam mengirim pesan!');
        }
    }
}