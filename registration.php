<?php
session_start();

$servername = 'localhost';
$user = 'gtntest1-profile';
$password = 'bKQRFib9rpGb5CPV';
$database = 'gtntest1-profile';

$connection = new mysqli($servername, $user, $password, $database);

if ($connection -> connect_error) {
    die('Connection failed: ' . $connection -> connect_error);
}

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPass = $_POST['confirmPass'];

if ($password === $confirmPass) {
	$sql = "INSERT INTO users (firstname, lastname, email, password) VALUES (?, ?, ?, ?)";

	$stmt = $connection -> prepare($sql);

	$stmt -> bind_param("ssss", $firstname, $lastname, $email, $password);
	$result = $stmt -> execute();
	$stmt -> close();

	$user_id = $connection -> insert_id;

	if ($user_id > 0) {
		$_SESSION['id'] = $user_id;
		header("location: profile.php");
	} else {
		$errMsg = "Что-то пошло не так. Попробуйте еще раз";
		echo $errMsg;
	}
} else {
	$errMsg = "Пароли не совпадают";
	echo $errMsg;
}



?>
