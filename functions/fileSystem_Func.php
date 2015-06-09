<?php



  //create a directory for each user user sign up in our system
  //it takes two arguments, the username, and the directory, the folder will be created in
  //get_file_dir($userid , $email, $filename) return the name of user's upload dir
  // create_each_user_dir($userid, $email, $in_dir = "../userfiles/") return the name of each user's personal dir
  // it should be like this: 
  // "../userfiles/userdid_email;
  // userid and email are the current userid and email respectively
  function create_each_user_dir($userid, $in_dir = "../userfiles/"){

   $user_dir_name= $in_dir.$userid.'/';
   if (!file_exists($user_dir_name)) {
     if(!mkdir($user_dir_name, 0777, true)){ die("cant create the folder");}; 
    } 
    return $user_dir_name;
  } 

  function create_each_user_subDir($parentDir){

   $user_dir_name1= $parentDir.'/docx/';
   $user_dir_name2= $parentDir.'/images/';
   $user_dir_name3= $parentDir.'/text/';
   if (!file_exists($user_dir_name1)) {
     if(!mkdir($user_dir_name1, 0777, true)){ die("cant create the folder");}; 
    }
    if (!file_exists($user_dir_name2)) {
     if(!mkdir($user_dir_name2, 0777, true)){ die("cant create the folder");}; 
    }
    if (!file_exists($user_dir_name3)) {
     if(!mkdir($user_dir_name3, 0777, true)){ die("cant create the folder");}; 
    } 

    return true;
  }



  //this function take a filename, and check for error
  function check_file_noerror($filename){

   if ($filename['error'] > 0){
      echo 'Problem: ';
      switch ($filename['error']){
        case 1: echo 'File exceeded upload_max_filesize';
         break;
        case 2: echo 'File exceeded max_file_size';
         break;
        case 3: echo 'File only partially uploaded';
         break;
        case 4: echo 'No file uploaded';
         break;
        case 6: echo 'Cannot upload file: No temp directory specified';
         break;
        case 7: echo 'Upload failed: Cannot write to disk';
         break;
      }
    }
  }


  //this function take a filename, and check its type
  //we want only these extenssions : "docx", "txt", "gif", "jpeg", "jpg", "png"
  //if the upload file's extenssion is not one of these, it will return an error
  function check_file_type($filename){
   
   $filename = strtolower($filename);
   $filename = preg_replace('/\s+/', '', $filename);
   $extension = array("docx", "txt", "gif", "jpeg", "jpg", "png");
   $file_in_array = explode(".", $filename );
   $file_extension = end($file_in_array);
   if (!in_array($file_extension, $extension)) {
    echo  "this kind of file type is not allowed";
   }
  }

  //this function is to check the resume upload only take a filename, and check its type
  //we want the resume to have only these extenssions : "docx", "txt", "pdf".
  //if the upload file's extenssion is not one of these, it will return an error
  function check_resume_file_type($filename){
   
   $filename = strtolower($filename);
   $filename = preg_replace('/\s+/', '', $filename);
   $extension = array("docx", "txt", "pdf", "PDF");
   $file_in_array = explode(".", $filename );
   $file_extension = end($file_in_array);
   if (!in_array($file_extension, $extension)) {
    echo  "this kind of file type is not allowed for resume";
   }
  }

  //this function take a filename, and the directory we to move our file in
  //if the file extenssion is image, it will create a sub directory called "image/" in $user_dir_name
  //if the file extenssion is txt, it will create a sub directory called "text/" in $user_dir_name
  //if the file extenssion is docx, it will create a sub directory called "docx/" in $user_dir_name
  //get_file_dir($userid , $email, $filename) return the name of user's upload dir
  // it should be one of this: 
  // "../userfiles/userdid/image for image files ;
  // "../userfiles/userdid/text for text files;
  // "../userfiles/userdid/docx for window doc files;
  // userid and email are the current userid and email respectively
  //we have to first assign a variable the name of the base directory name, 
  //then use that variable as argument in our function, like this:
  // var $user_dir_name = create_each_user_dir($userid, $email);
  function get_file_dir($user_dir_name, $filename){
   
   $filename = strtolower($filename);
   $filename = preg_replace('/\s+/', '', $filename);
   $image = array("gif", "jpeg", "jpg", "png");
   $file_in_array = explode(".", $filename );
   $file_extension = end($file_in_array);
   if (in_array($file_extension, $image)) {
     $upload_image_dir = $user_dir_name."/"."images/";
     if (!file_exists($upload_image_dir)) {
       if(!mkdir($upload_image_dir, 0777, true)){ die("cant create the folder for image");}; 
      }
      return $upload_image_dir;
    }elseif ($file_extension == "txt") {
       $upload_txt_dir = $user_dir_name."/"."text/";
       if (!file_exists($upload_txt_dir)) {
         if(!mkdir($upload_txt_dir, 0777, true)){ die("cant create the folder for txt");}; 
        }
     return $upload_txt_dir;        
    } elseif (($file_extension == "docx")||($file_extension == "pdf")
        ||($file_extension == "PDF")) {
      $upload_docx_dir = $user_dir_name."/"."docx/";
      if (!file_exists($upload_docx_dir)) {
       if(!mkdir($upload_docx_dir, 0777, true)){ die("cant create the folder for docx");}; 
      } 
     return $upload_docx_dir;
    } 
  }


  //we move the file to a safe place in our server
  //we have to first assign a variable the name of the base directory name, 
  //then use that variable as argument in our function, like this:
  // the $input_name is the <input> element attribute name
  // var $base_dir = get_file_dir($user_dir_name, $filename);

 function move_file($filename, $input_name, $base_dir){
   
   $filename = strtolower($filename);
   $filename = preg_replace('/\s+/', '', $filename);
   $file_location = $base_dir."/".$filename;
   $time = date("H_i_s");
   if (file_exists($file_location)) {
      $file_location = $base_dir."/".$filename.'_'.$time;  
    } 

    if (@!move_uploaded_file($_FILES[$input_name]["tmp_name"], $file_location ));{
      return false;
    }
    
    return true;
  }

  //this is only for resume
  //we move the file to a safe place in our server
  //we have to first assign a variable the name of the base directory name, 
  //then use that variable as argument in our function, like this:
  // the $input_name is the <input> element attribute name
  // var $base_dir = get_file_dir($user_dir_name, $filename);

 function move_resume_file($filename, $input_name, $base_dir){
   
   $filename = strtolower($filename);
   $filename = preg_replace('/\s+/', '', $filename);
   $file_location = $base_dir."/".$filename;
    

    if (@!move_uploaded_file($_FILES[$input_name]["tmp_name"], $file_location ));{
      return false;
    }
    
    return true;
  }


  //this function will allow us to brownse a directory and subdirectory, and show its content
 //$for_jequerySlider is false, that mean we are only interested in the slider for post
