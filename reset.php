<?php
session_start();
  if(isset($_REQUEST['verification']))
  {
    $username="infohunt";  // username
    $password="Anubhav@#3333";  //password
    $database="infohunt";  // database
    $server="localhost";    //server name
    $db_handle;  // database handler who connect to database
    $db_handle=mysqli_connect($server,$username,$password,$database) or die('Error: Cannot connect');// connection and or condition if database can't connect
    $sql=mysqli_query($db_handle,"SELECT otp FROM ForgetUser where Email='".$_SESSION['mailforget']."'");  // get records from database 
    $db_field=mysqli_fetch_assoc($sql);
    $otp1=$db_field['otp'];
    $userotp=$_POST['otp'];// we store user otp in reg_otp to match our otp
    $password1=$_POST['password1'];
    $password2=$_POST['password2'];
    if($password1==$password2){
      if($userotp==$otp1)
      {
        $query="UPDATE login set UserPassword='$password1' where Email='".$_SESSION['mailforget']."'";
        if(mysqli_query($db_handle,$query)){
            echo "<!doctype html>
                 <html lang='en'>
                     <head>
                       <meta charset='utf-8'>
                       <meta name='viewport' content='width=device-width, initial-scale=1'>
                       <title>Reset Password | Infohunt | infohunt.com</title>
                       <link rel='shortcut icon' href='icon.png' type='image/x-icon'>
                       <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD' crossorigin='anonymous'>
                     </head>
                       <body>
                         <div class='alert alert-warning alert-dismissible fade show bg-primary text-white' role='alert'>
                           <strong>Congratulations ! </strong> &#128077; Your account has been changed please try to login below.
                           <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                         </div>
                         <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js' integrity='sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN' crossorigin='anonymous'></script>
                       </body>
                  </html>";
                  session_unset();
                  session_destroy();
         include 'login.html';
        //  mysqli_close($connection); // Closing Connection with Server
        }
    }
    else{
            echo "<!doctype html>
                      <html lang='en'>
                        <head>
                          <meta charset='utf-8'>
                          <meta name='viewport' content='width=device-width, initial-scale=1'>
                          <title>Reset Password | Infohunt | infohunt.com</title>
                          <link rel='shortcut icon' href='icon.png' type='image/x-icon'>
                          <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD' crossorigin='anonymous'>
                        </head>
                        <body>
                          <div class='alert alert-warning alert-dismissible fade show bg-primary text-white' role='alert'>
                            <strong>Hey user $email !</strong> Please enter correct otp Again.
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                          </div>
                          <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js' integrity='sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN' crossorigin='anonymous'></script>
                        </body>
                      </html>";
              include 'Reset.html';
          }
  }
  else{
    echo "<!doctype html>
    <html lang='en'>
      <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>Reset Password | Infohunt | infohunt.com</title>
        <link rel='shortcut icon' href='icon.png' type='image/x-icon'>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD' crossorigin='anonymous'>
      </head>
      <body>
        <div class='alert alert-warning alert-dismissible fade show bg-primary text-white' role='alert'>
          <strong>Please type correct password to continue next.</strong> 
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js' integrity='sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN' crossorigin='anonymous'></script>
      </body>
    </html>";
    include 'Reset.html';
  }
  }
