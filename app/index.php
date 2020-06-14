<?php 
    require('../header.php');
    include_once '../config/autoloader.php';

    $task = new Task();
?>
<div class="container">
    <div class="row">
        <div class="page-title">
            <h1>View all task</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 m-3">
            <a href="/app/create_task.php" class="btn btn-info float-right">Create Task</a>
        </div>
    </div>
    <div>
        <?php $tasks = $task->view_all_task(); ?>
        <table class="table table-hover table-bordered">
            <tr>
                <th>Task Name</th>
                <th>Description</th>
                <th>Priority</th>
                <th>Created</th>
                <th>Last modified</th>
                <th></th>
            </tr>
            <?php foreach($tasks as $task ){ ?>
            <tr class="task_id_<?= $task['id']; ?>">
                <td><?= $task['name'] ?></td>
                <td><?= $task['description'] ?></td>
                <td><?= $task['priority'] ?></td>
                <td><?= date('d-m-Y',strtotime($task['created'])); ?></td>
                <td><?= date('d-m-Y',strtotime($task['modified'])); ?></td>
                <td>
                    <a type="button" href="/app/edit_task.php?id=<?= $task['id'] ?>" class="btn btn-primary" >Edit </a>
                    <input type="button" class="btn btn-danger" onclick="task_delete(<?= $task['id'] ?>)" value="Delete">
                </td>
            </tr>
            <?php }?>
        </table>
    </div>
</div>
<script src="/assets/app.js"></script>
<?php
    require('../footer.php');
?>