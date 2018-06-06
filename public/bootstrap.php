<?php

/**
 * Bootstrap file which sets up environment for other scripts by registering
 * the Composer autoloader and loading configuration.
 *
 * @author Brian Reich <breich@reich-consulting.net>
 */

// Setup Composer autoloader
require_once 'vendor/autoload.php';

// App config is now in global $config variable.
$config = include('config.php');
