<?php

class Task extends Database{
    private $con;
    private $table_name = "tasks";
    public $name;
    public $description;
    public $priority;

        public function __construct(){
            $this->con =  parent::get_conncetion();
        }


    function create_task(){
        $qstring = "INSERT INTO $this->table_name (name,description,priority_id,created) 
        VALUES ('".$this->name."', '".$this->description."', ".$this->priority.", NOW() ".")";
        $result = $this->con->query($qstring);
        $this->con->close();
        if($result===TRUE){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    function view_all_task(){
        $result_array = array();
        $qstring = "SELECT t.*,p.priority FROM ".$this->table_name." t,priorities p WHERE t.priority_id=p.id ;";
        $result = $this->con->query($qstring);        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($result_array,$row); 
            }
        }
        $this->con->close();
        return $result_array;
    }

    function get_task_by_id($task_id){
        $result_array = array();
        $qstring = "SELECT * FROM ".$this->table_name." WHERE id = $task_id;";
        $result = $this->con->query($qstring);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($result_array,$row); 
            }
        }
        $this->con->close();
        return $result_array;
    }

    function update_task($task_id){
        $result_array = array();
        $qstring = "UPDATE ".$this->table_name." set name='".$this->name."', description='".$this->description."', priority_id=".$this->priority.", modified='".date("Y-m-d H:i:s")."'
                    WHERE id = $task_id;";
        $result = $this->con->query($qstring);
        if($result===TRUE){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    function task_delete($task_id){
        $qstring = "DELETE FROM ".$this->table_name." WHERE id = $task_id;";
        $result = $this->con->query($qstring);
        if($result===TRUE){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}

?>