<!DOCTYPE html>
<html lang="en">
<head>
<!-- basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- mobile metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<!-- site metas -->
<title>Contact</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content=""> 
<!-- bootstrap css -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<!-- style css -->
<link rel="stylesheet" type="text/css" href="css/style.css">
<!-- Responsive-->
<link rel="stylesheet" href="css/responsive.css">
<!-- fevicon -->
<link rel="icon" href="images/fevicon.png" type="image/gif" />
<!-- Scrollbar Custom CSS -->
<link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
<!-- Tweaks for older IEs-->
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
<!-- owl stylesheets --> 
<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/owl.theme.default.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
</head>
<body>
    <!-- header section start -->
    <div class="header_section">
      <div class="mobile_menu">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="logo_mobile"><a href="index.php"><img src="images/unique-logo2.png"></a></div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Acceuil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">Concernant</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="events.php">Evenements</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="contact.php">Contactez-nous</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
      <div class="container">
        <div class="logo"><a href="index.php"><img src="images/unique-logo2.png"  style="width: 35%;"></a></div>
        <div class="menu_main">
          <ul>
            <li><a href="index.php">Acceuil</a></li>
            <li><a href="about.php">Concernant</a></li>
            <li><a href="events.php">Evenements</a></li>
            <li><a href="contact.php">Contactez-nous</a></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- header section end -->
    <!-- contact section start -->
    <div class="contact_section layout_padding">
      <div class="container-fluid">
        <div class="contact_text"><b>CONTACTEZ NOUS !</b> </div>
        <div class="contact_section2">
          <div class="row">
            <div class="col-md-6 padding_left_0">
              <div class="map-responsive">
                    <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France" width="600" height="600" frameborder="0" style="border:0; width: 100%;" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-md-6">
              <div class="mail_section">
                <input type="" class="mail_text" placeholder="Nom" name="Name">
                <input type="" class="mail_text" placeholder="Email" name="Email">
                <input type="" class="mail_text" placeholder="Numero de telephone" name="numtel">
                <textarea class="massage_text" placeholder="Votre message" rows="5" id="comment" name="Message"></textarea>
                <div class="send_bt"><a href="#">Envoyer</a></div>
                <div class="Locations_text"><img src="images/map-icon.png"><span class="map_icon">Marrakech 359</span></div>
                <div class="Locations_text"><img src="images/call-icon.png"><span class="map_icon">+212 6598494</span></div>
                <div class="Locations_text"><img src="images/mail-icon.png"><span class="map_icon">unique-events@gmail.com</span></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- contact section end --> 
    <?php include('footer.php');?>