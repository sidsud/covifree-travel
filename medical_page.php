<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php

    $db = mysqli_connect("localhost", "root", "", "hetal_db");

    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (isset($_POST['submit'])) {
        $disease = implode(",",$_POST['disease']); 
        $disease_described = $_POST['disease_described'];
        $duration_disease = $_POST['duration_disease'];
        $vaccination_file = $_POST['vaccination_file'];
        $medication = $_POST['medication'];
        $medication_described = $_POST['medication_described'];
        $fever = $_POST['fever'];
        $fever_described = $_POST['fever_described'];

      //  $insert = mysqli_query($db, "INSERT INTO `medical_mst`(`allergies`, `side_effect`, `side_effect_details`) VALUES ('$allergies','$side_effect','$side_effect_details')");

     $insert = mysqli_query($db, "INSERT INTO `medical_mst`(`disease`, `disease_described`, `duration_disease`, `vaccination_file`, `medication`, `medication_described`, `fever`, `fever_described`) VALUES ('$disease','$disease_described','$duration_disease','$vaccination_file','$medication','$medication_described','$fever','$fever_described')");


        if (!$insert) {
            echo "Records added successfully.";
        } else {
            if ($_POST['submit'] === 'Continue') {
                echo "Records added successfully.";
                header("location:summary.php");
            } else {
                header("location:medical_page.php");
            }
        }
    }
    mysqli_close($db); // Close connection
    ?>

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
<div>
  <ul class="progressbar">
    <li class="active">Customer details</li>
    <li class="active">Travel details</li>
    <li class="active">Medical details</li>
    <li>Summary</li>
  </ul>
</div>
<body>

    <h2>Medical details</h2>
    <!-- <p>Resize the browser window to see the effect. When the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other.</p> -->

    <div class="container">
        <form method="POST">
            <div class="row">
                <div class="col-25">
                    <label for="fname">Have you been tested positive for any of the listed disease : </label>
                </div>
                <div class="col-75">
                    <input type="checkbox"  value="Covid" name="disease[]"> Covid  <br>
                    <input type="checkbox" value="SARS" name="disease[]"> SARS <br>
                    <input type="checkbox" value="Influencers" name="disease[]"> Influencers <br>
                    <input type="checkbox" value="Tuberculosis" name="disease[]"> Tuberculosis <br>
                    <input type="checkbox" value="lung cancers" name="disease[]"> lung cancers
                
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="fname">Have you received the vaccination for selected disease? If so please list the vaccine name</label>
                </div>
                <div class="col-75">
                <input type="text" id="disease" required name="disease_described">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="fname">Describe the time and duration of each disease</label>
                </div>
                <div class="col-75">
                <input type="text" id="duration_disease" required name="duration_disease">
                </div>
            </div>
           

            <div class="row">
                <div class="col-25">
                    <label for="fname">Are you currently taking any medications?</label>
                </div>
                <div class="col-75">
                    <input type="radio" name="medication" value="yes"> Yes
                    <input type="radio" name="medication" checked value="no"> No
                </div>
            </div>

            <div class="row" style="display: none;" id="medication_described">
                <div class="col-25">
                    <label for="lname">Described</label>
                </div>
                <div class="col-75">
                <input type="text" required  name="medication_described">
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="fname">Do you currently have a fever or any acute illness ? </label>
                </div>
                <div class="col-75">
                    <input type="radio" name="fever" value="yes"> Yes
                    <input type="radio" name="fever" checked value="no"> No
                </div>
            </div>

            <div class="row" style="display: none;" id="fever_described">
                <div class="col-25">
                    <label for="lname">Described</label>
                </div>
                <div class="col-75">
                    <input type="text" name="fever_described" placeholder="Describe">
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
                <input type="button" class="cancel" name="cancel" value="cancel">
                <input type="submit" name="submit" value="Save">
                <input type="submit" name="submit" value="Continue">
            </div>
        </form>
    </div>

</body>

</html>
<br>
<?php include('footer.php'); ?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>

    $("input[name='medication']").change(function() {
        if ($(this).val() == "yes") {
            $("#medication_described").css('display', 'block');
        } else {
            $("#medication_described").css('display', 'none');
        }
    });

   
    $("input[name='fever']").change(function() {
        if ($(this).val() == "yes") {
            $("#fever_described").css('display', 'block');
        } else {
            $("#fever_described").css('display', 'none');
        }
    });

    $('#addMore').click(function() {
        var length = $('.vaccination').length + 1;
        $('#appendDiv').before().append(length + '. <input type="text" class="vaccination" name="list_vaccination[]"><br>');
    });
</script>