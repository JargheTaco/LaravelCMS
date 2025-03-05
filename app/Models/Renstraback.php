<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renstraback extends Model
{
    use HasFactory;
    protected $fillable = ['title','year', 'slug', 'desc', 'pdf', 'status', 'publish_date'];

    protected $table = 'renstrabacks';
}
