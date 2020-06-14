<?php
 include_once '../config/autoloader.php';

  if(isset($_POST['task_id']) && !empty($_POST['task_id'])){
    $task_id= $_POST['task_id'];
    $task = new Task();
    echo ($task->task_delete($task_id))? TRUE: FALSE;
  }else{
    echo FALSE;
  }
  
?>