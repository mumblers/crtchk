<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use Notifications;

class ProfileController extends DashboardController
{
    public function show() {
        return view('dashboard.profile');
    }
    
    public function editForm() {
        return view('dashboard.editProfileForm');
    }
    
    public function edit(Request $request) {
        $input = $request->all();
        
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$this->user->id.',id',
        ]);
        
        $this->user->name = $input['name'];
        $this->user->email = $input['email'];
        
        if(!empty($input['password'])) {
            $this->validate($request, [
                'password' => 'required|max:255|Confirmed',
                'password_confirmation' => 'required|max:255',
            ]);
            
            $this->user->password = bcrypt($input['password']);
        }
        
        $this->user->save();
        
        Notifications::success('Your profile has been saved');
        
        return redirect('dashboard/profile');
    }
}
