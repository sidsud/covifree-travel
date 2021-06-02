<?php

$db = mysqli_connect("localhost", "root", "", "hetal_db");

if (!$db) {
  die("Connection failed: " . mysqli_connect_error());
}
$query = mysqli_query($db, "select *from customer_mst ORDER BY id DESC LIMIT 1");
$customer_mst = mysqli_fetch_array($query); // fetch data from database
$query1 = mysqli_query($db, "select *from traveling_mst ORDER BY id DESC LIMIT 1"); // fetch data from database
$traveling_mst =  mysqli_fetch_array($query1); // fetch data from database
$query2 = mysqli_query($db, "select *from medical_mst ORDER BY id DESC LIMIT 1");
$medical_mst = mysqli_fetch_array($query2);

// fetch data from database
//mysqli_close($db); // Close connection

if (isset($_POST['submit'])) {
  if ($_POST['submit'] === 'Submit') {

    $msg = "First line of text\nSecond line of text";

    // use wordwrap() if lines are longer than 70 characters
    $msg = wordwrap($msg, 70);

    // send email
    mail("php.bahadur@spaculus.info", "My subject", $msg);
    header("location:theend.php");
  }
}
mysqli_close($db); // Close connection

?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://localhost/style.css">

</head>

<!-- header file -->
<!-- <div class="header">
  <a href="#default" class="logo">CompanyLogo</a>
  <div class="header-right">
    <a>Customer details</a>
    <a>Medical details</a>
    <a class="active" href="http://localhost/summary.php">Summary</a>
  </div>
</div> -->
<!-- header file -->
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

<body>

  <h2>Summary</h2>
  <!--<p>Resize the browser window to see the effect. When the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other.</p> -->

  <div class="container">
    <form method="POST">
      <div class="row">
        <div class="col-25">
          <label for="fname">First Name</label>
        </div>
        <div class="col-75 list_vaccination">
          <input type="text" id="fname" class="input" readonly value="<?php echo $customer_mst['first_name']; ?>" name="first_name">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname">Last Name</label>
        </div>
        <div class="col-75 list_vaccination">
          <input type="text" id="lname" readonly value="<?php echo $customer_mst['last_name']; ?>" name="last_name">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname">Date of Birth</label>
        </div>
        <div class="col-75 list_vaccination">
          <input type="text" id="dob" readonly value="<?php echo $customer_mst['dob']; ?>" name="dob">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname">Residential Address</label>
        </div>
        <div class="col-75 list_vaccination">
          <input type="text" id="address" name="residential_address" readonly value="<?php echo $customer_mst['residential_address']; ?>">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname">Postal Address</label>
        </div>
        <div class="col-75 list_vaccination">
          <input type="text" id="postal_address" name="postal_address" readonly value="<?php echo $customer_mst['postal_address']; ?>">
        </div>
      </div>
      <div class="row">
        <div class="col-25 ">
          <label for="lname">Passport number</label>
        </div>
        <div class="col-75 list_vaccination">
          <input type="text" id="mname" name="middel_name" readonly value="<?php echo $traveling_mst['passport_number']; ?>">
        </div>
      </div>
      <div class="row">
        <div class="col-25 ">
          <label for="lname">State traveling to</label>
        </div>
        <div class="col-75 list_vaccination">
          <input type="text" id="mname" name="middel_name" readonly value="<?php echo $traveling_mst['state']; ?>">
        </div>
      </div>

      <div class="row">
        <div class="col-25 ">
          <label for="lname">Intending days of travel</label>
        </div>
        <div class="col-75 list_vaccination">
          <input type="text" id="mname" name="middel_name" readonly value="<?php echo $traveling_mst['days']; ?>">
        </div>
      </div>

      <div class="row">
        <div class="col-25 ">
          <label for="lname">Purpose of visit</label>
        </div>
        <div class="col-75 list_vaccination">
          <input type="text" id="mname" name="middel_name" readonly value="<?php echo $traveling_mst['purpose']; ?>">
        </div>
      </div>

      <div class="row">
        <div class="col-25 ">
          <label for="lname">Have you been tested positive for any of the listed disease</label>
        </div>
        <div class="col-75 list_vaccination">
          <input type="text" id="mname" name="middel_name" readonly value="<?php echo $medical_mst['disease']; ?>">
        </div>
      </div>

      <div class="row">
        <div class="col-25 ">
          <label for="lname">Have you received the vaccination for selected disease? If so please list the vaccine name</label>
        </div>
        <div class="col-75 list_vaccination">
          <input type="text" id="mname" name="middel_name" readonly value="<?php echo $medical_mst['disease_described']; ?>">
        </div>
      </div>

      <div class="row">
        <div class="col-25 ">
          <label for="lname">Describe the time and duration of each disease</label>
        </div>
        <div class="col-75 list_vaccination">
          <input type="text" id="mname" name="middel_name" readonly value="<?php echo $medical_mst['duration_disease']; ?>">
        </div>
      </div>

      <div class="row">
        <div class="col-25 ">
          <label for="lname">Are you currently taking any medications?</label>
        </div>
        <div class="col-75 list_vaccination">
          <input type="text" id="mname" name="middel_name" readonly value="<?php echo $medical_mst['medication']; ?>">
        </div>
      </div>



      <div class="row">
        <div class="col-25 ">
          <label for="lname">Do you currently have a fever or any acute illness ?</label>
        </div>
        <div class="col-75 list_vaccination">
          <input type="text" id="mname" name="middel_name" readonly value="<?php echo $medical_mst['fever']; ?>">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="fname">Please upload any documentation as proof for your past vaccination </label>
        </div>
        <div class="col-75">
          <input type="file" id="proof" name="vaccination_file">
        </div>
      </div>


      <div class="row">

        <label for="lname">I declare that all information provided is valid. I will be held accountable for any false information provided.</label>

      </div>



      <br>
      <div class="row">
        <input type="submit" name="submit" value="Submit">
      </div>
    </form>
  </div>

</body>

</html>
<br>
<?php include('footer.php'); ?>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>
  $("input[name='sameAddress']").change(function() {

    if ($(this).val() == "yes") {
      $("#postal_address").val($("#address").val());
    } else {
      $("#postal_address").val('');
    }

  });
</script>