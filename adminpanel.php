<?php
session_start();
if(isset($_GET['action']) && $_GET['action'] == "logout"){	

// remove all session variables
session_unset();

// destroy the session
session_destroy();

header("location:home_page.php");
}

$_SESSION["auth"] = "true"


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
                  
        <div class="row">
        <div class="col-25">
          <label for="fname">Edit Customer Details</label>
        </div>
		 <div class="col-25">
		 </div>
		<div class="col-75">
          <input type="text" id=""  name="customer_country" placeholder="Add Country"> 
        </div>
		 <div class="col-25">
		 </div>
        <div class="col-75">
          <input type="text" id=""  name="customer_state" placeholder="Add State"> 
        </div>
		<div class="col-25">
		</div>
		<div class="col-75">
          <input type="text" id=""  name="customer_city" placeholder="Add City"> 
        </div>
		<div class="col-25">
		</div>
		<div class="col-75">
          <input type="text" id=""  name="customer_suburb" placeholder="Add Suburb"> 
        </div>

		<div class="row">
        <div class="col-25">
          <label for="fname">Edit Travel Details</label>
        </div>
		 <div class="col-25">
		 </div>
		<div class="col-75">
          <input type="text" id=""  name="travel_country" placeholder="Add Country"> 
        </div>
		<div class="col-25">
		 </div>
		<div class="col-75">
          <input type="text" id=""  name="travel_purpose" placeholder="Add Purpose of Travel"> 
        </div>
		 <div class="col-25">
		 </div>
        <div class="col-75">
          <input type="text" id=""  name="travel_state" placeholder="Add State"> 
        </div>
		<div class="col-25">
		</div>
		<div class="col-75">
          <input type="text" id=""  name="travel_city" placeholder="Add City"> 
        </div>
		<div class="col-25">
		</div>
		<div class="col-75">
          <input type="text" id=""  name="travel_suburb" placeholder="Add Suburb"> 
        </div>

		<div class="col-25">
		</div>
		<div class="col-75">
          <input type="text" id=""  name="travel_restricted_country" placeholder="Add Restricted Country"> 
        </div>
		<div class="col-25">
		</div>
		<div class="col-75">
          <input type="text" id=""  name="travel_restricted_state" placeholder="Add Restricted State"> 
        </div>
		<div class="col-25">
		</div>
		<div class="col-75">
          <input type="text" id=""  name="travel_restricted_city" placeholder="Add Restricted City"> 
        </div>
		<div class="col-25">
		</div>
		<div class="col-75">
          <input type="text" id=""  name="travel_restricted_suburb" placeholder="Add Restricted Suburb"> 
        </div>
	

      <div class="row">
        <div class="col-25">
          <label for="fname">Edit Medical Details</label>
        </div>
		 <div class="col-25">
		 </div>
		<div class="col-75">
          <input type="text" id=""  name="medical_disease" placeholder="Add Disease"> 
        </div>
		 <div class="col-25">
		 </div>
        <div class="col-75">
          <input type="text" id=""  name="medical_vaccine_company" placeholder="Add Vaccine Company"> 
        </div>
		<div class="col-25">
		</div>
		<div class="col-75">
          <input type="text" id=""  name="medical_vaccine_duration" placeholder="Add Duration"> 
        </div>
		
           <br>
			<div class="row">
                <input type="button" class="cancel" name="cancel" value="Cancel">
                <input type="submit" name="submit" value="Save">
            </div>
        </form>
    </div>

</body>

</html>
<br>
<?php include('footer.php'); ?>
