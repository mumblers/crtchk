<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use View;
use App\User;

class UsersController extends DashboardController
{
    public function show() {
        $users = User::all();
        View::share('users', $users);
        
        return view('dashboard.users.list');
    }
    
    public function details($id) {
        $user = User::findOrFail($id);
        View::share('detailedUser', $user);
        
        return view('dashboard.users.details');
    }
}
