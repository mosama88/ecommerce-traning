<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\OtpNotification;
use App\Http\Requests\Auth\ForgetPasswordRequest;

class ForgetPasswordController extends Controller
{
    public function showEnterEmail()
    {
        return view('website.auth.forget_password');
    }


    public function sendOtp(ForgetPasswordRequest $request)
    {

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->withErrors(['error' => 'Enter your email correctly.']);
            $user->notify(new OtpNotification());
        }
        return redirect()->route('forgetPassword.showEnterOtp', ['email' => $user->email]);
    }


    public function showEnterOtp($email)
    {
        return view('website.auth.Entercode', ['email' => $email]);
    }


}