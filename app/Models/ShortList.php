<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortList extends Model
{
    use HasFactory;
    public $table= "company_applied_job_shortlist";
    protected $fillable = [
        'company_id',
        'applied_job_id'
    ];
}
