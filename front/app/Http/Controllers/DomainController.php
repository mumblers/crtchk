<?php

namespace App\Http\Controllers;

class DomainController extends BaseController {

	function getPage(){
		return view('dashboard.domains');
	}

}