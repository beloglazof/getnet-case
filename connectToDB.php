<?php
    $servername = '127.0.0.1';
    $user = 'gtntest1-profile';
    $password = 'vaDNvkx-,pxtKDN9';
    $database = 'users';

    $connection = new mysqli($servername, $user, $password, $database);

    if ($connection -> connect_error) {
        die('Connection failed: ' . $connection -> connect_error);
    }
?>