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

$email = trim($_POST['email']);
$password = trim($_POST['password']);

$sql = "SELECT user_id, email, password FROM users WHERE email = ?";

$stmt = $connection -> prepare($sql);
$stmt -> bind_param("s", $email);
$stmt -> execute();
$result = $stmt -> get_result();
$stmt -> close();

$user_data = $result -> fetch_assoc();
$count = $result -> num_rows;

if ($count === 1 && $user_data['password'] === $password) {
    $_SESSION['id'] = $user_data['user_id'];
    header("location: profile.php");
} elseif ($count === 1 && $user_data['password'] !== $password) {
    echo "Неверный пароль";
} else {
    echo "Пользователь не найден";
}
?>
