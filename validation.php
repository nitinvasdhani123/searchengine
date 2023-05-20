<?php
session_start();
$username="infohunt";  // username
$password="Anubhav@#3333";  //password
$database="infohunt";  // database
$server="localhost";    //server name
$db_handle;  // database handler who connect to database
$db_handle=mysqli_connect($server,$username,$password,$database) or die('Error: Cannot connect');// connection and or condition if database can't connect
$sql=mysqli_query($db_handle,"SELECT * FROM Verification_Otp where Email='".$_SESSION["mailid"]."'");  // get records from database 
$db_field=mysqli_fetch_assoc($sql);
$FirstName=$db_field['FirstName'];
$LastName=$db_field['LastName'];
$email=$db_field['Email'];
$password=$db_field['UserPassword'];
$regotp=$db_field['Otp'];
$gender=$db_field['Gender'];
 // $row  = mysqli_fetch_row($sql);
  if(isset($_REQUEST['verification']))
  {
    $userotp=$_POST['otp'];// we store user otp in reg_otp to match our otp
    if($userotp==$regotp)
    {
        $query="insert into signup values('$FirstName','$LastName','$gender','$email','$password')";
        if(mysqli_query($db_handle,$query)){
            echo "<!doctype html>
                 <html lang='en'>
                     <head>
                       <meta charset='utf-8'>
                       <link rel='shortcut icon' href='icon.png' type='image/x-icon'>
                       <meta name='viewport' content='width=device-width, initial-scale=1'>
                       <title>Verification | Infohunt | infohunt.com</title>
                       <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD' crossorigin='anonymous'>
                     </head>
                       <body>
                         <div class='alert alert-warning alert-dismissible fade show bg-primary text-white' role='alert'>
                           <strong>Congratulations ! </strong> &#128077; Your account is created please try to login below.
                           <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                         </div>
                         <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js' integrity='sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN' crossorigin='anonymous'></script>
                       </body>
                  </html>";
                  session_unset();
                  session_destroy();
         include 'login.html';
        }
    }
        else{
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
                            <strong>Hey !</strong> Please enter correct otp Again.
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                          </div>
                          <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js' integrity='sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN' crossorigin='anonymous'></script>
                        </body>
                      </html>";
              include 'verification.html';
            }
  } 
  ?>