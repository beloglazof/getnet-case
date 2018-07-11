<?php
session_start();


$servername = 'localhost';
$user = 'gtntest1-profile';
$password = 'vaDNvkx-,pxtKDN9';
$database = 'gtntest1-profile';

$connection = new mysqli($servername, $user, $password, $database);

if ($connection -> connect_error) {
    die('Connection failed: ' . $connection -> connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email = '$email'";

$result = $connection -> query($sql);
$count = $result -> num_rows;
$user_data = $result -> fetch_array(MYSQLI_ASSOC);

$pass = $user_data['password'];
$id = $user_data['user_id'];

if ($count === 1 && $pass === $password) {
    $_SESSION['id'] = $id;
    header("location: profile.php");
} elseif ($count === 1 && $pass !== $password) {
    echo "Неверный пароль";
} else {
    echo "Пользователь не найден";
}

?>

