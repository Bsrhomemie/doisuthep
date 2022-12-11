<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doisuthep_db extends Model
{
    use HasFactory;
    protected $table = 'doisuthep_dbs';
    protected $fillable = ['type','name','common_name','local_name',
    'scientific_name','created_at','updated_at'];
}
