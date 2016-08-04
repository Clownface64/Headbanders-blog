<?php

class HomeController {

	// Properties

	//Constructor

	//Methods (functions)
	
	public function buildHTML() {

		//Instantiate (create and instace) of plates library
		$plates = new League\Plates\Engine('app/templates');

		echo $plates->render('home');
	}
}