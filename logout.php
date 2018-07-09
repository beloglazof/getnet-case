<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: index.html");
} else if (isset($_SESSION['user']) != "") {
    header("Location: profile.php");
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['id']);
    header("Location: index.html");
    exit;
}