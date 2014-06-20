<link href="<?php echo base_url('assets/adminlte/css/datatables/dataTables.bootstrap.css');?>" rel="stylesheet" type="text/css" />
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Birao
		<small>Lister birao</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
		<li class="active">Birao</li>
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
					<h3 class="box-title">Liste birao</h3>
				</div><!-- /.box-header -->
				<div class="box-body table-responsive ">
					<table class="table table-bordered table-striped" id="table-birao">				
						<thead>
							<tr>
								<th style="width: 10px">#</th>
								<th>Fokotany</th>
								<th>Adiresy</th>
								<th>Finday</th>
								<th style="width: 100px">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php if (isset($biraos) && count($biraos)) {
								foreach ($biraos as $item) {?>
							<tr id="row-<?php echo $item['id']; ?>">
								<td><?php echo $item['id']; ?>.</td>
								<td class="and_fokotany"><?php echo $item['fokotany']; ?></td>
								<?php if (array_key_exists('address', $item)) {?>
									<td><?php echo $item['address']; ?></td>
								<?php } else {?>
									<td> - </td>
								<?php }?>
								<?php if (array_key_exists('phone', $item)) {?>
									<td><?php echo $item['phone']; ?></td>
								<?php } else {?>
									<td> - </td>
								<?php }?>
								<td><a class="btn btn-sm btn-primary my-tooltip" data-toggle="tooltip" data-placement="bottom" href="<?php echo site_url('fokotany/edit/birao/' . $item['id']); ?>" title="&Eacute;diter"><i class="fa fa-edit"></i></a> 
								<a class="btn btn-sm btn-warning and_delete my-tooltip" data-toggle="tooltip" data-placement="bottom" href="#" title="Supprimer"><i class="fa fa-trash-o"></i></a></td>
							</tr>		
							<?php }
							} else {?>
							<tr>
								<td colspan="5">Pas de birao.</td>
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
var deleteUrl = "<?php echo site_url('fokotany/delete/birao');?>";
$(document).ready(function() {
	$('.my-tooltip').tooltip();
	var oTable = $("#table-birao").dataTable({
		"bLengthChange": false,
		"bInfo": false,
		"bProcessing": true
	});
	$('.and_delete').click(function(e) {
		var tr = $(this).parents('tr');
		var message = "&Ecirc;tes-vous s&ucirc;r de vouloir supprimer ";
		var name = $(this).parents('tr').find('.and_fokotany').html();
		var id = tr.attr('id').slice(4);
		message += '<strong>' + name + '</strong> ?';
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
			    		$.ajax({
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
					        			tr.html('<td colspan="5">Pas de birao.</td>');
				        			} else {					        			
			                    		tr.remove();
				        			}
			                    } else {
			                    	console.log("error");             	
			                    }
			        			
			        		}
			            });
		      		}
		    	}
		  	}
		});
		return false;
	});
});
</script>

