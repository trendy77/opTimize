<?php
    // from https://davidwalsh.name/flickr-php
    // Start the session since phpFlickr uses it but does not start it itself
/// or composer .... dzsubek/plickr ??

session_start();
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();
$api_key                 = getenv('FLICKR_KEY');
$api_secret              = getenv('FLICKR_SECRET');
// Require the phpFlickr API
    require_once('phpFlickr-3.1/phpFlickr.php');
    $flickr = new phpFlickr($api_key,$api_secret, true);

// Authenticate;  need the "IF" statement or an infinite redirect will occur
if(empty($_GET['frob'])) {
	$flickr->auth('write'); // redirects if none; write access to upload a photo
} else {
	// Get the FROB token, refresh the page;  without a refresh, there will be "Invalid FROB" error
	$flickr->auth_getToken($_GET['frob']);
	header('Location: flickr.php');
	exit();
}

function uploadFlickr(){

// Send an image sync_upload(photo, title, desc, tags)
// The returned value is an ID which represents the photo
$result = $flickr->sync_upload('logo.png', $_POST['title'], $_POST['description'], 'david walsh, php, mootools, dojo, javascript, css');

}