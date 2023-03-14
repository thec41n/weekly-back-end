<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    // Jangan lupa import SoftDeletes
    use HasFactory, SoftDeletes;
    // Kita mendefinisikan kolom apa saja yang dapat diisi
    protected $fillable = [
        'title', 'blog_content', 'author'
    ];

    /**
     * Get the writer that owns the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // BelongsTo jangan lupa di import
    public function writer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author', 'id');
    }
}
