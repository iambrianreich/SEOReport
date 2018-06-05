<?php

require_once '../vendor/autoload.php';

echo "Got to require statement <br> <br>";

session_start();

echo "Building the client object <br> <br>";
$client = new Google_Client();

echo "Setting client configuration <br> <br>";
$client->setAuthConfig('client_secret_151669692220-f0fe5df5ai6kegeu7q5c56tv6g0enlnp.apps.googleusercontent.com.json');
$client->addScope('https://www.googleapis.com/auth/webmasters');
echo "Built the client object <br> <br>";

echo "Building the service object <br> <br>";

if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {

$client->setAccessToken($_SESSION['access_token']);
$service = new Google_Service_Webmasters($client);

echo "Built the service object <br> <br>";
echo $_SESSION['URL']; //test statement.
echo "<br> <br>";
$URL = $_SESSION['URL'];
echo "<br> <br>";

$servername = "localhost"; //servername for DB, default localhost or 127.0.0.1 or ::1
$uname = "root"; //username for DB, default root
$pass = "JamesBondAgent007"; //password for DB
$dbname = "SEO";

//Create connection
$conn = new mysqli($servername, $uname, $pass, $dbname);
//Check connection
if ($conn->connect_error) {
        die("<br> <br> Connection to database failed: <br> <br>" . $conn->connect_error);
} else {
        echo "<br> <br> Connected successfully to database <br> <br>";
}

$optParams = array('category' => 'manyToOneRedirect', 'platform' => 'smartphoneOnly');
$results = $service->urlcrawlerrorscounts->query($URL, $optParams);
$json = json_encode($results);
$obj = json_decode($json, true);
//print_r($obj); //test statement.
echo "<br> <br>";

if (! isset($obj['countPerTypes'])) {
   throw new Exception('Expected index "countPerTypes" not found');
}
$countPerTypes = $obj['countPerTypes'];
foreach ($countPerTypes as $errorType) {
   if (! isset($errorType['category'])) {
       throw new Exception('Expected index "category" not found');
   }    $category = $errorType['category'];
   print_r($category . " " . $optParams['platform']);
echo "<br> <br>";
}

   if (! isset($errorType['entries'])) {
       throw new Exception('Expected index "entries" not found');
   }    $entries = $errorType['entries'];    foreach ($entries as $entry) {

}

$stmt = $conn->prepare("INSERT INTO CrawlError (url, type, errorCount, lastModified, platform) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssiss", $URL, $category, $entry['count'], $entry['timestamp'], $optParams['platform']);
$stmt->execute();

$optParams2 = array('category' => 'flashContent', 'platform' => 'smartphoneOnly');
$results2 = $service->urlcrawlerrorscounts->query($URL, $optParams2);
$json2 = json_encode($results2);
$obj2 = json_decode($json2, true);
//print_r($obj2); //test statement.
echo "<br> <br>";

if (! isset($obj2['countPerTypes'])) {
   throw new Exception('Expected index "countPerTypes" not found');
}
$countPerTypes = $obj2['countPerTypes'];
foreach ($countPerTypes as $errorType) {
   if (! isset($errorType['category'])) {
       throw new Exception('Expected index "category" not found');
   }    $category = $errorType['category'];
   print_r($category . " " . $optParams['platform']);
echo "<br> <br>";
}

   if (! isset($errorType['entries'])) {
       throw new Exception('Expected index "entries" not found');
   }    $entries = $errorType['entries'];    foreach ($entries as $entry) {

}

$stmt = $conn->prepare("INSERT INTO CrawlError (url, type, errorCount, lastModified, platform) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssiss", $URL, $category, $entry['count'], $entry['timestamp'], $optParams2['platform']);
$stmt->execute();

$optParams3 = array('category' => 'other', 'platform' => 'smartphoneOnly');
$results3 = $service->urlcrawlerrorscounts->query($URL, $optParams3);
$json3 = json_encode($results3);
$obj3 = json_decode($json3, true);
//print_r($obj3); //test statement.
echo "<br> <br>";

if (! isset($obj3['countPerTypes'])) {
   throw new Exception('Expected index "countPerTypes" not found');
}
$countPerTypes = $obj3['countPerTypes'];
foreach ($countPerTypes as $errorType) {
   if (! isset($errorType['category'])) {
       throw new Exception('Expected index "category" not found');
   }    $category = $errorType['category'];
   print_r($category . " " . $optParams['platform']);
echo "<br> <br>";
}

   if (! isset($errorType['entries'])) {
       throw new Exception('Expected index "entries" not found');
   }    $entries = $errorType['entries'];    foreach ($entries as $entry) {

}

$stmt = $conn->prepare("INSERT INTO CrawlError (url, type, errorCount, lastModified, platform) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssiss", $URL, $category, $entry['count'], $entry['timestamp'], $optParams3['platform']);
$stmt->execute();

$stmt->close();
$conn->close();

//$redirect_url = 'http://' . $_SERVER['HTTP_HOST'] . '/index.html';
$redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/index.html';
header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));

} else {
	$redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/oauth2callback.php';
	header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}

?>
