<?php session_start();?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>About our team | Infohunt | infohunt.com</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="about.css" />
    <link rel="stylesheet" href="navbar.css">
    <link rel="shortcut icon" href="icon.png" type="image/x-icon">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
      integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
      crossorigin="anonymous"
    />
  </head>
  <body>
    <!-- Navbar code start-->
    <div id="navbar">
      <div id="ima_h1">
        <img src="infohunt.png" alt="Error Loading Image">
        <h1>Infohunt</h1>
      </div>
      <div id="menu">
        <ul>
          <li id="username"><img src="user.png">
            <div class="username">
            <?php 
                 if($_COOKIE["gender"]=="male")
                {
                  echo "Mr. ".$_COOKIE["username"];
                }else{
                  echo "Miss. ".$_COOKIE["username"];
                }
              ?>
            </div>
          </li>
          <li><a href="engine.php"><img src="home.png"></a></li>
          <li><a href="contact.php"><img src="contactus.png"></a></li>
        </ul>
      </div>
    </div> 
    <!-- Navbar code close -->
    <div id="container">
      <div id="container1"></div>
      <h1>Our Team</h1>
      <div id="container2">
        <!-- Nitin Kumar Vasdhani card starts here -->
        <div class="about_me_1">
          <div class="card">
            <img src="demopic.png" alt="Error loading image" />

            <div class="details">
              <h3>Nitin Vasdhani</h3>

              <p>Front-End Developer</p>

              <ul class="social-icons">
                <li>
                  <a href="https://www.instagram.com/nitin_vasdhani/"><i class="fab fa-instagram"></i></a>
                </li>

                <li>
                  <a href="https://github.com/nitinvasdhani123/"><i class="fab fa-github"></i></a>
                </li>

                <li>
                  <a href="https://www.linkedin.com/in/nitin-kumar-vasdhani-587639226/"><i class="fab fa-linkedin"></i></a>
                </li>
              </ul>
            </div>
          </div>
          <div class="about_me_2">
            <h2>Nitin Kumar Vasdhani</h2>
            <h4>B.Tech (Computer Science Engineering)</h4>
            <p>
              I am Student of
              <b>Jaipur National University, Jaipur, Rajasthan</b>. I am Fronted
              Developer and also a programmer and done my programming in various
              languages like C , C++ , Python. I also have a team leading
              property. My role in this project is to developed the Fronted Part of this Website.
            </p>
          </div>
          <!-- Nitin vasdhani card ends here -->
        </div>
        <div class="about_me_1">
          <!-- Anubhav Ranjan card starts here -->
          <div class="card">
            <img src="demopic.png" alt="Error loading image" />

            <div class="details">
              <h3>Anubhav Ranjan</h3>

              <p>Back-End Developer</p>

              <ul class="social-icons">
                <li>
                  <a href="#"><i class="fab fa-instagram"></i></a>
                </li>

                <li>
                  <a href="#"><i class="fab fa-github"></i></a>
                </li>

                <li>
                  <a href="#"><i class="fab fa-linkedin"></i></a>
                </li>
              </ul>
            </div>
          </div>
            <div class="about_me_2">
              <h2>Anubhav Ranjan</h2>
              <h4>B.Tech (Computer Science Engineering)</h4>
              <p>
                I am Student of
                <b>Jaipur National University, Jaipur, Rajasthan</b>. I am
                Backend Developer and also a programmer and done my programming
                in various languages like JAVA , C , C++. My role in this project is to develop the Backend of this Website using PHP , MYSQL and manage it.
              </p>
            </div>
          </div>
          <!-- Anubhav ranjan card ends here -->
          <!--Kajal prajapati card starts here -->
        <div class="about_me_1">
          <div class="card">
            <img src="demopic.png" alt="Error loading image" />

            <div class="details">
              <h3>Jaimala Prajapati</h3>

              <p>Resource Manager</p>

              <ul class="social-icons">
                <li>
                  <a href="#"><i class="fab fa-linkedin"></i></a>
                </li>
              </ul>
            </div>
          </div>
          <div class="about_me_2">
            <h2>Jaimala Prajapati</h2>
            <h4>B.Tech (Computer Science Engineering)</h4>
            <p>
              I am Student of
              <b>Jaipur National University, Jaipur, Rajasthan</b>. I am
              Designer. My role is to sytle this project using Figma and manage it.  My Hobby is Sketching that's why most of the time i indulge in designing. My future dream is to become a Web Designer
            </p>
          </div>
        </div>
        <!--Kajal prajapati card ends here -->
      </div>
    </div>
  </body>
</html>
