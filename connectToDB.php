<?php
    $servername = '127.0.0.1';
    $user = 'root';
    $password = 'password';
    $database = 'user_info';

    $connection = new mysqli($servername, $user, $password, $database);

    if ($connection -> connect_error) {
        die('Connection failed: ' . $connection -> connect_error);
    }
?>