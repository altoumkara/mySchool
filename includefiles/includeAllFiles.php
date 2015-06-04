<?php
 require_once('../classes/Database.class.php');
 require_once('../classes/User.class.php');
 require_once('../classes/UserAuthentication.class.php');
 require_once('../classes/Post.class.php');
 require_once('../classes/Book.class.php');
 require_once('../classes/Item.class.php');
 require_once('../functions/dataValidateFunc.php');
 require_once('../functions/layout.php');
 require_once('../functions/post_func.php');
 require_once('../functions/fileSystem_Func.php');
 require_once('../functions/services_Func.php');

 


 //connect to the database
 $db = new Database();
 $con = $db->conect_db();
 
 
 //initialize UserTools object
 if (isset($_GET['userid'])&&($_GET['userid'] !='')) {
 	$UserAuthentication = new UserAuthentication($_GET['userid']);
 }else{
 $UserAuthentication = new UserAuthentication();
}
 
 //start the session
 session_start();


 //refresh session variables if logged in
 if(isset($_SESSION['logged_in'])) {
     $user = unserialize($_SESSION['valid_user']);
     $_SESSION['valid_user'] = serialize($UserAuthentication->get_user($user->email));
    }
 

?>
