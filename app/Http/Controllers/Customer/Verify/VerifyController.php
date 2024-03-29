<?php

namespace App\Http\Controllers\Customer\Verify;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class VerifyController extends Controller
{
    //

    public function verifyNotice()
    {
        return view('theme.auth.customer.verify.index');
    }

    public function verification(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect()->route('customer.profil');
    }

    public function resendVerificationEmail(Request $request)
    {

        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    }
}
