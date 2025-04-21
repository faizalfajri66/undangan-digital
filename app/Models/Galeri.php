<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $fillable = ['undangan_id', 'gambar'];

    public function undangan()
    {
        return $this->belongsTo(Undangan::class);
    }
}
