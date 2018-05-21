<?php

//require_once './GwtCrawlErrors.class.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'GwtCrawlErrors.class.php';

/**
 * Example 1:
 * Download a CSV for a specific domain from the browser.
 */

    //$mail = $_POST['mail'];
    //$pass = $_POST['pass'];
    //$domain = $_POST['domain'];
	$mail = 'iheartjavaprogramming@gmail.com';
	$pass = 'JamesBondAgent007';
	$domain = 'https://thenotaryshop.net/';

	echo $mail . "<br>" . "<br>" . $domain . "<br>";

        $gwtCrawlErrors = new GwtCrawlErrors();

	echo "<br>" . "Making class object";

try {

        $gwtCrawlErrors->login($mail, $pass);
        // force download in browser (using http headers)
	echo "Attempting force download in browser using http headers";
        $gwtCrawlErrors->getCsv($domain);

}

catch (Exception $e) {
    die($e->getMessage());
}
