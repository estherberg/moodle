<div class="container">
    <div class="well">
        <h3 align="left">Documents</h3>
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
				  				<a href="index.php?page=6&id=' . $result->COURSE_ID . '">' . $result->COURSE_CODE . '</a></td>';

                    echo '<td>' . $result->nb . '</td>';
                    echo '</tr>';
                }
            }

            ?>
            </tbody>

        </table>
    </div>

</div>