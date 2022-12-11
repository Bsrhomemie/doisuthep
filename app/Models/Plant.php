<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    use HasFactory;
    protected $table = 'plants';

    protected $fillable = ['kingdom','division','class','order','family',
    'genus','species','stem_th','stem_en','leaf_th','leaf_en','flower_th',
    'flower_en','fruit_th','fruit_en','distribution_th','distribution_en',
    'utilization_th','utilization_en','conservation_status_th',
    'conservation_status_en','references_th','references_en','doisuthep_db_id'];
}
