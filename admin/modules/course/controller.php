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
    if ($_POST['coursecode'] == "" OR $_POST['coursedesc'] == "") {
        message("All field is required!", "error");
        check_message();
    } else {
        $course = new Course();
        $coursecode = $_POST['coursecode'];
        $coursedesc = $_POST['coursedesc'];
        $res = $course->find_all_courses($coursecode);

        if ($res >= 1) {
            message("Course name already exist!", "error");
            redirect('index.php');
        } else {
            $course->COURSE_CODE = $coursecode;
            $course->COURSE_DESCRIPTION = $coursedesc;
            $istrue = $course->create();
            if ($istrue == 1) {

                message("New [" . $coursecode . "] course created successfully!", "success");
                redirect('index.php');
            }
        }


    }
}

function doEdit()
{
    if (isset($_POST['savecourse'])) {


        if ($_POST['coursecode'] == "" OR $_POST['coursedesc'] == "") {
            message("All field is required!", "error");
            redirect('index.php');
        } else {


            $subj = new Course();
            $courseid = $_GET['id'];
            $coursecode = $_POST['coursecode'];
            $coursedesc = $_POST['coursedesc'];

            $subj->COURSE_ID = $courseid;
            $subj->COURSE_CODE = $coursecode;
            $subj->COURSE_DESCRIPTION = $coursedesc;
            $subj->update($courseid);
            message($coursecode . " has updated successfully!", "info");
            redirect('index.php');


        }


    }

}

function doDelete()
{
    @$id = $_POST['selector'];
    $key = count($id);

    for ($i = 0; $i < $key; $i++) {

        $course = new Course();
        $course->delete($id[$i]);
    }
    message("Course(s) already Deleted!", "info");
    redirect('index.php');

}

?>