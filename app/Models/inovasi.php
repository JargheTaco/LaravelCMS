<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inovasi extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'desc', 'img', 'view', 'status', 'publish_date'];

    //relasi ke categories
    

    protected $table = 'inovasis';
}
