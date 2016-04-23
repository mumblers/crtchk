<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use View;
use Storage;
use Debugbar;
use Notifications;

class SettingsController extends DashboardController
{
    public function __construct() {
        parent::__construct();
        
        $userSettings = $this->user->settings;
        $allowedSettings = $this->getAvailableSettings();
        
        $viewSettings = [];
        foreach($allowedSettings as $key => $contents) {
            $item = [];
            if(is_array($userSettings)) {
                if(isset($userSettings[$key]))
                    $item['value'] = $userSettings[$key];
            }
            
            if(!isset($item['value'])) {
                $item['value'] = $contents['default'];
            }
            $item['description'] = $contents['description'];
            $viewSettings[$key] = $item;
        }
        
        View::share('settings', $viewSettings);
    }
    
    protected function getAvailableSettings() {
        return config('usersettings');
    }
    
    public function show() {
        return view('dashboard.settings');
    }
    
    public function edit(Request $request) {
        $input = $request->all();
        
        $availableSettings = $this->getAvailableSettings();
        $validatorList = [];
        foreach($availableSettings as $setting => $contents) {
            $validatorList[$setting] = $contents['validator'];
        }
        
        $this->validate($request, $validatorList);
        
        // Filter the input, so only the allowed settings are saved
        $allowed = array_keys($availableSettings);
        $filteredSettings = array_intersect_key($input, array_fill_keys($allowed, null));
        
        $this->user->settings = $filteredSettings;
        $this->user->save();
        
        Notifications::success('Your settings has been saved');
        
        return redirect('dashboard/settings');
    }
}
