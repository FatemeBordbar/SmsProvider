<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsItem extends Model
{
    use HasFactory;

    const TABLE = 'sms_items';
    const ID = 'id';
    const USER_ID = 'user_id';
    const MESSAGE = 'message';
    const NUMBER = 'number';
    const STATE = 'state';
    const RETURN_ID = 'return_id';
    const PROVIDER = 'provider';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
