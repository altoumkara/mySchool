<!-- hide script from old browsers


  $(document).ready(function(){
    $("ul#posts > .delete").remove();//delete all the direct child ul#posts where the class is 'delete'
    $("#service-form").hide();
    $("#book-form").hide();
    $("#furni-form").hide();
    $("#electro-form").hide();
   $(".extra-stuff").show("fast", function(){ 

      //show pics
       showPhoto();

      //show book
      showBook();
      

      //show furniture 
      showFurni();

      //show electronics
     showElectro();

     //if service checkbox is checked
     showService();


    });

    //hide about content,project content and partner content when document is loaded
    //$("#profile_intro_yourself").hide();
    //$("#profile_project_content").hide();
    //$("#profile_partner_content").hide();

   //show profile summary            
    showProfieleSummary();

    //show profile about           
    showProfieleAbout();
  
    //show a list project on the user profile            
    showProfieleProject();
  
    //show the list partner of partner on user        
    showProfileHW();

    //post form asynchronizely with ajax
    doAjaxPost();

    //post comment asynchronizely with ajax
    doAjaxPostComment();

    
    //save about me with ajax
    saveAboutUser();

    //edit about me 
    editAboutUser();

    //for notification, the popovers plugin must be initialize
    //this will enable all popovers in the document-the caret arrow in front each notification
   //activatePopovers();

    //upload file
    //doAjaxUpload();

    //this function will give the appropriate css to the image based on its hight
    orientImage();

    //this function show the 'change profile picture' button
    showProfileChangePicBtn();

   //sent a request for partnership in an ajax way.
    doAjaxPartnershipRequest();

   //sent a request for tutorial help in an ajax way.
   doAjaxTutorialRequest();

   //this function show the 'choose' button for choose a profile on userfile.php
   //appear next to the pic when mouse if hover it.
   makeChooseProfileBtnAppear();
  });


//this function will give the appropriate css to the image based on its hight
function orientImage(){
  var height = $('.profilepic img').height();
  //var width = $('.profilepic img').width();
  if (height < 200) {
    $('.profilepic .col-xs-12 img, .righttop img').addClass("profilepic-img");
  }else{
    $('.profilepic img, .righttop img').removeClass("profilepic-img");
  }
}  



//this function show the 'choose' button for choose a profile on userfile.php
//appear next to the pic when mouse if hover it.
function makeChooseProfileBtnAppear(){
    $('.user-each-pic-name').mouseenter(function() {
      var picid = this.id;
      $('#pro-img-'+picid).before($("<input type=\"submit\" name=\"profile-pic-form\" value=\"choose\" class=\"signup-button pro-btn\" />"));
    });

    $('.user-each-pic-name, user-img').mouseleave(function() {
      $('input[name="profile-pic-form"]').remove();
    });
}


//this function show the 'change profile picture' button
function showProfileChangePicBtn(){
    $('.profilepic').mouseenter(function() {
      $('input[value="change profile picture"]').show();
    });

    $('.profilepic').mouseleave(function() {
      $('input[value="change profile picture"]').hide();
    });
}





//sent a request for partnership in an ajax way.
function doAjaxPartnershipRequest(){ 
 $("input[name='part-request-form']").click(function(){ 
   if (($("p#fname")===undefined)&& ($("p#fname")==='')){
     $("input[name='part-request-form']").addClass("btn");
     $("input[name='part-request-form']").addClass("disabled");
     $("p.not-loggin-danger").show();
     return false;
    };  
   //where your post form be sent
   var action_link = $('#become-part').attr('action');

   var part_request_content ={ //content of the partnership request form
     part_request_title: $("input[id='part-request-title']").val(), 
     part_request_for : $("input[id='part-request-for']").val(), 
     part_request_status : "0"
    };
    //start the ajax
    $.ajax({
      url: action_link , //this is the php file that processes the data and send mail
     type: "POST",
     data:  {part_request_data:part_request_content} , //data for server
     cache: false,//Do not cache the page
     success: function (datass, textStatus, jqXHR) {
       //we want the succes text to show after the ajax call is successful
       $("p.part-request-sent-succes").show();
       //we want the succes text to show after the ajax call is successful
       $("p.part-request-sent-succes").show();

        //After the request is sent we want the button to be show "resquest sent"
       $("input[name='part-request-form']").attr('value', 'Resquest sent'); //versions older than 1.6
       $("input[name='part-request-form']").prop('value', 'Resquest sent'); //versions newerthan 1.6
       $("input[name='part-request-form']").addClass("btn");
       $("input[name='part-request-form']").addClass("disabled");
      
      }
    });

    return false;
  });   
} 


//sent a request for tutorial help in an ajax way.
function doAjaxTutorialRequest(){ 
 $("input[name='tuto-request-form']").click(function(){ 
   if (($("p#fname")===undefined)&& ($("p#fname")==='')){
     $("input[name='tuto-request-form']").addClass("btn");
     $("input[name='tuto-request-form']").addClass("disabled");
     $("p.tuto-loggin-danger").show();
     return false;
    };  
   //where your post form be sent
   var action_link = $('#tutorial-help').attr('action');
   var tuto_request_content ={ //content of the partnership request form
     tuto_request_title: $("input[id='tuto-request-title']").val(), 
     tuto_request_for : $("input[id='tuto-request-for']").val(), 
     tuto_request_status : "0"
    };
    //start the ajax
    $.ajax({
      url: action_link , //this is the php file that processes the data and send mail
     type: "POST",
     data:  {tuto_request_data:tuto_request_content} , //data for server
     cache: false,//Do not cache the page
     success: function (datass, textStatus, jqXHR) {
       //we want the succes text to show after the ajax call is successful
       $("p.tuto-request-sent-succes").show();
       //we want the succes text to show after the ajax call is successful
       $("p.tuto-request-sent-succes").show();

        //After the request is sent we want the button to be show "resquest sent"
       $("input[name='tuto-request-form']").attr('value', 'Resquest sent'); //versions older than 1.6
       $("input[name='tuto-request-form']").prop('value', 'Resquest sent'); //versions newerthan 1.6
       $("input[name='tuto-request-form']").addClass("btn");
       $("input[name='tuto-request-form']").addClass("disabled");
      
      }
    });
    
    return false;
  });   
} 




















  

