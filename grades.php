<div class="container" style="margin-top: 90px">
    <caption><h3 align="left">Mes notes</h3></caption>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Matière</th>
            <th>Note 1</th>
            <th>Note 2</th>
            <th>Moyenne</th>
            <th>Statut</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $mydb->setQuery("
                        SELECT *
						FROM  `grades` g, `student` s, `course` c
						WHERE g.S_ID = s.S_ID AND g.COURSE_ID = c.COURSE_ID
                        AND g.S_ID=" . $_SESSION['S_ID']);

        $cur = $mydb->loadResultList();
        foreach ($cur as $result) {
            echo '<tr>';
            echo '<td>' . $result->COURSE_CODE . '</td>';
            echo '<td>' . $result->FIRST . '</td>';
            echo '<td>' . $result->SECOND . '</td>';
            echo '<td>' . $result->AVE . '</td>';
            echo '<td>' . $result->REMARKS . '</td>';
            echo '</tr>';
        }
        ?>
        </tbody>
        <tfoot>
        <tr>
            <td></td>
            <td></td>
        </tr>
        </tfoot>
    </table>

</div>

</div>