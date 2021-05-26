<div class="wells">
    <h3 align="left">List of Courses</h3>
    <form action="controller.php?action=delete" Method="POST">
        <table id="example" class="table table-striped" cellspacing="0">

            <thead>
            <tr>
                <th>Course</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $mydb->setQuery("SELECT * 
											FROM  `course`");
            loadresult();

            function loadresult()
            {
                global $mydb;
                $cur = $mydb->loadResultlist();
                foreach ($cur as $result) {
                    echo '<tr>';
                    echo '<td ><input type="checkbox" name="selector[]" id="selector[]" value="' . $result->COURSE_ID . '"/>
						  				<a href="index.php?view=edit&id=' . $result->COURSE_ID . '">' . $result->COURSE_CODE . '</a></td>';
                    echo '<td >' . $result->COURSE_DESCRIPTION . '</td>';
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