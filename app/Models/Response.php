<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Response extends Model
{
    use HasFactory;
    public function mail(){
        return $this->belongsTo(Contact::class);
    }
}
