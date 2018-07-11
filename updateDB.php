<?php
    require "connectToDB.php";

    $changedValue = $_GET['q'];
    $email = $_GET['email'];

    $sql = "UPDATE users SET firstname = '$changedValue' WHERE email = '$email'";
    
    if ($connection->query($sql) === TRUE) {
        echo "Value update";
    } else {
        echo "Error updating record: " . $conn->error;
    }
?>