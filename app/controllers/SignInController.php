<?php

class SignInController extends MasterController {
	
	function __construct($dbc){
		
		parent::__construct();

		$this->dbc = $dbc;

		$this->mustBeLoggedOut();

		// die("I am here");
		// //If the sign in form has been submited
		if( isset($_POST['sign-in']) ){
			$this->processSignInForm();
		}

	}

public function buildHTML() {

		echo $this->plates->render('sign-in', $this->data);
		

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

			$this->data['passwordMessage'] = 'Invalid Password';
			$totalErrors++;

		}



	 	//If there are no errors
		if( $totalErrors == 0 ){

			//Check the database for email
			//Get the hased password
			$fillteredEmail = $this->dbc->real_escape_string( $_POST['email'] );


			//Prepare SQL

			$sql = "SELECT user_id, password
					FROM user 
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

					$_SESSION['id'] = $userData['user_id'];

					header('Location: index.php?page=home');

				} else {
					//prepare error message
					$this->data['signInMessage'] = 'Your email or password are inccorect';
				}

			} else {

				//Credentials dont match
				$this->data['signInMessage'] = 'Your email or password are inccorect';

			}

		}


	}

}






















