<?php 
    session_start();
    include('config/connect_login.php');

    $errors = array();

    if (isset($_POST['login'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        if (empty($username)) {
            array_push($errors, "Username is required");
        }

        if (empty($password)) {
            array_push($errors, "Password is required");
        }

        if (count($errors) == 0) {
            $password = $password;
            $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1) {
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "Logged in successfully";
                header("location: index.php");
            } else {
                array_push($errors, "Wrong Username or Password");
                header("location: loginform.php");
            }
        }
         else {
            array_push($errors, "Username & Password is required");
            $_SESSION['error'] = "Required enter username & password!";
            header("location: loginform.php");
        }
    }
?>