<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href= "<?= base_url()?>assets/admin/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href= "<?= base_url()?>assets/admin/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Ayo Banyuwangi | Admin </title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href= "<?= base_url()?>assets/admin/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href= "<?= base_url()?>assets/admin/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href= "<?= base_url()?>assets/admin/css/paper-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href= "<?= base_url()?>assets/admin/css/demo.css" rel="stylesheet" />


    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href= "<?= base_url()?>assets/admin/css/themify-icons.css" rel="stylesheet">

    <!--   Core JS Files   -->
    <script src= "<?= base_url()?>assets/js/jquery-1.11.2.min.js" type="text/javascript"></script>
	<script src= "<?= base_url()?>assets/admin/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src= "<?= base_url()?>assets/admin/js/bootstrap-checkbox-radio.js"></script>

	<!--  Charts Plugin -->
	<script src= "<?= base_url()?>assets/admin/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src= "<?= base_url()?>assets/admin/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src= "<?= base_url()?>assets/admin/js/paper-dashboard.js"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src= "<?= base_url()?>assets/admin/js/demo.js"></script>
    <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="info">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    Ayo Banyuwangi
                </a>
            </div>

            <ul class="nav">
                <li <?php if($this->uri->segment(1) == 'Dashboard'){echo 'class="active"';} ?>>
                    <a href="dashboard.html">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li <?php if($this->uri->segment(1) == 'product'){echo 'class="active"';} ?>>
                    <a href="<?= base_url()?>product">
                        <i class="ti-user"></i>
                        <p>Product</p>
                    </a>
                </li>
                <li <?php if($this->uri->segment(1) == 'Dashboard'){echo 'class="active"';} ?>>
                    <a href="table.html">
                        <i class="ti-view-list-alt"></i>
                        <p>Table List</p>
                    </a>
                </li>
                <li <?php if($this->uri->segment(1) == 'Dashboard'){echo 'class="active"';} ?>>
                    <a href="typography.html">
                        <i class="ti-text"></i>
                        <p>Typography</p>
                    </a>
                </li>
                <li <?php if($this->uri->segment(1) == 'Dashboard'){echo 'class="active"';} ?>>
                    <a href="icons.html">
                        <i class="ti-pencil-alt2"></i>
                        <p>Icons</p>
                    </a>
                </li>
                <li <?php if($this->uri->segment(1) == 'Dashboard'){echo 'class="active"';} ?>>
                    <a href="maps.html">
                        <i class="ti-map"></i>
                        <p>Maps</p>
                    </a>
                </li>
                <li <?php if($this->uri->segment(1) == 'Dashboard'){echo 'class="active"';} ?>>
                    <a href="notifications.html">
                        <i class="ti-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-settings"></i>
									<p>Settings</p>
									<b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Profile</a></li>
                                <li><a href="#">Logout</a></li>
                              </ul>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>


        <div class="content">
            <?= $content; ?>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, Ayo Banyuwangi
                </div>
            </div>
        </footer>

    </div>
</div>


</body>
</html>
