<?php

namespace App\Http\Controllers\Auth;

use App\Acme\Services\MessageService;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLogin(){
        return view('visitor.auth.login');
    }

    public function logUser(Request $request)
    {
        $remember = $request->has('remember');
        if (!Auth::attempt([
            'email' => $request->emailLogin,
            'password' => $request->passwordLogin,
        ], $remember)
        ) return redirect()->back()
            ->with('type', 'error')
            ->with('fail', 'Invalid credentials');

        if (Auth::user()->isAdminTesting()) {
            return redirect()->route('admin.pages.index')
                ->with('type', 'success')
                ->with('success', 'Welcome back ' . auth()->user()->name);
        }else{
            return redirect()->route('pages.index')
                ->with('type', 'success')
                ->with('success', 'Welcome back ' . auth()->user()->name);
        }
    }

    public function logoutUser(){
        MessageService::_message('success', 'Goodbye '.Auth::user()->name.'. Hope to see you soon');
        Auth::logout();
        return redirect()->route('admin.pages.login');
    }

}
