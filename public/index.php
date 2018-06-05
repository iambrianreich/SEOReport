<?php

require_once '../vendor/autoload.php';

echo "Got to require statement <br> <br>";

session_start();

//try {

echo "Building the client object <br> <br>";
$client = new Google_Client();
//$client->setApplicationName("My Application");
//$client->setDeveloperKey("AIzaSyDMne0cDndbUKkLKl0WHSFzIpxnJDrVNbc");

echo "Setting client configuration <br> <br>";
$client->setAuthConfig('client_secret_151669692220-f0fe5df5ai6kegeu7q5c56tv6g0enlnp.apps.googleusercontent.com.json');
//$client->setAccessType("offline");
//$client->setIncludeGranted(true);
$client->addScope('https://www.googleapis.com/auth/webmasters');
echo "built the client object <br> <br>";

echo "Building the service object <br> <br>";

if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {

	$client->setAccessToken($_SESSION['access_token']);
	$service = new Google_Service_Webmasters($client);

	echo "built the service object <br> <br>";
	$results = $service->sites->get('https://thenotaryshop.net/');
	echo json_encode($results);

} else {
	$redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/oauth2callback.php';
	header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}

?>
