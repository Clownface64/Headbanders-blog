<?php 

abstract class MasterController { 

	protected $title;
	protected $metaDesc;
	protected $dbc;
	protected $plates;

	public function __construct() {
		
		//Instantiate (create and instace) of plates library
		$this->plates = new League\Plates\Engine('app/templates');
		
	}

	//Force all children to have a build html function
	abstract public function buildHTML();

	protected function mostViewdPosts() {
		
	}

}