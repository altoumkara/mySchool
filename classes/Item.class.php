<?php
 require_once('../classes/Database.class.php');

 class Item {
  
   public $itnumb;
   public $itname;
   public $itprice;
   public $itquality;
   public $itquantity;
   public $itcreatedate;
   //public $itdescription;
   public $itKind ;         
   public $itColor;         
   public $itBrand;     
   public $catid;
   public $userid;
   public $postid;

   //we create a constructor that will take an associative array as argument.
	 //the associative array is filled with data comming from our post template
	 //the whole template will be saved in different tables in our database
   //the Constructor is called whenever a user makes a new post
   function __construct($item_data=false){
      $this->itnumb = (isset($item_data['itnumb'])) ? $item_data['itnumb'] : NULL;
      $this->itname = (isset($item_data['itname'])) ? $item_data['itname'] : NULL;
      $this->itprice = (isset($item_data['itprice'])) ? $item_data['itprice'] : 0.00 ;
      $this->itquality = (isset($item_data['itquality'])) ? $item_data['itquality'] : NULL ;
      $this->itquantity = (isset($item_data['itquantity'])) ? $item_data['itquantity'] : NULL ;
      $this->itcreatedate = (isset($item_data['itcreatedate'])) ? $item_data['itcreatedate'] : date("Y-m-d H:i:s");
     // $this->itdescription = (isset($item_data['itdescription'])) ? $item_data['itdescription'] : NULL;
      $this->itKind = (isset($item_data['itKind'])) ? $item_data['itKind'] : NULL;
      $this->itColor = (isset($item_data['itColor'])) ? $item_data['itColor'] : NULL;
      $this->itBrand = (isset($item_data['itBrand'])) ? $item_data['itBrand'] : NULL;
      $this->catid = (isset($item_data['catid'])) ? $item_data['catid'] : NULL;
      $this->userid = (isset($item_data['userid'])) ? $item_data['userid'] : NULL;
      $this->postid = (isset($item_data['postid'])) ? $item_data['postid'] : NULL;

    }


    
   //this function will save the item in the database
   //if $exist is false, that means the items is new, otherwise , it will just update existing items
   //remainder about the insert prototype
   //true insert($array_data, $table, $low_priority = "", $ignore = "", $limit_numb = "")

   function save_item(){
     $db = new Database();
     $con = $db->conect_db();
     $item_infos = array("itnumb" => "'$this->itnumb'", "itname" => "'$this->itname'",
                     "itprice" => "'itprice'", "itquality" => "'itquality'","itquantity" => "'itquantity'",
                      "itcreatedate"=>"'".date("Y-m-d H:i:s",time())."'", "itKind" => "'$this->itKind'", 
                      "itColor" => "'$this->itColor'", "itBrand" => "'$this->itBrand'",
                     "catid" => "'$this->catid'",  "userid"=> "$this->userid", "postid"=> "$this->postid"
                    );
      $this->itnumber = $db->insert($item_infos, 'items');
      $this->itcreatedate = time();
      return $this->itnumber;
    }

    //this function shows every items in our databases
    //@return a list of items
    function show_items(){
      $db = new Database();
     $con = $db->conect_db();
     /* retrieve item's names from table item where category is electonics */
     //select itname from items as i, categories as c where i.catid=c.catid
    // and c.catname= 'ELECTRONICS';
    $array_items = $db->select("items");
    var_dump($array_items);

    }
  }
?> 