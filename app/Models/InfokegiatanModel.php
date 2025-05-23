<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfokegiatanModel extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'desc', 'img', 'view', 'status', 'publish_date'];

    protected $table = 'infokegiatan_models';
}
