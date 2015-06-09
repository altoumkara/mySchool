<?php
 //require_once('../includefiles/includeAllFiles.php');
//include ('../includefiles/includeAllFiles.php');
  //create a page header. default title and css link is provided but can be changed
  function create_header($title="sign up", $css_link="assets/stylesheets/MyschoolsignupCss.css"){
   ?>
   
   <!DOCTYPE html>  
   <html lang="en">

    <head>

     <title>MySchool-<?php echo $title ?></title>

      <!-- ____________________________slick And JQUERY_______________________________ -->
     <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
     <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
     <script type="text/javascript" src="../slick/slick.min.js"></script>
     <!-- ____________________________slick And JQUERY_______________________________ -->

      <!-- ____________________________own created javascript _______________________________ -->
     <script src="../assets/javascript/jquery.js"></script>
     
     <!-- _______________own created javascript  content="width=device-width, initial-scale=1_____________ -->

      
      <!--________________________________BOOSTRAP ELEMENTS_________________________________-->
     <!-- Latest compiled and minified CSS CRN VERSION-->
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
     <!-- Latest compiled and minified CSS DOWNLOADED VERSION that is in bootstrap-3.3.2-dist folder-->
    <!--  <link rel="stylesheet" href="../bootstrap-3.3.2-dist/css/bootstrap.min.css" media="screen">-->

     <!-- jQuery library -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

     <!-- Latest compiled JavaScript CRN VERSION -->
     <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> 
     <!-- Latest compiled JavaScript DOWNLOADED VERSION that is in bootstrap-3.3.2-dist folder-->
  <!--    <script src="../bootstrap-3.3.2-dist/js/bootstrap.min.js"></script> -->
     

     <meta charset="utf-8"> 
     <!--The width=device-width part sets the width of the page to follow the screen-width of the device (which will vary depending on the device).
      The initial-scale=1 part sets the initial zoom level when the page is first loaded by the browser.   
     -->
     <meta name="viewport" content="width=device-width, initial-scale=1">                       
     <!--________________________________END BOOSTRAP ELEMENTS_________________________________-->
    


      
      <link rel="stylesheet" type="text/css" href= "../assets/stylesheets/MyschoolsignupCss.css" >
      
      <link rel="stylesheet" type="text/css" href= "../assets/stylesheets/MyschoolprofileCss.css" >
     
      <link rel="stylesheet" type="text/css" href="<?php echo $css_link ?>">
      <!-- ____________________________slick_<link rel="stylesheet" type="text/css" href="../css/style.css">______________________________ -->
        <link rel="stylesheet" type="text/css" href="../slick/slick.css"/>
      <!-- ____________________________slick_______________________________ -->
  

       <script src="../assets/javascript/select.js"></script>
     <script src="../assets/javascript/menu.js"></script>
      
      <!-- ____________________________form library _______________________________ -->
    <!--  <script src="http://malsup.github.com/jquery.form.js"></script> -->
      <!-- ____________________________form library _______________________________ -->
     


        
       <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <![endif]-->
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="author" content="Alama Tounkara">
      <meta name="description" content="help for students in their academic and social life.">
      <meta name="keywords" content="tutorials, help, students, classmates, professors, schoolmates, teaching, sale, 
                                     books, bed, electronics, items, services, homeworks, Math, english, chemestry, physic,      others.">

     
    </HEAD> 
<!--<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Page 1</a></li>
        <li><a href="#">Page 2</a></li> 
        <li><a href="#">Page 3</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>-->

 
 <nav class="navbar navbar-inverse">
   <header class="container-fluid hdr ">
     <div class="navbar-header hdrlogo">
       <?php
         //checking if we are on the sign up page or log in page in order to navigation
         if ((strpos($_SERVER['PHP_SELF'], "index.php") !==false)|| 
             (strpos($_SERVER['PHP_SELF'], "login.php")!==false) ) { //we are on the index page
           echo "<button type=\"button\" class=\"navbar-toggle hidden-xs\"".
                 "data-toggle=\"collapse\" data-target=\"#topnav\">"; //dont show the menu on small device while we are on index and login page
          }else{ //show the menu on small device while we are NOT on index and login page
           echo "<button type=\"button\" class=\"navbar-toggle\"".
             "data-toggle=\"collapse\" data-target=\"#topnav\">";
          }
        ?>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span> 
         <span class="icon-bar"></span> 
         <span class="icon-bar"></span>  
       </button>
       <?php
         //checking if we are on the sign up page or log in page in order to display the right text with icon
         if ((strpos($_SERVER['PHP_SELF'], "index.php")!==false)) { //we are on the index page
           echo "<a class=\"navbar-brand  \" href=\"index.php\" id=\"logo\"></a>".
             "<ul class=\"nav navbar-nav navbar-right visible-xs-inline-block\">".
               "<li><a href=\"views/login.php\">".
                 "<span class=\"glyphicon glyphicon-log-in\"></span> Login</a>".
               "</li>"; //showing the login icon
          }elseif ((strpos($_SERVER['PHP_SELF'], "login.php") !==false)) {//we are on the login page
           echo "<a class=\"navbar-brand  \" href=\"../index.php\" id=\"logo\"></a>".
              "<ul class=\"nav navbar-nav navbar-right visible-xs-inline-block\">".
               "<li><a href=\"../index.php\">".
                 "<span class=\"glyphicon glyphicon-user\"></span> Sign Up</a>".
              "</li>"; //showing the sign up icon
            }else{ //show nothing
             echo "<a class=\"navbar-brand\" href=\"../index.php\" id=\"logo\"></a>".
              "<ul class=\"nav navbar-nav navbar-right visible-xs-inline-block\"> "; 
            }
          ?>
       </ul>
     </div>

     <?php
         //checking if we are on the sign up page or log in page in order to navigation
         if ((strpos($_SERVER['PHP_SELF'], "index.php") !==false)  ||
             (strpos($_SERVER['PHP_SELF'], "login.php")!==false)) { //we are on the index page
           echo "<div class=\"collapse navbar-collapse  hidden-xs \" id=\"topnav\">"; //dont show the menu on small device while we are on index and login page
          }else{ //show the menu on small device while we are NOT on index and login page
           echo "<div class=\"collapse navbar-collapse \" id=\"topnav\">";
          }
        ?>

   <?php
  }

  //create a login form on the right top corner in the header section.
  //i did not include this in the same function as the main header, 
  //because, this form will not be on all the pages.
  function create_header_login(){
  ?>

   

   <ul class="nav navbdar-nav navbar-right hidden-xs loginonsignup  ">
     <li class="row no-padding no-margin   ">
       <form  action="views/home.php" method="post" class="form-horkizontal   " id="loginonsignup">
         <div class="form-group no-padding no-margin   ">
           <div class="col-xs-12 col-sm-5   no-padding no-margin">
            <label for="email" class="sr-only">Email</label>
            <input type="text" name="email" placeholder="Enter your username or email" 
                                                         id="email" class="form-conjtrol"/>
           </div> 
           <div class="col-xs-12 col-sm-5 no-padding no-margin  ">  
            <label for="pwd" class="sr-only">Password</label>
            <input type="password" name="pwd" placeholder="Enter password" id="pwd" class="form-ckontrol"/> 
           </div>
           <div class="col-xs-12 col-sm-2  no-margin  ">  
            <input type="submit" name="sign-in-form" value="log in" class="login-butlton  btdfn btn-prikmary " />
           </div>
         </div>  
       </form>
       <label for="remember-user" id="remember-checkbox" form=" loginonsignup"
                  class="col-xs-12 col-sm-5 no-padding no-margin">
            <input type="checkbox" name="remember-user"  id="remember-user" />
            Remember me 
       </label>
       <div class="col-xs-12 col-sm-6 no-padding no-margin  "><a href="#" id="forget-pawd"> Forgot password?</a> 
       </div>
        
       </li>
       </ul>
     </div>
    </header>
    </nav>
   <body >

  <?php
  }

  //this will create any menu that will appear in the header section.
  //basically either create_header_menu() or create_header_login are used interchangly
  ///@$numb_noti is the number of notification that a particular user has
  function create_header_menu($numb_noti){
     

       if ((strpos($_SERVER['PHP_SELF'], "index.php")!==false)) { //we are on the index page
         create_header_login();
        } elseif (strpos($_SERVER['PHP_SELF'], "login.php")!==false) {
         echo "</div> </header></nav><body>";
        } else{
         if (isset($_SESSION['userid']) && ($_SESSION['userid'] !='')) {
           echo "<ul class=\"nav navbar-nav navbar-right loginonsignup\">".
                  "<li>".
                   "<div class=\"row\">".
                     "<a href=\"home.php?".'userid='.$_SESSION['userid']."\"".
                       "class=\"active col-xs-5 \"><span class=\"glyphicon glyphicon-home\"> home</a>".
                     "<span class=\"glyphicon glyphicon-th col-xs-1 visible-xs-inline \" id=\"menu-home\"></span>".
                   "</div>".
                   "<div class=\"row top-sub-menu hidden-sm hidden-md hidden-lg\" id=\"all-home-menu\">".
                     "<div class=\"col-xs-4 \">".
                       "<a href=\"home.php?".'userid='.$_SESSION['userid'].'&action=sale'."\" class=\"glyphicon\">".
                        "<span class=\"glyphicon glyphicon-eye-open \"></span>".
                        "<p class=\"text-muted\">Wanted</p>".
                       "</a>".
                     "</div>".
                     "<div class=\"col-xs-4 \"  >".
                       "<a href=\"home.php".'?userid='.$_SESSION['userid'].'&action=notification'."\" class=\"glyphicon\">".
                        "<span class=\"glyphicon glyphicon-bell \">". $numb_noti."</span>".
                        "<p class=\"text-muted\">Notification</p>".
                       "</a>".
                     "</div>".
                     "<div class=\"col-xs-4 \"  >".
                       "<a href=\"home.php?".'userid='.$_SESSION['userid']."\" class=\"glyphicon\">".
                        "<span class=\"glyphicon glyphicon-globe \"></span>".
                        "<p class=\"text-muted\">Online</p>".
                       "</a>".
                     "</div>".
                   "</div>".
                 "</li>".
                 "<li>".
                   "<div class=\"row\">".
                     "<a href=\"profile.php?".'userid='.$_SESSION['userid']."\"".
                       "class=\"active col-xs-5 \"><span class=\"glyphicon glyphicon-user\"> Profile</a>".
                     "<span class=\"glyphicon glyphicon-th col-xs-1 visible-xs-inline \" id=\"menu-profile\"></span>".
                   "</div>".
                   "<div class=\"row top-sub-menu hidden-sm hidden-md hidden-lg\" id=\"all-profile-menu\">".
                     "<div class=\"col-xs-4\">".
                       "<a href=\"userfiles.php?userid=".$_GET['userid']."&photo=true\" class=\"glyphicon\">".
                        "<span class=\"glyphicon glyphicon-picture\"></span>".
                        "<p class=\"text-muted\">Photos</p>".
                       "</a>".
                     "</div>".
                     "<div class=\"col-xs-4\">".
                       "<a href=\"home.php?".'userid='.$_SESSION['userid']."\" class=\"glyphicon\">".
                        "<span class=\"glyphicon glyphicon-edit\"></span>".
                        "<p class=\"text-muted\">Edit Profile</p>".
                       "</a>".
                     "</div>".
                     "<div class=\"col-xs-4\">".
                       "<a href=\"home.php?".'userid='.$_SESSION['userid']."\" class=\"glyphicon\">".
                         "<span class=\"glyphicon glyphicon-combine\">".
                           "<span class=\"glyphicon glyphicon-user partner-icon1\">".
                             "<span class=\"partner-icon2 glyphicon glyphicon-user\"></span>".
                           "</span>".
                         "</span>".
                         "<p class=\"text-muted\">Partners</p>".
                       "</a>".
                     "</div>".
                   "</div>".
                 "</li>".
                 "<li>".
                   "<div class=\"row\">".
                     "<a href=\"profile.php?".'userid='.$_SESSION['userid']."\"".
                       "class=\"active col-xs-5 \"><span class=\"glyphicon glyphicon-envelope\"> msg</a>".
                   "</div>".
                 "</li>".
                 "<li>".
                   "<div class=\"row\">".
                     "<a href=\"login.php\" class=\"active col-xs-5 \">".
                       "<span class=\"glyphicon glyphicon-log-out\"> logout".
                     "</a>".
                   "</div>".
                 "</li>".
               "</ul>".
          "</div>".
     "</header>".
  "</nav>".
"<body>";
}else{
 // echo "</div> </header><body>";
}
}
 
  }


    
  

 //create the bar above the sign up menu, sign up form itself and the sign up intro(writing), 
 function create_signup_form() {
  ?>

    <div class="container   ">

      <!--this will create the bar above the menu item -->
     <div class="row Signupbar no-padding no-margin">
       <div class="col-xs-12  no-padding no-margin  ">
         <h3>Sign Up here</h3>
       </div> 
     </div>
  
     <div class="row Signupbar  no-padding no-margin  ">
      
       <div class="col-xs-12 col-sm-5 col-sm-push-7 no-padding no-margin    ">
         <p id="signupintro" >
         Stay Connected, trade, sale and study with your schoolmates, classmates and professors anywere and anytime you want with all the neccesary helps you need in order to success
         </p>
       </div>

       <div class="col-xs-12 col-sm-7 col-sm-pull-5  signup-form-group ">
         <form  action="views/profile.php" method="post"  class="form-horizontal  ">
           <div class="form-group">
             <div class="col-xs-12 col-sm-6   ">
               <label for="fname" class="signup-lbl sr-only">First Name:</label>
               <input type="text" name="fname" class="signfup-boxes form-control" placeholder="First Name" />
               </div>
           
             <div class="col-xs-12 col-sm-6   ">
               <label for="lname" class="signup-lbl sr-only">last Name:</label>
               <input type="text" name="lname" class="sign,up-boxes form-control" placeholder="last Name" />
             </div>
           </div>

           <div class="form-group   ">
             <div class="col-xs-12 col-sm-6  ">
                <label for="title" class="signup-lbl sr-only">Title:</label>
                <select name="title" class="signup-boxes form-control" required>
                <option desabled selected>What is your title?</OPTION>
                <OPTION value="student">Student</OPTION>
                <OPTION value="professor">Professor</OPTION> 
                <OPTION value="parent">Parent</OPTION>       
               </SELECT> 
             </div>
           
             <div class="col-xs-12 col-sm-6  ">
               <label for="college" class="signup-lbl sr-only ">Attending:</label>
               <select name="college" class="signup-boxes  form-control">
            <OPTION  desabled selected> School Name</OPTION>
            <OPTION value="1 MDSS/SGSLM/Langley AFB Advanced Education in General Dentistry 12 Months"> 1 MDSS/SGSLM/Langley AFB Advanced Education in General Dentistry 12 Months</OPTION>
            <OPTION value="A. T. Still University of Health Sciences"> A. T. Still University of Health Sciences</OPTION>
            <OPTION value="ACT College - Arlington"> ACT College - Arlington</OPTION>
            <OPTION value="Adams State University"> Adams State University</OPTION>
            <OPTION value="Adelphi University"> Adelphi University</OPTION>
            <OPTION value="Adirondack Community College"> Adirondack Community College</OPTION>
            <OPTION value="Advocate Health Care System"> Advocate Health Care System</OPTION>
            <OPTION value="Aims Community College"> Aims Community College</OPTION>
            <OPTION value="Alabama Southern Community College"> Alabama Southern Community College</OPTION>
            <OPTION value="Alamance Community College"> Alamance Community College</OPTION>
            <OPTION value="Albany College of Pharmacy"> Albany College of Pharmacy</OPTION>
            <OPTION value="Albany Technical College"> Albany Technical College</OPTION>
            <OPTION value="Albany-Schoharie Career and Technical School"> Albany-Schoharie Career and Technical School</OPTION>
            <OPTION value="Alcorn State University"> Alcorn State University</OPTION>
            <OPTION value="Alexian Brothers Health System"> Alexian Brothers Health System</OPTION>
            <OPTION value="Allegany College of Maryland"> Allegany College of Maryland</OPTION>
            <OPTION value="Allina CPE Center"> Allina CPE Center</OPTION>
            <OPTION value="Alvernia University"> Alvernia University</OPTION>
            <OPTION value="Amarillo College"> Amarillo College</OPTION>
            <OPTION value="American Academy of Dramatic Arts"> American Academy of Dramatic Arts</OPTION>
            <OPTION value="American Career College - Los Angeles"> American Career College - Los Angeles</OPTION>
            <OPTION value="American College of Healthcare"> American College of Healthcare</OPTION>
            <OPTION value="American International College"> American International College</OPTION>
            <OPTION value="American University"> American University</OPTION>
            <OPTION value="AmeriTech College - Provo"> AmeriTech College - Provo</OPTION>
            <OPTION value="Anamarc College - Santa Teresa"> Anamarc College - Santa Teresa</OPTION>
            <OPTION value="Anderson University"> Anderson University</OPTION>
            <OPTION value="Andrews University"> Andrews University</OPTION>
            <OPTION value="Angelina College"> Angelina College</OPTION>
            <OPTION value="Anna Maria College"> Anna Maria College</OPTION>
            <OPTION value="Anne Arundel Community College"> Anne Arundel Community College</OPTION>
            <OPTION value="Anoka Technical College"> Anoka Technical College</OPTION>
            <OPTION value="Anoka-Ramsey Community College"> Anoka-Ramsey Community College</OPTION>
            <OPTION value="Anthem College - Bryman School"> Anthem College - Bryman School</OPTION>
            <OPTION value="Anthem College - Maryland Heights"> Anthem College - Maryland Heights</OPTION>
            <OPTION value="Anthem College - Phoenix"> Anthem College - Phoenix</OPTION>
            <OPTION value="Antioch University"> Antioch University</OPTION>
            <OPTION value="Aquinas College"> Aquinas College</OPTION>
            <OPTION value="Arapahoe Community College"> Arapahoe Community College</OPTION>
            <OPTION value="Arcadia University"> Arcadia University</OPTION>
            <OPTION value="Argosy University - Orange County Campus"> Argosy University - Orange County Campus</OPTION>
            <OPTION value="Arizona State University"> Arizona State University</OPTION>
            <OPTION value="Arizona Western College"> Arizona Western College</OPTION>
            <OPTION value="Arkansas Northeastern College"> Arkansas Northeastern College</OPTION>
            <OPTION value="Arkansas State University"> Arkansas State University</OPTION>
            <OPTION value="Arkansas State University Mountain Home"> Arkansas State University Mountain Home</OPTION>
            <OPTION value="Arkansas Tech University"> Arkansas Tech University</OPTION>
            <OPTION value="Armstrong Atlantic State University"> Armstrong Atlantic State University</OPTION>
            <OPTION value="Asheville Buncombe Technical Community College"> Asheville Buncombe Technical Community College</OPTION>
            <OPTION value="Ashland Community and Technical College"> Ashland Community and Technical College</OPTION>
            <OPTION value="Ashland University"> Ashland University</OPTION>
            <OPTION value="Assemblies of God Theological Seminary"> Assemblies of God Theological Seminary</OPTION>
            <OPTION value="Athens State University"> Athens State University</OPTION>
            <OPTION value="Athens Technical College"> Athens Technical College</OPTION>
            <OPTION value="Atlantic Cape Community College"> Atlantic Cape Community College</OPTION>
            <OPTION value="Auburn University Main Campus"> Auburn University Main Campus</OPTION>
            <OPTION value="Augsburg College"> Augsburg College</OPTION>
            <OPTION value="Augusta Technical College"> Augusta Technical College</OPTION>
            <OPTION value="Aurora University"> Aurora University</OPTION>
            <OPTION value="Austin Community College"> Austin Community College</OPTION>
            <OPTION value="Austin Peay State University"> Austin Peay State University</OPTION>
            <OPTION value="Avera Health"> Avera Health</OPTION>
            <OPTION value="Azusa Pacific University"> Azusa Pacific University</OPTION>
            <OPTION value="Bacone College"> Bacone College</OPTION>
            <OPTION value="Baker College"> Baker College</OPTION>
            <OPTION value="Baker University"> Baker University</OPTION>
            <OPTION value="Baldwin-Wallace College"> Baldwin-Wallace College</OPTION>
            <OPTION value="Ball State University"> Ball State University</OPTION>
            <OPTION value="Baltimore City Community College"> Baltimore City Community College</OPTION>
            <OPTION value="Baptist Missionary Association Theological Seminary"> Baptist Missionary Association Theological Seminary</OPTION>
            <OPTION value="Barry University"> Barry University</OPTION>
            <OPTION value="Barton County Community College"> Barton County Community College</OPTION>
            <OPTION value="Bay de Noc Community College"> Bay de Noc Community College</OPTION>
            <OPTION value="Bay Path College"> Bay Path College</OPTION>
            <OPTION value="Bay State College - Boston"> Bay State College - Boston</OPTION>
            <OPTION value="Becker College"> Becker College</OPTION>
            <OPTION value="Belhaven University"> Belhaven University</OPTION>
            <OPTION value="Belmont University"> Belmont University</OPTION>
            <OPTION value="Bemidji State University"> Bemidji State University</OPTION>
            <OPTION value="Benedictine College"> Benedictine College</OPTION>
            <OPTION value="Benedictine University"> Benedictine University</OPTION>
            <OPTION value="Berdan Institute"> Berdan Institute</OPTION>
            <OPTION value="Bergen Community College"> Bergen Community College</OPTION>
            <OPTION value="Berks Technical Institute"> Berks Technical Institute</OPTION>
            <OPTION value="Berkshire Community College"> Berkshire Community College</OPTION>
            <OPTION value="Bethany College"> Bethany College</OPTION>
            <OPTION value="Bethel College"> Bethel College</OPTION>
            <OPTION value="Bethel Seminary"> Bethel Seminary</OPTION>
            <OPTION value="Bethel University"> Bethel University</OPTION>
            <OPTION value="Bethune - Cookman University"> Bethune - Cookman University</OPTION>
            <OPTION value="Bevill State Community College"> Bevill State Community College</OPTION>
            <OPTION value="Big Sandy Community and Technical College"> Big Sandy Community and Technical College</OPTION>
            <OPTION value="Black Hawk College - Quad-Cities Campus"> Black Hawk College - Quad-Cities Campus</OPTION>
            <OPTION value="Black Hills State University"> Black Hills State University</OPTION>
            <OPTION value="Black River Technical College"> Black River Technical College</OPTION>
            <OPTION value="Blackhawk Technical College"> Blackhawk Technical College</OPTION>
            <OPTION value="Blinn College"> Blinn College</OPTION>
            <OPTION value="Bloomfield College"> Bloomfield College</OPTION>
            <OPTION value="Bloomsburg University of Pennsylvania"> Bloomsburg University of Pennsylvania</OPTION>
            <OPTION value="Blue Ridge Community and Technical College"> Blue Ridge Community and Technical College</OPTION>
            <OPTION value="Blue Ridge Community College"> Blue Ridge Community College</OPTION>
            <OPTION value="Bluefield State College"> Bluefield State College</OPTION>
            <OPTION value="Bluffton University"> Bluffton University</OPTION>
            <OPTION value="Boston College"> Boston College</OPTION>
            <OPTION value="Boston University"> Boston University</OPTION>
            <OPTION value="Bowie State University"> Bowie State University</OPTION>
            <OPTION value="Bowling Green State University"> Bowling Green State University</OPTION>
            <OPTION value="Bradley University"> Bradley University</OPTION>
            <OPTION value="Branford Hall Career Institute - Branford Campus"> Branford Hall Career Institute - Branford Campus</OPTION>
            <OPTION value="Brenau University"> Brenau University</OPTION>
            <OPTION value="Brewton-Parker College"> Brewton-Parker College</OPTION>
            <OPTION value="Briar Cliff University"> Briar Cliff University</OPTION>
            <OPTION value="Bridgemont Community and Technical College"> Bridgemont Community and Technical College</OPTION>
            <OPTION value="Bridgerland Applied Technology College"> Bridgerland Applied Technology College</OPTION>
            <OPTION value="Bridgewater State University"> Bridgewater State University</OPTION>
            <OPTION value="Bristol Community College"> Bristol Community College</OPTION>
            <OPTION value="Broadview University - West Jordan"> Broadview University - West Jordan</OPTION>
            <OPTION value="Brookdale Community College"> Brookdale Community College</OPTION>
            <OPTION value="Brookline College - Phoenix"> Brookline College - Phoenix</OPTION>
            <OPTION value="Brooklyn College of the City University of New York"> Brooklyn College of the City University of New York</OPTION>
            <OPTION value="Broward College"> Broward College</OPTION>
            <OPTION value="Brown Mackie College - Salina"> Brown Mackie College - Salina</OPTION>
            <OPTION value="Bryant and Stratton College"> Bryant and Stratton College</OPTION>
            <OPTION value="Bucks County Community College"> Bucks County Community College</OPTION>
            <OPTION value="Bunker Hill Community College"> Bunker Hill Community College</OPTION>
            <OPTION value="Burlington County College"> Burlington County College</OPTION>
            <OPTION value="Butler County Community College"> Butler County Community College</OPTION>
            <OPTION value="Cairn University"> Cairn University</OPTION>
            <OPTION value="Caldwell College"> Caldwell College</OPTION>
            <OPTION value="Caldwell Community College and Technical Institute"> Caldwell Community College and Technical Institute</OPTION>
            <OPTION value="California College of the Arts"> California College of the Arts</OPTION>
            <OPTION value="California Lutheran University"> California Lutheran University</OPTION>
            <OPTION value="California State University - East Bay"> California State University - East Bay</OPTION>
            <OPTION value="California University of Pennsylvania"> California University of Pennsylvania</OPTION>
            <OPTION value="Calumet College of St. Joseph"> Calumet College of St. Joseph</OPTION>
            <OPTION value="Camden County College"> Camden County College</OPTION>
            <OPTION value="Cameron University"> Cameron University</OPTION>
            <OPTION value="Campbell University"> Campbell University</OPTION>
            <OPTION value="Canisius College"> Canisius College</OPTION>
            <OPTION value="Cape Fear Community College"> Cape Fear Community College</OPTION>
            <OPTION value="Capital University"> Capital University</OPTION>
            <OPTION value="Cardinal Stritch University"> Cardinal Stritch University</OPTION>
            <OPTION value="Caritas Christi Health Care System"> Caritas Christi Health Care System</OPTION>
            <OPTION value="Carl Albert State College"> Carl Albert State College</OPTION>
            <OPTION value="Carl Sandburg College"> Carl Sandburg College</OPTION>
            <OPTION value="Carlos Albizu University"> Carlos Albizu University</OPTION>
            <OPTION value="Carlow University"> Carlow University</OPTION>
            <OPTION value="Carnegie Mellon University"> Carnegie Mellon University</OPTION>
            <OPTION value="Carrington College - Boise"> Carrington College - Boise</OPTION>
            <OPTION value="Carrington College - Phoenix"> Carrington College - Phoenix</OPTION>
            <OPTION value="Carrington College California - Sacramento"> Carrington College California - Sacramento</OPTION>
            <OPTION value="Carrington College- Portland"> Carrington College- Portland</OPTION>
            <OPTION value="Carroll Community College"> Carroll Community College</OPTION>
            <OPTION value="Carroll University"> Carroll University</OPTION>
            <OPTION value="Casa Loma College - Van Nuys"> Casa Loma College - Van Nuys</OPTION>
            <OPTION value="Case Western Reserve University"> Case Western Reserve University</OPTION>
            <OPTION value="Catawba Valley Community College"> Catawba Valley Community College</OPTION>
            <OPTION value="Catholic University of America"> Catholic University of America</OPTION>
            <OPTION value="Cayuga County Community College"> Cayuga County Community College</OPTION>
            <OPTION value="Cedar Crest College"> Cedar Crest College</OPTION>
            <OPTION value="Central Alabama Community College"> Central Alabama Community College</OPTION>
            <OPTION value="Central Arizona College"> Central Arizona College</OPTION>
            <OPTION value="Central Carolina Community College"> Central Carolina Community College</OPTION>
            <OPTION value="Central Carolina Technical College"> Central Carolina Technical College</OPTION>
            <OPTION value="Central Community College"> Central Community College</OPTION>
            <OPTION value="Central Georgia Technical College"> Central Georgia Technical College</OPTION>
            <OPTION value="Central Lakes College"> Central Lakes College</OPTION>
            <OPTION value="Central Maine Community College"> Central Maine Community College</OPTION>
            <OPTION value="Central Methodist University"> Central Methodist University</OPTION>
            <OPTION value="Central Michigan University"> Central Michigan University</OPTION>
            <OPTION value="Central New Mexico Community College"> Central New Mexico Community College</OPTION>
            <OPTION value="Central Ohio Technical College"> Central Ohio Technical College</OPTION>
            <OPTION value="Central Piedmont Community College"> Central Piedmont Community College</OPTION>
            <OPTION value="Central State University"> Central State University</OPTION>
            <OPTION value="Central Texas College"> Central Texas College</OPTION>
            <OPTION value="Central Wyoming College"> Central Wyoming College</OPTION>
            <OPTION value="Centura Health"> Centura Health</OPTION>
            <OPTION value="Century College"> Century College</OPTION>
            <OPTION value="Chadron State College"> Chadron State College</OPTION>
            <OPTION value="Chamberlain College of Nursing"> Chamberlain College of Nursing</OPTION>
            <OPTION value="Charles Stewart Mott Community College"> Charles Stewart Mott Community College</OPTION>
            <OPTION value="Charleston Southern University"> Charleston Southern University</OPTION>
            <OPTION value="Chatham University"> Chatham University</OPTION>
            <OPTION value="Chattahoochee Technical College"> Chattahoochee Technical College</OPTION>
            <OPTION value="Chesapeake College"> Chesapeake College</OPTION>
            <OPTION value="Chippewa Valley Technical College"> Chippewa Valley Technical College</OPTION>
            <OPTION value="Christian Homes, Inc."> Christian Homes, Inc.</OPTION>
            <OPTION value="Cincinnati Christian University"> Cincinnati Christian University</OPTION>
            <OPTION value="Cincinnati State Technical and Community College"> Cincinnati State Technical and Community College</OPTION>
            <OPTION value="Cisco Junior College"> Cisco Junior College</OPTION>
            <OPTION value="City College - Fort Lauderdale"> City College - Fort Lauderdale</OPTION>
            <OPTION value="City College of New York of the City University of New York, The"> City College of New York of the City University of New York, The</OPTION>
            <OPTION value="City Colleges of Chicago - Wilbur Wright College"> City Colleges of Chicago - Wilbur Wright College</OPTION>
            <OPTION value="City Colleges of Chicago-Kennedy-King College"> City Colleges of Chicago-Kennedy-King College</OPTION>
            <OPTION value="City Colleges of Chicago-Richard J Daley College"> City Colleges of Chicago-Richard J Daley College</OPTION>
            <OPTION value="Clarion University of Pennsylvania"> Clarion University of Pennsylvania</OPTION>
            <OPTION value="Clark State Community College"> Clark State Community College</OPTION>
            <OPTION value="Clarke University"> Clarke University</OPTION>
            <OPTION value="Cleveland State University"> Cleveland State University</OPTION>
            <OPTION value="Clinton-Essex-Warren-Washington BOCES"> Clinton-Essex-Warren-Washington BOCES</OPTION>
            <OPTION value="Cloud County Community College"> Cloud County Community College</OPTION>
            <OPTION value="Clovis Community College"> Clovis Community College</OPTION>
            <OPTION value="Coastal Bend College"> Coastal Bend College</OPTION>
            <OPTION value="Cochise College"> Cochise College</OPTION>
            <OPTION value="Colby Community College"> Colby Community College</OPTION>
            <OPTION value="College of Central Florida"> College of Central Florida</OPTION>
            <OPTION value="College of DuPage"> College of DuPage</OPTION>
            <OPTION value="College of Lake County"> College of Lake County</OPTION>
            <OPTION value="College of Medicine, Mayo Clinic"> College of Medicine, Mayo Clinic</OPTION>
            <OPTION value="College of Menominee Nation"> College of Menominee Nation</OPTION>
            <OPTION value="College of Mount Saint Vincent"> College of Mount Saint Vincent</OPTION>
            <OPTION value="College of Mount St. Joseph"> College of Mount St. Joseph</OPTION>
            <OPTION value="College of Our Lady of the Elms"> College of Our Lady of the Elms</OPTION>
            <OPTION value="College of Saint Elizabeth"> College of Saint Elizabeth</OPTION>
            <OPTION value="College of Saint Mary"> College of Saint Mary</OPTION>
            <OPTION value="College of Saint Scholastica"> College of Saint Scholastica</OPTION>
            <OPTION value="College of Southern Maryland"> College of Southern Maryland</OPTION>
            <OPTION value="College of the Albemarle"> College of the Albemarle</OPTION>
            <OPTION value="Collin County Community College District"> Collin County Community College District</OPTION>
            <OPTION value="Colorado Christian University"> Colorado Christian University</OPTION>
            <OPTION value="Colorado Mesa University"> Colorado Mesa University</OPTION>
            <OPTION value="Colorado Mountain College"> Colorado Mountain College</OPTION>
            <OPTION value="Colorado Northwestern Community College"> Colorado Northwestern Community College</OPTION>
            <OPTION value="Colorado State University"> Colorado State University</OPTION>
            <OPTION value="Colorado State University - Pueblo"> Colorado State University - Pueblo</OPTION>
            <OPTION value="Colorado Technical University"> Colorado Technical University</OPTION>
            <OPTION value="Columbia College"> Columbia College</OPTION>
            <OPTION value="Columbia College of Nursing"> Columbia College of Nursing</OPTION>
            <OPTION value="Columbia International University"> Columbia International University</OPTION>
            <OPTION value="Columbia State Community College"> Columbia State Community College</OPTION>
            <OPTION value="Columbus State Community College"> Columbus State Community College</OPTION>
            <OPTION value="Columbus Technical College"> Columbus Technical College</OPTION>
            <OPTION value="Community Care College"> Community Care College</OPTION>
            <OPTION value="Community College of Allegheny County"> Community College of Allegheny County</OPTION>
            <OPTION value="Community College of Beaver County"> Community College of Beaver County</OPTION>
            <OPTION value="Community College of Denver"> Community College of Denver</OPTION>
            <OPTION value="Community College of Philadelphia"> Community College of Philadelphia</OPTION>
            <OPTION value="Community College of Rhode Island"> Community College of Rhode Island</OPTION>
            <OPTION value="Community College of the Air Force"> Community College of the Air Force</OPTION>
            <OPTION value="Concorde Career College"> Concorde Career College</OPTION>
            <OPTION value="Concorde Career College - Aurora"> Concorde Career College - Aurora</OPTION>
            <OPTION value="Concordia College"> Concordia College</OPTION>
            <OPTION value="Concordia University"> Concordia University</OPTION>
            <OPTION value="Concordia University at Austin"> Concordia University at Austin</OPTION>
            <OPTION value="Concordia University Chicago"> Concordia University Chicago</OPTION>
            <OPTION value="Concordia University Wisconsin"> Concordia University Wisconsin</OPTION>
            <OPTION value="Concordia University, St. Paul"> Concordia University, St. Paul</OPTION>
            <OPTION value="Connors State College"> Connors State College</OPTION>
            <OPTION value="Copiah-Lincoln Community College"> Copiah-Lincoln Community College</OPTION>
            <OPTION value="Coppin State University"> Coppin State University</OPTION>
            <OPTION value="Corcoran College of Art and Design"> Corcoran College of Art and Design</OPTION>
            <OPTION value="Cornell University"> Cornell University</OPTION>
            <OPTION value="Cornerstone University"> Cornerstone University</OPTION>
            <OPTION value="Corning Community College"> Corning Community College</OPTION>
            <OPTION value="Cossatot Community College of the University of Arkansas"> Cossatot Community College of the University of Arkansas</OPTION>
            <OPTION value="Cox College"> Cox College</OPTION>
            <OPTION value="Creighton University"> Creighton University</OPTION>
            <OPTION value="Crowder College"> Crowder College</OPTION>
            <OPTION value="Crown College"> Crown College</OPTION>
            <OPTION value="Cumberland County College"> Cumberland County College</OPTION>
            <OPTION value="Curry College"> Curry College</OPTION>
            <OPTION value="Cuyahoga Community College"> Cuyahoga Community College</OPTION>
            <OPTION value="D.G. Erwin Technical Center"> D.G. Erwin Technical Center</OPTION>
            <OPTION value="Dabney S Lancaster Community College"> Dabney S Lancaster Community College</OPTION>
            <OPTION value="Dade Medical College - Miami"> Dade Medical College - Miami</OPTION>
            <OPTION value="Daemen College"> Daemen College</OPTION>
            <OPTION value="Dakota County Technical College"> Dakota County Technical College</OPTION>
            <OPTION value="Dakota State University"> Dakota State University</OPTION>
            <OPTION value="Dakota Wesleyan University"> Dakota Wesleyan University</OPTION>
            <OPTION value="Dallas Baptist University"> Dallas Baptist University</OPTION>
            <OPTION value="Dallas Theological Seminary"> Dallas Theological Seminary</OPTION>
            <OPTION value="Danville Area Community College"> Danville Area Community College</OPTION>
            <OPTION value="Davenport University"> Davenport University</OPTION>
            <OPTION value="Davidson County Community College"> Davidson County Community College</OPTION>
            <OPTION value="Davis Applied Technology College"> Davis Applied Technology College</OPTION>
            <OPTION value="Daymar Institute - Clarksville"> Daymar Institute - Clarksville</OPTION>
            <OPTION value="Daytona State College"> Daytona State College</OPTION>
            <OPTION value="Defiance College"> Defiance College</OPTION>
            <OPTION value="Del Mar College"> Del Mar College</OPTION>
            <OPTION value="Delaware County Community College"> Delaware County Community College</OPTION>
            <OPTION value="Delaware State University"> Delaware State University</OPTION>
            <OPTION value="Delaware Technical and Community College - Owens"> Delaware Technical and Community College - Owens</OPTION>
            <OPTION value="Delaware Technical and Community College - Stanton-Wilmington"> Delaware Technical and Community College - Stanton-Wilmington</OPTION>
            <OPTION value="Delgado Community College"> Delgado Community College</OPTION>
            <OPTION value="Delta College"> Delta College</OPTION>
            <OPTION value="Delta State University"> Delta State University</OPTION>
            <OPTION value="DePaul University"> DePaul University</OPTION>
            <OPTION value="Des Moines Area Community College"> Des Moines Area Community College</OPTION>
            <OPTION value="DeSales University"> DeSales University</OPTION>
            <OPTION value="Dickinson State University"> Dickinson State University</OPTION>
            <OPTION value="Doane College"> Doane College</OPTION>
            <OPTION value="Dodge City Community College"> Dodge City Community College</OPTION>
            <OPTION value="Dominican University"> Dominican University</OPTION>
            <OPTION value="Dorsey School of Business"> Dorsey School of Business</OPTION>
            <OPTION value="Dowling College"> Dowling College</OPTION>
            <OPTION value="Drake University"> Drake University</OPTION>
            <OPTION value="Drew University"> Drew University</OPTION>
            <OPTION value="Drexel University"> Drexel University</OPTION>
            <OPTION value="Drury University"> Drury University</OPTION>
            <OPTION value="Duquesne University"> Duquesne University</OPTION>
            <OPTION value="Dutchess Community College"> Dutchess Community College</OPTION>
            <OPTION value="East Carolina University"> East Carolina University</OPTION>
            <OPTION value="East Central College"> East Central College</OPTION>
            <OPTION value="East Central University"> East Central University</OPTION>
            <OPTION value="East Mississippi Community College"> East Mississippi Community College</OPTION>
            <OPTION value="East Stroudsburg University of Pennsylvania"> East Stroudsburg University of Pennsylvania</OPTION>
            <OPTION value="East Texas Baptist University"> East Texas Baptist University</OPTION>
            <OPTION value="Eastern Gateway Community College"> Eastern Gateway Community College</OPTION>
            <OPTION value="Eastern Illinois University"> Eastern Illinois University</OPTION>
            <OPTION value="Eastern Iowa Community College District"> Eastern Iowa Community College District</OPTION>
            <OPTION value="Eastern Kentucky University"> Eastern Kentucky University</OPTION>
            <OPTION value="Eastern Maine Community College"> Eastern Maine Community College</OPTION>
            <OPTION value="Eastern Mennonite University"> Eastern Mennonite University</OPTION>
            <OPTION value="Eastern Michigan University"> Eastern Michigan University</OPTION>
            <OPTION value="Eastern New Mexico University"> Eastern New Mexico University</OPTION>
            <OPTION value="Eastern Oklahoma State College"> Eastern Oklahoma State College</OPTION>
            <OPTION value="Eastern University"> Eastern University</OPTION>
            <OPTION value="Eastern Washington University"> Eastern Washington University</OPTION>
            <OPTION value="ECPI University"> ECPI University</OPTION>
            <OPTION value="Edgecombe Community College"> Edgecombe Community College</OPTION>
            <OPTION value="Edgewood College"> Edgewood College</OPTION>
            <OPTION value="Edinboro University of Pennsylvania"> Edinboro University of Pennsylvania</OPTION>
            <OPTION value="Edison State College"> Edison State College</OPTION>
            <OPTION value="Edison State Community College"> Edison State Community College</OPTION>
            <OPTION value="Educational and Cultural Interactions"> Educational and Cultural Interactions</OPTION>
            <OPTION value="El Paso Community College"> El Paso Community College</OPTION>
            <OPTION value="Elizabethtown College"> Elizabethtown College</OPTION>
            <OPTION value="Elizabethtown Community and Technical College"> Elizabethtown Community and Technical College</OPTION>
            <OPTION value="Elmhurst College"> Elmhurst College</OPTION>
            <OPTION value="Elmira College"> Elmira College</OPTION>
            <OPTION value="Emmanuel College"> Emmanuel College</OPTION>
            <OPTION value="Emory University"> Emory University</OPTION>
            <OPTION value="Emporia State University"> Emporia State University</OPTION>
            <OPTION value="Endicott College"> Endicott College</OPTION>
            <OPTION value="Erie Community College"> Erie Community College</OPTION>
            <OPTION value="Erskine College"> Erskine College</OPTION>
            <OPTION value="Essex County College"> Essex County College</OPTION>
            <OPTION value="Evangel University"> Evangel University</OPTION>
            <OPTION value="Everest College - Bremerton"> Everest College - Bremerton</OPTION>
            <OPTION value="Everest College - Colorado Springs"> Everest College - Colorado Springs</OPTION>
            <OPTION value="Everest College - Portland"> Everest College - Portland</OPTION>
            <OPTION value="Everest College - Seattle"> Everest College - Seattle</OPTION>
            <OPTION value="Everest Institute - Grand Rapids"> Everest Institute - Grand Rapids</OPTION>
            <OPTION value="Everest Institute - Rochester"> Everest Institute - Rochester</OPTION>
            <OPTION value="Everest University - North Orlando"> Everest University - North Orlando</OPTION>
            <OPTION value="Fairfield University"> Fairfield University</OPTION>
            <OPTION value="Fairleigh Dickinson University"> Fairleigh Dickinson University</OPTION>
            <OPTION value="Fairmont State University"> Fairmont State University</OPTION>
            <OPTION value="Fashion Institute of Design and Merchandising"> Fashion Institute of Design and Merchandising</OPTION>
            <OPTION value="Faulkner University"> Faulkner University</OPTION>
            <OPTION value="Felician College"> Felician College</OPTION>
            <OPTION value="Ferris State University"> Ferris State University</OPTION>
            <OPTION value="Finger Lakes Community College"> Finger Lakes Community College</OPTION>
            <OPTION value="Flint Hills Technical College"> Flint Hills Technical College</OPTION>
            <OPTION value="Florence-Darlington Technical College"> Florence-Darlington Technical College</OPTION>
            <OPTION value="Florida Agricultural and Mechanical University"> Florida Agricultural and Mechanical University</OPTION>
            <OPTION value="Florida Atlantic University"> Florida Atlantic University</OPTION>
            <OPTION value="Florida Career College - Miami"> Florida Career College - Miami</OPTION>
            <OPTION value="Florida Gateway College"> Florida Gateway College</OPTION>
            <OPTION value="Florida Memorial University"> Florida Memorial University</OPTION>
            <OPTION value="Florida Southern College"> Florida Southern College</OPTION>
            <OPTION value="Florida State College at Jacksonville"> Florida State College at Jacksonville</OPTION>
            <OPTION value="Florida State University"> Florida State University</OPTION>
            <OPTION value="Florida Technical College"> Florida Technical College</OPTION>
            <OPTION value="FLS International - Pasadena"> FLS International - Pasadena</OPTION>
            <OPTION value="Fontbonne University"> Fontbonne University</OPTION>
            <OPTION value="Fordham University"> Fordham University</OPTION>
            <OPTION value="Forsyth Technical Community College"> Forsyth Technical Community College</OPTION>
            <OPTION value="Fort Hays State University"> Fort Hays State University</OPTION>
            <OPTION value="Fort Lewis College"> Fort Lewis College</OPTION>
            <OPTION value="Fort Scott Community College"> Fort Scott Community College</OPTION>
            <OPTION value="Fort Valley State University"> Fort Valley State University</OPTION>
            <OPTION value="Fortis College - Mobile"> Fortis College - Mobile</OPTION>
            <OPTION value="Fortis Institute - Cookeville"> Fortis Institute - Cookeville</OPTION>
            <OPTION value="Fortis Institute - Erie"> Fortis Institute - Erie</OPTION>
            <OPTION value="Fox College Inc"> Fox College Inc</OPTION>
            <OPTION value="Fox Valley Technical College"> Fox Valley Technical College</OPTION>
            <OPTION value="Framingham State University"> Framingham State University</OPTION>
            <OPTION value="Franciscan University of Steubenville"> Franciscan University of Steubenville</OPTION>
            <OPTION value="Franklin Pierce College-Graduate and Professional Studies"> Franklin Pierce College-Graduate and Professional Studies</OPTION>
            <OPTION value="Franklin Pierce University"> Franklin Pierce University</OPTION>
            <OPTION value="Franklin University"> Franklin University</OPTION>
            <OPTION value="Frederick Community College"> Frederick Community College</OPTION>
            <OPTION value="Friends University"> Friends University</OPTION>
            <OPTION value="Front Range Community College"> Front Range Community College</OPTION>
            <OPTION value="Frostburg State University"> Frostburg State University</OPTION>
            <OPTION value="Gannon University"> Gannon University</OPTION>
            <OPTION value="Garden City Community College"> Garden City Community College</OPTION>
            <OPTION value="Gardner-Webb University"> Gardner-Webb University</OPTION>
            <OPTION value="Gaston College"> Gaston College</OPTION>
            <OPTION value="Gateway Community College"> Gateway Community College</OPTION>
            <OPTION value="Gateway Technical College"> Gateway Technical College</OPTION>
            <OPTION value="Genesee Community College"> Genesee Community College</OPTION>
            <OPTION value="George C Wallace Community College - Dothan"> George C Wallace Community College - Dothan</OPTION>
            <OPTION value="George Fox University"> George Fox University</OPTION>
            <OPTION value="George Mason University"> George Mason University</OPTION>
            <OPTION value="George Washington University"> George Washington University</OPTION>
            <OPTION value="Georgetown University"> Georgetown University</OPTION>
            <OPTION value="Georgia College and State University"> Georgia College and State University</OPTION>
            <OPTION value="Georgia Institute of Technology - Main Campus"> Georgia Institute of Technology - Main Campus</OPTION>
            <OPTION value="Georgia Northwestern Technical College - Floyd County Campus"> Georgia Northwestern Technical College - Floyd County Campus</OPTION>
            <OPTION value="Georgia Perimeter College"> Georgia Perimeter College</OPTION>
            <OPTION value="Georgia Regents University"> Georgia Regents University</OPTION>
            <OPTION value="Georgia Southern University"> Georgia Southern University</OPTION>
            <OPTION value="Georgia Southwestern State University"> Georgia Southwestern State University</OPTION>
            <OPTION value="Georgian Court University"> Georgian Court University</OPTION>
            <OPTION value="Germanna Community College"> Germanna Community College</OPTION>
            <OPTION value="Glenville State College"> Glenville State College</OPTION>
            <OPTION value="Globe University"> Globe University</OPTION>
            <OPTION value="Gloucester County College"> Gloucester County College</OPTION>
            <OPTION value="Golden Gate Baptist Theological Seminary"> Golden Gate Baptist Theological Seminary</OPTION>
            <OPTION value="Goldfarb School of Nursing at Barnes-Jewish College"> Goldfarb School of Nursing at Barnes-Jewish College</OPTION>
            <OPTION value="Goodwin College"> Goodwin College</OPTION>
            <OPTION value="Gordon College"> Gordon College</OPTION>
            <OPTION value="Goshen College"> Goshen College</OPTION>
            <OPTION value="Governors State University"> Governors State University</OPTION>
            <OPTION value="Grace College and Seminary"> Grace College and Seminary</OPTION>
            <OPTION value="Graceland University"> Graceland University</OPTION>
            <OPTION value="Grand Canyon University"> Grand Canyon University</OPTION>
            <OPTION value="Grand Rapids Community College"> Grand Rapids Community College</OPTION>
            <OPTION value="Grand Valley State University"> Grand Valley State University</OPTION>
            <OPTION value="Grand View University"> Grand View University</OPTION>
            <OPTION value="Grayson College"> Grayson College</OPTION>
            <OPTION value="Great Bay Community College"> Great Bay Community College</OPTION>
            <OPTION value="Great Plains Technology Center"> Great Plains Technology Center</OPTION>
            <OPTION value="Greater Johnstown Career and Technology Center"> Greater Johnstown Career and Technology Center</OPTION>
            <OPTION value="Greenfield Community College"> Greenfield Community College</OPTION>
            <OPTION value="Greenville Technical College"> Greenville Technical College</OPTION>
            <OPTION value="Gurnick Academy of Medical Arts - San Mateo"> Gurnick Academy of Medical Arts - San Mateo</OPTION>
            <OPTION value="Gwynedd Mercy College"> Gwynedd Mercy College</OPTION>
            <OPTION value="H Councill Trenholm State Technical College"> H Councill Trenholm State Technical College</OPTION>
            <OPTION value="Hagerstown Community College"> Hagerstown Community College</OPTION>
            <OPTION value="Hamline University"> Hamline University</OPTION>
            <OPTION value="Hampton University"> Hampton University</OPTION>
            <OPTION value="Hannibal-LaGrange College"> Hannibal-LaGrange College</OPTION>
            <OPTION value="Harcum College"> Harcum College</OPTION>
            <OPTION value="Hardin-Simmons University"> Hardin-Simmons University</OPTION>
            <OPTION value="Harding University"> Harding University</OPTION>
            <OPTION value="Harris-Stowe State University"> Harris-Stowe State University</OPTION>
            <OPTION value="Harrisburg Area Community College - Harrisburg"> Harrisburg Area Community College - Harrisburg</OPTION>
            <OPTION value="Harrison College - Indianapolis"> Harrison College - Indianapolis</OPTION>
            <OPTION value="Hawaii Pacific University"> Hawaii Pacific University</OPTION>
            <OPTION value="Hawkeye Community College"> Hawkeye Community College</OPTION>
            <OPTION value="Hazard Community and Technical College"> Hazard Community and Technical College</OPTION>
            <OPTION value="Heald College - Central Administrative Office"> Heald College - Central Administrative Office</OPTION>
            <OPTION value="Heartland Community College"> Heartland Community College</OPTION>
            <OPTION value="Hebrew Union College - Jewish Institute of Religion - New York"> Hebrew Union College - Jewish Institute of Religion - New York</OPTION>
            <OPTION value="Heidelberg University"> Heidelberg University</OPTION>
            <OPTION value="Henderson Community College"> Henderson Community College</OPTION>
            <OPTION value="Henderson State University"> Henderson State University</OPTION>
            <OPTION value="Hennepin Technical College"> Hennepin Technical College</OPTION>
            <OPTION value="Henry Ford Community College"> Henry Ford Community College</OPTION>
            <OPTION value="Herzing University"> Herzing University</OPTION>
            <OPTION value="Hesser College"> Hesser College</OPTION>
            <OPTION value="Hibbing Community College"> Hibbing Community College</OPTION>
            <OPTION value="High Point University"> High Point University</OPTION>
            <OPTION value="Hillsborough Community College"> Hillsborough Community College</OPTION>
            <OPTION value="Hinds Community College"> Hinds Community College</OPTION>
            <OPTION value="Hiram College"> Hiram College</OPTION>
            <OPTION value="Hocking College"> Hocking College</OPTION>
            <OPTION value="Hodges University"> Hodges University</OPTION>
            <OPTION value="Hofstra University"> Hofstra University</OPTION>
            <OPTION value="Holmes Community College"> Holmes Community College</OPTION>
            <OPTION value="Holy Family University"> Holy Family University</OPTION>
            <OPTION value="Hondros College"> Hondros College</OPTION>
            <OPTION value="Hood College"> Hood College</OPTION>
            <OPTION value="Hopkinsville Community College"> Hopkinsville Community College</OPTION>
            <OPTION value="Horry-Georgetown Technical College"> Horry-Georgetown Technical College</OPTION>
            <OPTION value="Houghton College"> Houghton College</OPTION>
            <OPTION value="Houston Community College System"> Houston Community College System</OPTION>
            <OPTION value="Howard College"> Howard College</OPTION>
            <OPTION value="Howard Community College"> Howard Community College</OPTION>
            <OPTION value="Howard University"> Howard University</OPTION>
            <OPTION value="Hudson Valley Community College"> Hudson Valley Community College</OPTION>
            <OPTION value="Hunter College of the City University of New York"> Hunter College of the City University of New York</OPTION>
            <OPTION value="Huntington University"> Huntington University</OPTION>
            <OPTION value="Husson University"> Husson University</OPTION>
            <OPTION value="Hutchinson Community College"> Hutchinson Community College</OPTION>
            <OPTION value="Illinois Central College"> Illinois Central College</OPTION>
            <OPTION value="Illinois Eastern Community Colleges"> Illinois Eastern Community Colleges</OPTION>
            <OPTION value="Illinois Institute of Technology"> Illinois Institute of Technology</OPTION>
            <OPTION value="Illinois State University"> Illinois State University</OPTION>
            <OPTION value="Illinois Valley Community College"> Illinois Valley Community College</OPTION>
            <OPTION value="Immaculata University"> Immaculata University</OPTION>
            <OPTION value="Indian Hills Community College"> Indian Hills Community College</OPTION>
            <OPTION value="Indian River State College"> Indian River State College</OPTION>
            <OPTION value="Indiana State University"> Indiana State University</OPTION>
            <OPTION value="Indiana University East"> Indiana University East</OPTION>
            <OPTION value="Indiana University Kokomo"> Indiana University Kokomo</OPTION>
            <OPTION value="Indiana University of Pennsylvania"> Indiana University of Pennsylvania</OPTION>
            <OPTION value="Indiana University South Bend"> Indiana University South Bend</OPTION>
            <OPTION value="Indiana University Southeast"> Indiana University Southeast</OPTION>
            <OPTION value="Indiana University-Purdue University Fort Wayne"> Indiana University-Purdue University Fort Wayne</OPTION>
            <OPTION value="Indiana University-Purdue University Indianapolis"> Indiana University-Purdue University Indianapolis</OPTION>
            <OPTION value="Indiana Wesleyan University"> Indiana Wesleyan University</OPTION>
            <OPTION value="inlingua Florida"> inlingua Florida</OPTION>
            <OPTION value="inlingua Metro New York"> inlingua Metro New York</OPTION>
            <OPTION value="Institute of Allied Medical Professions - Delray Beach"> Institute of Allied Medical Professions - Delray Beach</OPTION>
            <OPTION value="Institute of Allied Medical Professions - Stamford"> Institute of Allied Medical Professions - Stamford</OPTION>
            <OPTION value="Inter American University of Puerto Rico - Aguadilla"> Inter American University of Puerto Rico - Aguadilla</OPTION>
            <OPTION value="Inter American University of Puerto Rico - Metropolitan Campus"> Inter American University of Puerto Rico - Metropolitan Campus</OPTION>
            <OPTION value="Inter American University of Puerto Rico - Ponce"> Inter American University of Puerto Rico - Ponce</OPTION>
            <OPTION value="Intercultural Communications College"> Intercultural Communications College</OPTION>
            <OPTION value="International Academy of Design and Technology - Tampa"> International Academy of Design and Technology - Tampa</OPTION>
            <OPTION value="Iona College"> Iona College</OPTION>
            <OPTION value="Iowa Central Community College"> Iowa Central Community College</OPTION>
            <OPTION value="Iowa State University"> Iowa State University</OPTION>
            <OPTION value="Iowa Valley Community College - Marshalltown Community College"> Iowa Valley Community College - Marshalltown Community College</OPTION>
            <OPTION value="Iowa Wesleyan College"> Iowa Wesleyan College</OPTION>
            <OPTION value="Iowa Western Community College"> Iowa Western Community College</OPTION>
            <OPTION value="Itawamba Community College"> Itawamba Community College</OPTION>
            <OPTION value="Ivy Tech Community College of Indiana"> Ivy Tech Community College of Indiana</OPTION>
            <OPTION value="J Sargeant Reynolds Community College"> J Sargeant Reynolds Community College</OPTION>
            <OPTION value="Jackson Community College"> Jackson Community College</OPTION>
            <OPTION value="Jackson State Community College"> Jackson State Community College</OPTION>
            <OPTION value="James H Faulkner State Community College"> James H Faulkner State Community College</OPTION>
            <OPTION value="Jamestown Community College"> Jamestown Community College</OPTION>
            <OPTION value="Jefferson College"> Jefferson College</OPTION>
            <OPTION value="Jefferson Community and Technical College"> Jefferson Community and Technical College</OPTION>
            <OPTION value="Jefferson Community College"> Jefferson Community College</OPTION>
            <OPTION value="Jefferson Davis Community College"> Jefferson Davis Community College</OPTION>
            <OPTION value="Jefferson State Community College"> Jefferson State Community College</OPTION>
            <OPTION value="Jefferson-Lewis-Hamilton-Herkimer-Oneida BOCES"> Jefferson-Lewis-Hamilton-Herkimer-Oneida BOCES</OPTION>
            <OPTION value="John A Logan College"> John A Logan College</OPTION>
            <OPTION value="John Brown University"> John Brown University</OPTION>
            <OPTION value="John C Calhoun State Community College"> John C Calhoun State Community College</OPTION>
            <OPTION value="John Carroll University"> John Carroll University</OPTION>
            <OPTION value="John Tyler Community College"> John Tyler Community College</OPTION>
            <OPTION value="Johns Hopkins University"> Johns Hopkins University</OPTION>
            <OPTION value="Johnson & Wales University"> Johnson & Wales University</OPTION>
            <OPTION value="Johnson County Community College"> Johnson County Community College</OPTION>
            <OPTION value="Joliet Junior College"> Joliet Junior College</OPTION>
            <OPTION value="Jones County Junior College"> Jones County Junior College</OPTION>
            <OPTION value="Kalamazoo Valley Community College"> Kalamazoo Valley Community College</OPTION>
            <OPTION value="Kansas City Kansas Community College"> Kansas City Kansas Community College</OPTION>
            <OPTION value="Kansas State University"> Kansas State University</OPTION>
            <OPTION value="Kaplan Career Institute - Nashville"> Kaplan Career Institute - Nashville</OPTION>
            <OPTION value="Kaplan College - Dallas"> Kaplan College - Dallas</OPTION>
            <OPTION value="Kaplan College - Hammond"> Kaplan College - Hammond</OPTION>
            <OPTION value="Kaplan College - Modesto Campus"> Kaplan College - Modesto Campus</OPTION>
            <OPTION value="Kaplan College - North Hollywood"> Kaplan College - North Hollywood</OPTION>
            <OPTION value="Kaplan College - San Diego"> Kaplan College - San Diego</OPTION>
            <OPTION value="Kaplan College - Vista"> Kaplan College - Vista</OPTION>
            <OPTION value="Kaskaskia College"> Kaskaskia College</OPTION>
            <OPTION value="Kean University"> Kean University</OPTION>
            <OPTION value="Keiser University"> Keiser University</OPTION>
            <OPTION value="Kellogg Community College"> Kellogg Community College</OPTION>
            <OPTION value="Kennebec Valley Community College"> Kennebec Valley Community College</OPTION>
            <OPTION value="Kent State University"> Kent State University</OPTION>
            <OPTION value="Keuka College"> Keuka College</OPTION>
            <OPTION value="Kilgore College"> Kilgore College</OPTION>
            <OPTION value="Kirkwood Community College"> Kirkwood Community College</OPTION>
            <OPTION value="Kutztown University of Pennsylvania"> Kutztown University of Pennsylvania</OPTION>
            <OPTION value="L.E. Fletcher Technical Community College"> L.E. Fletcher Technical Community College</OPTION>
            <OPTION value="La Roche College"> La Roche College</OPTION>
            <OPTION value="La Salle University"> La Salle University</OPTION>
            <OPTION value="Labette Community College"> Labette Community College</OPTION>
            <OPTION value="Lackawanna College"> Lackawanna College</OPTION>
            <OPTION value="LaGrange College"> LaGrange College</OPTION>
            <OPTION value="Lake Erie College of Osteopathic Medicine"> Lake Erie College of Osteopathic Medicine</OPTION>
            <OPTION value="Lake Land College"> Lake Land College</OPTION>
            <OPTION value="Lake Michigan College"> Lake Michigan College</OPTION>
            <OPTION value="Lake Superior College"> Lake Superior College</OPTION>
            <OPTION value="Lake Superior State University"> Lake Superior State University</OPTION>
            <OPTION value="Lake-Sumter State College"> Lake-Sumter State College</OPTION>
            <OPTION value="Lakeshore Technical College"> Lakeshore Technical College</OPTION>
            <OPTION value="Lakeview College of Nursing"> Lakeview College of Nursing</OPTION>
            <OPTION value="Lamar Institute of Technology"> Lamar Institute of Technology</OPTION>
            <OPTION value="Langston University"> Langston University</OPTION>
            <OPTION value="Lanier Technical College"> Lanier Technical College</OPTION>
            <OPTION value="Lansing Community College"> Lansing Community College</OPTION>
            <OPTION value="Laramie County Community College"> Laramie County Community College</OPTION>
            <OPTION value="Laredo Community College"> Laredo Community College</OPTION>
            <OPTION value="Lawrence Technological University"> Lawrence Technological University</OPTION>
            <OPTION value="Le Cordon Bleu College of Culinary Arts - Pasadena"> Le Cordon Bleu College of Culinary Arts - Pasadena</OPTION>
            <OPTION value="Lebanon Valley College"> Lebanon Valley College</OPTION>
            <OPTION value="Lehigh Carbon Community College"> Lehigh Carbon Community College</OPTION>
            <OPTION value="Lenoir Community College"> Lenoir Community College</OPTION>
            <OPTION value="Lesley University"> Lesley University</OPTION>
            <OPTION value="Lewis and Clark Community College"> Lewis and Clark Community College</OPTION>
            <OPTION value="Lewis University"> Lewis University</OPTION>
            <OPTION value="Lincoln Christian University"> Lincoln Christian University</OPTION>
            <OPTION value="Lincoln College of New England"> Lincoln College of New England</OPTION>
            <OPTION value="Lincoln College of Technology - Dayton"> Lincoln College of Technology - Dayton</OPTION>
            <OPTION value="Lincoln Land Community College"> Lincoln Land Community College</OPTION>
            <OPTION value="Lincoln Technical Institute - Edison"> Lincoln Technical Institute - Edison</OPTION>
            <OPTION value="Lincoln Technical Institute - Fern Park"> Lincoln Technical Institute - Fern Park</OPTION>
            <OPTION value="Lincoln University"> Lincoln University</OPTION>
            <OPTION value="Lindsey Wilson College"> Lindsey Wilson College</OPTION>
            <OPTION value="Linn State Technical College"> Linn State Technical College</OPTION>
            <OPTION value="Linn-Benton Community College"> Linn-Benton Community College</OPTION>
            <OPTION value="Lock Haven University of Pennsylvania"> Lock Haven University of Pennsylvania</OPTION>
            <OPTION value="Lone Star College System"> Lone Star College System</OPTION>
            <OPTION value="Long Island University - C W Post Campus"> Long Island University - C W Post Campus</OPTION>
            <OPTION value="Longwood University"> Longwood University</OPTION>
            <OPTION value="Lorain County Community College"> Lorain County Community College</OPTION>
            <OPTION value="Lorenzo Walker Institute of Technology"> Lorenzo Walker Institute of Technology</OPTION>
            <OPTION value="Louisiana State University - Shreveport"> Louisiana State University - Shreveport</OPTION>
            <OPTION value="Louisiana State University Health Sciences Center at New Orleans"> Louisiana State University Health Sciences Center at New Orleans</OPTION>
            <OPTION value="Lourdes University"> Lourdes University</OPTION>
            <OPTION value="Loyola Marymount University"> Loyola Marymount University</OPTION>
            <OPTION value="Loyola University Maryland"> Loyola University Maryland</OPTION>
            <OPTION value="Loyola University of Chicago"> Loyola University of Chicago</OPTION>
            <OPTION value="Luna Community College"> Luna Community College</OPTION>
            <OPTION value="Lurleen B Wallace Community College"> Lurleen B Wallace Community College</OPTION>
            <OPTION value="Lutheran Services New York Alliance"> Lutheran Services New York Alliance</OPTION>
            <OPTION value="Luzerne County Community College"> Luzerne County Community College</OPTION>
            <OPTION value="Macomb Community College"> Macomb Community College</OPTION>
            <OPTION value="Madison Area Technical College"> Madison Area Technical College</OPTION>
            <OPTION value="Madisonville Community College"> Madisonville Community College</OPTION>
            <OPTION value="Madonna University"> Madonna University</OPTION>
            <OPTION value="Malone University"> Malone University</OPTION>
            <OPTION value="Manatee Technical Institute"> Manatee Technical Institute</OPTION>
            <OPTION value="Manchester University"> Manchester University</OPTION>
            <OPTION value="Manhattan Area Technical College"> Manhattan Area Technical College</OPTION>
            <OPTION value="Manhattanville College"> Manhattanville College</OPTION>
            <OPTION value="Mansfield University of Pennsylvania"> Mansfield University of Pennsylvania</OPTION>
            <OPTION value="Maria College"> Maria College</OPTION>
            <OPTION value="Marian University"> Marian University</OPTION>
            <OPTION value="Maricopa Community Colleges - Chandler-Gilbert Community College"> Maricopa Community Colleges - Chandler-Gilbert Community College</OPTION>
            <OPTION value="Maricopa Community Colleges - Estrella Mountain Community College"> Maricopa Community Colleges - Estrella Mountain Community College</OPTION>
            <OPTION value="Maricopa Community Colleges - Gateway Community College"> Maricopa Community Colleges - Gateway Community College</OPTION>
            <OPTION value="Maricopa Community Colleges - Glendale Community College"> Maricopa Community Colleges - Glendale Community College</OPTION>
            <OPTION value="Maricopa Community Colleges - Mesa Community College"> Maricopa Community Colleges - Mesa Community College</OPTION>
            <OPTION value="Maricopa Community Colleges - Paradise Valley Community College"> Maricopa Community Colleges - Paradise Valley Community College</OPTION>
            <OPTION value="Maricopa Community Colleges - Phoenix College"> Maricopa Community Colleges - Phoenix College</OPTION>
            <OPTION value="Maricopa Community Colleges - Rio Salado Community College"> Maricopa Community Colleges - Rio Salado Community College</OPTION>
            <OPTION value="Maricopa Community Colleges - Scottsdale Community College"> Maricopa Community Colleges - Scottsdale Community College</OPTION>
            <OPTION value="Marion Technical College"> Marion Technical College</OPTION>
            <OPTION value="Marquette University"> Marquette University</OPTION>
            <OPTION value="Marshall University"> Marshall University</OPTION>
            <OPTION value="Martin Community College"> Martin Community College</OPTION>
            <OPTION value="Mary Baldwin College"> Mary Baldwin College</OPTION>
            <OPTION value="Maryland Institute College of Art"> Maryland Institute College of Art</OPTION>
            <OPTION value="Maryville University of Saint Louis"> Maryville University of Saint Louis</OPTION>
            <OPTION value="Marywood University"> Marywood University</OPTION>
            <OPTION value="Massachusetts Bay Community College"> Massachusetts Bay Community College</OPTION>
            <OPTION value="Massachusetts College of Pharmacy & Health Sciences"> Massachusetts College of Pharmacy & Health Sciences</OPTION>
            <OPTION value="Massasoit Community College"> Massasoit Community College</OPTION>
            <OPTION value="Mattia College"> Mattia College</OPTION>
            <OPTION value="Maynard A Traviss Career Center"> Maynard A Traviss Career Center</OPTION>
            <OPTION value="Mayville State University"> Mayville State University</OPTION>
            <OPTION value="McDaniel College"> McDaniel College</OPTION>
            <OPTION value="McKendree University"> McKendree University</OPTION>
            <OPTION value="McPherson College"> McPherson College</OPTION>
            <OPTION value="Med Tech College - Indianapolis"> Med Tech College - Indianapolis</OPTION>
            <OPTION value="Medix School - Towson"> Medix School - Towson</OPTION>
            <OPTION value="MedSpa Careers Institute"> MedSpa Careers Institute</OPTION>
            <OPTION value="MedVance Institute - Baton Rouge"> MedVance Institute - Baton Rouge</OPTION>
            <OPTION value="Memorial Hermann Hospital/Memorial Hermann Children<OPTION value="s Hospital"> Memorial Hermann Hospital/Memorial Hermann Children<OPTION value="s Hospital</OPTION>
            <OPTION value="Mercer County Community College"> Mercer County Community College</OPTION>
            <OPTION value="Mercer University"> Mercer University</OPTION>
            <OPTION value="Mercy College - Dobbs Ferry"> Mercy College - Dobbs Ferry</OPTION>
            <OPTION value="Mercyhurst College"> Mercyhurst College</OPTION>
            <OPTION value="Messiah College"> Messiah College</OPTION>
            <OPTION value="Metro Technology Centers"> Metro Technology Centers</OPTION>
            <OPTION value="Metropolitan Community College"> Metropolitan Community College</OPTION>
            <OPTION value="Metropolitan Community College - Kansas City"> Metropolitan Community College - Kansas City</OPTION>
            <OPTION value="Metropolitan State University"> Metropolitan State University</OPTION>
            <OPTION value="Metropolitan State University of Denver"> Metropolitan State University of Denver</OPTION>
            <OPTION value="Miami Dade College"> Miami Dade College</OPTION>
            <OPTION value="Miami University"> Miami University</OPTION>
            <OPTION value="Michigan State University"> Michigan State University</OPTION>
            <OPTION value="Mid Michigan Community College"> Mid Michigan Community College</OPTION>
            <OPTION value="Mid-Plains Community College - South Campus"> Mid-Plains Community College - South Campus</OPTION>
            <OPTION value="Mid-State Technical College"> Mid-State Technical College</OPTION>
            <OPTION value="MidAmerica Nazarene University"> MidAmerica Nazarene University</OPTION>
            <OPTION value="Middle Georgia College"> Middle Georgia College</OPTION>
            <OPTION value="Middlebury College"> Middlebury College</OPTION>
            <OPTION value="Middlesex Community College - Bedford"> Middlesex Community College - Bedford</OPTION>
            <OPTION value="Midland College"> Midland College</OPTION>
            <OPTION value="Midland University"> Midland University</OPTION>
            <OPTION value="Midlands Technical College"> Midlands Technical College</OPTION>
            <OPTION value="Midwestern University"> Midwestern University</OPTION>
            <OPTION value="Miller-Motte Technical College - Clarksville"> Miller-Motte Technical College - Clarksville</OPTION>
            <OPTION value="Millersville University of Pennsylvania"> Millersville University of Pennsylvania</OPTION>
            <OPTION value="Millikin University"> Millikin University</OPTION>
            <OPTION value="Milwaukee Area Technical College"> Milwaukee Area Technical College</OPTION>
            <OPTION value="Milwaukee School of Engineering"> Milwaukee School of Engineering</OPTION>
            <OPTION value="Mineral Area College"> Mineral Area College</OPTION>
            <OPTION value="Minneapolis Community and Technical College"> Minneapolis Community and Technical College</OPTION>
            <OPTION value="Minnesota School of Business"> Minnesota School of Business</OPTION>
            <OPTION value="Minnesota State Community and Technical College"> Minnesota State Community and Technical College</OPTION>
            <OPTION value="Minnesota State University - Mankato"> Minnesota State University - Mankato</OPTION>
            <OPTION value="Minnesota State University - Moorhead"> Minnesota State University - Moorhead</OPTION>
            <OPTION value="Minnesota West Community and Technical College"> Minnesota West Community and Technical College</OPTION>
            <OPTION value="Minot State University"> Minot State University</OPTION>
            <OPTION value="Misericordia University"> Misericordia University</OPTION>
            <OPTION value="Mississippi College"> Mississippi College</OPTION>
            <OPTION value="Mississippi Gulf Coast Community College"> Mississippi Gulf Coast Community College</OPTION>
            <OPTION value="Mississippi State University"> Mississippi State University</OPTION>
            <OPTION value="Missouri Baptist University"> Missouri Baptist University</OPTION>
            <OPTION value="Missouri Southern State University"> Missouri Southern State University</OPTION>
            <OPTION value="Missouri State University"> Missouri State University</OPTION>
            <OPTION value="Missouri State University-West Plains"> Missouri State University-West Plains</OPTION>
            <OPTION value="Missouri Valley College"> Missouri Valley College</OPTION>
            <OPTION value="Missouri Western State University"> Missouri Western State University</OPTION>
            <OPTION value="Mitchell Technical Institute"> Mitchell Technical Institute</OPTION>
            <OPTION value="Moberly Area Community College"> Moberly Area Community College</OPTION>
            <OPTION value="Mohave Community College"> Mohave Community College</OPTION>
            <OPTION value="Mohawk Valley Community College"> Mohawk Valley Community College</OPTION>
            <OPTION value="Molloy College"> Molloy College</OPTION>
            <OPTION value="Monmouth University"> Monmouth University</OPTION>
            <OPTION value="Monroe College"> Monroe College</OPTION>
            <OPTION value="Monroe Community College"> Monroe Community College</OPTION>
            <OPTION value="Monroe County Community College"> Monroe County Community College</OPTION>
            <OPTION value="Montclair State University"> Montclair State University</OPTION>
            <OPTION value="Montgomery College"> Montgomery College</OPTION>
            <OPTION value="Montgomery County Community College"> Montgomery County Community College</OPTION>
            <OPTION value="Montreat College"> Montreat College</OPTION>
            <OPTION value="Moody Bible Institute"> Moody Bible Institute</OPTION>
            <OPTION value="Moraine Park Technical College"> Moraine Park Technical College</OPTION>
            <OPTION value="Moraine Valley Community College"> Moraine Valley Community College</OPTION>
            <OPTION value="Morgan Community College"> Morgan Community College</OPTION>
            <OPTION value="Morningside College"> Morningside College</OPTION>
            <OPTION value="Motlow State Community College"> Motlow State Community College</OPTION>
            <OPTION value="Moultrie Technical College"> Moultrie Technical College</OPTION>
            <OPTION value="Mount Aloysius College"> Mount Aloysius College</OPTION>
            <OPTION value="Mount Carmel College of Nursing"> Mount Carmel College of Nursing</OPTION>
            <OPTION value="Mount Marty College"> Mount Marty College</OPTION>
            <OPTION value="Mount Mercy University"> Mount Mercy University</OPTION>
            <OPTION value="Mount St Mary<OPTION value="s University"> Mount St Mary<OPTION value="s University</OPTION>
            <OPTION value="Mount Vernon Nazarene University"> Mount Vernon Nazarene University</OPTION>
            <OPTION value="Mount Wachusett Community College"> Mount Wachusett Community College</OPTION>
            <OPTION value="Mountain State University"> Mountain State University</OPTION>
            <OPTION value="Mountainland Applied Technology"> Mountainland Applied Technology</OPTION>
            <OPTION value="Mountwest Community and Technical College"> Mountwest Community and Technical College</OPTION>
            <OPTION value="Multnomah University"> Multnomah University</OPTION>
            <OPTION value="Murray State College"> Murray State College</OPTION>
            <OPTION value="Murray State University"> Murray State University</OPTION>
            <OPTION value="Muskegon Community College"> Muskegon Community College</OPTION>
            <OPTION value="Nashville State Community College"> Nashville State Community College</OPTION>
            <OPTION value="National American University - Rapid City"> National American University - Rapid City</OPTION>
            <OPTION value="National Louis University"> National Louis University</OPTION>
            <OPTION value="National University"> National University</OPTION>
            <OPTION value="National University of Health Sciences"> National University of Health Sciences</OPTION>
            <OPTION value="Navarro College"> Navarro College</OPTION>
            <OPTION value="Nazareth College of Rochester"> Nazareth College of Rochester</OPTION>
            <OPTION value="Nebraska Wesleyan University"> Nebraska Wesleyan University</OPTION>
            <OPTION value="Neosho County Community College"> Neosho County Community College</OPTION>
            <OPTION value="Neumann University"> Neumann University</OPTION>
            <OPTION value="New England Institute of Technology"> New England Institute of Technology</OPTION>
            <OPTION value="New Jersey City University"> New Jersey City University</OPTION>
            <OPTION value="New Mexico Highlands University"> New Mexico Highlands University</OPTION>
            <OPTION value="New Mexico State University"> New Mexico State University</OPTION>
            <OPTION value="New Mexico State University - Carlsbad"> New Mexico State University - Carlsbad</OPTION>
            <OPTION value="New Mexico State University at Alamogordo"> New Mexico State University at Alamogordo</OPTION>
            <OPTION value="New Orleans Baptist Theological Seminary"> New Orleans Baptist Theological Seminary</OPTION>
            <OPTION value="New River Community and Technical College"> New River Community and Technical College</OPTION>
            <OPTION value="New York Chiropractic College"> New York Chiropractic College</OPTION>
            <OPTION value="New York Institute of Technology - Old Westbury"> New York Institute of Technology - Old Westbury</OPTION>
            <OPTION value="New York Language Center"> New York Language Center</OPTION>
            <OPTION value="New York University"> New York University</OPTION>
            <OPTION value="Newman University"> Newman University</OPTION>
            <OPTION value="Niagara County Community College"> Niagara County Community College</OPTION>
            <OPTION value="Niagara University"> Niagara University</OPTION>
            <OPTION value="Nicolet Area Technical College"> Nicolet Area Technical College</OPTION>
            <OPTION value="North Arkansas College"> North Arkansas College</OPTION>
            <OPTION value="North Carolina Wesleyan College"> North Carolina Wesleyan College</OPTION>
            <OPTION value="North Central Kansas Technical College"> North Central Kansas Technical College</OPTION>
            <OPTION value="North Central Missouri College"> North Central Missouri College</OPTION>
            <OPTION value="North Central State College"> North Central State College</OPTION>
            <OPTION value="North Country Community College"> North Country Community College</OPTION>
            <OPTION value="North Dakota State College of Science"> North Dakota State College of Science</OPTION>
            <OPTION value="North Dakota State University - Main Campus"> North Dakota State University - Main Campus</OPTION>
            <OPTION value="North Hennepin Community College"> North Hennepin Community College</OPTION>
            <OPTION value="North Park University"> North Park University</OPTION>
            <OPTION value="Northampton County Area Community College"> Northampton County Area Community College</OPTION>
            <OPTION value="Northcentral Technical College"> Northcentral Technical College</OPTION>
            <OPTION value="Northeast Community College"> Northeast Community College</OPTION>
            <OPTION value="Northeast Iowa Community College"> Northeast Iowa Community College</OPTION>
            <OPTION value="Northeast State Technical Community College"> Northeast State Technical Community College</OPTION>
            <OPTION value="Northeast Texas Community College"> Northeast Texas Community College</OPTION>
            <OPTION value="Northeast Wisconsin Technical College"> Northeast Wisconsin Technical College</OPTION>
            <OPTION value="Northeastern Illinois University"> Northeastern Illinois University</OPTION>
            <OPTION value="Northeastern Oklahoma A&M College"> Northeastern Oklahoma A&M College</OPTION>
            <OPTION value="Northeastern Seminary at Roberts Wesleyan College"> Northeastern Seminary at Roberts Wesleyan College</OPTION>
            <OPTION value="Northeastern State University"> Northeastern State University</OPTION>
            <OPTION value="Northeastern University"> Northeastern University</OPTION>
            <OPTION value="Northern Arizona University"> Northern Arizona University</OPTION>
            <OPTION value="Northern Essex Community College"> Northern Essex Community College</OPTION>
            <OPTION value="Northern Illinois University"> Northern Illinois University</OPTION>
            <OPTION value="Northern Kentucky University"> Northern Kentucky University</OPTION>
            <OPTION value="Northern Maine Community College"> Northern Maine Community College</OPTION>
            <OPTION value="Northern Michigan University"> Northern Michigan University</OPTION>
            <OPTION value="Northern New Mexico College"> Northern New Mexico College</OPTION>
            <OPTION value="Northern Oklahoma College"> Northern Oklahoma College</OPTION>
            <OPTION value="Northern State University"> Northern State University</OPTION>
            <OPTION value="Northern Virginia Community College"> Northern Virginia Community College</OPTION>
            <OPTION value="Northern Wyoming Community College District - Sheridan College"> Northern Wyoming Community College District - Sheridan College</OPTION>
            <OPTION value="Northland Community and Technical College"> Northland Community and Technical College</OPTION>
            <OPTION value="Northland Pioneer College"> Northland Pioneer College</OPTION>
            <OPTION value="Northwest College"> Northwest College</OPTION>
            <OPTION value="Northwest Mississippi Community College"> Northwest Mississippi Community College</OPTION>
            <OPTION value="Northwest Missouri State University"> Northwest Missouri State University</OPTION>
            <OPTION value="Northwest State Community College"> Northwest State Community College</OPTION>
            <OPTION value="Northwest Technical College"> Northwest Technical College</OPTION>
            <OPTION value="Northwestern College - Chicago"> Northwestern College - Chicago</OPTION>
            <OPTION value="Northwestern Michigan College"> Northwestern Michigan College</OPTION>
            <OPTION value="Northwestern Oklahoma State University"> Northwestern Oklahoma State University</OPTION>
            <OPTION value="Northwestern State University of Louisiana"> Northwestern State University of Louisiana</OPTION>
            <OPTION value="Northwestern University"> Northwestern University</OPTION>
            <OPTION value="Notre Dame of Maryland University"> Notre Dame of Maryland University</OPTION>
            <OPTION value="Nova Southeastern University"> Nova Southeastern University</OPTION>
            <OPTION value="Nyack College"> Nyack College</OPTION>
            <OPTION value="Oakland City University"> Oakland City University</OPTION>
            <OPTION value="Oakland Community College"> Oakland Community College</OPTION>
            <OPTION value="Oakland University"> Oakland University</OPTION>
            <OPTION value="Oakton Community College"> Oakton Community College</OPTION>
            <OPTION value="Ocean County College"> Ocean County College</OPTION>
            <OPTION value="Oconee Fall Line Technical College"> Oconee Fall Line Technical College</OPTION>
            <OPTION value="Ohio Dominican University"> Ohio Dominican University</OPTION>
            <OPTION value="Ohio Northern University"> Ohio Northern University</OPTION>
            <OPTION value="Ohio State University"> Ohio State University</OPTION>
            <OPTION value="Ohio University - Main Campus"> Ohio University - Main Campus</OPTION>
            <OPTION value="Okaloosa-Walton College"> Okaloosa-Walton College</OPTION>
            <OPTION value="Oklahoma Baptist University"> Oklahoma Baptist University</OPTION>
            <OPTION value="Oklahoma Christian University"> Oklahoma Christian University</OPTION>
            <OPTION value="Oklahoma City Community College"> Oklahoma City Community College</OPTION>
            <OPTION value="Oklahoma City University"> Oklahoma City University</OPTION>
            <OPTION value="Oklahoma State University"> Oklahoma State University</OPTION>
            <OPTION value="Oklahoma State University - Oklahoma City"> Oklahoma State University - Oklahoma City</OPTION>
            <OPTION value="Oklahoma State University Institute of Technology - Okmulgee"> Oklahoma State University Institute of Technology - Okmulgee</OPTION>
            <OPTION value="Oklahoma Wesleyan University"> Oklahoma Wesleyan University</OPTION>
            <OPTION value="Olivet Nazarene University"> Olivet Nazarene University</OPTION>
            <OPTION value="Onondaga-Cortland-Madison BOCES"> Onondaga-Cortland-Madison BOCES</OPTION>
            <OPTION value="Orange County Community College"> Orange County Community College</OPTION>
            <OPTION value="Orange-Ulster BOCES"> Orange-Ulster BOCES</OPTION>
            <OPTION value="Orangeburg Calhoun Technical College"> Orangeburg Calhoun Technical College</OPTION>
            <OPTION value="Our Lady of the Lake University"> Our Lady of the Lake University</OPTION>
            <OPTION value="Owens Community College"> Owens Community College</OPTION>
            <OPTION value="Owensboro Community and Technical College"> Owensboro Community and Technical College</OPTION>
            <OPTION value="Ozarks Technical Community College"> Ozarks Technical Community College</OPTION>
            <OPTION value="Pace University - New York"> Pace University - New York</OPTION>
            <OPTION value="Pacific University"> Pacific University</OPTION>
            <OPTION value="Palm Beach Atlantic University - West Palm Beach"> Palm Beach Atlantic University - West Palm Beach</OPTION>
            <OPTION value="Palm Beach State College"> Palm Beach State College</OPTION>
            <OPTION value="Palmetto Health"> Palmetto Health</OPTION>
            <OPTION value="Panola College"> Panola College</OPTION>
            <OPTION value="Paris Junior College"> Paris Junior College</OPTION>
            <OPTION value="Park University"> Park University</OPTION>
            <OPTION value="Parkland College"> Parkland College</OPTION>
            <OPTION value="Partners HealthCare System"> Partners HealthCare System</OPTION>
            <OPTION value="Pasco-Hernando State College"> Pasco-Hernando State College</OPTION>
            <OPTION value="Passaic County Community College"> Passaic County Community College</OPTION>
            <OPTION value="Pearl River Community College"> Pearl River Community College</OPTION>
            <OPTION value="Pellissippi State Community College"> Pellissippi State Community College</OPTION>
            <OPTION value="Pennsylvania College of Technology"> Pennsylvania College of Technology</OPTION>
            <OPTION value="Pennsylvania State University - Penn State Main Campus"> Pennsylvania State University - Penn State Main Campus</OPTION>
            <OPTION value="Pensacola State College"> Pensacola State College</OPTION>
            <OPTION value="Pentecostal Theological Seminary"> Pentecostal Theological Seminary</OPTION>
            <OPTION value="Peru State College"> Peru State College</OPTION>
            <OPTION value="Pfeiffer University"> Pfeiffer University</OPTION>
            <OPTION value="Philadelphia College of Osteopathic Medicine"> Philadelphia College of Osteopathic Medicine</OPTION>
            <OPTION value="Philadelphia University"> Philadelphia University</OPTION>
            <OPTION value="Phillips Community College of the University of Arkansas"> Phillips Community College of the University of Arkansas</OPTION>
            <OPTION value="Phoebe Ministries"> Phoebe Ministries</OPTION>
            <OPTION value="Piedmont College"> Piedmont College</OPTION>
            <OPTION value="Piedmont Technical College"> Piedmont Technical College</OPTION>
            <OPTION value="Pierce College at Puyallup"> Pierce College at Puyallup</OPTION>
            <OPTION value="Pierpont Community and Technical College"> Pierpont Community and Technical College</OPTION>
            <OPTION value="Pikes Peak Community College"> Pikes Peak Community College</OPTION>
            <OPTION value="Pima Community College"> Pima Community College</OPTION>
            <OPTION value="Pima Medical Institute - Tucson"> Pima Medical Institute - Tucson</OPTION>
            <OPTION value="Pinellas Technical Education Center - St. Petersburg Campus"> Pinellas Technical Education Center - St. Petersburg Campus</OPTION>
            <OPTION value="Pittsburg State University"> Pittsburg State University</OPTION>
            <OPTION value="Pittsburgh Theological Seminary"> Pittsburgh Theological Seminary</OPTION>
            <OPTION value="Plymouth State University"> Plymouth State University</OPTION>
            <OPTION value="Point Park University"> Point Park University</OPTION>
            <OPTION value="Polk State College"> Polk State College</OPTION>
            <OPTION value="Pontifical Catholic University of Puerto Rico"> Pontifical Catholic University of Puerto Rico</OPTION>
            <OPTION value="Porter and Chester Institute - Stratford"> Porter and Chester Institute - Stratford</OPTION>
            <OPTION value="Prairie View A & M University"> Prairie View A & M University</OPTION>
            <OPTION value="Pratt Community College"> Pratt Community College</OPTION>
            <OPTION value="Pratt Institute-Main"> Pratt Institute-Main</OPTION>
            <OPTION value="Praxis Institute"> Praxis Institute</OPTION>
            <OPTION value="Presentation College"> Presentation College</OPTION>
            <OPTION value="Prince George<OPTION value="s Community College"> Prince George<OPTION value="s Community College</OPTION>
            <OPTION value="Pueblo Community College"> Pueblo Community College</OPTION>
            <OPTION value="Pulaski Technical College"> Pulaski Technical College</OPTION>
            <OPTION value="Purdue University"> Purdue University</OPTION>
            <OPTION value="Purdue University - North Central"> Purdue University - North Central</OPTION>
            <OPTION value="Queens College of the City University of New York"> Queens College of the City University of New York</OPTION>
            <OPTION value="Quincy College"> Quincy College</OPTION>
            <OPTION value="Quincy University"> Quincy University</OPTION>
            <OPTION value="Quinsigamond Community College"> Quinsigamond Community College</OPTION>
            <OPTION value="Ramapo College of New Jersey"> Ramapo College of New Jersey</OPTION>
            <OPTION value="Randolph Community College"> Randolph Community College</OPTION>
            <OPTION value="Raritan Valley Community College"> Raritan Valley Community College</OPTION>
            <OPTION value="Rasmussen College"> Rasmussen College</OPTION>
            <OPTION value="Reading Area Community College"> Reading Area Community College</OPTION>
            <OPTION value="Red Rocks Community College"> Red Rocks Community College</OPTION>
            <OPTION value="Redlands Community College"> Redlands Community College</OPTION>
            <OPTION value="Regis University"> Regis University</OPTION>
            <OPTION value="Reinhardt University"> Reinhardt University</OPTION>
            <OPTION value="Relay Graduate School of Education"> Relay Graduate School of Education</OPTION>
            <OPTION value="Rend Lake College"> Rend Lake College</OPTION>
            <OPTION value="Resurrection University"> Resurrection University</OPTION>
            <OPTION value="Richmond School of Health and Technology - RSHT"> Richmond School of Health and Technology - RSHT</OPTION>
            <OPTION value="Rider University"> Rider University</OPTION>
            <OPTION value="Ridgewater College"> Ridgewater College</OPTION>
            <OPTION value="Riverland Community College"> Riverland Community College</OPTION>
            <OPTION value="Roane State Community College"> Roane State Community College</OPTION>
            <OPTION value="Robert Morris University"> Robert Morris University</OPTION>
            <OPTION value="Robert Morris University - Illinois"> Robert Morris University - Illinois</OPTION>
            <OPTION value="Roberts Wesleyan College"> Roberts Wesleyan College</OPTION>
            <OPTION value="Rochester College"> Rochester College</OPTION>
            <OPTION value="Rock Valley College"> Rock Valley College</OPTION>
            <OPTION value="Rockland Community College"> Rockland Community College</OPTION>
            <OPTION value="Rogers State University"> Rogers State University</OPTION>
            <OPTION value="Roosevelt University"> Roosevelt University</OPTION>
            <OPTION value="Rose State College"> Rose State College</OPTION>
            <OPTION value="Ross Medical Education Center - Brighton"> Ross Medical Education Center - Brighton</OPTION>
            <OPTION value="Ross Medical Education Center - Flint"> Ross Medical Education Center - Flint</OPTION>
            <OPTION value="Ross Medical Education Center - Lansing"> Ross Medical Education Center - Lansing</OPTION>
            <OPTION value="Ross Medical Education Center - Madison Heights"> Ross Medical Education Center - Madison Heights</OPTION>
            <OPTION value="Rowan University"> Rowan University</OPTION>
            <OPTION value="Rowan-Cabarrus Community College"> Rowan-Cabarrus Community College</OPTION>
            <OPTION value="Rutgers, The State University of New Jersey"> Rutgers, The State University of New Jersey</OPTION>
            <OPTION value="Sacred Heart University"> Sacred Heart University</OPTION>
            <OPTION value="Saginaw Valley State University"> Saginaw Valley State University</OPTION>
            <OPTION value="Saint Ambrose University"> Saint Ambrose University</OPTION>
            <OPTION value="Saint Anthony College of Nursing"> Saint Anthony College of Nursing</OPTION>
            <OPTION value="Saint Cloud State University"> Saint Cloud State University</OPTION>
            <OPTION value="Saint Francis University"> Saint Francis University</OPTION>
            <OPTION value="Saint John Fisher College"> Saint John Fisher College</OPTION>
            <OPTION value="Saint John<OPTION value="s Seminary"> Saint John<OPTION value="s Seminary</OPTION>
            <OPTION value="Saint Joseph<OPTION value="s College, New York"> Saint Joseph<OPTION value="s College, New York</OPTION>
            <OPTION value="Saint Josephs College"> Saint Josephs College</OPTION>
            <OPTION value="Saint Leo University"> Saint Leo University</OPTION>
            <OPTION value="Saint Louis Community College"> Saint Louis Community College</OPTION>
            <OPTION value="Saint Louis University-Main Campus"> Saint Louis University-Main Campus</OPTION>
            <OPTION value="Saint Mary<OPTION value="s University of Minnesota"> Saint Mary<OPTION value="s University of Minnesota</OPTION>
            <OPTION value="Saint Michaels College"> Saint Michaels College</OPTION>
            <OPTION value="Saint Paul School of Theology"> Saint Paul School of Theology</OPTION>
            <OPTION value="Saint Peter<OPTION value="s University"> Saint Peter<OPTION value="s University</OPTION>
            <OPTION value="Saint Xavier University"> Saint Xavier University</OPTION>
            <OPTION value="Salem State University"> Salem State University</OPTION>
            <OPTION value="Salisbury University"> Salisbury University</OPTION>
            <OPTION value="Salt Lake Community College"> Salt Lake Community College</OPTION>
            <OPTION value="Salter College"> Salter College</OPTION>
            <OPTION value="Salus University"> Salus University</OPTION>
            <OPTION value="Salve Regina University"> Salve Regina University</OPTION>
            <OPTION value="San Jacinto College District"> San Jacinto College District</OPTION>
            <OPTION value="San Joaquin Valley College"> San Joaquin Valley College</OPTION>
            <OPTION value="San Juan College"> San Juan College</OPTION>
            <OPTION value="Sanford-Brown College - Atlanta"> Sanford-Brown College - Atlanta</OPTION>
            <OPTION value="Sanford-Brown College - Collinsville"> Sanford-Brown College - Collinsville</OPTION>
            <OPTION value="Sanford-Brown Institute - Jacksonville"> Sanford-Brown Institute - Jacksonville</OPTION>
            <OPTION value="Santa Clara University"> Santa Clara University</OPTION>
            <OPTION value="Santa Fe College"> Santa Fe College</OPTION>
            <OPTION value="Santa Fe Community College"> Santa Fe Community College</OPTION>
            <OPTION value="Sarasota County Technical Institute"> Sarasota County Technical Institute</OPTION>
            <OPTION value="Sauk Valley Community College"> Sauk Valley Community College</OPTION>
            <OPTION value="Savannah Technical College"> Savannah Technical College</OPTION>
            <OPTION value="SBI Campus - An Affiliate of Sanford-Brown"> SBI Campus - An Affiliate of Sanford-Brown</OPTION>
            <OPTION value="Schenectady County Community College"> Schenectady County Community College</OPTION>
            <OPTION value="Schoolcraft College"> Schoolcraft College</OPTION>
            <OPTION value="Seacoast Career Schools"> Seacoast Career Schools</OPTION>
            <OPTION value="Seattle University"> Seattle University</OPTION>
            <OPTION value="Seminole State College"> Seminole State College</OPTION>
            <OPTION value="Seminole State College of Florida"> Seminole State College of Florida</OPTION>
            <OPTION value="Seton Hall University"> Seton Hall University</OPTION>
            <OPTION value="Shawnee Community College"> Shawnee Community College</OPTION>
            <OPTION value="Shelton State Community College"> Shelton State Community College</OPTION>
            <OPTION value="Shenandoah University"> Shenandoah University</OPTION>
            <OPTION value="Shepherd University"> Shepherd University</OPTION>
            <OPTION value="Shippensburg University of Pennsylvania"> Shippensburg University of Pennsylvania</OPTION>
            <OPTION value="Shorter University"> Shorter University</OPTION>
            <OPTION value="Siena Heights University"> Siena Heights University</OPTION>
            <OPTION value="Silver Lake College"> Silver Lake College</OPTION>
            <OPTION value="Simmons College"> Simmons College</OPTION>
            <OPTION value="Simpson College"> Simpson College</OPTION>
            <OPTION value="Sinclair Community College"> Sinclair Community College</OPTION>
            <OPTION value="Sistema Universitario Ana G Mendez - Universidad Del Este"> Sistema Universitario Ana G Mendez - Universidad Del Este</OPTION>
            <OPTION value="Sistema Universitario Ana G Mendez - Universidad Del Turabo"> Sistema Universitario Ana G Mendez - Universidad Del Turabo</OPTION>
            <OPTION value="Sistema Universitario Ana G Mendez - Universidad Metropolitana"> Sistema Universitario Ana G Mendez - Universidad Metropolitana</OPTION>
            <OPTION value="Slippery Rock University of Pennsylvania"> Slippery Rock University of Pennsylvania</OPTION>
            <OPTION value="Snow College"> Snow College</OPTION>
            <OPTION value="Somerset Community College"> Somerset Community College</OPTION>
            <OPTION value="Sonoma College"> Sonoma College</OPTION>
            <OPTION value="South Arkansas Community College"> South Arkansas Community College</OPTION>
            <OPTION value="South Baylo University"> South Baylo University</OPTION>
            <OPTION value="South Central College"> South Central College</OPTION>
            <OPTION value="South College"> South College</OPTION>
            <OPTION value="South Dakota State University"> South Dakota State University</OPTION>
            <OPTION value="South Hills School of Business and Technology - State College"> South Hills School of Business and Technology - State College</OPTION>
            <OPTION value="South Plains College"> South Plains College</OPTION>
            <OPTION value="South Suburban College of Cook County"> South Suburban College of Cook County</OPTION>
            <OPTION value="South Texas College"> South Texas College</OPTION>
            <OPTION value="South University-Savannah"> South University-Savannah</OPTION>
            <OPTION value="Southcentral Kentucky Community and Technical College"> Southcentral Kentucky Community and Technical College</OPTION>
            <OPTION value="Southeast Community College Area"> Southeast Community College Area</OPTION>
            <OPTION value="Southeast Kentucky Community and Technical College"> Southeast Kentucky Community and Technical College</OPTION>
            <OPTION value="Southeast Missouri State University"> Southeast Missouri State University</OPTION>
            <OPTION value="Southeastern Illinois College"> Southeastern Illinois College</OPTION>
            <OPTION value="Southeastern Oklahoma State University"> Southeastern Oklahoma State University</OPTION>
            <OPTION value="Southern Arkansas University Main Campus"> Southern Arkansas University Main Campus</OPTION>
            <OPTION value="Southern Connecticut State University"> Southern Connecticut State University</OPTION>
            <OPTION value="Southern Illinois University Carbondale"> Southern Illinois University Carbondale</OPTION>
            <OPTION value="Southern Illinois University Edwardsville"> Southern Illinois University Edwardsville</OPTION>
            <OPTION value="Southern Maine Community College"> Southern Maine Community College</OPTION>
            <OPTION value="Southern Methodist University"> Southern Methodist University</OPTION>
            <OPTION value="Southern Nazarene University"> Southern Nazarene University</OPTION>
            <OPTION value="Southern State Community College"> Southern State Community College</OPTION>
            <OPTION value="Southern Union State Community College"> Southern Union State Community College</OPTION>
            <OPTION value="Southern University and A & M College"> Southern University and A & M College</OPTION>
            <OPTION value="Southern Wesleyan University"> Southern Wesleyan University</OPTION>
            <OPTION value="Southern West Virginia Community and Technical College"> Southern West Virginia Community and Technical College</OPTION>
            <OPTION value="Southwest Baptist University"> Southwest Baptist University</OPTION>
            <OPTION value="Southwest Florida College - Fort Myers"> Southwest Florida College - Fort Myers</OPTION>
            <OPTION value="Southwest Georgia Technical College"> Southwest Georgia Technical College</OPTION>
            <OPTION value="Southwest Minnesota State University"> Southwest Minnesota State University</OPTION>
            <OPTION value="Southwest Tennessee Community College"> Southwest Tennessee Community College</OPTION>
            <OPTION value="Southwest Virginia Community College"> Southwest Virginia Community College</OPTION>
            <OPTION value="Southwestern Baptist Theological Seminary"> Southwestern Baptist Theological Seminary</OPTION>
            <OPTION value="Southwestern College"> Southwestern College</OPTION>
            <OPTION value="Southwestern Community College"> Southwestern Community College</OPTION>
            <OPTION value="Southwestern Illinois College"> Southwestern Illinois College</OPTION>
            <OPTION value="Southwestern Oklahoma State University"> Southwestern Oklahoma State University</OPTION>
            <OPTION value="Spartanburg Technical College"> Spartanburg Technical College</OPTION>
            <OPTION value="Spencerian College - Louisville"> Spencerian College - Louisville</OPTION>
            <OPTION value="Spring Arbor University"> Spring Arbor University</OPTION>
            <OPTION value="Spring International Language Center"> Spring International Language Center</OPTION>
            <OPTION value="Springfield College"> Springfield College</OPTION>
            <OPTION value="St Charles Community College"> St Charles Community College</OPTION>
            <OPTION value="St. Bonaventure University"> St. Bonaventure University</OPTION>
            <OPTION value="St. Catherine University"> St. Catherine University</OPTION>
            <OPTION value="St. John<OPTION value="s University - New York"> St. John<OPTION value="s University - New York</OPTION>
            <OPTION value="St. Johns River State College"> St. Johns River State College</OPTION>
            <OPTION value="St. Louis College of Health Careers - Metro"> St. Louis College of Health Careers - Metro</OPTION>
            <OPTION value="St. Mary<OPTION value="s Bay Area CPE Center"> St. Mary<OPTION value="s Bay Area CPE Center</OPTION>
            <OPTION value="St. Petersburg College"> St. Petersburg College</OPTION>
            <OPTION value="St. Philip<OPTION value="s College"> St. Philip<OPTION value="s College</OPTION>
            <OPTION value="St. Thomas Aquinas College"> St. Thomas Aquinas College</OPTION>
            <OPTION value="Stark State College"> Stark State College</OPTION>
            <OPTION value="State Fair Community College"> State Fair Community College</OPTION>
            <OPTION value="Stetson University"> Stetson University</OPTION>
            <OPTION value="Stevens-Henager College-Ogden"> Stevens-Henager College-Ogden</OPTION>
            <OPTION value="Stone Academy - Hamden"> Stone Academy - Hamden</OPTION>
            <OPTION value="Stratford University"> Stratford University</OPTION>
            <OPTION value="Suffolk County Community College"> Suffolk County Community College</OPTION>
            <OPTION value="Suffolk University"> Suffolk University</OPTION>
            <OPTION value="Sullivan County Community College"> Sullivan County Community College</OPTION>
            <OPTION value="Sullivan University"> Sullivan University</OPTION>
            <OPTION value="SUNYUpstate Medical University"> SUNYUpstate Medical University</OPTION>
            <OPTION value="SUNY - Potsdam"> SUNY - Potsdam</OPTION>
            <OPTION value="SUNY at Albany"> SUNY at Albany</OPTION>
            <OPTION value="SUNY at Binghamton"> SUNY at Binghamton</OPTION>
            <OPTION value="SUNY at Buffalo"> SUNY at Buffalo</OPTION>
            <OPTION value="SUNY at Stony Brook"> SUNY at Stony Brook</OPTION>
            <OPTION value="SUNY College at Brockport"> SUNY College at Brockport</OPTION>
            <OPTION value="SUNY College at Buffalo"> SUNY College at Buffalo</OPTION>
            <OPTION value="SUNY College at Cortland"> SUNY College at Cortland</OPTION>
            <OPTION value="SUNY College at Oneonta"> SUNY College at Oneonta</OPTION>
            <OPTION value="SUNY College at Oswego"> SUNY College at Oswego</OPTION>
            <OPTION value="SUNY College at Plattsburgh"> SUNY College at Plattsburgh</OPTION>
            <OPTION value="SUNY College of Agriculture & Technology at Morrisville"> SUNY College of Agriculture & Technology at Morrisville</OPTION>
            <OPTION value="SUNY College of Technology at Alfred"> SUNY College of Technology at Alfred</OPTION>
            <OPTION value="SUNY College of Technology at Canton"> SUNY College of Technology at Canton</OPTION>
            <OPTION value="SUNY College of Technology at Delhi"> SUNY College of Technology at Delhi</OPTION>
            <OPTION value="SUNY Empire State College"> SUNY Empire State College</OPTION>
            <OPTION value="SUNY Institute of Technology at Utica - Rome"> SUNY Institute of Technology at Utica - Rome</OPTION>
            <OPTION value="SUNY Westchester Community College"> SUNY Westchester Community College</OPTION>
            <OPTION value="Surry Community College"> Surry Community College</OPTION>
            <OPTION value="T.A. Lawson State Community College"> T.A. Lawson State Community College</OPTION>
            <OPTION value="Tabor College"> Tabor College</OPTION>
            <OPTION value="Tallahassee Community College"> Tallahassee Community College</OPTION>
            <OPTION value="Tarleton State University"> Tarleton State University</OPTION>
            <OPTION value="Tarrant County College District"> Tarrant County College District</OPTION>
            <OPTION value="Taylor University"> Taylor University</OPTION>
            <OPTION value="Teachers College at Columbia University"> Teachers College at Columbia University</OPTION>
            <OPTION value="Technical College of the Lowcountry"> Technical College of the Lowcountry</OPTION>
            <OPTION value="Temple University"> Temple University</OPTION>
            <OPTION value="Tennessee College of Applied Technology Murfreesboro"> Tennessee College of Applied Technology Murfreesboro</OPTION>
            <OPTION value="Tennessee Wesleyan College"> Tennessee Wesleyan College</OPTION>
            <OPTION value="Texarkana College"> Texarkana College</OPTION>
            <OPTION value="Texas A & M University"> Texas A & M University</OPTION>
            <OPTION value="Texas A & M University - Commerce"> Texas A & M University - Commerce</OPTION>
            <OPTION value="Texas A & M University - Kingsville"> Texas A & M University - Kingsville</OPTION>
            <OPTION value="Texas A & M University System Health Science Center"> Texas A & M University System Health Science Center</OPTION>
            <OPTION value="Texas County Technical College"> Texas County Technical College</OPTION>
            <OPTION value="Texas State Technical College - Waco"> Texas State Technical College - Waco</OPTION>
            <OPTION value="Texas State University"> Texas State University</OPTION>
            <OPTION value="Texas Tech University Health Sciences Center"> Texas Tech University Health Sciences Center</OPTION>
            <OPTION value="Texas Wesleyan University"> Texas Wesleyan University</OPTION>
            <OPTION value="Texas Woman<OPTION value="s University"> Texas Woman<OPTION value="s University</OPTION>
            <OPTION value="The Art Institute of Atlanta"> The Art Institute of Atlanta</OPTION>
            <OPTION value="The Art Institute of Phoenix"> The Art Institute of Phoenix</OPTION>
            <OPTION value="The Baptist College of Florida"> The Baptist College of Florida</OPTION>
            <OPTION value="The College of Health Care Professions"> The College of Health Care Professions</OPTION>
            <OPTION value="The College of New Jersey"> The College of New Jersey</OPTION>
            <OPTION value="The College of New Rochelle"> The College of New Rochelle</OPTION>
            <OPTION value="The Community College of Baltimore County"> The Community College of Baltimore County</OPTION>
            <OPTION value="The Graduate School and University Center of the City University of New York"> The Graduate School and University Center of the City University of New York</OPTION>
            <OPTION value="The Midwest CPE Program Baptist-Lutheran Medical Center"> The Midwest CPE Program Baptist-Lutheran Medical Center</OPTION>
            <OPTION value="The Richard Stockton College of New Jersey"> The Richard Stockton College of New Jersey</OPTION>
            <OPTION value="The Sage Colleges"> The Sage Colleges</OPTION>
            <OPTION value="The Southern Baptist Theological Seminary"> The Southern Baptist Theological Seminary</OPTION>
            <OPTION value="The University of Findlay"> The University of Findlay</OPTION>
            <OPTION value="The University of Tennessee - Martin"> The University of Tennessee - Martin</OPTION>
            <OPTION value="The University of Texas at Arlington"> The University of Texas at Arlington</OPTION>
            <OPTION value="The University of Texas at San Antonio"> The University of Texas at San Antonio</OPTION>
            <OPTION value="The University of Texas at Tyler"> The University of Texas at Tyler</OPTION>
            <OPTION value="The University of Texas Health Science - San Antonio"> The University of Texas Health Science - San Antonio</OPTION>
            <OPTION value="The University of Texas Health Science Center at Houston"> The University of Texas Health Science Center at Houston</OPTION>
            <OPTION value="The University of West Florida"> The University of West Florida</OPTION>
            <OPTION value="Thomas Edison State College"> Thomas Edison State College</OPTION>
            <OPTION value="Thomas Jefferson University"> Thomas Jefferson University</OPTION>
            <OPTION value="Thomas More College"> Thomas More College</OPTION>
            <OPTION value="Thomas Nelson Community College"> Thomas Nelson Community College</OPTION>
            <OPTION value="Three Rivers Community College"> Three Rivers Community College</OPTION>
            <OPTION value="Tidewater Community College"> Tidewater Community College</OPTION>
            <OPTION value="Toccoa Falls College"> Toccoa Falls College</OPTION>
            <OPTION value="Tompkins-Cortland Community College"> Tompkins-Cortland Community College</OPTION>
            <OPTION value="Touro College"> Touro College</OPTION>
            <OPTION value="Touro University"> Touro University</OPTION>
            <OPTION value="Towson University"> Towson University</OPTION>
            <OPTION value="Trident Technical College"> Trident Technical College</OPTION>
            <OPTION value="Trine University"> Trine University</OPTION>
            <OPTION value="Trinity Christian College"> Trinity Christian College</OPTION>
            <OPTION value="Trinity International University"> Trinity International University</OPTION>
            <OPTION value="Trinity Valley Community College"> Trinity Valley Community College</OPTION>
            <OPTION value="Trinity Washington University"> Trinity Washington University</OPTION>
            <OPTION value="Trocaire College"> Trocaire College</OPTION>
            <OPTION value="Troy University"> Troy University</OPTION>
            <OPTION value="Tufts University"> Tufts University</OPTION>
            <OPTION value="Tulane University"> Tulane University</OPTION>
            <OPTION value="Tulsa Community College"> Tulsa Community College</OPTION>
            <OPTION value="U. S. Army Medical Department Center and School"> U. S. Army Medical Department Center and School</OPTION>
            <OPTION value="Uintah Basin Applied Technology College"> Uintah Basin Applied Technology College</OPTION>
            <OPTION value="Uniformed Services University of the Health Sciences"> Uniformed Services University of the Health Sciences</OPTION>
            <OPTION value="Union College"> Union College</OPTION>
            <OPTION value="Union County College"> Union County College</OPTION>
            <OPTION value="Union Graduate College"> Union Graduate College</OPTION>
            <OPTION value="Union University"> Union University</OPTION>
            <OPTION value="Universidad Adventista de las Antillas"> Universidad Adventista de las Antillas</OPTION>
            <OPTION value="University of Akron"> University of Akron</OPTION>
            <OPTION value="University of Alaska Fairbanks"> University of Alaska Fairbanks</OPTION>
            <OPTION value="University of Arizona"> University of Arizona</OPTION>
            <OPTION value="University of Arkansas at Little Rock"> University of Arkansas at Little Rock</OPTION>
            <OPTION value="University of Arkansas at Monticello"> University of Arkansas at Monticello</OPTION>
            <OPTION value="University of Arkansas at Pine Bluff"> University of Arkansas at Pine Bluff</OPTION>
            <OPTION value="University of Arkansas Community College-Batesville"> University of Arkansas Community College-Batesville</OPTION>
            <OPTION value="University of Arkansas Community College-Hope"> University of Arkansas Community College-Hope</OPTION>
            <OPTION value="University of Arkansas for Medical Sciences"> University of Arkansas for Medical Sciences</OPTION>
            <OPTION value="University of Arkansas, Fayetteville"> University of Arkansas, Fayetteville</OPTION>
            <OPTION value="University of Arkansas-Fort Smith"> University of Arkansas-Fort Smith</OPTION>
            <OPTION value="University of Baltimore"> University of Baltimore</OPTION>
            <OPTION value="University of Bridgeport"> University of Bridgeport</OPTION>
            <OPTION value="University of California - Davis"> University of California - Davis</OPTION>
            <OPTION value="University of Central Arkansas"> University of Central Arkansas</OPTION>
            <OPTION value="University of Central Florida"> University of Central Florida</OPTION>
            <OPTION value="University of Central Missouri"> University of Central Missouri</OPTION>
            <OPTION value="University of Central Oklahoma"> University of Central Oklahoma</OPTION>
            <OPTION value="University of Charleston"> University of Charleston</OPTION>
            <OPTION value="University of Chicago"> University of Chicago</OPTION>
            <OPTION value="University of Cincinnati - Clermont College"> University of Cincinnati - Clermont College</OPTION>
            <OPTION value="University of Colorado at Colorado Springs"> University of Colorado at Colorado Springs</OPTION>
            <OPTION value="University of Colorado Denver"> University of Colorado Denver</OPTION>
            <OPTION value="University of Connecticut"> University of Connecticut</OPTION>
            <OPTION value="University of Dayton"> University of Dayton</OPTION>
            <OPTION value="University of Delaware"> University of Delaware</OPTION>
            <OPTION value="University of Denver"> University of Denver</OPTION>
            <OPTION value="University of Detroit Mercy"> University of Detroit Mercy</OPTION>
            <OPTION value="University of Dubuque"> University of Dubuque</OPTION>
            <OPTION value="University of Hartford"> University of Hartford</OPTION>
            <OPTION value="University of Houston-Clear Lake"> University of Houston-Clear Lake</OPTION>
            <OPTION value="University of Illinois at Chicago"> University of Illinois at Chicago</OPTION>
            <OPTION value="University of Illinois at Urbana-Champaign"> University of Illinois at Urbana-Champaign</OPTION>
            <OPTION value="University of Indianapolis"> University of Indianapolis</OPTION>
            <OPTION value="University of Iowa"> University of Iowa</OPTION>
            <OPTION value="University of Jamestown"> University of Jamestown</OPTION>
            <OPTION value="University of Kansas"> University of Kansas</OPTION>
            <OPTION value="University of Kentucky"> University of Kentucky</OPTION>
            <OPTION value="University of Maine"> University of Maine</OPTION>
            <OPTION value="University of Maine at Augusta"> University of Maine at Augusta</OPTION>
            <OPTION value="University of Maine at Presque Isle"> University of Maine at Presque Isle</OPTION>
            <OPTION value="University of Mary"> University of Mary</OPTION>
            <OPTION value="University of Mary Washington"> University of Mary Washington</OPTION>
            <OPTION value="University of Maryland - Baltimore County"> University of Maryland - Baltimore County</OPTION>
            <OPTION value="University of Maryland - College Park"> University of Maryland - College Park</OPTION>
            <OPTION value="University of Maryland - Eastern Shore"> University of Maryland - Eastern Shore</OPTION>
            <OPTION value="University of Massachusetts - Dartmouth"> University of Massachusetts - Dartmouth</OPTION>
            <OPTION value="University of Massachusetts Amherst"> University of Massachusetts Amherst</OPTION>
            <OPTION value="University of Medicine and Dentistry of New Jersey"> University of Medicine and Dentistry of New Jersey</OPTION>
            <OPTION value="University of Miami"> University of Miami</OPTION>
            <OPTION value="University of Michigan - Ann Arbor"> University of Michigan - Ann Arbor</OPTION>
            <OPTION value="University of Michigan - Flint"> University of Michigan - Flint</OPTION>
            <OPTION value="University of Minnesota - Duluth"> University of Minnesota - Duluth</OPTION>
            <OPTION value="University of Minnesota - Twin Cities"> University of Minnesota - Twin Cities</OPTION>
            <OPTION value="University of Minnesota Medical Center, Fairview"> University of Minnesota Medical Center, Fairview</OPTION>
            <OPTION value="University of Missouri - Columbia"> University of Missouri - Columbia</OPTION>
            <OPTION value="University of Missouri - Kansas City"> University of Missouri - Kansas City</OPTION>
            <OPTION value="University of Missouri - St Louis"> University of Missouri - St Louis</OPTION>
            <OPTION value="University of Nebraska - Lincoln"> University of Nebraska - Lincoln</OPTION>
            <OPTION value="University of Nebraska at Kearney"> University of Nebraska at Kearney</OPTION>
            <OPTION value="University of Nebraska at Omaha"> University of Nebraska at Omaha</OPTION>
            <OPTION value="University of Nebraska Medical Center"> University of Nebraska Medical Center</OPTION>
            <OPTION value="University of Nevada - Las Vegas"> University of Nevada - Las Vegas</OPTION>
            <OPTION value="University of New England"> University of New England</OPTION>
            <OPTION value="University of New Hampshire"> University of New Hampshire</OPTION>
            <OPTION value="University of New Haven"> University of New Haven</OPTION>
            <OPTION value="University of New Mexico-Main Campus"> University of New Mexico-Main Campus</OPTION>
            <OPTION value="University of New Orleans"> University of New Orleans</OPTION>
            <OPTION value="University of North Carolina at Charlotte"> University of North Carolina at Charlotte</OPTION>
            <OPTION value="University of North Dakota"> University of North Dakota</OPTION>
            <OPTION value="University of Northern Colorado"> University of Northern Colorado</OPTION>
            <OPTION value="University of Northern Iowa"> University of Northern Iowa</OPTION>
            <OPTION value="University of Notre Dame"> University of Notre Dame</OPTION>
            <OPTION value="University of Oklahoma"> University of Oklahoma</OPTION>
            <OPTION value="University of Pennsylvania"> University of Pennsylvania</OPTION>
            <OPTION value="University of Phoenix"> University of Phoenix</OPTION>
            <OPTION value="University of Pittsburgh - Main Campus"> University of Pittsburgh - Main Campus</OPTION>
            <OPTION value="University of Puerto Rico - Mayaguez"> University of Puerto Rico - Mayaguez</OPTION>
            <OPTION value="University of Puerto Rico - Medical Sciences Campus"> University of Puerto Rico - Medical Sciences Campus</OPTION>
            <OPTION value="University of Puerto Rico - Rio Piedras Campus"> University of Puerto Rico - Rio Piedras Campus</OPTION>
            <OPTION value="University of Rhode Island"> University of Rhode Island</OPTION>
            <OPTION value="University of Rochester"> University of Rochester</OPTION>
            <OPTION value="University of Saint Francis - Fort Wayne"> University of Saint Francis - Fort Wayne</OPTION>
            <OPTION value="University of Saint Joseph"> University of Saint Joseph</OPTION>
            <OPTION value="University of Saint Mary"> University of Saint Mary</OPTION>
            <OPTION value="University of Scranton"> University of Scranton</OPTION>
            <OPTION value="University of Sioux Falls"> University of Sioux Falls</OPTION>
            <OPTION value="University of South Alabama"> University of South Alabama</OPTION>
            <OPTION value="University of South Carolina - Beaufort"> University of South Carolina - Beaufort</OPTION>
            <OPTION value="University of South Carolina - Columbia"> University of South Carolina - Columbia</OPTION>
            <OPTION value="University of South Dakota"> University of South Dakota</OPTION>
            <OPTION value="University of South Florida"> University of South Florida</OPTION>
            <OPTION value="University of Southern California"> University of Southern California</OPTION>
            <OPTION value="University of Southern Maine"> University of Southern Maine</OPTION>
            <OPTION value="University of Southern Mississippi"> University of Southern Mississippi</OPTION>
            <OPTION value="University of St. Augustine for Health Sciences"> University of St. Augustine for Health Sciences</OPTION>
            <OPTION value="University of St. Francis"> University of St. Francis</OPTION>
            <OPTION value="University of St. Thomas"> University of St. Thomas</OPTION>
            <OPTION value="University of Tennessee"> University of Tennessee</OPTION>
            <OPTION value="University of the District of Columbia"> University of the District of Columbia</OPTION>
            <OPTION value="University of the Incarnate Word"> University of the Incarnate Word</OPTION>
            <OPTION value="University of the Pacific"> University of the Pacific</OPTION>
            <OPTION value="University of the Sciences"> University of the Sciences</OPTION>
            <OPTION value="University of the Virgin Islands"> University of the Virgin Islands</OPTION>
            <OPTION value="University of Toledo"> University of Toledo</OPTION>
            <OPTION value="University of Virginia"> University of Virginia</OPTION>
            <OPTION value="University of West Georgia"> University of West Georgia</OPTION>
            <OPTION value="University of Wisconsin - Eau Claire"> University of Wisconsin - Eau Claire</OPTION>
            <OPTION value="University of Wisconsin - Green Bay"> University of Wisconsin - Green Bay</OPTION>
            <OPTION value="University of Wisconsin - La Crosse"> University of Wisconsin - La Crosse</OPTION>
            <OPTION value="University of Wisconsin - Madison"> University of Wisconsin - Madison</OPTION>
            <OPTION value="University of Wisconsin - Milwaukee"> University of Wisconsin - Milwaukee</OPTION>
            <OPTION value="University of Wisconsin - Oshkosh"> University of Wisconsin - Oshkosh</OPTION>
            <OPTION value="University of Wisconsin - Platteville"> University of Wisconsin - Platteville</OPTION>
            <OPTION value="University of Wisconsin - River Falls"> University of Wisconsin - River Falls</OPTION>
            <OPTION value="University of Wisconsin - Stevens Point"> University of Wisconsin - Stevens Point</OPTION>
            <OPTION value="University of Wisconsin - Stout"> University of Wisconsin - Stout</OPTION>
            <OPTION value="University of Wisconsin - Whitewater"> University of Wisconsin - Whitewater</OPTION>
            <OPTION value="University of Wyoming"> University of Wyoming</OPTION>
            <OPTION value="Upper Iowa University"> Upper Iowa University</OPTION>
            <OPTION value="Urbana University"> Urbana University</OPTION>
            <OPTION value="Ursuline College"> Ursuline College</OPTION>
            <OPTION value="VA Midwest Health Care Network (VISN 23)"> VA Midwest Health Care Network (VISN 23)</OPTION>
            <OPTION value="Valencia College"> Valencia College</OPTION>
            <OPTION value="Valley City State University"> Valley City State University</OPTION>
            <OPTION value="Valparaiso University"> Valparaiso University</OPTION>
            <OPTION value="Vance-Granville Community College"> Vance-Granville Community College</OPTION>
            <OPTION value="Vermont Technical College"> Vermont Technical College</OPTION>
            <OPTION value="Villanova University"> Villanova University</OPTION>
            <OPTION value="Vincennes University"> Vincennes University</OPTION>
            <OPTION value="Virginia College - Birmingham"> Virginia College - Birmingham</OPTION>
            <OPTION value="Virginia Polytechnic Institute and State University"> Virginia Polytechnic Institute and State University</OPTION>
            <OPTION value="Virginia State University"> Virginia State University</OPTION>
            <OPTION value="Virginia Western Community College"> Virginia Western Community College</OPTION>
            <OPTION value="Vista College"> Vista College</OPTION>
            <OPTION value="VITAS">Innovative Hospice Care"> VITAS">Innovative Hospice Care</OPTION>
            <OPTION value="Viterbo University"> Viterbo University</OPTION>
            <OPTION value="Wagner College"> Wagner College</OPTION>
            <OPTION value="Wake Technical Community College"> Wake Technical Community College</OPTION>
            <OPTION value="Wallace State Community College- Hanceville"> Wallace State Community College- Hanceville</OPTION>
            <OPTION value="Walsh University"> Walsh University</OPTION>
            <OPTION value="Walters State Community College"> Walters State Community College</OPTION>
            <OPTION value="Warren County Community College"> Warren County Community College</OPTION>
            <OPTION value="Washburn University"> Washburn University</OPTION>
            <OPTION value="Washington Adventist University"> Washington Adventist University</OPTION>
            <OPTION value="Washington Bible College and Capital Bible Seminary"> Washington Bible College and Capital Bible Seminary</OPTION>
            <OPTION value="Washington State Community College"> Washington State Community College</OPTION>
            <OPTION value="Washington University in St Louis"> Washington University in St Louis</OPTION>
            <OPTION value="Washington-Saratoga-Warren-Hamilton-Essex BOCES"> Washington-Saratoga-Warren-Hamilton-Essex BOCES</OPTION>
            <OPTION value="Waukesha County Technical College"> Waukesha County Technical College</OPTION>
            <OPTION value="Wayland Baptist University"> Wayland Baptist University</OPTION>
            <OPTION value="Wayne Community College"> Wayne Community College</OPTION>
            <OPTION value="Wayne County Community College District"> Wayne County Community College District</OPTION>
            <OPTION value="Wayne State College"> Wayne State College</OPTION>
            <OPTION value="Wayne State University"> Wayne State University</OPTION>
            <OPTION value="Waynesburg University"> Waynesburg University</OPTION>
            <OPTION value="Webster University"> Webster University</OPTION>
            <OPTION value="WellSpan Health"> WellSpan Health</OPTION>
            <OPTION value="Wesley College"> Wesley College</OPTION>
            <OPTION value="Wesleyan College"> Wesleyan College</OPTION>
            <OPTION value="West Central Technical College"> West Central Technical College</OPTION>
            <OPTION value="West Chester University of Pennsylvania"> West Chester University of Pennsylvania</OPTION>
            <OPTION value="West Coast University"> West Coast University</OPTION>
            <OPTION value="West Georgia Technical College"> West Georgia Technical College</OPTION>
            <OPTION value="West Liberty University"> West Liberty University</OPTION>
            <OPTION value="West Virginia Northern Community College"> West Virginia Northern Community College</OPTION>
            <OPTION value="West Virginia University"> West Virginia University</OPTION>
            <OPTION value="West Virginia University at Parkersburg"> West Virginia University at Parkersburg</OPTION>
            <OPTION value="Western Illinois University"> Western Illinois University</OPTION>
            <OPTION value="Western Iowa Tech Community College"> Western Iowa Tech Community College</OPTION>
            <OPTION value="Western Kentucky University"> Western Kentucky University</OPTION>
            <OPTION value="Western Michigan University"> Western Michigan University</OPTION>
            <OPTION value="Western Nebraska Community College"> Western Nebraska Community College</OPTION>
            <OPTION value="Western New England College"> Western New England College</OPTION>
            <OPTION value="Western New Mexico University"> Western New Mexico University</OPTION>
            <OPTION value="Western Oklahoma State College"> Western Oklahoma State College</OPTION>
            <OPTION value="Western Technical College"> Western Technical College</OPTION>
            <OPTION value="Western Wyoming Community College"> Western Wyoming Community College</OPTION>
            <OPTION value="Westmoreland County Community College"> Westmoreland County Community College</OPTION>
            <OPTION value="Wharton County Junior College"> Wharton County Junior College</OPTION>
            <OPTION value="Wheaton College"> Wheaton College</OPTION>
            <OPTION value="Wheeling Jesuit University"> Wheeling Jesuit University</OPTION>
            <OPTION value="Wheelock College"> Wheelock College</OPTION>
            <OPTION value="Whittier College"> Whittier College</OPTION>
            <OPTION value="Wichita Area Technical College"> Wichita Area Technical College</OPTION>
            <OPTION value="Wichita State University"> Wichita State University</OPTION>
            <OPTION value="Widener University - Main Campus"> Widener University - Main Campus</OPTION>
            <OPTION value="Wilkes Community College"> Wilkes Community College</OPTION>
            <OPTION value="Wilkes University"> Wilkes University</OPTION>
            <OPTION value="William Carey University"> William Carey University</OPTION>
            <OPTION value="William Paterson University of New Jersey"> William Paterson University of New Jersey</OPTION>
            <OPTION value="William Rainey Harper College"> William Rainey Harper College</OPTION>
            <OPTION value="Williston State College"> Williston State College</OPTION>
            <OPTION value="Wilmington University"> Wilmington University</OPTION>
            <OPTION value="Wingate University"> Wingate University</OPTION>
            <OPTION value="Winona State University"> Winona State University</OPTION>
            <OPTION value="Wiregrass Georgia Technical College"> Wiregrass Georgia Technical College</OPTION>
            <OPTION value="Wisconsin Indianhead Technical College"> Wisconsin Indianhead Technical College</OPTION>
            <OPTION value="Wor-Wic Community College"> Wor-Wic Community College</OPTION>
            <OPTION value="Wright Career College"> Wright Career College</OPTION>
            <OPTION value="Wright State University"> Wright State University</OPTION>
            <OPTION value="Xavier University"> Xavier University</OPTION>
            <OPTION value="Yavapai College"> Yavapai College</OPTION>
            <OPTION value="Yeshiva University"> Yeshiva University</OPTION>
            <OPTION value="York College of Pennsylvania"> York College of Pennsylvania</OPTION>
            <OPTION value="Youngstown State University"> Youngstown State University</OPTION>
            <OPTION value="Zane State College"> Zane State College</OPTION>
            <OPTION value="4Cs The Center for Child Care Careers"> 4Cs The Center for Child Care Careers</OPTION>
            <OPTION value="Academia Morales"> Academia Morales</OPTION>
            <OPTION value="Academy of Cosmetology"> Academy of Cosmetology</OPTION>
            <OPTION value="Academy of Massage Therapy - Hackensack"> Academy of Massage Therapy - Hackensack</OPTION>
            <OPTION value="ACE Computer Training Center"> ACE Computer Training Center</OPTION>
            <OPTION value="Adler School of Professional Psychology"> Adler School of Professional Psychology</OPTION>
            <OPTION value="Advance Beauty College"> Advance Beauty College</OPTION>
            <OPTION value="Air Force Institute of Technology"> Air Force Institute of Technology</OPTION>
            <OPTION value="Alaska Bible College - Palmer"> Alaska Bible College - Palmer</OPTION>
            <OPTION value="Alaska Vocational Technical Center"> Alaska Vocational Technical Center</OPTION>
            <OPTION value="Albertus Magnus College"> Albertus Magnus College</OPTION>
            <OPTION value="Albright College"> Albright College</OPTION>
            <OPTION value="Alexandria Technical College"> Alexandria Technical College</OPTION>
            <OPTION value="Allen County Community College"> Allen County Community College</OPTION>
            <OPTION value="Allen School - Jamaica"> Allen School - Jamaica</OPTION>
            <OPTION value="Alliant International University"> Alliant International University</OPTION>
            <OPTION value="Allied Health Institute"> Allied Health Institute</OPTION>
            <OPTION value="Alpena Community College"> Alpena Community College</OPTION>
            <OPTION value="Altamaha Technical College"> Altamaha Technical College</OPTION>
            <OPTION value="American Academy of English"> American Academy of English</OPTION>
            <OPTION value="American Beauty Academy - Wheaton"> American Beauty Academy - Wheaton</OPTION>
            <OPTION value="American Broadcasting School"> American Broadcasting School</OPTION>
            <OPTION value="American Career Institute - Wheaton"> American Career Institute - Wheaton</OPTION>
            <OPTION value="American Commercial College - Abilene"> American Commercial College - Abilene</OPTION>
            <OPTION value="American Commercial College of Texas"> American Commercial College of Texas</OPTION>
            <OPTION value="American Educational College - Bayamon"> American Educational College - Bayamon</OPTION>
            <OPTION value="American Institute"> American Institute</OPTION>
            <OPTION value="American Institute of Beauty"> American Institute of Beauty</OPTION>
            <OPTION value="American InterContinental University"> American InterContinental University</OPTION>
            <OPTION value="American National University - Salem"> American National University - Salem</OPTION>
            <OPTION value="American Professional Institute - Gainesville"> American Professional Institute - Gainesville</OPTION>
            <OPTION value="American Professional Institute - Macon"> American Professional Institute - Macon</OPTION>
            <OPTION value="American University of Puerto Rico"> American University of Puerto Rico</OPTION>
            <OPTION value="Anabaptist Mennonite Biblical Seminary"> Anabaptist Mennonite Biblical Seminary</OPTION>
            <OPTION value="Anderson Medical Career College"> Anderson Medical Career College</OPTION>
            <OPTION value="Angeles College of Nursing"> Angeles College of Nursing</OPTION>
            <OPTION value="Angley College"> Angley College</OPTION>
            <OPTION value="Aquinas Institute of Theology"> Aquinas Institute of Theology</OPTION>
            <OPTION value="ARCLabs"> ARCLabs</OPTION>
            <OPTION value="Arizona College"> Arizona College</OPTION>
            <OPTION value="Arkansas State University - Beebe"> Arkansas State University - Beebe</OPTION>
            <OPTION value="Arkansas State University - Newport"> Arkansas State University - Newport</OPTION>
            <OPTION value="Artistic Nails and Beauty Academy"> Artistic Nails and Beauty Academy</OPTION>
            <OPTION value="ASA Institute of Business and Computer Technology"> ASA Institute of Business and Computer Technology</OPTION>
            <OPTION value="Asbury Theological Seminary"> Asbury Theological Seminary</OPTION>
            <OPTION value="Asher College"> Asher College</OPTION>
            <OPTION value="Ashland Theological Seminary"> Ashland Theological Seminary</OPTION>
            <OPTION value="ASI Career Institute - Turnersville"> ASI Career Institute - Turnersville</OPTION>
            <OPTION value="ASIS Massage Education"> ASIS Massage Education</OPTION>
            <OPTION value="Assumption College"> Assumption College</OPTION>
            <OPTION value="ATA Career Education"> ATA Career Education</OPTION>
            <OPTION value="ATI Career Training Center - Dallas"> ATI Career Training Center - Dallas</OPTION>
            <OPTION value="ATI Career Training Center - North Richland Hills"> ATI Career Training Center - North Richland Hills</OPTION>
            <OPTION value="Atlantic Technical Center"> Atlantic Technical Center</OPTION>
            <OPTION value="ATS Institute of Technology"> ATS Institute of Technology</OPTION>
            <OPTION value="Auburn Career Center"> Auburn Career Center</OPTION>
            <OPTION value="Aveda Institute - Covington"> Aveda Institute - Covington</OPTION>
            <OPTION value="Aveda Institute of Columbus"> Aveda Institute of Columbus</OPTION>
            <OPTION value="Aveda Institute South Florida"> Aveda Institute South Florida</OPTION>
            <OPTION value="Aveda Institute Tallahassee"> Aveda Institute Tallahassee</OPTION>
            <OPTION value="Aviation and Electronic Schools of America - Colfax"> Aviation and Electronic Schools of America - Colfax</OPTION>
            <OPTION value="Award Beauty School"> Award Beauty School</OPTION>
            <OPTION value="Axis Business Academy - Ben Crenshaw Campus"> Axis Business Academy - Ben Crenshaw Campus</OPTION>
            <OPTION value="Azure College"> Azure College</OPTION>
            <OPTION value="Babson College"> Babson College</OPTION>
            <OPTION value="Bainbridge Graduate Institute"> Bainbridge Graduate Institute</OPTION>
            <OPTION value="Baldwin Park Adult and Community Education"> Baldwin Park Adult and Community Education</OPTION>
            <OPTION value="Baltimore School of Massage"> Baltimore School of Massage</OPTION>
            <OPTION value="Bangor Theological Seminary"> Bangor Theological Seminary</OPTION>
            <OPTION value="Bard College"> Bard College</OPTION>
            <OPTION value="Barone Beauty Academy"> Barone Beauty Academy</OPTION>
            <OPTION value="Baton Rouge College"> Baton Rouge College</OPTION>
            <OPTION value="Bay Area College of Nursing"> Bay Area College of Nursing</OPTION>
            <OPTION value="Beauty Schools of America"> Beauty Schools of America</OPTION>
            <OPTION value="Beauty Technical College Inc"> Beauty Technical College Inc</OPTION>
            <OPTION value="Beckfield College"> Beckfield College</OPTION>
            <OPTION value="Bee-Jay<OPTION value="s Hairstyling Academy"> Bee-Jay<OPTION value="s Hairstyling Academy</OPTION>
            <OPTION value="Bella Capelli - A Paul Mitchell Partner School"> Bella Capelli - A Paul Mitchell Partner School</OPTION>
            <OPTION value="Bellefonte Academy of Beauty"> Bellefonte Academy of Beauty</OPTION>
            <OPTION value="Bellevue University"> Bellevue University</OPTION>
            <OPTION value="Bellus Academy"> Bellus Academy</OPTION>
            <OPTION value="Belmont Technical College"> Belmont Technical College</OPTION>
            <OPTION value="Bene<OPTION value="s International School of Beauty"> Bene<OPTION value="s International School of Beauty</OPTION>
            <OPTION value="Bergen County Technical Schools - Adult and Continuing Education"> Bergen County Technical Schools - Adult and Continuing Education</OPTION>
            <OPTION value="Berkeley College"> Berkeley College</OPTION>
            <OPTION value="Berlitz Language Centers"> Berlitz Language Centers</OPTION>
            <OPTION value="Bethany Theological Seminary"> Bethany Theological Seminary</OPTION>
            <OPTION value="Bismarck State College"> Bismarck State College</OPTION>
            <OPTION value="Bladen Community College"> Bladen Community College</OPTION>
            <OPTION value="Blake Austin College"> Blake Austin College</OPTION>
            <OPTION value="Boricua College"> Boricua College</OPTION>
            <OPTION value="Boston Graduate School of Psychoanalysis Inc"> Boston Graduate School of Psychoanalysis Inc</OPTION>
            <OPTION value="Brensten Education"> Brensten Education</OPTION>
            <OPTION value="Brescook, LLC Dale Carnegie Training"> Brescook, LLC Dale Carnegie Training</OPTION>
            <OPTION value="Briarcliffe College"> Briarcliffe College</OPTION>
            <OPTION value="Brillare Hairdressing Academy - Scottsdale"> Brillare Hairdressing Academy - Scottsdale</OPTION>
            <OPTION value="Brooks College"> Brooks College</OPTION>
            <OPTION value="Brooks Institute - Ventura"> Brooks Institute - Ventura</OPTION>
            <OPTION value="Brookstone College of Business - Charlotte"> Brookstone College of Business - Charlotte</OPTION>
            <OPTION value="Brown Aveda Institute"> Brown Aveda Institute</OPTION>
            <OPTION value="Bryan University"> Bryan University</OPTION>
            <OPTION value="Bryan University - Springfield"> Bryan University - Springfield</OPTION>
            <OPTION value="Buchanan Beauty College"> Buchanan Beauty College</OPTION>
            <OPTION value="Buena Vista University"> Buena Vista University</OPTION>
            <OPTION value="Burlington Technical Center"> Burlington Technical Center</OPTION>
            <OPTION value="Cabrini College"> Cabrini College</OPTION>
            <OPTION value="CALC Institute of Technology"> CALC Institute of Technology</OPTION>
            <OPTION value="California Hair Design Academy"> California Hair Design Academy</OPTION>
            <OPTION value="California Technical Education College"> California Technical Education College</OPTION>
            <OPTION value="California University of Management and Sciences"> California University of Management and Sciences</OPTION>
            <OPTION value="Cambria Rowe Business College"> Cambria Rowe Business College</OPTION>
            <OPTION value="Cambridge College"> Cambridge College</OPTION>
            <OPTION value="Cambridge Junior College - Yuba City"> Cambridge Junior College - Yuba City</OPTION>
            <OPTION value="Cankdeska Cikana Community College"> Cankdeska Cikana Community College</OPTION>
            <OPTION value="Capitol City Trade and Technical School"> Capitol City Trade and Technical School</OPTION>
            <OPTION value="Capitol College"> Capitol College</OPTION>
            <OPTION value="Capri Beauty College - Oak Forest"> Capri Beauty College - Oak Forest</OPTION>
            <OPTION value="Capri Cosmetology Learning Center"> Capri Cosmetology Learning Center</OPTION>
            <OPTION value="Career Academy of Hair Design"> Career Academy of Hair Design</OPTION>
            <OPTION value="Career Care Institute - Lancaster"> Career Care Institute - Lancaster</OPTION>
            <OPTION value="Career College of San Diego"> Career College of San Diego</OPTION>
            <OPTION value="Career Colleges of America - South Gate"> Career Colleges of America - South Gate</OPTION>
            <OPTION value="Career Institute of Health andTechnology"> Career Institute of Health andTechnology</OPTION>
            <OPTION value="Career Point College"> Career Point College</OPTION>
            <OPTION value="Career Quest Learning Center"> Career Quest Learning Center</OPTION>
            <OPTION value="Caribbean University - Bayamon"> Caribbean University - Bayamon</OPTION>
            <OPTION value="Carolina Beauty College 8"> Carolina Beauty College 8</OPTION>
            <OPTION value="Cazenovia College"> Cazenovia College</OPTION>
            <OPTION value="CC<OPTION value="s Cosmetology College"> CC<OPTION value="s Cosmetology College</OPTION>
            <OPTION value="CCI Training Center, Inc. - Arlington"> CCI Training Center, Inc. - Arlington</OPTION>
            <OPTION value="CDE Career Institute"> CDE Career Institute</OPTION>
            <OPTION value="Cedar Valley College"> Cedar Valley College</OPTION>
            <OPTION value="Centenary College"> Centenary College</OPTION>
            <OPTION value="Center for Allied Health and Nursing Education"> Center for Allied Health and Nursing Education</OPTION>
            <OPTION value="Center for Employment Training - San Jose"> Center for Employment Training - San Jose</OPTION>
            <OPTION value="Center for Explosive Ordnance Disposal and Diving"> Center for Explosive Ordnance Disposal and Diving</OPTION>
            <OPTION value="Center for Information Dominance (CID)"> Center for Information Dominance (CID)</OPTION>
            <OPTION value="Center for Naval Aviation Technical Training (CNATT)"> Center for Naval Aviation Technical Training (CNATT)</OPTION>
            <OPTION value="Center for Naval Engineering (CNE)"> Center for Naval Engineering (CNE)</OPTION>
            <OPTION value="Center for Naval Intelligence (CNI)"> Center for Naval Intelligence (CNI)</OPTION>
            <OPTION value="Central Baptist College"> Central Baptist College</OPTION>
            <OPTION value="Central Baptist Theological Seminary"> Central Baptist Theological Seminary</OPTION>
            <OPTION value="Central Bible College"> Central Bible College</OPTION>
            <OPTION value="Central Christian College of Kansas"> Central Christian College of Kansas</OPTION>
            <OPTION value="Central College of Cosmetology"> Central College of Cosmetology</OPTION>
            <OPTION value="Central Florida Institute - Palm Harbor"> Central Florida Institute - Palm Harbor</OPTION>
            <OPTION value="Central Louisiana Technical Community College - Alexandria"> Central Louisiana Technical Community College - Alexandria</OPTION>
            <OPTION value="Chancellor University"> Chancellor University</OPTION>
            <OPTION value="Charles of Italy Beauty College"> Charles of Italy Beauty College</OPTION>
            <OPTION value="Charter College"> Charter College</OPTION>
            <OPTION value="Charter College - Canyon Country"> Charter College - Canyon Country</OPTION>
            <OPTION value="Chatfield College"> Chatfield College</OPTION>
            <OPTION value="Chestnut Hill College"> Chestnut Hill College</OPTION>
            <OPTION value="Chicago School of Professional Psychology"> Chicago School of Professional Psychology</OPTION>
            <OPTION value="Christendom College"> Christendom College</OPTION>
            <OPTION value="Clarendon College"> Clarendon College</OPTION>
            <OPTION value="Clark University"> Clark University</OPTION>
            <OPTION value="Cleary University"> Cleary University</OPTION>
            <OPTION value="Cleveland University-Kansas City"> Cleveland University-Kansas City</OPTION>
            <OPTION value="Coast Career Institute"> Coast Career Institute</OPTION>
            <OPTION value="Coastal College"> Coastal College</OPTION>
            <OPTION value="Coconino County Community College"> Coconino County Community College</OPTION>
            <OPTION value="Coffeyville Community College"> Coffeyville Community College</OPTION>
            <OPTION value="Coleman University"> Coleman University</OPTION>
            <OPTION value="College of Business and Technology"> College of Business and Technology</OPTION>
            <OPTION value="Columbia Centro Universitario"> Columbia Centro Universitario</OPTION>
            <OPTION value="Community Christian College"> Community Christian College</OPTION>
            <OPTION value="Community College of Aurora"> Community College of Aurora</OPTION>
            <OPTION value="Community College of Vermont"> Community College of Vermont</OPTION>
            <OPTION value="Community Enhancement Services - CES College"> Community Enhancement Services - CES College</OPTION>
            <OPTION value="Computer Systems Institute - Skokie"> Computer Systems Institute - Skokie</OPTION>
            <OPTION value="ComputerTraining.com at Chantilly,VA,LLC"> ComputerTraining.com at Chantilly,VA,LLC</OPTION>
            <OPTION value="ComputerTraining.com at Cleveland, LLC"> ComputerTraining.com at Cleveland, LLC</OPTION>
            <OPTION value="ComputerTraining.com at King of Prussia, PA, LLC"> ComputerTraining.com at King of Prussia, PA, LLC</OPTION>
            <OPTION value="ComputerTraining.com at Towson, MD LLC"> ComputerTraining.com at Towson, MD LLC</OPTION>
            <OPTION value="Concept College of Cosmetology - Danville"> Concept College of Cosmetology - Danville</OPTION>
            <OPTION value="Concordia Theological Seminary"> Concordia Theological Seminary</OPTION>
            <OPTION value="Connect English Language Institute"> Connect English Language Institute</OPTION>
            <OPTION value="Continental School of Beauty Culture - Olean"> Continental School of Beauty Culture - Olean</OPTION>
            <OPTION value="Corinth Academy of Cosmetology, Inc"> Corinth Academy of Cosmetology, Inc</OPTION>
            <OPTION value="Cortiva Institute - Chicago"> Cortiva Institute - Chicago</OPTION>
            <OPTION value="Cortiva Institute - Pennsylvania School of Muscle Therapy"> Cortiva Institute - Pennsylvania School of Muscle Therapy</OPTION>
            <OPTION value="Cosmetic Arts Institute"> Cosmetic Arts Institute</OPTION>
            <OPTION value="Cosmetology and Spa Academy"> Cosmetology and Spa Academy</OPTION>
            <OPTION value="Cosmetology Career Center - A Paul Mitchell Partner School"> Cosmetology Career Center - A Paul Mitchell Partner School</OPTION>
            <OPTION value="Court Reporting Institute of Dallas"> Court Reporting Institute of Dallas</OPTION>
            <OPTION value="Cowley County Community College and Area Vocational-Technical School"> Cowley County Community College and Area Vocational-Technical School</OPTION>
            <OPTION value="Crace, Inc. Dale Carnegie Training"> Crace, Inc. Dale Carnegie Training</OPTION>
            <OPTION value="Crescent Schools - New Orleans"> Crescent Schools - New Orleans</OPTION>
            <OPTION value="Crimson Technology College"> Crimson Technology College</OPTION>
            <OPTION value="Culinary Institute of America"> Culinary Institute of America</OPTION>
            <OPTION value="D.A. Dorsey Educational Center"> D.A. Dorsey Educational Center</OPTION>
            <OPTION value="Dakota College at Bottineau"> Dakota College at Bottineau</OPTION>
            <OPTION value="Dale Carnegie Training of Long Island"> Dale Carnegie Training of Long Island</OPTION>
            <OPTION value="Dallas Barber and Stylist College"> Dallas Barber and Stylist College</OPTION>
            <OPTION value="Daniel Webster College"> Daniel Webster College</OPTION>
            <OPTION value="David Pressley Professional School of Cosmetology"> David Pressley Professional School of Cosmetology</OPTION>
            <OPTION value="Davis College"> Davis College</OPTION>
            <OPTION value="Daymar College - Chillicothe"> Daymar College - Chillicothe</OPTION>
            <OPTION value="Daymar College - Owensboro"> Daymar College - Owensboro</OPTION>
            <OPTION value="DCI Career Institute"> DCI Career Institute</OPTION>
            <OPTION value="Defense Acquisition University"> Defense Acquisition University</OPTION>
            <OPTION value="Delaware Valley College"> Delaware Valley College</OPTION>
            <OPTION value="Design<OPTION value="s School of Cosmetology"> Design<OPTION value="s School of Cosmetology</OPTION>
            <OPTION value="Detroit Business Institute - Downriver"> Detroit Business Institute - Downriver</OPTION>
            <OPTION value="DeVry University"> DeVry University</OPTION>
            <OPTION value="Dewey University - Hato Rey Campus"> Dewey University - Hato Rey Campus</OPTION>
            <OPTION value="Diesel Driving Academy"> Diesel Driving Academy</OPTION>
            <OPTION value="Dine College"> Dine College</OPTION>
            <OPTION value="Diversified Vocational College - Los Angeles"> Diversified Vocational College - Los Angeles</OPTION>
            <OPTION value="Donnelly College"> Donnelly College</OPTION>
            <OPTION value="Douglas Education Center"> Douglas Education Center</OPTION>
            <OPTION value="Douglas J Aveda Institute"> Douglas J Aveda Institute</OPTION>
            <OPTION value="Dover Business College - Clifton"> Dover Business College - Clifton</OPTION>
            <OPTION value="DPT Business School"> DPT Business School</OPTION>
            <OPTION value="Drake College of Business"> Drake College of Business</OPTION>
            <OPTION value="DuBois Business College"> DuBois Business College</OPTION>
            <OPTION value="Durham Beauty Academy"> Durham Beauty Academy</OPTION>
            <OPTION value="DVS College"> DVS College</OPTION>
            <OPTION value="Eagle Gate College"> Eagle Gate College</OPTION>
            <OPTION value="East Central Technical College"> East Central Technical College</OPTION>
            <OPTION value="East San Gabriel Valley Regional Occupational Program"> East San Gabriel Valley Regional Occupational Program</OPTION>
            <OPTION value="East-West University"> East-West University</OPTION>
            <OPTION value="Eastern Arizona College"> Eastern Arizona College</OPTION>
            <OPTION value="Eastern College of Health Vocations - Little Rock"> Eastern College of Health Vocations - Little Rock</OPTION>
            <OPTION value="Eastern Nazarene College"> Eastern Nazarene College</OPTION>
            <OPTION value="Eastern West Virginia Community and Technical College"> Eastern West Virginia Community and Technical College</OPTION>
            <OPTION value="Eastern Wyoming College"> Eastern Wyoming College</OPTION>
            <OPTION value="EC Boston"> EC Boston</OPTION>
            <OPTION value="ECLIPS School of Cosmetology and Barbering"> ECLIPS School of Cosmetology and Barbering</OPTION>
            <OPTION value="Edward Via Virginia College of Osteopathic Medicine"> Edward Via Virginia College of Osteopathic Medicine</OPTION>
            <OPTION value="EF International Schools of English"> EF International Schools of English</OPTION>
            <OPTION value="Electronic Data Processing College of Puerto Rico"> Electronic Data Processing College of Puerto Rico</OPTION>
            <OPTION value="Elmira Business Institute"> Elmira Business Institute</OPTION>
            <OPTION value="ELS Language Centers"> ELS Language Centers</OPTION>
            <OPTION value="Embassy CES"> Embassy CES</OPTION>
            <OPTION value="Embry-Riddle Aeronautical University - Daytona Beach"> Embry-Riddle Aeronautical University - Daytona Beach</OPTION>
            <OPTION value="Empire Beauty School"> Empire Beauty School</OPTION>
            <OPTION value="Empire Beauty School - Framingham"> Empire Beauty School - Framingham</OPTION>
            <OPTION value="Empire Beauty School - Grand Rapids"> Empire Beauty School - Grand Rapids</OPTION>
            <OPTION value="Empire Beauty School - Laconia"> Empire Beauty School - Laconia</OPTION>
            <OPTION value="Empire Beauty School - Lehigh Valley"> Empire Beauty School - Lehigh Valley</OPTION>
            <OPTION value="Empire Beauty School - Portland"> Empire Beauty School - Portland</OPTION>
            <OPTION value="Empire Beauty School - Pottsville"> Empire Beauty School - Pottsville</OPTION>
            <OPTION value="Empire Beauty School - Queens"> Empire Beauty School - Queens</OPTION>
            <OPTION value="Empire Beauty School - Somersworth"> Empire Beauty School - Somersworth</OPTION>
            <OPTION value="Empire Beauty School - Wyoming Valley"> Empire Beauty School - Wyoming Valley</OPTION>
            <OPTION value="Employment Solutions - College for Technical Education"> Employment Solutions - College for Technical Education</OPTION>
            <OPTION value="English House"> English House</OPTION>
            <OPTION value="English Language Center"> English Language Center</OPTION>
            <OPTION value="Enterprise State Community College"> Enterprise State Community College</OPTION>
            <OPTION value="Erie 1 BOCES-Practical Nursing Program"> Erie 1 BOCES-Practical Nursing Program</OPTION>
            <OPTION value="Erie Business Center"> Erie Business Center</OPTION>
            <OPTION value="Erikson Institute"> Erikson Institute</OPTION>
            <OPTION value="Escuela Tecnica De Electricidad"> Escuela Tecnica De Electricidad</OPTION>
            <OPTION value="European Massage Therapy School - Skokie"> European Massage Therapy School - Skokie</OPTION>
            <OPTION value="Evangelical Theological Seminary"> Evangelical Theological Seminary</OPTION>
            <OPTION value="Eve<OPTION value="s College of Hairstyling"> Eve<OPTION value="s College of Hairstyling</OPTION>
            <OPTION value="Everest College - Newport News"> Everest College - Newport News</OPTION>
            <OPTION value="Everest College - Phoenix"> Everest College - Phoenix</OPTION>
            <OPTION value="Everest College - Salt Lake City"> Everest College - Salt Lake City</OPTION>
            <OPTION value="Everest College - Springfield"> Everest College - Springfield</OPTION>
            <OPTION value="Everest College - Thornton"> Everest College - Thornton</OPTION>
            <OPTION value="Everest University - Pinellas"> Everest University - Pinellas</OPTION>
            <OPTION value="Expertise Cosmetology Institute"> Expertise Cosmetology Institute</OPTION>
            <OPTION value="FastTrain College - Miami"> FastTrain College - Miami</OPTION>
            <OPTION value="FastTrain College - Plantation"> FastTrain College - Plantation</OPTION>
            <OPTION value="FastTrain College - Tampa"> FastTrain College - Tampa</OPTION>
            <OPTION value="Ferrum College"> Ferrum College</OPTION>
            <OPTION value="Finger Lakes School of Massage"> Finger Lakes School of Massage</OPTION>
            <OPTION value="First Coast Technical College"> First Coast Technical College</OPTION>
            <OPTION value="Fisher College"> Fisher College</OPTION>
            <OPTION value="Flagler College"> Flagler College</OPTION>
            <OPTION value="Florida Academy"> Florida Academy</OPTION>
            <OPTION value="Florida Center for Theological Studies"> Florida Center for Theological Studies</OPTION>
            <OPTION value="Florida Keys Community College"> Florida Keys Community College</OPTION>
            <OPTION value="Florida Medical Training Institute - Melbourne"> Florida Medical Training Institute - Melbourne</OPTION>
            <OPTION value="Florida National University"> Florida National University</OPTION>
            <OPTION value="Fond du Lac Tribal and Community College"> Fond du Lac Tribal and Community College</OPTION>
            <OPTION value="Forest Institute of Professional Psychology"> Forest Institute of Professional Psychology</OPTION>
            <OPTION value="Fort Myers Institute of Technology"> Fort Myers Institute of Technology</OPTION>
            <OPTION value="Fort Worth Beauty School"> Fort Worth Beauty School</OPTION>
            <OPTION value="Fortis College - Foley"> Fortis College - Foley</OPTION>
            <OPTION value="Fortis College - Norfolk"> Fortis College - Norfolk</OPTION>
            <OPTION value="Fortis College - Orange Park"> Fortis College - Orange Park</OPTION>
            <OPTION value="Fortis College- Winter Park"> Fortis College- Winter Park</OPTION>
            <OPTION value="Four-D College - Colton"> Four-D College - Colton</OPTION>
            <OPTION value="Frank Phillips College"> Frank Phillips College</OPTION>
            <OPTION value="Franklin Career Colleges, Inc. - Ontario"> Franklin Career Colleges, Inc. - Ontario</OPTION>
            <OPTION value="Fuller Theological Seminary"> Fuller Theological Seminary</OPTION>
            <OPTION value="G Skin and Beauty Institute"> G Skin and Beauty Institute</OPTION>
            <OPTION value="Gadsden Business College"> Gadsden Business College</OPTION>
            <OPTION value="Galen College of Nursing"> Galen College of Nursing</OPTION>
            <OPTION value="Gateway Community and Technical College"> Gateway Community and Technical College</OPTION>
            <OPTION value="Genesis Career College"> Genesis Career College</OPTION>
            <OPTION value="Geneva College"> Geneva College</OPTION>
            <OPTION value="Georgia Beauty Academy"> Georgia Beauty Academy</OPTION>
            <OPTION value="Georgia Career Institute"> Georgia Career Institute</OPTION>
            <OPTION value="Georgia Driving Academy"> Georgia Driving Academy</OPTION>
            <OPTION value="Georgia Institute of Cosmetology"> Georgia Institute of Cosmetology</OPTION>
            <OPTION value="Georgia Military College-Milledgeville Campus"> Georgia Military College-Milledgeville Campus</OPTION>
            <OPTION value="Georgia Piedmont Technical College"> Georgia Piedmont Technical College</OPTION>
            <OPTION value="GEOS English Academy"> GEOS English Academy</OPTION>
            <OPTION value="Glendale Career College"> Glendale Career College</OPTION>
            <OPTION value="Global Business Institute - Far Rockaway"> Global Business Institute - Far Rockaway</OPTION>
            <OPTION value="Goddard College"> Goddard College</OPTION>
            <OPTION value="Gogebic Community College"> Gogebic Community College</OPTION>
            <OPTION value="Good Careers Academy"> Good Careers Academy</OPTION>
            <OPTION value="Gordon-Conwell Theological Seminary"> Gordon-Conwell Theological Seminary</OPTION>
            <OPTION value="Grace University"> Grace University</OPTION>
            <OPTION value="Granite State College"> Granite State College</OPTION>
            <OPTION value="Gratz College"> Gratz College</OPTION>
            <OPTION value="Great Lakes Christian College"> Great Lakes Christian College</OPTION>
            <OPTION value="Greater Altoona Career and Technology Center"> Greater Altoona Career and Technology Center</OPTION>
            <OPTION value="Green Mountain College"> Green Mountain College</OPTION>
            <OPTION value="Greenville College"> Greenville College</OPTION>
            <OPTION value="GUTI, The Premier Beauty and Wellness Academy - Bradenton"> GUTI, The Premier Beauty and Wellness Academy - Bradenton</OPTION>
            <OPTION value="Hair Design Institute at Fifth Avenue"> Hair Design Institute at Fifth Avenue</OPTION>
            <OPTION value="Harris School of Business - Cherry Hill"> Harris School of Business - Cherry Hill</OPTION>
            <OPTION value="Harrisburg University of Science and Technology"> Harrisburg University of Science and Technology</OPTION>
            <OPTION value="Harrison College - Muncie"> Harrison College - Muncie</OPTION>
            <OPTION value="Haywood Community College"> Haywood Community College</OPTION>
            <OPTION value="Healing Hands School of Holistic Health"> Healing Hands School of Holistic Health</OPTION>
            <OPTION value="Healing Mountain Massage School"> Healing Mountain Massage School</OPTION>
            <OPTION value="Healing Touch Career College"> Healing Touch Career College</OPTION>
            <OPTION value="Healthy Hair Academy - Dallas"> Healthy Hair Academy - Dallas</OPTION>
            <OPTION value="Hebrew Theological College"> Hebrew Theological College</OPTION>
            <OPTION value="Heritage College - Denver"> Heritage College - Denver</OPTION>
            <OPTION value="Heritage College - Oklahoma City"> Heritage College - Oklahoma City</OPTION>
            <OPTION value="Heritage Institute - Jacksonville"> Heritage Institute - Jacksonville</OPTION>
            <OPTION value="High Desert Medical College"> High Desert Medical College</OPTION>
            <OPTION value="Highland Community College"> Highland Community College</OPTION>
            <OPTION value="Hill College"> Hill College</OPTION>
            <OPTION value="Hollywood Institute of Beauty Careers"> Hollywood Institute of Beauty Careers</OPTION>
            <OPTION value="Holy Apostles College and Seminary"> Holy Apostles College and Seminary</OPTION>
            <OPTION value="Houston Training Schools"> Houston Training Schools</OPTION>
            <OPTION value="Hult International Business School"> Hult International Business School</OPTION>
            <OPTION value="HUMINT Training - Joint Center of Excellence"> HUMINT Training - Joint Center of Excellence</OPTION>
            <OPTION value="Hunter Business School"> Hunter Business School</OPTION>
            <OPTION value="IBMC College - Fort Collins"> IBMC College - Fort Collins</OPTION>
            <OPTION value="ICPR Junior College"> ICPR Junior College</OPTION>
            <OPTION value="Ideal Beauty Academy"> Ideal Beauty Academy</OPTION>
            <OPTION value="IITR Truck Driving School - Clackamas"> IITR Truck Driving School - Clackamas</OPTION>
            <OPTION value="Illinois School of Health Careers - Chicago"> Illinois School of Health Careers - Chicago</OPTION>
            <OPTION value="Imagine - Paul Mitchell Partner School"> Imagine - Paul Mitchell Partner School</OPTION>
            <OPTION value="Independence Community College"> Independence Community College</OPTION>
            <OPTION value="Indiana Institute of Technology"> Indiana Institute of Technology</OPTION>
            <OPTION value="Institute for Therapeutic Massage"> Institute for Therapeutic Massage</OPTION>
            <OPTION value="Institute of Technology Inc"> Institute of Technology Inc</OPTION>
            <OPTION value="Instituto de Banca y Comercio - Hato Rey"> Instituto de Banca y Comercio - Hato Rey</OPTION>
            <OPTION value="Instituto de Educacion Tecnica Ocupacional La Reine"> Instituto de Educacion Tecnica Ocupacional La Reine</OPTION>
            <OPTION value="Inter American University of Puerto Rico - Barranquitas"> Inter American University of Puerto Rico - Barranquitas</OPTION>
            <OPTION value="Inter American University of Puerto Rico - Bayamon"> Inter American University of Puerto Rico - Bayamon</OPTION>
            <OPTION value="Inter American University of Puerto Rico - Guayama"> Inter American University of Puerto Rico - Guayama</OPTION>
            <OPTION value="Interactive College of Technology"> Interactive College of Technology</OPTION>
            <OPTION value="Interactive Learning Systems"> Interactive Learning Systems</OPTION>
            <OPTION value="Intercoast Colleges"> Intercoast Colleges</OPTION>
            <OPTION value="Interface College"> Interface College</OPTION>
            <OPTION value="International Academy of Hair Design - Mesa"> International Academy of Hair Design - Mesa</OPTION>
            <OPTION value="International Beauty School"> International Beauty School</OPTION>
            <OPTION value="International Business College - El Paso"> International Business College - El Paso</OPTION>
            <OPTION value="International House New York"> International House New York</OPTION>
            <OPTION value="International Institute for Restorative Practices"> International Institute for Restorative Practices</OPTION>
            <OPTION value="International Institute of Cosmetology"> International Institute of Cosmetology</OPTION>
            <OPTION value="International School of Beauty"> International School of Beauty</OPTION>
            <OPTION value="International School of Health, Beauty & Technology"> International School of Health, Beauty & Technology</OPTION>
            <OPTION value="International Union of Painters and Allied Trades, District Council 21"> International Union of Painters and Allied Trades, District Council 21</OPTION>
            <OPTION value="INTRAX International Institute"> INTRAX International Institute</OPTION>
            <OPTION value="Iowa Lakes Community College"> Iowa Lakes Community College</OPTION>
            <OPTION value="Iowa School of Beauty"> Iowa School of Beauty</OPTION>
            <OPTION value="Itasca Community College"> Itasca Community College</OPTION>
            <OPTION value="ITT Technical Institute - Indianapolis"> ITT Technical Institute - Indianapolis</OPTION>
            <OPTION value="ITT Technical Institute - Spokane Valley"> ITT Technical Institute - Spokane Valley</OPTION>
            <OPTION value="Iverson Institute"> Iverson Institute</OPTION>
            <OPTION value="Jacksonville Beauty Institute"> Jacksonville Beauty Institute</OPTION>
            <OPTION value="James Albert School of Cosmetology"> James Albert School of Cosmetology</OPTION>
            <OPTION value="Jamestown Business College"> Jamestown Business College</OPTION>
            <OPTION value="Jay<OPTION value="s Technical Institute"> Jay<OPTION value="s Technical Institute</OPTION>
            <OPTION value="Jean Madeline Aveda Institute"> Jean Madeline Aveda Institute</OPTION>
            <OPTION value="Jefferson Technical College"> Jefferson Technical College</OPTION>
            <OPTION value="Jenny Lea Academy of Cosmetology"> Jenny Lea Academy of Cosmetology</OPTION>
            <OPTION value="John Jay College of Criminal Justice of the City University of New York"> John Jay College of Criminal Justice of the City University of New York</OPTION>
            <OPTION value="John Paolo<OPTION value="s Xtreme Beauty Institute, Goldwell Products Artistry"> John Paolo<OPTION value="s Xtreme Beauty Institute, Goldwell Products Artistry</OPTION>
            <OPTION value="John Wood Community College"> John Wood Community College</OPTION>
            <OPTION value="Jolie Health and Beauty Academy of Hazelton"> Jolie Health and Beauty Academy of Hazelton</OPTION>
            <OPTION value="Jones College - Jacksonville"> Jones College - Jacksonville</OPTION>
            <OPTION value="Josef<OPTION value="s School of Hair Design Inc"> Josef<OPTION value="s School of Hair Design Inc</OPTION>
            <OPTION value="Judson University"> Judson University</OPTION>
            <OPTION value="Kaplan Career Institute - Harrisburg"> Kaplan Career Institute - Harrisburg</OPTION>
            <OPTION value="Kaplan College - San Antonio"> Kaplan College - San Antonio</OPTION>
            <OPTION value="Kaplan International Centers"> Kaplan International Centers</OPTION>
            <OPTION value="Kaplan Test Prep"> Kaplan Test Prep</OPTION>
            <OPTION value="Kaplan University"> Kaplan University</OPTION>
            <OPTION value="Katharine Gibbs School - New York City"> Katharine Gibbs School - New York City</OPTION>
            <OPTION value="Kendall College"> Kendall College</OPTION>
            <OPTION value="Kenneth Shuler School of Cosmetology"> Kenneth Shuler School of Cosmetology</OPTION>
            <OPTION value="Kenneth Shuler School of Cosmetology and Hair Design"> Kenneth Shuler School of Cosmetology and Hair Design</OPTION>
            <OPTION value="Keystone College"> Keystone College</OPTION>
            <OPTION value="Kirtland Community College"> Kirtland Community College</OPTION>
            <OPTION value="L<OPTION value="Academie de Cuisine"> L<OPTION value="Academie de Cuisine</OPTION>
            <OPTION value="La Belle Beauty Academy"> La Belle Beauty Academy</OPTION>
            <OPTION value="Lac Courte Oreilles Ojibwa Community College"> Lac Courte Oreilles Ojibwa Community College</OPTION>
            <OPTION value="Lacy Cosmetology School"> Lacy Cosmetology School</OPTION>
            <OPTION value="Lado International College"> Lado International College</OPTION>
            <OPTION value="Lake Erie College"> Lake Erie College</OPTION>
            <OPTION value="Lake Forest Graduate School of Management"> Lake Forest Graduate School of Management</OPTION>
            <OPTION value="Lake Region State College"> Lake Region State College</OPTION>
            <OPTION value="Lake Technical Center"> Lake Technical Center</OPTION>
            <OPTION value="Lakeland College"> Lakeland College</OPTION>
            <OPTION value="Lakeside School of Massage Therapy"> Lakeside School of Massage Therapy</OPTION>
            <OPTION value="Lamar State College - Port Arthur"> Lamar State College - Port Arthur</OPTION>
            <OPTION value="Lancaster Bible College"> Lancaster Bible College</OPTION>
            <OPTION value="Lancaster County Career and Technology Center"> Lancaster County Career and Technology Center</OPTION>
            <OPTION value="Language Studies International"> Language Studies International</OPTION>
            <OPTION value="Language Systems International College of English"> Language Systems International College of English</OPTION>
            <OPTION value="LASC">American Language and Culture"> LASC">American Language and Culture</OPTION>
            <OPTION value="Laurel Technical Institute - Sharon"> Laurel Technical Institute - Sharon</OPTION>
            <OPTION value="Laurus College"> Laurus College</OPTION>
            <OPTION value="Learey Technical Center"> Learey Technical Center</OPTION>
            <OPTION value="LearnQuest - Bala Cynwyd"> LearnQuest - Bala Cynwyd</OPTION>
            <OPTION value="Leech Lake Tribal College"> Leech Lake Tribal College</OPTION>
            <OPTION value="Leon Studio One School of Hair Design & Career Training Center"> Leon Studio One School of Hair Design & Career Training Center</OPTION>
            <OPTION value="LeTourneau University"> LeTourneau University</OPTION>
            <OPTION value="Lexington Theological Seminary"> Lexington Theological Seminary</OPTION>
            <OPTION value="Lincoln College"> Lincoln College</OPTION>
            <OPTION value="Lincoln Technical Institute - Hartford"> Lincoln Technical Institute - Hartford</OPTION>
            <OPTION value="Lincoln University of Pennsylvania"> Lincoln University of Pennsylvania</OPTION>
            <OPTION value="Lindenwood University"> Lindenwood University</OPTION>
            <OPTION value="Lively Technical Center"> Lively Technical Center</OPTION>
            <OPTION value="Living Arts College@School of Communication Arts"> Living Arts College@School of Communication Arts</OPTION>
            <OPTION value="Long Island Beauty School"> Long Island Beauty School</OPTION>
            <OPTION value="Long Island Business Institute - Flushing"> Long Island Business Institute - Flushing</OPTION>
            <OPTION value="Lord Fairfax Community College"> Lord Fairfax Community College</OPTION>
            <OPTION value="Los Angeles ORT College"> Los Angeles ORT College</OPTION>
            <OPTION value="Louisiana Technical College - Baton Rouge"> Louisiana Technical College - Baton Rouge</OPTION>
            <OPTION value="Louisiana Technical College - Delta-Ouachita Campus"> Louisiana Technical College - Delta-Ouachita Campus</OPTION>
            <OPTION value="Louisiana Technical College - Lafayette"> Louisiana Technical College - Lafayette</OPTION>
            <OPTION value="Louisiana Technical College - Young Memorial"> Louisiana Technical College - Young Memorial</OPTION>
            <OPTION value="Lutheran School of Theology at Chicago"> Lutheran School of Theology at Chicago</OPTION>
            <OPTION value="Lyles Fresno College of Beauty"> Lyles Fresno College of Beauty</OPTION>
            <OPTION value="Maharishi University of Management"> Maharishi University of Management</OPTION>
            <OPTION value="Maine Maritime Academy"> Maine Maritime Academy</OPTION>
            <OPTION value="Manhattan Christian College"> Manhattan Christian College</OPTION>
            <OPTION value="Manhattan College"> Manhattan College</OPTION>
            <OPTION value="Manhattan Hairstyling Academy"> Manhattan Hairstyling Academy</OPTION>
            <OPTION value="Manuel & Theresa<OPTION value="s School of Hair Design"> Manuel & Theresa<OPTION value="s School of Hair Design</OPTION>
            <OPTION value="Marchman Technical Education Center"> Marchman Technical Education Center</OPTION>
            <OPTION value="Marian Health Careers Center - Los Angeles"> Marian Health Careers Center - Los Angeles</OPTION>
            <OPTION value="Maricopa Community Colleges - South Mountain Community College"> Maricopa Community Colleges - South Mountain Community College</OPTION>
            <OPTION value="Marinello School of Beauty"> Marinello School of Beauty</OPTION>
            <OPTION value="Marinello School of Beauty - Burbank"> Marinello School of Beauty - Burbank</OPTION>
            <OPTION value="Marinello School of Beauty - Hemet"> Marinello School of Beauty - Hemet</OPTION>
            <OPTION value="Marinello School of Beauty - Lake Forest"> Marinello School of Beauty - Lake Forest</OPTION>
            <OPTION value="Marinello School of Beauty - Los Angeles"> Marinello School of Beauty - Los Angeles</OPTION>
            <OPTION value="Marinello School of Beauty - Manhattan"> Marinello School of Beauty - Manhattan</OPTION>
            <OPTION value="Marinello School of Beauty - Moreno Valley"> Marinello School of Beauty - Moreno Valley</OPTION>
            <OPTION value="Marinello School of Beauty - Niantic"> Marinello School of Beauty - Niantic</OPTION>
            <OPTION value="Marinello School of Beauty - Reno"> Marinello School of Beauty - Reno</OPTION>
            <OPTION value="Marinello School of Beauty - San Francisco"> Marinello School of Beauty - San Francisco</OPTION>
            <OPTION value="Marinello School of Beauty - Santa Clara"> Marinello School of Beauty - Santa Clara</OPTION>
            <OPTION value="Marist College"> Marist College</OPTION>
            <OPTION value="MarJon School of Beauty Culture Ltd"> MarJon School of Beauty Culture Ltd</OPTION>
            <OPTION value="Marlboro College"> Marlboro College</OPTION>
            <OPTION value="Maryland Beauty Academy of Essex"> Maryland Beauty Academy of Essex</OPTION>
            <OPTION value="Marymount Manhattan College"> Marymount Manhattan College</OPTION>
            <OPTION value="Massachusetts College of Art and Design"> Massachusetts College of Art and Design</OPTION>
            <OPTION value="Massachusetts Maritime Academy"> Massachusetts Maritime Academy</OPTION>
            <OPTION value="Mayfield College"> Mayfield College</OPTION>
            <OPTION value="Mayland Community College"> Mayland Community College</OPTION>
            <OPTION value="Maysville Community and Technical College"> Maysville Community and Technical College</OPTION>
            <OPTION value="MBTI Business Training Institute"> MBTI Business Training Institute</OPTION>
            <OPTION value="McCann School of Business and Technology"> McCann School of Business and Technology</OPTION>
            <OPTION value="McDowell Technical Community College"> McDowell Technical Community College</OPTION>
            <OPTION value="MCI Institute of Technology"> MCI Institute of Technology</OPTION>
            <OPTION value="Mech-Tech College"> Mech-Tech College</OPTION>
            <OPTION value="Medaille College"> Medaille College</OPTION>
            <OPTION value="Mediatech Institute"> Mediatech Institute</OPTION>
            <OPTION value="MedTech College"> MedTech College</OPTION>
            <OPTION value="Medtech Institute - Falls Church"> Medtech Institute - Falls Church</OPTION>
            <OPTION value="Mentor Language Institute"> Mentor Language Institute</OPTION>
            <OPTION value="Mercer County Vocational/Technical Schools"> Mercer County Vocational/Technical Schools</OPTION>
            <OPTION value="Mesabi Range Community and Technical College"> Mesabi Range Community and Technical College</OPTION>
            <OPTION value="Mesalands Community College"> Mesalands Community College</OPTION>
            <OPTION value="Metro Business College of Cape Girardeau"> Metro Business College of Cape Girardeau</OPTION>
            <OPTION value="Metropolitan Learning Institute"> Metropolitan Learning Institute</OPTION>
            <OPTION value="Miami Ad School"> Miami Ad School</OPTION>
            <OPTION value="Miami International University of Art and Design"> Miami International University of Art and Design</OPTION>
            <OPTION value="Miami Lakes Educational Center"> Miami Lakes Educational Center</OPTION>
            <OPTION value="Michael<OPTION value="s School of Beauty - Augusta"> Michael<OPTION value="s School of Beauty - Augusta</OPTION>
            <OPTION value="Micropower Career Institute, Manhattan"> Micropower Career Institute, Manhattan</OPTION>
            <OPTION value="Mid-America Christian University"> Mid-America Christian University</OPTION>
            <OPTION value="Midwest Institute - Fenton"> Midwest Institute - Fenton</OPTION>
            <OPTION value="Milan Institute"> Milan Institute</OPTION>
            <OPTION value="Milan Institute - Palm Desert"> Milan Institute - Palm Desert</OPTION>
            <OPTION value="Milan Institute - San Antonio"> Milan Institute - San Antonio</OPTION>
            <OPTION value="Milan Institute - Visalia"> Milan Institute - Visalia</OPTION>
            <OPTION value="Milan Institute of Cosmetology"> Milan Institute of Cosmetology</OPTION>
            <OPTION value="Mildred Elley"> Mildred Elley</OPTION>
            <OPTION value="Miller-Motte Technical College - Lynchburg"> Miller-Motte Technical College - Lynchburg</OPTION>
            <OPTION value="Minnesota School of Cosmetology"> Minnesota School of Cosmetology</OPTION>
            <OPTION value="Minnesota State College-Southeast Technical"> Minnesota State College-Southeast Technical</OPTION>
            <OPTION value="Missouri College of Cosmetology North"> Missouri College of Cosmetology North</OPTION>
            <OPTION value="Missouri University of Science and Technology"> Missouri University of Science and Technology</OPTION>
            <OPTION value="Modern Hairstyling Institute - Carolina"> Modern Hairstyling Institute - Carolina</OPTION>
            <OPTION value="Monmouth County Vocational Center"> Monmouth County Vocational Center</OPTION>
            <OPTION value="Montcalm Community College"> Montcalm Community College</OPTION>
            <OPTION value="Montessori Teacher Education Center - San Francisco Bay Area"> Montessori Teacher Education Center - San Francisco Bay Area</OPTION>
            <OPTION value="Morrison University"> Morrison University</OPTION>
            <OPTION value="Mountain Empire Community College"> Mountain Empire Community College</OPTION>
            <OPTION value="Mr. Bernard<OPTION value="s School of Hair Fashion, Inc."> Mr. Bernard<OPTION value="s School of Hair Fashion, Inc.</OPTION>
            <OPTION value="Mueller College"> Mueller College</OPTION>
            <OPTION value="Muhlenberg College"> Muhlenberg College</OPTION>
            <OPTION value="MyComputerCareer.com"> MyComputerCareer.com</OPTION>
            <OPTION value="MyrAngel Beauty Institute"> MyrAngel Beauty Institute</OPTION>
            <OPTION value="Naropa University"> Naropa University</OPTION>
            <OPTION value="National Beauty College"> National Beauty College</OPTION>
            <OPTION value="National College - Indianapolis"> National College - Indianapolis</OPTION>
            <OPTION value="National College of Business and Technology - Nashville"> National College of Business and Technology - Nashville</OPTION>
            <OPTION value="National Defense University"> National Defense University</OPTION>
            <OPTION value="National Graduate School of Quality Management"> National Graduate School of Quality Management</OPTION>
            <OPTION value="National Holistic Institute"> National Holistic Institute</OPTION>
            <OPTION value="National Intelligence University"> National Intelligence University</OPTION>
            <OPTION value="National Latino Education Institute"> National Latino Education Institute</OPTION>
            <OPTION value="National Personal Training Institute of Columbus"> National Personal Training Institute of Columbus</OPTION>
            <OPTION value="National Theatre Conservatory"> National Theatre Conservatory</OPTION>
            <OPTION value="National University College - Bayamon"> National University College - Bayamon</OPTION>
            <OPTION value="Navajo Technical University"> Navajo Technical University</OPTION>
            <OPTION value="Nazarene Theological Seminary"> Nazarene Theological Seminary</OPTION>
            <OPTION value="NCP College of Nursing - San Francisco"> NCP College of Nursing - San Francisco</OPTION>
            <OPTION value="Nebraska Indian Community College"> Nebraska Indian Community College</OPTION>
            <OPTION value="Neumont University"> Neumont University</OPTION>
            <OPTION value="New Brunswick Theological Seminary"> New Brunswick Theological Seminary</OPTION>
            <OPTION value="New Concept Massage and Beauty School"> New Concept Massage and Beauty School</OPTION>
            <OPTION value="New England College"> New England College</OPTION>
            <OPTION value="New Mexico State University - Dona Ana Community College"> New Mexico State University - Dona Ana Community College</OPTION>
            <OPTION value="New River Community College"> New River Community College</OPTION>
            <OPTION value="New York Film Academy, New York"> New York Film Academy, New York</OPTION>
            <OPTION value="New York Medical Career Training Center"> New York Medical Career Training Center</OPTION>
            <OPTION value="New York Theological Seminary"> New York Theological Seminary</OPTION>
            <OPTION value="Newbury College-Brookline"> Newbury College-Brookline</OPTION>
            <OPTION value="Nichols College"> Nichols College</OPTION>
            <OPTION value="North Adrian<OPTION value="s Beauty College"> North Adrian<OPTION value="s Beauty College</OPTION>
            <OPTION value="North Central College"> North Central College</OPTION>
            <OPTION value="North Central Michigan College"> North Central Michigan College</OPTION>
            <OPTION value="North Georgia Technical College"> North Georgia Technical College</OPTION>
            <OPTION value="Northshore Technical Community College - Sullivan"> Northshore Technical Community College - Sullivan</OPTION>
            <OPTION value="Northwest Hair Academy, Mount Vernon"> Northwest Hair Academy, Mount Vernon</OPTION>
            <OPTION value="Northwest Kansas Technical College"> Northwest Kansas Technical College</OPTION>
            <OPTION value="Northwest Louisiana Technical College"> Northwest Louisiana Technical College</OPTION>
            <OPTION value="Northwest Vista College"> Northwest Vista College</OPTION>
            <OPTION value="Northwest-Shoals Community College - Muscle Shoals"> Northwest-Shoals Community College - Muscle Shoals</OPTION>
            <OPTION value="Northwood University"> Northwood University</OPTION>
            <OPTION value="Nouvelle Institute"> Nouvelle Institute</OPTION>
            <OPTION value="Ocean County Vocational-Technical School"> Ocean County Vocational-Technical School</OPTION>
            <OPTION value="Oglala Lakota College"> Oglala Lakota College</OPTION>
            <OPTION value="Ogle School Hair Skin Nails"> Ogle School Hair Skin Nails</OPTION>
            <OPTION value="Ogle School of Hair Skin Nails"> Ogle School of Hair Skin Nails</OPTION>
            <OPTION value="Ohio Business College"> Ohio Business College</OPTION>
            <OPTION value="Ohio Christian University"> Ohio Christian University</OPTION>
            <OPTION value="Ohio State School of Cosmetology"> Ohio State School of Cosmetology</OPTION>
            <OPTION value="Olivet College"> Olivet College</OPTION>
            <OPTION value="Olympian University of Cosmetology"> Olympian University of Cosmetology</OPTION>
            <OPTION value="Onondaga School of Therapeutic Massage"> Onondaga School of Therapeutic Massage</OPTION>
            <OPTION value="Ottawa University"> Ottawa University</OPTION>
            <OPTION value="Oxman College"> Oxman College</OPTION>
            <OPTION value="Ozarka College"> Ozarka College</OPTION>
            <OPTION value="P & A Scholars Beauty School"> P & A Scholars Beauty School</OPTION>
            <OPTION value="Palmer Theological Seminary of Eastern University"> Palmer Theological Seminary of Eastern University</OPTION>
            <OPTION value="Park West Barber School, LLC"> Park West Barber School, LLC</OPTION>
            <OPTION value="Patsy & Rob<OPTION value="s Academy of Beauty"> Patsy & Rob<OPTION value="s Academy of Beauty</OPTION>
            <OPTION value="Paul D Camp Community College"> Paul D Camp Community College</OPTION>
            <OPTION value="Paul Mitchell the School - Antioch"> Paul Mitchell the School - Antioch</OPTION>
            <OPTION value="Paul Mitchell The School - Esani"> Paul Mitchell The School - Esani</OPTION>
            <OPTION value="Paul Mitchell the School - Provo"> Paul Mitchell the School - Provo</OPTION>
            <OPTION value="Paul Mitchell the School - Salt Lake City"> Paul Mitchell the School - Salt Lake City</OPTION>
            <OPTION value="Paul Mitchell The School Bradley"> Paul Mitchell The School Bradley</OPTION>
            <OPTION value="Paul Mitchell The School Escanaba"> Paul Mitchell The School Escanaba</OPTION>
            <OPTION value="Paul Mitchell the School Fayetteville"> Paul Mitchell the School Fayetteville</OPTION>
            <OPTION value="Paul Mitchell the School Gastonia"> Paul Mitchell the School Gastonia</OPTION>
            <OPTION value="Paul Mitchell The School Great Lakes"> Paul Mitchell The School Great Lakes</OPTION>
            <OPTION value="PC AGE - Jersey City"> PC AGE - Jersey City</OPTION>
            <OPTION value="PC ProSchools, Inc."> PC ProSchools, Inc.</OPTION>
            <OPTION value="Peirce College"> Peirce College</OPTION>
            <OPTION value="Pennsylvania Highlands Community College"> Pennsylvania Highlands Community College</OPTION>
            <OPTION value="Pennsylvania Institute of Technology"> Pennsylvania Institute of Technology</OPTION>
            <OPTION value="Piedmont Community College"> Piedmont Community College</OPTION>
            <OPTION value="Pillar College"> Pillar College</OPTION>
            <OPTION value="Pinnacle Career Institute"> Pinnacle Career Institute</OPTION>
            <OPTION value="Pinnacle College"> Pinnacle College</OPTION>
            <OPTION value="Pioneer Pacific College"> Pioneer Pacific College</OPTION>
            <OPTION value="Pittsburgh Technical Institute"> Pittsburgh Technical Institute</OPTION>
            <OPTION value="PJ<OPTION value="s College of Cosmetology"> PJ<OPTION value="s College of Cosmetology</OPTION>
            <OPTION value="PJ<OPTION value="s College of Cosmetology - Bowling Green"> PJ<OPTION value="s College of Cosmetology - Bowling Green</OPTION>
            <OPTION value="Polytechnic Institute of New York University"> Polytechnic Institute of New York University</OPTION>
            <OPTION value="Portfolio Center"> Portfolio Center</OPTION>
            <OPTION value="Post University"> Post University</OPTION>
            <OPTION value="Potomac College"> Potomac College</OPTION>
            <OPTION value="Preferred College of Nursing"> Preferred College of Nursing</OPTION>
            <OPTION value="Prescott College"> Prescott College</OPTION>
            <OPTION value="Prince Institute - Southeast"> Prince Institute - Southeast</OPTION>
            <OPTION value="Prism Career Institute - Philadelphia"> Prism Career Institute - Philadelphia</OPTION>
            <OPTION value="Pro Way Hair School"> Pro Way Hair School</OPTION>
            <OPTION value="Professional Careers Institute, Inc. - Houston"> Professional Careers Institute, Inc. - Houston</OPTION>
            <OPTION value="Professional Golfers Career College"> Professional Golfers Career College</OPTION>
            <OPTION value="Professional Hands Institute"> Professional Hands Institute</OPTION>
            <OPTION value="Pryor Beauty College"> Pryor Beauty College</OPTION>
            <OPTION value="Quest Career College"> Quest Career College</OPTION>
            <OPTION value="Quest College"> Quest College</OPTION>
            <OPTION value="Quinebaug Valley Community College"> Quinebaug Valley Community College</OPTION>
            <OPTION value="Rainy River Community College"> Rainy River Community College</OPTION>
            <OPTION value="Ranken Technical College"> Ranken Technical College</OPTION>
            <OPTION value="Raphael<OPTION value="s Salem Beauty Academy"> Raphael<OPTION value="s Salem Beauty Academy</OPTION>
            <OPTION value="Rappahannock Community College"> Rappahannock Community College</OPTION>
            <OPTION value="Reformed Theological Seminary"> Reformed Theological Seminary</OPTION>
            <OPTION value="Regency Beauty Institute"> Regency Beauty Institute</OPTION>
            <OPTION value="Regina<OPTION value="s College of Beauty - Monroe"> Regina<OPTION value="s College of Beauty - Monroe</OPTION>
            <OPTION value="Reid State Technical College"> Reid State Technical College</OPTION>
            <OPTION value="Rensselaer Polytechnic Institute"> Rensselaer Polytechnic Institute</OPTION>
            <OPTION value="Rich Mountain Community College"> Rich Mountain Community College</OPTION>
            <OPTION value="Richmont Graduate University"> Richmont Graduate University</OPTION>
            <OPTION value="Ridley-Lowell Business and Technical Institute - New London"> Ridley-Lowell Business and Technical Institute - New London</OPTION>
            <OPTION value="Riverside Adult School"> Riverside Adult School</OPTION>
            <OPTION value="Riverside County Office of Education - Career Technical Education"> Riverside County Office of Education - Career Technical Education</OPTION>
            <OPTION value="Roger<OPTION value="s Academy of Hair Design"> Roger<OPTION value="s Academy of Hair Design</OPTION>
            <OPTION value="Rose-Hulman Institute of Technology"> Rose-Hulman Institute of Technology</OPTION>
            <OPTION value="Rosemead College of English"> Rosemead College of English</OPTION>
            <OPTION value="Rosemont College"> Rosemont College</OPTION>
            <OPTION value="Ross Medical Education Center"> Ross Medical Education Center</OPTION>
            <OPTION value="Ross Medical Education Center - Decatur"> Ross Medical Education Center - Decatur</OPTION>
            <OPTION value="SAE Institute of Technology - Los Angeles"> SAE Institute of Technology - Los Angeles</OPTION>
            <OPTION value="Sage College"> Sage College</OPTION>
            <OPTION value="Saint Augustine College"> Saint Augustine College</OPTION>
            <OPTION value="Saint Gregory<OPTION value="s University"> Saint Gregory<OPTION value="s University</OPTION>
            <OPTION value="Saint Joseph<OPTION value="s Seminary"> Saint Joseph<OPTION value="s Seminary</OPTION>
            <OPTION value="Saint Joseph<OPTION value="s University"> Saint Joseph<OPTION value="s University</OPTION>
            <OPTION value="Saint Michael College of Allied Health"> Saint Michael College of Allied Health</OPTION>
            <OPTION value="Saint Norbert College"> Saint Norbert College</OPTION>
            <OPTION value="Salon Success Academy"> Salon Success Academy</OPTION>
            <OPTION value="Salt Lake - Tooele Applied Technology College"> Salt Lake - Tooele Applied Technology College</OPTION>
            <OPTION value="San Francisco Theological Seminary"> San Francisco Theological Seminary</OPTION>
            <OPTION value="Santa Barbara Business College - Bakersfield"> Santa Barbara Business College - Bakersfield</OPTION>
            <OPTION value="Santa Barbara Business College - Ventura"> Santa Barbara Business College - Ventura</OPTION>
            <OPTION value="Santa Fe University of Art and Design"> Santa Fe University of Art and Design</OPTION>
            <OPTION value="Savannah College of Art and Design"> Savannah College of Art and Design</OPTION>
            <OPTION value="Sawyer School - Pawtucket"> Sawyer School - Pawtucket</OPTION>
            <OPTION value="Sebring Career Schools"> Sebring Career Schools</OPTION>
            <OPTION value="Seguin Beauty School"> Seguin Beauty School</OPTION>
            <OPTION value="Seminary of the Immaculate Conception"> Seminary of the Immaculate Conception</OPTION>
            <OPTION value="Simons Rock College of Bard"> Simons Rock College of Bard</OPTION>
            <OPTION value="Sinte Gleska University"> Sinte Gleska University</OPTION>
            <OPTION value="Sistema Universitario Ana G Mendez"> Sistema Universitario Ana G Mendez</OPTION>
            <OPTION value="Sitting Bull College"> Sitting Bull College</OPTION>
            <OPTION value="Skin Science Institute, Inc. DBA Skih Science Institute of Laser & Esthetics-Salt Lake"> Skin Science Institute, Inc. DBA Skih Science Institute of Laser & Esthetics-Salt Lake</OPTION>
            <OPTION value="Sojourner-Douglass College"> Sojourner-Douglass College</OPTION>
            <OPTION value="South Dade Adult Education Center"> South Dade Adult Education Center</OPTION>
            <OPTION value="South Georgia Technical College"> South Georgia Technical College</OPTION>
            <OPTION value="South Piedmont Community College"> South Piedmont Community College</OPTION>
            <OPTION value="South Texas Training Center"> South Texas Training Center</OPTION>
            <OPTION value="South Texas Vo-Tech Institute"> South Texas Vo-Tech Institute</OPTION>
            <OPTION value="South Texas Vocational Technical Institute - McAllen"> South Texas Vocational Technical Institute - McAllen</OPTION>
            <OPTION value="Southeast Culinary & Hospitality College"> Southeast Culinary & Hospitality College</OPTION>
            <OPTION value="Southeast Florida Institute, Inc. Dale Carnegie Training"> Southeast Florida Institute, Inc. Dale Carnegie Training</OPTION>
            <OPTION value="Southeastern Baptist Theological Seminary"> Southeastern Baptist Theological Seminary</OPTION>
            <OPTION value="Southeastern Beauty College"> Southeastern Beauty College</OPTION>
            <OPTION value="Southeastern Beauty School - Stockbridge"> Southeastern Beauty School - Stockbridge</OPTION>
            <OPTION value="Southeastern Community College"> Southeastern Community College</OPTION>
            <OPTION value="Southern Arkansas University Tech"> Southern Arkansas University Tech</OPTION>
            <OPTION value="Southern Careers Institute Inc"> Southern Careers Institute Inc</OPTION>
            <OPTION value="Southern New Hampshire University"> Southern New Hampshire University</OPTION>
            <OPTION value="Southern Technical College"> Southern Technical College</OPTION>
            <OPTION value="Southside Virginia Community College"> Southside Virginia Community College</OPTION>
            <OPTION value="Southwest Institute of Healing Arts"> Southwest Institute of Healing Arts</OPTION>
            <OPTION value="Southwest Texas Junior College"> Southwest Texas Junior College</OPTION>
            <OPTION value="Southwest University of Visual Arts"> Southwest University of Visual Arts</OPTION>
            <OPTION value="Southwestern Christian University"> Southwestern Christian University</OPTION>
            <OPTION value="Southwestern Michigan College"> Southwestern Michigan College</OPTION>
            <OPTION value="Spoon River College"> Spoon River College</OPTION>
            <OPTION value="Springhouse Education and Consulting Services - Exton"> Springhouse Education and Consulting Services - Exton</OPTION>
            <OPTION value="St. Bernard<OPTION value="s School of Theology and Ministry"> St. Bernard<OPTION value="s School of Theology and Ministry</OPTION>
            <OPTION value="St. Edward<OPTION value="s University"> St. Edward<OPTION value="s University</OPTION>
            <OPTION value="St. John<OPTION value="s College"> St. John<OPTION value="s College</OPTION>
            <OPTION value="Starting Points for Children - Institute for Early Childhood Educators"> Starting Points for Children - Institute for Early Childhood Educators</OPTION>
            <OPTION value="Stautzenberger College"> Stautzenberger College</OPTION>
            <OPTION value="StenoTech Career Institute - Piscataway"> StenoTech Career Institute - Piscataway</OPTION>
            <OPTION value="Stenotype Institute of Jacksonville Inc"> Stenotype Institute of Jacksonville Inc</OPTION>
            <OPTION value="Stevens Institute of Technology"> Stevens Institute of Technology</OPTION>
            <OPTION value="Strayer University"> Strayer University</OPTION>
            <OPTION value="Sullivan and Cogliano Training Centers"> Sullivan and Cogliano Training Centers</OPTION>
            <OPTION value="SUM Bible College & Theological Seminary - Main Campus"> SUM Bible College & Theological Seminary - Main Campus</OPTION>
            <OPTION value="Summit College"> Summit College</OPTION>
            <OPTION value="SUNY College of Environmental Science and Forestry"> SUNY College of Environmental Science and Forestry</OPTION>
            <OPTION value="Sussex County Community College"> Sussex County Community College</OPTION>
            <OPTION value="TALK International"> TALK International</OPTION>
            <OPTION value="Tennessee College of Applied Technology Crump"> Tennessee College of Applied Technology Crump</OPTION>
            <OPTION value="Tennessee College of Applied Technology Elizabethton"> Tennessee College of Applied Technology Elizabethton</OPTION>
            <OPTION value="Tennessee College of Applied Technology Harriman"> Tennessee College of Applied Technology Harriman</OPTION>
            <OPTION value="Tennessee College of Applied Technology Hartsville"> Tennessee College of Applied Technology Hartsville</OPTION>
            <OPTION value="Tennessee College of Applied Technology Jackson"> Tennessee College of Applied Technology Jackson</OPTION>
            <OPTION value="Tennessee College of Applied Technology McKenzie"> Tennessee College of Applied Technology McKenzie</OPTION>
            <OPTION value="Tennessee College of Applied Technology McMinnville"> Tennessee College of Applied Technology McMinnville</OPTION>
            <OPTION value="Tennessee College of Applied Technology Morristown"> Tennessee College of Applied Technology Morristown</OPTION>
            <OPTION value="Tennessee College of Applied Technology Nashville"> Tennessee College of Applied Technology Nashville</OPTION>
            <OPTION value="Tennessee College of Applied Technology Pulaski"> Tennessee College of Applied Technology Pulaski</OPTION>
            <OPTION value="Tennessee College of Applied Technology Ripley"> Tennessee College of Applied Technology Ripley</OPTION>
            <OPTION value="Tennessee College of Applied Technology Shelbyville"> Tennessee College of Applied Technology Shelbyville</OPTION>
            <OPTION value="Texas Barber College and Hairstyling School- Houston"> Texas Barber College and Hairstyling School- Houston</OPTION>
            <OPTION value="Texas College of Cosmetology"> Texas College of Cosmetology</OPTION>
            <OPTION value="Texas Health School"> Texas Health School</OPTION>
            <OPTION value="Texas School of Business Inc"> Texas School of Business Inc</OPTION>
            <OPTION value="Texas State Technical College - West Texas"> Texas State Technical College - West Texas</OPTION>
            <OPTION value="Texas State Technical College Marshall"> Texas State Technical College Marshall</OPTION>
            <OPTION value="Thaddeus Stevens College of Technology"> Thaddeus Stevens College of Technology</OPTION>
            <OPTION value="The Academy of Barbering Arts, Inc."> The Academy of Barbering Arts, Inc.</OPTION>
            <OPTION value="The Art Institute of California - Hollywood"> The Art Institute of California - Hollywood</OPTION>
            <OPTION value="The Art Institute of California - Los Angeles"> The Art Institute of California - Los Angeles</OPTION>
            <OPTION value="The Art Institute of Charlotte"> The Art Institute of Charlotte</OPTION>
            <OPTION value="The Art Institute of Colorado"> The Art Institute of Colorado</OPTION>
            <OPTION value="The Barber School"> The Barber School</OPTION>
            <OPTION value="The Beauty Institute, Inc."> The Beauty Institute, Inc.</OPTION>
            <OPTION value="The EF Executive Language Institute A branch of EF International Language"> The EF Executive Language Institute A branch of EF International Language</OPTION>
            <OPTION value="The Illinois Institute of Art - Chicago"> The Illinois Institute of Art - Chicago</OPTION>
            <OPTION value="The King<OPTION value="s University"> The King<OPTION value="s University</OPTION>
            <OPTION value="The Language Company"> The Language Company</OPTION>
            <OPTION value="The New School"> The New School</OPTION>
            <OPTION value="The Salon Professional Academy - Lexington"> The Salon Professional Academy - Lexington</OPTION>
            <OPTION value="The Studio Academy of Beauty"> The Studio Academy of Beauty</OPTION>
            <OPTION value="Thomas M. Cooley Law School"> Thomas M. Cooley Law School</OPTION>
            <OPTION value="Thunderbird School of Global Management"> Thunderbird School of Global Management</OPTION>
            <OPTION value="Tiffin University"> Tiffin University</OPTION>
            <OPTION value="Tint School of Make-Up & Cosmetology - Dallas"> Tint School of Make-Up & Cosmetology - Dallas</OPTION>
            <OPTION value="TLA - The Language Academy"> TLA - The Language Academy</OPTION>
            <OPTION value="Tohono O<OPTION value="Odham Community College"> Tohono O<OPTION value="Odham Community College</OPTION>
            <OPTION value="Toni & Guy Hairdressing Academy - Ambler"> Toni & Guy Hairdressing Academy - Ambler</OPTION>
            <OPTION value="TONI & GUY Hairdressing Academy - Santa Monica"> TONI & GUY Hairdressing Academy - Santa Monica</OPTION>
            <OPTION value="Trend Barber College"> Trend Barber College</OPTION>
            <OPTION value="Tri-County Community College"> Tri-County Community College</OPTION>
            <OPTION value="Tricoci University of Beauty Culture"> Tricoci University of Beauty Culture</OPTION>
            <OPTION value="Trinidad State Junior College"> Trinidad State Junior College</OPTION>
            <OPTION value="Turning Point Beauty College"> Turning Point Beauty College</OPTION>
            <OPTION value="Tusculum College"> Tusculum College</OPTION>
            <OPTION value="Twin City Beauty College"> Twin City Beauty College</OPTION>
            <OPTION value="U.S. Army Command and General Staff College"> U.S. Army Command and General Staff College</OPTION>
            <OPTION value="U.S. Army Ordnance Munitions and Electronics Maintence School"> U.S. Army Ordnance Munitions and Electronics Maintence School</OPTION>
            <OPTION value="U.S. Naval War College, The"> U.S. Naval War College, The</OPTION>
            <OPTION value="UEI College - Fresno"> UEI College - Fresno</OPTION>
            <OPTION value="UEI College - Gardena"> UEI College - Gardena</OPTION>
            <OPTION value="Ultimate Medical Academy - Clearwater"> Ultimate Medical Academy - Clearwater</OPTION>
            <OPTION value="Unification Theological Seminary"> Unification Theological Seminary</OPTION>
            <OPTION value="Union Institute & University"> Union Institute & University</OPTION>
            <OPTION value="Union Presbyterian Seminary"> Union Presbyterian Seminary</OPTION>
            <OPTION value="Unitech Training Academy - Lafayette"> Unitech Training Academy - Lafayette</OPTION>
            <OPTION value="United Education Institute - Huntington Park Campus"> United Education Institute - Huntington Park Campus</OPTION>
            <OPTION value="Universal Technology College of Puerto Rico"> Universal Technology College of Puerto Rico</OPTION>
            <OPTION value="University of Akron - Wayne College"> University of Akron - Wayne College</OPTION>
            <OPTION value="University of Cosmetology - Sullivan"> University of Cosmetology - Sullivan</OPTION>
            <OPTION value="University of Cosmetology Arts & Sciences - McAllen"> University of Cosmetology Arts & Sciences - McAllen</OPTION>
            <OPTION value="University of Illinois at Springfield"> University of Illinois at Springfield</OPTION>
            <OPTION value="University of Maryland - University College"> University of Maryland - University College</OPTION>
            <OPTION value="University of Michigan - Dearborn"> University of Michigan - Dearborn</OPTION>
            <OPTION value="University of Mount Olive"> University of Mount Olive</OPTION>
            <OPTION value="University of Nebraska - Nebraska College of Technical Agriculture"> University of Nebraska - Nebraska College of Technical Agriculture</OPTION>
            <OPTION value="University of South Florida Sarasota-Manatee"> University of South Florida Sarasota-Manatee</OPTION>
            <OPTION value="University of Southernmost Florida"> University of Southernmost Florida</OPTION>
            <OPTION value="University of Southernmost Florida - Coral Gables Campus"> University of Southernmost Florida - Coral Gables Campus</OPTION>
            <OPTION value="University of the Rockies"> University of the Rockies</OPTION>
            <OPTION value="University of Wisconsin Colleges"> University of Wisconsin Colleges</OPTION>
            <OPTION value="US PC Tech Learning Center"> US PC Tech Learning Center</OPTION>
            <OPTION value="Utah College of Massage Therapy Inc"> Utah College of Massage Therapy Inc</OPTION>
            <OPTION value="Valley College of Medical Careers - West Hills"> Valley College of Medical Careers - West Hills</OPTION>
            <OPTION value="Valley Forge Christian College"> Valley Forge Christian College</OPTION>
            <OPTION value="Vanguard College of Cosmetology A Paul Mitchell Partner School"> Vanguard College of Cosmetology A Paul Mitchell Partner School</OPTION>
            <OPTION value="Vanguard Institute of Technology"> Vanguard Institute of Technology</OPTION>
            <OPTION value="Vaughn College of Aeronautics and Technology"> Vaughn College of Aeronautics and Technology</OPTION>
            <OPTION value="Vermont Training Solutions, Inc. Dale Carnegie Training"> Vermont Training Solutions, Inc. Dale Carnegie Training</OPTION>
            <OPTION value="Vici Beauty School - Greenfield"> Vici Beauty School - Greenfield</OPTION>
            <OPTION value="Virginia Intermont College"> Virginia Intermont College</OPTION>
            <OPTION value="Walsh College of Accountancy and Business Administration"> Walsh College of Accountancy and Business Administration</OPTION>
            <OPTION value="Wards Corner Beauty Academy, Inc."> Wards Corner Beauty Academy, Inc.</OPTION>
            <OPTION value="Wartburg Theological Seminary"> Wartburg Theological Seminary</OPTION>
            <OPTION value="Washington County Community College"> Washington County Community College</OPTION>
            <OPTION value="Waubonsee Community College"> Waubonsee Community College</OPTION>
            <OPTION value="WellSpring School of Allied Health - Kansas City"> WellSpring School of Allied Health - Kansas City</OPTION>
            <OPTION value="Wentworth Military Academy and Junior College"> Wentworth Military Academy and Junior College</OPTION>
            <OPTION value="West Shore Community College"> West Shore Community College</OPTION>
            <OPTION value="West Virginia Business College - Wheeling"> West Virginia Business College - Wheeling</OPTION>
            <OPTION value="West Virginia Junior College - Charleston"> West Virginia Junior College - Charleston</OPTION>
            <OPTION value="West Virginia Junior College - Morgantown"> West Virginia Junior College - Morgantown</OPTION>
            <OPTION value="Westech College"> Westech College</OPTION>
            <OPTION value="Western Beauty Institute"> Western Beauty Institute</OPTION>
            <OPTION value="Western International University"> Western International University</OPTION>
            <OPTION value="Western Seminary"> Western Seminary</OPTION>
            <OPTION value="WestMed College"> WestMed College</OPTION>
            <OPTION value="Westminster College"> Westminster College</OPTION>
            <OPTION value="Westminster Theological Seminary"> Westminster Theological Seminary</OPTION>
            <OPTION value="Westwood College"> Westwood College</OPTION>
            <OPTION value="Westwood College - Denver North"> Westwood College - Denver North</OPTION>
            <OPTION value="Westwood College - Dupage"> Westwood College - Dupage</OPTION>
            <OPTION value="Westwood College - Long Beach"> Westwood College - Long Beach</OPTION>
            <OPTION value="Westwood College - Los Angeles"> Westwood College - Los Angeles</OPTION>
            <OPTION value="Westwood College - O<OPTION value="Hare Airport"> Westwood College - O<OPTION value="Hare Airport</OPTION>
            <OPTION value="Wichita Technical Institute"> Wichita Technical Institute</OPTION>
            <OPTION value="Wilberforce University"> Wilberforce University</OPTION>
            <OPTION value="William Penn University"> William Penn University</OPTION>
            <OPTION value="William Woods University"> William Woods University</OPTION>
            <OPTION value="Wilmington College"> Wilmington College</OPTION>
            <OPTION value="Wilson College"> Wilson College</OPTION>
            <OPTION value="Withlacoochee Technical Institute"> Withlacoochee Technical Institute</OPTION>
            <OPTION value="Xenon International Academy"> Xenon International Academy</OPTION>
            <OPTION value="York County Community College"> York County Community College</OPTION>
            <OPTION value="York Technical Institute"> York Technical Institute</OPTION>
            <OPTION value="Z Hair Academy, Inc."> Z Hair Academy, Inc.</OPTION>
            <OPTION value="Zoni Language Centers"> Zoni Language Centers</OPTION>
           </SELECT>
             </div>
           </div>

           <div class="form-group   ">
             <div class="col-xs-12  ">
               <label for="email" class="signup-lbl sr-only">Email:</label>
               <input type="text" name="email"  class="signup-boxes form-control" placeholder="Email" />
             </div>
           </div>

           <div class="form-group    ">
             <div class="col-xs-12 ">
               <label for="password" class="signup-lbl sr-only">Password:</label>
               <input type="password" name="password" class="signup-boxes form-control" placeholder="Password" />
             </div>
           </div>

           <div class="form-group">
             <div class="col-xs-offset-2 col-xs-4 col-sm-offset-2 col-sm-3" >
               <label for="male-box" class="sex-lbl">
                <input type="radio" name="sex"  value="M" id="male-box">Male
               </label>
             </div>
             <div class="col-xs-6 col-sm-offset-2 col-sm-3 ">
               <label for="female-box" class="sex-lbl">
                <input type="radio" name="sex" id="female-box" value="F">Female
               </label>
             </div>
           </div>

           <div class="form-group    ">
             <div class="col-xs-12 col-sm-4">
               <label for="dob" class="signup-lbl sr-only">DOB:</label>
               <select name="birthmonth" id="dob" class="dob-select form-control" >
                <option desabled selected>Month</OPTION>
                <OPTION value="1">Jan</OPTION> <OPTION value="2">Feb</OPTION>
                <OPTION value="3">Mar</OPTION> <OPTION value="4">Apr</OPTION>
                <OPTION value="5">May</OPTION> <OPTION value="6">Jun</OPTION>
                <OPTION value="7">Jul</OPTION> <OPTION value="8">Aug</OPTION>
                <OPTION value="9">Sep</OPTION> <OPTION value="10">Oct</OPTION>
                <OPTION value="11">Nov</OPTION><OPTION value="12">Dec</OPTION>
               </SELECT>
             </div>

             <div class="col-xs-12 col-sm-4 ">
               <select name="birthday" id="dob" class="dovb-select form-control">
               <option desabled selected>Day</OPTION>
                <OPTION value="1">1</OPTION> <OPTION value="2">2</OPTION>
                <OPTION value="3">3</OPTION> <OPTION value="4">4</OPTION>
                <OPTION value="5">5</OPTION> <OPTION value="6">6</OPTION>
                <OPTION value="7">7</OPTION> <OPTION value="8">8</OPTION>
                <OPTION value="9">9</OPTION> <OPTION value="10">10</OPTION>
                <OPTION value="11">11</OPTION> <OPTION value="12">12</OPTION>
                <OPTION value="13">13</OPTION> <OPTION value="14">14</OPTION>
                <OPTION value="15">15</OPTION> <OPTION value="16">16</OPTION>
                <OPTION value="17">17</OPTION> <OPTION value="18">18</OPTION>
                <OPTION value="19">19</OPTION> <OPTION value="20">20</OPTION>
                <OPTION value="21">21</OPTION> <OPTION value="22">22</OPTION>
                <OPTION value="23">23</OPTION> <OPTION value="24">24</OPTION>
                <OPTION value="25">25</OPTION> <OPTION value="26">26</OPTION>
                <OPTION value="27">27</OPTION> <OPTION value="28">28</OPTION>
                <OPTION value="29">29</OPTION> <OPTION value="30">30</OPTION>
                <OPTION value="31">31</OPTION>
               </SELECT>
             </div>

             <div class="col-xs-12 col-sm-4 ">
               <select name="birthyear" id="dob" class="form-control">
               <option desabled selected>Year</OPTION>
                <OPTION =
                value="2013">2013</OPTION><OPTION
                  value="2012">2012</OPTION><OPTION =
                value="2011">2011</OPTION><OPTION value="2010">2010</OPTION><OPTION
                  value="2009">2009</OPTION><OPTION =
                value="2008">2008</OPTION><OPTION value="2007">2007</OPTION><OPTION
                  value="2006">2006</OPTION><OPTION =
                value="2005">2005</OPTION><OPTION value="2004">2004</OPTION><OPTION
                  value="2003">2003</OPTION><OPTION =
                value="2002">2002</OPTION><OPTION value="2001">2001</OPTION><OPTION
                  value="2000">2000</OPTION><OPTION =
                value="1999">1999</OPTION><OPTION value="1998">1998</OPTION><OPTION
                  value="1997">1997</OPTION><OPTION =
                value="1996">1996</OPTION><OPTION value="1995">1995</OPTION><OPTION
                  value="1994">1994</OPTION><OPTION =
                value="1993">1993</OPTION><OPTION value="1992">1992</OPTION><OPTION
                  value="1991">1991</OPTION><OPTION =
                value="1990">1990</OPTION><OPTION value="1989">1989</OPTION><OPTION
                  value="1988">1988</OPTION><OPTION =
                value="1987">1987</OPTION><OPTION value="1986">1986</OPTION><OPTION
                  value="1985">1985</OPTION><OPTION =
                value="1984">1984</OPTION><OPTION value="1983">1983</OPTION><OPTION
                  value="1982">1982</OPTION><OPTION =
                value="1981">1981</OPTION><OPTION value="1980">1980</OPTION><OPTION
                  value="1979">1979</OPTION><OPTION =
                value="1978">1978</OPTION><OPTION value="1977">1977</OPTION><OPTION
                  value="1976">1976</OPTION><OPTION =
                value="1975">1975</OPTION><OPTION value="1974">1974</OPTION><OPTION
                  value="1973">1973</OPTION><OPTION =
                value="1972">1972</OPTION><OPTION value="1971">1971</OPTION><OPTION
                  value="1970">1970</OPTION><OPTION =
                value="1969">1969</OPTION><OPTION value="1968">1968</OPTION><OPTION
                  value="1967">1967</OPTION><OPTION =
                value="1966">1966</OPTION><OPTION value="1965">1965</OPTION><OPTION
                  value="1964">1964</OPTION><OPTION =
                value="1963">1963</OPTION><OPTION value="1962">1962</OPTION><OPTION
                  value="1961">1961</OPTION><OPTION =
                value="1960">1960</OPTION><OPTION value="1959">1959</OPTION><OPTION
                  value="1958">1958</OPTION><OPTION =
                value="1957">1957</OPTION><OPTION value="1956">1956</OPTION><OPTION
                  value="1955">1955</OPTION><OPTION =
                value="1954">1954</OPTION><OPTION value="1953">1953</OPTION><OPTION
                  value="1952">1952</OPTION><OPTION =
                value="1951">1951</OPTION><OPTION value="1950">1950</OPTION><OPTION
                  value="1949">1949</OPTION><OPTION =
                value="1948">1948</OPTION><OPTION value="1947">1947</OPTION><OPTION
                  value="1946">1946</OPTION><OPTION =
                value="1945">1945</OPTION><OPTION value="1944">1944</OPTION><OPTION
                  value="1943">1943</OPTION><OPTION =
                value="1942">1942</OPTION><OPTION value="1941">1941</OPTION><OPTION
                  value="1940">1940</OPTION><OPTION =
                value="1939">1939</OPTION><OPTION value="1938">1938</OPTION><OPTION
                  value="1937">1937</OPTION><OPTION =
                value="1936">1936</OPTION><OPTION value="1935">1935</OPTION><OPTION
                  value="1934">1934</OPTION><OPTION =
                value="1933">1933</OPTION><OPTION value="1932">1932</OPTION><OPTION
                  value="1931">1931</OPTION><OPTION =
                value="1930">1930</OPTION><OPTION value="1929">1929</OPTION><OPTION
                  value="1928">1928</OPTION><OPTION =
                value="1927">1927</OPTION><OPTION value="1926">1926</OPTION><OPTION
                  value="1925">1925</OPTION><OPTION =
                value="1924">1924</OPTION><OPTION value="1923">1923</OPTION><OPTION
                  value="1922">1922</OPTION><OPTION =
                value="1921">1921</OPTION><OPTION value="1920">1920</OPTION><OPTION
                  value="1919">1919</OPTION><OPTION =
                value="1918">1918</OPTION><OPTION value="1917">1917</OPTION><OPTION
                  value="1916">1916</OPTION><OPTION =
                value="1915">1915</OPTION><OPTION value="1914">1914</OPTION><OPTION
                  value="1913">1913</OPTION><OPTION =
                value="1912">1912</OPTION><OPTION value="1911">1911</OPTION><OPTION
                  value="1910">1910</OPTION><OPTION =
                value="1909">1909</OPTION><OPTION value="1908">1908</OPTION><OPTION
                  value="1907">1907</OPTION><OPTION =
                value="1906">1906</OPTION><OPTION =
                value="1905">1905</OPTION>
               </SELECT>
             </div>
            </div>

            <div class="form-group  ">
             <div class="col-xs-12 ">
               <p> By clicking sign up, you agree to our
                 <a href="#">Terms & Conditions</a>
               </p>
             </div>
            </div>

            <div class="form-group  ">
             <div class="col-xs-12 col-sm-6  ">
               <input type="submit" name="sign-up-form" value="sign up" class="signup-button btn btn btn-block" />
             </div>
               
               
             <div class="col-xs-12 col-sm-6    " >
               
               <small id="existingstudent">
                 <a href="views/login.php">Already have an account?</a>
               </small>            
             </div>
             
             
             
            </div>
            <br>

           
         </form>
       </div>
     </div>
   </div>
   <?php
    }

 //create  the sign in form 
 function create_signin_form(){
  ?>

    <div class="container   ">

      <!--this will create the bar above the menu item -->
     <div class="row Signupbar no-padding no-margin">
       <div class="col-xs-12  no-padding no-margin  ">
         <h3>Login here please</h3>
       </div> 
     </div>
  
     <div class="row Signupbar  no-padding no-margin  ">
       <div class="col-xs-12 col-sm-offset-4 col-sm-4 signup-form-group ">
         <?php echo "<form  action=\"home.php\" method=\"post\" id=\"signup-form\">"; ?>
           <div class="form-group no-padding no-margin">
             <label for="email" class="text-muted">Email</label>
             <input type="text" name="email" id="email"  class="form-control" placeholder="Email"/><br />
           </div>
           <div class="form-group no-padding no-margin">
             <label for="pwd" class="text-muted">Password</label>
             <input type="password" name="pwd" id="pwd" class="form-control" placeholder="Password"/><br />
           </div>
           <div class="form-group ">
             <div class="col-xs-12 col-sm-6 no-padding no-margin  hidden-xs  ">
               <label for="remember-user"  id="remember-checkbox" >
                 <input type="checkbox" name="remember-user"  id="remember-user" />
                  Remember me 
               </label>
             </div>
             <div class="col-xs-12 col-sm-6 no-padding no-margin hidden-xs  ">
               <a href="#" id="forget-pawd"> Forgot password?</a>
             </div>
           </div>

           <input type="submit" name="sign-in-form" value="Log in" class="signup-button  btn btn-block" />
         </form>
       </div>
       <div class="col-xs-12 col-sm-offset-5 col-sm-3 visible-xs">
          <a href="#" id="forget-pawd"> Forgot password?</a> 
       </div>

       <div class="col-xs-12 col-sm-offset-4 col-sm-3">
         <p id="existigngstudent">
           <a href="../index.php">Don't have an account?</a>
         </p>
       </div>
     </div> 
   </div>
   
  <?php
   }



   //create the footer of our site   
  function create_footer(){
  ?>
    <footer class="container-fluid ftfr  ">
      <div class="row  no-padding no-margin  ">
       <small class="col-xs-12 col-sm-4  ">
        <li>
        <a class="navbar-bkrand" href="#">&#169; 2015 MySchool | Privacy Policy</a>
       </li></small>

       <nav class="col-xs-12 col-sm-8  ">
        <ul class=" navbar-right   no-padding no-margin  " id="contact">
         <li><a href="#">About MySchool</a></li>
         <li><a href="#">Account</a></li>
         <li><a href="#">App</a></li>
         <li><a href="#">Job</a></li>
        </ul>
       </nav>
      </div>
    </sript>
    <!-- ____________________________slick And JQUERY_______________________________ -->
     <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
     <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
     <script type="text/javascript" src="../slick/slick.min.js"></script>
     <!-- ____________________________slick And JQUERY_______________________________ -->
</scipt>

   </footer>
   </body>
  </html> 
  <?php
  }

