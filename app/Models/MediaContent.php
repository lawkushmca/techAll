<?php

// app/Models/MediaContent.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaContent extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'file_path', 'type', 'is_default', 'page'];
}

