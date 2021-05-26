<div class="wells">
    <h3 align="left">Liste des Etudiants</h3>
    <form action="controller.php?action=delete" Method="POST">
        <table id="example" class="table table-striped" cellspacing="0">

            <thead>
            <tr>
                <th>No.</th>
                <th width="10%" align="left">ID#.</th>
                <th>Fullname</th>
                <th>Sex</th>
                <th>Birth Date</th>
                <th>Email Address</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php

            $mydb->setQuery("SELECT  `S_ID` ,CONCAT(  `LNAME` ,  ', ',  `FNAME`) AS  'Name',
				  						  `SEX` ,`BDAY` ,  `STATUS` ,  `EMAIL`
				  						  FROM  `student`");
            loadresult();


            function loadresult()
            {
                global $mydb;
                $cur = $mydb->loadResultList();
                foreach ($cur as $student) {
                    echo '<tr>';
                    echo '<td width="5%" align="center"></td>';
                    echo '<td width="10%"><input type="checkbox" name="selector[]" id="selector[]" value="' . $student->S_ID . '"/>
					  				<a href="index.php?view=edit&id=' . $student->S_ID . '">' . $student->S_ID . '</a></td>';
                    echo '<td  >' . $student->Name . '</td>';
                    echo '<td align="center">' . $student->SEX . '</td>';
                    echo '<td  align="center">' . $student->BDAY . '</td>';
                    echo '<td>' . $student->EMAIL . '</td>';
                    echo '<td><a href="index.php?view=grades&studentId=' . $student->S_ID . '"> Notes </a></td>';
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
						  <a href="index.php?view=add" class="btn btn-default"><span class="glyphicon glyphicon-plus-sign"></span>  New</a>
						   <button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button>
						</div>';
        }

        ?>
    </form>
</div>

</div>
