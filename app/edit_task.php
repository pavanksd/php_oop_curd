<?php 
    require('../header.php');
    include_once '../config/autoloader.php';
    $task_id = $_GET['id'];
    $task = new Task();
    $priority = new Priority();

    if($_POST){  

        // set task property values
        $task->name = $_POST['name'];    
        $task->description = $_POST['description'];
        $task->priority = $_POST['priority'];
     
        // update the task
        if($task->update_task($task_id)){
            $update_status= TRUE;            
        }
        else{
            $update_status= FALSE;
        }
    }
?>

<div class="container">
    <div class="row">
        <div class="page-title">
            <h1>Edit task</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 m-3">
            <a href="/app/create_task.php" class="btn btn-info float-right">Create Task</a>
        </div>
    </div>
    <div>
        <?php $tasks = $task->get_task_by_id($task_id); ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?id='.$task_id;?>" method="POST">
            <table class="table table-hover table-bordered ">
                <tr>
                    <td>Task Name</td>
                    <td><input type="text" name="name" class="form-control" value=<?= $tasks[0]['name'] ?> /></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><textarea name='description' class='form-control'><?= $tasks[0]['description'] ?> </textarea></td>
                </tr>
                <tr>
                    <td>Priority</td>
                    <td>
                    <?php $priorities  = $priority->get_priority(); ?>
                        <select class='form-control' name='priority'>
                        <option value="0">Select priority</option>
                        <?php foreach($priorities as $priority){ ?>
                            <option value="<?= $priority['id'] ?>" <?= $tasks[0]['priority_id']==$priority['id'] ?'selected':''; ?>  ><?= $priority['priority'] ?></option>
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </td>
                </tr>
            </table>
        </form>
        <?php if(isset($update_status) && $update_status===TRUE){ ?>
            <div class="alert alert-success">Task updated.</div>
        <?php } else if(isset($update_status) && $update_status===FALSE){ ?>
            <div class='alert alert-danger'>Unable to update task.</div>
        <?php } ?>
    </div>
</div>

<?php
    require('../footer.php');
?>