function getExternalPic(){
   var userid = document.getElementById("userid").innerHTML;
    $(".pics_in_post").load("userfiles.php?userid="+userid+ "&photo=true&slider=true main#usersave-items #userpict", 
                                   function(response, status, xhr) {
                                      if ( status == "error" ) {
                                         alert("Error occured: " + xhr.status + " " + xhr.statusText );
                                        } else{
                                        //createDiv();
                                        slide();
                                    };
                                });
};


function deleteUlComment(){
    $("ul").remove(".delete")
};



//if we were to use a slider where the current accessed picture is shown on top
//of the slider, this function will create a div element for each single
//photo on the top
var createDiv=function (){
 return function(){ 
   $(".user-img").each(function(i, el){
     if(i == 0){
       $("<div class=\"top-view-container\"></div> ").insertBefore("#userpict");
     };

     $(".top-view-container").append("<div id=\"top-view\">"+ el.outerHTML+ "</div>");

    });
  };
}();


//slider function
var slide=function (){
  return function(){
   
    $('#userpict').slick({
     dots: true,
     infinite: true,
     speed: 250,
     slidesToShow: 4,
     slidesToScroll: 4,
     arrows: true,
     //asNavFor: '.top-view-container',
     //centerMode: true,
     //focusOnSelect: true
    });
  }
}();



//if book icon click
function showBook(){
 $('#icon-book').click(function(){
      $("#service-form").hide();
      $("#furni-form").hide();
      $("#electro-form").hide();
      $(".pics_in_post").hide();
      $("#book-form").toggle();
    });   
};

 //if electronic click
function showElectro(){
    $('#icon-electro').click(function(){
      $("#service-form").hide();
      $("#book-form").hide();
      $("#furni-form").hide();
      $(".pics_in_post").hide();
      $("#electro-form").toggle();
     });
};

//if bed icon click
function showFurni(){
    $('#icon-bed').click(function(){
      $("#service-form").hide();
      $("#book-form").hide();
      $("#electro-form").hide();
      $(".pics_in_post").hide();
      $("#furni-form").toggle();
    });
};

//if service checkbox is checked
function showService(){
 $('input[name="check-for_services"]').on('click', function(){
    if($(this).is(':checked')){ 
     $("#book-form").hide();
     $("#furni-form").hide();
     $("#electro-form").hide();
     $(".pics_in_post").hide();
     $("#service-form").show();
    }else{$("#service-form").hide();} 

   });
};


//if photo icon click
function showPhoto(){
     $("#icon-photo").click(function() {
        $("#service-form").hide();
        $("#book-form").hide();
        $("#furni-form").hide();
        $("#electro-form").hide();
        
        //test to see if photo element is already loaded
        if( $('.only-slider').length >0){
          $(".pics_in_post").toggle(); //if loaded, we just toggle
        } else{ 
         getExternalPic(); //if not loaded, we load photos using ajax
         $(".pics_in_post").show();
        }
    });
};
 
 //show profile summary            
function showProfieleSummary(){
   $("#summary-header").addClass("user-info-header-style"); //show summary by default
   $("#line-below-smry-header").hide();
  $("#summary-header").click(function(){
        $("#profile_project_content").hide();
        $("#profile_partner_content").hide();
        $("#profile_intro_yourself").hide();
        $("#line-below-abt-header").show();
        $("#line-below-part-header").show();
        $("#line-below-pro-header").show();
        $("#line-below-smry-header").hide();
        $("#project-header").removeClass("user-info-header-style");
        $("#partner-header").removeClass("user-info-header-style");
        $("#about-header").removeClass("user-info-header-style");
        $("#summary-header").addClass("user-info-header-style");
        $("#profile_summary_content").show();


   });
}


//show profile about           
function showProfieleAbout(){
  $("#about-header").click(function(){
        $("#profile_project_content").hide();
        $("#profile_partner_content").hide();
        $("#profile_summary_content").hide();
        $("#line-below-part-header").show();
        $("#line-below-pro-header").show();
        $("#line-below-smry-header").show();
        $("#line-below-abt-header").hide();
        $("#summary-header").removeClass("user-info-header-style");
        $("#project-header").removeClass("user-info-header-style");
        $("#partner-header").removeClass("user-info-header-style");
        $("#about-header").addClass("user-info-header-style");
        $("#profile_intro_yourself").show();


   });
}

 //show a list project on the user profile            
function showProfieleProject(){
  $("#project-header").click(function(){
        $("#profile_partner_content").hide();
        $("#profile_summary_content").hide();
        $("#profile_intro_yourself").hide();
        $("#line-below-smry-header").show();
        $("#line-below-abt-header").show();
        $("#line-below-part-header").show(); 
        $("#line-below-pro-header").hide();
        $("#summary-header").removeClass("user-info-header-style");
        $("#partner-header").removeClass("user-info-header-style");
        $("#about-header").removeClass("user-info-header-style");
        $("#project-header").addClass("user-info-header-style");
        $("#profile_project_content").show();

   });
}

 //show the list of partner on user        
function showProfileHW(){
  $("#partner-header").click(function(){
        $("#profile_summary_content").hide();
        $("#profile_project_content").hide();
        $("#profile_intro_yourself").hide();
        $("#line-below-smry-header").show();
        $("#line-below-abt-header").show();
        $("#line-below-pro-header").show();
        $("#line-below-part-header").hide();
        $("#summary-header").removeClass("user-info-header-style");
        $("#project-header").removeClass("user-info-header-style");
        $("#about-header").removeClass("user-info-header-style");
        $("#partner-header").addClass("user-info-header-style");
       // document.getElementById("#profile_partner_content").style.overflow = "auto";
        $("#profile_partner_content").show();
   });
}


//for notification, the popovers plugin must be initialize
//this will enable all popovers in the document-the caret arrow in front each notification
function activatePopovers(){
  $('[data-toggle="popover"]').popover();
  //popover() function comes with bootstrap.js or bootstrap.min.js
}


  /**this function will put user profile pic in the right place,
    if the user does have any profile pic, the default profile pic will be shosen
    @width is the width of the picture
    @height is the height of the picture
    $image_circle is used to specify if the image will be a circle or not*/
  function do_profilePic(path, image_circle,width, height){
      var imageObject='';
      if ((path !== null)&&(path !== 'NULL')&&(path !== '')&&(path !==undefined)){
         /*echo "<div class=\"col-xs-12 no-padding no-margin img-responhsive re".
              $image_circle."\"
         style=\"background: url('".$path."') no-repeat center center;
             width=".$width." height=".$height."\">";*/
        imageObject = "<img src= \""+path+"\" alt=\"profile pic\"  class=\"img-responsive "+
                       image_circle+"\" width=\""+width+"\" height=\""+height+"\">";
         //echo "</div>";
       
          //$UserAuthentication->do_profilePic($UserAuthentication->user->profilepic,"img-cirjcle", "","");
      }else{ 
      imageObject = "<img src= \"../defaultporfilepic/defaultProfileImage.png\" alt=\"profile pic\"  class=\"img-responsive "+
                       image_circle+"\" width=\""+width+"\" height=\""+height+"\">";
   } 
   return imageObject;
   }    

