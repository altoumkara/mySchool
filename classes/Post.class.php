<?php
 require_once('../classes/Database.class.php');


 class NewPost{

   function __construct($new_post = true){
    if($new_post ===true){
     ?>
       <section class="col-xs-12 form-horizontal new-post no-padding no-margin" id="for-comment" >
         <div class="form-group no-padding no-margin ">
           <div class="col-xs-12 col-sm-12 txt-area">
             <label for="post-content" class="sr-only">Post content</label>
             <textarea  placeholder="tell people what's up..." name="post_content" 
               form="post-form"   id='post-content' class="form-control"></textarea>
           </div>
         </div> 
         <div class="row no-padding no-margin">
            <section class=" col-xs-12 extra-stuff no-padding no-margin" >
              <section class="pics_in_post" > </section>
              
              <?php
               $this->show_book_form();
               $this->show_electro_form();
               $this->show_furniture_form();
                $this->show_service_form();
              ?>
            </section>
         </div>
         <div class="row no-padding no-margin">
           <section class="col-xs-12 col-sm-10 new-post-includes no-padding no-margin ">
             <div class="row no-padding no-margin">
               <button class="col-xs-2 re" id="icon-book"></button>
               <button class="col-xs-2 re" id="icon-bed"></button>
               <button class="col-xs-2 re" id="icon-electro"></button>
               <button class="col-xs-2 re" id="icon-photo"> </button>
               <label for="service_chck" class="col-xs-3 no-padding no-margin chck-for-service-lbl">need a service?</label>
               <div class="col-xs-1 no-padding no-margin chck-for-service">
                 <input type="checkbox" form="post-form"  name="check-for_services" 
                                   class="form-control " id="service_chck" value="service" >
               </div>
             </div>
           </section>
           <section class="col-xs-12 no-padding no-margin col-sm-2">
           <form  action="../controller/user_post.php?userid=<?php echo $_GET['userid']; ?>"
             class="form-inline" method="" id="post-form" >
            <!--<div class="checkbox chck-for-sm-screjen re">
             <label for="service_chck">need service?
               <input type="checkbox" name="check-for_services" id="service_chck" value="service" >
             </label>
            </div> -->
             <input type="submit" name="post-form" value="POST" class="post-btn  btn btn-primary btn-block" />
             <span class="error" style="display:none"> Post is empty</span>
           </form>
           </section>
         </div>
        </section>
        
    <?php
     }else{
       $comment ='<section class=\"new-post comment\" id=\"'.$elementID.'\" style=\"margin-bottom : 20px;  border:1px outset #F5F7F5;\">'.
   '<textarea  placeholder=\"...\" name=\"comment_content\" id=\"'.$elementID.'\" form=\"cmt-form\"  rows=\"2\" id=\'post-content\'></textarea><br />'.
       '<section class=\"extra-stuff\" >'.
         '<section class=\"pics_in_post\"></section>'.
       '</section>'.
       '<section class=\"new-post-includes\">'.
         '<button id=\"icon-photo\" style=\'with: 20px; height:20px; margin-top: 0%;\'> </button>'.
       '</section>'.
       '<form  action=\"../controller/user_post.php\" method="post" id=\"cmt-form\" style=\'margin-top: -12%;margin-left: 20px;\'>'.
           '<td><input type=\"submit\" name=\"post-form\" value=\"Comment\" class=\"signup-button post-btn cmt-btn\"'.
           'style=\'with: 80px; height:25px; border: 1px solid black; font-size: 15px;\' />'.
          ' <span class=\"error\" style=\"display:none\"> Post is empty</span>'.
         '</form>'.
     '</section><div id="cmt-wall" class="myschool_wall"> <ul id="cmt-posts" style=\"background-color:  #999966;\">'.
     '<p id=\"cmt-lastlistid\" style=\"display:none\">1</p></ul></div>'.  
     '<div class=clear></div>';
     echo $comment;
        }
    }

    //show furmniture form
    function show_furniture_form(){
    ?>
     <section id="furni-form" style="display:none;" >
     <fieldset>
       <legend>Insert Furniture's Informations </legend>
       <div class="row no-padding no-margin ">
          <div class="col-xs-4 no-padding no-margin ">
           <label for="furniKind" class="sr-only">kind of furniture</label>
           <input type="text" name="furniKind" id="furniKind" form="post-form"
              placeholder="kind, i.e: bed, couch, table.." class="form-control" />
          </div>
          <div class="col-xs-4 no-padding no-margin ">
           <label for="furniName" class="sr-only">Name of the furniture</label>
           <input type="text" name="furniName" id="furniName" form="post-form" 
               placeholder="name, i.e: king size matress" class="form-control" />
          </div>
          <div class="col-xs-4 no-padding no-margin ">
           <label for="furniColor" class="sr-only">color of the furniture</label>
           <input type="text" name="furniColor" id="furniColor" form="post-form" 
              placeholder="color, i.e: red" class="form-control" />
          </div>
       </div>
       <div class="row no-padding no-margin ">
          <div class="col-xs-4 no-padding no-margin ">
           <label for="furniBrand" class="sr-only">brand of furniture</label>
           <input type="text" name="furniBrand" id="furniBrand" form="post-form" 
             placeholder="brand, i.e: sleepy's" class="form-control"/>
          </div>
          <div class="col-xs-4 no-padding no-margin ">
           <label for="furniPrice" class="sr-only">price of the furniture</label>
           <input type="number" name="furniPrice" id="furniPrice" form="post-form"
              placeholder="price" class="form-control"/>
          </div>
          <div class="col-xs-4 no-padding no-margin ">
           <label for="furniQty" class="sr-only">quantity of furniture</label>
           <input type="number" name="furniQty" id="furniQty" form="post-form"
              placeholder="quantity, i.e: 2" class="form-control"/>
          </div>
       </div>
       <div class="row no-padding no-margin ">
          <div class="col-xs-4 no-padding no-margin ">
           <label for="furniCondition" class="sr-only">quality of the furniture</label>
           <input type="text" name="furniCondition" id="furniCondition" form="post-form"
              placeholder="quality: new, mint, acceptable, or other.." class="form-control"/>
          </div>
        </div>
      </fieldset>
     </section>
    <?php
    }

     //show electronic form
    function show_electro_form(){
    ?>
      <section id="electro-form" style="display:none;" >
      <fieldset class="">
       <legend>Insert electronic's Informations </legend>
       <div class="row no-padding no-margin ">
         <div class="col-xs-4 no-padding no-margin ">
           <label for="electroKind" class="sr-only">kind of electronic</label>
           <select id="electroKind" name="electroKind" form="post-form" class="form-control">
             <option value="what-kind" selected disabled >what kind?</OPTION>
             <option value="phone">Phone</OPTION>
             <option value="computer">Computer</OPTION>
             <option value="tv">TV</OPTION>
             <!--<option value="tablet">Tablet</OPTION>-->
             <option value="other">Other</OPTION>
             <!-- <input type="text" name="electroKind" size="13" form="post-form" style="display:none;" id ="eKind-other" placeholder="please specify the kind..."/>-->
           </SELECT>
         </div>
         <div class="col-xs-4 no-padding no-margin">
           <label for="electroBrand" class="sr-only">brand of electronic</label>
           <select name="electroBrand" id="electroBrand" form="post-form" class="form-control">
             <option selected disabled >Manufacturer</OPTION>
             <!--<input type="text" name="electroBrand" form="post-form" style="display:none;" id ="eBrand-other" placeholder="please specify the Manufacturer..."/>-->
           </SELECT>
         </div>
         <div class="col-xs-4 no-padding no-margin">
           <label for="electroName" class="sr-only">name of electronic</label>
           <select id="electroName" name="electroName" form="post-form" class="form-control">
             <option  selected disabled >version</OPTION>
             <!--<input type="text" name="electroName" form="post-form" style="display:none;" id ="eName-other" placeholder="please specify the version..." />-->
           </SELECT>
         </div>
       </div>

       <div class="row no-padding no-margin">
         <div class="col-xs-4 no-margin no-padding">
           <label for="electroPrice" class="sr-only">price of electronic</label>
           <input type="number" name="electroPrice" class="form-control" id="electroPrice" form="post-form" placeholder="price"/></td>
         </div>
         <div class="col-xs-4 no-margin no-padding">
           <label for="electroQty" class="sr-only">quantity of electronic</label>
           <input type="number" name="electroQty" class="form-control" id="electroQty" form="post-form" placeholder="quantity, i.e: 2"/></td>
         </div>
         <div class="col-xs-4 no-margin no-padding">
           <label for="electroCondition" class="sr-only">condition of electronic</label>
           <input type="text" name="electroCondition" class="form-control re" id="electroCondition" form="post-form" placeholder="quality: new, mint, acceptable, or other"/></td>
         </div>
       </div>

       <div class="row no-padding no-margin">
         <div class="col-xs-4 no-padding">
           <label for="electroColor" class="sr-only">color of electronic</label>
           <input type="text" name="electroColor" class="form-control" id="electroColor" form="post-form" placeholder="color, i.e: red" /></td>
         </div>
       </div>
      </fieldset>
     </section>
    <?php
    }

    //show book form
    function show_book_form(){
    ?>
     <section id="book-form" style="display:none;">
      <fieldset>
       <legend>Insert Book's Informations </legend>
       <div class="row no-padding no-margin ">
         <div class="col-xs-4 no-padding no-margin ">
           <label for="isbnNumb" class="sr-only">isbn of the book</label>
           <input type="text" name="isbnNumb" id="isbnNumb" size="13" maxlength="13" 
             form="post-form" placeholder="ISBN" class="form-control"/>
         </div>
         <div class="col-xs-4 no-padding no-margin">
           <label for="booktitle" class="sr-only">tittle of the book</label>
           <input type="text" name="booktitle"  id="booktitle" 
              placeholder="Title" class="form-control"/></td>
         </div>
         <div class="col-xs-4 no-padding no-margin">
           <label for="edNumb" class="sr-only">edition of the book</label>
           <input type="number" name="edNumb" id="edNumb" form="post-form"
              placeholder="Edition" class="form-control" />
         </div>
       </div>

       <div class="row no-padding no-margin">
         <div class="col-xs-4 no-margin no-padding">
           <label for="authorName" class="sr-only">author of the book</label>
           <input type="text" name="authorName" id="authorName" form="post-form" 
             placeholder="AUthor" class="form-control"/>
         </div>
         <div class="col-xs-4 no-padding no-margin">
           <label for="bookprice" class="sr-only">price of the book</label>
           <input type="number" name="bookprice" id="bookprice" form="post-form" 
              placeholder="Price" class="form-control"/>
         </div>
         <div class="col-xs-4 no-padding no-margin">
           <label for="bookqty" class="sr-only">quantity of book</label>
           <input type="number" name="bookqty" id="bookqty" form="post-form" 
              placeholder="Quantity" class="form-control"/>
         </div>
       </div>

       <div class="row no-padding no-margin">
         <div class="col-xs-4 no-margin no-padding">
           <label for="booklanguage" class="sr-only">language of the book</label>
           <input type="text" name="booklanguage" id="booklanguage" form="post-form" 
              placeholder="Language" class="form-control"/>
         </div>
         <div class="col-xs-4 no-padding no-margin">
           <label for="bookpublisher" class="sr-only">publisher of the book</label>
           <input type="text" name="bookpublisher" id="bookpublisher" form="post-form" 
              placeholder="Publisher" class="form-control"/>
         </div>
         <div class="col-xs-4 no-padding no-margin">
           <label for="bookquality" class="sr-only">quality of the book</label>
           <input type="text" name="bookquality" id="bookquality" form="post-form" 
              placeholder="Book Quality" class="form-control"/>
         </div>
       </div>
      </fieldset>
     </section>
    <?php
    }

    //show services form
    function show_service_form(){
    ?>
     <section id="service-form" style="display:none;">
     <fieldset>
       <legend>More details about the service</legend>
       <div class="row no-padding no-margin ">
         <div class="col-xs-6 no-padding no-margin">
           <label for="servicetype" class="sr-only">type of service</label>
           <input type="text" name="servicetype" id="servicetype" form="post-form"
             placeholder="what type, i.e: need homework help.." class="form-control"/>
         </div>
         <div class="col-xs-6 no-padding no-margin">
           <label for="servicetype" class="sr-only">type of service</label>
           <input type="text" name="servicePrice" form="post-form"
              placeholder="compensation...?" class="form-control"/>
         </div>
       </div>
      </fieldset>
     </section>
    <?php
    }

  }
 



 class Post extends NewPost{
  
   private $postid;
   private $postdate;
   private $postbyuserid;
   private $postonuserid;
   private $post_title;
   private $postcontent;
   private $server;
   private $host;
   private $parent;
   private $intid;
   private $photo;
   private $booknumb;
   private $item;

   private $fname; 
   private $lname;

   private $post_pic_data;
   private $post_item_data;
   private $post_book_data;

 

   //this constructor that can take an 4 different arrays as arguments
   //the 1st array is filled with data comming from the new post form
   //if the post contains pic, book, or items,those arrays will be included respectively.
   //the Constructor is called whenever a new post object is created.
   function __construct($post_data=false, $post_pic=false, $post_items=false, $post_book=false){

      $this->postid = (isset($post_data['postid'])) ? $post_data['postid'] : NULL;
      $this->postdate = (isset($post_data['postdate'])) ? $post_data['postdate'] : date("Y-m-d H:i:s");
      $this->post_title = (isset($post_data['post_title'])) ? $post_data['post_title'] : "title";
      $this->postbyuserid =  (isset($post_data['postbyuserid'])) ? $post_data['postbyuserid'] : NULL ;
      $this->postonuserid =  (isset($post_data['postonuserid'])) ? $post_data['postonuserid'] : NULL ;
      $this->postcontent = (isset($post_data['postcontent'])) ? $post_data['postcontent'] :  NULL;
      $this->server = (isset($post_data['server'])) ? $post_data['server'] : NULL;
      $this->host = (isset($post_data['host'])) ? $post_data['host'] : $_SERVER['HTTP_HOST'];
      $this->parent = (isset($post_data['parent'])) ? $post_data['parent'] : 0;
      $this->intid = (isset($post_data['intid'])) ? $post_data['intid'] : NULL;
      $this->photo = (isset($post_data['photo'])) ? $post_data['photo'] :'0';
      $this->booknumb = (isset($post_data['booknumb'])) ? $post_data['booknumb'] : NULL;
      $this->item = (isset($post_data['item'])) ? $post_data['item'] : '0';

      //poster firstname and lastname
     // $this->fname = (isset($post_data['fname'])) ?  $post_data['fname']: NULL;
     // $this->lname = (isset($post_data['lname'])) ? $post_data['lname'] : NULL;

      if ($post_pic !== false) {
       $this->post_pic_data = (isset($post_pic ['phnumb'])) ? $post_pic['phnumb'] : NULL;
      }
  
      if ($post_items !== false) {
       $this->$post_item_data = (isset($post_items['booknumb'])) ? $post_items['booknumb'] : NULL;
      }
  
      if ($post_book !== false) {
       $this->post_book_data = (isset($post_book['itnumber'])) ? $post_book['itnumber'] : NULL;
      }
    }


   //this function will save the post in the database
   //remainder about the insert prototype from the database.class.php file
   //inserid insert($array_data, $table, $low_priority = "", $ignore = "", $limit_numb = "")
   function save_post(){
     $db = new Database();
     $con = $db->conect_db(); 
    
     $post_infos = array("postid" => "'$this->postid'", "postdate"=>"'".date("Y-m-d H:i:s",time())."'",
                         "postbyuserid"=> "'$this->postbyuserid'", "postonuserid"=> "'$this->postonuserid'",
                          "posttitle" => "'$this->post_title'", "postcontent"=> "'$this->postcontent'", 
                          "server"=> "'$this->server'", "host"=> "'$this->host'", "parent"=> "'$this->parent'",
                          "intid"=> "'$this->intid'", "photo"=> "'$this->photo'", "booknumb"=> "'$this->booknumb'",
                          "item"=> "'$this->item'"
                        );
     

      $this->postid = $db->insert($post_infos, 'post');
      $this->post_date = time();
      
      //if there is a book included in the post, it will be save postbook table
      if (isset($this->post_book_data)) {
       $postbook_infos = array("postid" => "'$this->postid'", 
                              "booknumb"=> "'$this->post_pic_data['booknumb']'"
                             );
        $db->insert($postbook_infos, 'postbook');
      }

      //if there is any other item included in the post, it will be save postitem table
      if (isset($this->post_item_data)) {
       $postitem_infos = array("postid" => "'$this->postid'", 
                              "booknumb"=> "'$this->post_item_data['itnumber']'"
                             );
        $db->insert($postitem_infos, 'postitems');
      }
      
      //if there is any pic included in the post, it will be save postphoto table
      if (isset($this->post_pic_data)) {
       $postphoto_infos = array("postid" => "'$this->postid'", 
                              "booknumb"=> "'$this->post_book_data['phnumb']'"
                             );
        $db->insert($postphoto_infos, 'postphoto');
      } 
      
      return $this->postid;
    }
     

   //this is the function to display  post heading,
   //it include name of the poster, time it was posted, and the title of the post if any
   function display_post_header($fname, $lname, $postdate, $post_title,$userid=false){
     $UserAuthentication = new UserAuthentication($userid);
    if (empty($post_title )) {
      if ($userid !==false) {
        echo "<header class=\"row no-padding no-margin main-post-header\">".
               "<section class=\"col-xs-2  no-padding no-margin post-avatar\">".
                "<a href=\"profile.php?".'userid='.$userid."\">";
                $UserAuthentication->do_profilePic($UserAuthentication->user->profilepic, "", "60px",'40px');
             echo  "</a></section>".
               "<section class=\"col-xs-10 no-padding no-margin re\">".
                 "<h4><a href=\"profile.php?".'userid='.$userid."\">". $fname." ".$lname."</a>".
                 "</h4><time class=\"main-post-time text-muted\"><small>". 
                  date("M/j/Y",strtotime($postdate));
          echo "</small></time></section></header>";
      }else{
        echo "<header class=\"row no-padding no-margin main-post-header\">".
               "<section class=\"col-xs-2  no-padding no-margin post-avatar\">".
                "<a href=\"profile.php?".'userid='.$userid."\">";
                $UserAuthentication->do_profilePic($UserAuthentication->user->profilepic, "", "60px",'40px');
             echo  "</a></section>".
               "<section class=\"col-xs-10 no-padding no-margin\">".
                 "<h4>".$fname." ".$lname."</h4>".
                 "<time class=\"main-post-time text-muted\"><small>". 
                  date("M/j/Y",strtotime($postdate));
          echo "</small></time></section></header>";
      }
    }else{
      if ($userid !==false) {
         echo "<header class=\"row no-padding no-margin main-post-header\">".
               "<section class=\"col-xs-2  no-padding no-margin post-avatar\">".
                "<a href=\"profile.php?".'userid='.$userid."\">";
                $UserAuthentication->do_profilePic($UserAuthentication->user->profilepic, "", "60px",'40px');
             echo  "</a></section>".
               "<section class=\"col-xs-10 no-padding no-margin\">".
                 "<h4><a href=\"profile.php?".'userid='.$userid."\">". $fname." ".$lname."</a>"."<small> ".$post_title.
                 "</small></h4><time class=\"main-post-time text-muted\"><small>". 
                  date("M/j/Y",strtotime($postdate));
          echo "</small></time></section></header>";
      }else{
        echo "<header class=\"row no-padding no-margin main-post-header \">".
               "<section class=\"col-xs-2  no-padding no-margin post-avatar \">".
                "<a href=\"profile.php?".'userid='.$userid."\">";
                $UserAuthentication->do_profilePic($UserAuthentication->user->profilepic, "", "60px",'40px');
             echo  "</a></section>".
               "<section class=\"col-xs-10 no-padding no-margin\">".
                 "<h4>".$fname." ".$lname."<small> ".$post_title."</small></h4>".
                 "<time class=\"main-post-time text-muted\"><small>". 
                  date("M/j/Y",strtotime($postdate));
          echo "</small></time></section></header>";
      }
    }
   }

     

   //this is the function to display  any writing in the post,
   //it will not be displayed if the poster does not include any writing
   function display_post_content($content){
     echo "<p> ".$content. "</p>";
    }
   
   

  /*function display_post_pics($array){
      $pic_array = $array;
      $numb_pic= count($pic_array); //numb of pic in array
      if ($numb_pic !== 0) {
        if($numb_pic == 1){
         $width = (100/$numb_pic)-1;
        }elseif ($numb_pic == 2) {
         $width = (100/$numb_pic)-3;  
        } else{
          $width = (100/$numb_pic) +6.5;  
        }
       $height= (60/$numb_pic)+10;
       echo "<section class=\"main-post-img\">";
       foreach ($pic_array as $name => $path) {
         $alt_name= explode(".", $name);
         echo " <img style=\" margin: 0.5%;height:$height% ;width:$width%; display: inline-table;border-radius: 5px;
             // width: auto\9; /* ie8 *///\" src=$path$name alt= $alt_name[0] class =\"pic-in-post\" >";
       /* }
       echo "</section>";
      }
    }*/

    //this function place the number of pic user upload at once in to a post
    // the width and height of the div will be devided according to the number of pic
    //$pic_array is a number an array of pic name and it corresponding path
    function display_post_pics($pic_array, $numb_pic){
     if($numb_pic !== 0) {

      
       /*if($numb_pic ===1){
         echo "<section class=\"row main-post-img\" style=\"text-align:center; \">";//<div id=\"pic-in-post\" style=\"text-align:center;\">";
         echo "<div class =\"col-xs-4 \" ></div>"; //we want to fill the first column with emptiness so so the image will be in the middle column in the post has only one image
        }else{
         echo "<section class=\"row main-post-img no-padbding no-manrgin \">";//<div id=\"pic-in-post\">";
        }*/
        $j=0;
       for ($i=0; $i <count($pic_array) ; $i++) { 
         if ((($j%3) === 0) ||($j ===0)) {
           if($numb_pic ===1){
             echo "<section class=\"row main-post-img\" style=\"text-align:center; \">".
              "<div class =\"col-xs-4 \" ></div>";
            }else{
             echo "<section class=\"row main-post-img no-pafdding nov-margin re\">";
            }
          }

         echo "<div class =\"col-xs-4 \" >".//<div class =\"user-each-pic\">".
          "<img class = \"img-responsive user-img\"   src=\"".$pic_array[$i][0]."\"".
           "alt=".$i." ></div>";//</div>";
         $j++;
         if ((($j%3) === 0) ||($j === sizeof($pic_array))) {
           echo "</section>";
          } 
        }
      }else{return false;}
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
    /*@fname, @lname represent the firstname, lastname, of the poster.
    @date is the date the post was made.
    @title title of the post.
    @postContent is the content of the post.
    @commentid is the unique id of each comment. 
    @userid is the user id of the poster.
    @other_comment_style used to specify an alternative comment style for ht post.
    @array_pic is an array of picture included in the post.
    @numb_pic number of picture in the post,
    @closing is the closing braket(i.e </article>) for html tag. 
    it is used in service_func.php in the show_internship() method to close the html tag <article>.
    @what_kind tell what excatly the post is about. it can be about 'sale', 'service', 'tutorial request' and so on.
     this is used for notification purpose. it shows what  kind of notification we have.
    @forDisplayExistingpost is used when using the the function Display_Existingpost
      for showing posts and their comments. we disable it while using the notification systen to show post that was requested
    */
    function create_post($fname, $lname, $date, $title, $postContent ,$commentid,$userid=false,
      $other_comment_style= false,$array_pic = false, $numb_pic =false, /*$what_kind = false,*/ $closing="", $forDisplayExistingpost= true, $comment_txt='comment'){
     echo "<article class=\"row no-padding no-margin main-post\">";
        echo "<div class=\"col-xs-12 no-padding no-margin\">";
         $this->display_post_header($fname, $lname, $date, $title,$userid);
        echo "</div>";
        
        //finding out if user has entered something into the post textarea, if show it
       if(!empty($postContent)){
         echo "<section class=\"col-xs-12 no-padding no-margin main-post-body \">";
          echo $postContent;
         echo "</section>";
        }
        
        //finding out if user has included picture in the post, if yes show it/them
        if( ($numb_pic>0) && ($array_pic !==false)){
         echo "<section class=\"col-xs-12  no-margin main-post-body \">";
           $this->display_post_pics($array_pic, $numb_pic);
         echo "</section>";
        }
        
        //comment link/button on the bottom of each post
        echo "<section class=\"col-xs-12  no-margin no-padding \" id=\"post-".$commentid."\">".
              "<div class=\"row no-margin no-padding \">".
               "<section class=\"col-xs-4  no-margin \" >";
                if ($other_comment_style !==false) {
                 echo "<form  action=\"../controller/request.php?".'userid='.
                    $_GET['userid']."\" method=\"post\" name=\"request-form\">";
                 echo "<label for=\"request-title\" class=\"sr-only\">title of the request</label>".
                     "<input type=\"hidden\" name=\"request-title\" id=\"request-title\"".
                                                         "value=\"".$other_comment_style."\">";
                 echo "<label for=\"request-for\" class=\"sr-only\">request belongs to</label>".
                      "<input type=\"hidden\" name=\"request-for\"  id=\"request-for\"".
                                                               "value=\"".$commentid."\">";
                 echo "<label for=\"request-status\" class=\"sr-only\">status of the request</label>".
                      "<input type=\"hidden\" name=\"request-status\" id=\"request-status\" value=\"0\"> ";
                 echo  "<input type=\"submit\" name=\"request-form\" value=\"".$other_comment_style."\" class=\"post-buying text-muted\" id=\"buying-".$commentid."\" >";
                 echo "</form>";
                }
               echo "</section>";
               echo "<section class=\"col-xs-5 text-muted no-margin post-like \" id=\"". $commentid."\">like</section>";
               echo "<section class=\"col-xs-3 text-muted no-margin post-comment \" id=\"".
                                                  $commentid."\">".$comment_txt."</section>".
                    "<span ></span>".
                "</div>".
              "</section>";

      //comment link/button on the bottom of each post
       if ($forDisplayExistingpost === true) {
         echo "<section class=\"col-xs-12  no-margin no-padding \">".
            "<ul id=\"cmt-post\" class=\"no-margin no-padding each-cmt \">";
       }
                                                                                  
      
    }


    
    //@return a list of items
   //if $itnumb !==true, that means we want to view items individually with next, prev
   //if $expand !==false, we want to expand everything.
   function show_each_item($db, $postcontent,$array_items, $college,$pic_array){
        $ctn ='';
       
        //category
         $array_category =  $db->select("categories",'where catid ='.$array_items["catid"], "catname");

         $pic_format ='';
         if (isset($pic_array)&& !empty($pic_array)){//we have pic in the post
           $pic_format  .= "<img class=\"item-img img-responsive\" src=\"".$pic_array[0][0]."\" alt=\"item pic\" >";
          }

          $ctn .= "<section class=\"row no-padding no-margin \">".
                   "<div class=\"col-xs-12 no-padding no-margin\"><p>".$postcontent."</p></div>";

           $ctn .="<div class=\"col-xs-12 no-padding no-margin table-responsive\">".
                    "<table class=\"table table-striped\"><tr>";

          if ($pic_format !=='') {//checking if there exist a picture with the book
            $ctn .= "<td rowspan=\"7\" class=\"top-tr \">".$pic_format."</td><td>";
          } else {
             $ctn .= "<td class=\"td-static text-muted\"><td>";
          }
           $ctn .=   "</td></tr>".
                     "<tr ><td class=\"td-static text-muted\"><small>Kind: </small></td>".
                     "<td >".$array_items['itname']."</td></tr>".
                     "<tr><td class=\"td-static text-muted\"><small>Brand: </small></td>".
                     "<td >".$array_items['itBrand']."</td></tr>";
          
         $ctn .= "<tr ><td class=\"td-static text-muted\"><small>Quality: </small></td>".
                     "<td class=\"\">".$array_items["itquality"]."</td></tr>".
                     "<tr ><td class=\"td-static text-muted\"><small>Quantity: </small></td>".
                     "<td class=\"\">".$array_items["itquantity"]."</td></tr>".
                     "<tr><td class=\"td-static text-muted\"><small>Color: </small></td>".
                     "<td class=\"\">".$array_items["itColor"]."</td></tr>".
                     "<tr ><td class=\"td-static text-muted\"><small>Price: </small></td>".
                     "<td class=\"\">$".$array_items["itprice"]."</td></tr>".
                     "</table></div>".
                     "<ul class=\"col-xs-12 no-padding no-margin list-inline\">".
                      "<li>".
                       "<small class=\"text-info text-lowercase\">Cat: ".$array_category[0][0]."</small>".
                      "</li>".
                      "<li><small class=\"text-info\">  Type: ".$array_items['itKind']."</small></li>".
                     "</ul>".
                     "</secton>";
        
        return $ctn;
    }
    

    //@return a list of items
   //if $itnumb !==true, that means we want to view items individually with next, prev
   //if $expand !==false, we want to expand everything.
   function show_each_service($db, $postcontent,$array_items, $college,$pic_array){
        $ctn ='';
       
        //category
         $array_category =  $db->select("categories",'where catid ='.$array_items["catid"], "catname");

         $pic_format ='';
         if (isset($pic_array)&& !empty($pic_array)){//we have pic in the post
           $pic_format  .= "<img class=\"item-img img-responsive\" src=\"".$pic_array[0][0]."\" alt=\"item pic\" >";
          }

          $ctn .= "<section class=\"row no-padding no-margin \">".
                   "<div class=\"col-xs-12 no-padding no-margin\"><p>".$postcontent."</p></div>";

           $ctn .="<div class=\"col-xs-12 no-padding no-margin table-responsive\">".
                    "<table class=\"table table-striped\"><tr>";

          if ($pic_format !=='') {//checking if there exist a picture with the book
            $ctn .= "<td rowspan=\"7\" class=\"top-tr \">".$pic_format."</td><td>";
          } else {
             $ctn .= "<td class=\"td-static text-muted\"><td>";
          }
           $ctn .=   "</td></tr>".
                     "<tr ><td class=\"td-static text-muted\"><small>Kind: </small></td>".
                     "<td >".$array_items['itname']."</td></tr>".
                     "<tr><td class=\"td-static text-muted\"><small>Brand: </small></td>".
                     "<td >".$array_items['itBrand']."</td></tr>";
          
         $ctn .= "<tr ><td class=\"td-static text-muted\"><small>Quality: </small></td>".
                     "<td class=\"\">".$array_items["itquality"]."</td></tr>".
                     "<tr ><td class=\"td-static text-muted\"><small>Quantity: </small></td>".
                     "<td class=\"\">".$array_items["itquantity"]."</td></tr>".
                     "<tr><td class=\"td-static text-muted\"><small>Color: </small></td>".
                     "<td class=\"\">".$array_items["itColor"]."</td></tr>".
                     "<tr ><td class=\"td-static text-muted\"><small>Price: </small></td>".
                     "<td class=\"\">$".$array_items["itprice"]."</td></tr>".
                     "</table></div>".
                     "<ul class=\"col-xs-12 no-padding no-margin list-inline\">".
                      "<li>".
                       "<small class=\"text-info text-lowercase\">Cat: ".$array_category[0][0]."</small>".
                      "</li>".
                      "<li><small class=\"text-info\">  Type: ".$array_items['itKind']."</small></li>".
                     "</ul>".
                     "</secton>";
        
        return $ctn;
    }
    

    //@return a list of items
   //if $itnumb !==true, that means we want to view items individually with next, prev
   //if $expand !==false, we want to expand everything.
   function show_each_book($db, $postcontent,$array_book, $college,$pic_array){
      $ctn ='';
     
      //category
       $array_category =  $db->select("categories",'where catid ='.$array_book[0]["catid"], "catname");
       $pic_format ='';
       if (isset($pic_array)&& !empty($pic_array)){//we have pic in the post
           $pic_format  .= "<img class=\"item-img img-responsive\" src=\"".$pic_array[0][0]."\" alt=\"item pic\" >";
          }

        $ctn .= "<section class=\"row no-padding no-margin \">".
                   "<div class=\"col-xs-12 no-padding no-margin\"><p>".$postcontent."</p></div>";

       $ctn .="<div class=\"col-xs-12 no-padding no-margin\"><table class=\"table table-striped\"><tr>";
      
        if ($pic_format !=='') {//checking if there exist a picture with the book
          $ctn .= "<td rowspan=\"19\" class=\"top-tr \">".$pic_format."</td>";
        } else {
           //$ctn .= "<td>";
        }
        


         $ctn .=  "<td class=\"td-static text-muted\"><small>ISBN: </small></td>".
                   "<td>".$array_book[0]['bookisbn']."</td></tr>".
                   "<tr ><td class=\"td-static text-muted\"><small>Author: </small></td>".
                   "<td >".$array_book[0]['bookauthor']."</td></tr>";
      
       $ctn .= "<tr ><td class=\"td-static text-muted\"><small>Title: </small></td>".
                   "<td>".$array_book[0]["booktitle"]."</td></tr>".
                   "<tr ><td class=\"td-static text-muted\"><small>Edition: </small></td>".
                   "<td>".$array_book[0]["bookEdNumb"]."</td></tr>".
                   "<tr ><td class=\"td-static text-muted\"><small>Publisher: </small></td>".
                   "<td>".$array_book[0]["bookpublisher"]."</td></tr>".
                   "<tr ><td class=\"td-static text-muted\"><small>language: </small></td>".
                   "<td>".$array_book[0]["booklanguage"]."</td></tr>".
                   "<tr ><td class=\"td-static text-muted\"><small>Quality: </small></td>".
                   "<td>".$array_book[0]["bookquality"]."</td></tr>".
                   "<tr ><td class=\"td-static text-muted\"><small>Quantity: </small></td>".
                   "<td>".$array_book[0]["bookquantity"]."</td></tr>".
                   "<tr ><td class=\"td-static text-muted\"><small>Price: </small></td>".
                   "<td>$".$array_book[0]["bookprice"]."</td></tr>".
                   "</table></div>".
                   "<ul class=\"col-xs-12 no-padding no-margin list-inline\">".
                      "<li>".
                       "<small class=\"text-info text-lowercase\">Cat: Book</small>".
                      "</li>".
                      "<li><small class=\"text-info\">  Type: ".$array_book[0]["booktitle"]."</small></li>".
                   "</ul>".
                 "</secton>";

          
          
        
      
      return $ctn;
    }



   //this is the function to display  posts
   function display_ExistingPost($array_post,$db,$comment_txt='comment'){
     //base case
     if($array_post=== false){ return false;}

     for ($i=count($array_post)-1; $i >= 0; $i--) {
       $v = $i +1; 
       $user= $db->select("user",'where userid ='.$array_post[$i]["postbyuserid"], "userid, fname, lname,college");
       //checking whether post is parent or comment
       if($array_post[$i]["parent"] !== "0"){ //deside which post to delete with jquery
         echo "<li id=\"".$array_post[$i]['postid']."\" class=\"delete cmt-posts\" style=\" border:0px;\">";
       }else{
          echo "<li id=\"".$array_post[$i]['postid']."\" class=\"cmt-posts\" >";
        }
       //checking if post has pics included 
       $pic_array=array(); 
       if ($array_post[$i]["photo"] !== '0') {
         //select phpath from photo where postid =1;
          $pic_array = $db->select("photo",'where postid ='.$array_post[$i]['postid'], 'phpath');//select post pics
        }
       //checking if post has item inluded included 
       $items_array = false; 
       if ($array_post[$i]["item"] !== '0') {
         //select items included in the post
         //select * from items, postitems where postitems.itnumber = items.itnumb and postitems.postid = 2;
          $items_array =$db->select_2dArray("items",'where postid='.$array_post[$i]['postid']);
        }
        //checking if post has book included in it
        $book_array = false; 
        if (($array_post[$i]["booknumb"] !== '0')&&($array_post[$i]["booknumb"] !== null)) {
         //select book included in the post
          $book_array =$db->select_2dArray("book",'where booknumb='.$array_post[$i]['booknumb']);
        }

        //creating the html post
        $item_format ='';
        $service_format ='';
        if (($items_array !== false)||($book_array !== false)) { //is there either a book or other item included in the post
         if ($items_array !== false) {//there was items inlcuded in the post
           for ($j=0; $j < count($items_array) ; $j++) { 
             if ($items_array[$j]['catid'] === '4') {//category is service
               $service_format .= $this->show_each_item($db,$array_post[$i]['postcontent'],$items_array[$j],$user[0][3],$pic_array);
              }else{//category is sales items
               $item_format .= $this->show_each_item($db,$array_post[$i]['postcontent'],$items_array[$j],$user[0][3],$pic_array);
              }
            }
          }

          if ($book_array !== false) {//there is a book in the post
           $item_format .= $this->show_each_book($db,$array_post[$i]['postcontent'], $book_array,$user[0][3],$pic_array);
          }
          if ($service_format !=='') {//we want to put service in separate post
           $this->create_post($user[0][1],$user[0][2],$array_post[$i]['postdate'],
           $array_post[$i]['posttitle'],$service_format, $array_post[$i]['postid'],$user[0][0],"can help?",$pic_array, count($pic_array),"</article>",true,$comment_txt );
          }
          if ($item_format !=='') {//if there is items posted
           $this->create_post($user[0][1],$user[0][2],$array_post[$i]['postdate'],
            $array_post[$i]['posttitle'],$item_format, $array_post[$i]['postid'],$user[0][0],'send buying request',$pic_array, count($pic_array),'',true,$comment_txt );
          }
        }else{//no items or book for sales were included in this post, just regular text post
         $this->create_post($user[0][1],$user[0][2],$array_post[$i]['postdate'],
          $array_post[$i]['posttitle'],"<p>".$array_post[$i]['postcontent']."</p>", $array_post[$i]['postid'],$user[0][0],false,$pic_array, count($pic_array),'',true,$comment_txt );
        }
        
          
        //getting the children of a particular post
        $post_children = $db->select_2dArray("post",  'where parent ='.$array_post[$i]['postid']);
        //  echo "<div id=\"cmt-wall\" class=\"myschool_wall\"><ul id=\"cmt-posts\" style=\"background-color:  #999966;\"><ul>";
        $this->display_ExistingPost($post_children,$db,'reply');//recursion for getting the childreen
         
        echo "</li>";
         echo "</ul></section>";
        echo "</article>";

        //}
      }
    }





    //this is a lightweight version of the function display_ExistingPost($array_post,$db)
    //it is used to display the post that a person requested.
    //it is used mainly in the notification section in services.php
    //this is the function to display  posts
   function display_PostRequested($db, $userid, $fname, $lname, $college,$items_array=false, $book_array=false){
     //base case
     //if($array_post=== false){ return false;}
    //for ($i=count($array_post)-1; $i >= 0; $i--) {
     //$v = $i +1; 
     //$user= $db->select("user",'where userid ='.$array_post[$i]["postbyuserid"], "userid, fname, lname,college");
     //checking whether post is parent or comment
     //if($array_post[$i]["parent"] !== "0"){ //deside which post to delete with jquery
      // echo "<li id=\"".$items_array['postid']."\" class=\"delete cmt-posts\" style=\" border:0px;\">";
     //}else{
        //echo "<div id=\"".$items_array['postid']."\" class=\"cmt-posts\" >";
     ///  }
     //checking if post has pics included 
     //$pic_array=array(); 
     //if (($items_array['postid'] !== 'null')&&($items_array['postid'] !== NULL)){
       //select phpath from photo where postid =1;
     //   $pic_array = $db->select("photo",'where postid ='.$items_array['postid'], 'phpath');//select post pics
     //   var_dump($pic_array);
     // }


     //checking if post has item inluded included 
     //$items_array = false; 
     //if ($array_post[$i]["item"] !== '0') {
       //select items included in the post
       //select * from items, postitems where postitems.itnumber = items.itnumb and postitems.postid = 2;
      //  $items_array =$db->select_2dArray("items",'where postid='.$array_post[$i]['postid']);
     // }
      //checking if post has book included in it
     // $book_array = false; 
     // if (($array_post[$i]["booknumb"] !== '0')&&($array_post[$i]["booknumb"] !== null)) {
       //select book included in the post
       // $book_array =$db->select_2dArray("book",'where booknumb='.$array_post[$i]['booknumb']);
     // }

      $posttitle = $items_array["itname"]." for sale!"; //default post title
      //checking if post has pics included 
      $pic_array=array(); 
      //getting the original post that included the item
      $array_post =false;//
      if (($items_array["postid"] !== '')&&($items_array["postid"] !== 'null')&&($items_array["postid"] !== NULL)) {
       $array_post = $db->select_2dArray("post",  'where postid ='.$items_array["postid"]);
       //select phpath from photo where postid =1;
       $pic_array = $db->select("photo",'where postid ='.$items_array['postid'], 'phpath');//select post pics
      }
       
       //if getting the original does not return false, we get the original title of the post
      if ($array_post !== false) {
        $posttitle =$array_post[0]['posttitle'];
      }
       
     //creating the html post
     $item_format ='';
     $service_format ='';
     if (($items_array !== false)||($book_array !== false)) { //is there either a book or other item included in the post
       if (($items_array !== false)&&($array_post !== false)) {//there was items inlcuded in the post, and it was posted
         //for ($j=0; $j < count($items_array) ; $j++) { 
         if ($items_array['catid'] === '4') {//category is service
           $service_format .= $this->show_each_item($db,$array_post[0]['postcontent'],$items_array,$college,$pic_array);
          }else{//category is sales items
           $item_format .= $this->show_each_item($db,$array_post[0]['postcontent'],$items_array,$college,$pic_array);
          }
        }elseif(($items_array !== false)&&($array_post === false)) {//there was items inlcuded in the post, but was not posted
         if ($items_array['catid'] === '4') {//category is service
           $service_format .= $this->show_each_item($db,'',$items_array,$college,$pic_array);
          }else{//category is sales items
            $item_format .= $this->show_each_item($db,'',$items_array,$college,$pic_array);
          }
        }else{}//do nohing

       if (($book_array !== false)&&($array_post !== false)) {//there is a book in the post,and it was posted
         //we change the default title to have book isbn + item name
         $posttitle = "book's isbn ".$book_array['isbn'].' and '.$array_items["itname"]." for sale!";
         //append this to the item format html
         $item_format .= $this->show_each_book($db,$array_post[0]['postcontent'], $book_array,$college,$pic_array);
        }elseif(($book_array !== false)&&($array_post === false)){//there was a book inlcuded in the post, but was not posted
         $item_format .= $this->show_each_book($db,'', $book_array,$college,$pic_array);
        }else{}//do nohing

        if ($service_format !=='') {//we want to put service in separate post
         $this->create_post($fname,$lname,$items_array["itcreatedate"],
         $posttitle,$service_format, $items_array['postid'],$userid,"can help?",$pic_array, count($pic_array),"</article>" ,false);
        }
        if ($item_format !=='') {//if there is items posted
         $this->create_post($fname,$lname,$items_array["itcreatedate"],$posttitle,$item_format,
           $items_array['postid'],$userid,'send buying request',$pic_array, count($pic_array),'', false);
        }
      }
  //    create_post($fname, $lname, $date, $title, $postContent ,$commentid,$userid=false,
   //           $other_comment_style= false,$array_pic = false, $numb_pic =false, /*$what_kind = false,*/ $closing="")
      
        
        //getting the children of a particular post
        //$post_children = $db->select_2dArray("post",  'where parent ='.$array_post[$i]['postid']);
       //  echo "<div id=\"cmt-wall\" class=\"myschool_wall\"><ul id=\"cmt-posts\" style=\"background-color:  #999966;\"><ul>";
       
            //    $this->display_ExistingPost($post_children,$db);//recursion for getting the childreen
       
    //  echo "</div>";
     //  echo "</ul></section>";
      echo "</article>";

      //}
    }
  }
  
  
  


 
?>