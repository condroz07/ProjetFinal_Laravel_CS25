<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function categoris() {
        return $this->belongsTo(Categoris::class);
    }
    public function couleur() {
        return $this->belongsTo(Couleur::class);
    }
    public function panier() {
        return $this->hasMany(Panier::class);
    }
    public function favoris() {
        return $this->hasMany(Favoris::class);
    }
    public function soldes() {
        return $this->hasMany(Soldes::class);
    }
}
