<?php
 require_once('../includefiles/includeAllFiles.php');

 //initialize php variables used in the form
 $email = "";
 $password = "";
 
 //checking if all form input were filled correctly
  
 
 try {
     if (!isset($_SESSION["valid_user"])) {//user is not loggin 
         //creating short names for our form variables
         if (isset($_POST['sign-in-form'])) {
             //$username = htmlspecialchars( $_POST['username'] ); //username can be null, it is set up by the user in the user profile section
             $email =    $_POST['email'];
             $password = $_POST['pwd'];
            }   

         //checking if the form if filled out correctly
         if(!is_fill_out_form($_POST)){
             // throw an exception if it's not
             throw new Exception("Please enter a correct email and password, if you dont have an account, <a href=\"../index.php\">please signup</a>");
             echo "</br>"; 
            }
       
         //checking if $email is an valid email
         if(!is_valid_email($email)){
             // throw an exception if it's not
             throw new Exception("your email is not valid");
             echo "</br>";
            }
    
         //checking is password is at least 6 characters
         if( strlen($password) < 6 ){
             // throw an exception if password lenght is less than 6 characters
             throw new Exception("Password must be at least 6 characters long");
             echo "</br>";
            }

         if (!get_magic_quotes_gpc()) {
             $email = addslashes($email);
            }
         //check to see if email exist,
         //if it does, sign the user in, otherwise throw an exception

         if($UserAuthentication->check_Useremail_Exists($email)){
             //after a succefull sign up, the user will be login automatically

             $UserAuthentication->login_user($email, $password);
             header('location: home.php?'.'userid='.$_SESSION['userid']);//redirect with user id appended
             create_header('home', '../assets/stylesheets/MyschoolhomeCss.css');
             create_header_menu();
             //echo "<p> WELCOME USER: ".$_SESSION["fname"]." ".$_SESSION["lname"] ."</p>";       
            }

        }else{
          /*retrieve all notification for a particular user */
          //select * from notification where touserid=1;
          $array_noti = $db->select_2dArray("notification", 
                     "where requeststatus ='0' and touserid =".$_SESSION["userid"]);
          //getting only the number of notifications, 
          //"true" at the end of the parameter signifies we want it for a phone
          $_SESSION['numb_noti'] = show_Notifications_numb($_SESSION["userid"],  $array_noti, true);

          create_header('home', '../assets/stylesheets/MyschoolhomeCss.css');
          create_header_menu($_SESSION['numb_noti']);

        }
    }
    catch (Exception $ex) {
       header('location: login.php');//redirect with user id appended

        create_header("problem");
        create_header_menu("");
        echo $ex->getMessage()."</br>"."</br>";
        create_signin_form();
        create_footer();
        //echo $ex->getLine()."</br>".' in '.$ex->getFile();
        exit();
    }

?>


<div class=clear></div>