//this is for the ajax version
//this is the function to display  post heading,
//it include name of the poster, time it was posted, and the title of the post if any
function displayAjaxPostHeader(fname,lname,userid,title){
 var date = new Date().toDateString();
 var hdr='';
 var profilePic =document.getElementById("profilePic").innerHTML;//profile pic
// if ((title ==='') ||  (title === false)) {
  /* hdr = "<header class=\"row no-padding no-margin main-post-header re\">"+
               "<section class=\"col-xs-2  no-padding no-margin post-avatar re \">"+
                "<a href=\"profile.php?"+'userid='+ userid+"\">"+
              do_profilePic(profilePic, "", "60px",'40px');
        hdr +=   "</a></section>"+
               "<section class=\"col-xs-10 no-padding no-margin re\">"+
                 "<h4><a href=\"profile.php?"+'userid='+ userid+"\">"+  fname+" "+ lname+"</a>"+
                 "</h4><time class=\"main-post-time text-muted\"><small>"+ 
                  date;
        hdr +=  "</small></time></section></header>";
  }else{*/
    hdr += "<header class=\"row no-padding no-margin main-post-header\">"+
               "<section class=\"col-xs-2  no-padding no-margin post-avatar\">"+
                "<a href=\"profile.php?userid="+ userid+"\">"+
                do_profilePic(profilePic, "", "60px",'40px')+
          "</a></section>"+
               "<section class=\"col-xs-10 no-padding no-margin\">"+
                 "<h4><a href=\"profile.php?userid="+ userid+"\">"+  fname+" "+ lname+"</a>"+"<small> "+title+
                 "</small></h4><time class=\"main-post-time text-muted\"><small>"+ 
                  date;
        hdr +=  "</small></time></section></header>";
  //}
    return hdr;
}



    
//AJAX version
//this is the function to display  any writing in the post,
//it will not be displayed if the poster does not include anything in the post
//@content is an array of post content
//@not_comment, if it is true, that mean we are posting a parent post. if it is false
//we just posting a comment to a post which in is just text based.
function displayPostContent(content,not_comment ){
  var cnt = "";
  var i = 0;
  var j = true;
  if (not_comment ===true) {
    if ((i===0)&&(content['post_content'] !== '')&&(content['post_content'] !== undefined)&&
      (content['post_content'] !== 'undefined')) {//checking if there exist a picture with the book
     cnt += "<section class=\"row no-padding no-margin \">"+
           "<div class=\"col-xs-12 no-padding no-margin\"><p>"+content['post_content']+
           "</p></div>";
    }else {
     cnt += "<section class=\"row no-padding no-margin \">"+
           "<div class=\"col-xs-12 no-padding no-margin\"><p></p></div>";
    } 

   if((content['booktitle']!=='')||(content['isbn']!=='')||(content['authorName']!=='')){
     cnt =cnt.concat( show_each_book(content['isbn'],content['authorName'], content['booktitle'],
                          content['edNumb'],content['bookquality'],content['bookqty'],
                          content['bookprice'],content['booklanguage'],
                          content['bookpublisher'],content['picture'][0])
                    );
    };     
  
   if((content['electroKind']!=="what-kind")&&(content['electroKind']!=="")&&(content['electroKind']!==undefined)&&
          (content['electroKind']!==null)){
     cnt =cnt.concat( show_each_item(content['electroName'],content['electroKind'],content['electroBrand'],
          "electronic",content['electroCondition'],content['electroQty'],content['electroColor'],
          content['electroPrice'],content['picture'][0]));
    };

   if ((content['furniName'] !=='')||(content['furniKind'] !=='')||
     (content['furniBrand'] !=='')) {
     cnt =cnt.concat(show_each_item(content['furniName'],content['furniKind'],content['furniBrand'],
          "furniture",content['furniCondition'],content['furniQty'],content['furniColor'],
          content['furniPrice'],content['picture'][0]));
    }
  }else{
    content='';
    cnt = cnt.concat("<p>&nbsp;&nbsp; "+ not_comment+ "</p></br>");
 
  }


 cnt = cnt.concat("</section>");
 return cnt;

}


//AJAX version
//this function place the number of pic user upload at once in to a post
// the width and height of the div will be devided according to the number of pic
//$pic_array is an array of pic name and it corresponding path
function displayPostPics(pic_array, numb_pic){
  if (numb_pic !== 0) {
    var pic_format="";
    /* if(numb_pic === 1){
     var width = (100/numb_pic)-1;
    }else if (numb_pic === 2) {
     var width = (100/numb_pic)-3;  
    }else{
      var width = (100/numb_pic) +6.5;  
    }
    var height= (60/numb_pic)+10;*/
    if(numb_pic ===1){
     pic_format ="<section class=\"row main-post-img\" style=\"text-align:center; \">"+
       "<div class =\"col-xs-4 \" ></div>";
    }else{
      pic_format ="<section class=\"row main-post-img no-padbding no-manrgin \">";
    }
    for (var key in pic_array) {
      pic_format  = pic_format.concat("<div class =\"col-xs-4 \" ><img class = \"img-responsive user-imfg\"   src=\""+ pic_array[key]+"\" alt=\""+key+"\" ></div>");
    };
    pic_format  = pic_format.concat("</section>");
    return pic_format;
  }else{return false;}
} 



