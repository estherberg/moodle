<div class="card-header">
    <h5>Add New Student</h5>
</div>
<div class="card-body">
    <form action="controller.php?action=add" class="form-horizontal  span9" method="post" autocomplete="off">


        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="idno">ID Number*</label>
                    <input class="form-control input-sm" id="idno" name="idno" placeholder=
                    "ID Number" type="number" value="">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="lName">LastName:*</label>
                    <input class="form-control input-sm" id="lName" name="lName"
                           placeholder="Last Name" type="text">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="fName">Firstname:*</label>
                    <input class="form-control input-sm" id="fName" name="fName"
                           placeholder="First Name" type="text">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="fName">Email:*</label>
                    <input class="form-control input-sm" id="email" name="email"
                           placeholder="Email" type="text">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select class="form-control input-sm" id="gender" name="gender">
                        <option value="M">
                            Male
                        </option>

                        <option value="F">
                            Female
                        </option>
                    </select>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for=
                           "bday">Birth Date</label>
                    <div class="input-group date form_curdate col-md-15" data-date="" data-date-format="yyyy-mm-dd"
                         data-link-field="any" data-link-format="yyyy-mm-dd">
                        <input class="form-control" size="11" type="text" value="" readonly name="bday" id="bday">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="status">Civil Status</label>
                    <select class="form-control  " id="status" name="status">
                        <option value="Single">
                            Single
                        </option>

                        <option value="Married">
                            Married
                        </option>
                    </select>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="nationality">Nationality</label>
                    <input class="form-control input-sm" id="nationality" name=
                    "nationality" placeholder="Nationality" type="text">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="home">Home</label>
                    <input class="form-control input-sm" id="home" name="home" placeholder=
                    "Home Address" type="text">
                </div>
            </div>
        </div>
        </fieldset>

        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <div class="col-md-6"></div>
                </div>

                <div class="col-md-6" style="text-align: right">
                    <button class="btn btn-default" name="submit" type="submit">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>

</div>
</div>
