<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="quick-contact-form bg-white">
                    <h2>Login Information</h2>
                    <hr/>
                    <span class="fa fa-user"> </span> <label><?Php echo $_SESSION['FNAME']; ?></label><br/>
                    <span class="fa fa-cog"> </span> <label><?Php echo $_SESSION['LNAME']; ?></label><br/>
                    <hr/>
                    <div class="form-group">
                        <a href="logout.php" class="btn btn-primary px-5">Logout <span class="fa fa-log-out"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>