//$for_jequerySlider using can be found in jquery.js in getExternal() method
 function browse_dir($dirpath, $userid, $for_jequerySlider=true){

    if(!is_dir ($dirpath.'/')){  //checking our recursive
      return false;
    }

    $dir = opendir($dirpath.'/');
    $image = array("gif", "jpeg", "jpg", "png");
    $pic_array = array();

   //echo "<table style=\"width:100%\">";
   //echo "<tr>";
   while (($filename = readdir($dir)) !== false) {
     //strip out the two entries of . and ..
     if($filename != "." && $filename != ".."){
       
       $file_in_array = explode(".",$dirpath.'/'.$filename);
       $file_extension = end($file_in_array);
       //echo $dirpath.$filename;
       
       if (is_dir($dirpath.'/'.$filename)) {
         $filename = $filename.'/';
         echo $filename.'(dir)';
         echo "<br />";
       }elseif(in_array($file_extension, $image)) {

          $path = $dirpath.$filename;

          //we need the extenssion part of each path
          $ext = substr($filename, -4, 4);

          //then we take the filename without extenssion
          $real_name = basename($path, $ext);
          $pic_array[$real_name] = $path;

        }else{
        echo "------->".$filename;
        echo "<br />";
       } 
       
       
       
       //echo "<br />";
       browse_dir($dirpath.$filename, $userid, $for_jequerySlider); //recursive
      }
    }
    //sort the file first
    uasort($pic_array, 'compare_filecreate_date');
    showformat_pic($pic_array, $userid, $for_jequerySlider); 
    
}


