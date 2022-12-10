<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $table = 'files_posts';
    public $timestamps = false;
    protected $fillable = [
        'file_name',
        'file_type',
        'post_id',
        'created_at',
        'updated_at',

    ];
    public function user()
    {
        return $this->belongsTo('App\Post');
    }
}
