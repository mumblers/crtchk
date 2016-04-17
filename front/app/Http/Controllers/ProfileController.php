<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Validator;

class ProfileController extends DashboardController
{
    public function show() {
        return view('dashboard.profile');
    }
    
    public function editForm() {
        return view('dashboard.editProfileForm');
    }
    
    public function edit(Request $request) {
        $user = Auth::user();
        $input = $request->all();
        
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$user->id.',id',
        ]);
        
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->save();
        
        return redirect('dashboard/profile');
    }
}
