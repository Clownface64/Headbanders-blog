<?php

use Intervention\Image\ImageManager;

class AccountController extends MasterController {

	private $acceptableImageTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/bmp', 'image/tiff'];

	public function __construct($dbc) {

		parent::__construct();

		$this->dbc = $dbc;
	
		$this->mustBeLoggedIn();

		$this->getUserData();

			//did the user change their details
			if( isset($_POST['changes']) ) {
				$this->processNewUserDetails();
			}

			//Did an article get posted
			if( isset($_POST['article-submit']) ){
				$this->processNewArticle();
			}

			// if( isset($_POST['image-submit']) ) {
			// 	$this->proccessImageUpload;
			// }
	}	

	public function buildHTML() {
		$this->getBandName();
		
		echo $this->plates->render('account', $this->data);

	}

	private function getUserData(){
		$sql = "SELECT first_name, last_name, email, password
		FROM user";

	 	$result = $this->dbc->query($sql);

	}

	private function processNewUserDetails() {

		//Validation 
		$totalErrors = 0;

		//Valadate the first name
		if ( strlen($_POST['first-name']) > 100 ) {
			$this->data['firstNameMessage'] = '<p>Must be at most 100 characters.</p>';
			$totalErrors++;
		}

		//Valadate the last name
		if ( strlen($_POST['last-name']) > 100 ) {
			$this->data['lastNameMessage'] = '<p>Must be at most 100 characters.</p>';
			$totalErrors++;
		}

		//Valadate the email
		if ( strlen($_POST['email']) > 100 ) {
			$this->data['emailMessage'] = '<p>Must be at most 100 characters.</p>';
			$totalErrors++;
		}
		
		//Valadate the password		
		if ( strlen($_POST['password']) > 8 ) {
			$this->data['passwordMessage'] = '<p>Must be at lest 8 characters.</p>';
			$totalErrors++;
		}

		

		if ( $totalErrors == 0 ) {

			$this->data['successMessage'] = '<p>Your details have been successfully updated.</p>';
			//Form Validation passed

			//Time to update the database
			$firstName = $this->dbc->real_escape_string($_POST['first-name']);
			$lastName = $this->dbc->real_escape_string($_POST['last-name']);
			$userID = $_SESSION['id'];
			// Prepare the SQL
			$sql = "UPDATE user
					SET first_name = '$firstName',
						last_name = '$lastName'
					WHERE user_id = $userID  ";
			// Run the query
			$this->dbc->query( $sql );
		}
	}

