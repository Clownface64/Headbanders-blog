<?php 

class SignUpController extends MasterController {

	// Properties
	private $emailMessage;
	private $passwordMessage;
	private $firstNameMessage;
	private $lastNameMessage;
	
	

	//Constructor
	public function __construct($dbc) {

		//Run the parent constructor
		parent::__construct();

		//save the database connection for later
		$this->dbc = $dbc;

		//If the usere has submited the registaration form
		if ( isset($_POST['sign-up']) ) {

			$this ->validateSignUpForm();
		}

	}

	//Methods (functions)
	public function registerAccount() {

		//Validate the users data 

		//Check the database to see if the email is in use 

		//Check the strength of the password
	}

	public function buildHTML() {

		//Instantiate (create and instace) of plates library
	

		//prepare a container for data 
		$data = [];

		if( $this ->firstNameMessage != '' ) {
			$data['firstNameMessage'] = $this->firstNameMessage;
		}

		if( $this ->lastNameMessage != '' ) {
			$data['lastNameMessage'] = $this->lastNameMessage;
		}

		//If the is an email error
		if( $this ->emailMessage != '' ) {
			$data['emailMessage'] = $this->emailMessage; 
		}

		if( $this ->passwordMessage != '' ) {
			$data['passwordMessage'] = $this->passwordMessage; 
		}

		echo $this->plates->render('sign-up', $data);
	}

	private function validateSignUpForm() {
		$totalErrors = 0;
		//Make sure the email has been provided and is valid 
		if( $_POST['last-name'] == '' ){
			//last name is invalid
			$this->lastNameMessage = 'Your last name is invalid';
			$totalErrors++;

		}

		if( $_POST['first-name'] == '' ){
			//first name is invalid
			$this->firstNameMessage = 'Your first name is invalid';
			$totalErrors++;

		}

		if( $_POST['email'] == '' ){
			//Email is invalid
			$this->emailMessage = 'Your email is invalid';
			$totalErrors++;

		}

		//Make sure email is not in use
		$filteredEmail = $this->dbc->real_escape_string($_POST['email']);

		$sql = "SELECT email 
					FROM user
					WHERE email ='$filteredEmail'";

		//run the query
		$result = $this->dbc->query($sql);

		//if the queary failed or there is a result
		if( !$result || $result->num_rows > 0 ){
			//Email is invalid
			$this->emailMessage = 'Email in use';
			$totalErrors++;
		}


		if( strlen($_POST['password']) < 8 ){
			$this->passwordMessage = 'Your password is less than 8 characters';
			$totalErrors++;
		}

		if( $totalErrors == 0) {
			
			//Validation passed

			//filter user data before using it in a query
			$filteredFirstName = $this->dbc->real_escape_string($_POST['first-name']);

			$filteredLastName = $this->dbc->real_escape_string($_POST['last-name']);			
	
	
			// hash the password
			$hash = password_hash($_POST['password'], PASSWORD_BCRYPT);

			//Prepare the sql
			$sql = "INSERT INTO user (first_name, last_name, email, password)
					VALUES ('$filteredFirstName', '$filteredLastName', '$filteredEmail', '$hash')";

			$this->dbc->query($sql);

			//Check to make sure this worked

			//log the user in
			$_SESSION['id'] = $this->dbc->insert_id;

			$_SESSION['firstName'] = $filteredFirstName;

			//Redirect the user to home page
			header('Location: index.php?page=home');

		}

	}
}




































