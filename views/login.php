<?php

 require_once('../includefiles/includeAllFiles.php');
 create_header("Sign in", "../assets/stylesheets/MyschoolsignupCss.css");
 create_header_menu("");
 $UserAuthentication->logout_user();
 create_signin_form(); 
 create_footer();
?>