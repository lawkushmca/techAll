<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\EsUtils;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\HConst;
use App\Models\TwoFactorToken;
use App\Mail\OTP2FANotificationEmail;
use App\Models\Members;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function showLoginForm()
    {
        if (Auth::check()) {
            Auth::logout();
        }

        session()->forget('url.intended');
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($this->is2FAEnabled($user)) {
                // User has 2FA enabled, redirect to 2FA confirmation
//                return redirect()->intended('/2fa/confirm');
                return $this->confirmEmail($user);
            }

            $this->completeLogin($request, $user);

            return redirect()->intended($this->getRedirectPath($user));
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    protected function is2FAEnabled($user)
    {
        // Add logic to determine if 2FA is enabled for the user
        return false; // Replace with your actual 2FA check
    }

    public function completeLogin(Request $request, $user)
    {
        Auth::login($user);
        $this->setSessionRole($request, $user);
        $request->session()->regenerate();
    }

    public function setSessionRole(Request $request, $user)
    {
        if ($user->hasRole(HConst::SESSION_ROLE_MEMBER)) {
            $request->session()->put(HConst::SESSION_ROLE, HConst::SESSION_ROLE_MEMBER);
        } elseif ($user->hasRole(HConst::SESSION_ROLE_ADMIN)) {
            $request->session()->put(HConst::SESSION_ROLE, HConst::SESSION_ROLE_ADMIN);
        } else {
            $request->session()->put(HConst::SESSION_ROLE, ''); // Set default role if not recognized
        }
    }

    public function getRedirectPath(User $user)
    {
        if ($user->hasRole(HConst::SESSION_ROLE_MEMBER)) {
            return '/meetings';
        } elseif ($user->hasRole(HConst::SESSION_ROLE_ADMIN)) {
            return '/admin/members';
        }

        return '/';
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        return redirect('/login')->with('status', 'You have been logged out successfully.');
    }

    public static function confirmEmail(User $user)
    {
        $email = $user->email;
        $id = $user->id;
        return view('auth.two-factor-auth.email-confirm', compact('email', 'id'));
    }

    protected static function generateToken($userId)
    {
        // Generate and save the token
        $token = rand(1000, 9999);
        TwoFactorToken::create([
            'user_id' => $userId,
            'token' => $token,
        ]);

        return $token;
    }

    public static function sendOtp(Request $request)
    {
        $email = $request->email;

        if ($request->verification_method == 'email') {
            $token = static::generateToken($request->id);
            static::sendEmailToken($request->id, $token);
        }
        return view('auth.two-factor-auth.verify-otp', compact('email'));

    }

    protected static function sendEmailToken($userId, $token)
    {
        $userName = Members::getMemberNameById($userId);
        $email = Members::getEmailByUserId($userId);

        $emailData = [
            'otp' => $token,
            'name' => $userName === '' ? 'Participant' : $userName,
        ];

        $ccEmail = 'ruchir-01@mailinator.com';
        // Send the email
        if (!empty($email)) {
            Mail::to($email)->cc($ccEmail)->send(new OTP2FANotificationEmail($emailData));
        }
    }

    public function verify(Request $request)
    {

        $request->validate([
            'token' => 'required|digits:4',
        ]);

        $isValidToken = TwoFactorToken::where('token', $request->token)->exists();

        if ($isValidToken) {
            $user = Auth::user();

            $this->completeLogin($request, $user);

            TwoFactorToken::where('user_id', $user->id)->delete();

            return redirect()->intended($this->getRedirectPath($user));
        }

        return back()->withErrors(['token' => 'Invalid token']);
    }
}

