<?php
session_start();

include("../connection/db.php");

if (isset($_SESSION['user_id'])) {
    unset($_SESSION['user_id']);
}

header("Location: /");
die;
?>
