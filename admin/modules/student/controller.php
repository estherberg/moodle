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

    case 'grade' :
        doGrade();
        break;

    case 'editgrade' :
        doEditGrade();
        break;
}

function doInsert()
{

    //primary Details
    $S_ID = $_POST['idno'];
    $FNAME = $_POST['fName'];
    $LNAME = $_POST['lName'];
    $SEX = $_POST['gender'];
    $BDAY = $_POST['bday'];
    $STATUS = $_POST['status'];
    $NATIONALITY = $_POST['nationality'];
    $HOME_ADD = $_POST['home'];
    $EMAIL = $_POST['email'];


    $student = new Student();
    $student->S_ID = $S_ID;
    $student->LNAME = $LNAME;
    $student->FNAME = $FNAME;
    $student->SEX = $SEX;
    $student->BDAY = $BDAY;
    $student->STATUS = $STATUS;
    $student->NATIONALITY = $NATIONALITY;
    $student->HOME_ADD = $HOME_ADD;
    $student->EMAIL = $EMAIL;


    if ($S_ID == "") {
        message('ID Number is required!', "error");
        redirect('index.php?view=add');
    } elseif ($LNAME == "") {
        message('Last Name is required!', "error");
        redirect('index.php?view=add');
    } elseif ($FNAME == "") {
        message('First Name is required!', "error");
        redirect('index.php?view=add');
    } elseif ($EMAIL == "") {
        message('Email address is required!', "error");
        redirect('index.php?view=add');

    } else {

        $student->create();
        message('New student addedd successfully!', "success");
        redirect('index.php?view=list');


    }

}

function doEdit()
{
    if (isset($_POST['submit'])) {

        $S_ID = $_POST['idno'];
        $LNAME = $_POST['lName'];
        $FNAME = $_POST['fName'];
        $SEX = $_POST['gender'];
        $BDAY = $_POST['bday'];
        $STATUS = $_POST['status'];
        $NATIONALITY = $_POST['nationality'];
        $CONTACT_NO = $_POST['contact'];
        $HOME_ADD = $_POST['home'];
        $EMAIL = $_POST['email'];


        $student = new Student();
        $student->S_ID = $S_ID;
        $student->LNAME = $LNAME;
        $student->FNAME = $FNAME;
        $student->SEX = $SEX;
        $student->BDAY = $BDAY;
        $student->STATUS = $STATUS;
        $student->NATIONALITY = $NATIONALITY;
        $student->CONTACT_NO = $CONTACT_NO;
        $student->HOME_ADD = $HOME_ADD;
        $student->EMAIL = $EMAIL;

        if ($S_ID == "") {
            message('ID Number is required!', "error");
            redirect('index.php?view=edit&id=' . $S_ID);
        } elseif ($LNAME == "") {
            message('Last Name is required!', "error");
            redirect('index.php?view=edit&id=' . $S_ID);
        } elseif ($FNAME == "") {
            message('First Name is required!', "error");
            redirect('index.php?view=edit&id=' . $S_ID);
        } elseif ($EMAIL == "") {
            message('Email address is required!', "error");
            redirect('index.php?view=edit&id=' . $S_ID);

        } else {

            $student->update($_GET['id']);
            message('Student infomation updated successfully!', "info");
            redirect('index.php');


        }
    }


}

function doDelete()
{
    @$id = $_POST['selector'];
    $key = count($id);
    //multi delete using checkbox as a selector

    for ($i = 0; $i < $key; $i++) {

        $student = new Student();
        $student->delete($id[$i]);
    }
    message("Student has successfully deleted!", "info");
    redirect('index.php');
}

function doGrade()
{
    if (isset($_POST['savegrades'])) {

        if ($_POST['finalave'] >= 10 AND $_POST['finalave'] <= 20) {
            $remarks = "Validé";
        } else {
            $remarks = "Ajourné";
        }

        $studentId = $_GET['studentId'];

        $grade = new Grades();
        $grade->S_ID = $studentId;
        $grade->COURSE_ID = $_POST['course'];
        $grade->FIRST = $_POST['first'];
        $grade->SECOND = $_POST['second'];
        $grade->AVE = $_POST['finalave'];
        $grade->REMARKS = $remarks;
        $grade->create();
        message("Grade successfully created!");
        redirect("index.php?view=grades&studentId=" . $studentId . "");
    }
}

function doEditGrade()
{
    if (isset($_POST['editgrades'])) {

        if ($_POST['finalave'] >= 10 AND $_POST['finalave'] <= 20) {
            $remarks = "Validé";
        } else {
            $remarks = "Ajourné";
        }

        $studentId = $_GET['studentId'];

        $grade = new Grades();
        $grade->S_ID = $studentId;
        $grade->COURSE_ID = $_GET['cId'];
        $grade->FIRST = $_POST['first'];
        $grade->SECOND = $_POST['second'];
        $grade->AVE = $_POST['finalave'];
        $grade->REMARKS = $remarks;
        $grade->update($_GET['gradeId']);
        message("Grade successfully updated!");
        redirect("index.php?view=grades&studentId=" . $studentId . "");
    }
}

?>