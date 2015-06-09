<?php

 require_once('../includefiles/includeAllFiles.php');
  
 //initialize php variables used in the form
 $username = ""; //username can be null, it is set up by the user in the user profile section
 $fname = "";
 $lname = "";
 $title = "";
 $college = "";
 $email = "";
 $password = "";
 $phone = "";
 $sex = "";
 $birthmonth = ""; 
 $birthday = "";
 $birthyear = "";  


 //checking if all form input were filled correctly
 try { 

   //creating short names for our form variables
     if (isset($_POST['sign-up-form'])) {

         $username = isset($_POST['username']) ? htmlspecialchars($_POST['username']): null; //username can be null, it is set up by the user in the user profile section
         $fname = htmlspecialchars( trim($_POST['fname'] ));
         $lname = htmlspecialchars( trim($_POST['lname']) );
         $title = $_POST['title'];
         $college = $_POST['college'];
         $email = trim($_POST['email']);
         $password = $_POST['password'];
         $phone =  isset($_POST['phone'])  ? htmlspecialchars($_POST['phone']) :rand(345454,24455);
         $sex = isset($_POST['sex']) ? $_POST['sex'] : null;
         $birthmonth = $_POST['birthmonth'];
         $birthday = $_POST['birthday'];
         $birthyear = $_POST['birthyear'];
        
         //checking if $email is an valid email
         if(!is_valid_email($email)){
             // throw an exception if it's not
             throw new Exception("your email is not valid");
             echo "</br>";
            }
 


          //checking if the form if filled out correctly
         if(!is_fill_out_form($_POST)){
              // throw an exception if it's not
             throw new Exception("The form is not filled out correctly, go back and try agrain");
             echo "</br>"; 
           }


         //checking if $title is either student, parent, or professor
         $allow_titles = array('professor', 'student', 'parent');
         if(!in_array($title, $allow_titles)){
             // throw an exception if it's not
              throw new Exception("title must be either parent, student or professor");
             echo "</br>";
            }

         //checking is password is at least 6 characters
         if( strlen($password) < 6 ){
             // throw an exception if password lenght is less than 6 characters
              throw new Exception("Password must be at least 6 characters long");
             echo "</br>";
            }
     
         /*// in case we add phone number later on
          //checking if $phone is a valid phone number. phone number will be set up by user later in his profile section
         if( is_valid_phone($phone)){
             // throw an exception if it's not
             throw new Exception("your phone number is invalid");
             echo "</br>";
            }*/
     
 

          //checking if $sex is either male or female
         $allow_sex = array('M', 'F');
         if(!in_array($sex, $allow_sex)){
             // throw an exception if it's not
             throw new Exception("sex should be either male or female");
             echo "</br>";
            }

         //checking if the value of $birthmonth is not between 1 to 12
         $birth_month = range(1, 12);
         if(!in_array($birthmonth, $birth_month)){
             // throw an exception if it's not
             throw new Exception("birtmonth should be from Jan to Dec");
             echo "</br>";
            }

      

         //checking if the value of $birthday is not between 1 to 31
         $birth_day = range(1, 31);
         if(!in_array($birthday, $birth_day)){
             // throw an exception if it's not
             throw new Exception("birthday should be from 1 to 31");
             echo "</br>";
            }
     
         //checking if the value of $birthyear is not between 1905 to 2014
          $birth_year = range(1905, 2014);
          if(!in_array($birthyear, $birth_year)){
             // throw an exception if it's not
              throw new Exception("birthyear should be from 1905 to 2014");
             echo "</br>";
            }
 

           //after the form is checked for valid data
        
        
         //add slashes before special character if they are not add automaticaly
         if (!get_magic_quotes_gpc()) {
             $fname = addslashes($fname);
             $lname = addslashes($lname);
             $email = addslashes($email);
            }

            
         // save user infos in an array where keys are the names of our columns in our db
         // and values are the corresponding values
         $user_info = array('userid' => null,'username' =>$username, 'fname' => $fname, 'lname' => $lname,
                            'title' => $title, 'email' => $email,'password' => $password,'sex' => $sex,
                             'birthyear' => $birthyear,'major'=>null,'join_date'=>null, 'phone' => $phone, 
                            'college' => $college,'about'=>null,'online'=>'0','profilepic'=>'' 
                          ); 



          //after the form is checked for valid data
         //now let sign up a user
         //check to see if email exist,
         //if it doesnt, sign the user up, otherwise throw an exception
         if($db->check_record_Exists("email", "user",  "where email = '"."$email"."'") === false){
         if (isset($user_info)) {
             //save_user() argument is false because this  will be a new sign up and NOT an existing user
             //let first create a new user object
             $new_user = new user($user_info);
             $userid = $new_user->save_user(false) or die("sorry, can't sign you up now: ".mysqli_error());
            }else{
              throw new Exception("cant save you now, the form might not be filled correctly!");
              echo "</br>";
            }
         }else{
              // if email exists, throw new exception
              throw new Exception("The email you entered already exists, try another one");
             echo "</br>";
            }

       
         //after a succefull sign up
         //the user will be login automatically
         $UserAuthentication->login_user($email, $password);
        header('location: profile.php?'.'userid='.$_SESSION['userid']);

         
        

         //a folder will be create for the user.
         //that folder contains his pics, his docs, etcc..
         //let take off the slashes from the email 
         $email = stripslashes($email);

         //let create that folder
         $parentDir = create_each_user_dir($_SESSION['userid']);
          create_each_user_subDir($parentDir);
        }

    /*****************************profile picture*************************/
    //creating short names for our form variables
     if (isset($_POST['profile-pic-form'])) {
       //checking if the form if filled out correctly
       if(!is_fill_out_form($_POST)){
         // throw an exception if it's not
         throw new Exception("The form is not filled out correctly, go back and try agrain");
         echo "</br>"; 
        }

        //path for profile pic
        $path =htmlspecialchars(mysql_real_escape_string(trim($_POST["img-chk"])));
        //add slashes before special character if they are not add automaticaly
        if (!get_magic_quotes_gpc()){$path = addslashes($path);}
        //save profile pic to user table in the field profilepic
        //if user already have a profile pic, it will be replace by this
        $array_profile = array("profilepic"=> "'".$path."'");
        //we want to keep this table as 1:1 (1 user may have at most 1 profilepict)
       if ($UserAuthentication->is_right_user($_GET['userid'])===true) {
         $UserAuthentication->user->profilepic=$path;//set the current profile pic to the new one
         $db->update($array_profile, 'user', 'where userid ='.$_GET['userid']);
       }
      }

     //let create header
     create_header('profile', '../assets/stylesheets/MyschoolprofileCss.css');
     create_header_menu($_SESSION['numb_noti']);

      //checking to see if this the page of the real user
         //the one who is logged in and on his page
         $right_user = false;
         if(($UserAuthentication->is_right_user($_GET["userid"]) ===true)&&
           (isset($_GET['userid'])&&($_GET['userid'] !=''))){//if right user ==true
           $right_user = true;
          } 
    }
    catch (Exception $ex) {
        create_header("problem");
        create_header_menu();
        echo $ex->getMessage()."</br>"."</br>";
        //echo $ex->getLine()."</br>".' in '.$ex->getFile();
        exit();
    }



