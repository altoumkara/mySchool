<?php
 require_once('../classes/Database.class.php');
 require_once('../classes/User.class.php');
 require_once('../classes/UserAuthentication.class.php');
  include_once('../classes/Post.class.php');

 //@return a list of items
 function show_items_list($userid, $db){
   /* retrieve item's names from table item where category is electonics */
   //select itname from items as i, categories as c where i.catid=c.catid
   // and c.catname= 'ELECTRONICS';
   $array_items = $db->select("items",'where catid !=4');
   ?>
      <div class="row visible-xs-block">
        <br> <ul class=' col-xs-12 no-padding no-margin list-inline text-center'>
           <li class='no-padding no-margin'><a href=<?php echo $_SERVER["PHP_SELF"].'?userid='.$_GET["userid"].'&action=sale'; ?>>Sales</a> | </li>
           <li class='no-padding no-margin '><a href=<?php echo $_SERVER["PHP_SELF"].'?userid='.$_GET["userid"].'&action=services'; ?>>Services</a> | </li>
           <li class='no-padding no-margin'><a href=<?php echo $_SERVER["PHP_SELF"].'?userid='.$_GET["userid"].'&action=tutorial'; ?>>Tutorial partner</a> | </li>
           <li class='no-padding no-margin'><a href=<?php echo $_SERVER["PHP_SELF"].'?userid='.$_GET["userid"].'&action=internship'; ?>>Internship</a> | </li>
           <li class='no-padding no-margin '><a href=<?php echo $_SERVER["PHP_SELF"].'?userid='.$_GET["userid"].'&action=others'; ?>>Others</a></li>
         </ul>
      </div>
     
   <?php
   echo "<div class=\"row\">".
         "<div class=\"col-xs-12 no-pjadding no-makrgin\">".
           "<form>&nbsp;<input type=\"button\" value=\"expand all\" onclick=\"window.location.href='".
             $_SERVER["PHP_SELF"].'?userid='.$userid.'&expSa=true'."'\">".
           "</form>".
         "</div>".
        "</div>";
   
   if (array_key_exists("itnumb", $array_items)) {//we have only one row

     $user= $db->select("user",'where userid ='.$array_items["userid"], "college");
     
     echo "<ul class=\"it-list\">".
           "<li class=\" no-padding no-margin  \">".
             "<p class=\"no-padding no-margin \">".
              "<span class=\"text-muted span-in-list no-padding no-margin \" >".
                 date("F/j",strtotime($array_items["itcreatedate"])).
              "</span>".
              " <span class=\"text-muted bg-info it-condition no-padding no-margin\" >".
                 $array_items["itquality"].
              "</span> ".
              "<a href=\"".$_SERVER["PHP_SELF"].'?userid='.$userid.'&itnumb='.
                 $array_items["itnumb"]."\">".
                 $array_items["itKind"].
              "</a>".   
              " - ".$user[0][0].
              " <span class=\"text-muted bg-primary no-margin span-in-list\" > $".
               $array_items["itprice"].
              " </span>". 
             "</p>".
           "</li>".
          "</ul>";
    }else{//we have one than 0ne row
     for ($i=0; $i <count($array_items); $i++) { 
       $user= $db->select("user",'where userid ='.$array_items[$i]["userid"], "college");

       echo "<ul class=\"it-list\">".
           "<li class=\" no-padding no-margin  \">".
             "<p class=\"no-padding no-margin \">".
              "<span class=\"text-muted span-in-list no-padding no-margin \" >".
                 date("F/j",strtotime($array_items[$i]["itcreatedate"])).
              "</span>".
              " <span class=\"text-muted bg-info it-condition no-padding no-margin\" >".
                 $array_items[$i]["itquality"].
              "</span> ".
              "<a href=\"".$_SERVER["PHP_SELF"].'?userid='.$userid.'&itnumb='.
                 $array_items[$i]["itnumb"]."\">".
                 $array_items[$i]["itKind"].
              "</a>".   
              " - ".$user[0][0].
              " <span class=\"text-muted bg-primary no-margin span-in-list\" > $".
               $array_items[$i]["itprice"].
              " </span>". 
             "</p>".
           "</li>".
          "</ul>";
      }
    }
  }





