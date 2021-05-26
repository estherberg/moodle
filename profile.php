<div class="container" style="margin-top: 90px">
    <div class="container">
        <?php
        check_message();

        ?>
        <div class="wellss">
            <?php

            $student = new Student();
            $cur = $student->single_student($_SESSION['S_ID']);
            ?>

            <fieldset>
                <legend>Student Information</legend>
                <table class="table table-bordered" cellspacing="0">
                    <tr>
                        <td>ID Number :</td>
                        <td width="80%"><?php echo $cur->S_ID; ?></td>
                    </tr>
                    <td>Fullname :</td>
                    <td><?php echo $cur->LNAME . ', ' . $cur->FNAME; ?></td>
                    </tr></tr>
                    <td>Gender :</td>
                    <td><?php
                        if ($cur->SEX == 'F') {
                            echo "Female";
                        } else {
                            echo "Male";
                        }
                        ?></td>
                    </tr>
                    <td>Birth Date :</td>
                    <td><?php echo $cur->BDAY; ?></td>
                    </tr>
                    <td>Civil Status :</td>
                    <td><?php echo $cur->STATUS; ?></td>
                    </tr>
                    <td>Nationality :</td>
                    <td><?php echo $cur->NATIONALITY; ?></td>
                    </tr>
                    <td>Email Address :</td>
                    <td><?php echo $cur->EMAIL; ?></td>
                    </tr>
                    <td>Home Address :</td>
                    <td><?php echo $cur->HOME_ADD; ?></td>
                    </tr>

                    </tr>
                </table>


            </fieldset>

            </fieldset>


        </div>

    </div>