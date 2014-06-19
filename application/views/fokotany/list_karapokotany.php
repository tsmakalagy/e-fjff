<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Karapokotany
		<small>Lister karapokotany</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
		<li class="active">Karapokotany</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<!-- left column -->
		<div class="col-md-10 col-md-offset-1">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Liste karapokotany</h3>
				</div><!-- /.box-header -->
				<div class="box-body table-responsive no-padding">
					<table class="table table-striped">
					
						<tbody>
							<tr>
								<th style="width: 10px">#</th>
								<th>Birao</th>
								<th>Niaviana</th>
								<th>Nahatongavana</th>
								<th>Adiresy</th>
								<th style="width: 130px">Action</th>
							</tr>
							<?php if (isset($karapokotanies) && count($karapokotanies)) {
								foreach ($karapokotanies as $item) {?>
							<tr id="row-<?php echo $item['id']; ?>">
								<td><?php echo $item['laharana']; ?>.</td>
								<td><a href="#" class="my-tooltip" title="<?php echo $item['birao']['name'] ?>"><?php echo $item['birao']['id']; ?></a></td>
								<td><a href="#" class="my-tooltip" title="<?php echo $item['niaviana']['name'] ?>"><?php echo $item['niaviana']['id']; ?></a></td>
								<td><?php echo $item['nahatongavana']; ?></td>
								<td><?php echo $item['adiresy']; ?></td>
								<td>
									<a class="btn btn-sm btn-danger show-detail my-tooltip" data-toggle="tooltip" data-placement="bottom" href="#" title="Detail"><i class="fa fa-eye"></i></a>
									<a class="btn btn-sm btn-primary my-tooltip" data-toggle="tooltip" data-placement="bottom" href="<?php echo site_url('fokotany/edit/karapokotany/' . $item['id']); ?>" title="&Eacute;diter"><i class="fa fa-edit"></i></a> 
									<a class="btn btn-sm btn-warning and_delete my-tooltip" data-toggle="tooltip" data-placement="bottom" href="#" title="Supprimer"><i class="fa fa-trash-o"></i></a>
								</td>
							</tr>		
							<?php }
							} else {?>
							<tr>
								<td colspan="6">Pas de karapokotany.</td>
							</tr>
							<?php } ?>
						</tbody>					
					</table>	
					
			</div><!-- /.box -->
		</div><!--/.col (right) -->
	</div>   <!-- /.row -->
</section><!-- /.content -->
<!-- bootbox -->
<script src="<?php echo base_url('assets/js/bootbox.min.js');?>"></script>
<script src="<?php echo base_url('assets/adminlte/js/plugins/datatables/jquery.dataTables.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/adminlte/js/plugins/datatables/dataTables.bootstrap.js');?>" type="text/javascript"></script>
<script type="text/javascript">
var detailUrl = "<?php echo site_url('fokotany/detail/karapokotany');?>";
var deleteUrl = "<?php echo site_url('fokotany/delete/karapokotany');?>";
$(document).ready(function() {
	$('.my-tooltip').tooltip();
	$('.and_delete').click(function(e) {
		var tr = $(this).parents('tr');
		var message = "&Ecirc;tes-vous s&ucirc;r de vouloir supprimer?";
		var id = tr.attr('id').slice(4);
		bootbox.dialog({
			message: message,
		  	title: "Confirmation de suppression",
		  	buttons: {
		    	success: {
		      		label: "Non",
		      		className: "btn-primary",
		      		callback: function() {
		        		
		      		}
		    	},
		    	main: {
		      		label: "Oui",
		      		className: "btn-danger",
		      		callback: function() {
			    		jQuery.ajax({
			            	type: "POST",
			                url: deleteUrl + '/' + id,
			                dataType: "json",
			    			beforeSend: function() {    
			        			$('.box-body').after('<div class="overlay"></div><div class="loading-img"></div>');		
			        		},
			                success: function(res) {
				                $('.overlay').remove();
				                $('.loading-img').remove();
			        			if (res.success == true) {
				        			if (tr.siblings().length == 1) {
					        			tr.html('<td colspan="6">Pas de karapokotany.</td>');
				        			} else {					        			
			                    		tr.remove();
				        			}
			                    } else {
			                    	       	
			                    }
			        			
			        		}
			            });
		      		}
		    	}
		  	}
		});
		return false;
	});
	$(document).on('click', '.show-detail', function() {
		var tr = $(this).parents('tr');
		var id = tr.attr('id').slice(4);
		$.ajax({
			type: "POST",
            url: detailUrl + '/' + id,
            dataType: "json",
			beforeSend: function() {    
				$('.box-body').after('<div class="overlay"></div><div class="loading-img"></div>');			
    		},
            success: function(res) {
    			$('.overlay').remove();
                $('.loading-img').remove();
    			bootbox.dialog({
    				message: res,
    			  	title: "Detail karapokotany",
    			  	buttons: {
    			    	success: {
    			      		label: "Fermer",
    			      		className: "btn-primary",
    			      		callback: function() {
    			        		
    			      		}
    			    	}
    			  	}
    			});
    			
    		}
			
		});
		return false;
	});
});
</script>

