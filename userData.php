<?php
    $session_id = $_SESSION['id'];
    
    
    $result = $connection -> query("SELECT * FROM users WHERE user_id = $session_id");
    $user_data = $result -> fetch_assoc();
    
    
?>