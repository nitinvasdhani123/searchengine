<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Infohunt | infohunt.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="icon.png"/>
    <link rel="stylesheet" href="engine.css" />
    <link rel="stylesheet" href="navbar.css">
    <script>
      function del()
      {
        let data=prompt("Hey ! Are you want to delete your account on infohunt permanently. If sure type 'YES', otherwise press cancel");
        let data1=data.trim().toLowerCase();
        if(data1=="yes")
        {
          window.open("delete.php");
        }
        else{
          return;
        }
      }
    </script>
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
          <li id="setting">
            <img src="setting.png">
            <i class="fa-solid fa-caret-down"></i>
            <ul class="dropdown-content">
              <li><a href="logout.php"><img src="logout.png"></a></li>
              <li><a href="engine.php" onclick="del()"><img src="delete.png" ></a></li>
            </ul>
          </li>
          <li><a href="about.php"><img src="team.png"></a></li>
          <li><a href="Contact.php"><img src="contactus.png"></a></li>
        </ul>
      </div>
    </div> 
    <!-- Navbar code close -->

    <!-- API code start -->
       <script
      asyncz
      src="https://cse.google.com/cse.js?cx=1777c941aff994d2e"
      ></script>
      <div class="gcse-search"></div> 
      <!-- API code close -->
      
      <!-- shortcut code start -->
    <div id="container1">
      <div id="container2">
        <h2>Shortcuts</h2>
        <span>
        <a href="https://www.instagram.com/"><img src="instagram.png" alt="error loading image" id="image"></a>
          <a href="https://web.telegram.org/z/"><img src="telegram.png" alt="error loading image" id="image"></a>
          <a href="https://play.google.com/"><img src="playstore.png" alt="error loading image" id="image"></a>
          <a href="https://meet.google.com/"><img src="meet.png" alt="error loading image" id="image"></a>
        </span>
        <br>
        <span>
          <a href="https://web.whatsapp.com/"><img src="whatsapp.png" alt="error loading image" id="image"></a>
          <a href="https://www.facebook.com/"><img src="facebook.png" alt="error loading image" id="image"></a>
          <a href="https://www.youtube.com/"><img src="youtube.png" alt="error loading image" id="image"></a>
          <a href="https://mail.google.com/"><img src="gmail.png" alt="error loading image" id="image"></a>
        </span>
      </div> 
      <!-- shortcut code close -->
      <script src="engine.js"></script>
    </div>
  </body>
  </html>