?>
  

<div class=clear></div>
<div class="container">
  <div class="row profileintro no-paddding no-madrgin">
   <section class="col-xs-12 col-sm-3 profilepic-and-other no-padding no-margin">
     <section class="row profilepic no-padding no-margin">
       <div class="col-xs-12 no-padding no-margin ">
         <?php
          $UserAuthentication->do_profilePic($UserAuthentication->user->profilepic,"img-cirjcle", "","");
          ?>
       </div>
       <form action="userfiles.php?userid=<?php echo $_GET['userid']."&slider=false"; ?>"  method="post"  id='change-pro-pic'>&nbsp;&nbsp;
         <input type="button" value="change profile picture"
             <?php  echo "onclick=\"window.location.href='".'userfiles.php?userid='.
                $_GET['userid']."&photo=true'\"";
              ?>
            >
         </form>

      </section>
      <div class="row user-name-and-status visible-xs-block">
       <?php $UserAuthentication->do_header($_GET["userid"]);  ?>
      </div>
      <section class="row">
       <section class="col-xs-12" >
         <section class="row no-padding no-margin pro-pic-bottom-details ">
           <section class="col-xs-4" >
             <?php
               $partner_ar = $UserAuthentication->get_userPartner($db,$_GET['userid']);
               if (($partner_ar !==false) && (array_key_exists("fname", $partner_ar))) {//we have only one partner
               echo "<h5>1 Partner"."</h5>";
               }else{
                 if ($partner_ar !=false) {
                   echo "<h5>".count($partner_ar)." Partners"."</h5>";}  
                 else{ 
                   echo "<h5>No Partner"."</h5>";
                  }    
               }
              ?>
           </section>

           <section class="col-xs-1" >
             <h5>|</h5>
           </section>

           <section class="col-xs-7" >         

             <?php
               $profile_join_date = new DateTime($UserAuthentication->user->join_date);
                echo "<h5>Member since ".$profile_join_date->format('Y')."</h5>";
              ?>
           </section>
           
           
            <?php
            echo "<section class=\"col-xs-12\" >";

            if($right_user ===true){
              echo "<form  action=\"userfiles.php?userid=".$_GET['userid']."&slider=false\" method=\"post\"".
                      "enctype=\"multipart/form-data\"  id=\"upload-pic\" class=\"form-horizohntal\" name=\"resume-form\"> ".
                     "<div class=\"form-group sr-only\" >".
                       "<label for=\"MAX_FILE_SIZE\" class=\"sr-only\">MAX FILE SIZE</label>".
                       "<input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"40000000\">".
                     "</div>".
                     "<div class=\"form-group \" >".
                      "<div class=\"col-xs-12 \">".

                     "<label for=\"file_upload\" class=\"sr-only\">file upload</label>".
                     "<input type=\"file\" name=\"filename\" id=\"file_upload\" >".
                     "</div>".
                     "</div>".
                     "<span class=\"error\" id=\"file-upload-err\" style=\"display:none\"> Post is empty</span>".
                     "<div class=\"form-group \" >".
                       "<div class=\"col-xs-12 no-padding no-margin \">".
                         "<input type=\"submit\" name=\"upload-new-resume-form\" value=\"Upload New resume\" ".
                           " class=\"btn upload-new-resume-btn img-rounded\" style=\"outline:0 !important; color:white;\">".
                       "</div>".
                     "</div>".
                   "</form>";
              
            }else{
             echo "<form  action=\"../controller/partner_request.php?".'userid='.
                    $_GET["userid"]."\" method=\"\" name=\"become-part-form\" id=\"become-part\">".
                   "<label for=\"part-request-title\" class=\"sr-only\">title of the request</label>".
                     "<input type=\"hidden\" name=\"part-request-title\" id=\"part-request-title\"".
                                                         "value=\"partnership\">";
                 echo "<label for=\"part-request-for\" class=\"sr-only\">request belongs to</label>".
                      "<input type=\"hidden\" name=\"part-request-for\"  id=\"part-request-for\"".
                                                               "value=\"".$_GET["userid"]."\">";
                 echo "<label for=\"part-request-status\" class=\"sr-only\">status of the request</label>".
                      "<input type=\"hidden\" name=\"part-request-status\" id=\"part-request-status\" value=\"0\"> ".
                      "<p class=\"text-danger bg-danger not-loggin-danger\" style=\"display:none\">You are not log in!</p>".
                      "<p class=\"text-primary bg-primary part-request-sent\" style=\"display:none\">You already sent a request!</p>".
                      "<p class=\"text-success bg-success part-request-sent-succes\" style=\"display:none\">Your request has been sent!!</p>".
                      "<span class=\"glyphicon glyphicon-user\">".
                        "<span class=\"glyphicon glyphicon-plus\"></span>".
                      "</span>";
                      
                 echo  "<input type=\"submit\" name=\"part-request-form\" value=\"Become partner\" style=\"outline:0 !important; color:white;\" >";
             echo "</form>";
            }
            ?>

           </section>

           <section class="col-xs-12" >
               <?php 
                  $file = '../userfiles/'.$_GET['userid'].'/docx/resume-alamatounkara-formerge.docx';
                 echo "<a class=\"btn btn-default\" href=\"files.php?userid=".
                   $_GET['userid'].'&file='.$file."\" role=\"button\"><span class=\"glyphicon glyphicon-file\"></span> Read My Resume</a>";
               ?>               
           </section>

           <section class="col-xs-12" >
             <?php 
              echo "<a class=\"btn btn-default\" href=\"files.php?userid=".
                   $_GET['userid'].'&file='.$file."\" role=\"button\" id='send-message'><span class=\"glyphicon glyphicon-envelope\"></span> Send message&nbsp;&nbsp;&nbsp;&nbsp;</a>";
             ?>               
           </section>

           <section class="col-xs-12 tutorial-help" >
           <?php
           if($right_user ===true){//we dont want this to appear when user is on his own page
              
            }else{
             echo "<form  action=\"../controller/tutorial_request.php?".'userid='.
                    $_GET["userid"]."\" method=\"\" name=\"tutorial-help-form\" id=\"tutorial-help\">".
                   "<label for=\"tuto-request-title\" class=\"sr-only\">title of the request</label>".
                     "<input type=\"hidden\" name=\"tuto-request-title\" id=\"tuto-request-title\"".
                                                         "value=\"tutorial help\">";
                 echo "<label for=\"tuto-request-for\" class=\"sr-only\">request belongs to</label>".
                      "<input type=\"hidden\" name=\"tuto-request-for\"  id=\"tuto-request-for\"".
                                                               "value=\"".$_GET["userid"]."\">";
                 echo "<label for=\"tuto-request-status\" class=\"sr-only\">status of the request</label>".
                      "<input type=\"hidden\" name=\"tuto-request-status\" id=\"tuto-request-status\" value=\"0\"> ";
              ?>        
               <span id="help-tuto-txt" class="help-block">
                 Do you like my perfomance(s)?
               </span>
               <p class="text-danger bg-danger tuto-loggin-danger" style="display:none">You are not log in!</p>
               <p class="text-primary bg-primary tuto-request-sent" style="display:none">You already sent a request!</p>
               <p class="text-success bg-success tuto-request-sent-succes" style="display:none">Your request has been sent!!</p>
                      
               <input type="submit" value="Ask for Tutorial help" name="tuto-request-form" aria-describedby="help-tuto-txt" style="outline:0 !important; color:white;">
             </form>
            <?php } ?> 
           </section>

         </section>
       </section>
     </section>
   </section>

  
   <section class="col-xs-12 col-sm-9 profiledetails"> 
     <div class="row user-name-and-status hidden-xs">
       <?php $UserAuthentication->do_header($_GET["userid"]);  ?>
     </div>

     <div class="row pro-overview "> <!-- navbar navbar-default   navbar navbar-default-->
       <nav class ="profile_header">
          <section class="">
           <ul class="">
             <li><header id="summary-header" >Summary</header> <hr id="line-below-smry-header"></li>
             <li><header id="about-header" >About</header><hr id="line-below-abt-header"></li>
             <li><header id="project-header" >Projects</header> <hr id="line-below-pro-header"></li>
             <li><header id="partner-header" >Homeworks</header><hr id="line-below-part-header"></li>
             <?php
               if($UserAuthentication->is_right_user($_GET["userid"]) ===true){
                 echo "<li class=\"pull-right hidden-xs\">".
                       "<header id=\"edit-header\" >".
                         "<button type=\"button\" class=\"btn btn-link\">Edit</button>".
                       "</header>".
                     "</li>";
                }
             ?>
           </ul>
         </section>
       </nav>
       
      <hr id="line-below-nav-header">
       <section class="col-xs-12  no-padding " id="all-about-user">
