<?php
  
 //checking to see if the form is fill out correctly
 //we first see if the $_POST array which is the default arrgument, is not empty
 //if it is, the function returns false, if it has some data, we check if 
 // those data has all value and not empty.
 function is_fill_out_form($array_post){

   foreach ($array_post as $key => $value) {
  	 if((!isset($key)) || ($value == '')){
  	    return false;
  	  }
    }

    return true; 
  }

  function is_valid_email($email){

    $pattern = '/\A[\w+\-.]+@[a-z\d\-]+(\.[a-z]+)*\.[a-z]+\z/i';
    //preg_match() returns 1 if the pattern matches given subject, 0 if it does not, or FALSE if an error occurred.
   if(preg_match($pattern, $email) != 0 || preg_match($pattern, $email) != false){
     return true;
    }else{
       return false;
    }
  }

  function is_valid_phone($phone){
    
    $pattern = '/^(?:1(?:[. -])?)?(?:\((?=\d{3}\)))?([2-9]\d{2})' 
        .'(?:(?<=\(\d{3})\))? ?(?:(?<=\d{3})[.-])?([2-9]\d{2})' 
        .'[. -]?(\d{4})(?: (?i:ext)\.? ?(\d{1,5}))?$/'; 

    if(preg_match($pattern, $phone) != 0 || preg_match($pattern, $email) != false){
     return true;
    }else{
       return false;
    }

  }












?>