/*************************************************************************/
 //@return a list of items
 //if $itnumb !==true, that means we want to view items individually with next, prev
 //if $expand !==false, we want to expand everything.
 function show_each_item($userid,$itnumb=false, $expand=false){
   $db = new Database();
   $con = $db->conect_db();
   $post = new Post();
     /* retrieve item's names from table item where category is electonics */
     //select itname from items as i, categories as c where i.catid=c.catid
    // and c.catname= 'ELECTRONICS';
    $count = 0;
    $total_items = $db->select_2dArray("items",'where catid !=4');
    $array_items = $total_items;
    if ($expand===true) {
     echo "<form>&nbsp;&nbsp;<input type=\"button\" value=\"show list\" onclick=\"window.location.href='".$_SERVER["PHP_SELF"].
     '?userid='.$userid.'&action=sale'."'\"></form></br>";
       for ($i=0; $i <count($array_items); $i++){ 
          $numb_post=$i+1;
          $array_category =  $db->select("categories",'where catid ='.$array_items[$i]["catid"], "catname");
          $user= $db->select("user",'where userid ='.$array_items[$i]["userid"], "userid, fname, lname, college");
         $post->display_PostRequested($db, $user[0][0] ,$user[0][1],
                               $user[0][2], $user[0][3],$array_items[0],false); 
echo "</br>";
echo "</br>";

        }
    }else{
      $count =$count=count($array_items); 

     $array_items = $db->select("items",'where itnumb ='.$itnumb);
     $array_category =  $db->select("categories",'where catid ='.$array_items[0]["catid"], "catname");
     $user= $db->select("user",'where userid ='.$array_items[0]["userid"], "userid, fname, lname, college");
     
     $post->display_PostRequested($db, $user[0][0] ,$user[0][1],
                               $user[0][2], $user[0][3],$array_items[0],false); 

     $prev=1;
     if(($array_items[0]["itnumb"]-1)!=0){
      $prev =--$array_items[0]["itnumb"];
      if(($prev==4)){$prev--;}
     }
     $next=$itnumb;
     if(($next+1) <= $count){//count the # of items so we stop the next counter going forward
       ++$next;
       if(($next==4)){$next++;}
      }
echo "</br>";
     echo "<form>&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"button\" value=\"prev\" onclick=\"window.location.href='".$_SERVER["PHP_SELF"].
     '?userid='.$userid.'&itnumb='.$prev."'\">".
     "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"button\" value=\"expand all\" onclick=\"window.location.href='".$_SERVER["PHP_SELF"].
        '?userid='.$userid.'&expSa=true'."'\">";

     echo "&nbsp;&nbsp;&nbsp;&nbsp;                                                ".
     "<input type=\"button\" value=\"next\" onclick=\"window.location.href='".$_SERVER["PHP_SELF"].
     '?userid='.$userid.'&itnumb='.$next."'\">".
     "</form>";
    }
  }

 



