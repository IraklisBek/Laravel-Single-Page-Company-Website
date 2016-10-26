<?php

namespace App\Http\Controllers\Auth;

use App\Acme\Services\MailService;
use App\Acme\Services\MessageService;
use App\Acme\Services\UserService;
use App\Acme\Services\ValidationService;
use App\Role;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
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
        //$this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            //'role' => $data['role'],
            'password' => bcrypt($data['password']),
        ]);
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getRegister(){
        $roles = Role::all();
        return view('admin.pages.register')
            ->with('roles', $roles);
    }

    private function insertUserCredentials(User $user, Request $request){
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->password = Hash::make($user->password );
        $user->role= "admin";
        $user->confirm = 0;
    }

    private function sendConfirmationEmail(Request $request, $user){
        $token = str_random(30);
        $link = constant('myurl').'confirmRegistration/'. $token;
        $user->confirm_token = $token;
        $data = array(
            'email' => $request->email,
            'bodyMessage' => '<a href="'.$link.'">Click here to confirm registration</a>');
        MailService::sendEmail($data, 'visitor.emails.confirmRegistration');
    }

    private function insertUser(User $user, Request $request){
        try {
            $this->sendConfirmationEmail($request, $user);
            $user->save();
            $user->roles()->sync($request->roles, false);
            MessageService::_message('success', 'Welcome '.$request->name.'! Your registration has been successful. Please Confirm tour registration');
            return true;
        }catch (QueryException $e){
            MessageService::_message('fail', 'There has been an error:<br>'. $e->getMessage());
            return false;
        }
    }

    public function registerUser(Request $request){
        $user = new User;

        $validator = ValidationService::validateCreation($request, $user);
        if($validator->fails())
            return redirect()->route('admin.pages.register')->withErrors($validator)->withInput();

        UserService::passwordsMismatch($request->password, $request->confirmPassword)
            ? redirect()->route('admin.pages.register')
            : $this->insertUserCredentials($user, $request);

        return
            $this->insertUser($user, $request)
                ? redirect()->route('admin.pages.login')
                : redirect()->route('admin.pages.register');
    }

    public function postConfirmRegistration($token){
        $user = UserService::getUserByToken($token);
        if($user){
            $user->confirm = 1;
            $user->save();
            MessageService::_message('success', 'Your registration has been complete');
            return redirect()->route('admin.pages.login');
        }else{
            MessageService::_message('fail', 'Your registration could not been complete');
            return redirect()->route('admin.pages.register');
        }
    }
}
