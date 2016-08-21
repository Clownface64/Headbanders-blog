<?php

class SignInController extends MasterController {
	
	function __construct($dbc){
		
		parent::__construct();

		$this->dbc = $dbc;

		// die("I am here");
		// //If the sign in form has been submited
		if( isset($_POST['sign-in']) ){
			$this->processSignInForm();
		}

	}

public function buildHTML() {

		echo $this->plates->render('home', $this->data);
		

	}
	private function processSignInForm(){ 
		
		$totalErrors = 0;

		//Make sure the email address has been provided
		if( strlen($_POST['email']) < 6 ){

			//Prepare error message
			$this->data['emailMessage'] = 'Invalid email';
			$totalErrors++;
		
		}

		if( strlen($_POST['password']) < 8 ) {

			$this->dat['passwordMessage'] = 'Invalid Password';
			$totalErrors++;

		}

	 	//If there are no errors
		if( $totalErrors == 0 ){

			//Check the database for email
			//Get the hased password
			$fillteredEmail = $this->dbc->real_escape_string( $_POST['email'] );


			//Prepare SQL

			$sql = "SELECT password, user_id
					FROM users 
					WHERE email = '$fillteredEmail' ";

			//Run the query
			$result = $this->dbc->query($sql);

			//Is there a result?
			if( $result->num_rows == 1 ){

				//Check the password
				$userData = $result->fetch_assoc();

				//Check the password
				$passwordResult = password_verify($_POST['password'], $userData['password']);

				//If the result was true
				if( $passwordResult == true ){

					//Log the user in
					$_SESSION['id']

				} else {
					//prepare error message
					$this->data['siginInMessage'] = 'Your email or password are inccorect';
				}

			} else {

				//Credentials dont match
				$this->data['siginInMessage'] = 'Your email or password are inccorect';

			}

		}


	}

}






















