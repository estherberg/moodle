<?php
$teachid = $_GET['id'];
$singleteacher = new Teacher();
$object = $singleteacher->single_teacher($teachid);
$course = new Course();
$coursename = $course->single_course($object->COURSE_ID)

?>
<form class="form-horizontal well span4" action="controller.php?action=edit&id=<?php echo $teachid; ?>" method="POST">

    <fieldset>
        <legend>New Faculty</legend>


        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for=
                "name">Fullname:</label>

                <div class="col-md-8">
                    <input name="deptid" type="hidden" value="">
                    <input class="form-control input-sm" id="name" name="name" placeholder=
                    "Account Name" type="text" value="<?php echo $object->TEACH_FULLNAME; ?>">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for=
                "address">Current Address:</label>

                <div class="col-md-8">
                    <input name="deptid" type="hidden" value="">
                    <input class="form-control input-sm" id="address" name="address" placeholder=
                    "Current Address" type="text" value="<?php echo $object->TEACH_ADDRESS; ?>">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for=
                "Gender">Gender:</label>

                <div class="col-md-8">
                    <select class="form-control input-sm" name="Gender" id="Gender">
                        <option value="M">Male</option>
                        <option value="F">Female</option>

                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for=
                "civilstats">Civil Status:</label>

                <div class="col-md-8">
                    <select class="form-control input-sm" name="civilstats" id="civilstats">
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>

                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for="course">Cours:</label>

                <div class="col-md-8">
                    <select class="form-control input-sm" name="course" id="course">
                        <?php
                        echo "<option value='" . $object->COURSE_ID . "'>" . $coursename->COURSE_CODE . "</option>";

                        $mydb->setQuery("SELECT * FROM course WHERE COURSE_ID NOT IN (
                                                                                        SELECT c.COURSE_ID
                                                                                        FROM course c, teacher t
                                                                                        WHERE c.COURSE_ID = t.COURSE_ID)");
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
                "email">Email Address:</label>

                <div class="col-md-8">
                    <input name="deptid" type="hidden" value="">
                    <input class="form-control input-sm" id="email" name="email" placeholder=
                    "Email Address" type="text" value="<?php echo $object->TEACH_EMAIL; ?>">
                </div>
            </div>
        </div>


        <?php
        if ($_SESSION['ACCOUNT_TYPE'] == 'Administrator') {
            echo '
                        
             <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>

                      <div class="col-md-8">
                        <button class="btn btn-default" name="saveteacher" type="submit" ><span class="glyphicon glyphicon-floppy-save"></span> Save</button>
                      </div>
                    </div>
                  </div>';
        }
        ?>


    </fieldset>


</form>
</div>