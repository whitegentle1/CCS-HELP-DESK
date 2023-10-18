<?php 
session_start();

	include("connection/db.php");
	include("func/func.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
        $course = $_POST['course'];
        $first_name = $_POST['firstname'];
        $last_name = $_POST['lastname'];
        $middle_name = $_POST['middlename'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];
        
		if((strcmp($course, "Course") !== 0) && !empty($email) && !empty($first_name) && !empty($last_name) && !empty($middle_name) && !empty($email) && !empty($password) && !empty($repassword))
        {
            $query = "SELECT email FROM users WHERE email = '$email';";
            $stmt = $conn->prepare($query);
            $stmt->execute();

            //check user if already exists
            if ($stmt->rowCount() > 0) //if email exists
            {
                //echo "User already exists!";
                header("location: landing.php?error=userAlreadyExists");
                exit();
            }
            else
            {
                //check if password and repassword match
                if(strcmp($password, $repassword) == 0)
                {
                    try{
                        //password hashed
                        $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
    
                        //save to database
                        $user_id = random_num(20);
                        $query = "INSERT INTO users (user_id, course, firstname, lastname, middlename, email, password) 
                                VALUES (:user_id, :course, :firstname, :lastname, :middlename, :email, :password)";
                        $stmt = $conn->prepare($query);
                        $stmt = $conn->prepare($query);
                        $stmt->bindParam(':user_id', $user_id);
                        $stmt->bindParam(':course', $course);
                        $stmt->bindParam(':firstname', $first_name);
                        $stmt->bindParam(':lastname', $last_name);
                        $stmt->bindParam(':middlename', $middle_name);
                        $stmt->bindParam(':email', $email);
                        $stmt->bindParam(':password', $passwordHashed);
                        $stmt->execute();
            
                        echo "Registration successful!";
                        sleep(3);
                        header("Location: landing.php");
                        die;
                    }
                    catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                }
                else
                {
                    echo "Passwords don't match!";
                    header("location: landing.php?error=passwordsNotMatched");
                }
            }
        }
        else
		{
			echo "Please enter some valid information!";
            header("location: landing.php?error=emptyInput");
		}
	}
?>
