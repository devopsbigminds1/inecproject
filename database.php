<?php
 class Databases {  
      public $con;

      public function __construct()  {  
           $this->con = mysqli_connect("localhost", "root", "", "inec");  
           if(!$this->con)  {  
                echo 'Database Connection Error ' . mysqli_connect_error($this->con);  
           }  
      }  
      public function insert($table_name, $data)  
      {  
           $string = "INSERT INTO ".$table_name." (";            
           $string .= implode(",", array_keys($data)) . ') VALUES (';            
           $string .= "'" . implode("','", array_values($data)) . "')";  
           if(mysqli_query($this->con, $string))  {  
                return true;  
           }  
           else  {  
                echo mysqli_error($this->con);  
           }  
      }  
      public function votersReg()  {
           $table_name = 'voters_reg';
           $array = array();  
           $query = "SELECT * FROM ".$table_name." ";  
           $result = mysqli_query($this->con, $query);  
           while($row = mysqli_fetch_assoc($result))  {  
                $array[] = $row;  
           }  
           return $array;  
      }  

}

?>