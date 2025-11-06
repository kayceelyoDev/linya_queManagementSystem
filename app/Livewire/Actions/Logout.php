<?php

namespace App\Livewire\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Logout
{
    /**
     * Log the current user out of the application.
     */
    public function __invoke()
    {
        $user = Auth::guard('web')->user(); // get currently logged-in user

        if ($user) {
            $user->status = 'offline'; // set status to offline
            $user->save(); // save changes to database
        }

        Auth::guard('web')->logout(); // logout user
        Session::invalidate(); // invalidate session
        Session::regenerateToken(); // regenerate CSRF token

        return redirect('/'); // redirect to homepage
    }
}
