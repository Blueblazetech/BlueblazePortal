<?php

namespace App\Http\Controllers\Auth;
use Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Event;
use Illuminate\validation\validationException;
use Illuminate\Support\Facades\UsersMiddleware;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';
    // protected $redirectTo = '/JobManagement/admin/home';

    protected function authenticated(Request $request, $user)
    {
        Log::info('Login process initiated.');

        Event::dispatch('login', [$user]);

        if ($user->isAdmin()) {

            return redirect()->route('ad-home');

        }
        return redirect()->route('general-home');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
