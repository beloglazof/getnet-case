<?php 
$servername = 'localhost';
$user = 'root';
$password = 'password';
$database = 'user_info';

$connection = new mysqli($servername, $user, $password, $database);

if ($connection->connect_error) {
    die('Connection failed: ' . $connection->connect_error);
}

$sql = "UPDATE users SET lastname = 'Whoe' WHERE user_id = 2";

if ($connection -> query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $connection -> error;
}


$connection->close();
?>