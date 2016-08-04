<?php 

class SignUpController {

	// Properties

	//Constructor

	//Methods (functions)
	public function registerAccount() {

		//Validate the users data 

		//Check the database to see if the email is in use 

		//Check the strength of the password
	}

	public function buildHTML() {

		//Instantiate (create and instace) of plates library
		$plates = new League\Plates\Engine('app/templates');

		echo $plates->render('sign-up');
	}
}