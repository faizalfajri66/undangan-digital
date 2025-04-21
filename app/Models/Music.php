<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $table = 'music';

    protected $fillable = [
        'judul',
        'artis',
        'file',
    ];

    public function undangan()
    {
        return $this->belongsTo(Undangan::class);
    }

}
