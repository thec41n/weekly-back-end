<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // Kita mendefinisikan kolom apa saja yang dapat diisi
    protected $fillable = [
        'title', 'blog_content', 'author'
    ];
}