/*************************************************************************/
  //@return a list of services
 function show_service_list($userid, $db){
   /* retrieve item's names from table item where category is electonics */
   //select itname from items as i, categories as c where i.catid=c.catid
   // and c.catname= 'ELECTRONICS';
   $array_items = $db->select_2dArray("items",'where catid =4');

   ?>
      <div class="row visible-xs-block">
        <br> <ul class=' col-xs-12 no-padding no-margin list-inline text-center'>
           <li class='no-padding no-margin'><a href=<?php echo $_SERVER["PHP_SELF"].'?userid='.$_GET["userid"].'&action=sale'; ?>>Sales</a> | </li>
           <li class='no-padding no-margin '><a href=<?php echo $_SERVER["PHP_SELF"].'?userid='.$_GET["userid"].'&action=services'; ?>>Services</a> | </li>
           <li class='no-padding no-margin'><a href=<?php echo $_SERVER["PHP_SELF"].'?userid='.$_GET["userid"].'&action=tutorial'; ?>>Tutorial partner</a> | </li>
           <li class='no-padding no-margin'><a href=<?php echo $_SERVER["PHP_SELF"].'?userid='.$_GET["userid"].'&action=internship'; ?>>Internship</a> | </li>
           <li class='no-padding no-margin '><a href=<?php echo $_SERVER["PHP_SELF"].'?userid='.$_GET["userid"].'&action=others'; ?>>Others</a></li>
         </ul>
      </div>
     
   <?php
   echo "<div class=\"row\">".
         "<div class=\"col-xs-12 no-pjadding no-makrgin\">".
           "<form>&nbsp;<input type=\"button\" value=\"expand all\" onclick=\"window.location.href='".
             $_SERVER["PHP_SELF"].'?userid='.$userid.'&expSer=true'."'\">".
           "</form>".
         "</div>".
        "</div>";
       echo "<ul class=\"it-list\">";
   //we have one than 0ne row
     for ($i=0; $i <count($array_items); $i++) { 
       $user= $db->select("user",'where userid ='.$array_items[$i]["userid"], "college");
       
       echo "<li class=\"\">".
             "<p class=\"\">".
              "<span class=\"text-muted span-in-list  \" >".
                 date("F/j",strtotime($array_items[$i]["itcreatedate"])).
              "</span>".
              "<a href=\"".$_SERVER["PHP_SELF"].'?userid='.$userid.'&allservice=true'.
               "#".$array_items[$i]["itKind"]."\"> ".$array_items[$i]["itKind"].
              "</a>".   
              " - ".$user[0][0].
              " <span class=\"text-muted bg-primary no-margin span-in-list\" > ".
               $array_items[$i]["itprice"].
              " </span>". 
             "</p>".
           "</li>";
      }
      echo    "</ul>";
  }





/*************************************************************************/
  //@return a list of items
 function show_each_service($userid,$itnumb=false, $expand=false){
   $db = new Database();
   $con = $db->conect_db();
   $post = new Post();
   
     /* retrieve service's names from table item where category is electonics */
     //select itname from items as i, categories as c where i.catid=c.catid
    // and c.catname= 'ELECTRONICS';
    $count = 0;
    $total_items = $db->select_2dArray("items",'where catid =4');
    $array_items = $total_items;
   //if ($expand===true) {
     echo "<form>&nbsp;&nbsp;<input type=\"button\" value=\"show list\" onclick=\"window.location.href='".$_SERVER["PHP_SELF"].
        '?userid='.$userid.'&action=services'."'\">".
        "</form></br>";
     
       for ($i=0; $i <count($array_items) ; $i++) {
         $array_category =  $db->select("categories",'where catid ='.$array_items[$i]["catid"], "catname");
         $user= $db->select("user",'where userid ='.$array_items[$i]["userid"], "userid, fname, lname, college");
        $post->display_PostRequested($db,$user[0][0],$user[0][1],$user[0][2],
              $user[0][3],$array_items[$i],false,false ); 
      }
   
  }
  



