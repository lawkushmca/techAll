<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TwoFactorToken extends Model
{
    use HasFactory;

    protected $table = 'auth_2fa_tokens';

    protected $fillable = ['user_id', 'token'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
