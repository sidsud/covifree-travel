
<?php

$db = mysqli_connect("localhost","root","","hetal_db");

if(!$db)
{
  die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['submit']))
{		
    
    $customer_country = $_POST['customer_country'];
    $customer_state = $_POST['customer_state'];
    $customer_city = $_POST['customer_city'];
    $customer_suburb = $_POST['customer_suburb'];
    $travel_country = $_POST['travel_country'];
    $travel_purpose = $_POST['travel_purpose'];
    $travel_state = $_POST['travel_state'];
    $travel_city = $_POST['travel_city'];
    $travel_suburb = $_POST['travel_suburb'];
    $travel_restricted_country = $_POST['travel_restricted_country'];
    $travel_restricted_state = $_POST['travel_restricted_state'];
    $travel_restricted_city = $_POST['travel_restricted_city'];
    $travel_restricted_suburb = $_POST['travel_restricted_suburb'];
    $medical_disease = $_POST['medical_disease'];
    $medical_vaccine_company = $_POST['medical_vaccine_company'];
    $medical_vaccine_duration = $_POST['medical_vaccine_duration'];
    
    
    $insert = mysqli_query($db,"INSERT INTO `admin_customer`(`country`, `state`, `city`, `suburb`) VALUES ('$customer_country','$customer_state','$customer_city','$customer_suburb')");

    if(!$insert)
    {
        echo "There is an error while inserting customer details";
    }


    $insert = mysqli_query($db,"INSERT INTO `admin_travel`(`country`, `travel_purpose`, `state`, `city`, `suburb`, `restricted_country`, `restricted_state`, `restricted_city`, `restricted_suburb`) 
    VALUES ('$travel_country','$travel_purpose','$travel_state','$travel_city','$travel_suburb','$travel_restricted_country','$travel_restricted_state','$travel_restricted_city','$travel_restricted_suburb')");

    if(!$insert)
    {
        echo "There is an error while inserting travel details";
    }
    
    $insert = mysqli_query($db,"INSERT INTO `admin_medical`(`disease`, `vaccine_company`, `vaccine_duration`) VALUES ('$medical_disease','$medical_vaccine_company','$medical_vaccine_duration')");

    if(!$insert)
    {
        echo "There is an error while inserting medical details";
    }
   
}
mysqli_close($db);
?>
<!DOCTYPE html>
<html>

<!--

    ALTER TABLE `hetal_db`.`medical_mst` 
ADD COLUMN `vaccine_recevied` VARCHAR(45) NOT NULL DEFAULT 'No' AFTER `updated_at`,
ADD COLUMN `vaccine_name` VARCHAR(45) NULL AFTER `vaccine_recevied`;

-->
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://localhost/style.css">
</head>
<!-- header file -->
<!-- <div class="header">
  <a href="#default" class="logo">CompanyLogo</a>
  <div class="header-right">
    <a>Customer details</a>
    <a class="active" href="http://localhost/medical_page.php">Medical details</a>
    <a>Summary</a>
  </div>
</div> -->
<!-- header file -->
<?php include('header.php'); ?>
<br>

<body>

    <h2>Admin Profile</h2>

    <div class="container">
        <form method="POST" action="successfull.php">
                  
        <div class="row text-center">
		       
			   <h6> Details Has been Added Successfully. </h6>
				
		</div>
        </form>
    </div>

</body>

</html>
<br>
<?php include('footer.php'); ?>
