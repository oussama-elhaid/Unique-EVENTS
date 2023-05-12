<?php
include 'auth/config.php';

error_reporting(0);

session_start();
?>

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
              <a class="nav-link " <?php if($_COOKIE['uname'] != ""){?>href="home.php"<?php }else{?>href="events.php" <?php }?>>Evenements</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="contact.php">Contactez-nous</a>
              </li>
              <li>
            <?php if($_COOKIE['uname'] != ""){?>  
            <a href="logout.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
            <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
          </svg>
            </a>
            <?php }else{?>
              <a href="auth/login.php">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
              </svg>
            </a><?php }?>

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
            <li><?php if($_COOKIE['uname'] != ""){?>
              <a href="home.php">Evenements</a>
              <?php }else{?>
                <a href="events.php">Evenements</a>
                <?php }?>
            </li>
            <li><a href="contact.php">Contact</a></li>
            <li>
            <?php if($_COOKIE['uname'] != ""){?>  
            <a href="logout.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
            <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
          </svg>
          
          </a>
          <?php }else{?>
            <a href="auth/login.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
  <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
</svg>
            </a><?php }?>
          </li>
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