<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Andraikitra
		<small><?php echo $section_title; ?></small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo site_url('admin'); ?>"><i class="fa fa-dashboard"></i> Accueil</a></li>
		<li class="active">Andraikitra</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<!-- left column -->
		<div class="col-md-6 col-md-offset-3">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title"><?php echo $section_title; ?></h3>
				</div><!-- /.box-header -->
				<!-- form start -->
				<form role="form" method="post" action="">
					<div class="box-body">
						<?php echo validation_errors(); ?>
						<?php if (isset($success) && strlen($success)) {?>
							<div class="alert-user alert alert-success alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<?php echo $success; ?>
							</div>
						<?php }?>
						
						<div class="form-group">
							<label for="anarana">Anarana</label>
							<input type="text" class="form-control" name="anarana" placeholder="Anarana" value="<?php echo set_value('anarana', (isset($anarana)) ? $anarana : ''); ?>">
						</div>
					</div><!-- /.box-body -->
					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Enregistrer</button>
						<a href="<?php echo site_url('fokotany/list/andraikitra') ?>" class="btn btn-success pull-right"><i class="fa fa-reply"></i> Retour au liste</a>
					</div>
				</form>
			</div><!-- /.box -->
		</div><!--/.col (right) -->
	</div>   <!-- /.row -->
</section><!-- /.content -->
