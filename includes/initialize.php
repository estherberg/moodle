<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null : define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'] . DS . 'moodle');

defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT . DS . 'includes');

require_once(LIB_PATH . DS . "config.php");
require_once(LIB_PATH . DS . "course.php");
require_once(LIB_PATH . DS . "database.php");
require_once(LIB_PATH . DS . "documents.php");
require_once(LIB_PATH . DS . "functions.php");
require_once(LIB_PATH . DS . "grades.php");
require_once(LIB_PATH . DS . "session.php");
require_once(LIB_PATH . DS . "student.php");
require_once(LIB_PATH . DS . "teacher.php");
require_once(LIB_PATH . DS . "user.php");
?>