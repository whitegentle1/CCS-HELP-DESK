<?php
function check_login($conn)
{
    if (isset($_SESSION['user_id'])) {
        $id = $_SESSION['user_id'];
        $query = "SELECT * FROM users WHERE user_id = :id LIMIT 1";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user_data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user_data;
        }
    }


    // Redirect to login
    header("Location: ../CCS-HELP-DESK/landing.php");
    die;
}

// Check if the user is logged in or not, then redirect to landing.php
function random_num($length)
{
    $text = "";
    if ($length < 5) {
        $length = 5;
    }

    $len = rand(4, $length);

    for ($i = 0; $i < $len; $i++) {
        $text .= rand(0, 9);
    }

    return $text;
}
