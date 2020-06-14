<?php

    class Priority extends Database {
        
        private $table_name = "priorities";
        private $con;

        public function __construct(){
            $this->con =  parent::get_conncetion();
        }

        function get_priority(){            
            $result_array = array();
            $qstring = "SELECT * FROM ". $this->table_name;
            $result = $this->con->query($qstring);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    array_push($result_array,$row); 
                }
              }
            $this->con->close();
            return $result_array;
        }
    }

?>