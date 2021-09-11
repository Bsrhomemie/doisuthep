<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $table = 'type_name';
    protected $fillable = [
        'post_name',
        'post_type',
        'content',
    ];

    public function file()
    {
        return $this->hasMany('App\Post');
    }
}
