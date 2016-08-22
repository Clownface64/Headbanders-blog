<?php 

abstract class MasterController { 

	protected $title;
	protected $metaDesc;
	protected $dbc;
	protected $plates;
	protected $data = [];

	public function __construct() {
		
		//Instantiate (create and instace) of plates library
		$this->plates = new League\Plates\Engine('app/templates');
		
	}

	//Force all children to have a build html function
	abstract public function buildHTML();

	public function mustBeLoggedIn() {
		//If you are not loged in
		if( !isset($_SESSION['id']) ) {
			
			 //redirect use to login page
			header('location: index.php?page=home');
		}
	}

	public function mustBeLoggedOut() {
		//If you are not loged in
		if( isset($_SESSION['id']) ) {
			
			 //redirect use to login page
			header('location: index.php?page=home');
		}
	}

	protected function mostViewdPosts() {
		
	}

}