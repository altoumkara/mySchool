<?php

 require_once('../includefiles/includeAllFiles.php');
    
        
   //checking if all form input were filled correctly
   try { 
     //creating short names for our form variables
     if (isset($_POST['tuto_request_data']) && isset($_SESSION["valid_user"])) {
         $request_array = array('notiid' =>"'".null."'", 'notidate'=>"'".date("Y-m-d H:i:s")."'", 
             'sendbyuserid'=> $_SESSION['userid'], 'touserid'=> $_GET['userid'],
             'notititle'=>"'".htmlspecialchars(mysql_real_escape_string(
                                                      trim("tutorial help")))."'",
             'notifor' => $_GET['userid'],
             'requeststatus'=> "'".htmlspecialchars(mysql_real_escape_string(
                            trim("0")))."'"
             );

         if (!get_magic_quotes_gpc()) {     
           $request_array = array('notiid' =>"'".null."'", 'notidate'=>"'".date("Y-m-d H:i:s")."'", 
             'sendbyuserid'=> $_SESSION['userid'], 'touserid'=> $_GET['userid'],
             'notititle'=>"'".addslashes(htmlspecialchars(mysql_real_escape_string(
                            trim("tutorial help"))))."'",
             'notifor' => $_GET['userid'],
             'requeststatus'=> "'".addslashes(htmlspecialchars(mysql_real_escape_string(
                            trim("0"))))."'"
            );
           }   

             $db->insert($request_array, 'notification'); //inserted into notification table
        }else if(isset($_POST['accept-form'])&&isset($_SESSION["valid_user"])) {//user clicked on 'accept request'
         $accept_for = htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['accept-for'])));
         $notiid = htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['noti-id'])));
         $accept_array = array('notidate'=>"'".date("Y-m-d H:i:s")."'",'requeststatus'=>
          "'".htmlspecialchars(mysql_real_escape_string(trim($_POST['accept-status'])))."'");

         if (!get_magic_quotes_gpc()) {  
             $accept_for = addslashes(htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['accept-for']))));  
             $notiid = addslashes(htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['noti-id']))));

             $accept_array = array('notidate'=>"'".date("Y-m-d H:i:s")."'", 'requeststatus'=>
              "'".addslashes(htmlspecialchars(mysql_real_escape_string(trim($_POST['accept-status']))))."'");
            }  
         //change request status to 1 = acepted table 
        $db->update($accept_array, 'notification', "where notiid =".$notiid ); 
        }else{
         throw new Exception("cant save notification for now");
        }
    }
    catch (Exception $ex) {
      //create_header("problem");
     // create_header_menu();
     echo $ex->getMessage()."</br>"."</br>";
     echo $ex->getLine()."</br>".' in '.$ex->getFile();
      exit();
    } 
         
?>x