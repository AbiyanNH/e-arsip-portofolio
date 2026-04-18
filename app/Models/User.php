<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relasi: User memiliki banyak Post
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // Relasi: User memiliki banyak Category (many to many)
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}