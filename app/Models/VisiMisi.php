<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisiMisi extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'desc'];


    protected $table = 'visi_misis'; // Menyesuaikan dengan nama tabel di database
}
