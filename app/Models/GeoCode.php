<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeoCode extends Model
{
    use HasFactory;

    protected $table= 'tblgeocode';

    public $timestamps= false;
}
