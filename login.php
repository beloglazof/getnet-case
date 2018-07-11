<?php
session_start();

require "connectToDB.php";

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

