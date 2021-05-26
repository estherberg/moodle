<?php

$courseid = $_GET['id'];
$singlecourse = new Course();
$object = $singlecourse->single_course($courseid);

?>
<form class="form-horizontal well span4" action="controller.php?action=edit&id=<?php echo $courseid; ?>" method="POST">

    <fieldset>
        <legend>Edit Subject</legend>


        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for=
                "coursecode">Course Code</label>

                <div class="col-md-8">
                    <input class="form-control input-sm" id="coursecode" name="coursecode" placeholder=
                    "Subject Code" type="text" value="<?php echo $object->COURSE_CODE; ?>">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for=
                "coursedesc">Course Description</label>

                <div class="col-md-8">
                    <input class="form-control input-sm" id="coursedesc" name="coursedesc" placeholder=
                    "Subject Description" type="text" value="<?php echo $object->COURSE_DESCRIPTION; ?>">
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
            <button class="btn btn-primary" name="savecourse" type="submit" >Save</button>
          </div>
        </div>
      </div>';
        }
        ?>


    </fieldset>


</form>
</div>