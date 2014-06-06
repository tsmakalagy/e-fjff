<link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/datepicker3.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/select2/css/select2.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/select2/css/select2-bootstrap.css');?>">
<!-- iCheck for checkboxes and radio inputs -->
<link href="<?php echo base_url('assets/adminlte/css/iCheck/all.css');?>" rel="stylesheet" type="text/css" />
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Olona
		<small><?php echo $section_title; ?></small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo site_url('admin'); ?>"><i class="fa fa-dashboard"></i> Accueil</a></li>
		<li class="active">Olona</li>
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
							<label for="karapokotany">Karapokotany</label>
							<select name="karapokotany" class="form-control select-karapokotany">
								<option></option>
								<?php if (isset($karapokotanies) && count($karapokotanies)) {
									foreach ($karapokotanies as $item) {?>
										<option value="<?php echo $item->getId(); ?>"><?php echo $item->getLaharana(); ?></option>
									<?php }
								}?>
							</select>							
						</div>
						<div class="form-group">
							<label for="andraikitra">Andraikitra</label>
							<select name="andraikitra" class="form-control select-andraikitra">
								<option></option>
								<?php if (isset($andraikitras) && count($andraikitras)) {
									foreach ($andraikitras as $item) {?>
										<option value="<?php echo $item->getId(); ?>"><?php echo $item->getAnarana(); ?></option>
									<?php }
								}?>
							</select>
						</div>
						<div class="form-group">
							<label for="anarana">Anarana</label>
							<input type="text" class="form-control" name="anarana" placeholder="Anarana" value="<?php echo isset($anarana) ? $anarana : ''; ?> ">
						</div>
						<div class="form-group">
							<label for="fanampiny">Fanampiny</label>
							<input type="text" class="form-control" name="fanampiny" placeholder="Fanampiny" value="<?php echo isset($fanampiny) ? $fanampiny : ''; ?> ">
						</div>						
						<div class="form-group">
							<label for="nahaterahana">Daty nahaterahana</label>
							<input type="text" class="form-control datepicker" name="nahaterahana" placeholder="Daty nahaterahana" value="<?php echo isset($nahaterahana) ? $nahaterahana : ''; ?> ">
						</div>
						<div class="form-group">
							<label for="sex">Sexe</label>
							<label class="radio-inline">
								<input type="radio" class="form-control minimal" value="1" name="sex" checked/>
								Lehilahy
                            </label>
                            <label class="radio-inline">
								<input type="radio" class="form-control minimal" value="2" name="sex"/>
								Vehivavy
                            </label>
						</div>
						<div class="form-group">
							<label for="cin">Karapanondro</label>
							<input type="text" class="form-control" name="cin" value="<?php echo isset($cin) ? $cin : ''; ?> "  data-inputmask="'mask': ['999-999-999-999']" data-mask/>
						</div>
						<div class="form-group">
							<label for="date_cin">Nomena t@</label>
							<input type="text" class="form-control datepicker" name="date_cin" placeholder="Nomena t@" value="<?php echo isset($date_cin) ? $date_cin : ''; ?> ">
						</div>
						<div class="form-group">
							<label for="asa">Asa</label>
							<input type="text" class="form-control select-asa" name="asa" placeholder="Asa" value="<?php echo isset($asa) ? $asa : ''; ?> ">
						</div>						
					</div><!-- /.box-body -->
					<div class="box-footer">
						<button type="subselect2mit" class="btn btn-primary">Enregistrer</button>						
					</div>
				</form>
			</div><!-- /.box -->
		</div><!--/.col (right) -->
	</div>   <!-- /.row -->
</section><!-- /.content -->
<script src="<?php echo base_url('assets/select2/js/select2.min.js');?>"></script>
<script src="<?php echo base_url('assets/datepicker/js/bootstrap-datepicker.js');?>"></script>
<!-- InputMask -->
<script src="<?php echo base_url('assets/adminlte/js/plugins/input-mask/jquery.inputmask.js');?>" type="text/javascript"></script>

<script type="text/javascript">
<!--
jQuery(document).ready(function() {	
	jQuery(".select-karapokotany").select2({minimumResultsForSearch: 10, placeholder: 'Selectionner karapokotany'});
	jQuery(".select-andraikitra").select2({minimumResultsForSearch: 10, placeholder: 'Selectionner andraikitra'});
	jQuery('.datepicker').datepicker();
	//iCheck for checkbox and radio inputs
    jQuery('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal',
        radioClass: 'iradio_minimal'
    });
    $("[data-mask]").inputmask();
});
//-->
</script>