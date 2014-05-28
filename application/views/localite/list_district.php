<link rel="stylesheet" href="<?php echo base_url('assets/css/select2.css');?>" media="screen">
<link rel="stylesheet" href="<?php echo base_url('assets/css/select2-bootstrap.css');?>" media="screen">
<div class="row">
	<div class="col-md-7 col-md-offset-3">
        <h3 class="title-table">List District<span class="pull-right"><a href="#" class="add-district" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i></a></span></h3>
        <table class="table table-hover table-bordered" id="listDistrict">
            <thead>
                <th>Anarana</th><th>Slogan</th>
            </thead>
            <tbody>
            <?php if (isset($district) && count($district) > 0) {
                foreach ($district as $item) {
                ?>
                <tr><td><?php echo $item->getAnarana();?></td><td><?php echo ($item->getSlogan()!="")?$item->getSlogan():"-" ;?></td></tr>
            <?php
                } 
            } ?>
            </tbody>
        </table>
    </div><!-- /col-md-7-->
</div><!-- /row -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add district</h4>
      </div>
      <div class="modal-body">
        <form class="form col-md-12 center-block" id="districtForm" method="post">
					<div class="form-group">                    
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
						<button class="btn btn-primary btn-lg save-districts" type="submit" data-loading-text="Loading...">Save</button>              
					</div>
				</form>
                <div class="clearfix"></div>
      </div>
      
    </div>
  </div>
</div>
<script type="text/javascript">
var url_save_district = "<?php echo site_url('localite/district/save');?>";
</script>
<script src="<?php echo base_url('assets/js/select2.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.gsm.js');?>"></script>


