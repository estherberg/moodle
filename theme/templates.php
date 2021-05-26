<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>
        Projet Moodle
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'/>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="<?php echo WEB_ROOT; ?>plugins/assets/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="<?php echo WEB_ROOT; ?>plugins/assets/css/now-ui-dashboard.css?v=1.3.0" rel="stylesheet"/>
    <link href="<?php echo WEB_ROOT; ?>css/dataTables.bootstrap.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT; ?>css/jquery.dataTables.css">
</head>
<style type="text/css">
    table {
        font-size: 9px;
    }

    table tr td {
        font-size: 12px;
    }
</style>
<?php
studconfirm_logged_in();

?>
</h
<body class="">
<div class="wrapper ">
    <div class="sidebar" data-color="orange">
        <div class="logo" style="text-align: center;">
            <a href="<?php echo WEB_ROOT; ?>index.php" class="simple-text logo-normal">
                Projet Moodle
            </a>
        </div>
        <div class="sidebar-wrapper" id="sidebar-wrapper">
            <ul class="nav">
                <li class="<?php echo (currentpage_student() == 'index.php') ? "active" : false; ?>">
                    <a href="<?php echo WEB_ROOT; ?>index.php">
                        <i class="now-ui-icons design_app"></i>
                        <p>Accueil</p>
                    </a></li>
                <li class="<?php echo (currentpage_student() == 'index.php?page=2') ? "active" : false; ?>">
                    <a href="<?php echo WEB_ROOT; ?>index.php?page=2">
                        <i class="now-ui-icons business_badge"></i>
                        <p>Mes informations</p>
                    </a>
                </li>
                <li class="<?php echo (currentpage_student() == 'index.php?page=3') ? "active" : false; ?>">
                    <a href="<?php echo WEB_ROOT; ?>index.php?page=3">
                        <i class="now-ui-icons education_agenda-bookmark"></i>
                        <p>Notes</p>
                    </a>
                </li>
                <li class="<?php echo (currentpage_student() == 'index.php?page=5') ? "active" : false; ?>">
                    <a href="<?php echo WEB_ROOT; ?>index.php?page=5">
                        <i class="now-ui-icons education_agenda-bookmark"></i>
                        <p>Documents</p>
                    </a>
                </li>
                <li><a href="<?php echo WEB_ROOT; ?>logout.php">Logout</a></li>

            </ul>
        </div>
    </div>
    <div class="main-panel" id="main-panel">
        <div class="panel-header panel-header-sm">
        </div>
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="container">
                            <?php check_message(); ?>
                            <?php require_once $content; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script src="<?php echo WEB_ROOT; ?>plugins/assets/js/core/jquery.min.js"></script>
<script src="<?php echo WEB_ROOT; ?>plugins/assets/js/core/popper.min.js"></script>
<script src="<?php echo WEB_ROOT; ?>plugins/assets/js/core/bootstrap.min.js"></script>
<script src="<?php echo WEB_ROOT; ?>plugins/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<script src="<?php echo WEB_ROOT; ?>plugins/assets/js/plugins/chartjs.min.js"></script>
<script src="<?php echo WEB_ROOT; ?>plugins/assets/js/plugins/bootstrap-notify.js"></script>
<script src="<?php echo WEB_ROOT; ?>plugins/assets/js/now-ui-dashboard.min.js?v=1.3.0" type="text/javascript"></script>
<script type="text/javascript" language="javascript" src="<?php echo WEB_ROOT; ?>js/jquery.dataTables.js"></script>

</body>

</html>