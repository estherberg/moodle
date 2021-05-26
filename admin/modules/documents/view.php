<?php
$id = $_GET['id'];
$course = new Course();
$result = $course->single_course($id);
?>

<div class="container">
    <div class="well">
        <h3 align="left">Liste des documents pour le cours <?php echo $result->COURSE_CODE ?></h3>
        <form action="controller.php?action=delete" Method="POST">
            <table id="example" class="table table-striped" cellspacing="0">

                <thead>
                <tr>
                    <th>Cours</th>
                    <th>Nom du document</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $mydb->setQuery("SELECT *
						FROM  `course` c, `documents` d
						WHERE c.COURSE_ID = d.COURSE_ID");

                loadresult();

                function loadresult()
                {
                    global $mydb;
                    $cur = $mydb->loadResultList();

                    foreach ($cur as $result) {
                        echo '<tr>';
                        echo '<td><input type="checkbox" name="selector[]" id="selector[]" value="' . $result->DOC_ID . '"/>
				  				<a href="controller.php?action=download&id=' . $result->DOC_ID . '"> Voir le document</a></td>';

                        echo '<td>' . $result->DOC_NAME . '</td>';
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
				  <button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button>
				</div>';
            }
            ?>
        </form>
    </div><!--End of well-->

</div><!--End of container-->