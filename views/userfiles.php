<?php

 require_once('../includefiles/includeAllFiles.php');
  
 create_header('user file', "../assets/stylesheets/MyschooluserfilesCss.css");
 create_header_menu($_SESSION['numb_noti']);
      
 //getting the user dir, if does not exist, it will create a new one
 if (isset($_GET["userid"])){ 
   $user_dir_name = create_each_user_dir($_GET["userid"]);

   //creating short names for our form variables
   if (isset($_POST['upload-form'])&&isset($_GET["userid"])) {

     //checking if the form if filled out correctly
     if(!is_fill_out_form($_POST)){
         // throw an exception if it's not
         throw new Exception("The form is not filled out correctly, go back and try agrain");
         echo "</br>"; 
        }

     //creating a file name
     @$filename = basename($_FILES["filename"]['name']) ;
     echo "</br>";
     
     //check that the file has no error
     $file_array = $_FILES["filename"];
     check_file_noerror($file_array);
     echo "</br>";

     //check that our file has the right extenssion we want
     check_file_type($filename);

     //creating/getting a subfolder inside the user special directory
     $base_dir = get_file_dir($user_dir_name, $filename);

     //now we move our file inside of that new folder
     move_file( $filename, "filename", $base_dir);
    }
    
   ?>   
   <div class=clear></div>
   <main id="usersave-items" class='container'>
     <div class="row no-padding no-margin re">
       <div class="col-xs-12 re">
         <h1>Browsing User Files</h1>
       </div>
     </div> 
     <div class="col-xs-12 no-padding no-margin re">

     <?php
             //echo "<p>Upload directory is $user_dir_name</p>";
       if ((isset($_GET["photo"])&&isset($_GET["photo"])===true)) {
         if (isset($_GET["slider"])) {
           show_user_photos($_GET['userid'],false,true );
          }else{
          show_user_photos($_GET['userid'], false,false);
          }
          //show_user_photos($_GET['userid'], $_SESSION["fname"],$_GET['slider'] );
        
        }
       /*echo '<p>Directory Listing:</p><ul>';
         if (isset($_GET["slider"])) {
           browse_dir($user_dir_name, $_GET["userid"], true);
          }else{
            browse_dir($user_dir_name, $_GET["userid"],false);
          }*/
  }else{
   echo "This is an invalid user...";
    exit();
  }
       ?>
   </div>        
 </main> 

 <div class=clear></div>
<?php
 
 create_footer();
?>