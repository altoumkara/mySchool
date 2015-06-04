<?php
 require_once('Database.class.php');

 class User {

	 public $userid ;
	 public $username ;
	 public $fname ;
	 public $lname ;
	 public $title ;
	 public $college ;
	 public $email ;
	 public $password ;
	 public $phone ;
	 public $sex ;
	 public $major; 
   public $about;
   public $profilepic;
	 public $birthyear ;
	 public $join_date;
   public $online;
   public $worktitle;
   public $internshiptitle;


   //we create a constructor that will take an associative array as argument.
	 //the associative array is filled with data comming from our website form
	 //the form is as our dabase row,
   //the Constructor is called whenever a new user object is created.
   function __construct($form_data) {
     	$this->userid = (isset($form_data['userid'])) ? $form_data['userid'] : NULL;
      $this->username = (isset($form_data['username'])) ? $form_data['username'] : "";
      $this->fname = (isset($form_data['fname'])) ? $form_data['fname'] : "";
      $this->lname = (isset($form_data['lname'])) ? $form_data['lname'] : "";
      $this->title = (isset($form_data['title'])) ? $form_data['title'] : "";
      $this->email = (isset($form_data['email'])) ? $form_data['email'] : "";
      $this->password = (isset($form_data['password'])) ? $form_data['password'] : "";
      $this->sex = (isset($form_data['sex'])) ? $form_data['sex'] : "";
      $this->major = (isset($form_data['major'])) ? $form_data['major'] : "";
      $this->birthyear = (isset($form_data['birthyear'])) ? $form_data['birthyear'] : "";
      $this->join_date = (isset($form_data['join_date'])) ? $form_data['join_date'] : "";
      $this->phone = (isset($form_data['phone'])) ? $form_data['phone'] : NULL;
      $this->college = (isset($form_data['college'])) ? $form_data['college'] : "";
      $this->about = (isset($form_data['about'])) ? $form_data['about'] : "";
      $this->online = (isset($form_data['online'])) ? $form_data['online'] : null;
      $this->profilepic = (isset($form_data['profilepic'])) ? $form_data['profilepic'] : null;
      $this->worktitle = (isset($form_data['worktitle'])) ? $form_data['worktitle'] : null;
      $this->internshiptitle = (isset($form_data['internshiptitle'])) ? $form_data['internshiptitle'] : null;
    }

      
    
    function save_user($existing_user = true){
      
      //open database connection
     $db = new Database();
     $con = $db->conect_db();
     
     //if user exists already, we will not need to save it as a new record in our db,
     //instead, we update his infos
     if($existing_user){
        //user's existing infos will be updated with this $user_info array
       $user_info = array("username" => "'$this->username'", 
          	              "fname" => "'$this->fname'", "lname" => "'$this->lname'",
          	              "title" => "'$this->title'", "email" => "'$this->email'", "password" => 'sha1('."'$this->password'".')',
                          "sex" => "'$this->sex'","major" => "'$this->major'", "birthyear" => "'$this->birthyear'",
                          "phone" => "'$this->phone'", "college" => "'$this->college'", "about" => "'$this->about'",
                          "profilepic" => "'$this->profilepic'", "worktitle" => "'$this->worktitle'",
                          "internshiptitle" => "'$this->internshiptitle'"
                        );

        //remainder about update() prototype in our Database.class.php file
        //true function update($array_data, $table,  $where= "",  $low_priority = "", $ignore = "", $limit_numb = "")
        $db->update($user_info, 'user', " where email = '".$this->email."'");
      } else {//this $user_info will be used for new user
        $user_info = array("userid" => "'$this->userid'", "username" => "'$this->username'", 
          	           "fname" => "'$this->fname'", "lname" => "'$this->lname'",
          	           "title" => "'$this->title'", "email" => "'$this->email'", 
                       "password" => 'sha1('."'$this->password'".')', "sex" => "'$this->sex'",
                       "birthyear" => "'$this->birthyear'", "major" => "'$this->major'",
                       "join_date" => "'".date("Y-m-d H:i:s",time())."'",
                       "phone" => "'$this->phone'", "college" => "'$this->college'",
                       "about" => "'$this->about'", "online" => "'$this->online'",
                       "profilepic" => "'$this->profilepic'", "worktitle" => "'$this->worktitle'",
                       "internshiptitle" => "'$this->internshiptitle'"
                      );

                 //remainder about insert() prototype in our Database.class.php file
                 //true insert($array_data, $table, $low_priority = "", $ignore = "", $limit_numb = "")
                  $this->id = $db->insert($user_info, "user");
                  $this->joinDate = time();
                }
            return $this->id;
        }
   }
?>