<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class smsHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'phone', 'response_code', 'response_meaning', 'sms_content_id',
    ];
    
    public function status(): BelongsTo
    {
        return $this->belongsTo(smsStatus::class);
    }
}
