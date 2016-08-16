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

		//Get latest posts
		$allData = $this ->getLatestPosts();
	
			$data = [];
			$data['allPosts'] = $allData;

		echo $this->plates->render('home', $data);
	}

	private function getLatestPosts() {

		//Prepare some sql
		$sql = "SELECT title_one, title_two, description, written_by, upload_date, updated_date
				FROM articles";

		//Run the sql and capture the results
		$result = $this->dbc->query($sql);

		//Extract the results as an array
		$allData = $result->fetch_all(MYSQLI_ASSOC);

		//Return the result to the code that called this function
		return $allData;
	}

	
}