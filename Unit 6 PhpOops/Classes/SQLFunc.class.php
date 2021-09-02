<?php
    class SQLFunc
    {
        //-------------------------------------------------------------------------------
        //For Database Connection - Object Of Mysqli Class
        public static $db;
        //For Table Name - Declaring It null so that It can be initialised by the Inherited classes
        protected static $tbName = "";
        //For Table Coulumns - Array For Table colums and It can be initialised by the Inherited classes
        protected static $db_col = [];
        //For Displaying Errors in the Input Field
        //public $errors = [];
        //Array of allowed Extentions
        protected $allowed = array('png','jpg','jpeg');
        //-------------------------------------------------------------------------------
        //Setting Connection to database
        public static function set_connect($database)
        {
            self::$db = $database;
        }
        //Function For Hashing Password  
        public function hashPass()
        {
            $this->Pass= password_hash($this->UserPass,PASSWORD_BCRYPT);
        }
        //For Verifying Password
        public function verify_pass($password)
        {
            return password_verify($password,$this->Pass);
        }
        //Function For Inserting the record
        protected function createFunc()
        {
            //Sanitizing the Data Before Inserting
            $att = $this->sanitizeData();
            //Creating SQL Query
            $sql = "INSERT INTO ".static::$tbName." (";
            //Joining the keys of array which are the name of columns
            $sql .=join(', ',array_keys($att));
            $sql .=") VALUES ('";
            //Joining the Values of array which are the Values of Record
            $sql .=join("', '",array_values($att));
            $sql .="')";
            //Executing the Query - It Will Return True if the query executes
            $result = self::$db->query($sql);
            
            //If the result is true we are setting the Id(PK AI)
            if($result)
            {
                $this->Id=self::$db->insert_id;
            }
            //And we are returning the result
            return $result;
        }
        //Function for running all the queries
        public static function find_by_sql($sql)
        {
            //Running the Query
            $result = self::$db->query($sql);
            //If the result is False then Exiting
            if(!$result) {
                exit("Database Query Failed");
            }
            //Creating array Of Object So that we can save all the results
            $obj_array=[];
            //Running the loop for all the records
            while($row = $result->fetch_assoc()){
                //Populating the records and then adding it to array
                $obj_array[]= static::intantiateData($row);
            }
            //Clearing the result so that it can save memory
            $result->free();

            //Returning the object array
            return $obj_array;
        }
        //For Finding record by Id
        public static function find_by_id($id)
        {
            //Making the query by adding the table name dyunamically 
            $sql = "SELECT * FROM ".static::$tbName." WHERE Id='".self::$db->escape_string($id)."'";
            //Executing the query and returning the object
            $obj = static::find_by_sql($sql);
            //If the object is not empty then returning the first value of array
            if(!empty($obj)){
                return array_shift($obj);
            }
            //Else returning the False
            else
            {
                return false;
            }
        }
        //Function for Finding User By Email
        public static function find_by_useremail($useremail)
        {
            //Creating SQL For Finding User By Email
            $sql = "SELECT * FROM ".static::$tbName." WHERE Email='".self::$db->escape_string($useremail)."'";
            //Executing Query
            $obj = static::find_by_sql($sql);
            //If Object Is not empty
            if(!empty($obj)){
                //Returnig the result 
                return array_shift($obj);
            }
            else
            {
                //If Object Is Empty then returning false
                return false;
            }
        }
        //Functions for Finding all the results
        public static function find_all()
        {
            //Query for selecting all the results
            $sql = "SELECT * FROM ".static::$tbName." "."ORDER BY Id DESC";
            //Returning the Object Array
            return static::find_by_sql($sql);
        }
        //Setting the attributes for the query dynamically
        public function setVal()
        {
            //Declaring Array For Attributes
            $att=[];
            foreach(static::$db_col as $col)
            {
                //If the column name is Id Then we are not Running the loop
                if($col=="Id"){continue;}
                //Setting the attributes
                $att[$col]=$this->$col;
            }
            //Returning the associative Array
            return $att;
        }
        //Function For Sanitizing Data
        protected function sanitizeData()
        {
            //Declaring Array For Sanitized Data Attributes
            $san = [];
            //Getting the array from setVal Function and passing it as keys and values
            foreach($this->setVal() as $key=>$val)
            {
                //Creating associative Array
                $san[$key] = self::$db->escape_string($val);
            }
            //Returning the Sanitized Data for Query
            return $san;
        } 
        //For Populating all the values of the object 
        protected static function intantiateData($row)
        {
            //Creating object Of Class which is calling this function
            $object = new static;
            //For each row we are creating one object and setting the value in it
            foreach($row as $property=>$val)
            {
                //If the name if property of the class exists then Populating the properties
                //Thats why we should give the name of properties and columns same
                if(property_exists($object,$property))
                {
                    //Entering the values
                    $object->$property = $val;
                }
            }
            //Returning each object of the class
            return $object;
        }
        //Merging Attributes for Update Query
        public function mergeAtt($args)
        {
            //For all the arguments passed 
            foreach($args as $key =>$val)
            {
                if($key =="Pass"){
                    continue;
                }
                //If the Property Exists and the value is not null then we will populate the field
                if(property_exists($this,$key) && !is_null($val))
                {
                    $this->$key = $val;
                }
            }
        }
        //For Updating A Record
        protected function UpdateFunc()
        {
            //Sanitizing the data Before Adding
            $att = $this->sanitizeData();
            //Array for pairs of column name and their values
            $attpairs = [];
            foreach($att as $key=>$val)
            {
                //Array values is according to the key and the value in it
                $attpairs[] = "$key = '$val'";
            }
            //Creating the Update Query
            $sql="UPDATE ".static::$tbName." SET ";
            $sql .= join(", ",$attpairs);
            $sql .= "WHERE Id='".self::$db->escape_string($this->Id)."' LIMIT 1";
            //Executing the Query
            $result = self::$db->query($sql);
            //Returning the result of the query - True/False
            return $result;
        }
        //For checking which function to call
        public function FuncCall()
        {
            //If the id is present then calling update Function
            if($this->Id !== "")
            {
                return $this->UpdateFunc();
            }
            //If the id is not present then calling Insert Function
            else
            {
                return $this->createFunc();
            }
        }
        //For Deleting A Record
        public function DeleteFunc()
        {
            //Creating the Query for Delete Record
            //Add LIMIT 1 so that only one record is deleted
            $sql = "DELETE FROM ".static::$tbName." WHERE Id='".self::$db->escape_string($this->Id)."'";
            //Executing the query
            $result = self::$db->query($sql);
            //Return ing the result of the query
            return $result;
        }
        //For Moving File in Specific Directory
        function moveFile($file,$dir)
        {
            if(isset($file))
            {
                $newfile = $file;
                $fileName = $file['name'];
                $filetmpName = $file['tmp_name'];
                $fileSize = $file['size'];
                $fileError = $file['error'];
                $fileType = $file['type'];
                $fileExtExplode = explode(".",$fileName);
                $fileExt = strtolower(end($fileExtExplode));
                if(in_array($fileExt,$this->allowed))
                {
                    if($fileError==0)
                    {
                        $newFileName = uniqid('',true) . "." .$fileExt;
                        $fileDes = $dir."/".$newFileName;
                        if(move_uploaded_file($filetmpName,$fileDes))
                        {
                            return $newFileName;
                        }
                    }
                }
            }
            else
            {
                return "File Not Uploaded";
            }
        }
        function convertYoutube($string) {
            return preg_replace(
                "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
                "https://www.youtube.com/embed/$2",$string);
        }
        //-------------------------------------------------------------------------------
    }
?>