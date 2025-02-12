<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'title', 'slug', 'desc', 'img', 'view', 'status', 'publish_date'];

    //relasi ke categories
    
    public function Category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    protected $table = 'berita'; // Menyesuaikan dengan nama tabel di database
}
