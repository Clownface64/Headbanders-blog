<?php

class HomeController extends MasterController{

	// Properties

	//Constructor
	public function __construct($dbc) {
		
		//Run the parent constructor
		parent::__construct();

		$this->dbc = $dbc;
	}

	//Methods (functions)
	
	public function buildHTML() {

		$this->plates->render('home');
	}
}