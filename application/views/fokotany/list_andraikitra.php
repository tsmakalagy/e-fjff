<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Andraikitra
		<small>Lister andraikitra</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
		<li class="active">Andraikitra</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<!-- left column -->
		<div class="col-md-8 col-md-offset-2">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Liste andraikitra</h3>
				</div><!-- /.box-header -->
				<div class="box-body table-responsive no-padding">
					<table class="table table-striped">
					<?php if (isset($andraikitras) && count($andraikitras)) {?>
						<tbody>
							<tr>
								<th style="width: 10px">#</th>
								<th>Anarana</th>
								<th>Action</th>
							</tr>
							<?php foreach ($andraikitras as $item) {?>
							<tr id="row-<?php echo $item['id']; ?>">
								<td><?php echo $item['id']; ?>.</td>
								<td class="and_anarana"><?php echo $item['anarana'] ?></td>
								<td><a class="btn btn-sm btn-primary" href="<?php echo site_url('fokotany/edit/andraikitra/' . $item['id']); ?>"><i class="fa fa-edit"></i> &Eacute;diter</a> <a class="btn btn-sm btn-warning and_delete" href="#"><i class="fa fa-trash-o"></i> Supprimer</a></td>
							</tr>		
							<?php }?>
						</tbody>
					<?php } else {?>
						<tbody>
							<tr>
								<th style="width: 10px">#</th>
								<th>Anarana</th>
								<th>Action</th>
							</tr>
							<tr>
								<td colspan="3">Pas d'andraikitra.</td>
							</tr>
						</tbody>
					<?php } ?>
					</table>	
					
			</div><!-- /.box -->
		</div><!--/.col (right) -->
	</div>   <!-- /.row -->
</section><!-- /.content -->
<!-- bootbox -->
<script src="<?php echo base_url('assets/js/bootbox.min.js');?>"></script>
<script type="text/javascript">
var deleteUrl = "<?php echo site_url('fokotany/delete/andraikitra');?>";
jQuery(document).ready(function() {
	jQuery('.and_delete').click(function(e) {
		var tr = jQuery(this).parents('tr');
		var message = "&Ecirc;tes-vous s&ucirc;r de vouloir supprimer ";
		var name = jQuery(this).parents('tr').find('.and_anarana').html();
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
			    		jQuery.ajax({
			            	type: "POST",
			                url: deleteUrl + '/' + id,
			                dataType: "json",
			    			beforeSend: function() {    
			        			jQuery('.box-body').after('<div class="overlay"></div><div class="loading-img"></div>');		
			        		},
			                success: function(res) {
				                jQuery('.overlay').remove();
				                jQuery('.loading-img').remove();
			        			if (res.success == true) {
				        			if (tr.siblings().length == 1) {
					        			tr.html('<td colspan="3">Pas d\'andraikitra.</td>');
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

