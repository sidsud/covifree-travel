<?php

$db = mysqli_connect("localhost","root","","hetal_db");

if(!$db)
{
  die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['submit']))
{		
    $first_name = $_POST['first_name'];
    $middel_name = $_POST['middel_name'];
    $last_name = $_POST['last_name'];
    $dob = $_POST['dob'];
    $residential_address = $_POST['residential_address'];
    $postal_address = $_POST['postal_address'];

    $insert = mysqli_query($db,"INSERT INTO `customer_mst`(`first_name`, `middel_name`, `last_name`, `dob`, `residential_address`, `postal_address`) VALUES ('$first_name','$middel_name','$last_name','$dob','$residential_address','$postal_address')");

    if(!$insert)
    {
        echo "Records added successfully.";
    }
    else
    {
      echo "Records added successfully".$_POST['submit'];
      if($_POST['submit'] === 'Continue'){
        header("location:traveling_details.php");
      } else{
        header("location:customer_details.php");
      }
    }
   
}
mysqli_close($db); // Close connection

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

</style>

<link rel="stylesheet" href="http://localhost/style.css">
</head>
<?php include('header.php'); ?>

<br>
<div>
  <ul class="progressbar">
    <li class="active">Customer details</li>
    <li class="active">Travel details</li>
    <li class="active">Medical details</li>
    <li class="active">Summary</li>
  </ul>
</div>

<!-- header file -->
<!-- <div class="header">
  <a href="#default" class="logo">CompanyLogo</a>
  <div class="header-right">
    <a>Customer details</a>
    <a>Medical details</a>
    <a>Summary</a>
  </div>
</div> -->
<!-- header file -->
<body>

 
<!--<p>Resize the browser window to see the effect. When the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other.</p> -->
<br><br>
<div class="container">
  <form method="POST">
    <div class="row text-center">
    <img class="image" src="http://localhost/righttick.jpg"></img>
    <br><br>
        <textarea readonly id="fname" rows="5" required name="first_name" placeholder="Your name..">Congratulation! You Are Eligible to Travel to Your Desired Destination. Please Proceed to the Booking Page.
        </textarea>
    </div>

  </form>
</div>

</body>
</html>
<br>
<?php include('footer.php'); ?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>
    
</script>
