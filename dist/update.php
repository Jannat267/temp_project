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
    if (isset($_GET['edit'])) {

        $id = $_GET['edit']; // Getting value from home.php edit button
        $result = $con->query("SELECT * FROM users WHERE  id =$id") or die($mysqli->error);
       // $_SESSION['edit'] = $_GET['edit'];
        if ($result) {
            $row = $result->fetch_assoc();

            $reg_fname = $row['first_name'];
            $reg_lname = $row['last_name'];
            $reg_email= $row['email'];
            $reg_username= $row['username'];
            $reg_password= $row['password'];
            //$_SESSION['reg_fname'] = $row['first_name'];
        }
    }
    if (isset($_POST['update'])) {

        $id = $_POST['id']; // getting value from home.php hidden input type
        $fname = $_POST['reg_fname'];
        $lname = $_POST['reg_lname'];
        $email = $_POST['reg_email'];
        $password = md5($_POST['reg_password']);
        $username = $fname . "_" . $lname; //string concatenation
        $modify_date = date("Y-m-d");


        $sql = ("UPDATE users SET first_name='$fname',last_name='$lname',
     email ='$email',username = '$username',password ='$password',modify_date='$modify_date' WHERE id= '$id'");

        if ($con->query($sql) == true) {
            $_SESSION['messege'] = "!!! Information has been updated !!!";
            $_SESSION['msg_type'] = "success";
        } else {
            $_SESSION['messege'] = "!!!...SORRY.Information  update failed...!!!" . $mysqli->error;
            $_SESSION['msg_type'] = "warning";
        }

        header("Location: tables.php");
        return;
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
                                          Update Account</h3>
                                        
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="hidden" name="id" value="<?= $id ?>">
                                                    <label class="small mb-1" for="inputFirstName">First Name</label>
                                                    <input class="form-control py-4" id="inputFirstName" type="text" name="reg_fname" placeholder="Enter first name" value="<?php  {echo $reg_fname;} ?>"required>
                                                                                                                                                                                
                                                                                                                                                                            
                                                    <?php if (in_array("Your first name must be between 2 and 25 characters<br>", $error_array)) echo "Your first name must be between 2 and 25 characters<br>"; ?>


                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputLastName">Last Name</label>
                                                    <input class="form-control py-4" id="inputLastName" type="text" placeholder="Enter last name" / name="reg_lname" value="<?php {echo $reg_lname;} ?>"required>
                                                    <?php if (in_array("Your last name must be between 2 and 25 characters<br>", $error_array)) echo "Your last name must be between 2 and 25 characters<br>"; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Email</label>
                                            <input class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" / name="reg_email" value="<?php  {echo $reg_email;} ?>"required>
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
                                            
                                                <button type="submit" class="btn btn-warning" value="ok" name="update"> Update </button>
                                             </div>
                                    
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