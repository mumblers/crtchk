<?php

namespace App\Http\Controllers;

use Auth;

class DomainController extends BaseController {

	/**
	 * Show a list of all domains of the current logged in user.
	 * @return $this
	 */
	function getAll(){
		$user = Auth::user();

		$domains = $user->domains;

		return view('dashboard.domains')
			->with("domains" , $domains);
	}

	/**
	 * Get the information of a single Domain.
	 * @return $this
	 */
	function getView(){

	}

	/**
	 * Get the page where you can edit a Domain.
	 * @return $this
	 */
	function getEdit(){

	}

	/**
	 * Get the page where you can delete a Domain.
	 * @return $this
	 */
	function getDelete(){

	}

	/**
	 * Handle an edit action of a Domain.
	 * @return $this
	 */
	function postEdit(){

	}

	/**
	 * Handle a del
	 * @return $this
	 */
	function postDelete(){

	}


}