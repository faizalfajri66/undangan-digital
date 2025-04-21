<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rsvp extends Model
{
    protected $fillable = ['nama', 'pesan', 'undangan_id']; 

    // Relasi ke model Undangan
    public function undangan()
    {
        return $this->belongsTo(Undangan::class); // Relasi belongsTo ke Undangan
    }
}

