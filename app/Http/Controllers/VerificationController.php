<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;

class VerificationController extends Controller
{
    /**
     * Menampilkan pemberitahuan verifikasi.
     *
     * @return \Illuminate\Http\Response
     */
    public function notice()
    {
        return view('mail.index', [
            'title' => 'Mail',
        ]);
    }

    /**
     * Verifikasi email pengguna.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function verify(Request $request)
    {
        if ($request->route('id') != $request->user()->getKey()) {
            abort(403);
        }

        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return redirect(RouteServiceProvider::HOME)->with('verified', true);
    }

    /**
     * Kirim ulang email verifikasi.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function send(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('verification-link-sent', true);
    }
}
