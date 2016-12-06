<?php 

require '../config.inc.php';

session_start();

//Make everything in the vendor folder avalavle to use
require 'vendor/autoload.php';
require 'app/controllers/MasterController.php';

// Load the appropriate page

//has the user requested a page?
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

//Database connection
$dbc = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Load the appropriate files based on page
switch($page) {
// 	//Home Page
	case 'home':
		require 'app/controllers/HomeController.php';
		$controller = new HomeController($dbc);
	break;

	//Gallery page
	case 'gallery':
		echo $plates->render('gallery');
		// require 'app/controllers/gallery.php';
		// $controller = new GalleryController($dbc);
	break;

	//Artist page
	case 'artist':
		echo $plates->render('artist');
		// require 'app/controllers/ArtistController.php';
		// $controller = new ArtistController($dbc);
	break;

	//Article page
	case 'article':
		require 'app/controllers/ArticleController.php';
		$controller = new ArticleController($dbc);
	break;

	//Event page
	case 'event':
		// echo $plates->render('event');
		require 'app/controllers/EventController.php';
		$controller = new EventController($dbc);
	break;

	//Contact page
	case 'contact':
		// echo $plates->render('contact');
		require 'app/controllers/ContactController.php';
		$controller = new ContactController($dbc);
	break;

	//Sign up page
	case 'sign-up':		
		require 'app/controllers/SignUpController.php';
		$controller = new SignUpController($dbc);
	break;

	//Account page
	case 'account':
		
		require 'app/controllers/AccountController.php';
		$controller = new AccountController($dbc);
	break;

	case 'sign-out':
		unset($_SESSION['id']);
		header('Location: index.php');
	break;

	case 'sign-in':
		require 'app/controllers/SignInController.php';
		$controller = new SignInController($dbc);
	break;

	//404 page
	default:
		// require 'app/controllers/Error404Controller.php';
		// $controller = new Error404Controller();
	break;	
} 

$controller->buildHTML();