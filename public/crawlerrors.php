<?php

require_once '/var/www/html/BriansProject/vendor/autoload.php';

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

	$URL = $_POST['URL'];
	$_SESSION['URL'] = $URL;

	$optParams = array('category' => 'notFound', 'platform' => 'web');
	$results = $service->urlcrawlerrorscounts->query($URL, $optParams);

	$json = json_encode($results);
	$obj = json_decode($json, true);

/*$servername = "localhost"; //servername for DB, default localhost or 127.0.0.1 or ::1
$uname = "root"; //username for DB, default root
$pass = "JamesBondAgent007"; //password for DB
$dbname = "SEO"; */

require_once('../bootstrap.php');

$servername     = $config['database']['host'];
$uname       = $config['database']['username'];
$pass       = $config['database']['password'];
$dbname         = $config['database']['database']; 

//Create connection
$conn = new mysqli($servername, $uname, $pass, $dbname);
//Check connection
if ($conn->connect_error) {
        die("<br> <br> Connection to database failed: <br> <br>" . $conn->connect_error);
} else {
        echo "<br> <br> Connected successfully to database <br> <br>";
}

if (! isset($obj['countPerTypes'])) {
   	throw new Exception('Expected index "countPerTypes" not found');
}

	$countPerTypes = $obj['countPerTypes'];
foreach ($countPerTypes as $errorType) {

if (! isset($errorType['category'])) {
	throw new Exception('Expected index "category" not found');
   }    $category = $errorType['category'];


}

if (! isset($errorType['entries'])) {
       throw new Exception('Expected index "entries" not found');
   }    $entries = $errorType['entries'];    foreach ($entries as $entry) {
}

$lastModifiedBy = $_SESSION["username"];
$lastModified = time();
$stmt = $conn->prepare("INSERT INTO Site(PrimaryUrl, lastModified, lastModifiedBy) VALUES (?, ?, ?)");
$stmt->bind_param("sis", $URL, $lastModified, $lastModifiedBy);
$stmt->execute();

$stmt = $conn->prepare("INSERT INTO CrawlError (url, type, errorCount, lastModifiedBy, lastModified, platform) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssisss", $URL, $category, $entry['count'], $lastModifiedBy, $entry['timestamp'], $optParams['platform']);
$stmt->execute();

$optParams2 = array('category' => 'notFollowed', 'platform' => 'web');
$results2 = $service->urlcrawlerrorscounts->query($URL, $optParams2);
$results2 = json_encode($results2);
$obj2 = json_decode($results2,yes);

if (! isset($obj2['countPerTypes'])) {
   throw new Exception('Expected index "countPerTypes" not found');
}// This now contains a numerically indexed array.
$countPerTypes = $obj2['countPerTypes'];// Iterate it based on array size
foreach ($countPerTypes as $errorType) {
   // Make sure index exists before we inspect it.
   if (! isset($errorType['category'])) {
       throw new Exception('Expected index "category" not found');
   }    $category = $errorType['category'];
print_r($category . " Platform: Web");
echo "<br> <br>";
}

   if (! isset($errorType['entries'])) {
       throw new Exception('Expected index "entries" not found');
   }    $entries = $errorType['entries'];    foreach ($entries as $entry) {
}

$stmt = $conn->prepare("INSERT INTO CrawlError (url, type, errorCount, lastModifiedBy, lastModified, platform) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssisss", $URL, $category, $entry['count'], $lastModifiedBy, $entry['timestamp'], $optParams2['platform']);
$stmt->execute();

$optParams3 = array('category' => 'authPermissions', 'platform' => 'web');
$results3 = $service->urlcrawlerrorscounts->query($URL, $optParams3);
$results3 = json_encode($results3);
$obj3 = json_decode($results3,yes);

if (! isset($obj3['countPerTypes'])) {
   throw new Exception('Expected index "countPerTypes" not found');
}
$countPerTypes = $obj3['countPerTypes'];
foreach ($countPerTypes as $errorType) {
   if (! isset($errorType['category'])) {
       throw new Exception('Expected index "category" not found');
   }    $category = $errorType['category'];
   print_r($category . " Platform: Web");
echo "<br> <br>";
}

   if (! isset($errorType['entries'])) {
       throw new Exception('Expected index "entries" not found');
   }    $entries = $errorType['entries'];    foreach ($entries as $entry) {

}

$stmt = $conn->prepare("INSERT INTO CrawlError (url, type, errorCount, lastModifiedBy, lastModified, platform) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssisss", $URL, $category, $entry['count'], $lastModifiedBy, $entry['timestamp'], $optParams3['platform']);
$stmt->execute();

$optParams4 = array('category' => 'serverError', 'platform' => 'web');
$results4 = $service->urlcrawlerrorscounts->query($URL, $optParams4);
$results4 = json_encode($results4);
$obj4 = json_decode($results4,yes);

