<?php

class AccountController extends MasterController {

	private $firstNameMessage;
	private $lastNameMessage;
	private $emailMessage;
	private $passwordMessage;
	private $successMessage;

	public function __construct($dbc) {

		parent::__construct();

		$this->dbc = $dbc;
	
		//If you are not loged in
			if( !isset($_SESSION['id']) ) {
				
				 //redirect use to login page
				header('location: index.php?page=home');
			}

		$this->getUserData();

			//did the user change their details
			if( isset($_POST['changes']) ) {
				$this->processNewUserDetails();
			}
	}

	

	public function buildHTML() {


		
		echo $this->plates->render('account', $this->data);

	}


	private function getUserData(){
		$sql = "SELECT first_name, last_name, email, password
		FROM users";

	 	$result = $this->dbc->query($sql);

		

	}

	private function processNewUserDetails() {

		//Validation 
		$totalErrors = 0;

		//Valadate the first name
		if ( strlen($_POST['first-name']) > 25 ) {
			$this->data['firstNameMessage'] = '<p>Must be at most 100 characters.</p>';
			$totalErrors++;
		}

		//Valadate the last name
		if ( strlen($_POST['last-name']) > 25 ) {
			$this->data['lastNameMessage'] = '<p>Must be at most 100 characters.</p>';
			$totalErrors++;
		}

		//Valadate the email
		if ( strlen($_POST['email']) > 50 ) {
			$this->data['emailMessage'] = '<p>Must be at most 100 characters.</p>';
			$totalErrors++;
		}
		
		//Valadate the password		
		if ( strlen($_POST['password']) < 8 ) {
			$this->data['passwordMessage'] = '<p>Must be at lest 8 characters.</p>';
			$totalErrors++;
		}

		if ( $totalErrors == 0 ) {

			$this->successMessage = '<p>Your details have been successfully updated.</p>';
			//Form Validation passed

			//Time to update the database
			$firstName = $this->dbc->real_escape_string($_POST['first-name']);
			$lastName = $this->dbc->real_escape_string($_POST['last-name']);
			$userID = $_SESSION['id'];
			// Prepare the SQL
			$sql = "UPDATE users
					SET first_name = '$firstName',
						last_name = '$lastName'
					WHERE id = $userID  ";
			// Run the query
			$this->dbc->query( $sql );
		}
	}
}

































