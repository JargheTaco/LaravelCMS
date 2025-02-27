<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Infokegiatan;
use Illuminate\Http\Request;

class InfokegiatanController extends Controller
{
    public function show($slug)
    {
        return view('front.infokegiatan.show', [
            'infokegiatan' => Infokegiatan::whereSlug($slug)->first(),
        ]);
    }
}
