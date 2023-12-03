<?php

namespace App\Models;

use App\Helpers\EsUtils;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class members extends Model
{
    use HasFactory;

    protected $table = 'members';

    protected $fillable = [
        'user_id',
        'name',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public static function getMemberNameByUserId($userId)
    {
        $member = self::where('user_id', $userId)->first();

        return $member ? $member->name : '';
    }

    public static function getMemberNameById($userId)
    {
        $member = self::where('id', $userId)->first();

        return $member ? $member->name : '';
    }

    public static function getEmailByMemberId($memberId)
    {
        $member = self::where('id', $memberId)->first();
        $user = User::where('id', $member->user_id)->first();

        return $user ? $user->email : '';
    }

    public static function getEmailByUserId($userId)
    {
        $user = User::where('id', $userId)->first();

        return $user ? $user->email : '';
    }

//    public static function getMemberId()
//    {
//        $userId = EsUtils::getUserId();
//        $member = self::where('user_id', $userId)->first();
//        return $member ? $member->id : '';
//    }
}
