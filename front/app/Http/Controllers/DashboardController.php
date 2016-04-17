<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Debugbar;

class DashboardController extends BaseController
{
    public function showIndex() {
        return view('dashboard.index');
    }
}
