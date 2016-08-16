<?php

class AccountController extends MasterController {

	public function __construct($dbc) {

		parent::__construct();

		$this->dbc = $dbc;
	
		//If you are not loged in
			if( !isset($_SESSION['id']) ) {
				
				 //redirect use to login page
				header('location: index.php?page=home');
			}
	}

	

	public function buildHTML() {
		
		echo $this->plates->render('account');

	}

}

if ( isset($_SESSION['id, role']) ) {
	
}