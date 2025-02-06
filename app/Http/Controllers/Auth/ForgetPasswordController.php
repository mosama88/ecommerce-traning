<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Ichtrojan\Otp\Otp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\OtpNotification;
use App\Http\Requests\Auth\CheckOtpRequest;
use App\Http\Requests\Auth\ResetPasswordRequest;
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
            return redirect()->back()->withErrors(['error' => 'Enter your email correctly']);
        }

        $user->notify(new OtpNotification());

        return redirect()->route('forgetPassword.showEnterOtp', ['email' => $user->email]);
    }



    public function showEnterOtp($email)
    {
        return view('website.auth.Entercode', ['email' => $email]);
    }


    public function checkOtp(CheckOtpRequest $request)
    {
        $code = $request->code1 . $request->code2 . $request->code3 . $request->code4;

        $otp = (new Otp)->validate($request->email, $code);

        if (!$otp->status) {
            return redirect()->back()->withErrors(['error' => 'Invalid code']);
        }

        session([
            'otp_verified_email' => $request->email,
            'otp_verified_code' => $code,
        ]);

        return redirect()->route('forgetPassword.showResetPassword', ['email' => $request->email, 'code' => $code]);
    }



    public function showResetPassword($email, $code)
    {
        return view('website.auth.reset_password', compact('email', 'code'));
    }


    public function resetPassword(ResetPasswordRequest $request)
    {
        if (!$this->isOtpValid($request->email, $request->code)) {
            return redirect()->back()->withErrors(['error' => 'Try again.']);
        }

        $user = User::where('email', $request->email)->firstOrFail();
        $user->update(['password' => $request->password]);

        session()->forget(['otp_verified_email', 'otp_verified_code']);

        return redirect()->route('login')->with('success', 'Password reset successfully.');
    }

    private function isOtpValid($email, $code): bool
    {
        return session('otp_verified_email') === $email && session('otp_verified_code') === $code;
    }
}
