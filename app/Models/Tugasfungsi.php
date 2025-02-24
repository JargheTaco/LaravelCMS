<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugasfungsi extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'img', 'status', 'publish_date'];


    protected $table = 'tugasfungsis'; // Menyesuaikan dengan nama tabel di database
}
