<?php
  
 require_once('User.class.php');
 //require_once ('database.class.php');

 class UserAuthentication {
       
       public $user;

    //default constructor will create a user object based on the $_get userid
    function __construct($userid = false) {
      if(isset($userid)&&($userid !==false)){ $this->user =  $this->get_user_profileObject($userid);}
    }
    
     //Log user in the database, checking email and password match a row in the user table
     //If it is successful, we then set the session variables
     //and store the user object within it.
   //we use select_user() from the database.class.php file, its prototype is:
   //array function select_user($table,  $where="", $columns=false)

     public function login_user($email, $password){
         $db = new Database();
         $con = $db->conect_db();
         $hashedPassword = sha1($password);
         $query = ("SELECT * FROM user WHERE email = '$email' AND password = '$hashedPassword' ");

       //the following code should return a multidimentionel array, where keys are column names and values are value
       $result = mysqli_query($con, $query);
       $result_as_array = mysqli_fetch_assoc($result);

       if(!$result){
             die(mysqli_error($con));
         // throw new Exception("We could not log you in, make sure you type your email and password correctly");         
          }

        //when the $mysql_num_rows($result) return a value more that 1, that means we have duplicate email and(or) password

          if(mysqli_num_rows($result) > 1){
             throw new Exception("duplicate email or password in the database"); 
            }

         if(mysqli_num_rows($result) == 1){
             $user = new User($result_as_array);
             $_SESSION["valid_user"] = serialize($user);

             $_SESSION['userid'] = $user->userid;
             //give unique value to session
             //session_name($user->userid);
             $_SESSION["username"] =$user->username;
             $_SESSION["title "] =$user->title;
             $_SESSION["fname"] = $user->fname;
             $_SESSION["lname"] = $user->lname;
             $_SESSION["email"] =$user->email;
             $_SESSION["phone"] = $user->phone;
             $_SESSION["sex"] = ($user->sex === 'M')? "Male" : "Female";
             $_SESSION["birthyear"] = $user->birthyear;
             $_SESSION["college"] =$user->college;
             $_SESSION["about"] = stripslashes($user->about);
             $_SESSION["join_date"] =$user->join_date;
             $_SESSION["major"] =$user->major;
             $_SESSION['profilepic']=stripslashes($user->profilepic);
             $_SESSION['worktitle']=stripslashes($user->worktitle);
             $_SESSION['internshiptitle']=stripslashes($user->internshiptitle);
             $_SESSION["login_time"] = time();
             $_SESSION["logged_in"] = 1;

             $for_online =array("online"=>"0");
            $db->update($for_online, "user","where userid =".$user->userid);
            return true;

          }else{
           throw new Exception("Please enter a correct email and password, if you dont have an account, <a href=\"../index.php\">please signup</a>");
           echo "</br>";
          }  #login is done, next time revise the rest, and delete this comment
        }

        public function get_user_profileObject($userid){

         $db = new Database();
         $con = $db->conect_db();
         $query = ("SELECT * FROM user WHERE userid = '$userid'");

         //the following code should return a multidimentionel array, where keys are column names and values are value
         $result = mysqli_query($con, $query);
         $result_as_array = mysqli_fetch_assoc($result);

          if(!$result){
             die(mysqli_error($con));
           // throw new Exception("We could not log you in, make sure you type your email and password correctly");         
          }

         //when the $mysql_num_rows($result) return a value more that 1, that means we have duplicate email and(or) password

          if(mysqli_num_rows($result) > 1){
             throw new Exception("duplicate email or password in the database"); 
            }
         if(mysqli_num_rows($result) == 1){
           $user = new User($result_as_array);
           return $user;
          }else{
            throw new Exception("there is no user with this id");
            echo "</br>";
          }  #login is done, next time revise the rest, and delete this comment
        }
        

        //set the list of all session variable a particular user need
       public function list_sessionVariable(){
         $db = new Database();

         //getting the elements of the table 'class'. select() method return an associative array
         //getting the elements of the table 'class'. select method return an associative array
         //select($table,  $where="", $columns=false)
         $array_class = $db->select("class",  'where userid ='.$_SESSION['userid'], false);
         //getting the list of a user's partners
         $array_partner = $db->select("userpartner",  'where userid ='.$_SESSION['userid'], "partnerid");
          //veryfy if $array class is not empty
         if(isset($array_class) && !empty($array_class)){
            $_SESSION["cname"] = array();
            $_SESSION["areyougoodat"] = array();
             /* fetch associative array */
             //if we have a single row
           if (($array_class !==false)&&(array_key_exists("cname", $array_class))) {
              for ($i=0; $i < count($array_class["cname"]); $i++) { 
                $_SESSION["cname"][$i] = $array_class["cname"] ;
                $_SESSION["areyougoodat"][$i] = $array_class["areyougoodat"] ;
              }
            }else{ //we have multiple rows
              for ($i=0; $i < sizeof($array_class); $i++) { 
                $_SESSION["cname"][$i] = $array_class[$i]["cname"] ;
                $_SESSION["areyougoodat"][$i] = $array_class[$i]["areyougoodat"] ;
               }
            }

              if(isset($array_partner) && !empty($array_partner)){ //numbeer od partner
                $_SESSION["numb_0f_partner"] = count($array_partner);
              }
             return true;
            }

            return false;
        }

        //the collection of class and how good student is in that class
        //$return value is a two dimension array if student has only one class
        //$return value is 3 dimensional array if student has mulptiple classes
        //return false for invalid userid
       public function list_sutdentClassPerformance($userid){
         $db = new Database();
         $list_offlineVariable= array();

         //getting the elements of the table 'class'. select() method return an associative array
         //getting the elements of the table 'class'. select method return an associative array
         //select($table,  $where="", $columns=false)
         $array_class = $db->select("class",  'where userid ='.$userid, false);
          //veryfy if $array class is not empty
         if(isset($array_class) && !empty($array_class)){
            $cname= array(); //array for subject name
            $areyougoodat = array(); //array to show how good a student is, in that subject

             /* fetch associative array */
             //if we have a single row
           if (array_key_exists("cname", $array_class)) {
              for ($i=0; $i < count($array_class["cname"]); $i++) { 
                $cname["cname"] = $array_class["cname"] ;
                $areyougoodat["areyougoodat"] = $array_class["areyougoodat"] ;
              }
            }else{ //we have multiple rows
              for ($i=0; $i < sizeof($array_class); $i++) { 
                $cname["cname"][$i] = $array_class[$i]["cname"] ;
                $areyougoodat["areyougoodat"][$i] = $array_class[$i]["areyougoodat"] ;
               }
            }
             $list_offlineVariable[0] =$cname;
             $list_offlineVariable[1] =$areyougoodat;
             return $list_offlineVariable;
            }
            return false;
        }


        //figure out if user is currently online
       public function is_user_online($userid){

           if((isset($_SESSION["valid_user"]) && !empty($_SESSION["valid_user"]))||
             ($this->user->online === '0')){
             return true;
            }
            return false;
        }

        //show the particular user first name and last name and wether hes online or not
       public function do_header($userid){
         //echo  "<div class=\"row aaa\">";
         if($this->is_right_user($userid) ===true){
           //if((is_user_online($userid) ===true)&&($user->online === '0')){
           //echo "<div class=\"col-xs-10 re\">".
           echo "<h3  id=\"user_name\" class = \"col-xs-10 col-md-10 re\">".$_SESSION["fname"]."   ".$_SESSION["lname"]."</h3>";
           echo "<section  class = \"col-xs-2 col-md-1 online_Status no-margin no-padding\">";
                // if ($UserAuthentication->is_user_online($_GET["userid"])) {
            echo "<h1 class = \"no-margin no-padding\">Online</h1>";
            // echo "<div class=\"row\"><h1 class = \"col-xs-12\">Online</h1></div>";
         }else{
          // $user = $this->get_user_profileObject($userid);
           echo  "<h3  id=\"user_name\" class = \"col-xs-10 col-md-10\">".$this->user->fname."   ".$this->user->lname."</h3>";
           echo "<section  class =\"col-xs-2 col-md-1 online_Status no-margin no-padding\">";
           if($this->user->online !== '1'){
            echo "<h3 class = \"no-margin no-padding\">Online</h3>";
          }else{
           echo "<h3 class = \"no-margin no-padding\"><h1>offline</h3>";
          }
         }
        echo "</section>";
         //echo  "<div class=\"row\">".
          echo "<h4  class = \"col-xs-12 college-header text-muted re\">".$_SESSION["college"]."</h4>";
        // "</div>";
        

           return false;
        }


//summary of a particular user
     public function do_summary($userid){
      if($this->is_right_user($userid) ===true){
       echo "<div class=\"col-xs-12 jj no-padding no-margin\">";
         $username =(($_SESSION["username"] !='')&&($_SESSION["username"] !='null'))? $_SESSION["username"]: 'unknown';
          $major =(($_SESSION["major"] !='')&&($_SESSION["major"] !='null'))? $_SESSION["major"]: 'no major';          

         echo "<div class=\"row no-padding no-margin\">".
               "<div class=\"col-xs-12 col-md-6 re   no-padding no-margin\">".
                 "<div class=\"row no-padding no-margin\">".
                   "<div class=\"col-xs-12 col-md-10 no-padding no-margin\"><h4>Personal</h4><hr id=\"sub-hdr-line\"></div>".
                 "</div>". 
                 "<div class=\"row re no-padding no-margin\">".
                   "<div class=\"col-xs-4  fu no-padding no-margin\"><h5>Full name: </h5></div>".
                   "<div class=\"col-xs-8 fa no-padding no-margin\"><p>".$_SESSION["fname"]." ".$_SESSION["lname"]."</p></div>".
                 "</div>".
                 "<div class=\"row no-padding no-margin\">".
                   "<div class=\"col-xs-4 no-padding no-margin\"><h5>username: </h5></div>".
                   "<div class=\"col-xs-8 no-padding no-margin\"><p>".$username."</p></div>".
                 "</div>".
                 "<div class=\"row no-padding no-margin\">".
                   "<div class=\"col-xs-4 no-padding no-margin\"><h5>Gender: </h6></div>".
                   "<div class=\"col-xs-8 no-padding no-margin\"><p>".$_SESSION["sex"]."</p></div>".
                 "</div>".
                 "<div class=\"row no-padding no-margin\">".
                   "<div class=\"col-xs-4 no-padding no-margin\"><h5>Major: </h5></div>".
                   "<div class=\"col-xs-8 no-padding no-margin\"><p>".$major."</p></div>".
                 "</div>".
                 "<div class=\"row no-padding no-margin\">".
                   "<div class=\"col-xs-4 no-padding no-margin\"><h5>Title:</h5></div>".
                   "<div class=\"col-xs-8 no-padding no-margin\"><p>".$_SESSION["title "]."</p></div>".
                 "</div>".
                 "<div class=\"row no-padding no-margin\">".
                   "<div class=\"col-xs-4 no-padding no-margin\"><h5>Born in:</h5></div>".
                   "<div class=\"col-xs-8 no-padding no-margin\"><p>".$_SESSION["birthyear"]."</p></div>".
                 "</div>".
                 //"</div>".
               "</div>";
           

          echo "<div class=\"col-xs-12 re col-md-6 no-padding no-margin\"><div class=\"row no-padding no-margin\">".
                 "<div class=\"col-xs-12 col-md-10 no-padding no-margin\"><h4>Performance/Strong in</h4><hr id=\"sub-hdr-line\"></div></div>";
           
           $count_performance = 0; //number of performance initially set to 0.
           if($this->list_sessionVariable()) {
             // echo "<td class=\"td-right\"><h5>Perforance</h5>";
             for ($i=0; ($i <sizeof($_SESSION["cname"]))&&($i <sizeof($_SESSION["areyougoodat"])) ; $i++) { 
                 echo "<div class=\"row no-padding no-margin\">".
                 "<div class=\"col-xs-4 no-padding no-margin\"><h5>".$_SESSION["areyougoodat"][$i]." at: </h5></div>".
                 "<div class=\"col-xs-8 no-padding no-margin\"><p>".$_SESSION["cname"][$i]."</p></div>".
                "</div>";
                $count_performance++;
                }

             // if number of performance =1, we want to add 2 "+ Add a performance" buttons,
             //because the maximum number of performance is 3.
             if ($count_performance ===1) {
               echo "<div class=\"row no-padding no-margin\">".
                  "<div class=\"col-xs-12 \"><button type=\"button\" class=\"btn btn-link no-padding no-margin\"><span class=\"glyphicon glyphicon-plus\"> Add a performance</span></button></div>".
                  "<div class=\"col-xs-12 \"><button type=\"button\" class=\"btn btn-link no-padding no-margin\"><span class=\"glyphicon glyphicon-plus\"> Add a performance</span></button></div>".
                "</div>";
             }
             //if number of performance =2, we want to add one more "+ Add a performance"  buttons,
             //because the maximum number of performance is 3.
             if ($count_performance ===2) {
               echo "<div class=\"row no-padding no-margin\">".
                  "<div class=\"col-xs-12 \"><button type=\"button\" class=\"btn btn-link no-padding no-margin\"><span class=\"glyphicon glyphicon-plus\"> Add a performance</span></button></div>".
                "</div>";
             }
          }else{
            echo "<div class=\"row no-padding no-margin\">".
                  "<div class=\"col-xs-12 \"><p class=\"text-muted text-center\"> No performance yet!</p></div>".
                  "<div class=\"col-xs-12\"><button type=\"button\" class=\"btn btn-link no-padding no-margin\"><span class=\"glyphicon glyphicon-plus\"> Add a performance</span></button></div>".
                  "<div class=\"col-xs-12\"><button type=\"button\" class=\"btn btn-link no-padding no-margin\"><span class=\"glyphicon glyphicon-plus\"> Add a performance</span></button></div>".
                  "<div class=\"col-xs-12 \"><button type=\"button\" class=\"btn btn-link no-padding no-margin\"><span class=\"glyphicon glyphicon-plus\"> Add a performance</span></button></div>".
                "</div>";
          }
          echo "</div></div></div>";  

          

            /*this will make sure the column is reset when using a bigger screen(md)*/
          echo "<div class=\"clearfix visible-md-block\"></div>";
               
          $phone =(($_SESSION["phone"] !='')&&($_SESSION["phone"] !='null'))? $_SESSION["phone"]: 'no number';
          echo "<div class=\"col-xs-12 re col-md-6 td-right   no-padding no-margin\"><div class=\"row no-padding no-margin\">".
                 "<div class=\"col-xs-12 col-md-10 no-padding no-margin\"><h4>Contact</h4><hr id=\"sub-hdr-line\"></div></div>".
                "<div class=\"row no-padding no-margin\">".
                 "<div class=\"col-xs-4 no-padding no-margin\"><h5>Phone: </h5></div>".
                 "<div class=\"col-xs-8 no-padding no-margin\"><p>".$phone."</p></div>".
                "</div>".
                "<div class=\"row no-padding no-margin\">".
                 "<div class=\"col-xs-4 no-padding no-margin\"><h5>Email: </h5></div>".
                 "<div class=\"col-xs-8 no-padding no-margin\"><p><a href=\"mailto=\"#\"\">".$_SESSION["email"]."</a><p></div>".
                "</div>".
             "</div>";
            
         echo "<div class=\"col-xs-12 re col-md-6 td-right   no-padding no-margin\">
                <div class=\"row no-padding no-margin\">".
                   "<div class=\"col-xs-12 col-md-10 no-padding no-margin\">
                     <h4>Work as</h4><hr id=\"sub-hdr-line\">
                   </div>
                </div>";
                
           if(($_SESSION["worktitle"] != "")&&($_SESSION["worktitle"] != 'null')&&
              ($_SESSION["worktitle"] != "Null")&&($_SESSION["worktitle"] !== NULL)){
             echo "<div class=\"row no-padding no-margin\">".
                   "<div class=\"col-xs-4 no-padding no-margin\"><h5>Job: </h5></div>".
                   "<div class=\"col-xs-8 no-padding no-margin\"><p>".$_SESSION["worktitle"]."</p></div>".
                 "</div>";
            }else{
             echo "<div class=\"row no-padding no-margin\">".
                   "<div class=\"col-xs-12 \"><p class=\"text-muted text-center\"> No job yet!</p></div>".
                   "<div class=\"col-xs-12 \">".
                     "<button type=\"button\" class=\"btn btn-link no-padding no-margin\">
                       <span class=\"glyphicon glyphicon-plus\"> Add a job</span>".
                     "</button>".
                   "</div>".
                 "</div>";
            }
          echo "</div>";
            


           /*this will make sure the column is reset when using a bigger screen(md)*/
          echo "<div class=\"clearfix visible-md-block\"></div>";
          
         echo "<div class=\"col-xs-12 re col-md-6 td-right  no-padding no-margin \"><div class=\"row no-padding no-margin\">".
                 "<div class=\"col-xs-12 col-md-10  no-padding no-margin \"><h4>Attending</h4><hr id=\"sub-hdr-line\"></div></div>".
                "<div class=\"row no-padding no-margin\">".
                 "<div class=\"col-xs-4 no-padding no-margin\"><h5>School: </h5></div>".
                 "<div class=\"col-xs-8 no-padding no-margin\"><p>".$_SESSION["college"]."</p></div>".
                "</div>".
            "</div>";

         

         echo "<div class=\"col-xs-12 re col-md-6 td-right   no-padding no-margin\">
                <div class=\"row no-padding no-margin\">".
                   "<div class=\"col-xs-12 col-md-10 no-padding no-margin\">
                     <h4>Internship</h4><hr id=\"sub-hdr-line\">
                   </div>
                </div>";

           if(($_SESSION['internshiptitle'] == '')&&($_SESSION["internshiptitle"] != 'null')&&
              ($_SESSION["internshiptitle"] !== 'NULL')&&($_SESSION["internshiptitle"] != NULL)){
             echo "<div class=\"row no-padding no-margin\">".
                   "<div class=\"col-xs-4 no-padding no-margin\"><h5>Name: </h5></div>".
                   "<div class=\"col-xs-8 no-padding no-margin\"><p>".$_SESSION["internshiptitle"]."</p></div>".
                 "</div>";
           }else{
            echo "<div class=\"row no-padding no-margin\">".
                   "<div class=\"col-xs-12 \"><p class=\"text-muted text-center\"> No internship yet!</p></div>".
                   "<div class=\"col-xs-12 \">".
                     "<button type=\"button\" class=\"btn btn-link no-padding no-margin\">
                       <span class=\"glyphicon glyphicon-plus\"> Add an internship</span>".
                     "</button>".
                   "</div>".
                "</div>";
          }
          echo "</div>";
         /*echo "<div class=\"col-xs-12 re col-md-6 td-right   no-padding no-margin\"><div class=\"row no-padding no-margin\">".
                 "<div class=\"col-xs-12  col-md-10 no-padding no-margin\"><h4>Internship</h4><hr id=\"sub-hdr-line\"></div></div>".
                "<div class=\"row no-padding no-margin\">".
                 "<div class=\"col-xs-4 no-padding no-margin\"><h5>Name:</h5></div>".
                 "<div class=\"col-xs-8 no-padding no-margin\"><p>". $_SESSION["internshiptitle"]."</p></div>".
                "</div>".
            "</div>"; 
         */
            
         echo "</div>";
        }else{
          $this->do_OfflineSummary($userid);
        }
      }

/*if((empty($_SESSION["internshiptitle"]) !==true ) || ($_SESSION["internshiptitle"] != "null") ||
              ($_SESSION["internshiptitle"] !== "Null") || ($_SESSION["internshiptitle"] !== NULL)){
           echo "<div class=\"col-xs-12 re col-md-6 td-right   no-padding no-margin\"><div class=\"row no-padding no-margin\">".
                 "<div class=\"col-xs-12 col-md-10 no-padding no-margin\"><h4>Internship</h4><hr id=\"sub-hdr-line\"></div></div>".
                "<div class=\"row no-padding no-margin\">".
                 "<div class=\"col-xs-4 no-padding no-margin\"><h5>Name: </h5></div>".
                 "<div class=\"col-xs-8 no-padding no-margin\"><p>".var_dump($_SESSION["internshiptitle"])."</p></div>".
                "</div>".
              "</div>";
          }else{
           echo "<div class=\"row no-padding no-margin\">".
                 "<div class=\"col-xs-12 \"><p class=\"text-muted text-center\"> No internship yet!</p></div>".
                 "<div class=\"col-xs-12 \">".
                   "<button type=\"button\" class=\"btn btn-link no-padding no-margin\">
                     <span class=\"glyphicon glyphicon-plus\"> Add an internship</span>".
                   "</button>".
                 "</div>".
                "</div>";
          }*/

        //summary of a particular user
   /*  public function do_summary($userid){
      if($this->is_right_user($userid) ===true){
          echo "<table class=\"table\">";
         $username =(($_SESSION["username"] !='')&&($_SESSION["username"] !='null'))? $_SESSION["username"]: 'unknown';
          $major =(($_SESSION["major"] !='')&&($_SESSION["major"] !='null'))? $_SESSION["major"]: 'no major';          

          echo "<tr><td class=\" \">".
               "<div class=\"row no-padding no-margin\">".
                 "<div class=\"col-xs-12 no-padding no-margin\"><h4>Personal</h4><hr id=\"sub-hdr-line\"></div>".
                "</div>". 
               "<div class=\"row re no-padding no-margin\">".
                 "<div class=\"col-xs-6 fu no-padding no-margin\"><h5>Full name: </h5></div>".
                 "<div class=\"col-xs-6 fa no-padding no-margin\"><p>".$_SESSION["fname"]." ".$_SESSION["lname"]."</p></div>".
                "</div>".
                "<div class=\"row no-padding no-margin\">".
                 "<div class=\"col-xs-6 no-padding no-margin\"><h5>username: </h5></div>".
                 "<div class=\"col-xs-6 no-padding no-margin\"><p>".$username."</p></div>".
                "</div>".
                "<div class=\"row no-padding no-margin\">".
                 "<div class=\"col-xs-6 no-padding no-margin\"><h5>Gender: </h6></div>".
                 "<div class=\"col-xs-6 no-padding no-margin\"><p>".$_SESSION["sex"]."</p></div>".
                "</div>".
                "<div class=\"row no-padding no-margin\">".
                 "<div class=\"col-xs-6 no-padding no-margin\"><h5>Major: </h5></div>".
                 "<div class=\"col-xs-6 no-padding no-margin\"><p>".$major."</p></div>".
                "</div>".
                "<div class=\"row no-padding no-margin\">".
                 "<div class=\"col-xs-6 no-padding no-margin\"><h5>Title:</h5></div>".
                 "<div class=\"col-xs-6 no-padding no-margin\"><p>".$_SESSION["title "]."</p></div>".
                "</div>".
                "<div class=\"row no-padding no-margin\">".
                 "<div class=\"col-xs-6 no-padding no-margin\"><h5>Born in:</h5></div>".
                 "<div class=\"col-xs-6 no-padding no-margin\"><p>".$_SESSION["birthyear"]."</p></div>".
                "</div>".
                "</td>".
                "</div>";
          echo "<td class=\"td-right  \"><div class=\"row no-padding no-margin\">".
                 "<div class=\"col-xs-12 no-padding no-margin\"><h4>Performance/Strong in</h4><hr id=\"sub-hdr-line\"></div></div>";
          if($this->list_sessionVariable()) {
             // echo "<td class=\"td-right\"><h5>Perforance</h5>";
             for ($i=0; ($i <sizeof($_SESSION["cname"]))&&($i <sizeof($_SESSION["areyougoodat"])) ; $i++) { 
                 echo "<div class=\"row no-padding no-margin\">".
                 "<div class=\"col-xs-6 no-padding no-margin\"><h5>".$_SESSION["areyougoodat"][$i]." at: </h5></div>".
                 "<div class=\"col-xs-6 no-padding no-margin\"><p>".$_SESSION["cname"][$i]."</p></div>".
                "</div>";
                }
          }
          echo "</td></tr>";      

          echo "<tr><td class=\"  \"><div class=\"row no-padding no-margin\">".
                 "<div class=\"col-xs-12 no-padding no-margin\"><h4>Attending</h4><hr id=\"sub-hdr-line\"></div></div>".
                "<div class=\"row no-padding no-margin\">".
                 "<div class=\"col-xs-6 no-padding no-margin\"><h5>School: </h5></div>".
                 "<div class=\"col-xs-6 no-padding no-margin\"><p>".$_SESSION["college"]."</p></div>".
                "</div>".
               "</td>";
               ;
          $phone =(($_SESSION["phone"] !='')&&($_SESSION["phone"] !='null'))? $_SESSION["phone"]: 'no number';
          echo "<td class=\"td-right  \"><div class=\"row no-padding no-margin\">".
                 "<div class=\"col-xs-12 no-padding no-margin\"><h4>Contact</h4><hr id=\"sub-hdr-line\"></div></div>".
                "<div class=\"row no-padding no-margin\">".
                 "<div class=\"col-xs-6 no-padding no-margin\"><h5>Phone: </h5></div>".
                 "<div class=\"col-xs-6 no-padding no-margin\"><p>".$phone."</p></div>".
                "</div>".
                "<div class=\"row no-padding no-margin\">".
                 "<div class=\"col-xs-6 no-padding no-margin\"><h5>Email: </h5></div>".
                 "<div class=\"col-xs-6 no-padding no-margin\"><p>".$_SESSION["email"]."</p></div>".
                "</div>".
                "</td></tr>";

           echo "<tr><td class=\" \"><div class=\"row no-padding no-margin\">".
                 "<div class=\"col-xs-12 no-padding no-margin\"><h4>Work as</h4><hr id=\"sub-hdr-line\"></div></div>".
                "<div class=\"row no-padding no-margin\">".
                 "<div class=\"col-xs-6 no-padding no-margin\"><h5>Job: </h5></div>".
                 "<div class=\"col-xs-6 no-padding no-margin\"><p>".$_SESSION["title "]."</p></div>".
                "</div>".
                "</td>";
          echo "<td class=\"td-right  \"><div class=\"row no-padding no-margin\">".
                 "<div class=\"col-xs-12 no-padding no-margin\"><h4>Internship</h4><hr id=\"sub-hdr-line\"></div></div>".
                "<div class=\"row no-padding no-margin\">".
                 "<div class=\"col-xs-6 no-padding no-margin\"><h5>Name:</h5></div>".
                 "<div class=\"col-xs-6 no-padding no-margin\"><p>No internship yet!</p></div>".
                "</div>".
                "</td></tr>"; 

          /* $profile_join_date = new DateTime($_SESSION["join_date"]);
           echo "<tr><td class=\" \"><div class=\"row no-padding no-margin\">".
                 "<div class=\"col-xs-12 no-padding no-margin\"><h4>Join</h4><hr id=\"sub-hdr-line\"></div></div>".
                "<div class=\"row no-padding no-margin\">".
                 "<div class=\"col-xs-6 no-padding no-margin\"><h5>Member since:</h5></div>".
                 "<div class=\"col-xs-6 no-padding no-margin\"><p>".$profile_join_date->format('Y')."</p></div>".
                "</div>".
                "</td></tr>";
*/
            


            
      /*   echo "</table>";
        }else{
          $this->do_OfflineSummary($userid);
        }
      }*/

         //summary of a particular offline user
    public function do_OfflineSummary($userid){
       $user = $this->user;

       //first do user profile
       //do_profilePic($userid,$user->profilepic);
       $username =(($user->username!='')&&($user->username!='null'))? $user->username: 'unknown';
          $major =(($user->major !='')&&($user->major!='null'))? $user->major: 'no major'; 
      echo "<table class=\"table\">";
       /* echo"<tr><th id=\"user-perso\">Personal</th><th id=\"email\">Email</th><th id=\"phone\">Phone</th>".
             "<th id=\"addr\">Address</th></tr>*/
        echo "<tr><td class=\" \"><h4>Personal</h4><hr id=\"sub-hdr-line\">".
                "<h5>Full name: </h5>"."<p>".$user->fname." ".$user->lname."</p>".
                "<h5>username: </h5>"."<p>".$username."</p>".
                "<h5>Gender: </h5>"."<p>".$user->sex."</p>".
                "<h5>Major: </h5>"."<p>".$major."</p>".
                "<h5>Title:</h5>"."<p>".$user->title."</p>".
                "<h5>Born in:</h5>"."<p>".$user->birthyear."</p>".
                "</td>";
        echo "<td class=\"td-right  \"><h4>Performance/Strong in</h4><hr id=\"sub-hdr-line\">";
        if ($this->list_sutdentClassPerformance($userid) ===false) {
          echo "</br></br>";
          echo "<p> Not applicable!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>";
        }else{
          $offline_user_array =$this->list_sutdentClassPerformance($userid);
          for ($i=0; ($i <sizeof($offline_user_array[0]["cname"]))&&
              ($i <sizeof($offline_user_array[1]["areyougoodat"])) ; $i++) { 
            echo "<h5>".$offline_user_array[1]["areyougoodat"][$i]." at: </h5>"."<p>".
             $offline_user_array[0]["cname"][$i]."</p>";
          }
        }
        echo "</td></tr>";      
        echo "<tr><td class=\" \"><h4>Attending</h4><hr id=\"sub-hdr-line\">".
                "<h5>School: </h5>"."<p>".$user->college."</p>".
               "</td>";
        echo "<td class=\"td-right  \"><h4>Contact</h4><hr id=\"sub-hdr-line\">";
         $phone =(($user->phone !='')&&($user->phone !='null'))? $user->phone: 'no number';

            echo    "<h5>Phone: </h5>"."<p>".$phone."</p>".
                "<h5>Email: </h5>"."<p>".$user->email."</p>".
                "</td></tr>";
        echo "<tr><td class=\" \"><h4>Work as</h4><hr id=\"sub-hdr-line\">".
                "<h5>Job: </h5>"."<p>".$user->title."</p>".
                "</td>";
        echo "<td class=\"td-right  \"><h4>Internship</h4><hr id=\"sub-hdr-line\">".
                "<h5>Name:</h5>"."<p>No internship yet!</p>".
                "</td></tr>"; 
           $profile_join_date = new DateTime($user->join_date);
        echo "<tr><td class=\" \"><h4>Join</h4><hr id=\"sub-hdr-line\">".
                "<h5>Member since:</h5>"."<p>".$profile_join_date->format('Y').
                "</td></tr>";
         echo "</table>";

        }


        //getting the list of user partner
        public function get_userPartner($db, $userid){
         //we first get the partnerid of a particular user from userpartner table. here is the query:
         // select fname,lname, partnerid from user, userpartner where user.userid = userpartner.userid and userpartner.userid = 3;
          $array_userpartner= $db->select_user( "user, userpartner", 'where user.userid = userpartner.userid and userpartner.userid ='.$userid, "partnerid");
          if (!empty($array_userpartner)) {
           if (($array_userpartner !=false)&&(array_key_exists("partnerid", $array_userpartner))) {//we have only one partner
             $where ='where userid = '.$array_userpartner['partnerid']; 
            }else{
              //getting all the the where condition 
              //i.e: select fname , lname from user where userid = 1 or userid = 2 or userid =4;
              $where ='where userid = '.$array_userpartner[0]['partnerid']; 
             for ($i=1; $i < sizeof($array_userpartner); $i++) { 
               $where .= ' or userid ='.$array_userpartner[$i]['partnerid'];
              }
            }   
              //we then query the user table for the fname and lname of his partners.
              $array_partner_name = $db->select_user( "user", $where, 'fname, lname, userid, college');
              //return a 2 dimentional array where the outer array key is indexed and
              //the inner array is an associative array where key are columns name and value are the value of that column
              return $array_partner_name; 
          }

         return false; //return false if it failed or no partner.
        } 


        //format
        public function get_FormatUserPartner($userid, $partner_ar){
        // $partner_ar = $this->get_userPartner($userid);
         if (($partner_ar !==false) && (array_key_exists("fname", $partner_ar))) {//we have only one partner
           echo "<h5>1 Partner"."</h5>";
           echo "<br/>";
           echo "<table>";
           echo "<td class=\" \"><a href=\"profile.php?".'userid='.$partner_ar["userid"]."\">".
            $partner_ar["fname"].' '.$partner_ar["lname"]."</a>"."</td>";
           echo "</tr>";
          }else{
            $count;
             if ($partner_ar !=false) { $count = count($partner_ar);  }  
             else{  $count =0;}    
           echo "<h5>".$count." Partners"."</h5>";
           echo "<br/>";
           echo "<table>";
           for ($i=0; $i < $count; $i++) { 
             
             if (($i == 0) || ($i%2 ===0)) {
                  echo "<tr>";
             }
             //for ($i=0; $i <sizeof($partner_ar[$i]) ; $i++) { 
             echo "<td class=\" \"><a href=\"profile.php?".'userid='.$partner_ar[$i]["userid"]."\">".
              $partner_ar[$i]["fname"].' '.$partner_ar[$i]["lname"]."</a>"."</td>";
              if (($i >0) && ($i%2 !==0)) {
                  echo "</tr>";
               }
            }
          }
         echo "</table>";
        } 

        //format user partner for home page
        public function showUserPartner($db,$userid,$partner_ar){
         //$partner_ar = $this->get_userPartner($db, $userid);
         if (($partner_ar !== false)&&(array_key_exists("fname", $partner_ar))) {//we have only one partner
           $UserAuthentication = new UserAuthentication($partner_ar[$i]["userid"]);
           echo "<li class=\"row no-padding no-margin \">".
                 "<section class=\"col-xs-2  no-padding no-margin \">".
                   "<a href=\"profile.php?".'userid='.$partner_ar["userid"]."\">";
                     $UserAuthentication->do_profilePic($UserAuthentication->user->profilepic, "img-circle", "60px",'40px');
             echo  "</a></section>".
             "<section class=\"col-xs-10 no-padding no-margin \">".
               "<a class=\"no-padding no-margin \" href=\"profile.php?".'userid='.$partner_ar["userid"]."\">".
                 $partner_ar["fname"].' '.$partner_ar["lname"].
               "</a>".
               "<p class=\"no-padding no-margin text-muted\">".$partner_ar["college"]."</p>".
               "</section>".
            "</li>";
          }elseif (($partner_ar == false) || (empty($partner_ar))) {
            
            echo "<li class=\"row no-padding  \">".
                   "<h5 class=\"col-xs-12 text-muted no-user-text no-margin \" > NO PARTNER YET !</h5>".
            "</li>";
          }          else{
           for ($i=0; $i < sizeof($partner_ar) ; $i++) { 
            $UserAuthentication = new UserAuthentication($partner_ar[$i]["userid"]);
             echo "<li class=\"row \">".
                 "<section class=\"col-xs-2  no-padding no-margin  \">".
                   "<a href=\"profile.php?".'userid='.$partner_ar[$i]["userid"]."\">";
                     $UserAuthentication->do_profilePic($UserAuthentication->user->profilepic, "img-circle", "",'');
             echo  "</a></section>".
             "<section class=\"col-xs-10 no-pahdding no-margin \">".
               "<a class=\"no-padding no-margin \" href=\"profile.php?".'userid='.$partner_ar[$i]["userid"]."\">".
                 $partner_ar[$i]["fname"].' '.$partner_ar[$i]["lname"].
               "</a>".
               "<p class=\"no-padding no-margin text-muted\">".$partner_ar[$i]["college"]."</p>".
               "</section>".
            "</li>";


           //  echo "<li><a href=\"profile.php?".'userid='.$partner_ar[$i]["userid"]."\">".
            // $partner_ar[$i]["fname"].' '.$partner_ar[$i]["lname"]."</a>"."</li>";
            }
          }
        } 



        //thiz will show all the users of the same school as the user
        public function showUserFromSameSchool($db,$userid,$user_SchoolName){
         $arrayUserFromSameSchool = $db->select_2dArray("user",  "where college = '".$user_SchoolName."' and userid !='".$userid."'");
         if (($arrayUserFromSameSchool !== false)) {//we have some user from the same school as the user
           for ($i=0; $i < sizeof($arrayUserFromSameSchool) ; $i++) { 
             $UserAuthentication = new UserAuthentication($arrayUserFromSameSchool[$i]["userid"]);
             echo "<li class=\"row  \">".
                 "<section class=\"col-xs-2  no-padding no-margin \">".
                   "<a href=\"profile.php?".'userid='.$arrayUserFromSameSchool[$i]["userid"]."\">";
                     $UserAuthentication->do_profilePic($UserAuthentication->user->profilepic, "img-circle", "60px",'40px');
             echo  "</a></section>".
             "<section class=\"col-xs-10 no-padding no-margin \">".
               "<a class=\"no-padding no-margin re\" href=\"profile.php?".'userid='.$arrayUserFromSameSchool[$i]["userid"]."\">".
                 $arrayUserFromSameSchool[$i]["fname"].' '.$arrayUserFromSameSchool[$i]["lname"].
               "</a>".
               "<p class=\"no-padding no-margin text-muted\">".$arrayUserFromSameSchool[$i]["college"]."</p>".
               "</section>".
             "</li>";
            }
          }else{
            echo "<li class=\"row no-padding  \">".
                   "<h5 class=\"col-xs-12 text-muted text-muted no-user-text no-padding no-margin \" >NO USER FROM ".$user_SchoolName." !</h5>".
            "</li>";
          }

        }
        
      //this function will get the about user field
      //if the right user, the one who's login, its about will be editable, otherwise
      //the about from any other user who is no the right user browsing, will be fetch 
      //from the db of a particular user abd be only readable
      function get_userAbout($userid){
       if($this->is_right_user($userid) ===true){//right user
         if(isset($_SESSION["about"]) && ($_SESSION["about"] !=="")&&
           ($_SESSION["about"] !=="null")&&($_SESSION["about"] !=="NULL")){//he already have an about about himself
             echo "<textarea placeholder=\"".$_SESSION["about"]."\" name=\"about-user-txtbox\"".
             "form=\"about-form\" rows=\"10\" id=\"about-content\"></textarea><br />";
          }else{//he does not have any
           echo "<textarea placeholder=\"what should people about you?\" name=\"about-user-txtbox\"".
           "form=\"about-form\" rows=\"10\" id=\"about-content\"></textarea><br />";
          }
        }else{
         $user = $this->user;
         if(isset($user) && ($user !==false)){//not the right user, maybe an offline one
           if(($user->about !=="null")&&($user->about !=="NULL")&&(isset($user->about))
              &&($user->about !=="")){//he has an about
             echo "<textarea placeholder=\"".$user->about."\" name=\"about-user-txtbox\"".
              "form=\"about-form\" rows=\"10\" id=\"about-content\"></textarea><br />";
            }else{//he doesnt
             echo "<textarea placeholder=\"This user has not written anything about himself...\" name=\"about-user-txtbox\"".
             "form=\"about-form\" rows=\"10\" id=\"about-content\"></textarea><br />";
            }
          }
          return true;
        }
        return false;
      }

       //this function will save user about info in the userabout table in the database
       //remainder about the insert prototype from the database.class.php file
       //inserid insert($array_data, $table, $low_priority = "", $ignore = "", $limit_numb = "")
      /* function save_About($about, $userid){
         if (isset($about) && isset($userid)) {
            $db = new Database();
            //$con = $db->conect_db(); 
           //check to see if user already has an about text in the DB
           $is_user =$db->select_user('userabout', 'where userid='.$userid, 'userid');
           //if yes, we just chnage the old one to a new one. 
           //we want to keep this table as 1:1 (1 user may have at most 1 about)
           if ($is_user == $userid) {
             //remainder about update() prototype in our Database.class.php file
              //true function update($array_data, $table,  $where= "",  $low_priority = "", $ignore = "", $limit_numb = "")
             $db->update($about, 'userabout', 'where userid ='.$userid);
             return true;
            }else{//this is the first time this user has an about text. therefore we save it.
              $db->insert($about, 'userabout');
              return true;
            }
          }
          return false;
        }*/ 

        //this function will save user about info in the userabout table in the database
       //remainder about the insert prototype from the database.class.php file
       //inserid insert($array_data, $table, $low_priority = "", $ignore = "", $limit_numb = "")
       function save_user_About($about_array, $userid){
         if (isset($about_array) && isset($userid)) {
              $db = new Database();

            //we want to keep this table as 1:1 (1 user may have at most 1 about)
            if((!empty($_SESSION['about'])) && ($_SESSION['about'] !== null)){
              //remainder about update() prototype in our Database.class.php file
              //true function update($array_data, $table,  $where= "",  $low_priority = "", $ignore = "", $limit_numb = "")
              $db->update($about_array, 'user', 'where userid ='.$userid);
              return true;
            }else{//this is the first time this user has an about text. therefore we save it.
              $db->insert($about_array, 'user');
              return true;
            }
          }
          return false;
        }
            
           


     




     // check if user is logging in
      public function check_user_login(){
        if(isset($_SESSION['valid_user'])){
          echo "Welcome".$_SESSION['valid_user']."<br />";
          
          return true;
          }else{
             //user is not loging in
            echo create_html_header("can't log you in");
            echo 'You are not logged in.<br />';
            echo "<a href=\"views/login.php\">Login</a>";
            create_html_footer();
             exit;
            }
        }

         // check if this is the right user 
      public function is_right_user($userid){
        if(isset($_SESSION['valid_user'])&& isset($_SESSION["userid"]) && ($_SESSION["userid"] ===$userid)){
          return true;
          }else{
             return false;//not the right user
            }
        }
    


     //Log the user out and Destroy the session variables.
     public function logout_user($logout_msg="logout successful", $failed_msg="failed to log you out!") {
      //var_dump($_SERVER);

       //conducting a test, to see if the user was login from the first place
       $db = new Database();
       //if($this->is_right_user($_GET["userid"]) ===true){
        if (isset($_SESSION['valid_user'])) {
         $old_user= $_SESSION['valid_user'];
         $for_online =array("online"=>"1");
         $db->update($for_online, "user","where  userid = ".$_SESSION['userid']);
         unset($_SESSION['valid_user']);
         unset( $_SESSION['userid'] );
         unset( $_SESSION["username"] );
         unset( $_SESSION["title "] );
         unset( $_SESSION["fname"] );
         unset( $_SESSION["lname"] );
         unset( $_SESSION["email"] );
         unset( $_SESSION["phone"] );
         unset( $_SESSION["sex"] );
         unset( $_SESSION["birthyear"] );
         unset( $_SESSION["college"] );
         unset( $_SESSION["about"] );
         unset( $_SESSION["join_date"] );
         unset( $_SESSION["major"] );
         unset( $_SESSION["login_time"] );
         unset( $_SESSION["logged_in"] );
         unset($_SESSION["areyougoodat"]);
         unset($_SESSION["cname"]);
         unset($_SESSION["numb_0f_partner"]);
         $test_result = session_destroy();
         }
         //if a value was assign to $old_user, that means the user was logged in
         //because the session variable is set
         if(empty($old_user)===false){
             //if session_destroy succeed, then the user is logged out
             if($test_result){ 
                 echo $logout_msg."<br />";
                 
                }else{
                    //if session_destroy was not succesfull for some how
                    echo $failed_msg."<br .>";
                }
            }else{
              //if the user get on the page somehow without being log in
             // echo 'You were not logged in, and so have not been logged out'.'<br />';
              //echo "<a href=\"views/login.php\">Login</a>";
           }
         //}
        }
 
     //Check to see if a username exists.
     //This is called during registration to make sure all user names are unique.
     public function check_Useremail_Exists($email) {
              
         //open database connection
         $db = new Database();
         $con = $db->conect_db();

         $query = "SELECT email FROM user where email= '$email'";
         $result = mysqli_query($con, $query);
         if(mysqli_num_rows($result) == 0){
              return false;
            }else{
               return true;
            }
        }

    /**this function will put user profile pic in the right place,
    if the user does have any profile pic, the default profile pic will be shosen
    @width is the width of the picture
    @height is the height of the picture
    $image_circle is used to specify if the image will be a circle or not*/
    public function do_profilePic($path, $image_circle="", $width="", $height=""){
      if (($path!=null)||($path!=NULL)||(empty($path)!=true)||($path!='')){
         /*echo "<div class=\"col-xs-12 no-padding no-margin img-responhsive re".
              $image_circle."\"
         style=\"background: url('".$path."') no-repeat center center;
             width=".$width." height=".$height."\">";*/
         echo "<img src= \"".$path."\" alt=\"profile pic\" class=\"img-responsive ".
                       $image_circle."\" width=\"".$width."\" height=\"".$height."\">";
         //echo "</div>";
       
          //$UserAuthentication->do_profilePic($UserAuthentication->user->profilepic,"img-cirjcle", "","");
      }else{  
        //echo "<div id=\"pro-userpict\">";
        echo "<img src= \"../defaultporfilepic/defaultProfileImage.png\" alt=\"default pic\"  
        class=\"img-responsive ".$image_circle."\"  width=\"".$width."\" height=\"".$height."\">";
       // echo "</div>";
      }
    }

     //get a user
     //returns a User object. Takes the users id as an input
     // select_user($table,  $where="", $columns=false)
     public function get_user($email){
        //open database connection
         $db = new Database();
         $result = $db->select_user("user",  "where email = '"."$email"."'");
         return new User($result);
        }
     //get a user by id
     //returns a User object. Takes the users id as an input
     // select_user($table,  $where="", $columns=false)
     public function get_userById($id){
        //open database connection
         $db = new Database();
         $result = $db->select_user("user",  "where email = '"."$id"."'", "fname,lname");
         return new User($result);
        }


    }
?>
