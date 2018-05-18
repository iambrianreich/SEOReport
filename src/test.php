<?php//Require statement(s)
require_once '/var/www/html/BriansProject/vendor/autoload.php';try {//Building the client object
$client = new Google_Client();
$client->setApplicationName("My Project 46526");
$client->setDeveloperKey("AIzaSyDMne0cDndbUKkLKl0WHSFzIpxnJDrVNbc");//Building the service object
//$service = new Google_Service_Books($client);
$service = new Google_Service_Webmasters($client);//Calling an API
//$optParams = array('filter' => 'free-ebooks');
//$results = $service->volumes->listVolumes('Henry David Thoreau', $optParams);
//$optParams = array('filter' => 'http');
$results = $service->sites->list('siteEntry');//Handling the result
foreach ($results as $item) {
       echo $item['siteEntry'], "<br /> \n";
}/*foreach ($results as $item) {
 echo $item['volumeInfo']['title'], "<br /> \n";
}*/}catch (Exception $e) {
   die($e->getMessage());
}?>
