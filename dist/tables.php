<?php
require('config.php');

$email = $_SESSION['email'];
$pass = $_SESSION['pass'];

if ($show_name = mysqli_query($con, "SELECT username FROM users WHERE email='$email' AND password='$pass'")) {

   $username = mysqli_fetch_assoc($show_name);
   //var_dump($username);
} else {
   //var_dump(mysqli_error());
}


if (isset($_POST['dlt_id'])) {

   $id = $_POST['dlt_id'];

   $sql = "DELETE FROM users WHERE  id ='$id'";
   if ($con->query($sql) == true) {
      $_SESSION['messege'] = "...Record has been deleted!...";
      $_SESSION['msg_type'] = "danger";
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
   <title>Dashboard - SB Admin</title>
   <link href="css/styles.css" rel="stylesheet" />
   <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
   <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">Start Bootstrap</a>
      <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
      <!-- Navbar Search-->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
         <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
            <div class="input-group-append">
               <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
            </div>
         </div>
      </form>
      <!-- Navbar-->
      <ul class="navbar-nav ml-auto ml-md-0" style="color: white;"> <?php
                                                                     echo $username["username"];

                                                                     ?>
      </ul>
      <ul class="navbar-nav ml-auto ml-md-0">
         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
               <a class="dropdown-item" href="#">Settings</a>
               <a class="dropdown-item" href="#">Activity Log</a>
               <div class="dropdown-divider"></div>
               <a class="dropdown-item" href="login.php">Logout</a>
            </div>
         </li>
      </ul>
   </nav>
   </div>
   </div>
   </div>
   </div>
   <div id="layoutSidenav">
      <div id="layoutSidenav_nav">
         <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
               <div class="nav">
                  <div class="sb-sidenav-menu-heading">Core</div>
                  <a class="nav-link" href="home.php">
                     <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                     Dashboard
                  </a>
                  <div class="sb-sidenav-menu-heading">Interface</div>
                  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                     <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                     Layouts
                     <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                  </a>
                  <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                     <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="layout-static.html">Static Navigation</a>
                        <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                     </nav>
                  </div>
                  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                     <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                     Pages
                     <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                  </a>
                  <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                     <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                           Authentication
                           <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                           <nav class="sb-sidenav-menu-nested nav">
                              <a class="nav-link" href="login.php">Login</a>
                              <a class="nav-link" href="register.php">Register</a>
                              <a class="nav-link" href="password.php">Forgot Password</a>
                           </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                           Error
                           <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                           <nav class="sb-sidenav-menu-nested nav">
                              <a class="nav-link" href="401.html">401 Page</a>
                              <a class="nav-link" href="404.html">404 Page</a>
                              <a class="nav-link" href="500.html">500 Page</a>
                           </nav>
                        </div>
                     </nav>
                  </div>
                  <div class="sb-sidenav-menu-heading">Addons</div>
                  <a class="nav-link" href="charts.html">
                     <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                     Charts
                  </a>
                  <a class="nav-link" href="tables.php">
                     <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                     USers
                  </a>
               </div>
            </div>
            <div class="sb-sidenav-footer">
               <div class="small">Logged in as:</div>
               Start Bootstrap
            </div>
         </nav>
      </div>
      <div id="layoutSidenav_content">
         <main>
            <div class="container-fluid">
               <h1 class="mt-4">Dashboard</h1>
               <ol class="breadcrumb mb-4">
                  <li class="breadcrumb-item active">Dashboard</li>
               </ol>
               <div class="row">
                  <div class="col-xl-3 col-md-6">
                     <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Primary Card</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                           <a class="small text-white stretched-link" href="#">View Details</a>
                           <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-md-6">
                     <div class="card bg-warning text-white mb-4">
                        <div class="card-body">Warning Card</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                           <a class="small text-white stretched-link" href="#">View Details</a>
                           <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-md-6">
                     <div class="card bg-success text-white mb-4">
                        <div class="card-body">Success Card</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                           <a class="small text-white stretched-link" href="#">View Details</a>
                           <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-md-6">
                     <div class="card bg-danger text-white mb-4">
                        <div class="card-body">Danger Card</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                           <a class="small text-white stretched-link" href="#">View Details</a>
                           <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-xl-6">
                     <div class="card mb-4">
                        <div class="card-header">
                           <i class="fas fa-chart-area mr-1"></i>
                           Area Chart Example
                        </div>
                        <div class="card-body">
                           <canvas id="myAreaChart" width="100%" height="40"></canvas>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-6">
                     <div class="card mb-4">
                        <div class="card-header">
                           <i class="fas fa-chart-bar mr-1"></i>
                           Bar Chart Example
                        </div>
                        <div class="card-body">
                           <canvas id="myBarChart" width="100%" height="40"></canvas>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="card mb-4">
                  <div class="card-header">
                     <i class="fas fa-table mr-1"></i>
                     DataTable Example
                  </div>
               </div>
               <?php if (isset($_SESSION['messege'])) { ?>
                  <div class="container">
                     <div class="row">
                        <div class="col-12">
                           <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
                              <center>
                                 <h3><?= $_SESSION['messege'] ?></h3>
                              </center>
                           </div>
                        </div>
                     </div>
                  </div>
               <?php
                  //session destorying
                  unset($_SESSION['messege'], $_SESSION['msg_type']);
               }
               ?>
               <div class="card-body">
                  <div class="table-responsive">
                     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                           <th>Name</th>
                           <th>Username</th>
                           <th>Email</th>
                           <th>Signup_date</th>
                           <th>Last_modify_date</th>
                           <th>Edit</th>
                           <th>Delete</th>
                        </thead>
                        <?php //loop showing all data
                        $table = $con->query("SELECT * FROM users");
                        while ($row = $table->fetch_assoc()) { ?>
                           <tr>
                              <td><?= $row['first_name']; ?>
                                 <?= $row['last_name']; ?>
                              </td>
                              <td><?= $row['username']; ?></td>
                              <td><?= $row['email']; ?> </td>
                              <td><?= date("jS, F Y", strtotime($row['signup_date'])); ?> </td>
                              <td><?php /* if ((mysqli_query($con, "SELECT modify_name FROM users
                                 WHERE modify_name IS NULL;"))==true) $d_id=$row['id']; echo " ";
                                 else */
                                 if (($row['modify_date'])!=0) 
                                    echo date("jS, F Y", strtotime($row['modify_date']));
                                    else echo " "; ?> </td>
                              <td>
                                 <!-- Edit Button -->
                                 <a href="update.php?edit=<?= $row['id']; ?>" class="btn btn-info">Edit</a>
                              </td>
                              <td>
                                 <!-- Delete Button -->
                                <?php if(($row['email'])==($_SESSION['email'])) {echo " ";}
                                else { ?>
                                 <button class="btn btn-danger" onclick="return confirmDelete(<?= $row['id'] ?>);">Delete</button>
                                <?php }
                                 ?>
                              </td>
                           </tr>
                        <?php } ?>


                        <!-- Trigger the modal with a button -->
                        <!-- Modal -->
                        <div class="container">
                           <div class="modal fade" id="myModal" role="dialog">
                              <div class="modal-dialog">
                                 <!-- Modal content-->
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h4>Do you want to delete the record?</h4>
                                       <button class="btn btn-danger" type="button" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                       <form method="post">
                                          <input type="hidden" id="dltID" name="dlt_id" value="">
                                          <button class="btn btn-success">Yes</button>
                                       </form>

                                       <button type="button" class="btn btn-danger" data-dismiss="modal" name="no">NO</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </table>
                  </div>
               </div>
         </main>
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
         <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
         <script src="js/scripts.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
         <script src="assets/demo/chart-area-demo.js"></script>
         <script src="assets/demo/chart-bar-demo.js"></script>
         <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
         <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
         <script src="assets/demo/datatables-demo.js"></script>
         <script>
            function confirmDelete(id) {
               var id = id;
               //console.log(id);
               $('#dltID').val(id);
               $("#myModal").modal();

               return false;
            }
         </script>
</body>

</html>