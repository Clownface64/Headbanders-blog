<?php

class ArticleController extends MasterController {

	public function __construct($dbc) {

		parent::__construct();

		$this->dbc = $dbc;
	
		$this->mustBeLoggedIn();

		$this->getArticleData();

		if( isset( $_POST['new-comment'] ) ) {
			$this->processNewComment();
		}
	}

	public function buildHTML() {

		
		echo $this->plates->render('article', $this->data);
	}

	private function getArticleData() {
		//Filter the id
		$articleID = $this->dbc->real_escape_string($_GET['articleid']);

		//sql to get data
		$sql = "SELECT title_one, written_by, upload_date, updated_date, article, image
				FROM article
				WHERE article_id = $articleID";

				

		//run the sql
		$result = $this->dbc->query($sql);

		if( !$result || $result->num_rows == 0 ) {
			header('location: index.php?page=404');
		} else {
			$this->data['article'] = $result->fetch_assoc();
		}


		$sql = "SELECT comment_id, comment, date_posted, user.user_id, first_name, last_name
				FROM comments
				JOIN user
				ON comments.user_id = user.user_id
				WHERE article_id = $articleID";
				

		//run the sql
		$result = $this->dbc->query($sql);

		if( !$result ) {
			header('location: index.php?page=404');
		} else {
			$this->data['allComments'] = $result->fetch_all(MYSQLI_ASSOC);
		}

	}

	private function processNewComment(){
		$totalErrors = 0;
		//Validate that the comments have text.
		if (empty ( $_POST['comment'] )){
			$this->data['commentMessage'] = '<p>You must enter a comment</p>';
			$totalErrors++;
		}
		// Validate the maximum length
		if( strlen($_POST['comment']) > 2000 ) {
			$this->data['commentMessage'] = '<p>Must be at most 2000 characters</p>';
			$totalErrors++;
		}
		if( $totalErrors == 0 ) {
			//Filter the comment
			$comment = $this->dbc->real_escape_string($_POST['comment']);
			$userID = $_SESSION['user_id'];
			$recipeID = $this->dbc->real_escape_string($_GET['recipe_id']);
			$sql = "INSERT INTO comments (comment_id, user_id, article_id)
			VALUES ('$comment', $userID, $articleID)";
			$this->dbc->query($sql);
			//Make sure query worked
			if( $this->dbc->affected_rows ) {
				$this->data['articleCommentMessage'] = 'Success!';
			} else {
				$this->data['articleCommentMessage'] = 'Something went wrong!';
			}
		}
	}
}