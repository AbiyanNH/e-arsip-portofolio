<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',      // asal surat
        'slug',
        'nosurat',    // nomor surat
        'tanggal',    // tanggal surat
        'perihal',    // keterangan
        'diterima',   // tanggal diterima
        'image',      // file PDF
        'published_at'
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    // Relasi: Post milik satu User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi: Post milik satu Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // Akses untuk author (alias dari user)
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}