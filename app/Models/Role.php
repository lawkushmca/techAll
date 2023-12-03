<?php

// app/Models/Role.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name', // Add any other role-related attributes here
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_roles');
    }
}