///this is the function to display a single post
    /*@fname, @lname represent the firstname, lastname, of the poster+
    @date is the date the post was made+
    @title title of the post+
    @postContent is the content of the post+
    @commentid is the unique id of each comment+ 
    @userid is the user id of the poster+
    @other_comment_style used to specify an alternative comment style for ht post+
    @array_pic is an array of picture included in the post+
    @numb_pic number of picture in the post,
    @closing is the closing braket(i+e </article>) for html tag+ 
    it is used in service_func+php in the show_internship() method to close the html tag <article>+
    @what_kind tell what excatly the post is about+ it can be about 'sale', 'service', 'tutorial request' and so on+
     this is used for notification purpose+ it shows what  kind of notification we have+
    @forDisplayExistingpost is used when using the the function Display_Existingpost
      for showing posts and their comments+ we disable it while using the notification systen to show post that was requested
 */
function createAjaxPost(postContent ,title,commentid,pic_array, numb_pic , not_comment,comment_style,closing,forDisplayExistingpost,comment_txt){
          // createAjaxPost(cmt_content ,"comented on this!",commentid,cmt_content['picture'], pic_count,cmt_content['comment_content'],'','',false)+
 var fname = document.getElementById("fname").innerHTML;
 var lname = document.getElementById("lname").innerHTML;
 var userid = document.getElementById("userid").innerHTML;

 var wholePost = "<article class=\"row no-padding no-margin main-post\" >"+
        "<div class=\"col-xs-12 no-padding no-margin\">";
   wholePost +=  displayAjaxPostHeader(fname,lname,userid,title);
  wholePost +=      "</div>";
        
 //finding out if user has entered something into the post textarea, if show it
 if((jQuery.isEmptyObject(postContent) === false)){
   wholePost += "<section class=\"col-xs-12 no-padding no-margin main-post-body \" >"+
                displayPostContent(postContent,not_comment )+
             "</section>";
  }
       
 //finding out if user has included picture in the post, if yes show it/them
 if(displayPostPics(pic_array, numb_pic) !==false){
   wholePost = wholePost.concat("<section class=\"col-xs-12  no-margin main-post-body \">");
   wholePost += displayPostPics(pic_array, numb_pic);
   wholePost = wholePost.concat( "</section>");
  }

 //comment link/button on the bottom of each post
 wholePost += "<section class=\"col-xs-12  no-margin no-padding \">"+
              "<div class=\"row no-margin no-padding \">"+
               "<section class=\"col-xs-4  no-margin \" >";
 if ((comment_style !==false)&&(comment_style !==undefined)&&(comment_style !== '') ){
   wholePost += "<form  action=\"++/controller/request+php?"+'userid='+
                     userid +"\" method=\"post\" name=\"request-form\">";
   wholePost += "<label for=\"request-title\" class=\"sr-only\">title of the request</label>"+
                     "<input type=\"hidden\" name=\"request-title\" id=\"request-title\""+
                                                         "value=\""+ comment_style+"\">";
   wholePost += "<label for=\"request-for\" class=\"sr-only\">request belongs to</label>"+
                      "<input type=\"hidden\" name=\"request-for\"  id=\"request-for\""+
                                                               "value=\""+ commentid+"\">";
    wholePost += "<label for=\"request-status\" class=\"sr-only\">status of the request</label>"+
                      "<input type=\"hidden\" name=\"request-status\" id=\"request-status\" value=\"0\"> ";
    wholePost +=  "<input type=\"submit\" name=\"request-form\" value=\""+ comment_style+"\" class=\"post-buying text-muted\" id=\"buying-"+ commentid+"\" >";
    wholePost += "</form>";
  }
    wholePost += "</section>";
    wholePost += "<section class=\"col-xs-5 text-muted no-margin post-like \" id=\""+  commentid+"\">like</section>";
    wholePost += "<section class=\"col-xs-3 text-muted no-margin post-comment \" id=\""+
                                                   commentid+"\">"+comment_txt+"</section><span id=\"post-"+ commentid+"\"></span></div></section>";

  //comment link/button on the bottom of each post
  if ( forDisplayExistingpost === true) {
    wholePost +="<section class=\"col-xs-12  no-margin no-padding \">"+
            "<ul id=\"cmt-post\" class=\"no-margin no-padding each-cmt \">";
  }

  wholePost += "</article>"
    return wholePost;  
}



