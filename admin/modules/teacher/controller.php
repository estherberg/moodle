<?php
require_once("../../../includes/initialize.php");
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
    case 'add' :
        doInsert();
        break;

    case 'edit' :
        doEdit();
        break;

    case 'delete' :
        doDelete();
        break;
}

function doInsert()
{

    if (isset($_POST['saveteacher'])) {

        if ($_POST['name'] == "" OR $_POST['address'] == "" OR $_POST['email'] == "") {
            message("All field is required!", "error");
            check_message();
        } else {


            $teacher = new Teacher();
            $name = $_POST['name'];
            $address = $_POST['address'];
            $Gender = $_POST['Gender'];
            $civilstats = $_POST['civilstats'];
            $course = $_POST['course'];
            $email = $_POST['email'];

            $user = new User();
            $acc_name = $_POST['name'];
            $acc_username = $_POST['username'];
            $acc_password = $_POST['pass'];
            $acc_type = 'Teacher';
            $resuser = $user->find_all_user($acc_name);


            if ($resuser >= 1) {
                message("Account name already exist!", "error");
                redirect('index.php');
            } else {


                $res = $teacher->find_all_teachers($name);

                if ($res >= 1) {
                    message("Teacher name already exist!", "error");
                    check_message();
                } else {

                    $teacher->TEACH_FULLNAME = $name;
                    $teacher->TEACH_ADDRESS = $address;
                    $teacher->TEACH_SEX = $Gender;

                    $teacher->TEACH_STATUS = $civilstats;
                    $teacher->COURSE_ID = $course;
                    $teacher->TEACH_EMAIL = $email;


                    $user->ACCOUNT_NAME = $name;
                    $user->ACCOUNT_USERNAME = $email;
                    $user->ACCOUNT_PASSWORD = sha1($acc_password);
                    $user->ACCOUNT_TYPE = $acc_type;

                    $istrue = $user->create();
                    if ($istrue == 1) {

                    }
                }
                $istrueteacher = $teacher->create();
                if ($istrueteacher == 1) {

                    message("New Teacher created successfully!", "success");
                    redirect('index.php');
                } else {

                    message("No Teacher created!", "error");
                    redirect('index.php');

                }
            }


        }
    }
}


function doEdit()
{
    $teachid = $_GET['id'];
    if (isset($_POST['saveteacher'])) {

        if ($_POST['name'] == "" OR $_POST['address'] == "" OR $_POST['email'] == "") {
            message("All field is required!", "error");
            check_message();
        } else {


            $inst = new Teacher();
            $name = $_POST['name'];
            $address = $_POST['address'];
            $Gender = $_POST['Gender'];
            $civilstats = $_POST['civilstats'];
            $course = $_POST['$course'];
            $email = $_POST['email'];

            $inst->TEACH_FULLNAME = $name;
            $inst->TEACH_ADDRESS = $address;
            $inst->TEACH_SEX = $Gender;
            $inst->TEACH_STATUS = $civilstats;
            $inst->COURSE_ID = $course;
            $inst->TEACH_EMAIL = $email;
            $inst->update($teachid);

            message($name . "has been updated successfully!", "success");
            redirect('index.php');
        }

    }


}

function doDelete()
{
    @$id = $_POST['selector'];
    $key = count($id);

    for ($i = 0; $i < $key; $i++) {
        $inst = new Teacher();
        $inst->delete($id[$i]);
    }

    message("Teacher name(s) already Deleted!", "info");
    redirect('index.php');
}

?>