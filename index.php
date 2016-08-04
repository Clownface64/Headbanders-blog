<?php 

//Make everything in the vendor folder avalavle to use
require 'vendor/autoload.php';

$plates = new League\Plates\Engine('app/templates');

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
		echo $plates->render('home');
		// require 'app/controllers/HomeController.php';
		// $controller = new HomeController($dbc);
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
		echo $plates->render('article');
		// require 'app/controllers/ArticleController.php';
		// $controller = new ArticleController($dbc);
	break;

	//Event page
	case 'event':
		echo $plates->render('event');
		// require 'app/controllers/EventController.php';
		// $controller = new EventController($dbc);
	break;

	//Contact page
	case 'contact':
		echo $plates->render('contact');
		// require 'app/controllers/ContactController.php';
		// $controller = new ContactController($dbc);
	break;

	//Sign up page
	case 'Sign-up':
		echo $plates->render('Sign-up
	');
		// require 'app/controllers/ContactController.php';
		// $controller = new ContactController($dbc);
	break;

	//Account page
	case 'account':
		echo $plates->render('account');
		// require 'app/controllers/ContactController.php';
		// $controller = new ContactController($dbc);
	break;

	//404 page
	default:
		// require 'app/controllers/Error404Controller.php';
		// $controller = new Error404Controller();
	break;	
} 

// $controller->buildHTML();