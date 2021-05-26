<?php
require_once("../includes/initialize.php");
$content = 'home.php';
$view = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
switch ($view) {
    default :
        $title = "Home";
        $content = 'home.php';
}

require_once 'theme/templates.php';
?>
