<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateEducation extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidate_id',
        'level',
        'degree',
        'year',
        'institute',
        'result_gpa',
        'notes',
    ];
}
