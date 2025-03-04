<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kepegawaian extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'desc', 'pdf', 'status', 'publish_date'];

    protected $table = 'kepegawaians';
}
