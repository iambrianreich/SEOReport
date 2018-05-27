<?php

$password = $_POST['password'];

$pw = "Agent007"; //If this was an actual login, this would check the password where $_POST['email'] == databaseEmail that is registered i.e. the hash + the salt would be passed to password_verify.
//In this case, the database password would already be hashed because the registration would've stored the hash + salt in the DB.
/*$stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
$stmt->bind_param("ss", $email, $password);
$email = $_POST['email'];
$password = $_POST['password'];
$stmt->execute();
$result = $stmt->get_result();*/

$hash = password_hash($pw, PASSWORD_DEFAULT); //This would happen with actual registration and store this in the DB then use the below function to verify it.

if (password_verify($password, $hash)) { //password should be eventually salted to disallow rainbow table lookups.

echo "Your password matches, correct password";
//Redirect to index.php where the main functions of the application are located.

} else {

echo "Your password doesn't match, incorrect password" . '<br> <br>';
//Redirect back to login page.

}

?>
