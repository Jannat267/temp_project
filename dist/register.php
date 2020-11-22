<?php
    //Declaring variables to prevent errors

session_start();

$con = mysqli_connect("localhost", "root", "", "social"); //Connection variable
 
if(mysqli_connect_errno()) 
{
    echo "Failed to connect: " . mysqli_connect_errno();
}
    $fname = ""; //First name
    $lname = ""; //Last name
    $em = ""; //email
    $password = ""; //password
    $password2 = ""; //password 2
    $date = ""; //Sign up date 
    $error_array = array(); //Holds error messages

    if (isset($_POST['register_button'])) {
        //Registration form values
        //First name
        $fname = strip_tags($_POST['reg_fname']); //Remove html tags
        $fname2 = ucfirst(strtolower($fname)); //Uppercase first letter
        $_SESSION['reg_fname'] = ($_POST['reg_fname']); //Stores first name into session variable

        //Last name
        $lname = strip_tags($_POST['reg_lname']); //Remove html tags
        $lname2 = ucfirst(strtolower($lname)); //Uppercase first letter
        $_SESSION['reg_lname'] = ($_POST['reg_lname']); //Stores last name into session variable
        //email
        $em = strip_tags($_POST['reg_email']); //Remove html tags
        $em = str_replace(' ', '', $em); //remove spaces
        $_SESSION['reg_email'] = ($_POST['reg_email']); //Stores email into session variable
        //Password
        $password = strip_tags($_POST['reg_password']); //Remove html tags
        $password2 = strip_tags($_POST['reg_password2']);
        //Remove html tags
        $date = date("Y-m-d");
        if (filter_var($em, FILTER_VALIDATE_EMAIL)) {

            $em = filter_var($em, FILTER_VALIDATE_EMAIL);

            //Check if email already exists 
            $e_check = mysqli_query($con, "SELECT email FROM users WHERE email='$em'");

            //Count the number of rows returned
            $num_rows = mysqli_num_rows($e_check);

            if ($num_rows > 0) {
                array_push($error_array, "Email already in use<br>");
            }
        } else {
            array_push($error_array, "Invalid email format<br>");
        }

        if (strlen($fname) > 25 || strlen($fname) < 2) {
            array_push($error_array, "Your first name must be between 2 and 25 characters<br>");
        }

        if (strlen($lname) > 25 || strlen($lname) < 2) {
            array_push($error_array,  "Your last name must be between 2 and 25 characters<br>");
        }

        if ($password != $password2) {
            array_push($error_array,  "Your passwords do not match<br>");
        } else {
            if (preg_match('/[^A-Za-z0-9]/', $password)) {
                array_push($error_array, "Your password can only contain english characters or numbers<br>");
            }
        }

        if (strlen($password) > 30 || strlen($password) < 5) {
            array_push($error_array, "Your password must be betwen 5 and 30 characters<br>");
        }
        if (empty($error_array)) {
            $password = md5($password); //Encrypt password before sending to database

            //Generate username by concatenating first name and last name
            $username =($fname . " " . $lname);
            $check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");
            $i = 0;
            //if username exists add number to username
            while (mysqli_num_rows($check_username_query) != 0) {
                $i++; //Add 1 to i
                $username = $username . "_" . $i;
                $check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");
            }
            $query = mysqli_query($con, "INSERT INTO users VALUES ('', '$fname', '$lname', '$username', '$em', '$password', '$date', ' ', '0', '0', 'no', ' ',' ')");

            array_push($error_array, "<span style='color: #14C800;'>You're all set! Goahead and login!</span><br>");

            //Clear session variables 
            $_SESSION['reg_fname'] = "";
            $_SESSION['reg_lname'] = "";
            $_SESSION['reg_email'] = "";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Page Title - SB Admin</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">
                                        Create Account</h3>
                                        
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="hidden" name="id" value="<?= $id ?>">
                                                    <label class="small mb-1" for="inputFirstName">First Name</label>
                                                    <input class="form-control py-4" id="inputFirstName" type="text" name="reg_fname" placeholder="Enter first name" value="<?php if (isset ($_SESSION['reg_fname'])) {
                                                                                                                                                                                echo $_SESSION['reg_fname'];
                                                                                                                                                                            } ?>" required>
                                                    <?php if (in_array("Your first name must be between 2 and 25 characters<br>", $error_array)) echo "Your first name must be between 2 and 25 characters<br>"; ?>


                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputLastName">Last Name</label>
                                                    <input class="form-control py-4" id="inputLastName" type="text" placeholder="Enter last name" / name="reg_lname" value="<?php if (isset($_SESSION['reg_lname'])) {
                                                                                                                                                                                echo $_SESSION['reg_lname'];
                                                                                                                                                                            }
                                                                                                                                                                            ?>"required>
                                                    <?php if (in_array("Your last name must be between 2 and 25 characters<br>", $error_array)) echo "Your last name must be between 2 and 25 characters<br>"; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Email</label>
                                            <input class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" / name="reg_email" value="<?php if (isset($_SESSION['reg_email'])) {
                                                                                                                                                                                                                echo $_SESSION['reg_email'];
                                                                                                                                                                                                            } ?>"required>
                                            <?php if (in_array("Email already in use<br>", $error_array)) echo "Email already in use<br>";
                                            else if (in_array("Invalid email format<br>", $error_array)) echo "Invalid email format<br>"; ?>

                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputPassword">Password</label>
                                                    <input class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" / name="reg_password" value=""required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                                                    <input class="form-control py-4" id="inputConfirmPassword" type="password" placeholder="Confirm password" / name="reg_password2" value=""required>
                                                    <?php if (in_array("Your passwords do not match<br>", $error_array)) echo "Your passwords do not match<br>";
                                                    else if (in_array("Your password can only contain english characters or numbers<br>", $error_array)) echo "Your password can only contain english characters or numbers<br>";
                                                    else if (in_array("Your password must be betwen 5 and 30 characters<br>", $error_array)) echo "Your password must be betwen 5 and 30 characters<br>"; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group container row justify-content-md-center">
                                            <?php
                                            if (isset($_GET['edit'])) : ?>

                                                <button type="submit" class="btn btn-warning" value="ok" name="update">Update</button>
                                            <?php else : ?>
                                                <button type="submit" class="btn btn-primary" value="ok" name="register_button">Create Account</button>
                                            <?php endif; ?> </div>
                                        <?php if (in_array("<span style='color: #14C800;'>You're all set! Goahead and login!</span><br>", $error_array)) {
                                            echo "<span style='color: #14C800;'>You're all set! Go ahead and login!</span> <br>";
                                        } ?>
                                    </form>

                                    <div class="card-footer text-center">
                                        <div class="small"><a href="login.php">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2020</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>