/*************************************************************************/
  //@return a list of internships
 function show_internship_list($userid, $db){
   /* retrieve item's names from table item where category is electonics */
   //select itname from items as i, categories as c where i.catid=c.catid
   // and c.catname= 'ELECTRONICS';
   $array_items = $db->select_2dArray("internship");

   ?>
      <div class="row visible-xs-block">
        <br> <ul class=' col-xs-12 no-padding no-margin list-inline text-center'>
           <li class='no-padding no-margin'><a href=<?php echo $_SERVER["PHP_SELF"].'?userid='.$_GET["userid"].'&action=sale'; ?>>Sales</a> | </li>
           <li class='no-padding no-margin '><a href=<?php echo $_SERVER["PHP_SELF"].'?userid='.$_GET["userid"].'&action=services'; ?>>Services</a> | </li>
           <li class='no-padding no-margin'><a href=<?php echo $_SERVER["PHP_SELF"].'?userid='.$_GET["userid"].'&action=tutorial'; ?>>Tutorial partner</a> | </li>
           <li class='no-padding no-margin'><a href=<?php echo $_SERVER["PHP_SELF"].'?userid='.$_GET["userid"].'&action=internship'; ?>>Internship</a> | </li>
           <li class='no-padding no-margin '><a href=<?php echo $_SERVER["PHP_SELF"].'?userid='.$_GET["userid"].'&action=others'; ?>>Others</a></li>
         </ul>
      </div>
     
   <?php
   echo "<div class=\"row\">".
         "<div class=\"col-xs-12 no-pjadding no-makrgin\">".
           "<form>&nbsp;<input type=\"button\" value=\"expand all\" onclick=\"window.location.href='".
             $_SERVER["PHP_SELF"].'?userid='.$userid.'&expInt=true'."'\">".
           "</form>".
         "</div>".
        "</div>";
       echo "<ul class=\"it-list\">";
   //we have one than 0ne row
     for ($i=0; $i <count($array_items); $i++) { 
       //$user= $db->select("user",'where userid ='.$array_items[$i]["userid"], "college");

       echo "<li class=\"\">".
             "<p class=\"\">".
              "<span class=\"text-muted span-in-list no-padding no-margin \" >".
                 date("F/j",strtotime($array_items[$i]["intstartdate"])).
              "</span>".
              " <span class=\"text-muted bg-info it-condition no-padding no-margin\" >deadline-".
                 date("M/j/Y",strtotime($array_items[$i]["intapplydeadline"])).
              "</span> ".
              "<a href=\"".$_SERVER["PHP_SELF"].'?userid='.$userid.'&intid='.
                 $array_items[$i]["intid"]."#".$array_items[$i]["inttile"]."\">".
                $array_items[$i]["inttile"].
              "</a>".   
              " - ".$array_items[$i]["intcompanyname"].
              " <span class=\"text-muted bg-primary no-margin span-in-list\" > ".
               $array_items[$i]["intcompensation"].
              " </span>". 
             "</p>".
           "</li>";
      }
      echo    "</ul>";
  }






/*************************************************************************/
 //@return a list of items
 //if $itnumb !==true, that means we want to view items individually with next, prev
 //if $expand !==false, we want to expand everything.
 function show_each_Internship($db,$userid,$itnumb=false){
   $post = new Post();
     /* retrieve internship's names from table item where category is electonics */
     //select itname from items as i, categories as c where i.catid=c.catid
    // and c.catname= 'ELECTRONICS';
    $total_items = $db->select_2dArray("internship");
    $array_items = $total_items;
     echo "<form>&nbsp;&nbsp;<input type=\"button\" value=\"show list\" onclick=\"window.location.href='".$_SERVER["PHP_SELF"].
     '?userid='.$userid.'&action=internship'."'\"></form></br>";
     
   for ($i=0; $i <count($array_items); $i++){ 
     $numb_post=$i+1;
     $user= $db->select("user",'where userid ='.$array_items[$i]["userid"], "userid, fname, lname, college");
     $post->display_PostRequested($db,$user[0][0],$user[0][1],$user[0][2],
              $user[0][3],false,false,$array_items[$i] ); 
     echo "</br></br>";
    }
  }






