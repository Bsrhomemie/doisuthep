<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doisuthep_db extends Model
{
    use HasFactory;
    protected $table = 'doisuthep_dbs';
    public function Animal()
    {
        return $this->hasMany(Animal::class, 'id', 'id');
    }
}
