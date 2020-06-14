function task_delete(id){
    $.ajax({
        method:'POST',
        url:'task_delete.php',
        data:{'task_id':id},
        success:function(data){
            try {
                response = JSON.parse(data);
                if(response){
                    alert("Task deleted");
                    $('.task_id_'+id).remove();
                }else{
                    alert("Unable to delete the task");
                }
            } catch (error) {
                alert('Service unavailable');
            }
        }
    })
}