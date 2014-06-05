<link rel="stylesheet" href="<?php echo base_url('assets/select2/css/select2.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/select2/css/select2-bootstrap.css');?>">
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Birao
		<small><?php echo $section_title; ?></small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo site_url('admin'); ?>"><i class="fa fa-dashboard"></i> Accueil</a></li>
		<li class="active">Birao</li>
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
						<?php if (isset($name) && isset($district)) {?>
							<input type="hidden" class="fkt_name" value="<?php echo $name ?>"/>
							<input type="hidden" class="fkt_district" value="<?php echo $district ?>"/>
						<?php } ?>
						<div class="form-group">
							<label for="fokotany">Fokotany</label>
							<input type="text" class="form-control select-fokotany" name="fokotany" placeholder="Fokotany" value="<?php echo set_value('fokotany', (isset($fokotany)) ? $fokotany : ''); ?> ">
						</div>
						<div class="form-group">
							<label for="address">Adiresy</label>
							<input type="text" class="form-control" name="address" placeholder="Adiresy" value="<?php echo set_value('address', (isset($address)) ? $address : ''); ?> ">
						</div>
						<div class="form-group">
							<label for="phone">Finday</label>
							<input type="text" class="form-control" name="phone" placeholder="Finday" value="<?php echo set_value('phone', (isset($phone)) ? $phone : ''); ?> ">
						</div>
					</div><!-- /.box-body -->
					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Enregistrer</button>						
					</div>
				</form>
			</div><!-- /.box -->
		</div><!--/.col (right) -->
	</div>   <!-- /.row -->
</section><!-- /.content -->
<script src="<?php echo base_url('assets/select2/js/select2.min.js');?>"></script>
<script type="text/javascript">
<!--
var fokotany_url = "<?php echo site_url('fokotany/ajax'); ?>";
function format(item) { return item.text + ' - <strong>' + item.district + '</strong>'; };

jQuery(document).ready(function() {
	var fokotany_opts = {};
	
	fokotany_opts = {
		placeholder: "Rechercher fokotany",
		minimumInputLength: 2,
		ajax: {
			url: fokotany_url,
			dataType: 'json',
			quietMillis: 100,
			data: function (term, page) {
				return {
					q: term, // search term
				};
			},
			results: function (data, page) { 
				return {results: data};
			}
		},
		formatSelection: format,
		formatResult: format
	};
	if (jQuery('.fkt_name').length > 0 && jQuery('.fkt_district').length > 0) {
		fokotany_opts.initSelection = function (element, callback) {
	    	var data = {id: element.val(), text: jQuery('.fkt_name').val(), district: jQuery('.fkt_district').val()};
	    	callback(data);
		}; 
	} 
	jQuery(".select-fokotany").data("s3opts", fokotany_opts).select2(fokotany_opts);
});
//-->
</script>