//post form asynchronizely with ajax
  function doAjaxPost(){ 


    //if submit button is clicked
    $('.post-btn').on( "click", function(){ 
      
     // getting all the picture that were checked for posts
     var picCheckboxValues = {};
     var pic_count = 0; //numb of pic includied in the post
     $(':checkbox.chck:checked[name^=img-chk]').val(function() {
     picCheckboxValues[pic_count]= this.value;
     pic_count++;
     });



     var photo_included = '0'; //by default '0' means no photo is included
     if (pic_count > 0) {photo_included = '1'};

     //where your post form be sent
     var action_link = $('#post-form').attr('action');





     //Get the data from all the fields
     var content ={  
       //textarea
       post_content : $('textarea[name=post_content]').val(),
       
       //does it have photo(s)?
       //photo : photo_included;
       //service checkbox
        servicetype : $('input[name=servicetype]').val(),
        servicePrice : $('input[name=servicePrice]').val(),
       //picture
         picture: picCheckboxValues,

       //book form
         isbn: $('input[name=isbnNumb]').val(),          
         booktitle: $('input[name=booktitle]').val(),          
         edNumb : $('input[name=edNumb]').val(),         
         authorName : $('input[name=authorName]').val(),         
         bookprice : $('input[name=bookprice]').val(),         
         bookqty : $('input[name=bookqty]').val(),         
         booklanguage : $('input[name=booklanguage]').val(),          
         bookpublisher : $('input[name=bookpublisher]').val(),          
         bookquality : $('input[name=bookquality]').val(),
       //electronic form
         electroKind  : $('select[name=electroKind]').val(),          
         electroName : $('select#electroName').val(),
         electroColor : $('input[name=electroColor]').val(),         
         electroBrand : $('select#electroBrand').val(),         
         electroPrice : $('input[name=electroPrice]').val(),         
         electroQty : $('input[name=electroQty]').val(),         
         electroCondition : $('input[name=electroCondition]').val(),
       //furniture form
         furniKind : $('input[name=furniKind]').val(),          
         furniName : $('input[name=furniName]').val(),          
         furniColor : $('input[name=furniColor]').val(),         
         furniBrand : $('input[name=furniBrand]').val(),         
         furniPrice : $('input[name=furniPrice]').val(),         
         furniQty : $('input[name=furniQty]').val(),         
         furniCondition : $('input[name=furniCondition]').val()
        };
         
         
         //for our database
        var content_db ={  
          //textarea
         post_content : $('textarea[name=post_content]').val(),
         //service checkbox
         servicetype : $('input[name=servicetype]').val(),
         servicePrice : $('input[name=servicePrice]').val(),
         //picture
         picture: picCheckboxValues,
         //book form
         book :{
           isbn: $('input[name=isbnNumb]').val(),          
           booktitle: $('input[name=booktitle]').val(),          
           edNumb : $('input[name=edNumb]').val(),         
           authorName : $('input[name=authorName]').val(),         
           bookprice : $('input[name=bookprice]').val(),         
           bookqty : $('input[name=bookqty]').val(),         
           booklanguage : $('input[name=booklanguage]').val(),          
           bookpublisher : $('input[name=bookpublisher]').val(),          
           bookquality : $('input[name=bookquality]').val()
          },
         //electronic form
         electronic :{
           electroKind  : $('select#electroKind').val(),          
           electroName : $('select#electroName').val(),
           electroColor : $('input[name=electroColor]').val(),         
           electroBrand : $('select#electroBrand').val(),         
           electroPrice : $('input[name=electroPrice]').val(),         
           electroQty : $('input[name=electroQty]').val(),         
           electroCondition : $('input[name=electroCondition]').val(),  
           electroCondition : $('[name=electroCondition]').val()
         },
         //furniture form
         furniture :{
           furniKind : $('input[name=furniKind]').val(),          
           furniName : $('input[name=furniName]').val(),          
           furniColor : $('input[name=furniColor]').val(),         
           furniBrand : $('input[name=furniBrand]').val(),         
           furniPrice : $('input[name=furniPrice]').val(),         
           furniQty : $('input[name=furniQty]').val(),         
           furniCondition : $('input[name=furniCondition]').val()
          }
        };

        //uniq id for each comment
        //var commentid = $( "ul#posts :first-child" ).attr('id') ;
      /* if($( "ul#posts :first-child" ).attr('id') === "lastlistid"){
          var commentid = 1;
        }else{
         var commentid = parseInt($( "ul#posts :first-child" ).attr('id'), 10) +1;
        }
 if($( "ul#posts :first-child" ).attr('id') === "lastlistid"){commentid = 1;}
         else{commentid = parseInt($( "ul#posts :first-child" ).attr('id'), 10) +1; }*/
         var lastlistid = document.getElementById("lastlistid");
         var lastlistid =parseInt(lastlistid.innerHTML, 10);
         commentid =lastlistid+1;
       // var lastlistid = document.getElementById("lastlistid");
       // var commentid = parseInt(lastlistid.innerHTML, 10);
    
        //finding the right title
        //we are looking for the right title for the post
        var post_title = "";//the real title is this
        var post_title1 = "";//for book title
        var post_title2 = "";//for electronic title
        var post_title3= "";//for furniture title
        var post_title4= "";//for photo title
        var v1, v2, v3, v4, v5 = false;
        var k=0;
        if((content['isbn']!=='')){post_title1 = "book's isbn "+content['isbn'] +" "; v1=true; k++;}
        else if((content['booktitle']!=='')){post_title1 = "book's title "+content['booktitle']+"";v1=true;k++;}
        else if((content['authorName']!=='')){post_title1 = "book's author "+content['authorName']+"";v1=true;k++;}
        else{}

        if(pic_count >0){post_title4 = "post some picture!", v4=true, k++;}

        if((content['electroKind']!=="what-kind")&&(content['electroKind']!=="")&&(content['electroKind']!==undefined)&&
          (content['electroKind']!==null)){
          post_title2= content['electroKind']; 
          v2=true; 
          k++;
        }
        if((content['furniKind']!=='')){post_title3= content['furniKind']; v3=true; k++;}
        else if((content['furniName']!=='')){post_title3=content['furniName']; v3=true; k++;}
        else if((content['furniBrand']!=='')){post_title3=content['furniBrand']; v3=true; k++;}
        else{}

        //the real posttle is:
        if((v1 ===true)&&(v2 ===true)&&(v3 ===true)&&(v4 ===true)){//all 4 of them are posted
         post_title = post_title4+" with "+post_title1 + ", "+ post_title2+" and "+post_title3;
        }else if((v4 ===true)&&(v1 ===true)&&(v2 ===true)){
          post_title = post_title4+" with "+post_title1 + ", and "+ post_title2;
        }else if((v4 ===true)&&(v1 ===true)&&(v3 ===true)){
          post_title = post_title4+" with"+post_title1 + ", and "+ post_title3;
        }else if((v4 ===true)&&(v2 ===true)&&(v3 ===true)){
          post_title = post_title4+" with "+post_title2 + ", and "+ post_title3;
        }else if((v4 ===true)&&(v1 ===true)){post_title = post_title4+" with "+post_title1;}
        else if((v4 ===true)&&(v2 ===true)){post_title = post_title4+" with "+post_title2;}
        else if((v4 ===true)&&(v3 ===true)){post_title = post_title4+" with "+post_title3;}
        else if((v1 ===true)&&(v2 ===true)&&(v3 ===true)){
          post_title = post_title1 + ", "+ post_title2+" and "+post_title3;
        }else if((v1 ===true)&&(v2 ===true)){post_title = post_title1 + ", and "+ post_title2;}
        else if((v1 ===true)&&(v3 ===true)){post_title = post_title1 + ", and "+ post_title3;}
        else if((v2 ===true)&&(v3 ===true)){post_title = post_title2 + ", and "+ post_title3;}
        else if((v1 ===true)){post_title = post_title1;}
        else if((v2 ===true)){post_title = post_title2;}
        else if((v3===true)){post_title = post_title3;}
        else if((v4===true)){post_title = post_title4;}
        else{}

        if((k>0)&&((v4===true)||(v1===true)||(v2===true)||(v3===true))){
         post_title= post_title.concat("  posted for sale!");
        }else if((k==1)&&(v4==true)){post_title;}
        else if((content['servicetype'] !=='')||(content['servicePrice']!=='')){
          post_title= content['servicetype']; 
        }else{post_title= "made a post";
      }
        //Simple validation to make sure user entered something
        //If error found, add hightlight class to the text field
        var i = 0; //everytime we have a missing value increment i
        for (var key in content) {
         if((content[key] === '')&&(key !== 'picture')){ i++;}
        }


        if ((i ===24)&&(pic_count ===0) ){ //if i=lenght of content, nothing has been put in to the post
         $('.error').show();
          return false;
        } 
        //create a title for the post to the server
        content_db["title"] = post_title;
        //this will be added to our post
        if((v1 ===true)||(v2 ===true)||(v3 ===true)){//checking if we want the "send buying request" to shown in the post
         var wall_post ="<li id=\""+commentid+"\">"+
                          createAjaxPost(content,post_title,commentid ,content['picture'], pic_count,true,"Send buying request",'',false,'comment')+
                       "</li>";
        }else if (v5 ===true) {
         var wall_post ="<li id=\""+commentid+"\">"+
                          createAjaxPost(content,post_title,commentid ,content['picture'], pic_count,true,"Can help?",'',false,'comment')+
                       "</li>";

        }else{ 
         var wall_post ="<li id=\""+commentid+"\">"+
                          createAjaxPost(content,post_title,commentid ,content['picture'], pic_count,true,false,'',false,'comment')+
                       "</li>";
        }

        //start the ajax
       $.ajax({

            //this is the php file that processes the data and send mail
            url: action_link , 

            //GET method is used
            type: "POST",
            //pass the data            
            data: {post_content:content_db} ,

            //Do not cache the page
            //cache: false,
            success: function (datass, textStatus, jqXHR) {
                     $('.error').hide();  
                    $('ul#posts').prepend(wall_post); //prepend our html to ul with id posts
                   doAjaxPostComment2();
             }
        });

        //After adding the post wall ,
        $('textarea#post-content').val(''); // remove text in the textarea 
        $('.extra-stuff input').val(''); // remove text in the textarea 
        pic_count = 0; //RESET numb of pic COUNT for the next post
        $(':checkbox.chck:checked[name^=img-chk]').removeAttr('checked'); //uncheck all checkbox after submission
        $(':checkbox#service_chck:checked[name^=check-for_services]').removeAttr('checked'); //uncheck all checkbox after submission
        var lastlistid = document.getElementById("lastlistid");
        // lastlistid.innerHTML = commentid+1;
        lastlistid.innerHTML = commentid;//assign the higthest value to laslistid id
      //  $('#ajax_content').empty(); // empty the div with id = ajax_content ( contains previous content fetched via ajax )
       // $('#fetched_data').hide(); // hide the div 
       // $('#ajax_flag').val(0); //reset  this to zero  
        
        //cancel the submit button default behaviours
        return false;
    }) 
 } 



