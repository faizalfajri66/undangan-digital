<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Undangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug', 'nama_pria', 'nama_wanita', 'tanggal_acara',
        'lokasi', 'musik', 'cover', 'template',
        'quote', 'sumber_quote'
    ];    

    protected $casts = [
        'tanggal_acara' => 'datetime',
        'galeri' => 'array',
    ];

    
    // 🔗 Relasi ke Galeri
    public function galeris()
    {
        return $this->hasMany(Galeri::class);
    }

    // 🔗 Relasi ke Ucapan (RSVP)
    public function ucapans()
    {
        return $this->hasMany(Ucapan::class);
    }

    // 🔗 Relasi ke LoveStory
    public function loveStories()
    {
        return $this->hasMany(LoveStory::class);
    }

    public function rsvps()
    {
        return $this->hasMany(Rsvp::class);
    }

    public function music()
    {
        return $this->hasOne(Music::class);
    }

}
