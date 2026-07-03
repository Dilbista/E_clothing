<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordOtp extends Model
{
    protected $fillable = [
        'email',
        'otp',
        'expires_at'
    ];

    public function user()
    {
        // The OTP belongs to a User (matching by email)
        return $this->belongsTo(User::class, 'email');
    }
}
