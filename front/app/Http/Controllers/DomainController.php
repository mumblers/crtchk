<?php

namespace App\Http\Controllers;

use App\Domain;
use Auth;

class DomainController extends BaseController {

	/**
	 * Show a list of all domains of the current logged in user.
	 * @return $this
	 */
	function getAll(){
		$user = Auth::user();

		$domains = $user->domains;

		return view('dashboard.domain.list')
			->with("domains" , $domains);
	}

	/**
	 * Get the information of a single Domain.
	 * @param Domain $domain
	 * @return $this
	 */
	function getView(Domain $domain){
		return view('dashboard.domain.details')
			->with('domain', $domain);
	}

	/**
	 * Get the page where you can edit a Domain.
	 * @return $this
	 */
	function getEdit(Domain $domain){

	}

	/**
	 * Get the page where you can delete a Domain.
	 * @return $this
	 */
	function getDelete(Domain $domain){

	}

	/**
	 * Handle an edit action of a Domain.
	 * @return $this
	 */
	function postEdit(Domain $domain){

	}

	/**
	 * Handle a del
	 * @return $this
	 */
	function postDelete(Domain $domain){

	}


}