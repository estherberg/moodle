<form class="form-horizontal well span6" action="controller.php?action=add" method="POST" enctype="multipart/form-data">

    <fieldset>
        <legend>Nouveau document</legend>

        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for=
                "cours">Cours:</label>

                <div class="col-md-8">
                    <select class="form-control input-sm" name="cours" id="cours">
                        <?php
                        $mydb->setQuery("SELECT * FROM course");
                        loadresult();

                        function loadresult()
                        {
                            global $mydb;
                            $cur = $mydb->loadResultlist();
                            foreach ($cur as $result) {
                                echo "<option value='" . $result->COURSE_ID . "'>" . $result->COURSE_CODE . "</option>";
                            }
                        }

                        ?>
                    </select>
                </div>
            </div>
        </div>

        <input type="file" name="myfile">

        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for=
                "idno"></label>

                <div class="col-md-8">
                    <button class="btn btn-default" name="savedocument" type="submit"><span
                                class="glyphicon glyphicon-floppy-save"></span> Save
                    </button>
                </div>
            </div>
        </div>


    </fieldset>


</form>

</div>