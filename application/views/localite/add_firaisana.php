<link rel="stylesheet" href="<?php echo base_url('assets/css/select2.css');?>" media="screen">
<link rel="stylesheet" href="<?php echo base_url('assets/css/select2-bootstrap.css');?>" media="screen">
<div class="row">
	<div class="col-md-7 col-md-offset-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Firaisana</h3>
			</div>
			<div class="panel-body">
				<form class="form col-md-12 center-block" id="firaisanaForm" method="post" action="">
					<div class="form-group">
						<select class="form-control input-lg fivondronana-select" name="fivondronana">
						  <option selected="selected">Select Fivondronana</option>
						  <option>2</option>
						  <option>3</option>
						  <option>4</option>
						  <option>5</option>
						</select>
					</div>
					<div class="form-group">
						<input type="text" name="name" class="form-control input-lg" placeholder="Name">
					</div>
					<div class="form-group">
						<textarea name="slogan" class="form-control input-lg" placeholder="Slogan"></textarea>
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
<script type="text/javascript">
$(function() {
	$(".fivondronana-select").select2({minimumResultsForSearch: 10});
});
</script>