function for_comment(elementID){
 var comment ='<span class=\"wrapper-cmt\" id=\"wrapper-cmt-'+elementID+'\" ><section class=\"col-xs-12 form-horizontal new-post no-padding no-margin new-post comment\" id=\"'+elementID+'\" style=\"margin-bottom : 20px;  border:1px outset #F5F7F5;\">'+
   "<div class=\"form-group no-padding no-margin \">"+
     "<div class=\"col-xs-12 col-sm-12 txt-area\">"+
       "<label for=\"post-content\" class=\"sr-only\">Post content</label>"+
       "<textarea  placeholder=\"...\" id=\""+elementID+"\" name=\"comment_content\""+ 
         "form=\"cmt-form\"  class=\"form-control\"></textarea>"+
     "</div>"+
   "</div>"+
   "<div class=\"row no-padding no-margin\">"+
     '<section class=\"col-xs-12 extra-stuff no-padding no-margin\" >'+
       '<section class=\"pics_in_post\"></section>'+
     '</section>'+
   "</div>"+
   "<div class=\"row no-padding no-margin\">"+
     '<section class=\"col-xs-2 col-sm-2 pull-left new-post-includes no-padding no-margin\">'+
       "<div class=\"row no-padding no-margin\">"+
         '<button id=\"icon-photo\" class=\"col-xs-2\" style=\'with: 20px; height:20px; margin-top: 0%;\'> </button>'+
       "</div>"+
     '</section>'+
     '<section class=\"col-xs-4 col-sm-4 no-padding no-margin pull-right\">'+
       '<form  action=\"../controller/user_post.php\" method="" id=\"cmt-form\" >'+
         '<input type=\"submit\" name=\"post-form\" value=\"Comment\" class=\" cmt-btn post-btn  btn btn-primary btn-block\"/>'+
         ' <span class=\"error\" style=\"display:none\" id=\"'+elementID+'\"> Post is empty</span>'+
       '</form>'+
     '</section>'+
   "</div>"+
  "</section></span>"+  
     '<div id=\"cmt-wall\" class=\"row myschool_wall\"> <ul id=\"cmt-posts-'+elementID+'\" class=\"col-xs-12 each-cmt no-margin no-padding\">'+
      "<input type=\"hidden\" name =\""+elementID+"\" id=\"cmt-lastlistid-"+elementID+"\" style=\"display:none;\" value= \"0\"></ul></div>";    
     return comment;
 }

 //comment post asynchronizely with ajax 
  function doAjaxPostComment(){ 
   //$('.post-comment').toggle( 
     
    $('.post-comment').click(function(){ 
      var postid = this.id;
      if ($('.wrapper-cmt').length>0) {
      $('.wrapper-cmt').remove();
      };

     // alert(postid);
      //alert(checkLastPostId()+2);
      var p = $('li[id='+postid+']');
      if (parseInt(postid , 10) <checkLastPostId()+2) {
        $('#post-'+postid).append(for_comment(postid));

        /*****************************/
        //asynchronous comment
        $('.cmt-btn').on( "click", function(){  
         //where your post form be sent
         var action_link = $('#post-form').attr('action');
         // getting all the picture that were checked for posts
         var picCheckboxValues = {};
         var pic_count = 0; //numb of pic includied in the post
         $(':checkbox.chck:checked[name^=img-chk]').val(function() {
           picCheckboxValues[pic_count]= this.value;
           pic_count++;
          });

         //uniq id for each comment 
         var commentid ;
        /* if($( "ul#posts :first-child" ).attr('id') === "lastlistid"){commentid = 1;}
         else{commentid = parseInt($( "ul#posts :first-child" ).attr('id'), 10) +1; }*/
         var lastlistid = document.getElementById("lastlistid");
         var lastlistid =parseInt(lastlistid.innerHTML, 10);
         commentid =lastlistid+1;
          var cmt_content ={ //comment content
           comment_content: $('textarea[id='+postid+']').val(), //textarea
           picture: picCheckboxValues,//picture 
           parent : postid
          };
         //Simple validation to make sure user entered something
         if ((cmt_content['comment_content'] ==='')&&(pic_count==0)){ //iif content is empty and no pic checked nothing has been put in to the post
           $('span.'+postid).show();//show empty error msg
           return false;
          } 

          //the comment post
         var wall_post ="<li id=\""+commentid+"\">"+
               createAjaxPost(cmt_content ,"comented!",commentid,cmt_content['picture'], pic_count,cmt_content['comment_content'],false,'',false,'reply')+
               "</li>";
         //start the ajax
         $.ajax({
           url: action_link , //this is the php file that processes the data and send mail
           type: "POST",
           data:  {comment_content:cmt_content} , //data for server
           //cache: false,//Do not cache the page
           success: function (datass, textStatus, jqXHR) {
             $('span.'+postid).hide();  //hide empty error msg
             $('ul#cmt-posts-'+postid).prepend(wall_post); //prepend our html to ul with id posts
             doAjaxPostComment2();
            }
          });
         //After adding the post wall ,
         $('textarea[id='+postid+']').val(''); // remove text in the textarea 
         $('ul#cmt-posts-'+postid+ ' #cmt-lastlistid-'+postid).val(commentid);
         pic_count = 0; //RESET numb of pic COUNT for the next post
        $(':checkbox.chck:checked[name^=img-chk]').removeAttr('checked'); //uncheck all checkbox after submission
         var lastlistid = document.getElementById("lastlistid");
         lastlistid.innerHTML = commentid;
         return false;
        });    
      
     // };
  };
    });  
  } 

  //comment post asynchronizely with ajax 
  function doAjaxPostComment2(){ 
    //if commentis clicked
    $('.post-comment').click(function(){ 
      var postid = this.id;
       $('.wrapper-cmt').remove();
      var p = $('li[id='+postid+']');
      if (parseInt(postid , 10) >= checkLastPostId()) {
        $('#post-'+postid).append(for_comment(postid));
       //asynchronous comment
        /*****************************/
        //asynchronous comment
        $('.cmt-btn').on( "click", function(){  
         //where your post form be sent
         var action_link = $('#post-form').attr('action');
         // getting all the picture that were checked for posts
         var picCheckboxValues = {};
         var pic_count = 0; //numb of pic includied in the post
         $(':checkbox.chck:checked[name^=img-chk]').val(function() {
           picCheckboxValues[pic_count]= this.value;
           pic_count++;
          });
         //uniq id for each comment 
         var commentid ;
        /* if($( "ul#posts :first-child" ).attr('id') === "lastlistid"){commentid = 1;}
         else{commentid = parseInt($( "ul#posts :first-child" ).attr('id'), 10) +1; }*/
         var lastlistid = document.getElementById("lastlistid");
         var lastlistid =parseInt(lastlistid.innerHTML, 10);
         commentid =lastlistid+1;
          var cmt_content ={ //comment content
           comment_content: $('textarea[id='+postid+']').val(), //textarea
           picture: picCheckboxValues,//picture 
           parent : postid
          };
         //Simple validation to make sure user entered something
         if ((cmt_content['comment_content'] ==='')&&(pic_count==0)){ //iif content is empty and no pic checked nothing has been put in to the post
           $('span.'+postid).show();//show empty error msg
           return false;
          } 

          //the comment post
         var wall_post ="<li id=\""+commentid+"\">"+
           createAjaxPost(cmt_content ,"comented!",commentid,cmt_content['picture'], pic_count,cmt_content['comment_content'],false,'',false,'reply')+
               "</li>";

         //start the ajax
         $.ajax({
           url: action_link , //this is the php file that processes the data and send mail
           type: "POST",
           data:  {comment_content:cmt_content} , //data for server
           //cache: false,//Do not cache the page
           success: function (datass, textStatus, jqXHR) {
             $('span.'+postid).hide();  //hide empty error msg
             $('ul#cmt-posts-'+postid).prepend(wall_post); //prepend our html to ul with id posts
             doAjaxPostComment2();
            }
          });
         //After adding the post wall ,
         $('textarea[id='+postid+']').val(''); // remove text in the textarea 
         $('ul#cmt-posts-'+postid+ ' #cmt-lastlistid-'+postid).val(commentid);
         pic_count = 0; //RESET numb of pic COUNT for the next post
        $(':checkbox.chck:checked[name^=img-chk]').removeAttr('checked'); //uncheck all checkbox after submission
         var lastlistid = document.getElementById("lastlistid");
         lastlistid.innerHTML = commentid;
         return false;
        });    
      };
    });  
  } 
  //checking last post ul#li id before create comment 
  function checkLastPostId(){ 
    //if commentis clicked
    var lastlistid = document.getElementById("lastlistid").innerHTML;
    var lastlistid = parseInt(lastlistid, 10);
    return lastlistid
    
  }    


 //update the about user navigation section. after a user input something
 //about him/herself and press save, the textbox will be submited with ajax 
 //and the textbox will be into 'unable' displaying what user have typed,
 //and the save button will be transform into edit butotn.
  function saveAboutUser(){ 
    $('.about-btn').on( "click", function(){   
       
       var action_link = $('#about-form').attr('action');
        //Get the data from all the textarea
        var content = $('#about-content').val();
        //Simple validation to make sure user entered something
        //If error found, add hightlight class to the text field
        if (content =='') {
           $('.error').show();
            return false;
        } 

        //start the ajax
        $.ajax({

            //this is the php file that processes the data and send mail
            url:   "../controller/about_user.php" ,///action_link, //'/mySchool1/views/profile.php', 

            //GET method is used
            type: "POST",
            //pass the data            
            data:  {about :content  },//"post_content=" + content, 

            //Do not cache the page
            cache: false,
            success: function (datass, textStatus, jqXHR) {
                     $('.error').hide();  
                     $('.success').show(); 
                     //$('.success').fadeOut(1000); 
                     $("#about-content").attr('disabled', true);
                     $("#about-content").addClass('for-aboutContent');
                     $('#edit-about').show();
                     $(".about-btn").hide();
 
            }
        });

         return false;
    });    
 }   


 //allow user to edit the content of about txt
  function editAboutUser(){ //"[value='EDIT']"
    $('#edit-about').on( "click", function(){ 
                     $('.success').hide(); 
                     $("#about-content").attr('disabled', false); //we allow the user to type in the txtarea
                     $("#about-content").removeClass('for-aboutContent');
                     $(".about-btn").show();
                     $('#edit-about').hide();
    });
 }   







