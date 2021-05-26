<?php
$id = $_GET['id'];
$course = new Course();
$result = $course->single_course($id);
?>

<div class="container">
    <div class="well">
        <h3 style="align:left">Liste des documents pour le cours <?php echo $result->COURSE_CODE ?></h3>
        <table id="example" class="table table-striped" cellspacing="0">

            <thead>
            <tr>
                <th></th>
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
                    echo '<td><a href="index.php?page=7&id=' . $result->DOC_ID . '"> Voir le document</a></td>';
                    echo '<td>' . $result->DOC_NAME . '</td>';
                    echo '</tr>';
                }
            }

            ?>
            </tbody>

        </table>

    </div>

</div>