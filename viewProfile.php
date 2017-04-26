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
                    <li class="">
                        <a href="PlantSearch.html"> Plant Search </a>
                    </li>
                    <li class="">
                        <a href="ArborSearch.html"> Arboretum Search </a>
                    </li>
                    <li class="page-scroll">
                        <a href="#portfolio">Profile</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#search">Allergies</a>
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
                         <center>
<br>
   <img src="img/portfolio/water_lily.jpg" width="485" height="415" alt=""></center>
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

// Check connection
if (mysqli_connect_errno()) {
echo("Can't connect to MySQL Server. Error code: " . mysqli_connect_error());
}

$inputEmail = $_SESSION['Email'];
$uid = $_SESSION['UID'];

$query = "SELECT uid, firstname, lastname, email, password FROM User";
$result = mysqli_query($con,$query);


while($row = mysqli_fetch_array($result)) {
  if ($row['email'] == $inputEmail) {
    //echo "<br>";
    echo " ". "<div class='text-center'><big><strong>First Name: </strong> $row[firstname]";
    echo "<br></br>";
    echo " "."<strong>Last Name</strong>: $row[lastname]";
    echo "<br></br>";
    echo " "."<strong>Email</strong>: $row[email]</div>";
    echo "</big><br>";
  }
}


mysqli_close($con);
?>

            </p>
            <!-- Display comprehensive allergy list -->
            </div>
            
            <div class="row">
                <div class="col-lg-12 text-center">
                    <br></br>
                    <h2>Your Allergies</h2>

                    <hr class="star-primary">
                </div>
            

            <!--INSERT PHP HERE TO DISPLAY ALL THE ALLERGIES !-->

<?php
  require_once('./library.php');
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

if (mysqli_connect_errno()) {
  echo("Can't connect to MySQL Server. Error code: " . mysqli_connect_error());
}

session_start();
$uid = $_SESSION['UID'];

$sql="SELECT uid, pid FROM Allergic_To";
$result = mysqli_query($con,$sql);

$pid_list = array();
$cname_list = array();

while($row=mysqli_fetch_array($result)){
  if($row['uid']==$uid){
    $pid_item = $row['pid'];
    array_push($pid_list, $pid_item);
    //print_r($pid_list);
  }
}

foreach($pid_list as $item){
  //trying to match pid_item to commonname in plant
  $query = "SELECT pid, symbol, genus, species, cname, family FROM Plant";
  $result2 = mysqli_query($con,$query);
  echo "<div class='text-center'> <br><big><strong>Plant_ID:</strong> $item </br>";
  while( $row2 = mysqli_fetch_array($result2)){
    if($row2['pid'] == $item){

      $cname_item = $row2['cname'];
      echo "$cname_item </big> <br> </div>";

    }
  }
}
mysqli_close($con);

?>

          </div> <!-- closes container -->
        </div>
    </section>

<!--Delete Allergy -->
    <div class="row">
        <div class="col-lg-12 text-center">
            <h2>Delete Allergies</h2>
            <hr class="star-primary">
        </div>
  </div>
<div class="container">
<form action="viewProfile.php" method="post">
<div class="form-group">
<div class="text-left">
<center>
 <font size="+1"><i>Please enter one at a time</i></font>  
 <input placeholder="Enter Plant ID" class="form-control" id="delete" name="delete"></input></center>
</div>
</div>

<!-- INSERT THE PHP HERE!!!!! -->
<?php
include_once("./library.php"); // To connect to the database
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
// Check connection
if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
session_start();
//print_r($_SESSION);
$email = $_SESSION['Email'];
$query1 = "SELECT uid,email FROM User";
$result = mysqli_query($con, $query1);

while($row = mysqli_fetch_array($result)) {
  if($row['email'] == $email) {
    $uid = $row['uid'];
  }
}
$uid = $_SESSION['UID'];

$delete_list = $_POST['delete'];
$parsed = explode(', ', $delete_list);
//$count = 0;

foreach($parsed as $item){
  $sql="SELECT uid,pid FROM Allergic_To";
  $result2=mysqli_query($con,$sql);
  while($row2 = mysqli_fetch_array($result2)){
    $query="DELETE FROM Allergic_To WHERE uid=$uid AND pid='$item' ";

    if(!mysqli_query($con, $query)){
      die('Error: '. mysqli_error($con));
    }
    else{
      //echo "Record(s) deleted successfully.";
    }
  }
}
//if($con->query($query) == True) {
  //echo "Record deleted successfully";
  //echo "$count Records Deleted Successfully.";                                                                                                                                   
//}
//else {
//echo "Error deleting record: " . $con->error;
//}
echo "<i>*Please refresh the page to see an updated list of your allergies.</i>";
echo "<br>";
mysqli_close($con);
?>

</div> <!-- closes container -->
          <!-- ENTER DELETE ALLERGY BUTTON -->
          <div class="row">
              <div class="form-group col-xs-12">
                <center>
                  <button type="submit" class="btn btn-info btn-danger btn-lg" href="viewProfile.php">DELETE</button></center>
  </div>
  </div>
  </form>

<!-- Insert Allergy -->
<section class="success" id="search">
  <div class="row">
                    <div class="col-lg-12 text-center">
                    <h2>Add Plant Allergies</h2>
                    <hr class="star-light">
                </div>
         <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="text-center" >
            <form action="InsertAllergy.php" method="post">
  <div class="form-group">
  <div align="center">
 <font size="+1"><i>Please enter one at a time</i></font>  
    <input placeholder="Enter Exact Plant Common Name" class="form-control" style="width: 500px" id="allergy" name="allergy"></input>
  </div>
</div>
                      <!-- ENTER ALLERGY BUTTON -->
                      <div class="row">
                          <div class="form-group col-xs-12">
                              <center>
                              <button type="submit" placeholder="Enter exact common name of Plant" class="btn btn-info btn-lg" href="InsertAllergy.php">ADD ALLERGY</button></center>
                      </div>
                      </div>
                  </form>

  
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