/*<?php
/**
 * easy image resize function
 * @param  $file - file name to resize
 * @param  $string - The image data, as a string
 * @param  $width - new image width
 * @param  $height - new image height
 * @param  $proportional - keep image proportional, default is no
 * @param  $output - name of the new file (include path if needed)
 * @param  $delete_original - if true the original image will be deleted
 * @param  $use_linux_commands - if set to true will use "rm" to delete the image, if false will use PHP unlink
 * @param  $quality - enter 1-100 (100 is best quality) default is 100
 * @return boolean|resource
 */
  /*function smart_resize_image($file,
                              $string             = null,
                              $width              = 0, 
                              $height             = 0, 
                              $proportional       = false, 
                              $output             = 'file', 
                              $delete_original    = true, 
                              $use_linux_commands = false,
                  $quality = 100
       ) {
      
    if ( $height <= 0 && $width <= 0 ) return false;
    if ( $file === null && $string === null ) return false;

    # Setting defaults and meta
    $info                         = $file !== null ? getimagesize($file) : getimagesizefromstring($string);
    $image                        = '';
    $final_width                  = 0;
    $final_height                 = 0;
    list($width_old, $height_old) = $info;
  $cropHeight = $cropWidth = 0;

    # Calculating proportionality
    if ($proportional) {
      if      ($width  == 0)  $factor = $height/$height_old;
      elseif  ($height == 0)  $factor = $width/$width_old;
      else                    $factor = min( $width / $width_old, $height / $height_old );

      $final_width  = round( $width_old * $factor );
      $final_height = round( $height_old * $factor );
    }
    else {
      $final_width = ( $width <= 0 ) ? $width_old : $width;
      $final_height = ( $height <= 0 ) ? $height_old : $height;
    $widthX = $width_old / $width;
    $heightX = $height_old / $height;
    
    $x = min($widthX, $heightX);
    $cropWidth = ($width_old - $width * $x) / 2;
    $cropHeight = ($height_old - $height * $x) / 2;
    }

    # Loading image to memory according to type
    switch ( $info[2] ) {
      case IMAGETYPE_JPEG:  $file !== null ? $image = imagecreatefromjpeg($file) : $image = imagecreatefromstring($string);  break;
      case IMAGETYPE_GIF:   $file !== null ? $image = imagecreatefromgif($file)  : $image = imagecreatefromstring($string);  break;
      case IMAGETYPE_PNG:   $file !== null ? $image = imagecreatefrompng($file)  : $image = imagecreatefromstring($string);  break;
      default: return false;
    }
    
    
    # This is the resizing/resampling/transparency-preserving magic
    $image_resized = imagecreatetruecolor( $final_width, $final_height );
    if ( ($info[2] == IMAGETYPE_GIF) || ($info[2] == IMAGETYPE_PNG) ) {
      $transparency = imagecolortransparent($image);
      $palletsize = imagecolorstotal($image);

      if ($transparency >= 0 && $transparency < $palletsize) {
        $transparent_color  = imagecolorsforindex($image, $transparency);
        $transparency       = imagecolorallocate($image_resized, $transparent_color['red'], $transparent_color['green'], $transparent_color['blue']);
        imagefill($image_resized, 0, 0, $transparency);
        imagecolortransparent($image_resized, $transparency);
      }
      elseif ($info[2] == IMAGETYPE_PNG) {
        imagealphablending($image_resized, false);
        $color = imagecolorallocatealpha($image_resized, 0, 0, 0, 127);
        imagefill($image_resized, 0, 0, $color);
        imagesavealpha($image_resized, true);
      }
    }
    imagecopyresampled($image_resized, $image, 0, 0, $cropWidth, $cropHeight, $final_width, $final_height, $width_old - 2 * $cropWidth, $height_old - 2 * $cropHeight);
  
  
    # Taking care of original, if needed
    if ( $delete_original ) {
      if ( $use_linux_commands ) exec('rm '.$file);
      else @unlink($file);
    }

    # Preparing a method of providing result
    switch ( strtolower($output) ) {
      case 'browser':
        $mime = image_type_to_mime_type($info[2]);
        header("Content-type: $mime");
        $output = NULL;
      break;
      case 'file':
        $output = $file;
      break;
      case 'return':
        return $image_resized;
      break;
      default:
      break;
    }
    
    # Writing image according to type to the output destination and image quality
    switch ( $info[2] ) {
      case IMAGETYPE_GIF:   imagegif($image_resized, $output);    break;
      case IMAGETYPE_JPEG:  imagejpeg($image_resized, $output, $quality);   break;
      case IMAGETYPE_PNG:
        $quality = 9 - (int)((0.9*$quality)/10.0);
        imagepng($image_resized, $output, $quality);
        break;
      default: return false;
    }

    return true;
  }
*/
?>

  



