<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files_post extends Model
{
    use HasFactory;

    protected $table = 'files_posts';
    protected $fillable = [
        'file_path',
        'uniqid',
        'post_id',
        'created_at',
        'updated_at',

    ];
    public function user()
    {
        return $this->belongsTo('App\Post');
    }
}