<div class="container">
 <div class="row no-padding no-margin">
   <aside class='col-xs-3 no-padding hidden-xs hiddden-sm no-margin leftside'>
     <div  class="bet-cat">
     <div class="row no-padding no-margin">
	     <div class='col-xs-12'><h4>Wanted</h4></div>
     </div>

     <div class="row no-padding no-margin">
       <div class='col-xs-12 no-padding no-margin'> 
         <ul class='row no-padding no-margin '>
           <li class='col-xs-12 '><a href=<?php echo $_SERVER["PHP_SELF"].'?userid='.$_GET["userid"].'&action=sale'; ?>>For sales</a></li>
           <li class='col-xs-12'><a href=<?php echo $_SERVER["PHP_SELF"].'?userid='.$_GET["userid"].'&action=services'; ?>>Services</a></li>
           <li class='col-xs-12'><a href=<?php echo $_SERVER["PHP_SELF"].'?userid='.$_GET["userid"].'&action=tutorial'; ?>>Tutorial partner</a></li>
           <li class='col-xs-12'><a href=<?php echo $_SERVER["PHP_SELF"].'?userid='.$_GET["userid"].'&action=internship'; ?>>Internship</a></li>
           <li class='col-xs-12'><a href=<?php echo $_SERVER["PHP_SELF"].'?userid='.$_GET["userid"].'&action=lostclassmates'; ?>>lost classmates</a></li>
           <li class='col-xs-12'><a href=<?php echo $_SERVER["PHP_SELF"].'?userid='.$_GET["userid"].'&action=college'; ?>>College</a></li>
           <li class='col-xs-12'><a href=<?php echo $_SERVER["PHP_SELF"].'?userid='.$_GET["userid"].'&action=others'; ?>>Others</a></li>
	       </ul>
       </div>
     </div>
     </div >

     <div class="bet-cat">
	   <div class="row no-padding no-margin">
       <div class='col-xs-12'><h4> Notifications</h4></div>
     </div>

     <div class="row no-padding no-margin">
       <ul class='col-xs-12 no-padding no-margin'>
          <?php
           //show notifications list, and assign the return value to an array 
           //that contains all the notifications in subcategories(sale, partnership, service, tutorial)
           //we already got  "$array_noti" up. scroll up to the create_header_menu($numb_noti);
           $category_3Darray = show_Notifications_numb($_SESSION["userid"],  $array_noti, false);
            //var_dump($category_3Darray);
          ?> 
       </ul>
	   </div>
          </div >

	   <div>
     <div  class="bet-cat">
       <div class="row no-padding no-margin">
          <div class='col-xs-12'><h4>Partners</h4></div>
       </div>

       <div class="row no-padding no-margin">
         <div class='col-xs-12 no-padding no-margin '> 
           <ul class='row no-padding no-margin '>
            <?php 
             $partner_ar = $UserAuthentication->get_userPartner($db,$_SESSION["userid"]);
             $UserAuthentication->showUserPartner($db, $_SESSION["userid"], $partner_ar);
            ?>
           </ul>
         </div> 
       </div>
      </div >

		   <!--<<li><ul>
             <h5> Partners </h5>
             <?php
             $UserAuthentication->showUserPartner($_SESSION["userid"]);
            

        /*
             <li><a href="#">partner1</a></li>
             <li><a href="#">partner2</a></li>
             <li><a href="#">partner3</a></li>
             <li><a href="#">partner4</a></li>
             <li><a href="#">partner5</a></li>
             <li><a href="#">See all</a></li>*/?>
             </ul>
              </li>
			
			
	     	</ul>-->
	   </div>
   </aside>
  
  
   
  <main class="col-xs-12  col-sm-7 no-padding  main hm-main ">
     <div class="row no-padding no-margin">
       <section class="col-xs-12 home-search no-padding no-margin " >
         <form  action=<?php echo $_SERVER['PHP_SELF']; ?> method="GET" id="search-form" class="form-inline">
           <label for="search-input" class="sr-only">search</label>
           <input placeholder="Type a keyword..." type="text" name="search-text" id="search-input" class="form-control"/>
           <input type="submit" name="search-form" value="SEARCH" class="search-button" />
         </form>
       </section>
     </div><br>

     

     <section class="row main-contenu no-padding no-margin" >
      <div class="col-xs-12 no-padding no-margin">
      <?php 
      //showing the contenu belonging to the navigation menu that is clicked 
      if (isset($_GET["action"])) {
         switch ($_GET["action"]) {
             case 'sale':
                  show_items_list($_GET["userid"], $db);
                 break;
            case 'notification':
               echo "<ul>".show_Notifications($_GET["userid"], $db, $UserAuthentication)."</ul>"; 
                 break;
            case 'services':
                 show_service_list($_GET["userid"],$db); 
                 break;
            case 'internship':
                
                 show_internship_list($_GET["userid"],$db); 
                 break;
             
             default:
                 echo "<li class=\"row no-padding  \">".
                   "<h5 class=\"col-xs-12 text-muted text-muted no-user-text no-padding no-margin \" >NOTHING IN THIS CATEGORY YET! </h5>".
            "</li>";
                 break;
         }
      }
      
    
     //show all posts by default as soon as the home page is shown.
     if (isset($_GET["userid"])&&(count($_GET)===1)){ 
       echo "<div class=\"row no-padding no-margin \">";
         new NewPost(); //creating a new post, contructure default @param is true
         echo "<p id=\"fname\" style=\"display:none;\">".$_SESSION["fname"]."</p>";
         echo "<p id=\"lname\" style=\"display:none;\">".$_SESSION["lname"]."</p>";
         echo "<p id=\"userid\" style=\"display:none;\">".$_SESSION["userid"]."</p>";
         echo "<p id=\"profilePic\" style=\"display:none;\">".$_SESSION["profilepic"]."</p>";
       echo "</div>";
       echo "<div id=\"wall\" class=\"row no-padding no-margin myschool_wall\">".
            "<ul id=\"posts\" class=\"no-padding no-margin myschool_wall\">";
         $array_post = $db->select("post");
         $all_posts = new Post();
         $all_posts->display_ExistingPost($array_post,$db);
       if(($array_post ===false) || (array_key_exists("postid", $array_post))){ 
         echo "<p id=\"lastlistid\" style=\"display:none;\" >0</p>";
        }else{
         echo "<p id=\"lastlistid\" style=\"display:none;\" >".count($array_post)."</p>";
        }
        echo "</ul>".
       "</div>";
      }

      //we are showing  each item posted for sale one by one, by clicking the next and prev button
      if (isset($_GET["itnumb"])){ show_each_item($_GET["userid"],$_GET["itnumb"]); }
      //we are showing  all the items posted for sale all together, by clicking the expand all button
      if(isset($_GET["expSa"])&&($_GET["expSa"]==true)){show_each_item($_GET["userid"],false, true);}

      //we are showing  each services from the 'wanted list secttion' one by one
      if (isset($_GET["sernumb"])){show_each_service($_GET["userid"],$_GET["sernumb"]);}
      //we are showing  all services from the 'wanted list secttion' all together, by clicking the expand all button
      if(isset($_GET["allservice"])&&($_GET["allservice"]==true)){show_each_service($_GET["userid"],false, true);}
      
      //we are showing  each internship posted one by one, by clicking the internship title 
      //from the table containing all internships
      if(isset($_GET["intid"])&&($_GET["intid"]!==false)){show_each_Internship($db,$_GET["userid"]);}
      //we are showing  all interniships all together, by clicking the expand all button
      if(isset($_GET["expInt"])&&($_GET["expInt"]==true)){show_each_Internship($db,$_GET["userid"]);}

     //if the query string noti-type =='sale', we are showing  notifications related to sale
      if(isset($_GET["noti-type"])&&($_GET["noti-type"]=='sale')){
         show_Notifications_inCategory($_GET["userid"],$category_3Darray['sale'], $db);
        }
     //if the query string noti-type =='service', we are showing  notifications related to service
      if(isset($_GET["noti-type"])&&($_GET["noti-type"]=='service')){
         show_Notifications_inCategory($_GET["userid"],$category_3Darray['service'], $db);
        }
     //if the query string noti-type =='partnership', we are showing  notifications related to partnership
      if(isset($_GET["noti-type"])&&($_GET["noti-type"]=='partnership')){
         show_Notifications_inCategory($_GET["userid"],$category_3Darray['partnership'], $db);
        }
     //if the query string noti-type =='tutorial', we are showing  notifications related to tutorial
      if(isset($_GET["noti-type"])&&($_GET["noti-type"]=='tutorial')){
         show_Notifications_inCategory($_GET["userid"],$category_3Darray['tutorial'], $db);
        }


        /*if(isset($_GET["itnumb"])&&($_GET["exp"]==true)){show_each_item($_GET["userid"],false, true);}
      elseif(isset($_GET["sernumb"])&&($_GET["exp"]==true)){ show_each_service($_GET["userid"],false, true);}  
       else{}
      }  */
       
        ?>
      </div>  
    </section>
   
 </main>


 <aside class= "col-xs-12 col-sm-2 pro_sbide_bar hidden-xs no-padding no-margin">
     <div class="row no-padding no-margin " id="aside-partners">
       <section class='col-xs-12 no-padding no-margin righttop bet-cat'>
         <h4 class="no-padding no-margin">Hot topics</h4> <hr id="bet-aside-div">
         <ul>
          <li><a href="#">IBM hiring 10 students from MERCY</a></li>
          <li><a href="#"> Programming contests for CS major</a></li>
          <li><a href="#">The best college in NY area</a></li>
          <li><a href="#">Summer camp for history students</a></li>
          <li><a href="#">How to create a user manual</a></li>
          <li><a href="#">Why you should go for master</a></li>
         </ul>
       </section>
     </div> 
     <div class="row no-padding no-margin ">
       <section class='col-xs-12 no-padding no-margin righttop bet-cat'>
         <h4 class="no-padding no-margin">Events</h4> <hr id="bet-aside-div">
         <ul>
          <li><a href="#">College inter football game</a></li>
          <li><a href="#">iBM tour for Mercy students</a></li>
          <li><a href="#">NSA comming to Mercy</a></li>
          <li><a href="#">Voluntay date</a></li>
          <li><a href="#">Midtern review</a></li>
          <li><a href="#">Graduation 2015 in USA</a></li>
          <li><a href="#">Africa union meeting on.. </a></li>
          <li><a href="#">marting luther king date at...</a></li>
          <li><a href="#">let make it happen..</a></li>
         </ul>
       </section>
     </div> 
 </aside>

  
  </div>
</div>

<?php

create_footer();

?>