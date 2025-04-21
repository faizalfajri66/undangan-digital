<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoveStory extends Model
{
    use HasFactory;

    protected $fillable = ['undangan_id', 'judul', 'cerita', 'tanggal'];

    public function undangan()
    {
        return $this->belongsTo(Undangan::class);
    }
}

