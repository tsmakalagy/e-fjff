<link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/datepicker3.css');?>">
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
						<?php if (isset($b) && isset($n)) {?>
							<input type="hidden" class="birao_id" value="<?php echo $birao ?>"/>
							<input type="hidden" class="birao_name" value="<?php echo $b['name'] ?>"/>
							<input type="hidden" class="niaviana_name" value="<?php echo $n['name'] ?>"/>
							<input type="hidden" class="niaviana_district" value="<?php echo $n['district'] ?>"/>
						<?php } ?>
						<?php if (isset($biraos) && count($biraos)) {?>
						<div class="form-group">
							<label for="birao">Birao</label>
							<select name="birao" class="form-control select-birao">
								<option></option>
									<?php		
									foreach ($biraos as $item) {?>
										<option value="<?php echo $item['id']; ?>"><?php echo $item['fokotany']; ?></option>
									<?php }?>									
							</select>							
						</div>
						<?php }?>						
						<div class="form-group">
							<label for="niaviana">Fokotany niaviana</label>
							<input type="text" class="form-control select-niaviana" name="niaviana" placeholder="Selectionner niaviana" value="<?php echo set_value('niaviana', (isset($niaviana)) ? $niaviana : ''); ?>">
						</div>
						<div class="form-group">
							<label for="laharana">Laharana</label>
							<input type="text" class="form-control" name="laharana" placeholder="Laharana" value="<?php echo set_value('laharana', (isset($laharana)) ? $laharana : ''); ?>">
						</div>
						<div class="form-group">
							<label for="faritra">Faritra</label>
							<input type="text" class="form-control" name="faritra" placeholder="Faritra" value="<?php echo set_value('faritra', (isset($faritra)) ? $faritra : ''); ?>">
						</div>
						<div class="form-group">
							<label for="nahatongavana">Daty nahatongavana</label>
							<input type="text" class="form-control datepicker" name="nahatongavana" placeholder="Daty nahatongavana" value="<?php echo set_value('nahatongavana', (isset($nahatongavana)) ? $nahatongavana : ''); ?> ">
						</div>
						<div class="form-group">
							<label for="address">Adiresy</label>
							<input type="text" class="form-control" name="address" placeholder="Adiresy" value="<?php echo set_value('address', (isset($address)) ? $address : ''); ?> ">
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
<script type="text/javascript">
<!--
var birao_url = "<?php echo site_url('fokotany/birao/ajax'); ?>";
var fokotany_url = "<?php echo site_url('fokotany/ajax'); ?>";
function format(item) { return item.text; };
function formatFokotany(item) { return item.text + ' - <strong>' + item.district + '</strong>'; };

$(document).ready(function() {
	var birao_opts = {};	
	
	birao_opts = {
		minimumResultsForSearch: 10,
		allowClear: true, 
		placeholder: 'Selectionner birao'
	};
	var selectBirao = $(".select-birao").data("s3opts", birao_opts).select2(birao_opts);
	if ($('.birao_name').length > 0) {
		var data = {id: $('.birao_id').val(), text: $('.birao_name').val()};
		$(".select-birao").select2("data", data);
	} 
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
		formatSelection: formatFokotany,
		formatResult: formatFokotany
	};
	if ($('.niaviana_name').length > 0 && $('.niaviana_district').length > 0) {
		fokotany_opts.initSelection = function (element, callback) {
	    	var data = {id: element.val(), text: $('.niaviana_name').val(), district: $('.niaviana_district').val()};
	    	callback(data);
		}; 
	} 
	$(".select-niaviana").data("s3opts", fokotany_opts).select2(fokotany_opts);
	$('.datepicker').datepicker();
});
//-->
</script>