if (! isset($obj4['countPerTypes'])) {
   throw new Exception('Expected index "countPerTypes" not found');
}
$countPerTypes = $obj4['countPerTypes'];
foreach ($countPerTypes as $errorType) {

   if (! isset($errorType['category'])) {
       throw new Exception('Expected index "category" not found');
   }    $category = $errorType['category'];

   print_r($category . " Platform: Web");
echo "<br> <br>";
}

   if (! isset($errorType['entries'])) {
       throw new Exception('Expected index "entries" not found');
   }    $entries = $errorType['entries'];    foreach ($entries as $entry) {

}

$stmt = $conn->prepare("INSERT INTO CrawlError (url, type, errorCount, lastModifiedBy, lastModified, platform) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssisss", $URL, $category, $entry['count'], $lastModifiedBy, $entry['timestamp'], $optParams4['platform']);
$stmt->execute();

$optParams5 = array('category' => 'soft404', 'platform' => 'web');
$results5 = $service->urlcrawlerrorscounts->query($URL, $optParams5);
$results5 = json_encode($results5);
$obj5 = json_decode($results5,yes);

if (! isset($obj5['countPerTypes'])) {
   throw new Exception('Expected index "countPerTypes" not found');
}
$countPerTypes = $obj5['countPerTypes'];
foreach ($countPerTypes as $errorType) {
   if (! isset($errorType['category'])) {
       throw new Exception('Expected index "category" not found');
   }    $category = $errorType['category'];
print_r($category . " Platform: Web");
echo "<br> <br>";
}

   if (! isset($errorType['entries'])) {
       throw new Exception('Expected index "entries" not found');
   }    $entries = $errorType['entries'];    foreach ($entries as $entry) {
}

$stmt = $conn->prepare("INSERT INTO CrawlError (url, type, errorCount, lastModifiedBy, lastModified, platform) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssisss", $URL, $category, $entry['count'], $lastModifiedBy, $entry['timestamp'], $optParams5['platform']);
$stmt->execute();

$optParams6 = array('category' => 'other', 'platform' => 'web');
$results6 = $service->urlcrawlerrorscounts->query($URL, $optParams6);
$results6 = json_encode($results6);
$obj6 = json_decode($results6,yes);

if (! isset($obj6['countPerTypes'])) {
   throw new Exception('Expected index "countPerTypes" not found');
}
$countPerTypes = $obj6['countPerTypes'];
foreach ($countPerTypes as $errorType) {
   if (! isset($errorType['category'])) {
       throw new Exception('Expected index "category" not found');
   }    $category = $errorType['category'];
print_r($category . " Platform: Web");
echo "<br> <br>";
}

   if (! isset($errorType['entries'])) {
       throw new Exception('Expected index "entries" not found');
   }    $entries = $errorType['entries'];    foreach ($entries as $entry) {
}

$stmt = $conn->prepare("INSERT INTO CrawlError (url, type, errorCount, lastModifiedBy, lastModified, platform) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssisss", $URL, $category, $entry['count'], $lastModifiedBy, $entry['timestamp'], $optParams6['platform']);
$stmt->execute();

$optParams7 = array('category' => 'notFound', 'platform' => 'smartphoneOnly');
$results7 = $service->urlcrawlerrorscounts->query($URL, $optParams7);
$results7 = json_encode($results7);
$obj7 = json_decode($results7,yes);

if (! isset($obj7['countPerTypes'])) {
   throw new Exception('Expected index "countPerTypes" not found');
}
$countPerTypes = $obj7['countPerTypes'];
foreach ($countPerTypes as $errorType) {

   if (! isset($errorType['category'])) {
       throw new Exception('Expected index "category" not found');
   }    $category = $errorType['category'];
   print_r($category . " smartphoneOnly");
echo "<br> <br>";
}

   if (! isset($errorType['entries'])) {
       throw new Exception('Expected index "entries" not found');
   }    $entries = $errorType['entries'];    foreach ($entries as $entry) {
}

$stmt = $conn->prepare("INSERT INTO CrawlError (url, type, errorCount, lastModifiedBy, lastModified, platform) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssisss", $URL, $category, $entry['count'], $lastModifiedBy, $entry['timestamp'], $optParams7['platform']);
$stmt->execute();

$optParams8 = array('category' => 'notFollowed', 'platform' => 'smartphoneOnly');
$results8 = $service->urlcrawlerrorscounts->query($URL, $optParams8);
$results8 = json_encode($results8);
$obj8 = json_decode($results8,yes);

if (! isset($obj8['countPerTypes'])) {
   throw new Exception('Expected index "countPerTypes" not found');
}
$countPerTypes = $obj8['countPerTypes'];
foreach ($countPerTypes as $errorType) {
   if (! isset($errorType['category'])) {
       throw new Exception('Expected index "category" not found');
   }    $category = $errorType['category'];

   print_r($category . " smartphoneOnly");
echo "<br> <br>";
}

   if (! isset($errorType['entries'])) {
       throw new Exception('Expected index "entries" not found');
   }    $entries = $errorType['entries'];    foreach ($entries as $entry) {
}

