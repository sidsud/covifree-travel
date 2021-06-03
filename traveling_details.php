<?php

$db = mysqli_connect("localhost", "root", "", "hetal_db");

if (!$db) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {

  $passport_number = $_POST['passport_number'];
  $state = $_POST['state'];
  $intended_days = $_POST['intended_days'];
  $purpose = $_POST['purpose'];
  $insert = mysqli_query($db, "INSERT INTO `traveling_mst`(`passport_number`,`state`,`days`,`purpose`) VALUES ('$passport_number','$state','$intended_days','$purpose')");

  if (!$insert) {
    echo "Records added successfully.";
  } else {
    if ($_POST['submit'] === 'Continue') {
      header("location:medical_page.php");
    } else {
      header("location:traveling_details.php");
    }
  }
}
mysqli_close($db); // Close connection

?>

<?php include('header.php'); ?>
<br>
<div>
  <ul class="progressbar">
    <li class="active">Customer details</li>
    <li class="active">Travel details</li>
    <li>Medical details</li>
    <li>Summary</li>
  </ul>
</div>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="http://localhost/style.css">

  <script type="text/javascript">
  </script>
</head>

<body class="body">

  <h2 class="center">Travel details</h2>
  <!--<p>Resize the browser window to see the effect. When the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other.</p> -->

  <div class="container">
    <form method="POST">
      <div class="row">
        <div class="col-25">
          <label for="fname">Passport Number</label>
        </div>
        <div class="col-75">
          <input type="text" id="passport_number"  name="passport_number" placeholder="Number">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname">State Traveling To</label>
        </div>
        <div class="col-75">
          <select id="state" required name="state" placeholder="State">
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname">City Traveling To</label>
        </div>
        <div class="col-75">
          <select id="city" required name="city" placeholder="City">
          </select>
          <span id="citySelectError" style="color:red"></span>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="fname">Intended Days of Travel</label>
        </div>
        <div class="col-75">
          <input type="number" id="intended_days" required name="intended_days" placeholder="Days">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="country">Purpose of Travel</label>
        </div>
        <div class="col-75">
          <select required placeholder="Purpose" name="purpose">
            <option value="Business">Business</option>
            <option value="Study">Study</option>
            <option value="Seminar">Seminar</option>
            <option value="Leisure">Leisure</option>
            <option value="Social">Social</option>
          </select>
        </div>
      </div>
      <br>
      <div class="row">
        <!-- <input type="submit" value="Continue and Save"> -->
        <input type="button" class="cancel" name="cancel" value="Cancel">
        <input type="submit" name="submit" value="Save" id="saveBtn">
        <input type="submit" name="submit" value="Continue" id="continueBtn">
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
  
function getParameterByName(name, url = window.location.href) {
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}
var postal_address_state = getParameterByName('postal_address_state'); 
var postal_address_city = getParameterByName('postal_address_city');
var residential_address_state = getParameterByName('residential_address_state'); 
var residential_address_city = getParameterByName('residential_address_city');

  $("#state").append(new Option('-- SELECT --', '-- SELECT --'));
  $.each(states, function( index, value ) {
    $("#state").append(new Option(value, value));
  });

  $( "#state" ).change(function() {
    var selectedState = $( "#state" ).val();
    $("#city").html('');
    $.each(stateCities[selectedState].cities, function( index, value ) {
      $("#city").append(new Option(value.name, value.name));
    });
    validateCity();
  });

  $( "#city" ).change(function() {
    validateCity();
  });

  $( document ).ready(function() {
    validateCity();
  });

  function validateCity(){
    var selectedCity = $( "#city" ).val();
    var selectedState = $( "#state" ).val();
    $( "#continueBtn,#saveBtn").removeAttr("disabled");
    $( "#continueBtn,#saveBtn").removeClass("disabled");
    if(selectedState === '-- SELECT --'){
      console.log("Value is default");
      disableSubmit();
    } else {
      console.log("In else part");
      $( "#continueBtn,#saveBtn").removeAttr("disabled");
      $( "#continueBtn,#saveBtn").removeClass("disabled");
      $( "#citySelectError").html("");
      $.each(stateCities[selectedState].cities, function( index, value ) {
        if(value.name === selectedCity){
          if(value.restrictedOriginCities.includes(residential_address_city)){
            disableSubmit();
            var error = "You can't travel to " + value.name + " from " + residential_address_city;
            $( "#citySelectError").html(error);
          }
        }
      });
    }
  }

  function disableSubmit(){
          $( "#continueBtn,#saveBtn").attr("disabled", "disabled");
          $( "#continueBtn,#saveBtn").addClass("disabled");
  }

</script>
