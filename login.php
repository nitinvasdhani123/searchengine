<?php
session_start();
  if(isset($_SESSION['username'])){
    header("location:engine.php");
    exit;
  }
    else if(isset($_POST['login']))
  {
    extract($_POST);
    $username="infohunt";
    $password="Anubhav@#3333";
    $database="infohunt";
    $server="localhost";
    $db_handle;
    $db_handle=mysqli_connect($server,$username,$password,$database) or die('Could not connect to database Server Issue');
    $email=strtolower(trim($_POST['TextboxEmail']));
    $password=trim($_POST['TextboxPassword']);
    $sql=mysqli_query($db_handle,"SELECT * FROM login where Email='$email' and UserPassword='$password'");
    $row  = mysqli_fetch_array($sql);
    if(is_array($row))
    {
      $_SESSION["Email"] = $row['Email'];
      $_SESSION["UserPassword"]=$row['UserPassword'];
      if(count($_COOKIE) > 0) {
          setcookie("username","",time()-84600,"/");
          setcookie("gender","",time()-84600,"/");
      }
      $cookie_data =$row['FirstName'];
      $cookie_gender=$row['Gender'];
      setcookie("username",$cookie_data,time()+84600,"/");
      setcookie("gender",$cookie_gender,time()+84600,"/");
      include 'engine.php';
    }
    else 
    {
      echo "<!doctype html>
              <html lang='en'>
                <head>
                  <meta charset='utf-8'>
                  <meta name='viewport' content='width=device-width, initial-scale=1'>
                  <title>Login | Infohunt | infohunt.com</title>
                  <link rel='shortcut icon' href='icon.png' type='image/x-icon'>
                  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD' crossorigin='anonymous'>
                </head>
                <body>
                  <div class='alert alert-warning alert-dismissible fade show bg-primary text-white' role='alert'>
                    <strong>Your account not found or Invalid Password please try again.</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>
                  <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js' integrity='sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN' crossorigin='anonymous'></script>
                </body>
              </html>";
      include 'login.html';
    }
  }
?>