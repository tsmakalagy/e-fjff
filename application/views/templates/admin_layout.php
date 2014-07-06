<!-- header logo: style can be found in header.less -->
<header class="header">
	<a href="<?php echo site_url("/"); ?>" class="logo">
		<!-- Add the class icon to your logo image or logo icon to add the margining -->
		F J F F
	</a>
	<!-- Header Navbar: style can be found in header.less -->
	<nav class="navbar navbar-static-top" role="navigation">
		<!-- Sidebar toggle button-->
		<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</a>
		<div class="navbar-right">
			<ul class="nav navbar-nav">
				<!-- User Account: style can be found in dropdown.less -->
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="glyphicon glyphicon-user"></i>
						<span><?php echo display_name(); ?> <i class="caret"></i></span>
					</a>
					<ul class="dropdown-menu">
						<li class="user-footer">
							<div class="pull-left">
								<a href="#" class="btn btn-default btn-flat">Profil</a>
							</div>
							<div class="pull-right">
								<a href="<?php echo site_url('user/logout'); ?>" class="btn btn-default btn-flat">D&eacute;connecter</a>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
</header>

<div class="wrapper row-offcanvas row-offcanvas-left">
	<!-- Left side column. contains the logo and sidebar -->
	<aside class="left-side sidebar-offcanvas">
		<!-- sidebar: style can be found in sidebar.less -->
		<section class="sidebar">
			<!-- search form -->
			<form action="#" method="get" class="sidebar-form">
				<div class="input-group">
					<input type="text" name="q" class="form-control" placeholder="Recherche..."/>
					<span class="input-group-btn">
						<button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
					</span>
				</div>
			</form>
			<!-- /.search form -->
			<!-- sidebar menu: : style can be found in sidebar.less -->
			<ul class="sidebar-menu">
				<li class="active">
					<a href="<?php echo site_url('admin'); ?>">
						<i class="fa fa-dashboard"></i> <span>Tableau de bord</span>
					</a>
				</li>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-home"></i>
						<span>Eglise</span>
						<i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?php echo site_url('eglise/add'); ?>"><i class="fa fa-plus"></i> Ajouter Eglise</a></li>
						<li><a href="<?php echo site_url('eglise/list'); ?>"><i class="fa fa-list"></i> Lister Eglise</a></li>
					</ul>
				</li>	
				<li class="treeview">
					<a href="#">
						<i class="fa fa-user"></i>
						<span>Pasteur</span>
						<i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?php echo site_url('pasteur/add'); ?>"><i class="fa fa-plus"></i> Ajouter Pasteur</a></li>
						<li><a href="<?php echo site_url('pasteur/list'); ?>"><i class="fa fa-list"></i> Lister Pasteur</a></li>
					</ul>
				</li>				
			</ul>
		</section>
		<!-- /.sidebar -->
	</aside>
	
	 <!-- Right side column. Contains the navbar and content of the page -->
	 <aside class="right-side">
	 	<?php echo $content; ?>
	 </aside><!-- /.right-side -->
</div><!-- ./wrapper -->

<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/adminlte/js/AdminLTE/app.js');?>" type="text/javascript"></script>