<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Undangan extends Model
{
    use HasFactory;

    protected $table = 'undangans';

    protected $fillable = [
        'slug',
        'nama_pria',
        'nama_wanita',
        'tanggal_acara',
        'lokasi',
        'musik',
        'cover',
        'template',
        'quote',
        'sumber_quote',
        'ayah_pria',
        'ibu_pria',
        'instagram_pria',
        'ayah_wanita',
        'ibu_wanita',
        'instagram_wanita',
        'rekening_nama',
        'rekening_bank',
        'rekening_nomor',
        // Hapus 'galeri' kalau galeri pakai tabel relasi
    ];

    protected $casts = [
        'tanggal_acara' => 'datetime',
        // 'galeri' => 'array', // Aktifkan hanya jika galeri disimpan di kolom JSON
    ];

    // Relasi
    public function galeris()
    {
        return $this->hasMany(Galeri::class);
    }

    public function ucapans()
    {
        return $this->hasMany(Ucapan::class);
    }

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
