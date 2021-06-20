<?php
session_start();
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

    <h2>Login</h2>
    
    <div class="container">
        <form method="POST" action="adminpanel.php">
            <div class="row">
                <div class="col-25">
                    <label for="fname">User Name</label>
                </div>
                <div class="col-75">
                 
                    <input type="text"  required name="" placeholder="User Name">
                
                </div>
            </div>
            
            <div class="row">
                <div class="col-25">
                    <label for="fname">Password</label>
                </div>
                <div class="col-75">
                 
                    <input type="password"  required name="" placeholder="Password">
                
                </div>
            </div> 

			<br>

            <div class="row">
                
                <input type="submit" name="" value="Login">
               
            </div>
        </form>
    </div>

</body>

</html>
<br>
<?php include('footer.php'); ?>

