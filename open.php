<?php
// to open the signup page after action on home button in delete account or logout function
if(isset($_POST["back"])){
    include 'signup.html';
}
?>