/*************************************************************************/
  //@return the number of notification for a particular user
  //show a formatted html notification
 function get_NotiObject($db, $array_items,$notiid, $return=false){
   if ($return===true) {
       $user= $db->select("user", 
                      'where userid ='.$array_items["userid"], "fname, lname");
       return $user;
      }
  
     echo "<table class=\"noti\">";

       echo "<tr><ul><th class=\"top-first-th\"><li><h4>Post #: </h4>".
            "<p>".$array_items["itnumb"]."</P></th></li>".
            "<th><li><h4>Posted on: </h4>".
            "<p>".date("M/j/Y",strtotime($array_items["itcreatedate"]))."</P></th></li>";
           $user= $db->select("user", 
                      'where userid ='.$array_items["userid"], "fname, lname");
      echo  "<th><li><h4>By: </h4>".
            "<p>".$user[0][0].'  '.$user[0][1]."</P></th></li>";
         $array_category =  $db->select("categories", 
                      'where catid ='.$array_items["catid"], "catname");
         
      echo  "<th class=\"top-last-th\"><li><p>".$array_category[0][0]."</P></th></li></ul></tr>".
            "<tr><td class=\"td-left\" colspan=\"2\"><h4>Name: </h4></td>".
            "<td class=\"\" colspan=\"2\"><p>".$array_items["itname"]."</P></td>".
            "</tr>".
            "<tr><td class=\"td-left\" colspan=\"2\"><h4>Price: </h4></td>".
            "<td class=\"\" colspan=\"2\"><p>$".$array_items["itprice"]."</P></td>".
            "</tr>".
            "<tr><td class=\"td-left\" colspan=\"2\"><h4>Quality: </h4></td>".
            "<td class=\"\" colspan=\"2\"><p>".$array_items["itquality"]."</P></td></tr>".
            "<tr><td class=\"td-left\" colspan=\"2\"><h4>Quantity: </h4></td>".
            "<td class=\"\" colspan=\"2\"><p>".$array_items["itquantity"]."</P></td></tr>".
            "<tr><td class=\"td-left\" colspan=\"2\"><h4>Kind: </h4></td>".
            "<td class=\"\" colspan=\"2\"><p>".$array_items["itKind"]."</P></td></tr>".
            "<tr><td class=\"td-left\" colspan=\"2\"><h4>Color: </h4></td>".
            "<td class=\"\" colspan=\"2\"><p>".$array_items["itColor"]."</P></td></tr>". 
            "<tr><td class=\"td-left\" colspan=\"2\"><h4>Brand: </h4></td>".
            "<td class=\"\" colspan=\"2\"><p>".$array_items["itBrand"]."</P></td></tr>".
            "<tr><th class=\"want bottom-first-th\" class=\"\" id=\"".$array_items["itnumb"]."\" colspan=\"2\">".
            "<h2>";
            echo "<form  action=\"../controller/request.php?".'userid='.$_GET['userid']."\" method=\"post\" name=\"accept-form\">";
       echo "<input type=\"hidden\" name=\"accept-for\" value=\"".$array_items["itnumb"]."\"> ";
       echo "<input type=\"hidden\" name=\"accept-status\" value=\"1\"> ";
       echo "<input type=\"hidden\" name=\"noti-id\" value=\"".$notiid."\"> ";
       echo  "<input type=\"submit\" name=\"accept-form\" value=\"accept request\" class=\"post-buying\" id=\"accept-request".$array_items["itnumb"]."\" >";
       echo "</form></h2>".
            "<th class=\"no-want bottom-last-th\" id=\"".$array_items["itnumb"]."\" colspan=\"2\">".
            "<h2>ignore</h2></th><tr>";
      echo "</table>"; 
     // echo "</br></br>";
      
  }








