<?php

 require_once('../includefiles/includeAllFiles.php');
    
        
   //checking if all form input were filled correctly
   try { 
     //creating short names for our form variables
     if (isset($_POST['post_content']) && isset($_SESSION["valid_user"])) {
         //checking to see if value was entered in the book form
         $book_count =0;
         $book_id = null;//default is null which mean no book was included in the post
         foreach ($_POST['post_content']['book'] as $key => $value) {
             if($value !==""){$book_count++;}
         }
         //if $book_count is > 0, there is a value in the form
         if ($book_count >0){
             $book_array = array('booknumb' => null, 'bookisbn'=>htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['post_content']['book']['isbn']))),
             'bookauthor'=>htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['post_content']['book']['authorName']))), 'booktitle'=>htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['post_content']['book']['booktitle']))),
             'bookEdNumb' => htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['post_content']['book']['edNumb']))), 'bookprice'=>htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['post_content']['book']['bookprice']))),
             'bookquality'=>htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['post_content']['book']['bookquality']))), 'bookquantity'=>htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['post_content']['book']['bookqty']))),
             'bookcreatedate'=>date("Y-m-d H:i:s"), 'catid'=>1, 'userid'=> $_SESSION['userid']
             );

             if (!get_magic_quotes_gpc()) {     
              $book_array = array('booknumb' => null, 'bookisbn'=>addslashes(htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['post_content']['book']['isbn'])))),
             'bookauthor'=>addslashes(htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['post_content']['book']['authorName'])))), 'booktitle'=>addslashes(htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['post_content']['book']['booktitle'])))),
             'bookEdNumb' => addslashes(htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['post_content']['book']['edNumb'])))), 'bookprice'=>addslashes(htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['post_content']['book']['bookprice'])))),
             'bookquality'=>addslashes(htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['post_content']['book']['bookquality'])))), 'bookquantity'=>addslashes(htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['post_content']['book']['bookqty'])))),
             'bookcreatedate'=>date("Y-m-d H:i:s"), 'catid'=>1, 'userid'=> $_SESSION['userid']
             );
             }          

             $book = new book($book_array);
             $book_id= $book->save_book();
             //now insert, in 'postbook table' the book included in the post
             // $post_book_data = array('postid'=>$postid, 'booknumb'=>$book_id);
             //$db->insert($post_book_data, 'postbook');
            }

         //any other item are saved in the 'item table'
         $item_in_post = '0'; //by default no item was selected for posting
         //checking to see if value was entered in the electronic form
         $electro_count = 0;
         foreach ($_POST['post_content']['electronic'] as $key => $value) {
             if($value !==""){$electro_count++;}
            }

         //checking to see if value was entered in the furniture form
         $furniture_count = 0;
         foreach ($_POST['post_content']['furniture'] as $key => $value) {
             if($value !==""){$furniture_count++;}
            }

         //if $furniture_count is > 0, there is a value in the form
         if (($electro_count >0)||($furniture_count >0)||($_POST['post_content']['servicetype'] !=="")||
                              ($_POST['post_content']['servicePrice'] !=="")){
             $item_in_post = '1'; //at least one item was selected for posting
            }

         //if picture where posted
         $pic_in_post = '0';//by default no was selected  for post
         if(!empty($_POST['post_content']['picture'])){//if picture is selected
             $pic_in_post = '1';//there is pic  in the post
            }

         
         //post content-textarea and title      
         $post_content =(isset($_POST['post_content']['post_content'])) ? htmlspecialchars(mysql_real_escape_string(
              trim($_POST['post_content']['post_content']))) : null;
         $post_title = (isset($_POST['post_content']['title'])) ? htmlspecialchars(mysql_real_escape_string(
              trim($_POST['post_content']['title']))) : "no title!";
         if (!get_magic_quotes_gpc()) {
          $post_content = addslashes($post_content);
         }

         // save post infos in an array where keys are the names of our columns in our db
         // and values are the corresponding values
         $post_info = array('postid' => null,  'post_date'=> date("Y-m-d H:i:s"),
                    'postbyuserid' => $_SESSION['userid'],'postonuserid'=> $_GET['userid'],
                    'post_title' => $post_title,  'postcontent' => $post_content, 
                    'server' => $_SERVER['HTTP_HOST'],"host"=> $_SERVER['HTTP_HOST'], "parent"=> 0,
                    'intid' => null,  "photo"=> $pic_in_post, "booknumb"=> $book_id,
                    "item"=> $item_in_post 
                            // 'fname'=>  $_SESSION["fname"], 'lname' =>  $_SESSION["lname"]
                    );

         //create a new post object
         $new_post = new Post($post_info);

         //save the post in the database
         $postid = $new_post->save_post();

         //item will be be saved if something was entered in the electronic form
         if ($electro_count >0){//if true, item was entered in the form
             $item_in_post = '1'; //at least one item was selected for posting
             $electro_array = array("itnumb" => null, "itname" => htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['post_content']['electronic']['electroName']))),
             "itprice" => htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['post_content']['electronic']['electroPrice']))),
             "itquality" => htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['post_content']['electronic']['electroCondition']))),
             "itquantity" => htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['post_content']['electronic']['electroQty']))), 
             "itcreatedate"=>"'".date("Y-m-d H:i:s")."'", "itKind" => htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['post_content']['electronic']['electroKind']))), 
             "itColor" => htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['post_content']['electronic']['electroColor']))),
             "itBrand" =>htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['post_content']['electronic']['electroBrand']))),"catid" =>2, "userid"=>$_SESSION['userid'],
             "postid"=>$postid
              );
             if (!get_magic_quotes_gpc()) {
              $electro_array = array("itnumb" => null, "itname" => addslashes(htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['post_content']['electronic']['electroName'])))),
             "itprice" => addslashes(htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['post_content']['electronic']['electroPrice'])))),
             "itquality" => addslashes(htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['post_content']['electronic']['electroCondition'])))),
             "itquantity" => addslashes(htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['post_content']['electronic']['electroQty'])))), 
             "itcreatedate"=>"'".date("Y-m-d H:i:s")."'", "itKind" => addslashes(htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['post_content']['electronic']['electroKind'])))), 
             "itColor" => addslashes(htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['post_content']['electronic']['electroColor'])))),
             "itBrand" =>addslashes(htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['post_content']['electronic']['electroBrand'])))),"catid" =>2, "userid"=>$_SESSION['userid'],
             "postid"=>$postid
              );
             }



             $electro = new item($electro_array);
             $electro_id= $electro->save_item();
             //now insert, in 'postbook table' the book included in the post
            // $post_item_data = array('postid'=>$postid, 'itnumber'=>$electro_id);
            // $db->insert($post_item_data, 'postitems');
            }
            

          //item will be be saved if something was entered in the furniture form
         if ($furniture_count >0){
             $item_in_post = '1'; //at least one item was selected for posting
             $furni_array = array("itnumb" => null, "itname" => htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['post_content']['furniture']['furniName']))),
             "itprice" => htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['post_content']['furniture']['furniPrice']))),
             "itquality" => htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['post_content']['furniture']['furniCondition']))),
             "itquantity" => htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['post_content']['furniture']['furniQty']))), 
             "itcreatedate"=>"'".date("Y-m-d H:i:s")."'", "itKind" => htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['post_content']['furniture']['furniKind']))), 
             "itColor" => htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['post_content']['furniture']['furniColor']))),
             "itBrand" =>htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['post_content']['furniture']['furniBrand']))),"catid" =>3, "userid"=>$_SESSION['userid'],
             "postid"=>$postid
              );

            if (!get_magic_quotes_gpc()) {
              $furni_array = array("itnumb" => null, "itname" => addslashes(htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['post_content']['furniture']['furniName'])))),
             "itprice" => addslashes(htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['post_content']['furniture']['furniPrice'])))),
             "itquality" => addslashes(htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['post_content']['furniture']['furniCondition'])))),
             "itquantity" => addslashes(htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['post_content']['furniture']['furniQty'])))), 
             "itcreatedate"=>"'".date("Y-m-d H:i:s")."'", "itKind" => addslashes(htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['post_content']['furniture']['furniKind'])))), 
             "itColor" => addslashes(htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['post_content']['furniture']['furniColor'])))),
             "itBrand" =>addslashes(htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['post_content']['furniture']['furniBrand'])))),"catid" =>3, "userid"=>$_SESSION['userid'],
             "postid"=>$postid
              );
             }


             $furni = new item($furni_array);
             $furni->save_item();
             //now insert, in 'postbook table' the book included in the post
             //$post_item_data = array('postid'=>$postid, 'itnumber'=>$furni_id);
             //$db->insert($post_item_data, 'postitems');
            }

         //checking to see if value was entered in the service form
         if(($_POST['post_content']['servicetype'] !=="")||
                              ($_POST['post_content']['servicePrice'] !=="")){
             $item_in_post = '1'; //at least one item was selected for posting
             $servicetype = htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['post_content']['servicetype'])));
             $servicePrice = htmlspecialchars(mysql_real_escape_string(
                            trim($_POST['post_content']['servicePrice'])));
            
             //add slashes before special character if they are not add automaticaly
             if (!get_magic_quotes_gpc()) {
                 $servicetype = addslashes($servicetype);
                 $lname = addslashes($lname);
                 $servicePrice = addslashes($servicePrice);
                }

             $service_array = array("itnumb" => null, "itname" => null,
             "itprice" => $servicePrice,"itquality" => "other", "itquantity" => null, 
             "itcreatedate"=>"'".date("Y-m-d H:i:s")."'", "itKind" => $servicetype, 
             "itColor" => null,"itBrand" =>"service","catid" =>4, "userid"=>$_SESSION['userid'],
             "postid"=>$postid
              );

             $servi = new item($service_array);
             $servi ->save_item();
             //now insert, in 'postbook table' the book included in the post
             //$post_item_data = array('postid'=>$postid, 'itnumber'=>$servi_id);
            // $db->insert($post_item_data, 'postitems');
            }

         
           
          

        
         //if picture where posted
         if($pic_in_post === '1'){//if picture is selected
             for ($i=0; $i <count(($_POST['post_content']['picture'])) ; $i++) { 
                 $pic_array = array("phnumb" => "'".null."'", "phcreatedate"=>"'".date("Y-m-d H:i:s")."'", 
                   "userid"=>$_SESSION['userid'], "phpath" =>"'".htmlspecialchars(mysql_real_escape_string(trim($_POST['post_content']['picture'][$i])))."'",
                  'postid'=>$postid
                 );

                  $db->insert($pic_array, 'photo'); //inserted into photo table
                }
            }


          
        }elseif(isset($_POST['comment_content']) && isset($_SESSION["valid_user"] )){
         $post_content = htmlspecialchars(mysql_real_escape_string(
                  trim($_POST['comment_content']['comment_content'])));
         $post_parent = $_POST['comment_content']['parent'] ;
         $post_title = "comented on this!";

         if (!get_magic_quotes_gpc()) {
           $post_content = addslashes($post_content);
         }

         //if picture were included in the comment
         $pic_in_cmt = '0';//by default no was selected  for post
         if(!empty($_POST['post_content']['picture'])){//if picture is selected
             $pic_in_cmt = '1';//there is pic  in the post
            }

         // save post infos in an array where keys are the names of our columns in our db
         // and values are the corresponding values
           $post_info = array('postid' => null,  'post_date'=> date("Y-m-d H:i:s"),
                    'postbyuserid' => $_SESSION['userid'],
                    'postonuserid'=> $_GET['userid'],
                    'post_title' => $post_title,  'postcontent' => $post_content, 
                    'server' => $_SERVER['HTTP_HOST'],"host"=> $_SERVER['HTTP_HOST'], "parent"=> $post_parent,
                    'intid' => null,  "photo"=> $pic_in_cmt, "booknumb"=> null,
                    "item"=> '0' 
                            // 'fname'=>  $_SESSION["fname"], 'lname' =>  $_SESSION["lname"]
                    );


         //create a new post object
         $new_post = new Post($post_info);

         //save the post in the database
         $cmt_id=$new_post->save_post();
        
        // $comment_data = array('commentid'=>$cmt_id,'postid'=> "'".$_POST['postId']."'",
                             //'commentdate'=> "'".date("Y-m-d H:i:s",time())."'" );

         //$db->insert($comment_data, 'postcomment');
        }else{
         throw new Exception("cant save post for now");
        }
    }
    catch (Exception $ex) {
      //create_header("problem");
     // create_header_menu();
     echo $ex->getMessage()."</br>"."</br>";
     echo $ex->getLine()."</br>".' in '.$ex->getFile();
      exit();
    } 
         
?>