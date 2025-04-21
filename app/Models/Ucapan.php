<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ucapan extends Model
{
    use HasFactory;

    protected $fillable = ['undangan_id', 'nama', 'pesan'];

    public function undangan()
    {
        return $this->belongsTo(Undangan::class);
    }
}
