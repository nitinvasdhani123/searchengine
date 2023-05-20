<?php
session_start();
// $header = company mail id in line 34
  if(isset($_REQUEST["submit"]))
  {
      // conn establish with database
    $username="infohunt";  // username
    $password="Anubhav@#3333";  //password
    $database="infohunt";  // database
    $server="localhost";    //server name
    $db_handle;  // database handler who connect to database
    $db_handle=mysqli_connect($server,$username,$password,$database) or die('Error: Cannot connect');// connection and or condition if database can't connect
    // verification process with email id  & store the values 
    $email=strtolower(trim("$_POST[email]"));
    define("otp",rand(1000,9999)); // random 4 digit otp generate
    $sql=mysqli_query($db_handle,"SELECT FirstName FROM login where Email='$email'");  // get records from database 
    $row  = mysqli_fetch_assoc($sql);
    $username=$row['FirstName'];

    // Prepare to sending email with otp to check user email exists or not
    if(!empty($row))
    {
        $subject = "Forget your account password on Infohunt";
        $body = " 
        Hi $username,
  
        Your reset password code is ".otp.".
        
        Do not reply please.
  
        If you have any questions, send us an email .
  
        Please do not reply back !!";
        $headers = "From: ---- your mail ";
       
     // if mail successfully sent from our side
      if(mail($email, $subject, $body, $headers)) 
      {
        $deletequery="delete from forgetuser where Email='$email'";
        mysqli_query($db_handle,$deletequery);
        $query="insert into forgetuser values('$email','".otp."')";
        $_SESSION["mailforget"]=$email;
        if(mysqli_query($db_handle,$query)){
          echo "<!doctype html>
                <html lang='en'>
                <head>
                <title>Reset Password | Infohunt | infohunt.com</title>
                <link rel='shortcut icon' href='icon.png' type='image/x-icon'>
                  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD' crossorigin='anonymous'>
                </head>
                <body>
                <div class='alert alert-warning alert-dismissible fade show bg-primary text-white' role='alert'>
                    <strong> We sent an email on your $email please verify your account to continue. </strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>
                  <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js' integrity='sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN' crossorigin='anonymous'></script>
                </body>
                </html>";
         require 'Reset.html';
                // mysqli_close($connection); // Closing Connection with Server
        }
        else{
          echo "<!doctype html>
                <html lang='en'>
                <head>
                  <title>Reset Password | Infohunt | infohunt.com</title>
                  <link rel='shortcut icon' href='icon.png' type='image/x-icon'>
                  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD' crossorigin='anonymous'>
                </head>
                <body>
                <div class='alert alert-warning alert-dismissible fade show bg-primary text-white' role='alert'>
                    <strong>Server Failed switch to login </strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>
                  <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js' integrity='sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN' crossorigin='anonymous'></script>
                </body>
                </html>";
                require 'login.html';

        }
      } else //if mail does not send
      {
        echo "<!doctype html>
                <html lang='en'>
                <head>
                <title>Reset Password | Infohunt | infohunt.com</title>
                <link rel='shortcut icon' href='icon.png' type='image/x-icon'>
                  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD' crossorigin='anonymous'>
                </head>
                <body>
                <div class='alert alert-warning alert-dismissible fade show bg-primary text-white' role='alert'>
                    <strong>we have an error to send mail on your $email please check and try again.</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>
                  <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js' integrity='sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN' crossorigin='anonymous'></script>
                </body>
                </html>";
                require 'forget.html';
        }
    }
    //if account is not registered
    else
    {
      echo "<!doctype html>
      <html lang='en'>
        <head>
          <meta charset='utf-8'>
          <meta name='viewport' content='width=device-width, initial-scale=1'>
          <title>Verification | Infohunt | infohunt.com</title>
          <link rel='shortcut icon' href='icon.png' type='image/x-icon'>
          <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD' crossorigin='anonymous'>
        </head>
        <body>
          <div class='alert alert-warning alert-dismissible fade show bg-primary text-white' role='alert'>
            <strong>Your account is not register try to login otherwise create new.</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>
          <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js' integrity='sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN' crossorigin='anonymous'></script>
        </body>
      </html>";
      require 'login.html';
    }
  }
  
  ?>