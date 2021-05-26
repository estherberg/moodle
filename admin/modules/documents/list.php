<div class="container">
    <div class="well">
        <h3 align="left">Documents</h3>
        <form action="controller.php?action=delete" Method="POST">
            <table id="example" class="table table-striped" cellspacing="0">

                <thead>
                <tr>
                    <th>Cours</th>
                    <th>Nombre de documents</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $mydb->setQuery("SELECT c.COURSE_ID, c.COURSE_CODE, COUNT(DOC_ID) nb
						FROM  `course` c, `documents` d
						WHERE c.COURSE_ID = d.COURSE_ID
                        GROUP BY c.COURSE_ID
						ORDER BY c.COURSE_CODE");

                loadresult();

                function loadresult()
                {
                    global $mydb;
                    $cur = $mydb->loadResultList();

                    foreach ($cur as $result) {
                        echo '<tr>';
                        echo '<td>
				  				<a href="index.php?view=view&id=' . $result->COURSE_ID . '">' . $result->COURSE_CODE . '</a></td>';

                        echo '<td>' . $result->nb . '</td>';
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
				  <a href="index.php?view=add" class="btn btn-default"><span class="glyphicon glyphicon-plus-sign"></span>New</a>
				</div>';
            }
            ?>
        </form>
    </div><!--End of well-->

</div><!--End of container-->