<?php
 
  class Database {
  

	  protected $db_host = 'localhost';
	  protected $db_user = 'al';
	  protected $db_pass = 'mariamal';
	  protected $db_name = 'mySchoolDB';

	  //we first open a connection to the database.
	  //this will be called on every page that needs to use the database.

	  function conect_db(){

	     $con = mysqli_connect($this->db_host, $this->db_user, $this->db_pass);
	     mysqli_select_db($con, $this->db_name) or die("failed to connect to the datebase: ".mysqli_connect_errno($con)."---".mysqli_error());
	        
	     return $con;
	   
	    }
	    
	  //we take an a row from the database table, and return it in an associative array.
	  // columns name are keys, and values are the value for each corresponding column
	  //if $single_row is set to true, it returns a single row instead of an array of rows.
	  //if $assoc is true, we want the single row to appear in an associative array
	  //$assoc is mostly created for the select_2dArray() function below
	 function format_rows($rows, $single_row=false, $assoc=false){
	 	 $con = $this->conect_db();
	     $formated_result = array();
	     while ($row = mysqli_fetch_assoc($rows)) {
	     	 array_push($formated_result, $row);
	        }
	      if($single_row === true){
	      	 if ($assoc ===true) {
	      	 	$associative_array = array();
	      	 	$associative_array[0] = $formated_result[0];
	      	 	return $associative_array;
	      	 }else{
	      	 	$formated_result[0];
	      	 }
	        }
	      return $formated_result;
	    }
	   
	   //Select items(rows) from the database's table(s).
	   //it will return items from $table where $where is true.
	   //the return value is an associative array with column names as keys.
	   //if $columns is supplied, i.e= "uid, school", it will returm those diffrent columns instead. 
	   // select prototype is as follow:
	   // SELECT [options] items
	   //[INTO file_details]
	   //FROM tables
	   //[ WHERE conditions ]
	   //[ GROUP BY group_type ]
	   //[ HAVING where_definition ]
	   //[ ORDER BY order_type ]
	   //[LIMIT limit_criteria ]
	   //[PROCEDURE proc_name(arguments)]
	   //[lock_options]

	  function select_user($table,  $where="", $columns=false){
	  	    $con = $this->conect_db();

	  	    if ($columns !== false ) {
	      	 $query = "select $columns from $table $where";
	         $result = mysqli_query($con, $query);

	      	 if (mysqli_num_rows($result) == 1) {
	             return $this->format_rows($result, true);
	            }
	        
	           return  $this->format_rows($result);  
	        }
	        
	      	$query = "select * from $table ".$where;
	        $result = mysqli_query($con, $query);
	        if (!$result) {
	        	die(mysqli_error($con));
	        }
	        if (mysqli_num_rows($result) == 0) {
	            //echo "No item found";
	          //  exit;
	        	return false;
	       }//else{echo "item find: ".mysqli_num_rows($result);}

	        if (mysqli_num_rows($result) == 1) {
	          return $this->format_rows($result, true);
	        }
	            
	       return  $this->format_rows($result, false);

	          
	      
	    }

	    //select any kind of items from the database 
	    //the return value is one of the following bellow
	    //@error if connection to the database failed or no item found
	    //@indexed array if the column returm more than 1 row(when $column argument is not false)
	    //each indexed is itself a new array.it is like: {{},{},{}...,{}}
	    //@associative array when we usually want only 1 row
       function select($table,  $where="", $columns=false, $associative = false){
    	   $con = $this->conect_db();
            /* check connection */
    	   if (mysqli_connect_errno()) {
              printf("Connect failed: %s\n", mysqli_connect_error());
             exit();
            }
            
            /*if we need to query some specific columns*/
    	    if ($columns !== false) { 
	      	 $query = "select $columns from $table $where";
	         $result = mysqli_query($con, $query);

	         /* check connection */
	         if (!$result) {
	        	die(mysqli_error($con));
	         }
	          if ($associative === true) { //return result in an associative array
	             /* we return an index array if we have value in the column */
	      	     if (mysqli_num_rows($result) === 1) {
	                  return $this->format_rows($result, true);
	                }else{
	                  return  $this->format_rows($result, false);
	                }
	            }else{
	              /* we return an index array if we have value in the column */
	      	       if (mysqli_num_rows($result) >=0) {
	                 $fetch_array = array();
	                 $i = 0;
	                 while ($row = mysqli_fetch_row($result)) {
	                     $fetch_array[$i] = $row;
                         $i++;
                        }
                     return $fetch_array;
	                }else{
	            	return false;
	                }
	            }
	        
	        }else{ //if we want to query all the columns
	          $query = "select * from $table ".$where;
	          $result = mysqli_query($con, $query);
	          /* check connection */
	         if (!$result) {
	        	die(mysqli_error($con));
	         }

	         if (mysqli_num_rows($result) === 0) {
	            //exit;
	            return false;
	         }

	         if (mysqli_num_rows($result) === 1) {
	            return $this->format_rows($result, true);
	          }else{
	           return  $this->format_rows($result, false);
	          } 
	        }
             /* free result set */
             mysqli_free_result($result);
	         
              /* close connection */
             mysqli_close($con);
        }

        //select any kind of items from the database 
	    //the return value is one of the following bellow
	    //@error if connection to the database failed or no item found
	    //@indexed array if the column returm more than 1 row(when $column argument is not false)
	    //each indexed is itself a new array.it is like: {{},{},{}...,{}}
	    //@associative array when we usually want only 1 row
       function select_2dArray($table,  $where="", $columns=false){
    	   $con = $this->conect_db();
            /* check connection */
    	   if (mysqli_connect_errno()) {
              printf("Connect failed: %s\n", mysqli_connect_error());
             exit();
            }
            
            /*if we need to query some specific columns*/
    	    if ($columns !== false) { 
	      	 $query = "select $columns from $table $where";
	         $result = mysqli_query($con, $query);

	         /* check connection */
	         if (!$result) {
	        	die(mysqli_error($con));
	         }
	         if (mysqli_num_rows($result) === 0) {
	            return false;
	         }
	          //if ($associative === true) { //return result in an associative array
	             /* we return an index array if we have value in the column */
	      	     if (mysqli_num_rows($result) === 1) {
	                  return $this->format_rows($result, true, true);
	                }else{
	                  return  $this->format_rows($result, false);
	                }
	        }else{ //if we want to query all the columns
	          $query = "select * from $table ".$where;
	          $result = mysqli_query($con, $query);
	          /* check connection */
	         if (!$result) {
	        	die(mysqli_error($con));
	         }

	         if (mysqli_num_rows($result) === 0) {
	            return false;
	         }

	         if (mysqli_num_rows($result) === 1) {
	            return $this->format_rows($result, true, true);
	          }else{
	           return  $this->format_rows($result, false);
	          } 
	        }
             mysqli_free_result($result);
              /* close connection */
             mysqli_close($con);
        }


	  //delete items from table, the delete prototype is as follow
	  //DELETE [LOW_PRIORITY] [QUICK] [IGNORE] FROM table
	  //[WHERE condition]
	  //[ORDER BY order_cols]
	  //[LIMIT number]

	   function delete($table, $where, $low_priority = "" , $quick = "", $ignore = "", $limit_numb = ""){
	   	 $con = $this->conect_db();
	   	 $query = "delete $low_priority $quick $ignore from $table $where $limit_numb" ;
	   	 mysqli_query($con, $query) or die("unable to delete: ". mysqli_errno());
	   	 return true;
	   	}

	   //update database records, using the associative array $array_data
	   //the array keys are the column names in your table, and values are value you want to give to those culumns
	   //the update prototype is as follow
	   //UPDATE [LOW_PRIORITY] [IGNORE] tablename
	   //SET column1=expression1,column2=expression2,...
	   //[WHERE condition]
	   //[ORDER BY order_criteria]
	   //[LIMIT number]

	  	function update($array_data, $table,  $where= "",  $low_priority = "", $ignore = "", $limit_numb = ""){
	   	 $con = $this->conect_db();
	   	 foreach ($array_data as $column => $value) {
	   	 	 $query = "UPDATE $low_priority $ignore $table SET $column = $value $where $limit_numb" ;
	   	     mysqli_query($con, $query) or die("unable to update: ". mysqli_error($con));
	   	    }
	   	   return true;
	   	}

	   	



	   //insert into database table, using the associative array $array_data
	   //the array keys are the column names in your table, and values are value you want to give to those culumns
	   //$table is the name of the table, the insert prototype is as follow
	   //INSERT [INTO] table [(column1, column2, column3,...)] VALUES
	   //(value1, value2, value3,...);

	   	function insert($array_data, $table, $low_priority = "", $ignore = "", $limit_numb = ""){
	   	 $con = $this->conect_db();
	   	 $column_names= "";
	   	 $column_values= "";
	   	 foreach ($array_data as $column => $value) {
	         if ($column_names == ""){
	             $column_names.= "";
	            }else{
	         	    $column_names.= ",";
	            }

	          $column_names.= $column;

	         if ($column_values == ""){
	             $column_values.= "";
	            }else{
	         	     $column_values.= ",";
	            }
	          $column_values.= $value;
	        }
	        var_dump($column_names);
	        var_dump($column_values);

	   	 $query = "insert into $table ($column_names) values ($column_values)" ;
	   	 mysqli_query($con, $query) or die("unable to insert: ". mysqli_error($con));
	   	 return mysqli_insert_id($con);
      	}




      //Check to see if a record already exist in a database table.
     //This is called each time a record is about to get save in a database
     // to make sure we dont have duplicate record
     public function check_record_Exists($columns, $table, $where="") {
         //open database connection
         $con = $this->conect_db();
         $query ="select $columns from $table $where";
         $result = mysqli_query($con, $query)or die("unable to insert: ". mysqli_error($con));
         if(mysqli_num_rows($result) == 0){
              return false;
            }else{
               return true;
            }
        }
    }

?>