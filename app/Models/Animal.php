<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;
    protected $table = 'animals';
    public $timestamps = false;

    protected $fillable = [
        'kingdom','phylum','class','order','family','genus',
        'species','characteristics_th','characteristics_en','behavior_th','behavior_en',
        'habitat_th','habitat_en','food_th','food_en','conservation_status_th','conservation_status_en',
        'references_th','references_en','doisuthep_db_id'
    ];
}
