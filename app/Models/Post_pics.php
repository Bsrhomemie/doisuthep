<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post_pics extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo('App\Post');
    }
}
