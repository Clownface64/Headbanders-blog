<?php

class HomeController extends MasterController{

	// Properties

	//Constructor
	public function __construct($dbc) {
		$this->dbc = $dbc;
	}

	//Methods (functions)
	
	public function buildHTML() {

		//Instantiate (create and instace) of plates library
		$plates = new League\Plates\Engine('app/templates');

		echo $plates->render('home');
	}
}