//post form asynchronizely with ajax
/*  function doAjaxUpload(){ 
    //if submit button is clicked
    $('.upload-btn').on( "click", function(){ 
      //where your post form be sent
     var action_link = $('#upload-pic').attr('action');
     //Get the data from all the fields
     var content = { 
      MAX_FILE_SIZE : "40000000" ,
     uploadform:"Upload me!" ,
     file: $('#file_upload').val()
      }
     var file_value=  $('#file_upload').attr('value')
     alert(content+" action_link "+action_link+" file_valeu"+file_value);

      if (content ==='' ){ //if i=lenght of content, nothing has been put in to the post
         $('#file-upload-err').show();
          return false;
        } 
        //start the ajax
       $.ajax({

            //this is the php file that processes the data and send mail
            url: action_link , 

            //GET method is used
            type: "POST",
            //pass the data            
            data: {uploadform:content} ,

            //Do not cache the page
            //cache: false,
            success: function (datass, textStatus, jqXHR) {
                     alert(textStatus);
             }
        });


        
        //return false;
    });   
 } 
*/


/*

$('.top-view-container').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '#userpict'
});
$('#userpict').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.top-view-container',
    dots: true,
    centerMode: true,
    focusOnSelect: true
});
//var numbOfDiv= element["div"];

*/

