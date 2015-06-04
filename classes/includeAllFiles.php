<?php
 require_once('Database.class.php');
 require_once('User.class.php');
 require_once('UserAuthentication.class.php');
 require_once('dataValidateFunc.php');
 include_once('layout/layout.php');

 //connect to the database
 $db = new Database();
 $con = $db->conect_db();
 
 //initialize UserTools object
 $UserAuthentication = new UserAuthentication();
 
 
 //start the session
 session_start();
//echo  $_SESSION["lname"];

 //refresh session variables if logged in
 if(isset($_SESSION['logged_in'])) {
     $user = unserialize($_SESSION['valid_user']);
     $_SESSION['valid_user'] = serialize($UserAuthentication->get_user($user->email));
    }
 

?>