//show_user_photos($_GET['userid'], $_SESSION["fname"] );
/* show all photos of a partcular user
 @userid user who owns the photos */
 function show_user_photos($userid,$for_proPage, $for_jequerySlider=true){

    //if(!is_dir ($dirpath.'/')){  //checking our recursive
    //  return false;
    //}
    $dirpath = "../userfiles/".$userid."/images/";
    $dir = opendir($dirpath);//opening the directory
    $image = array("gif", "jpeg", "jpg", "png");
    $pic_array = array(); //array that will contain all the pictures of a particular user
   while (($filename = readdir($dir)) !== false) {

     //strip out the two entries of . and ..
     if($filename != "." && $filename != ".."){
       
       $file_in_array = explode(".",$dir.'/'.$filename); //seperating the filename and the extension
       $file_extension = end($file_in_array); //taking the extension
       if(in_array($file_extension, $image)) {

          $path = $dirpath.$filename; 
         // var_dump($dir);

          //we need the extenssion part of each path
          $ext = substr($filename, -4, 4);
          //then we take the filename without extenssion
          $real_name = basename($path, $ext);
          $pic_array[$real_name] = $path;
         // var_dump($pic_array);
        } 
      // browse_dir($dirpath.$filename, $userid, $for_jequerySlider); //recursive
      }
    }
    //sort the file first
    uasort($pic_array, 'compare_filecreate_date');
    showformat_pic($pic_array, $userid,$for_proPage, $for_jequerySlider); 
    
}
 // echo  key($pic_array);
      //print_r($pic_array);       
  

//show the pics in a table
   // 




 //format the pics by putting then a tabe and display it
  function showformat_pic(&$pic_array, $userid, $for_proPage, $for_jequerySlider){

   
   if (isset($pic_array)&&(!empty($pic_array))) { //does user have existing picture?
     
     //test to see if we are using the pictures for the slider, or
     //for picking up a profile picture, or
     //for showing them on the profile page 
     $i =0;
     if (($for_proPage===true)) {//if we are using the pictures for showing them on the profile page 
       foreach ($pic_array as $name => $path ) {
         if ((($i%4) === 0) ||($i ===0)) {
           echo "<div class =\"row user-each-pic no-padding no-margin\">";
          }
          /* triggering the modal with a .caret */
         echo "<div class =\"col-xs-3 user-ehjach-pic no-padiding no-margin\">".
                 "<img src= $path".'?name='.$name." alt= \"my picture\"".
                   " class = \"img-responsive ukser-img\"".
                   "data-toggle=\"modal\" data-target=\"#user-img-".$i."\" >".
                  /**** Modal *****/
                 "<DIV class=\"modal fade\" role=\"dialog\" id=\"user-img-".$i."\">".
                   "<DIV class=\"modal-dialog\">".
                     /***** Modal Body ***/
                     "<DIV class=\"modal-content\">".
                       "<DIV class=\"modal-header\">".
                         "<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>".
                         "<h4 class=\"modal-title\">".$name."</h4>".
                       "</div>".
                       "<DIV class=\"modal-body\">".
                         "<div class =\"row user-each-pic no-padding no-margin\">".
                           "<div class =\"col-xs-12 no-padiding no-margin\" >".
                             "<img src= $path".'?name='.$name." alt= \"my picture\"".
                                " class = \"img-responsive \" >".
                           "</div>".
                         "</div>".     
                       "</div>".
                       "<DIV class=\"modal-footer\">".
                         "<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>".
                       "</div>".
                     "</div>".
                   "</div>".
                 "</div>".  
               "</div>";
           
         $i++;

         if ((($i%4) === 0) ||($i === sizeof($pic_array))) {
           echo "</div>";
          }
        }
      }elseif (($for_jequerySlider===true)) { //if we are using the pictures for the slider==true
       echo "yes for slider";
       foreach ($pic_array as $name => $path ) {
         if ($i === 0) {
           echo "<div id=\"userpict\" class=\"only-slider\">";
          }
          //we need the extenssion part of each path
          $ext = substr($path, -4, 4);
          //then we take the filename without extenssion
          $real_name = basename($path , $ext);

          //echo "<div class =\"user-each-pic-name\">";
          //echo "</br>";
          echo "<div class =\"user-each-pic\">".
          "<img src= $path".'?name='.$real_name." alt= $real_name class = \"user-imxg img-responsive\">".
          "<input type=\"checkbox\"  class=\"chck\"  form=\"post-form\" name=\"img-chk[]\" value=\"".$path."\" /></div>";
          $i++;

          if ($i === sizeof($pic_array)) {
            echo "</div>";
          }
        }
      }elseif (($for_jequerySlider===false)){// we are not using the pictures for the slider==false, 
       //it is for choosing a profile picture,
       //we want the we want a radiobutton to appear on top of each picture,
       //so user can use only on to be his profile pic
       echo "<form  action=\"profile.php?userid=".$userid."\" method=\"post\" id=\"user-profile-pic\" >";
       echo '';
       foreach ($pic_array as $name => $path ) {
         if ((($i%3) === 0) ||($i ===0)) {
           echo "<div id=\"userpict\" class=\"row no-padding no-margin \">";
         }
       
         //we need the extenssion part of each path
         $ext = substr($path, -4, 4);
         //then we take the filename without extenssion
         $real_name = basename($path , $ext);

         echo "<div class =\"col-xs-4 user-each-pic-name no-padfding no-marfgin\" id=\"".$i."\">".
               "<div class=\"row no-padding no-margin \" >".
                 "<h4 class=\"col-xs-12 no-paddfing no-mfargin\">".
                   "<small>".$real_name."</small>".
                 "</h4>".
                 "<div class =\"col-xs-12 no-padding no-margin user-each-pic\">".
                   "<img src= $path".'?name='.$real_name." alt= $real_name class = \"usedr-img img-responsive\"  >".
                   "<input type=\"radio\"  class=\"chck\" name=\"img-chk\" value=\"".$path."\" id=\"pro-img-".$i."\"/>".
                 "</div>".
               "</div>".
             "</div>";
         $i++;

         if ((($i%3) === 0) ||($i === sizeof($pic_array))) {
           echo "</div>";
          }
        }
        echo "</form>";
      }else{//the user  doesnt not have any picture at all
        echo "<li class=\"row no-padding  \">".
            "<h5 class=\"col-xs-12 text-muted no-item-text no-margin \" > NO PICTURE YET !</h5>".
         "</li>";
      }
    }else{//the user  doesnt not have any picture at all
        echo "<li class=\"row no-padding  \">".
            "<h5 class=\"col-xs-12 text-muted no-item-text no-margin \" > NO PICTURE YET !</h5>".
         "</li>";
    }
  }




