<html lang="en">
	<head>
		<title><?php echo $title; ?></title>
		<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="resource-type" content="document" />
		<meta name="robots" content="all, index, follow"/>
		<meta name="googlebot" content="all, index, follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<?php

	if(!empty($meta))
	foreach($meta as $name=>$content){
		echo "\n\t\t";
		?><meta name="<?php echo $name; ?>" content="<?php echo $content; ?>" /><?php
			 }
	echo "\n";

	if(!empty($canonical))
	{
		echo "\n\t\t";
		?><link rel="canonical" href="<?php echo $canonical?>" /><?php

	}
	echo "\n\t";

	foreach($css as $file){
	 	echo "\n\t\t";
		?><link rel="stylesheet" href="<?php echo $file; ?>" type="text/css" /><?php
	} echo "\n\t";

	 foreach($js as $file){
			echo "\n\t\t";
			?><script src="<?php echo $file; ?>"></script><?php
	 } echo "\n\t";
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

</head>
<body>

	<div id="wrapper">

			<!-- Navigation -->
			<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="index.html">SB Admin</a>
					</div>
					<!-- Top Menu Items -->
					<ul class="nav navbar-right top-nav">
							<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
									<ul class="dropdown-menu alert-dropdown">
											<li>
													<a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
											</li>
											<li class="divider"></li>
											<li>
													<a href="<?php echo site_url("user/notification"); ?>">View All</a>
											</li>
									</ul>
							</li>
							<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
									<ul class="dropdown-menu">
											<li>
													<a href="<?php echo site_url("user/profile"); ?>"><i class="fa fa-fw fa-user"></i> Profile</a>
											</li>
											<li>
													<a href="<?php echo site_url("user/settings"); ?>"><i class="fa fa-fw fa-gear"></i> Settings</a>
											</li>
											<li class="divider"></li>
											<li>
													<a href="<?php echo site_url("user/logout") ?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
											</li>
									</ul>
							</li>
					</ul>
					<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
					<div class="collapse navbar-collapse navbar-ex1-collapse">
							<ul class="nav navbar-nav side-nav">
									<li <?php echo $active == "dashboard" ? "class='active'" : "" ?> >
											<a href="<?php echo site_url("user/dashboard"); ?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
									</li>
									<li <?php echo $active == "newtask" ? "class='active'" : "" ?> >
											<a href="<?php echo site_url("user/newtask"); ?>"><i class="fa fa-fw fa-plus"></i> Create Task</a>
									</li>
									<li <?php echo $active == "viewtask" ? "class='active'" : "" ?>>
											<a href="<?php echo site_url("user/viewtask"); ?>"><i class="fa fa-fw fa-tasks"></i> Task List</a>
									</li>
							</ul>
					</div>
					<!-- /.navbar-collapse -->
			</nav>

			<div id="page-wrapper">

					<div class="container-fluid">

							<!-- Page Heading -->
							<div class="row">
									<div class="col-lg-12">
											<ol class="breadcrumb">
													<li class="active">
															<i class="fa fa-dashboard"></i> Dashboard
													</li>
											</ol>
											<h1 class="page-header">
													<?php echo $headTitle ?> <small><?php echo $subTitle ?></small>
											</h1>
									</div>
							</div>
							<div id="dascontent">
							  <?php echo $output;?>
							</div>

					</div>
					<!-- /.container-fluid -->

			</div>
			<!-- /#page-wrapper -->

	</div>



</body>
</html>
