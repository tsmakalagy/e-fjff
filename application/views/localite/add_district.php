<link rel="stylesheet" href="<?php echo base_url('assets/css/select2.css');?>" media="screen">
<link rel="stylesheet" href="<?php echo base_url('assets/css/select2-bootstrap.css');?>" media="screen">
<div class="row">
	<div class="col-md-7 col-md-offset-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">District</h3>
			</div>
			<div class="panel-body">
				<form class="form col-md-12 center-block" id="districtForm" method="post" action="<?php echo site_url("localite/district/save"); ?>">
					<div class="form-group">
                    <?php echo validation_errors(); ?>
                    <?php if(isset($return)){?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Insertion success
                        </div>
                    <?php } ?>
						<select class="form-control input-lg region-select" name="region">
                          <?php 
                          if(isset($region) && count($region)>0){
                          foreach($region as $item){  
                            ?>
                                <option value="<?php echo $item->getId(); ?>"><?php echo $item->getAnarana(); ?></option>
                          <?php 
                            }
                          } ?>
						 
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
