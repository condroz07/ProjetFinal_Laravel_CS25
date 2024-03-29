<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public function blogcateg() {
        return $this->belongsTo(BlogCateg::class);
    }
    public function tag() {
        return $this->belongsTo(Tag::class);
    }
    public function cblog() {
        return $this->hasMany(Cblog::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
