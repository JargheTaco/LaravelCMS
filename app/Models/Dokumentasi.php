<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumentasi extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'img', 'view', 'status', 'publish_date'];


    protected $table = 'dokumentasi'; // Menyesuaikan dengan nama tabel di database
}
