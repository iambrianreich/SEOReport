<?php
/**
 * Sample configuration file.
 *
 * @author Brian Reich <breich@reich-consulting.net>
 */

return [
    /*
     * GoogleClient configuration options.
     */
    'googleClient' => [

        /*
         * Defines the absolute path to the authorization file. Using realpath()
         * to convert the relative path to the file to an absolute path that
         * will work from our other scripts.
         */
        'authFile' => realpath('assets/client_secret.json')
    ],

    /*
     * Database configuration
     */
    'database' => [

        // Server name or IP address
        'host'      => 'localhost',

        // Login username
        'username'  => 'root',

        // Login password
        'password'  => 'JamesBondAgent007',

        // Database name
        'database'    => 'SEO'
    ]
];
