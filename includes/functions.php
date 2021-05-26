<?php

function redirect($location = Null)
{
    if ($location != Null) {
        echo "<script>
					window.location='{$location}'
				</script>";
    } else {
        echo 'error location';
    }

}

function __autoload($class_name)
{
    $class_name = strtolower($class_name);
    $path = LIB_PATH . DS . "{$class_name}.php";
    if (file_exists($path)) {
        require_once($path);
    } else {
        die("The file {$class_name}.php could not be found.");
    }

}

function currentpage_student()
{
    $this_page = $_SERVER['REQUEST_URI'];
    $bits = explode('/', $this_page);
    return $bits[2];
}

function currentpage_admin()
{
    $this_page = $_SERVER['SCRIPT_NAME'];
    $bits = explode('/', $this_page);
    return $bits[3];
}

?>