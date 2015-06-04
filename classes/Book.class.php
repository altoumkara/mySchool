<?php
 require_once('../classes/Database.class.php');

 class Book {
  
   public $booknumb;
   public $bookisbn;
   public $bookauthor;
   public $booktitle;
   protected $bookEdNumb;
   protected $bookpublisher;
   protected $booklanguage;
   public $bookprice;
   public $bookquality;
   protected $bookquantity;
   public $bookcreatedate;
  // public $bookdescription;
   public $catid;
   public $userid;



   //we create a constructor that will take an associative array as argument.
	 //the associative array is filled wbookh data comming from our post template
	 //the whole template will be saved in different tables in our database
   //the Constructor is called whenever a user makes a new post
   function __construct($book_data){
      $this->booknumb = (isset($book_data['booknumb'])) ? $book_data['booknumb'] : NULL;
      $this->bookisbn = (isset($book_data['bookisbn'])) ? $book_data['bookisbn'] : NULL;
      $this->bookauthor = (isset($book_data['bookauthor'])) ? $book_data['bookauthor'] : NULL;
      $this->booktitle = (isset($book_data['booktitle'])) ? $book_data['booktitle'] : NULL;
      $this->bookEdNumb = (isset($book_data['bookEdNumb'])) ? $book_data['bookEdNumb'] : NULL;
      $this->bookpublisher = (isset($book_data['bookpublisher'])) ? $book_data['bookpublisher'] : NULL;
      $this->booklanguage = (isset($book_data['booklanguage'])) ? $book_data['booklanguage'] : NULL;
      $this->bookprice = (isset($book_data['bookprice'])) ? $book_data['bookprice'] : 0.00 ;
      $this->bookquality = (isset($book_data['bookquality'])) ? $book_data['bookquality'] : NULL ;
      $this->bookquantity = (isset($book_data['bookquantity'])) ? $book_data['bookquantity'] : NULL ;
      $this->bookcreatedate = (isset($book_data['bookcreatedate'])) ? $book_data['bookcreatedate'] : date("Y-m-d H:i:s");
      //$this->bookdescription = (isset($book_data['bookdescription'])) ? $book_data['bookdescription'] : NULL;
      $this->catid = (isset($book_data['catid'])) ? $book_data['catid'] : NULL;
      $this->userid = (isset($book_data['userid'])) ? $book_data['userid'] : NULL;
    }


    
   //this function will save the book in the database
   //if $exist is false, that means the books is new, otherwise , book will just update existing books
   //remainder about the insert prototype
   //true insert($array_data, $table, $low_priorbooky = "", $ignore = "", $limbook_numb = "")

   function save_book(){
     $db = new Database();
     $con = $db->conect_db();

     //check_record_Exists() return true if record exist, and false otherwise
     if ($db->check_record_Exists("bookisbn, userid", "book",  "where bookisbn = '"."$this->bookisbn"."' and userid = '"."$this->userid"."'") === false) {
       $book_infos = array("booknumb" => "'$this->booknumb'", "bookisbn" => "'$this->bookisbn'", 
                       "bookauthor" => "'$this->bookauthor'", "booktitle" => "'$this->booktitle'",
                       "bookEdNumb" => "'$this->bookEdNumb'", "bookpublisher" => "'$this->bookpublisher'",
                       "booklanguage" => "'$this->booklanguage'", "bookprice" => "'$this->bookprice'",
                        "bookquality" => "'$this->bookquality'",
                       "bookquantity" => "'$this->bookquantity'", "bookcreatedate"=>"'".date("Y-m-d H:i:s",time())."'",
                        "catid" => "'$this->catid'", "userid"=> "'$this->userid'"
                      );
       $this->booknumber = $db->insert($book_infos, 'book');
       $this->bookcreatedate = time();
       return $this->booknumber;
      }else{
         //else if the isbn exist alredy, the book will just be updated
         $book_infos = array( "bookauthor" => "'$this->bookauthor'", "booktitle" => "'$this->booktitle'",
                       "bookEdNumb" => "'$this->bookEdNumb", "bookpublisher" => "'$this->bookpublisher'", 
                       "booklanguage" => "'$this->booklanguage'", "bookprice" => "'bookprice'",
                        "bookquality" => "'$this->bookquality'", "bookquantity" => "'$this->bookquantity'",
                       "bookdescription"=> "'$this->bookdescription'", "bookcreatedate"=>"'".date("Y-m-d H:i:s",time())."'",
                        "catid" => "'$this->catid'", "userid"=> "'$this->userid'"
                      );

        //remainder about update() prototype in our Database.class.php file
        //true function update($array_data, $table,  $where= "",  $low_priority = "", $ignore = "", $limit_numb = "")
        $db->update($book_infos, 'book', "where isbn = '"."$this->bookisbn"."' and userid = '"."$this->userid"."'");
        return $this->id;
      }
      
    }
  }
?>