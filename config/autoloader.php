
<?php 

spl_autoload_register('my_auto_loader');

function my_auto_loader($classname){
    $path = "../models/";
    $extension = '.php';
    $fullpath = $path.$classname.$extension;

    if (file_exists($fullpath)) {
        include_once $fullpath;
    }else{ // for db path in config
        $path = "";
        $fullpath = $path.$classname.$extension;
        include_once $fullpath;
    }
}
?>