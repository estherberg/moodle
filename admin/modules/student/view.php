<div class="container">
    <div class="well">

        <form action="controller.php?action=delsy&studentId=<?php echo $_GET['studentId']; ?>" Method="POST">
            <table class="table table-hover">
                <caption><h3 align="left">Student Enrollment Records</h3></caption>
                <thead>
                <tr>
                    <th>Grade and Section</th>
                    <th>Status</th>
                    <th>Options</th>

                </tr>
                </thead>
                <tbody>
                <?php
                $mydb->setQuery("SELECT  `COURSE_NAME` ,COURSE_DESC, s.`COURSE_ID` ,  `IDNO` ,  `CATEGORY` ,  `DATE_RESERVED` ,  `DATE_ENROLLED` ,  `STATUS` 
										FROM  `course` c
										WHERE IDNO=" . $_GET['studentId']);
                $cur = $mydb->loadResultList();
                foreach ($cur as $schoolyr) {
                    echo '<tr>';

                    echo '<td><input type="checkbox" name="selector[]" id="selector[]" value="' . $schoolyr->SYID . '"/>
				  				<a href="index.php?view=editenrollment&studentId=' . $_GET['studentId'] . '&id=' . $schoolyr->SYID . '">' . $schoolyr->COURSE_DESC . '</a></td>';
                    echo '<td>' . $schoolyr->STATUS . '</td>';
                    echo '<td>' . $schoolyr->DATE_RESERVED . '</td>';
                    echo '<td><a href = "index.php?view=subject&studentId=' . $schoolyr->IDNO . '&cid=' . $schoolyr->COURSE_ID . '">Enrolled Subjects</a></td>';
                    echo '</tr>';
                }
                ?>
                </tbody>

            </table>
            <?php
            if ($_SESSION['ACCOUNT_TYPE'] == 'Administrator') {

                echo '<div class="btn-group">
				  <a href="index.php?view=enroll&studentId=' . $_GET['studentId'] . '" class="btn btn-default"><span class="glyphicon glyphicon-plus-sign"></span> New</a>
				  <button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button>
				</div>';

            }
            ?>
        </form>
    </div><!--End of well-->

</div><!--End of container-->