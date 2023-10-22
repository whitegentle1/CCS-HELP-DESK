<?php
session_start();

include("connection/db.php");
include("func/func.php");

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['email'])) {
    $email = $_POST['email'];

    try {
        $query = "SELECT email FROM users WHERE email = :email";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existingUser) {
            echo "exists";
        } else {
            echo "ok";
        }
    } catch (PDOException $e) {
        echo "error";
    }
}
?>