/*************************************************************************/
  //this function shows a list of notifications for a particular user
  //we want to show the contenu of each notifications
 function show_Notifications($userid, $db, $UserAuthentication){
   echo "<ul class=\" no-padding no-margin\">";
    /*retrieve all notification for a particular user */
    //select * from notification where touserid=1;
    $array_noti = $db->select_2dArray("notification", "where requeststatus ='0' and touserid =".$userid);

   if ($array_noti !== false) {//if $array_noti is not equal to false, that means there is pending notification
     $count_noti = count($array_noti);

     for ($i=0; $i <$count_noti; $i++) {
       //getting the name of the uer who sent the request
       $from_user= $db->select("user", 
                      'where userid ='.$array_noti[$i]["sendbyuserid"], "username, userid");

       //getting the item that was requested
       $array_items= $db->select("items",'where itnumb ='.$array_noti[$i]["notifor"]);



       //getting a new post object in order to use the function display_PostRequested
       $post = new Post();

       //finding out if user has set up a username
        if (empty($from_user[0][0])|| ($from_user[0][0] ==='NULL')||($from_user[0][0]==="null")) {
         $from_user[0][0] = "anonymous"; 
        }//else{ //yes he has a username*/
         echo "<li class=\"noti-list\">".
               "<div class=\"row visiblfe-xs-block user-avatar-wrapper bg-info img-rounded no-padding no-margin \">".
                 "<a href=\"profile.php?".'userid='.$from_user[0][1]."\"". 
                    "class=\"col-xs-2 col-sm-1 user-avatar-link  no-padding no-margin  \">";
                        $UserAuthentication->do_profilePic($UserAuthentication->user->profilepic, "img-csircle", "40px",'50px');
            echo "</a>".
                 "<div class=\"col-xs-10 col-sm-10 no-padding no-margin \">".
                   "<div class=\"row no-padding no-margin \">".
                     "<p class=\"col-xs-12 no-padding no-margin  \">".
                       "<a href=\"profile.php?".'userid='.$from_user[0][1]."\"". 
                         "class=\" no-padding no-margin\">".
                         $from_user[0][0].
                       "</a>".
                       " sent you a ".$array_noti[$i]["notititle"]." request".
                       /* triggering the modal with a .caret */
                       "<span class=\"caret pull-right\" data-toggle=\"modal\"".
                         "data-target=\"#noti-details-".$array_items[0]["itnumb"]."\">".
                       "</span>".
                       /**** Modal *****/
                       "<DIV class=\"modal fade\" role=\"dialog\" id=\"noti-details-".$array_items[0]["itnumb"]."\">".
                         "<DIV class=\"modal-dialog\">".

                           /***** Modal Body ***/
                           "<DIV class=\"modal-content\">".
                            "<DIV class=\"modal-header\">".
                             "<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>".
                             "<h4 class=\"modal-title\">helloooo</h4>".
                            "</div>".
                            "<DIV class=\"modal-body\">";
                             $post->display_PostRequested($db, $_SESSION['userid'] ,$_SESSION['fname'],
                               $_SESSION['lname'], $_SESSION['college'],$array_items[0],false); 

                         echo   "</div>".
                            "<DIV class=\"modal-footer\">".
                             "<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>".
                            "</div>".
                           "</div>".
                          "</div>".
                       "</div>".
                     "</p>".
                     "<div class=\"col-xs-6  text-center \">".
                       "<form  action=\"../controller/request.php?".'userid='.$_GET['userid']."\"".
                          "method=\"post\" name=\"accept-form\">".
                         "<input type=\"hidden\" name=\"accept-for\" value=\"".$array_items[0]["itnumb"]."\"> ".
                         "<input type=\"hidden\" name=\"accept-status\" value=\"1\"> ".
                         "<input type=\"hidden\" name=\"noti-id\" value=\"".$array_noti[$i]["notiid"]."\"> ".
                         "<input type=\"submit\" name=\"accept-form\" value=\"Accept\"".
                           "class=\"post-buyicng btn btn-primary btn-xs \" id=\"Accept".$array_items[0]["itnumb"]."\" >".
                       "</form>".
                     "</div>".
                     "<div class=\"col-xs-6  no-padfding no-fmargin text-center \">".
                       "<form  action=\"../controller/request.php?".'userid='.$_GET['userid']."\"".
                          "method=\"post\" name=\"accept-form\">".
                         "<input type=\"hidden\" name=\"ignore-for\" value=\"".$array_items[0]["itnumb"]."\"> ".
                         "<input type=\"hidden\" name=\"ignore-status\" value=\"1\"> ".
                         "<input type=\"hidden\" name=\"noti-id\" value=\"".$array_noti[$i]["notiid"]."\"> ".
                         "<input type=\"submit\" name=\"ignore-form\" value=\"Ignore\"".
                           "class=\"post-vbuying btn btn-primary btn-xs \" id=\"Ignore".$array_items[0]["itnumb"]."\" >".
                       "</form>".
                     "</div>".
                   "</div>".
               "</div>".
             "</li>";
      }
    }else{//if $array_noti is equal to false, that means there is no notification
     echo "<li class=\"noti-list\">You have no notification!</li>";
    }
   echo "</ul>";
  }





