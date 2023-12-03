<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function member()
    {
        return $this->hasOne(Members::class, 'user_id', 'id');
    }

    // Define a relationship for roles
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles');
    }

    // Check if the user has a specific role
    public function hasRole($role)
    {
        return $this->roles->contains('name', $role);
    }
}
