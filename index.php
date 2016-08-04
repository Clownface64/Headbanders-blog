<?php 

//Make everything in the vendor folder avalavle to use
require 'vendor/autoload.php';

// Load the appropriate page

//has the user requested a page?
if( isset($_GET['page']) ){
	//requested page
	$page = $_GET['page'];
} else {
	//home page
	$page = 'home';
}

// Load the appropriate files based on page
switch($page) {
// 	//Home Page
	case 'home':
		require 'app/controllers/HomeController.php';
		$controller = new HomeController();
	break;

	//Gallery page
	case 'gallery':
		echo $plates->render('gallery');
		// require 'app/controllers/gallery.php';
		// $controller = new GalleryController();
	break;

	//Artist page
	case 'artist':
		echo $plates->render('artist');
		// require 'app/controllers/ArtistController.php';
		// $controller = new ArtistController();
	break;

	//Article page
	case 'article':
		echo $plates->render('article');
		// require 'app/controllers/ArticleController.php';
		// $controller = new ArticleController();
	break;

	//Event page
	case 'event':
		echo $plates->render('event');
		// require 'app/controllers/EventController.php';
		// $controller = new EventController();
	break;

	//Contact page
	case 'contact':
		echo $plates->render('contact');
		// require 'app/controllers/ContactController.php';
		// $controller = new ContactController();
	break;

	//Sign up page
	case 'sign-up':		
		require 'app/controllers/SignUpController.php';
		$controller = new SignUpController();
	break;

	//Account page
	case 'account':
		echo $plates->render('account');
		// require 'app/controllers/AccountController.php';
		// $controller = new AccountController();
	break;

	//404 page
	default:
		// require 'app/controllers/Error404Controller.php';
		// $controller = new Error404Controller();
	break;	
} 

$controller->buildHTML();