/*************************************************************************/
 /*if $isPhone ==false: this function shows the number of notification of each category(sale, service, tutorial, partnership).
 *the number of notification will be shown in front of the specific notification 
 *type(sale, service, tutorial, partnership).
 *@return an array that contains all the notifications in subcategories(sale, partnership, service, tutorial)
 *if $isPhone == true: that mean we are using this function on a mobile version of site.
 *this function will just show the number of notification beside the "notification submenu" at the top menu"
 */
 function show_Notifications_numb($userid, $array_noti, $isPhone = false){
   
    $count_noti = ($array_noti === false) ? 0: count($array_noti);//number total of notification

    if ($isPhone === true) {
      //just show the number of notification beside the "notification submenu" at the top menu" 
      return "<span Style=\"color:red; font-weight: bold\">".$count_noti."</span>";
    }  

    $numb_sale_noti = 0;//number of sale notifications 
    $numb_service_noti = 0;//number of service notifications 
    $numb_partner_noti = 0;//number of partnership notifications 
    $numb_tutorial_noti = 0;//number of tutorial notifications 
    $sale_array = array();//array to save all notifications related to sale
    $service_array = array();//array to save all notifications related to service
    $tutorial_array = array();//array to save all notifications related to tutorial
    $partnership_array = array();//array to save all notifications related to partnership
    //index for each of the category(sale, service, tutorial, partnership) array one by one respectively
    $sa = $ser = $par = $tu = 0; 

    for ($i=0; $i <$count_noti; $i++) {
      //counting the numb of notification for sale items 
      //and insert the value in the array specific to only sale
      if ((strpos($array_noti[$i]['notititle'], 'buy')) !== false) {
        $numb_sale_noti++;
        $sale_array[$sa] = $array_noti[$i];
        $sa++;
      }
      //counting the numb of notification for partenership request 
      //and insert the value in the array specific to only parnertship
      if ((strpos($array_noti[$i]['notititle'], 'partner')) !==false) {
       $numb_partner_noti++;
       $partnership_array[$par] = $array_noti[$i];
       $par++;
      }
      //counting the number of notification for tutorial request 
      //and insert the value in the array specific to only tutorial
      if ((strpos($array_noti[$i]['notititle'], 'tutorial')) !==false) {
       $numb_tutorial_noti++;
       $tutorial_array[$tu] = $array_noti[$i];
       $tu++;
      }
      //we are counting the number of notification for service request 
      //and insert the value in the array specic to only service
      if ((strpos($array_noti[$i]['notititle'], 'help')) !==false) {
       $numb_service_noti++;
       $service_array[$ser] = $array_noti[$i];
       $ser++;
      }
    }

    echo "<div class=\"row no-padding no-margin  \">";
   if ($count_noti===0) {
     echo "<li class=\"col-xs-12 \"><a href=\"".$_SERVER["PHP_SELF"].'?userid='.$userid.'&action=notification'."\">".
     "No new Notification...</a></li>";
    }elseif ($count_noti===1) {
      echo "<li class=\"col-xs-12 \"><a href=\"".$_SERVER["PHP_SELF"].'?userid='.$userid.'&action=notification'."\">".
     $count_noti." new Notification</a></li>";
    }else{
      echo "<li class=\"col-xs-12 \"><a href=\"".$_SERVER["PHP_SELF"].'?userid='.$userid.'&action=notification'."\">".
     $count_noti." new Notifications</a></li>";
    }
   //showing the categories list and the number of notifications that each one has
   echo "<li class=\"col-xs-12\" >".
          "<div class=\"row no-padding no-margin\">".
            "<a class=\"col-xs-12 no-padding no-margin\" href=\"".$_SERVER["PHP_SELF"].'?userid='.$userid.'&noti-type=sale'."\">".
             "<div class=\"col-xs-8 no-padding no-margin\">sale request</div>".
             "<div class=\"col-xs-4 no-padding img-rounded noti-color-box\" id=\"sale-req\">".$numb_sale_noti."</div>".
            "</a></div>".
        "</li>".
        "<li class=\"col-xs-12\" >".
          "<div class=\"row no-padding no-margin\">".
            "<a class=\"col-xs-12 no-padding no-margin\" href=\"".$_SERVER["PHP_SELF"].'?userid='.$userid.'&noti-type=tutorial'."\">".
             "<div class=\"col-xs-8 no-padding no-margin\">Tutorial request</div>".
             "<div class=\"col-xs-4 no-padding img-rounded noti-color-box\" id=\"tutor-req\">".$numb_tutorial_noti."</div>".
            "</a></div>".
        "</li>".
        "<li class=\"col-xs-12\" >".
          "<div class=\"row no-padding no-margin\">".
            "<a class=\"col-xs-12 no-padding no-margin\" href=\"".$_SERVER["PHP_SELF"].'?userid='.$userid.'&noti-type=partnership'."\">".
             "<div class=\"col-xs-8 no-padding no-margin\">Partenership request</div>".
             "<div class=\"col-xs-4 no-padding img-rounded  noti-color-box\" id=\"part-req\">".$numb_partner_noti."</div>".
            "</a></div>".
        "</li>". //<span class=\"badge   noti-color-box\" id=\"tutor-req\">"
        "<li class=\"col-xs-12\" >".
          "<div class=\"row no-padding no-margin\">".
            "<a class=\"col-xs-12 no-padding no-margin\" href=\"".$_SERVER["PHP_SELF"].'?userid='.$userid.'&noti-type=service'."\">".
             "<div class=\"col-xs-8 no-padding no-margin\">service request</div>".
             "<div class=\"col-xs-4 no-padding img-rounded noti-color-box\" id=\"serv-req\">".$numb_service_noti."</div>".
            "</a></div>".
        "</li>".
        "</div>";

    //now we want to insert all categories(sale, service, tutorial, partnership) in a big 3D array
    $category_3Darray = array();// a 3D array to save all categories(sale, service, tutorial, partnership)
    $category_3Darray['sale'] =  $sale_array ;//array to save all notifications related to sale
    $category_3Darray['service'] =  $service_array ;//array to save all notifications related to service
    $category_3Darray['tutorial'] =  $tutorial_array ;//array to save all notifications related to tutorial
    $category_3Darray['partnership'] = $partnership_array ;//array to save all notifications related to partnership
    return $category_3Darray;
  }




