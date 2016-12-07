<?php

use Intervention\Image\ImageManager;

class EditArticleController extends MasterController {

	private $acceptableImageTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/bmp', 'image/tiff'];

	public function __construct($dbc) {

		parent::__construct();

		$this->dbc = $dbc;
	
		$this->mustBeLoggedIn();

		

		//did the user change their details
		if( isset($_POST['editArticleSubmit']) ) {
			$this->processNewArticleData();
		}
	}

	public function buildHTML() {

		echo $this->plates->render('editArticle', $this->data);
	}

	private function processNewArticleData() {

		//Validation 
		$totalErrors = 0;

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

		if ( $totalErrors == 0 ) {

			$this->data['successMessage'] = '<p>Your details have been successfully updated.</p>';
			//Form Validation passed

			//Time to update the database
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

			// Prepare the SQL
			$sql = "UPDATE article
					SET band_id = $tags,
						title_one = '$titleOne',
						description = '$descript',
						article = '$article',
						image = '$fileName$fileExtension'
					WHERE user_id = $userID  ";
			// Run the query
			$this->dbc->query( $sql );
		}
	}
}

































