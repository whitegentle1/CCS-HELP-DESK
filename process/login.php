<?php
session_start();

include("../connection/db.php");
include("../func/func.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {
        $query = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user_data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user_data) {
            if (password_verify($password, $user_data['password'])) {
                $_SESSION['user_id'] = $user_data['user_id'];

                echo "success";
                die;
            } else {
                echo "Email or Password is incorrect";
            }
        } else {
            echo "Email or Password is incorrect";
        }
    } else {
        echo "Invalid input.";
    }
} else {
    echo "Invalid request method.";
}
?>
