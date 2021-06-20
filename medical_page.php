<?php
session_start();
$db = mysqli_connect("localhost", "root", "", "hetal_db");

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $disease = implode(",",$_POST['disease']); 
    $disease_described = $_POST['disease_described'];
  //  $duration_disease = $_POST['duration_disease'];
    $vaccination_file = $_POST['vaccination_file'];
    $vaccine_recevied= $_POST['vaccine_recevied'];
    $vaccine_name= $_POST['vaccine_name'];
    $medication = $_POST['medication'];
    $medication_described = $_POST['medication_described'];
    $fever = $_POST['fever'];
    $fever_described = $_POST['fever_described'];

  //  $insert = mysqli_query($db, "INSERT INTO `medical_mst`(`allergies`, `side_effect`, `side_effect_details`) VALUES ('$allergies','$side_effect','$side_effect_details')");

 $insert = mysqli_query($db, "INSERT INTO 
 `medical_mst`(`disease`,`disease_described`,`vaccine_recevied`,`vaccination`, `vaccination_file`, `medication`, `medication_described`, `fever`, `fever_described`) 
 VALUES ('$disease','$disease_described','$vaccine_recevied','$vaccine_name','$vaccination_file','$medication','$medication_described','$fever','$fever_described')");


    if (!$insert) {
        echo "Problem in saving record. " . mysqli_error($db);
    } else {
        if ($_POST['submit'] === 'Continue') {
            header("location:summary.php");
        } else {
            header("location:medical_page.php");
        }
    }
}
mysqli_close($db); // Close connection
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
                    <label for="fname">Have you been tested positive for any of the listed diseases : </label>
                </div>
                <div class="col-75">
                    <input type="checkbox"  value="Covid" name="disease[]"> Covid-19 <br>
                    <input type="checkbox" value="SARS" name="disease[]"> SARS <br>
                    <input type="checkbox" value="Influenza" name="disease[]"> Influenza <br>
                    <input type="checkbox" value="Plague" name="disease[]"> Plague <br>
                    <input type="checkbox" value="others" name="disease[]"> Others
                    <input type="text" name="disease_described" placeholder="Please Specify">
                
                </div>
            </div>
            
            <div class="row">
                <div class="col-25">
                    <label for="fname">Have you recevied the vaccination for selected disease?</label>
                </div>
                <div class="col-75">
                    <input type="radio" name="vaccine_recevied" value="yes"> Yes
                    <input type="radio" name="vaccine_recevied" checked value="no"> No
                </div>
            </div>

            <div class="row" style="display: none;" id="vaccine_name">
                <div class="col-25">
                    <label for="lname">Please Select the Vaccine Name</label>
                </div>
                <div class="col-75">
                <select required placeholder="Vaccine Name" name="vaccine_name">
                        <option value="">Select Vaccine</option>
                        <option value="Pfizer-BioNTech">Pfizer-BioNTech</option>
                        <option value="Moderna">Moderna</option>
                        <option value="Johnson & Johnson�s Janssen">Johnson & Johnson�s Janssen</option>
                        <option value="Sputnik V">Sputnik V</option>
                        <option value="EV NIIEG">EV NIIEG</option>
                </select>
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
                    <label for="lname">Describe</label>
                </div>
                <div class="col-75">
                <input type="text" required name="medication_described">
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
                    <label for="lname">Describe</label>
                </div>
                <div class="col-75">
                    <input type="text" name="fever_described" placeholder="">
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
                <input type="button" class="cancel" name="cancel" value="Cancel">
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

    $("input[name='vaccine_recevied']").change(function() {
        if ($(this).val() == "yes") {
            $("#vaccine_name").css('display', 'block');
        } else {
            $("#vaccine_name").css('display', 'none');
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