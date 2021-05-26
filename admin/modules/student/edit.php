<?php

$student = new Student();
$cur = $student->single_student($_GET['id']);
?>
<form class="form-horizontal well span9" action="controller.php?action=edit&id=<?php echo $cur->S_ID; ?>" method="POST">

    <fieldset>
        <legend>Edit Student</legend>


        <div class="col-md-4">
            <div class="form-group">
                <label>ID Number*</label>
                <input class="form-control input-sm" id="idno" name="idno" placeholder=
                "ID Number" type="text" value="<?php echo $cur->S_ID; ?>" readonly>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for=
                           "lName">LastName:*</label>
                    <input class="form-control input-sm" id="lName" name="lName" type=
                    "text" placeholder="Last Name" value="<?php echo $cur->LNAME; ?>">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for=
                           "fName">Firstname:*</label>
                    <input class="form-control input-sm" id="fName" name="fName" type=
                    "text" placeholder="First Name" value="<?php echo $cur->FNAME; ?>">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for=
                           "fName">Email:*</label>
                    <input class="form-control input-sm" id="email" name="email" type=
                    "text" placeholder="Email" value="<?php echo $cur->EMAIL; ?>">
                </div>
            </div>

        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for=
                               "gender">Gender </label>
                        <select class="form-control input-sm" name="gender" id="gender">
                            <option value="<?php echo $cur->SEX; ?>"><?php echo $cur->SEX; ?></option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for=
                               "bday">Birth Date</label>
                        <div class="input-group date form_curdate col-md-15" data-date="" data-date-format="yyyy-mm-dd"
                             data-link-field="any" data-link-format="yyyy-mm-dd">
                            <input class="form-control" size="11" type="text" value="<?php echo $cur->BDAY; ?>" readonly
                                   name="bday" id="bday">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for=
                           "status">Civil Status </label>
                    <select class="form-control input-sm" name="status" id="status">
                        <option value="<?php echo $cur->STATUS; ?>"><?php echo $cur->STATUS; ?></option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                    </select>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for=
                           "nationality">Nationality</label>
                    <input class="form-control input-sm" id="nationality" name="nationality" type=
                    "text" placeholder="Nationality" value="<?php echo $cur->NATIONALITY; ?>">
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-md-4">
                <div class="form-group">
                    <label for=
                           "contact">Contact </label>
                    <input class="form-control input-sm" id="contact" name="contact" type="text"
                           placeholder="Contact Number" value="<?php echo $cur->CONTACT_NO; ?>">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for=
                           "email">Email*</label>
                    <input class="form-control input-sm" id="email" name="email" type=
                    "email" placeholder="Email address" value="<?php echo $cur->EMAIL; ?>">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label>Home </label>
                    <input class="form-control input-sm" id="home" name="home" type=
                    "text" placeholder="Home Address" value="<?php echo $cur->HOME_ADD; ?>">
                </div>
            </div>


        </div>


    </fieldset>

    <?php
    if ($_SESSION['ACCOUNT_TYPE'] == 'Administrator') {
        echo '
		              <div class="col-md-6" align="right">
		               <button class="btn btn-primary" name="submit" type="submit" >Save</button>

		               </div>';
    } ?>

</form>

</div>
			
