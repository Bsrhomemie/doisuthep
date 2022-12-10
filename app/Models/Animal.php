<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;
    protected $table = 'animals';

    public function Doisuthep_db()
    {
        return $this->hasMany(Doisuthep_db::class, 'id', 'id');
    }
}
