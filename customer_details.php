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
    $residential_address_street = $_POST['residential_address_street'];
    $residential_address_state = $_POST['residential_address_state'];
    $residential_address_city = $_POST['residential_address_city'];
    $postal_address_street = $_POST['postal_address_street'];
    $postal_address_state = $_POST['postal_address_state'];
    $postal_address_city = $_POST['postal_address_city'];
    $residential_address = $residential_address_street . ", " . $residential_address_city . ", " . $residential_address_state;
    $postal_address = $postal_address_street . ", " . $postal_address_city . ", " . $postal_address_state;

    $insert = mysqli_query($db,"INSERT INTO `customer_mst`(`first_name`, `middel_name`, `last_name`, `dob`, `residential_address`, `postal_address`) VALUES ('$first_name','$middel_name','$last_name','$dob','$residential_address','$postal_address')");

    if(!$insert)
    {
        echo "There is an error while registering the customer";
    }
    else
    {
      if($_POST['submit'] === 'Continue'){
        header("location:traveling_details.php?residential_address_state=" . $residential_address_state . "&residential_address_city=" . $residential_address_city . "&postal_address_state=" . $postal_address_state . "&postal_address_city=" . $postal_address_city);
      } else{
        header("location:customer_details.php");
      }
    }
   
}
mysqli_close($db); // Close connection

?>
<!-- header file -->
<!-- <div class="header text-left">
  <h2>Covifree Travel</h2>
  <img class="logo" src="http://localhost/travel.jpeg">
  <div class="header-right">
    <a class="active" href="http://localhost/customer_details.php">Customer details</a>
    <a>Medical details</a>
    <a>Summary</a>
  </div>
</div> -->
<!-- header file -->
<?php include('header.php'); ?>
<br>
<div>
      <ul class="progressbar">
         <li class="active">Customer details</li>
         <li>Step 2</li>
         <li>Step 3</li>
         <li>Step 3</li>
      </ul>
   </div>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="http://localhost/style.css">

</head>
<body class="body">

 <h2 class="center">Customer details</h2>
<!--<p>Resize the browser window to see the effect. When the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other.</p> -->

<div class="container">
  <form method="POST">
    <div class="row">
      <div class="col-25">
        <label for="fname">First Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" required name="first_name" placeholder="First Name">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Middle Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="mname"  name="middel_name" placeholder="Middle name">
      </div>
    </div>
    <div class="row">
        <div class="col-25">
          <label for="lname">Last Name</label>
        </div>
        <div class="col-75">
          <input type="text" id="lname" required name="last_name" placeholder="Last name">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname">Date of Birth</label>
        </div>
        <div class="col-75">
          <input type="date" id="dob" required name="dob" placeholder="Date of Birth">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname">Residential Address</label>
        </div>
        <div class="col-75">
          <input type="text" id="residential_address_street" required name="residential_address_street" placeholder="Street">
          <select id="residential_address_state" required name="residential_address_state" placeholder="State"></select>
          <select id="residential_address_city" required name="residential_address_city" placeholder="City"></select>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname">Is your residential address is same as postal address</label>
        </div>
        <div class="col-75">
          <input type="radio" id="sameAddress" name="sameAddress" value="yes"> Yes 
          <input type="radio" id="sameAddress" name="sameAddress" value="no"> No 
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname">Postal Address</label>
        </div>
        <div class="col-75">
          <input type="text" id="postal_address_street" required name="postal_address_street" placeholder="Street">
          <select id="postal_address_state" required name="postal_address_state" placeholder="State"></select>
          <select id="postal_address_city" required name="postal_address_city" placeholder="City"></select>
        </div>
      </div>
      
      <br>
    <div class="row">
        <!-- <input type="submit" value="Continue and Save"> -->
        <input type="button" class="cancel" name="cancel" value="Cancel">
        <!-- <input type="submit" name="submit" value="Save"> -->
        <input type="submit" name="submit" value="Continue">
      <!-- <input  value=""> -->
    </div>
  </form>
</div>

</body>
</html>
<br>
<?php include('footer.php'); ?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>
    $("#residential_address_state").append(new Option('-- SELECT --', '-- SELECT --'));
    $("#postal_address_state").append(new Option('-- SELECT --', '-- SELECT --'));
    $.each(states, function( index, value ) {
      $("#residential_address_state").append(new Option(value, value));
      $("#postal_address_state").append(new Option(value, value));
    });

    $( "#residential_address_state" ).change(function() {
      var selectedState = $( "#residential_address_state" ).val();
      $("#residential_address_city").html('');
      $.each(stateCities[selectedState].cities, function( index, value ) {
        $("#residential_address_city").append(new Option(value.name, value.name));
      });
    });
    $( "#postal_address_state" ).change(function() {
      var selectedState = $( "#postal_address_state" ).val();
      $("#postal_address_city").html('');
      $.each(stateCities[selectedState].cities, function( index, value ) {
        $("#postal_address_city").append(new Option(value.name, value.name));
      });
    });
    $("input[name='sameAddress']").change(function(){

        if($(this).val()=="yes")
        {
            $("#postal_address_street").val($("#residential_address_street").val()); 
            $('#postal_address_state option[value="' + $("#residential_address_state").val() + '"]').prop('selected', true)
            $("#postal_address_city").html('');
            var selectedState = $( "#postal_address_state" ).val();
            $.each(stateCities[selectedState].cities, function( index, value ) {
              $("#postal_address_city").append(new Option(value.name, value.name));
            });
            $('#postal_address_city option[value="' + $("#residential_address_city").val() + '"]').prop('selected', true)
        }
        else
        {
            $("#postal_address_street").val('');
            $('#postal_address_state option:eq(0)').prop('selected', true)
            $('#postal_address_city option:eq(0)').prop('selected', true)
        }
     
     });

</script>
