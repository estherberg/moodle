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
    <link href="<?php echo WEB_ROOT; ?>css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
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
confirm_logged_in();

?>
</h
<body class="">
<div class="wrapper ">
    <div class="sidebar" data-color="orange">
        <div class="logo" style="text-align: center;">
            <a href="<?php echo WEB_ROOT; ?>admin/index.php" class="simple-text logo-normal">
                Projet Moodle
            </a>
        </div>
        <div class="sidebar-wrapper" id="sidebar-wrapper">
            <ul class="nav">
                <li class="<?php echo (currentpage_admin() == '') ? "active" : false; ?>"><a
                            href="<?php echo WEB_ROOT; ?>admin/index.php">
                        <i class="now-ui-icons design_app"></i>
                        <p>Accueil</p>
                    </a></li>
                <?php if ($_SESSION['ACCOUNT_TYPE'] == 'Administrator' || $_SESSION['ACCOUNT_TYPE'] == 'Teacher') {
                    ?>
                    <li class="<?php echo (currentpage_admin() == 'student') ? "active" : false; ?>">
                        <a href="<?php echo WEB_ROOT; ?>admin/modules/student/index.php">
                            <i class="now-ui-icons business_badge"></i>
                            <p>Etudiants</p>
                        </a>
                    </li>
                    <li class="<?php echo (currentpage_admin() == 'course') ? "active" : false; ?>">
                        <a href="<?php echo WEB_ROOT; ?>admin/modules/course/index.php">
                            <i class="now-ui-icons education_agenda-bookmark"></i>
                            <p>Matières</p>
                        </a>
                    </li>
                    <li class="<?php echo (currentpage_admin() == 'documents') ? "active" : false; ?>">
                        <a href="<?php echo WEB_ROOT; ?>admin/modules/documents/index.php">
                            <i class="now-ui-icons business_chart-bar-32"></i>
                            <p>Documents</p>
                        </a>
                    </li>
                    <li class="<?php echo (currentpage_admin() == 'teacher') ? "active" : false; ?>">
                        <a href="<?php echo WEB_ROOT; ?>admin/modules/teacher/index.php">
                            <i class="now-ui-icons users_circle-08"></i>
                            <p>Professeurs</p>
                        </a>
                    </li>

                    <?php
                } ?>

                <?php if ($_SESSION['ACCOUNT_TYPE'] == 'Administrator') {
                    ?>
                    <li class="<?php echo (currentpage_admin() == 'user') ? "active" : false; ?>">
                        <a href="<?php echo WEB_ROOT; ?>admin/modules/user/index.php">
                            <i class="now-ui-icons users_single-02"></i>
                            <p>Utilisateurs</p>
                        </a>
                    </li>
                    <?php
                } ?>
                <!-- <li><a href="<?php echo WEB_ROOT; ?>admin/logout.php">Logout</a></li>  -->

            </ul>
        </div>
    </div>
    <div class="main-panel" id="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-toggle">
                        <button type="button" class="navbar-toggler">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </button>
                    </div>
                    <a class="navbar-brand" href="#pablo">Projet Moodle</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <i class="now-ui-icons users_single-02"></i>
                                <p>
                                    <span class="d-lg-none d-md-block"><?Php echo $_SESSION['ACCOUNT_NAME']; ?></span>
                                </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <?php if ($_SESSION['ACCOUNT_TYPE'] == 'Teacher') { ?>
                                    <a href="<?php echo WEB_ROOT; ?>admin/modules/inst_front/index.php?view=prof">
                                        Profile
                                    </a>

                                <?php } ?>
                                <a class="dropdown-item" href="<?php echo WEB_ROOT; ?>admin/logout.php">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
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
<script type="text/javascript" src="<?php echo WEB_ROOT; ?>js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo WEB_ROOT; ?>js/locales/bootstrap-datetimepicker.uk.js"
        charset="UTF-8"></script>

<script type="text/javascript">
    $('.form_curdate').datetimepicker({
        language: 'en',
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
    $('.form_bdatess').datetimepicker({
        language: 'en',
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
</script>
<script>
    function calculate() {

        var first = document.getElementById('first').value;
        var second = document.getElementById('second').value;

        var totalVal = parseInt(first) + parseInt(second);
        document.getElementById('finalave').value = totalVal;
        document.getElementById('finalave').value = Math.round((parseInt(totalVal) / 2));
    }
</script>

<script type="text/javascript" charset="utf-8">
    $(document).ready(function () {
        var t = $('#example').DataTable({
            "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": 1
            }],
            "order": [[3, 'asc']]
        });

        t.on('order.dt search.dt', function () {
            t.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();
    });
</script>
</body>

</html>