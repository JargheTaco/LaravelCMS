<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function show($slug)
    {
        return view('front.pengumuman.show', [
            'pengumuman' => Pengumuman::whereSlug($slug)->first(),
        ]);
    }
}
