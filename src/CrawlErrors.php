<?php

//require 'GWT_CrawlErrors.class.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'GWT_CrawlErrors.class.php';

/**
 * Example 1:
 * Download a CSV for a specific domain from the browser.
 */

try {

    $mail = $_POST["mail"];
    $pass = $_POST["pass"];
    $domain = $_POST["domain"];
	//$mail = 'iheartjavaprogramming@gmail.com';
	//$pass = 'JamesBondAgent007';
	//$domain = 'https://thenotaryshop.net/';


    $gwtCrawlErrors = new GwtCrawlErrors();

    if ($gwtCrawlErrors->login($mail, $pass)) {
        // force download in browser (using http headers)
        $gwtCrawlErrors->getCsv($domain);
    }
}
catch (Exception $e) {
    die($e->getMessage());
}

