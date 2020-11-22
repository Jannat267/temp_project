<?php

session_start();

$con = mysqli_connect("localhost", "root", "", "social"); //Connection variable

if (mysqli_connect_errno()) {
    echo "Failed to connect: " . mysqli_connect_errno();
}
if (isset($_POST['login'])) {

    $email = $_POST['log_email'];
    $pass = md5($_POST['log_password']);

    $_SESSION['email'] = $email;
    $_SESSION['pass'] = $pass;

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $e_check = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND password='$pass'");
        $num_rows = mysqli_num_rows($e_check);
        //echo $num_rows."<br>";

        if ($num_rows == 1) {
            //echo $num_row_pass."<br>";
            //$_SESSION['id']=$row['id'];
            header("location:home.php");
        } else
            echo " <div class='p-3 mb-2 bg-danger text-white'>Wrong email or password!!!</div>";
    } else
        echo "<div class='p-3 mb-2 bg-danger text-white'>!!!!!Invalid Email!!!</div>";
}
