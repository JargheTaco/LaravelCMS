<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoRequestController extends Controller
{
    public function sendInfoRequest(Request $request)
    {
        $token = '7863735540:AAGTmJJgMcAUMmNlqKlPMl0ETmx9YfHhre8';  // Ganti dengan token bot Telegram Anda
        $chat_id = '7643617622';  // Ganti dengan ID chat Telegram Anda

        // Ambil data dari form
        $namaPemohon = $request->input('namaPemohon');
        $noIdentitas = $request->input('noIdentitas');
        $email = $request->input('email');
        $noTelp = $request->input('noTelp');
        $informasi = $request->input('informasi');
        $tujuanPenggunaan = $request->input('tujuanPenggunaan');
        $kategoriPemohon = $request->input('kategoriPemohon');
        $caraMemperolehInformasi = implode(', ', $request->input('caraMemperolehInformasi', []));
        $mendapatkanSalinanInformasi = implode(', ', $request->input('mendapatkanSalinanInformasi', []));
        $caraMendapatkanSalinanInformasi = implode(', ', $request->input('caraMendapatkanSalinanInformasi', []));

        // Format pesan untuk Telegram
        $text = "Permohonan Informasi Baru:\n";
        $text .= "Nama Pemohon: $namaPemohon\n";
        $text .= "No Identitas: $noIdentitas\n";
        $text .= "Email: $email\n";
        $text .= "No. Telp: $noTelp\n";
        $text .= "Rincian Informasi: $informasi\n";
        $text .= "Tujuan Penggunaan: $tujuanPenggunaan\n";
        $text .= "Kategori Pemohon: $kategoriPemohon\n";
        $text .= "Cara Memperoleh Informasi: $caraMemperolehInformasi\n";
        $text .= "Mendapatkan Salinan Informasi: $mendapatkanSalinanInformasi\n";
        $text .= "Cara Mendapatkan Salinan: $caraMendapatkanSalinanInformasi\n";

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