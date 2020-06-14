<?php
    require('../header.php');
    include_once '../config/autoloader.php';
    
    $priority = new Priority();
    $task = new Task();

    if($_POST){  
        // set task property values
        $task->name = $_POST['name'];    
        $task->description = $_POST['description'];
        $task->priority = $_POST['priority'];
     
        // create the task
        if($task->create_task()){
            $create_status= TRUE;            
        }
        else{
            $create_status= FALSE;
        }
    }
?>
<div class="container">
    <div class="row">
        <div class="page-title">
            <h1>Create Task</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 m-3">
            <a href="index.php" class="btn btn-info float-right">View all Task</a>
        </div>
    </div>
    <div class="col-12">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <table class="table table-hover table-bordered ">
                <tr>
                    <td>Task Name</td>
                    <td><input type="text" name="name" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><textarea name='description' class='form-control'></textarea></td>
                </tr>
                <tr>
                    <td>Priority</td>
                    <td>
                    <?php $priorities  = $priority->get_priority(); ?>
                        <select class='form-control' name='priority'>
                        <option value="0">Select priority</option>
                        <?php foreach($priorities as $priority){ ?>
                            <option value="<?= $priority['id'] ?>"><?= $priority['priority'] ?></option>
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </td>
                </tr>
            </table>
        </form>
        <?php if(isset($create_status) && $create_status===TRUE){ ?>
            <div class="alert alert-success">Task created.</div>
        <?php } else if(isset($create_status) && $create_status===FALSE){ ?>
            <div class='alert alert-danger'>Unable to create task.</div>
        <?php } ?>
    </div>
</div>
<?php
require('../footer.php');
?>