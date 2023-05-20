<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Contact with us | Infohunt | infohunt.com</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Contact us | Infohunt | infohunt.com</title>
  <link rel="shortcut icon" href="icon.png" type="image/x-icon">
  <link rel="stylesheet" href="contact_us.css">
  <link rel="stylesheet" href="navbar.css">
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
        <li><a href="about.php"><img src="team.png"></a></li>
        <li><a href="engine.php"><img src="home.png"></a></li>
      </ul>
    </div>
  </div>
  <!-- Navbar code close -->
  <form action="contact.php" name="contact" method="post">
    <div id="container">
      <div class="container1"></div>
      <div class="container2">
        <h2>Contact Us</h2>

        <span>
          <input type="text" name="fname" id="name" placeholder="First Name " required />
        </span>
        <span>
          <input type="text" name="lname" id="name" placeholder="Last Name " required />
        </span>
        <span>
          <input type="number" id="number" name="mobile" placeholder="Phone Number"></input>
        </span>
        <span>
          <textarea name="message" placeholder="Write a Short Message For Us"></textarea>
        </span>
        <button class="btn" name="submit">Submit</button>
      </div>
    </div>
  </form>
</body>

</html>

<?php

if (isset($_REQUEST["submit"])) {
  // conn establish with database
  $username = "infohunt";  // username
  $password = "Anubhav@#3333";  //password
  $database = "infohunt";  // database
  $server = "localhost";    //server name
  $db_handle;  // database handler who connect to database
  $db_handle = mysqli_connect($server, $username, $password, $database) or die('Error: Cannot connect'); // connection and or condition if database can't connect

  $fname = trim("$_POST[fname]");
  $lname = trim("$_POST[lname]");
  $countrycode = "frd";
  // trim("$_POST[code]");
  $contact = trim("$_POST[mobile]");
  $message = trim("$_POST[message]");
  $query="insert into feedback values('$fname','$lname','$contact','$message','".$_SESSION['Email']."')";
  if(mysqli_query($db_handle,$query)){
  //message
    echo "<!DOCTYPE html>
          <html lang='en'>
            <head>
              <meta charset='UTF-8'>
              <meta http-equiv='X-UA-Compatible' content='IE=edge'>
              <meta name='viewport' content='width=device-width, initial-scale=1.0'>
              <title>Infohunt | infohunt.com</title>
              <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css' rel='stylesheet'>
              <link rel='stylesheet' href='delete.css'>
            </head>
            <body>
              <form name='f' action='open.php' method='post'>
                <div class='container1'></div>
                <div class='vh-100 d-flex justify-content-center align-items-center'>
                    <div class='col-md-4'>
                      <!-- <div class='border border-3 border-primary'></div> -->
                      <div class='card  bg-white shadow p-5'>
                        <div class='mb-4 text-center'>
                            <svg xmlns='http://www.w3.org/2000/svg' class='text-primary' width='75' height='75'
                              fill='currentColor' class='bi bi-check-circle' viewBox='0 0 16 16'>
                              <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z' />
                              <path
                                d='M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z' />
                            </svg>
                        </div>
                        <div class='text-center'>
                          <h1>Thank You !</h1>
                          <button class='btn btn-primary type='submit' name='back'Home</button>
                        </div>
                      </div>
                    </div>
                </div>
              </form>
            </body>
          </html>";
        }
}
?>