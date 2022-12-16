<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;
    protected $table = 'pictures';
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo('App\Post');
    }
}
