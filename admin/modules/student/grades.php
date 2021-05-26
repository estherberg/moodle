<?php
$studentId = $_GET['studentId'];
?>

<div class="container">
    <div class="well">
        <h3 align="left">Notes</h3>
        <form action="controller.php?action=delete" Method="POST">
            <table id="example" class="table table-striped" cellspacing="0">

                <thead>
                <tr>
                    <th>No</th>
                    <th>Matière</th>
                    <th>Note 1</th>
                    <th>Note 2</th>
                    <th>Moyenne</th>
                    <th>Statut</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $mydb->setQuery("SELECT *
						FROM  `grades` g, `student` s, `course` c
						WHERE g.S_ID = s.S_ID AND g.COURSE_ID = c.COURSE_ID
                        AND s.S_ID = {$studentId} ");

                loadresult($studentId);

                function loadresult($studentId)
                {
                    global $mydb;
                    $cur = $mydb->loadResultList();

                    foreach ($cur as $result) {
                        echo '<tr>';
                        echo '<td></td>';
                        echo '<td>' . $result->COURSE_CODE . '</td>';
                        echo '<td>' . $result->FIRST . '</td>';
                        echo '<td>' . $result->SECOND . '</td>';
                        echo '<td>' . $result->AVE . '</td>';
                        echo '<td>' . $result->REMARKS . '</td>';
                        echo '<td><a href="index.php?view=editgrades&studentId=' . $studentId . '&gradeId=' . $result->GRADE_ID . '"> Edit</a></td>';
                        echo '</tr>';
                    }
                }

                ?>
                </tbody>

            </table>
            <?php
            if ($_SESSION['ACCOUNT_TYPE'] == 'Administrator' || $_SESSION['ACCOUNT_TYPE'] == 'Teacher') {
                echo '
				<div class="btn-group">
				  <a href="index.php?view=newgrades&studentId=' . $studentId . '" class="btn btn-default"><span class="glyphicon glyphicon-plus-sign"></span>New</a>
				</div>';
            }
            ?>
        </form>
    </div>

</div>