<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilPejabat extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'jabatan' , 'slug', 'desc', 'img', 'status', 'publish_date'];

    protected $table = 'profil_pejabats';
}
