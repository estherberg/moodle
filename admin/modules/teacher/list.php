<div class="well">
    <h3 align="left">List des professeurs</h3>
    <form action="controller.php?action=delete" Method="POST">
        <table id="example" class="table table-striped" cellspacing="0">

            <thead>
            <tr>
                <th>No</th>
                <th>
                    Fullname
                </th>
                <th>Address</th>
                <th>Gender</th>
                <th>Civil Status</th>
                <th>Course</th>
                <th>Email Address</th>
            </tr>
            </thead>
            <tbody>

            <?php
            $mydb->setQuery("SELECT TEACH_ID, TEACH_FULLNAME, TEACH_ADDRESS, TEACH_SEX, TEACH_STATUS, COURSE_CODE, TEACH_EMAIL
							FROM  teacher t, course c WHERE c.COURSE_ID = t.COURSE_ID");
            loadresult();


            function loadresult()
            {
                global $mydb;
                $cur = $mydb->loadResultlist();
                foreach ($cur as $result) {
                    echo '<tr>';
                    echo '<td width="5%" align="center"></td>';
                    echo '<td><input type="checkbox" name="selector[]" id="selector[]" value="' . $result->TEACH_ID . '"/>
						  				<a href="index.php?view=edit&id=' . $result->TEACH_ID . '">' . $result->TEACH_FULLNAME . '</a></td>';
                    echo '<td>' . $result->TEACH_ADDRESS . '</td>';
                    echo '<td>' . $result->TEACH_SEX . '</td>';
                    echo '<td>' . $result->TEACH_STATUS . '</td>';
                    echo '<td>' . $result->COURSE_CODE . '</td>';
                    echo '<td>' . $result->TEACH_EMAIL . '</td>';
                    echo '</tr>';
                }
            }

            ?>
            </tbody>

        </table>
        <?php
        if ($_SESSION['ACCOUNT_TYPE'] == 'Administrator') {
            echo '
				<div class="btn-group">
				  <a href="index.php?view=add" class="btn btn-default"><span class="glyphicon glyphicon-plus-sign"></span> New</a>
				  <button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button>
				</div>';
        }
        ?>
    </form>
</div>

</div>