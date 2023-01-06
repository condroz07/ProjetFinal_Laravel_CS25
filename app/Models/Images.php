<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;

    public function categoris() {
        return $this->belongsTo(Categoris::class);
    }
    public function couleur() {
        return $this->belongsTo(Categoris::class);
    }
}
