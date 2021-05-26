<?php
$grade = new Grades();
$curGrade = $grade->single_grades($_GET['gradeId']);

$student = new Student();
$cur = $student->single_student($_GET['studentId']);

$course = new Course();
$coursename = $course->single_course($curGrade->COURSE_ID)

?>
<form class="form-horizontal well span4"
      action="controller.php?action=editgrade&studentId=<?php echo $_GET['studentId']; ?>&gradeId=<?php echo $_GET['gradeId']; ?>&cId=<?php echo $curGrade->COURSE_ID; ?>"
      method="POST">

    <fieldset>
        <legend>Edit Grades for student <?php echo $cur->FNAME; ?>, <?php echo $cur->LNAME; ?></legend>

        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for=
                "course">Course</label>
                <div class="col-md-8">
                    <input class="form-control input-sm" id="course" name="course" readonly type="text"
                           value="<?php echo $coursename->COURSE_CODE; ?>">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for=
                "first">First Grading</label>

                <div class="col-md-8">
                    <input class="form-control input-sm" id="first" name="first" onkeyup="calculate();" type="text"
                           value="<?php echo $curGrade->FIRST; ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for=
                "second">Second Grading</label>

                <div class="col-md-8">
                    <input class="form-control input-sm" id="second" name="second" onkeyup="calculate();" type="text"
                           value="<?php echo $curGrade->SECOND; ?>">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for=
                "finalave">Final Average</label>
                <div class="col-md-8">
                    <input class="form-control input-sm" id="finalave" name="finalave" readonly type="text"
                           value="<?php echo $curGrade->AVE; ?>">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for=
                "idno"></label>
                <div class="col-md-8">
                    <button class="btn btn-primary" name="editgrades" type="submit">Save</button>
                </div>
            </div>
        </div>
    </fieldset>


</form>
</div>
