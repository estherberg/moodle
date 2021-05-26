<form class="form-horizontal well span4" action="controller.php?action=add" method="POST">

    <fieldset>
        <legend>Nouveau cours</legend>


        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for=
                "coursecode">Course Code</label>

                <div class="col-md-8">
                    <input class="form-control input-sm" id="coursecode" name="coursecode" placeholder=
                    "Course Code" type="text" value="">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for=
                "coursedesc">Course Description</label>

                <div class="col-md-8">
                    <input class="form-control input-sm" id="coursedesc" name="coursedesc" placeholder=
                    "Course Description" type="text" value="">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8">
                <div class="col-md-8">
                    <button class="btn btn-default" name="savecourse" type="submit"><span
                                class="glyphicon glyphicon-floppy-save"></span> Save
                    </button>
                </div>
            </div>
        </div>


    </fieldset>


</form>
</div>