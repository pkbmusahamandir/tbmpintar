<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ebook extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'author',
        'publisher',
        'year',
        'cover',
        'pdf',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