/*

$('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    dots: true,
    centerMode: true,
    focusOnSelect: true
});*/
// end hiding script from old browsers -->















//@return a list of items
 function show_each_item(itname, itKind,itBrand, categ,itquality, itquantity,itColor,itprice, picture){

        var ctn ='';   
   

   ctn +="<div class=\"col-xs-12 no-padding no-margin table-responsive\">"+
          "<table class=\"table table-striped\"><tr>";

   if ((picture !== '')&&(picture !== undefined)&&
        (picture !== 'undefined')) {//checking if there exist a picture with the book
      var pic_format = "<img class=\"item-img img-responsive\" src=\""+picture+"\" alt=\"item pic\" >";
      ctn += "<td rowspan=\"7\" class=\"top-tr \">"+pic_format+"</td><td>";
    }else {
     ctn += "<td class=\"td-static text-muted\"><td>";
    }
           ctn +=   "</td></tr>"+
                     "<tr ><td class=\"td-static text-muted\"><small>Kind: </small></td>"+
                     "<td >"+itname+"</td></tr>"+
                     "<tr><td class=\"td-static text-muted\"><small>Brand: </small></td>"+
                     "<td >"+itBrand+"</td></tr>";
          
         ctn += "<tr ><td class=\"td-static text-muted\"><small>Quality: </small></td>"+
                     "<td class=\"\">"+itquality+"</td></tr>"+
                     "<tr ><td class=\"td-static text-muted\"><small>Quantity: </small></td>"+
                     "<td class=\"\">"+itquantity+"</td></tr>"+
                     "<tr><td class=\"td-static text-muted\"><small>Color: </small></td>"+
                     "<td class=\"\">"+itColor+"</td></tr>"+
                     "<tr ><td class=\"td-static text-muted\"><small>Price: </small></td>"+
                     "<td class=\"\">$"+itprice+"</td></tr>"+
                     "</table></div>"+
                     "<ul class=\"col-xs-12 no-padding no-margin list-inline\">"+
                      "<li>"+
                       "<small class=\"text-info text-lowercase\">Cat: "+categ+"</small>"+
                      "</li>"+
                      "<li><small class=\"text-info\">  Type: "+itKind+"</small></li>"+
                     "</ul>";
        return ctn;
    }



//@return a list of items
function show_each_book(bookisbn, bookauthor, booktitle, bookEdNumb,bookquality,bookquantity,bookprice,language,publisher,picture){
 var ctn ='';   
   

 ctn +="<div class=\"col-xs-12 no-padding no-margin table-responsive\">"+
          "<table class=\"table table-striped\"><tr>";

 if ((picture !== '')&&(picture !== undefined)&&
    (picture !== 'undefined')) {//checking if there exist a picture with the book
    var pic_format = "<img class=\"item-img img-responsive\" src=\""+picture+"\" alt=\"item pic\" >";
    ctn += "<td rowspan=\"7\" class=\"top-tr \">"+pic_format+"</td><td>";
 }else {
     ctn += "<td class=\"td-static text-muted\"><td>";
 }
        
  ctn +=  "</td></tr>"+
         "<tr ><td class=\"td-static text-muted\"><small>ISBN: </small></td>"+
         "<td>"+ bookisbn+"</td></tr>"+
         "<tr ><td class=\"td-static text-muted\"><small>Author: </small></td>"+
         "<td >"+ bookauthor + "</td></tr>";
      
        ctn += "<tr ><td class=\"td-static text-muted\"><small>Title: </small></td>"+
                   "<td>"+ booktitle+"</td></tr>"+
                   "<tr ><td class=\"td-static text-muted\"><small>Edition: </small></td>"+
                   "<td>"+ bookEdNumb+"</td></tr>"+
                   "<tr ><td class=\"td-static text-muted\"><small>Publisher: </small></td>"+
                   "<td>"+ publisher+"</td></tr>"+
                   "<tr ><td class=\"td-static text-muted\"><small>language: </small></td>"+
                   "<td>"+ language+"</td></tr>"+
                   "<tr ><td class=\"td-static text-muted\"><small>Quality: </small></td>"+
                   "<td>"+ bookquality+"</td></tr>"+
                   "<tr ><td class=\"td-statictext-muted\"><small>Quantity: </small></td>"+
                   "<td>"+ bookquantity+"</td></tr>"+
                   "<tr ><td class=\"td-static text-muted\"><small>Price: </small></td>"+
                   "<td> $"+ bookprice+"</td></tr>"+
                   "</table></div>"+
                   "<ul class=\"col-xs-12 no-padding no-margin list-inline\">"+
                      "<li>"+
                       "<small class=\"text-info text-lowercase\">Cat: Book</small>"+
                      "</li>"+
                      "<li><small class=\"text-info\">  Type: "+ booktitle+"</small></li>"+
                   "</ul>"+
                 "</secton>";

          
          
        
      
      return  ctn;
    }

