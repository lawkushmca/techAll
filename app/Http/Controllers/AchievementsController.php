<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\MediaContent;
use Illuminate\Http\Request;


class AchievementsController extends Controller
{
   public function index()
   {
       $models = MediaContent::where('page', 'achievements')->orderBy('created_at', 'asc')->get();
       return view('achievements', compact('models'));
   }

}
