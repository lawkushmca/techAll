<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request; // Correct the import here
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/status';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:64', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        // Assuming you have a 'roles' relationship in your User model
        // Attach the role with ID 1 to the user
        $user->roles()->attach(1);

        return $user;
    }

    public function registrationStatus(Request $request)
    {
        return redirect('/')->with('status', 'Registration Success');
    }

}
