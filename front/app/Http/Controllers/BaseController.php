<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use View;

class BaseController extends Controller
{
    protected $user = null;
    
    public function __construct() {
        if(Auth::check()){
            $this->user = Auth::user();
            View::share('user', $this->user);
        }
    }
}
