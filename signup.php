<?php
session_start();
// $header = -- company mail id line 44
$fname="";
$lname="";
$email="";
$password="";
// when user click on button
if(isset($_REQUEST["signup"]))
{
  // conn establish with database
  $username="infohunt";  // username
	$password="Anubhav@#3333";  //password
	$database="infohunt";  // database
	$server="localhost";    //server name
	$db_handle;  // database handler who connect to database
	$db_handle=mysqli_connect($server,$username,$password,$database) or die('Error: Cannot connect');// connection and or condition if database can't connect

  define("otp",rand(1000,9999)); // random 4 digit otp generate
  // verification process with email id  & sotre the values in the different variables like user's first name in fname,etc.
  $fname=trim("$_POST[textbox1]");
  $lname=trim("$_POST[textbox2]");
  $email=strtolower(trim("$_POST[textbox3]"));
  $password1=trim("$_POST[textbox4]");
  $password2=trim("$_POST[textbox5]");
  $gender=strtolower(trim("$_POST[gender]"));
  if($password1==$password2){
  $sql=mysqli_query($db_handle,"SELECT Email FROM login where Email='$email'");  // get records from database 
  $row  = mysqli_fetch_row($sql);
  // Prepare to sending email with otp to check user email exists or not
  if(empty($row))
  {
    $subject = "Verify your account on Infohunt";
    $body = " 
    Hi $fname,

    Your verification code is ".otp."
      
    Do not reply please.

    If you have any questions, send us an email  .

    Please do not reply back !!";
    $headers = "From: company mail id";
    // if mail successfully sent from our side
    if(mail($email, $subject, $body, $headers)) 
    {
      $deletequery="delete from Verification_Otp where email='$email'";
      mysqli_query($db_handle,$deletequery);
      $_SESSION["mailid"]=$email;
      $query="insert into Verification_Otp values('','$fname','$lname','$gender','$email','$password1',".otp.")";
      if(mysqli_query($db_handle,$query)){
        echo "<!doctype html>
              <html lang='en'>
              <head>
              <title>Verification | Infohunt | infohunt.com</title>
              <link rel='shortcut icon' href='icon.png' type='image/x-icon'>
                <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD' crossorigin='anonymous'>
              </head>
              <body>
              <div class='alert alert-warning alert-dismissible fade show bg-primary text-white' role='alert'>
                  <strong>Hey ! $fname </strong> We sent an email on your $email please verify your account to continue.
                  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js' integrity='sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN' crossorigin='anonymous'></script>
              </body>
              </html>";
        include 'verification.html';
      }
      else{
        echo "<!doctype html>
              <html lang='en'>
              <head>
                <title>Verification | Infohunt | infohunt.com</title>
                <link rel='shortcut icon' href='icon.png' type='image/x-icon'>
                <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD' crossorigin='anonymous'>
              </head>
              <body>
              <div class='alert alert-warning alert-dismissible fade show bg-primary text-white' role='alert'>
                  <strong>Server Failed </strong>
                  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js' integrity='sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN' crossorigin='anonymous'></script>
              </body>
              </html>";
        include 'signup.html';
      }
    }
    else //if mail does not send
    {
      echo "<!doctype html>
              <html lang='en'>
              <head>
              <title>Verification | Infohunt | infohunt.com</title>
              <link rel='shortcut icon' href='icon.png' type='image/x-icon'>
                <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD' crossorigin='anonymous'>
              </head>
              <body>
              <div class='alert alert-warning alert-dismissible fade show bg-primary text-white' role='alert'>
                  <strong>Hey ! $fname </strong> we have an error to send mail on your $email please check.
                  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js' integrity='sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN' crossorigin='anonymous'></script>
              </body>
              </html>";
              include 'signup.html';
    }
  }
  //if account is registered
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
                  <strong>Hey ! $fname </strong> Your account is already register with this email id try to login otherwise create new.
                  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js' integrity='sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN' crossorigin='anonymous'></script>
              </body>
            </html>";
    include 'login.html';
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
    require 'signup.php';
}
}
?>