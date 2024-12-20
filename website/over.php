<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NFCD</title>
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="libraries/aos.css">
    <link rel="stylesheet" href="over.css">
    <!-- <link rel="stylesheet" href="contact.css"> Link CSS here -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

</head>
<body>
<?php
    include 'connect.php';
    session_start();
    include 'functies/sideMenu.php';
    include 'functies/functies.php';
    onderhoudsModus();
?>
<main>
    <section class="about-section">
        <div class="about-content">
            <div class="flip-container" onclick="flipImage()">
                <div class="flipper">
                    <img src="images/logo.png" alt="NFCD Detail Service Front" class="about-image front-image">
                    <img src="images/achterkant.png" alt="NFCD Detail Service Back" class="about-image back-image">
                </div>
              
            </div>
            <div class="text-content" data-aos="fade-up">
                <h1>NFCD?</h1>
                <p data-aos="fade-up">
                    Bij NFCD streven we naar de hoogste kwaliteit in dieptereiniging en detailing van uw voertuig. Onze detailers gebruiken geavanceerde technieken en hoogwaardige producten om elk detail grondig te reinigen en uw auto in topconditie te houden. Ons doel is om de perfecte afwerking te leveren, waarbij we elk voertuig met zorg en aandacht behandelen, zodat u de kunst van dieptereiniging en detailing kunt ervaren zoals nooit tevoren.
                </p>
            </div>
        </div>
    </section>
    <footer class="footer">
<div class="container bottom_border">
<div class="row">
<div class=" col-sm-4 col-md col-sm-4  col-12 col">
<h5 class="headin5_amrc col_white_amrc pt2">Find us</h5>
<!--headin5_amrc-->
<p class="mb10">NFCD, het bedrijf dat uw wagen nodig heeft om er zo nieuw mogelijk uit te zien. Wij behandelen met alle plezier auto's die gedeepcleaned moeten worden, auto's die er terug showroom ready moeten uitzien. Dus aarzel niet om een afspraak te boeken.</p>
<br>

<p><a href="https://www.google.be/maps/place/Mechelsesteenweg,+2860+Sint-Katelijne-Waver/@51.0523262,4.5174803,17z/data=!3m1!4b1!4m6!3m5!1s0x47c3e4f4b7a5b4fb:0x3ad639d2357511a9!8m2!3d51.0523262!4d4.5200552!16s%2Fg%2F1tdr2grh?hl=nl&entry=ttu&g_ep=EgoyMDI0MTExMS4wIKXMDSoASAFQAw%3D%3D"><i class="fa fa-location-arrow"></i> Mechelsesteenweg 2860 Sint-Katelijne-Waver </p></a>
<p><i class="fa fa-phone"></i>  +32 499 91 21 81 </p>
<p><i class="fa fa fa-envelope"></i> needforcardetailing@gmail.com </p>


</div>

<div class=" col-sm-4 col-md  col-6 col">
<h5 class="headin5_amrc col_white_amrc pt2">Veel bezocht</h5>
<!--headin5_amrc-->
<ul class="footer_ul_amrc">
<li><a href="services">Onze Pakketen</a></li>
<li><a href="home#services">Wat bieden we aan?</a></li>
<li><a href="contact#gemeentes">Welke steden?</a></li>
<li><a href="home#faq">Faq</a></li>
</ul>
<!--footer_ul_amrc ends here-->
</div>

<div class="container">
<ul class="foote_bottom_ul_amrc">
<li><a href="home">Home</a></li>
<li><a href="services">Services</a></li>
<li><a href="contact">Contact</a></li>
<li><a href="register">Register</a></li>
</ul>
<!--foote_bottom_ul_amrc ends here-->
<p class="text-center">Copyright @2024 | Designed With by NeedForCarDetailing</p>
<ul class="social_footer_ul">
<li><a href=""><i class="fab fa-facebook-f"></i></a></li>
<li><a href="https://www.instagram.com/needforcardetailing/"><i class="fab fa-instagram"></i></a></li>
</ul>
<!--social_footer_ul ends here-->
</div>

</footer>

    </main>



<script>
    window.onload = function() {
        document.querySelector('.sidenav').style.width = '250px'; // Stel de gewenste breedte in
    };
</script>
<script src="libraries/aos.js"></script>
<script src="over.js"></script>

</body>
</html>