	private function processNewArticle() {

		$totalErrors = 0;
		$titleOne = trim($_POST['title-one']);
		$author = trim($_POST['author']);
		$descript = trim($_POST['description']);
		$article = trim($_POST['article']);
		$tags = trim($_POST['tags']);
		// $imgDescription = trim($_POST['imgDescription']);
		// $imgAlt = trim($_POST['imgAlt']);

		//Title one
		if( strlen($titleOne) == 0 ){
			$this->data['titleErrorMessage'] = '<p>Requied</p>';
			$totalErrors++;
		}elseif( strlen( $titleOne ) > 50 ){
			$this->data['titleErrorMessage'] = "<p>Title can't be more than 50 characters</p>";
			$totalErrors++;
		}

		//author
		if( strlen($author ) == 0 ){
			$this->data['authorErrorMessage'] = '<p>Requied</p>';
			$totalErrors++;
		}elseif( strlen( $author )  > 50 ){
			$this->data['authorErrorMessage'] = "<p>Author can't be more than 50 characters</p>";
			$totalErrors++;
		}

		//description
		if( strlen($descript ) == 0 ){
			$this->data['descriptErrorMessage'] = '<p>Requied</p>';
			$totalErrors++;
		}elseif( strlen( $descript )  > 250 ){
			$this->data['descriptErrorMessage'] = "<p>Discription can't be more than 100 characters</p>";
			$totalErrors++;
		}

		//article
		if( strlen($article) == 0 ) {
			$this->data['articleErrorMessage'] = '<p>Requied</p>';
			$totalErrors++;
		}elseif( strlen( $article )  > 2000 ){
			$this->data['articleErrorMessage'] = "<p>Can't be more than 2000 characters</p>";
			$totalErrors++;
		}elseif( strlen( $article )  < 10
		 ){
			$this->data['articleErrorMessage'] = "<p>Must be more than 750 characters</p>";
			$totalErrors++;
		}

		// Band

		if( $tags == ''  ){
			$this->data['tagErrorMessage'] = '<p>Requied</p>';
			$totalErrors++;
		}

		// make sure the user has uploaded an image
		if( in_array( $_FILES['image']['error'], [1,3,4] ) ) {
			// Show error message
			// Use a switch to generate the appropriate error message
			$this->data['imageMessage'] = 'Image failed to upload';
			$totalErrors++;
		} elseif( !in_array( $_FILES['image']['type'], $this->acceptableImageTypes ) ) {
			$this->data['imageMessage'] = 'Must be an image (jpg, gif, png, tiff etc)';
			$totalErrors++;
		}

		//description
		// if( strlen($imgDescription ) == 0 ){
		// 	$this->data['imgDescriptionErrorMessage'] = '<p>Requied</p>';
		// 	$totalErrors++;
		// }elseif( strlen( $imgDescription )  > 250 ){
		// 	$this->data['imgDescriptionErrorMessage'] = "<p>Discription can't be more than 100 characters</p>";
		// 	$totalErrors++;
		// }

		// //Alt text
		// if( strlen($imgAlt ) == 0 ){
		// 	$this->data['imgAltErrorMessage'] = '<p>Requied</p>';
		// 	$totalErrors++;
		// }elseif( strlen( $imgAlt )  > 250 ){
		// 	$this->data['imgAltErrorMessage'] = "<p>Discription can't be more than 100 characters</p>";
		// 	$totalErrors++;
		// }


		// Try to upload into a folder


		if( $totalErrors == 0) {

			// Instance of intervention image
			$manager = new ImageManager();

			// Get the filt that was uploaded
			$image = $manager->make($_FILES['image']['tmp_name']);

			$fileExtension = $this->getFileExtension($image->mime() );

			$fileName = uniqid();


			$image->save("img/uploads/original/$fileName$fileExtension");

			$image->resize(320, null, function ($constraint) {
				$constraint->aspectRatio();
			});

			$image->save("img/uploads/post/$fileName$fileExtension");

			$titleOne = $this->dbc->real_escape_string($_POST['title-one']);
			$author = $this->dbc->real_escape_string($_POST['author']);
			$descript = $this->dbc->real_escape_string($_POST['description']);
			$article = $this->dbc->real_escape_string($_POST['article']);
			$tags = $this->dbc->real_escape_string($_POST['tags']);
			// $imgDescription = $this->dbc->real_escape_string($_POST['imgDescription']);
			// $imgAlt = $this->dbc->real_escape_string($_POST['imgAlt']);
		

			// $userID = 1;
			 // MAKE CHANGES TO DATABASE AND REMOVE THIS (add quotes around the variable in the SQL query because it's a string)
			// $articleImg = '$fileName$fileExtension';

			$userID = $_SESSION['id'];

			$sql = "INSERT INTO article (article_id, band_id, title_one, description, article, written_by, image, user_id)
					VALUES (NULL, $tags ,'$titleOne', '$descript', '$article', '$author', 
					'$fileName$fileExtension', $userID)";
			
			
			$this->dbc->query($sql);

			// echo $sql;

			if ( $this->dbc->affected_rows ) {
				$this->data['articlePostMessage'] = '<p>Success!</p>';
			}else {
				$this->data['articlePostMessage'] = '<p>Something went wrong</p>';
			}
		}

	
	}

	
	// private function proccessImageUpload () {

	// 	$imgName = trim($_POST['image-name']);
	// 	$imgDescript = trim($_POST['image-description']);

	// 	if( strlen($imgName ) == 0 ) {
	// 		$this->data['imgNameError'] = '<p>Requied</p>';
	// 		$totalErrors++;
	// 	}elseif( strlen($imgName) > 100 ) {
	// 		$this->data['imgNameError'] = '<p>Must be at most 100 characters</p>';
	// 		$totalErrors++;
	// 	}

	// 	if( strlen($imgDescript) ==0 ) {
	// 		$this->data['imgDescriptError'] = '<p>Requied</p>';
	// 		$totalErrors++;
	// 	}elseif( strlen($imgName) > 200 ) {
	// 		$this->data['imgDescriptError'] = '<p>Must be at most 200 characters</p>';
	// 		$totalErrors++;
	// 	}

	// 	if( $totalErrors == 0) {

	// 		$imgName = $this->dbc->real_escape_string($_POST['$imgName']);
	// 		$imgDescript = $this->dbc->real_escape_string($_POST['$imgDescript']);

	// 		$userID = $_SESSION['id'];

	// 		$sql = "INSERT INTO image ( image_name, image_description)
	// 				VALUES ( '$imgName', '$imgDescript')";

	// 		$this->dbc->query($sql);



	// 		if( $this->dbc->affected_rows ){
	// 			$this->data['imgUploadMessage'] = '<p>Success!</p>';
	// 		}else {
	// 			$this->data['imgUploadMessage'] = '<p>Something went wrong</p>';
	// 		}
	// 	}

	// }

	private function getBandName () {

		$sql = "SELECT tag_id, band_name FROM tags";
		$result = $this->dbc->query($sql);

		// If there is a result
		if( $result && $result->num_rows > 0 ) {
			$this->data['result'] = $result->fetch_all(MYSQLI_ASSOC);
		}
	}

	private function getFileExtension( $mimeType ) {
		switch($mimeType) {
			case 'image/png':
				return '.png';
			break;
			case 'image/gif':
				return '.gif';
			break;
			case 'image/jpeg':
				return '.jpg';
			break;
			case 'image/bmp':
				return '.bmp';
			break;
			case 'image/tiff':
				return '.tif';
			break;
		}
	}

}

































