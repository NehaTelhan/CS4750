<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CS 4750 Plant Database</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/freelancer.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">
<div id="skipnav"><a href="#maincontent">Skip to main content</a></div>

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#page-top">A Plant Enthusiast's Haven</a>
            </div>

   <!-- Collect the nav links, forms, and other content for toggling -->
   <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#portfolio">Explore</a>
                    </li>
                    <li class="">
                        <a href="PlantSearch.html"> Plant Search </a>
                    </li>
                    <li class="">
                        <a href="ArborSearch.html"> Arboretum Search </a>
                    </li>
                    <li class="page-scroll">
                        <a href="viewProfile.php">View Profile</a>
                    </li>
                    <li class="page-scroll">
                        <a href="Logout.php">Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container" id="maincontent" tabindex="-1">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-text">
                        <h1 class="name">View Profile</h1>
                          <div class="text-center">
                        <hr class="star-light">
                        <span class="skills">Explore - Search - Research - Discover</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- User Info Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Your information</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div>
              <p>



                <?php
require_once('./library.php');
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

session_start();
//print_r($_SESSION);

if(isset($_SESSION['Email'])){
  echo "Your session is running as " . $_SESSION['Email'];
}
// Check connection
if (mysqli_connect_errno()) {
echo("Can't connect to MySQL Server. Error code: " . mysqli_connect_error());
}

$inputEmail=$_SESSION['Email'];
// Form the SQL query (a SELECT query)
$sql="SELECT uid, firstname, lastname, email, password, hasallergy FROM User WHERE email LIKE $inputEmail";
$result = mysqli_query($con,$sql);

// Print the data from the table row by row
while($row = mysqli_fetch_array($result)) {
echo $row['uid'];
echo " " . $row['firstname'];
echo " " . $row['lastname'];
echo " " . $row['email'];
echo " " . $row['password'];
echo " " . $row['hasallergy'];
echo "<br>";
}
mysqli_close($con);
?>

              // include_once("./library.php"); // To connect to the database
              // $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
              //
              // // Check connection
              // if (mysqli_connect_errno())
              //   {
              //     echo "Failed to connect to MySQL: " . mysqli_connect_error();
              //   }
              //
              // session_start();
              // //print_r($_SESSION);
              //
              // if(isset($_SESSION['Email'])){
              //   echo "Your session is running as " . $_SESSION['Email'];
              // }
              //
              // // // What I want to do is get the UID associated with this e-mail address and check to see the hashed password we have saved matches the password
              // $query1 = "SELECT firstname,lastname,email,hasallergy FROM User";
              // $result1 = $con->query($query1) or die ("Invalid Selection" . $con->error);
              //
              // $rows1 = $result1->num_rows;
              // echo "ROWS: $rows1";
              //
              // for ($i=0; $i<$rows1; $i++) {
              //   if ($result1->fetch_array()['email']==$_SESSION['Email']) {
              //     //$_Session['uid'] = $result1->fetch_array()['UID'];
              //     $_SESSION['First_Name'] = $result1->fetch_array()['firstname'];
              //     $_SESSION['Last_Name'] = $result1->fetch_array()['lastname'];
              //     $_SESSION['Email_1'] = $result1->fetch_array()['email'];
              //     $_SESSION['Has_allergy'] = $result1->fetch_array()['hasallergy'];
              //   }
              //   else {
              //     echo "Invalid Login.";
              //   }
              // }
              //
              // $print_first = $_SESSION['First_Name'];
              // $print_last = $_SESSION['Last_Name'];
              // $print_email = $_SESSION['Email_1'];
              // $print_allergy = $_SESSION['Has_allergy'];
              //
              // echo "First Name: $print_first\n";
              // echo "Last Name: $print_last\n";
              // echo "Email: $print_email\n";
              // echo "Allergy? $print_allergy\n";



            </p>

            </div>
        </div>
    </section>

<!-- Insert Allergy -->
<section class="success" id="search">
  <div class="row">
                    <div class="col-lg-12 text-center">
                    <h2>Plant Allergies</h2>
                    <hr class="star-light">
                </div>
         <div class="container">
  <div class="row">
        <div class="col-md-12">
          <div class="text-center" >
            <p>Add Allergies</p>
  <!-- //               <form action="viewProfile.php#search" method="post"> -->
                <form action="InsertAllergy.php" method="post">
                          <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">

                           <input type="text" class="form-control" placeholder="Plant Common Name" id="plantname" name="plantname" required data-validation-required-message="">
                                   <p class="help-block text-danger"></p>
                                </div>
                           </div>

                              <div id="success"></div>
                             <div class="row">
                                 <div class="form-group col-xs-12">
                                     <button type="submit" class="btn btn-success btn-lg">Enter Allergy</button>


                                     <?php include_once("./library.php"); // To connect to the database
                                  $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
                                  // Check connection
                                  if (mysqli_connect_errno())
                                    {
                                      echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                    }
                                  // Form the SQL query (an INSERT query)
                                  $allergy_name = $_POST['plantname'];
session_start();
printr($_SESSION);
$uid = $_SESSION['UID'];

$query = "SELECT PID,Common_Name FROM Plant";
$result = $con->query($query) or die ("Invalid Selection" . $con->error);

$rows = $result->num_rows;

for ($i=0; $i<$rows; $i++) {
  if ($result->fetch_array()['Common_Name']==$allergy_name) {
    $pid = $result->fetch_array()['PID'];
    $sql="INSERT INTO Allergic_to (UID, PID) VALUES ('$uid', '$pid')";
  }
  else
    {
      echo "Failed to Insert";
    }
}
$_SESSION['Email'] = $email;

echo $_SESSION["Email"];
echo "UID: $uid";

//                  $sql="INSERT INTO Allergic_To (UID) VALUES ()";

if (!mysqli_query($con,$sql))
  {
    die('Error: ' . mysqli_error($con));
  }
else
  {
    //echo
  }
 mysqli_close($con);
?>

                                 </div>
                             </div>
                         </form>
  </div>
</div>
</div>




</section>



    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>Location</h3>
				    <p>Rice Hall, Engineer's Way
                            <br>Charlottesville, VA 22003</p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Connect with Us Elsewhere (Don't)</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="#" class="btn-social btn-outline"><span class="sr-only">Facebook</span><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><span class="sr-only">Google Plus</span><i class="fa fa-fw fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><span class="sr-only">Twitter</span><i class="fa fa-fw fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><span class="sr-only">Linked In</span><i class="fa fa-fw fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><span class="sr-only">Dribble</span><i class="fa fa-fw fa-dribbble"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>CS 4750 Databases </h3>
                        <p>This was a project for the Databases class at the University of Virginia <a href="http://engineering.virginia.edu">Learn About UVa</a>.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
						       Copyright &copy; Your Website 2016
                    </div>
                </div>
            </div>
        </div>
    </footer>

						       <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/freelancer.min.js"></script>

</body>

</html>
