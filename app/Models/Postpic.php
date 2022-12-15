<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 

class Postpic extends Model
{
    use HasFactory;
    protected $table = 'post_pics';
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo('App\Post');
    }
}