<!--<div class="row  no-padding no-margin" id ="inner-for-scroll">-->
           <div class="row no-padding no-margin" id="profile_summary_content" >
             <?php
               $UserAuthentication->do_summary($_GET["userid"]);
             ?>
           </div>

           <div class="row " id="profile_project_content" style="display:none;" >
             <div class="col-xs-12 " >
               <?php echo "NO Project yet!"; ?>
             </div>
           </div>

           <div class="row " id="profile_partner_content" style="display:none;">
             <div class="col-xs-12 " >
             <?php 
             if($right_user ===true){
               echo "<form  action=\"userfiles.php?userid=".$_GET['userid']."&slider=false\" method=\"post\"".
                      "enctype=\"multipart/form-data\"  id=\"upload-pic\" class=\"form-horizohntal\"> ".
                     "<div class=\"form-group sr-only\" >".
                       "<label for=\"MAX_FILE_SIZE\" class=\"sr-only\">MAX FILE SIZE</label>".
                       "<input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"40000000\">".
                     "</div>".
                     "<div class=\"form-group \" >".
                      "<div class=\"col-xs-12 \">".

                     "<label for=\"file_upload\" class=\"sr-only\">file upload</label>".
                     "<input type=\"file\" name=\"filename\" id=\"file_upload\" >".
                     "</div>".
                     "</div>".
                     "<span class=\"error\" id=\"file-upload-err\" style=\"display:none\"> Post is empty</span>".
                     "<div class=\"form-group \" >".
                       "<div class=\"col-xs-12 \">".
                         "<input type=\"submit\" name=\"upload-form\" value=\"Upload me!\"  class=\"btn upload-btn  img-rounded\" >".
                       "</div>".
                     "</div>".
                   "</form>";
            }


             ?>
           </div>
           </div>

           <div class="row " id="profile_intro_yourself" style="display:none;">
              <div class="col-xs-12" >
             <form  action="" method="POST" id="about-form" >
               <?php 
                 $UserAuthentication->get_userAbout($_GET["userid"]);
               ?>
               <input type="submit" name="about-form" value="SAVE" class="signup-button about-btn" />
               <span class="error" style="display:none">Can not save, you wrote nothing about yourself!</span>
               <span class="success" style="display:none">Thanks for writting something about yourself!</span>
             </form>
             <button class="signup-button" id="edit-about" style="display:none">EDIT</button>
           </div>
          </div>
       </section>
     </div>
  </section>  
