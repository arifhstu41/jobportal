<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', 'slug', 'content'
    ];

    public function setTypeAttribute($value)
    {
        $this->attributes['type'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
