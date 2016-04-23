<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Bican\Roles\Models\Role;
use Notifications;
use DB;
use Login;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
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
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        
        $userRole = Role::where('slug', 'user')->first();
        $user->attachRole($userRole);
        
        return $user;
    }
    
    protected function authenticated($request, $user) {
        $lastLogon = DB::table('logins')->where('user_id', $user->id)->orderBy('created_at', 'desc')->take(1)->get();
        
        if(isset($lastLogon[0])) {
            Notifications::info('Welcome back <strong>'.$user->name.'</strong>. You last logon was at '.$lastLogon[0]->created_at.' from '.$lastLogon[0]->ip);
        }
        
        \App\Login::create(['user_id' => $user->id, 'ip' => $_SERVER['REMOTE_ADDR']]);
        
        return redirect()->intended($this->redirectPath());
    }
}