</div>
   
 <div class=clear></div>
 <div class="row no-padding no-margin bottom-pro-intro"  >
   <main class="col-xs-12 col-sm-5 main no-padding no-margin">
     <?php
       echo "<div class=\"row no-padding no-margin \">";
         new NewPost(); //creating a new post, contructure default @param is true
         echo "<p id=\"fname\" style=\"display:none\">".$_SESSION["fname"]."</p>";
         echo "<p id=\"lname\" style=\"display:none\">".$_SESSION["lname"]."</p>";
         echo "<p id=\"userid\" style=\"display:none\">".$_SESSION["userid"]."</p>";
         echo "<p id=\"profilePic\" style=\"display:none\">".$_SESSION["profilepic"]."</p>";
       echo "</div>";
         

        // $ar = array("about"=> "'".$_POST["about-user-txtbox"]."'");
         //$UserAuthentication->save_user_About($ar, $_SESSION['userid']);
        /* if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
     echo $_GET['content'] ;
    exit;
}
         
         
        
            
         //checking if all form input were filled correctly
         try { 

             //creating short names for our form variables
             if ($_GET) {
                  $post_content = htmlspecialchars( trim($_GET['content'] ));
                  $post_title = "this is a title";
           echo $post_content ;
                 if (!get_magic_quotes_gpc()) {
                     $post_content = addslashes($post_content);
                    }
                


                 // save post infos in an array where keys are the names of our columns in our db
                 // and values are the corresponding values
                 $post_info = array('postid' => null,  'post_date'=> date("Y-m-d H:i:s"),
                            'post_title' => $post_title, 'postbyuserid' => $_SESSION['userid'],
                            'postonuserid'=> $_SESSION['userid'], 'postcontent' => $post_content, 
                            'server' => $_SERVER['HTTP_HOST'],'fname'=>  $_SESSION["fname"], 
                            'lname' =>  $_SESSION["lname"]
                            
                            );

                  $pic_array = array("binary.png" => "../images/", "kcall.png" => "../images/icon/",
                              "tutorial.png" => "../images/icon/", "mycomputer.png" => "../images/icon/",
                              "tutorial.png" => "../images/icon/", "mycomputer.png" => "../images/icon/") ;
                   
                 //create a new post object
                  $new_post = new Post($post_info, $pic_array );

                 //save the post in the database
                 $new_post->save_post();
                     *//*
                  echo "<div id=\"wallz\" class=\"posting\"><ul id=\"posts\">";
                    ///submit the post with the appropriate data
                     //$new_post->create_post($pic_array);

                  echo "</ul></div>";
    
   
                 

                 


                }
            }
      
            catch (Exception $ex) {
             create_header("problem");
             create_header_menu();
             echo $ex->getMessage()."</br>"."</br>";
             echo $ex->getLine()."</br>".' in '.$ex->getFile();
             exit();
            } */
         
       ?>
       <!-- our post will be prepend to this ul element-->
       <div id="wall" class="row no-padding no-margin myschool_wall">
         <ul id="posts" class="no-padding no-margin myschool_wall">
           <?php
             $array_post = $db->select_2dArray("post",  'where postonuserid ='.$_GET['userid']);
             $all_posts = new Post();
             $all_posts->display_ExistingPost($array_post, $db);

             if(($array_post ===false) || (array_key_exists("postid", $array_post))){ 
               echo "<p id=\"lastlistid\" style=\"display:none;\" >0</p>";
             }else{
              echo "<p id=\"lastlistid\" style=\"display:none;\" >".count($array_post)."</p>";
             }
           
           ?> 
         </ul>
       </div>
        
   </main>
   <aside class= "col-xs-12 col-sm-4  pro_sbide_bar no-padding no-margin">
     <div class="row no-padding no-margin " >
       <section class='col-xs-12 no-padding no-margin righttop'>
         <h4 class="no-padding no-margin">Photo</h4> <hr id="bet-aside-div">
         <!--<ul>-->
           
           <?php
            //var_dump(show_user_photos($_GET['userid']));
            //show_user_photos($_GET['userid'], $_SESSION["fname"] );
           //showing user pictures
            show_user_photos($_GET['userid'],true, false);

           ?>
           
         <!--</ul>-->
       </section>
     </div> 
   </aside>
   <aside class= "col-xs-12 col-sm-3 pro_sbide_bar no-padding no-margin rightside">
       <div class="col-xs-12 col-sm-12 no-padding no-margin ">
         <div class="row no-padding no-margin" id="aside-partners">
           <section class='col-xs-12 no-padding no-margin righttop'>
             <h4 class="no-padding no-margin">Partners</h4> <hr id="bet-aside-div">
             <ul class="no-padding no-margin">
               <?php
                 $UserAuthentication->showUserPartner($db,$_GET["userid"],$partner_ar);
                ?>
             </ul>
          </section>
         </div>

         <div class="row no-padding no-margin" id="aside-same-school ">
           <section class='col-xs-12 no-padding no-margin righttop '>
             <h4 class="no-padding no-margin">Users from
               <?php echo $UserAuthentication->user->college;?> 
             </h4> <hr id="bet-aside-div">
             <ul class="no-padding no-margin">
               <?php
                 $UserAuthentication->showUserFromSameSchool($db,$_GET["userid"],$UserAuthentication->user->college);
                ?> 
             </ul>
           </section>
         </div>
       </div>
     </aside>
     
       <!--<section class= 'col-xs-12 col-md-6 rightbottom'>
         <h4> Recommendation</h4><hr id="bet-aside-div">
         <ul>
            <li><a href="#"> free way to come to dobbs fery</a></li>
            
            <li><a href="#">how to get an A in cs</a></li>
            
            <li><a href="#">new java JDK</a></li>
         </ul>
     

   <aside class= "col-xs-12 col-md-6 pro_side_bar no-padding no-margin">
     <div class="row no-padding no-margin">
       <section class='col-xs-12 col-md-6 righttop'>
         <h4> online</h4> <hr id="bet-aside-div">
         <ul>
           <?php
             $UserAuthentication->showUserPartner($_GET["userid"]);
            ?>
         </ul>
       </section>
     
       <section class= 'col-xs-12 col-md-6 rightbottom'>
         <h4> Recommendation</h4><hr id="bet-aside-div">
         <ul>
            <li><a href="#"> free way to come to dobbs fery</a></li>
            
            <li><a href="#">how to get an A in cs</a></li>
            
            <li><a href="#">new java JDK</a></li>
         </ul>
      </section>
   </aside>

   <!--<aside class= "pro_new_side_bar">
    <section class='righttop'>
        <h4>Projects</h4>
        <hr id="bet-aside-div">

        <ul>
            <li><a href="#">Startup partner for beginnner</a></li>
            
            <li><a href="#">New OS building  for young ambitious</a></li>
            
            <li><a href="#"> Memtor proggram</a></li>
            
            <li><a href="#">Empower program for boys and girls</a></li>
            
            <li><a href="#">let start a non-profit organization</a></li>
            
            <li><a href="#">new project planner for my project</a></li>
        </ul>
    </section>

    <section class= 'rightbottom'>
         <h4> homeworks</h4>
             <hr id="bet-aside-div">

         <ul>
            <li><a href="#"> CISC-421 chapter 9</a></li>
            
            <li><a href="#"> CISC-300 presentation</a></li>
            
            <li><a href="#"> chemistry hw page-234</a></li>
            
            <li><a href="#"> CISC-300 how to do permutation</a></li>
            
            <li><a href="#"> hw9 chapeter 6</a></li>
         </ul>   
        </ul>
    </section>
   </aside>-->
  
  </div>
</div>
<div class=clear></div>

<?php

create_footer();
?>