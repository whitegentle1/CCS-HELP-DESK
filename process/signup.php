<?php
session_start();

include("../connection/db.php");
include("../func/func.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $course = $_POST['course'];
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $middle_name = empty($_POST['middlename']) ? '' : $_POST['middlename'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($first_name) && !empty($last_name) && !empty($email) && !empty($password)) {
        try {
            $query = "SELECT email FROM users WHERE email = :email";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($existingUser) {
                echo "Email already exists";
            } else {
                $user_id = random_num(10);
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $query = "INSERT INTO users (user_id, course, firstname, lastname, middlename, email, password) 
                          VALUES (:user_id, :course, :firstname, :lastname, :middlename, :email, :password)";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(':user_id', $user_id);
                $stmt->bindParam(':course', $course);
                $stmt->bindParam(':firstname', $first_name);
                $stmt->bindParam(':lastname', $last_name);
                $stmt->bindParam(':middlename', $middle_name);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $hashed_password);
                $stmt->execute();

                $_SESSION['user_id'] = $user_id;
                $_SESSION['email'] = $email;

                echo "Registration successful!";
                sleep(1);
                header("Location: ../");
                die;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Please enter some valid information!";
    }
}
?>
