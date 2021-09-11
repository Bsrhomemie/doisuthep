<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    public $timestamps = false;

    protected $fillable = [
        'post_name_th',
        'post_type',
        'content_th',
        'post_name_en',
        'content_en',
        'created_at',
        'picture',
        'pdf'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function type()
    {
        return $this->belongsTo('App\Type');
    }
}
