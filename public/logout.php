<?php
session_start();
?>

<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> SEOReport </title>
<style>

div {

	height: 100%;
        width: 50%;
        margin: 0 auto;
        background-color: white;
}

body {
        background-image: url("./images/background.png");
}

p {

font-size: large;

}

</style>
</head>
<body>
<div align="center">
<img class="img-responsive" src="./images/Reich-Web-Consulting-Logo.png">

<?php

try {

// remove all session variables
session_unset();

// destroy the session
session_destroy();

echo "<br> You've logged out successfully <br>";

}

catch (Exception $e) {
	echo 'Message:  ' . $e->getMessage();
}

?>

</body>
</html>