$stmt = $conn->prepare("INSERT INTO CrawlError (url, type, errorCount, lastModifiedBy, lastModified, platform) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssisss", $URL, $category, $entry['count'], $lastModifiedBy, $entry['timestamp'], $optParams8['platform']);
$stmt->execute();

$optParams9 = array('category' => 'authPermissions', 'platform' => 'smartphoneOnly');
$results9 = $service->urlcrawlerrorscounts->query($URL, $optParams9);
$results9 = json_encode($results9);
$obj9 = json_decode($results9,yes);

if (! isset($obj9['countPerTypes'])) {
   throw new Exception('Expected index "countPerTypes" not found');
}
$countPerTypes = $obj9['countPerTypes'];
foreach ($countPerTypes as $errorType) {
   if (! isset($errorType['category'])) {
       throw new Exception('Expected index "category" not found');
   }    $category = $errorType['category'];
   print_r($category . " smartphoneOnly");
echo "<br> <br";
}

   if (! isset($errorType['entries'])) {
       throw new Exception('Expected index "entries" not found');
   }    $entries = $errorType['entries'];    foreach ($entries as $entry) {
}

$stmt = $conn->prepare("INSERT INTO CrawlError (url, type, errorCount, lastModifiedBy, lastModified, platform) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssisss", $URL, $category, $entry['count'], $lastModifiedBy, $entry['timestamp'], $optParams9['platform']);
$stmt->execute();

$optParams10 = array('category' => 'serverError', 'platform' => 'smartphoneOnly');
$results10 = $service->urlcrawlerrorscounts->query($URL, $optParams10);
$results10 = json_encode($results10);
$obj10 = json_decode($results10,yes);

if (! isset($obj10['countPerTypes'])) {
   throw new Exception('Expected index "countPerTypes" not found');
}
$countPerTypes = $obj10['countPerTypes'];
foreach ($countPerTypes as $errorType) {
   if (! isset($errorType['category'])) {
       throw new Exception('Expected index "category" not found');
   }    $category = $errorType['category'];

print_r($category . " smartphoneOnly");
echo "<br> <br";
}

   if (! isset($errorType['entries'])) {
       throw new Exception('Expected index "entries" not found');
   }    $entries = $errorType['entries'];    foreach ($entries as $entry) {
}

$stmt = $conn->prepare("INSERT INTO CrawlError (url, type, errorCount, lastModifiedBy, lastModified, platform) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssisss", $URL, $category, $entry['count'], $lastModifiedBy, $entry['timestamp'], $optParams10['platform']);
$stmt->execute();

$optParams11 = array('category' => 'soft404', 'platform' => 'smartphoneOnly');
$results11 = $service->urlcrawlerrorscounts->query($URL, $optParams11);
$results11 = json_encode($results11);
$obj11 = json_decode($results11,yes);

if (! isset($obj11['countPerTypes'])) {
   throw new Exception('Expected index "countPerTypes" not found');
}
$countPerTypes = $obj11['countPerTypes'];
foreach ($countPerTypes as $errorType) {
   if (! isset($errorType['category'])) {
       throw new Exception('Expected index "category" not found');
   }    $category = $errorType['category'];

print_r($category . " smartphoneOnly");
echo "<br> <br";
}

   if (! isset($errorType['entries'])) {
       throw new Exception('Expected index "entries" not found');
   }    $entries = $errorType['entries'];    foreach ($entries as $entry) {
}

$stmt = $conn->prepare("INSERT INTO CrawlError (url, type, errorCount, lastModifiedBy, lastModified, platform) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssisss", $URL, $category, $entry['count'], $lastModifiedBy, $entry['timestamp'], $optParams11['platform']);
$stmt->execute();

$optParams12 = array('category' => 'roboted', 'platform' => 'smartphoneOnly');
$results12 = $service->urlcrawlerrorscounts->query($URL, $optParams12);
$results12 = json_encode($results12);
$obj12 = json_decode($results12,yes);

if (! isset($obj12['countPerTypes'])) {
   throw new Exception('Expected index "countPerTypes" not found');
}
$countPerTypes = $obj12['countPerTypes'];
foreach ($countPerTypes as $errorType) {
   if (! isset($errorType['category'])) {
       throw new Exception('Expected index "category" not found');
   }    $category = $errorType['category'];

print_r($category . " smartphoneOnly");
echo "<br> <br";
}

   if (! isset($errorType['entries'])) {
       throw new Exception('Expected index "entries" not found');
   }    $entries = $errorType['entries'];    foreach ($entries as $entry) {
}

$stmt = $conn->prepare("INSERT INTO CrawlError (url, type, errorCount, lastModifiedBy, lastModified, platform) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssisss", $URL, $category, $entry['count'], $lastModifiedBy, $entry['timestamp'], $optParams12['platform']);
$stmt->execute();

$stmt->close();
$conn->close();

//header("Location: http://1328group.com/crawlerrors2.php"); //redirecting to collect the rest of the data.

$redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/crawlerrors2.php';
header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));

} else {
	$redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/oauth2callback.php';
	header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}

?>
