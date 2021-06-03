<?php


?>

<?php include('header.php'); ?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="http://localhost/corona/style.css">
    <style>
        * {
            box-sizing: border-box
        }

        body {
            font-family: Verdana, sans-serif;
            margin: 0
        }

        .mySlides {
            display: none
        }

        img {
            vertical-align: middle;
        }

        /* Slideshow container */
        .slideshow-container {
            max-width: 1000px;
            position: relative;
            margin: auto;
        }

        /* Next & previous buttons */
        .prev,
        .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -22px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover,
        .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        /* Caption text */
        .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        /* The dots/bullets/indicators */
        .dot {
            cursor: pointer;
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active,
        .dot:hover {
            background-color: #717171;
        }

        /* Fading animation */
        .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 1.5s;
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @-webkit-keyframes fade {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
        }

        @keyframes fade {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
        }

        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {

            .prev,
            .next,
            .text {
                font-size: 11px
            }
        }
    </style>

</head>

<body class="body">

    <h2 class="center">Home Page</h2>
    <!--<p>Resize the browser window to see the effect. When the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other.</p> -->
    <div class="slideshow-container">

        <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <img src="images1.jpeg" style="width:100%">
            <div class="text">Caption Text</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <img src="images2.jpeg" style="width:100%">
            <div class="text">Caption Two</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img src="images3.jpeg" style="width:100%">
            <div class="text">Caption Three</div>
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

    </div>
    <br>

    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>
    <!-- <div class="container">
        <div class="row">
            <div class="col-25">
                <div class="u-back-slide" data-image-width="1125" data-image-height="750">
                <img class="u-back-image u-expanded" src="//images01.nicepage.com/a1389d7bc73adea1e1c1fb7e/5af9723da7b056f29b36d4e5/pexels-photo-6146810.jpeg?version=">                </div>
            </div>
            <div class="col-25">
                <div class="u-back-slide" data-image-width="1125" data-image-height="1500">
                    <img class="u-back-image u-expanded" src="//images01.nicepage.com/a1389d7bc73adea1e1c1fb7e/9239811de8205445af21052d/pexels-photo-4107897.jpeg?version=">
                </div>
            </div>
            <div class="col-25">
                <div class="u-back-slide" data-image-width="1125" data-image-height="1500">
                    <img class="u-back-image u-expanded" src="//images01.nicepage.com/a1389d7bc73adea1e1c1fb7e/ca464c46e353587c9ab9b7e9/pexels-photo-6994340.jpeg?version=">
                </div>
            </div>
            <div class="col-25">
                <div class="u-back-slide" data-image-width="563" data-image-height="750">
                    <img class="u-back-image u-expanded" src="//images01.nicepage.com/a1389d7bc73adea1e1c1fb7e/0dc96708b6b65873bd671456/pexels-photo-950754.jpeg?version=">
                </div>
            </div>

        </div>
        
    </div> -->

</body>

</html>
<br>
<?php include('footer.php'); ?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
    }
</script>

<script>
    $("input[name='sameAddress']").change(function() {

        if ($(this).val() == "yes") {
            $("#postal_address").val($("#address").val());
        } else {
            $("#postal_address").val('');
        }

    });
</script>