// compare our files creation date
function compare_filecreate_date($f1, $f2) {
   $f1_creationdate = filemtime ( $f1);
   $f2_creationdate = filemtime ( $f2);
    if ($f1_creationdate == $f2_creationdate) {
        return 0;
    }
    return ($f1_creationdate < $f2_creationdate) ? 1 : -1;
}


  function showformat_pic1($pic_array){
   ?>
  
     
       <?php 
         $i =0;
         foreach ($pic_array as $name => $path ) {
            
            //we need the extenssion part of each path
            $ext = substr($path, -4, 4);

            //then we take the filename without extenssion
            $real_name = basename($path , $ext);

          //if(($i > 0) && ($i%3 !== 0)){
            echo "<div class =\"user-each-pic-name\">".$real_name;
            echo "</br>";
             echo "<div class =\"user-each-pic\">".
              "<img src= $path".'?name='.$real_name." alt= $real_name class = \"user-img\" width= \"100%\" height=\"100%\"></div></div>";
              
            //}
            /*else{
            echo "<div class =\"user-each-pic-name\">".$real_name;
            echo "</br>";
              echo "<div class =\"user-each-pic\">".
              "<img src= ".$path.'?'.'name='.$real_name.".alt = ".$real_name." class = \"user-img\" width= \"100%\" height=\"100%\"></div></div>";
            // echo "</tr>";
            // echo "<tr>";
            // echo "<td><td>".$real_name.
            //  "</br><img src= ".$path.'?'.'name='.$real_name.". alt = ".$real_name." class = \"user-each-pic\" width= \"300\" height=\"300\"></td>"; 
            }
            $i++;*/
          }
 
    //echo "</tr>";
    echo "</div>";
  }

?>


