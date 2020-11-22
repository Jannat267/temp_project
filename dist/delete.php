<?php
$con = mysqli_connect("localhost", "root", "", "social");

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];

  if (isset($_POST['yes'])) {
    $sql = "DELETE FROM users WHERE  id =$id";
    if ($con->query($sql) == true) {
      $_SESSION['messege'] = "...Record has been deleted!...";
      $_SESSION['msg_type'] = "danger";
    } else {
      $_SESSION['messege'] = "Record delete failed. " . $mysqli->error;
      $_SESSION['msg_type'] = "danger";
    }
    header("location: tables.php");
  }

  if (isset($_POST['no']))
    header("location: tables.php");
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
  <title>Tables - SB Admin</title>
  <link href="css/styles.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="row justify-content-center" style="margin-top: 100px;">
<h3 class="text-center font-weight-light my-4">Do you want to delete the record ?</h3></div>
<div class="row justify-content-center">
  <form method="POST"><button class="btn btn-success" type="submit" name="yes" value="Yes">YES</button>
    <button class="btn btn-danger" type="submit" name="no" value="No">NO </button></form></div>
   <?php require('tables.php');?>
</body>