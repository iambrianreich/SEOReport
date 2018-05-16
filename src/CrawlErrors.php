<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'GwtCrawlErrors.class.php';

/**
 * Example 1:
 * Download a CSV for a specific domain from the browser.
 */
try {
    $mail = $_POST["mail"];
    $pass = $_POST["pass"];

    $domain = $_POST["domain"];

    $gwtCrawlErrors = new GwtCrawlErrors();

    if ($gwtCrawlErrors->login($mail, $pass)) {
        // force download in browser (using http headers)
        $gwtCrawlErrors->getCsv($domain);
    }
}
catch (Exception $e) {
    die($e->getMessage());
}

?>
