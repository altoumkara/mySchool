<?php
 
  //this is the function to display  post heading,
  //it include name of the poster, time it was posted, and the title of post if any
  function display_post_header($fname, $lname,  $post_title="" ){
    $time = date("Y-m-d H:i:s");
    if ($post_title=="") {
      echo "<header class=\"main-post-header\">".
          "<h4>$fname $lname</h4>".
          "<time class=\"main-post-time\"> $time </time>".
      "</header>";
    }else{
      echo "<header class=\"main-post-header\">".
          "<h4>$fname $lname : $post_title</h4>".
          "<time class=\"main-post-time\"> $time </time>".
      "</header>";
    }
  }

  //this is the function to display  any writing in the post,
  //it will not display anything if the poster does not include any writhing
  function display_post_content($content=""){
    echo "<section class=\"main-post-body\">".
             "<p> $content </p>".
         "</section>";
  }

  //this function place the number of pic user upload at once in to a post
  // the width and height of the div will be devided according to the number of pic
  //$pic_array is a number an array of pic name and it corresponding path
  function display_post_pics($pic_array){
    $numb_pic= count($pic_array);
    if ($numb_pic !== 0) {
    $width = 100/$numb_pic;
    $height= 60/$numb_pic;
    echo "<section class=\"main-post-img\">";
     foreach ($pic_array as $name => $path) {
       $alt_name= explode(".", $name);
       echo " <img style=\"margin: 0% auto; border-radius: 25px; height:$height%; width:$width%;  width: auto\9; /* ie8 */\" 
       src=$path$name alt= $alt_name[0] >";
      }
    echo "</section>";
    }
  }


 //this function place the select icon at the bottom of each post
 //user can choose one of the select icon, to inlude either a book, electronic,
 // or other categories in his post.
 //it doesnt change that much thats why its just plain html
  function display_post_icon(){
?>
<section class="main-post-includes">
             <select id="icon-book">
                 <option selected disabled > </OPTION>
             </SELECT>
             <select id="icon-bed">
                  <option selected disabled > </OPTION>
             </SELECT>
             <select id="icon-electro">
                  <option selected disabled > </OPTION>
             </SELECT>
             <select id="icon-tutorial">
                  <option selected disabled > </OPTION>
             </SELECT>
             <select id="icon-other">
                  <option selected disabled > </OPTION>
             </SELECT>
          </section>
 <?php 
  }



  //this is the function to display a single post
  function create_post($fname, $lname, $pic_array, $content="", $post_title="" ){
?>
    
    <article class="main-post">
      <?php
         display_post_header($fname, $lname, $post_title);
      ?>

      <div class=clear></div>

      <?php
         if(!empty($content)){
            display_post_content($content);
          }
      ?>

      <div class=clear></div>

      <?php
         if(!empty($pic_array)){
           display_post_pics($pic_array);
          }
      ?>
        
      <?php
        display_post_icon();
      ?>    

    </article>
 <?php
 }
?>