<link rel="stylesheet" href="<?php echo base_url('assets/css/select2.css');?>" media="screen">
<link rel="stylesheet" href="<?php echo base_url('assets/css/select2-bootstrap.css');?>" media="screen">
<link rel="stylesheet" href="<?php echo base_url('assets/css/datepicker3.css');?>" media="screen">
<div class="row">
	<div class="col-md-7 col-md-offset-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Karatra</h3>
			</div>
			<div class="panel-body">
				<form class="form col-md-12 center-block" id="olonaForm" method="post" action="">
					<div class="form-group">
						<select class="form-control input-lg karatra-select" name="karatra">
						  <option selected="selected">Kara-pokotany</option>
						  <option>2</option>
						  <option>3</option>
						  <option>4</option>
						  <option>5</option>
						</select>
					</div>
					<div class="form-group">
						<select class="form-control input-lg andraikitra-select" name="andraikitra">
						  <option selected="selected">Andraikitra</option>
						  <option>2</option>
						  <option>3</option>
						  <option>4</option>
						  <option>5</option>
						</select>
					</div>
					<div class="form-group">
						<input type="text" name="anarana" class="form-control input-lg" placeholder="Anarana">
					</div>
					<div class="form-group">
						<input type="text" name="fanampiny" class="form-control input-lg" placeholder="Fanampiny">
					</div>
					<div class="form-group">
						<input type="text" name="date_naissance" class="form-control input-lg datepicker" placeholder="Daty nahaterahana">
					</div>
					<div class="form-group">
						<select class="form-control input-lg velona-select" name="velona">
						  <option value="1">Velona</option>
						  <option value="0">Maty</option>
						</select>
					</div>
					<div class="form-group">
						<select class="form-control input-lg sex-select" name="sex">
						  <option value="1">Lahy</option>
						  <option value="0">Vavy</option>
						</select>
					</div>
					<div class="form-group">
						<input type="text" name="cin" class="form-control input-lg" placeholder="CIN">
					</div>
					<div class="form-group">
						<input type="text" name="date_cin" class="form-control input-lg datepicker" placeholder="Daty CIN">
					</div>
					<div class="form-group">
						<input type="text" name="asa" class="form-control input-lg" placeholder="Asa">
					</div>
					<div class="form-group">
						<button class="btn btn-primary btn-lg btn-block btn-login" type="submit" data-loading-text="Loading...">Save</button>              
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script src="<?php echo base_url('assets/js/select2.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-datepicker.js');?>"></script>
<script type="text/javascript">
$(function() {
	$(".karatra-select").select2({minimumResultsForSearch: 10});
	$(".andraikitra-select").select2({minimumResultsForSearch: 10});
	$(".velona-select").select2({minimumResultsForSearch: 10});
	$(".sex-select").select2({minimumResultsForSearch: 10});
	$(".datepicker").datepicker();
});
</script>