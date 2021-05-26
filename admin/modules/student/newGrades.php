<?php
$student = new Student();
$cur = $student->single_student($_GET['studentId']);
?>
<form class="form-horizontal well span4"
      action="controller.php?action=grade&studentId=<?php echo $_GET['studentId']; ?>" method="POST">

    <fieldset>
        <legend>Add Grades for student <?php echo $cur->FNAME; ?>, <?php echo $cur->LNAME; ?></legend>

        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for=
                "course">Cours:</label>

                <div class="col-md-8">
                    <select class="form-control input-sm" name="course" id="course">
                        <?php
                        $mydb->setQuery("SELECT * FROM course WHERE COURSE_ID NOT IN (
                                                                                        SELECT c.COURSE_ID
                                                                                        FROM course c, grades g
                                                                                        WHERE c.COURSE_ID = g.COURSE_ID)");
                        loadresult();

                        function loadresult()
                        {
                            global $mydb;
                            $cur = $mydb->loadResultlist();
                            foreach ($cur as $result) {
                                echo "<option value='" . $result->COURSE_ID . "'>" . $result->COURSE_CODE . "</option>";
                            }
                        }

                        ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for=
                "first">First Grading</label>

                <div class="col-md-8">
                    <input class="form-control input-sm" id="first" name="first"
                           onkeyup="calculate();javascript:checkNumber(this);" type="text">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for=
                "second">Second Grading</label>

                <div class="col-md-8">
                    <input class="form-control input-sm" id="second" name="second"
                           onkeyup="calculate();javascript:checkNumber(this);" type="text">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for=
                "finalave">Final Average</label>
                <div class="col-md-8">
                    <input class="form-control input-sm" id="finalave" name="finalave" readonly type="text">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for=
                "idno"></label>
                <div class="col-md-8">
                    <a href="index.php?view=class&id=" class="btn btn-primary" name="savecourse" type="submit">Back</a>
                    <button class="btn btn-primary" name="savegrades" type="submit">Save</button>
                </div>
            </div>
        </div>
    </fieldset>


</form>
</div>
