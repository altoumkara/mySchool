<?php

 require_once('../includefiles/includeAllFiles.php');
  
 //initialize php variables used in the form
 $about_user_content = "";
 //checking if all form input were filled correctly
 try { 

   //creating short names for our form variables
   //$_POST['about'] is the data section of ajax call
   if (isset($_POST['about']) && isset($_SESSION['userid'])) {
     $about_user_content =htmlspecialchars(mysql_real_escape_string(trim( $_POST["about"])));

     //checking if the form if filled out correctly
     if(!is_fill_out_form($_POST)){
       // throw an exception if it's not
       throw new Exception("you did not type anything in the form, try agrain");
       echo "</br>"; 
      }

     if (!get_magic_quotes_gpc()) {
        $about_user_content = addslashes($about_user_content);
      }
                
     $array_about = array("about"=> "'".$about_user_content."'");
     $UserAuthentication->save_user_About($array_about, $_SESSION['userid']);
    }else{
      throw new Exception("can not save the about content for now, please try later!");
    }

  }catch (Exception $ex) {
        create_header("problem");
        create_header_menu();
        echo $ex->getMessage()."</br>"."</br>";
        echo $ex->getLine()."</br>".' in '.$ex->getFile();
        exit();
    }
?>