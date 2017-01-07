<?php
  session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Treasure Hunt</title>
    <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/flexslider.css" rel="stylesheet" >
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/queries.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
      </head>
      <body id="top">
        <header id="home">
          <section class="hero" id="hero">
            <div class="container">
              <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center inner">
                  <h1 class="animated fadeInDown"><span>ONLINE</span> TREASURE <span>HUNT</span></h1>
                </div>
              </div>
              <div class="row">
              <?php 
              if(!isset($_SESSION['user'])) {
              ?>
                <div class="col-md-6 col-md-offset-3 text-center">
                  <a href="login.php" class="learn-more-btn">Login</a>
                  <a href="signup.php" class="learn-more-btn">Sign Up</a>
                </div>
              <?php 
                    }
              ?>
              </div>
            </div>
          </section>
        </header>
        <section class="intro text-center section-padding" id="intro">
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2 wp1">
                <h1 class="arrow">Introduction</h1>
                <p>Treasure hunting isn’t just for pirates or professionals anymore! Acumen CSFest presents Treasure Hunt which is an exciting interactive Game for Geeks. It’s time to master your Coding skills and go on a voyage for the treasure.</p>
              </div>
            </div>
          </div>
        </section>
        <section class="swag1 text-center">
          <div class="container">
            <br><br><br><br><br><br><br><br>
            <div class="row">
              </div>
            </div>
          </div>
        </section>
        <section class="intro text-center section-padding" id="intro">
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2 wp1 delay-1s">
                <h1 class="arrow">Instructions</h1>
                <p><ul><li>Skip button is used to skip the current question,and proceed to next level</li>
<li>Change button is used to flip the question</li>
<li>Number of skips 3</li>
<li>Number of change 4</li>
<li>Hints can be found in the source code</li>
<li>Leaderboard is in effect from the start of contest</li>
</p>
              </div>
            </div>
          </div>
        </section>
        <section class="swag text-center">
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                </br></br></br></br></br></br>
                <a href="#portfolio" class="down-arrow-btn"><i class="fa fa-chevron-down"></i></a>
              </div>
            </div>
          </div>
        </section>
        <section class="portfolio text-center section-padding" id="portfolio">
          <div class="container">
            <div class="row">
              <div id="portfolioSlider">
                <ul class="slides">
                  <li>
                    <div class="col-md-4 wp4">
                      <h2>James Ballari</h2>
                      <p>Phone No : +919912615067</p>
                    </div>
                    <div class="col-md-4 wp4 delay-05s">
                      <h2>Hem Kumar</h2>
                      <p>Phone No : +917207165400</p>
                    </div>
                    <div class="col-md-4 wp4 delay-1s">
                      <h2>Iqra Tarzeen</h2>
                      <p>Phone Number : +918977099669</p>
                    </div>
                    <div class="col-md-4 wp4">
                      <h2>Sneha D</h2>
                      <p>Phone No : +917207635337</p>
                    </div>
                    <div class="col-md-4 wp4 delay-05s">
                      <h2>Email us at</h2>
                      <p>treasurehunt@vce-csfest.in</p>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </section>
        <div class="ignite-cta text-center">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <a href="#" class="ignite-btn">Go To Top</a>
              </div>
            </div>
          </div>
        </div>
        <footer>
          <div class="container">
            <div class="row">
              <div class="col-md-6 credit">
                <p>Acumen CS FEST 2K15</p>
              </div>
            </div>
          </div>
        </footer>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/waypoints.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="js/jquery.flexslider.js"></script>
        <script src="js/modernizr.js"></script>
      </body>
    </html>