/*************************************************************************/
  /*this function shows the formated notification of each each category(sale, service, tutorial, partnership).
  *it shows only the notifications belonging to only one category(at a time) when that category is cliked .
  *@userid is the user that owns the notifications.
  *@cat_type_array is an array containg only one category type(sale, service, tutorial or partnership) that notification belongs*/
 function show_Notifications_inCategory($userid,$cat_type_array, $db){
    if (!empty($cat_type_array)&&($cat_type_array !== false)) {//if $cat_type_array is not equal to false, that means there is pending notification
     $count_noti = count($cat_type_array);
     var_dump($cat_type_array);
     for ($i=0; $i <$count_noti; $i++) {
       //getting the name of the uer who sent the request
       $from_user= $db->select("user", 
                      'where userid ='.$cat_type_array[$i]["sendbyuserid"], "username");
       //finding out if user has set up a username
       if (empty($from_user[0][0])|| ($from_user[0][0] ==='NULL')||($from_user[0][0]==="null")) {
         echo "<li class=\"noti-list\"><a href=\"".$_SERVER["PHP_SELF"].'?userid='.$userid.'&action=notification'."\">".
         "anonymous sent you a ".$cat_type_array[$i]["notititle"]." request</a></li>";
         //getting the item that was requested
         $for_item= $db->select("items",'where itnumb ='.$cat_type_array[$i]["notifor"]);
         //show a formatted html notification
         get_NotiObject($db, $for_item, $cat_type_array[$i]["notiid"]);
        }else{ //yes he has a username
         echo "<li class=\"noti-list\"><a href=\"".$_SERVER["PHP_SELF"].'?userid='.$userid.'&action=notification'."\">".
         //getting the item that was requested
         $from_user[0][0]." sent you a ".$cat_type_array[$i]["notititle"]." request</a></li>";
         //getting the item that was requested
         $for_item= $db->select_2dArray("items",'where itnumb ='.$cat_type_array[$i]["notifor"]);
         get_NotiObject($db, $for_item[0], $cat_type_array[$i]["notiid"]);
        } 
      }
    }else{//if $$cat_type_array is equal to false, that means there is no notification
     echo "<li class=\"noti-list\">You have no notification!</li>";
    }
  }


?>

