<!-- Content Header (Page header) -->
<link href="<?php echo base_url('assets/adminlte/css/datatables/dataTables.bootstrap.css');?>" rel="stylesheet" type="text/css" />
<section class="content-header">
	<h1>
		Olona
		<small>Lister olona</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
		<li class="active">Olona</li>
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
					<h3 class="box-title">Liste olona</h3>
				</div><!-- /.box-header -->
				<div class="box-body table-responsive">
					<table class="table table-bordered table-striped" id="table-olona">					
						<thead>
							<tr>
								<th style="width: 10px">#</th>
								<th>Karatra</th>
								<th>Anarana</th>
								<th>Taona</th>
								<th>Sex</th>
								<th style="width: 120px">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php if (isset($olonas) && count($olonas)) {
								foreach ($olonas as $item) {?>
							<tr id="row-<?php echo $item['id']; ?>">
								<td><?php echo $item['id']; ?></td>
								<td><a href="#"><?php echo $item['karapokotany']; ?></a></td>
								<td><?php echo $item['name']; ?></td>
								<td><?php echo $item['age']; ?></td>
								<td><?php echo $item['sex']; ?></td>								
								<td>
									<a class="btn btn-sm btn-danger and_view my-tooltip" 
										data-toggle="tooltip" 
										data-placement="bottom" 
										href="#" 
										title="Detail"
										data-nom="<?php echo $item['name']; ?>"
										data-age="<?php echo $item['age']; ?>"
										data-sex="<?php echo $item['sex']; ?>"
										data-cin="<?php echo isset($item['cin']) ? $item['cin'] : ''; ?>"
										data-datecin="<?php echo isset($item['datecin']) ? $item['datecin'] : ''; ?>"
										data-andraikitra="<?php echo isset($item['andraikitra']) ? $item['andraikitra'] : ''; ?>"
										data-asa="<?php echo isset($item['asa']) ? $item['asa'] : ''; ?>"
										data-dad="<?php echo isset($item['dad']) ? $item['dad'] : ''; ?>"
										data-mom="<?php echo isset($item['mom']) ? $item['mom'] : ''; ?>"
										data-adress="<?php echo isset($item['adress']) ? $item['adress'] : ''; ?>"
										>
										<i class="fa fa-eye"></i></a>									
									<a class="btn btn-sm btn-warning and_delete my-tooltip" data-toggle="tooltip" data-placement="bottom" href="#" title="Supprimer"><i class="fa fa-trash-o"></i></a>
								</td>
							</tr>		
							<?php }
							} else {?>
							<tr>
								<td colspan="6">Pas de olona.</td>
							</tr>
							<?php } ?>
						</tbody>					
					</table>	
					
			</div><!-- /.box -->
		</div><!--/.col (right) -->
	</div>   <!-- /.row -->
</section><!-- /.content -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">  
<div class="modal-dialog">    

      
</div><!-- /.modal-dialog --> 
</div><!-- /.modal -->
<script src="<?php echo base_url('assets/adminlte/js/plugins/datatables/jquery.dataTables.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/adminlte/js/plugins/datatables/dataTables.bootstrap.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/bootbox.min.js');?>"></script>
<script type="text/javascript">
var deleteUrl = "<?php echo site_url('fokotany/delete/olona');?>";
	$(function() {
		var oTable = $("#table-olona").dataTable({
			"bLengthChange": false,
			"bInfo": false,
			"bProcessing": true,
			"aoColumns": [
            	null,
            	null,
            	null,
                null,
                null,
                { "bSearchable": false },
        	]
		});
		$(document).on('click', '.and_view', function(e) {
			var nom = $(this).data("nom");
			var age = $(this).data("age");
			var sex = $(this).data("sex");
			var cin = $(this).data("cin");
			var datecin = $(this).data("datecin");
			var asa = $(this).data("asa");
			var andraikitra = $(this).data("andraikitra");
			var dad = $(this).data("dad");
			var mom = $(this).data("mom");
			var adress = $(this).data("adress");
			
			var content = "<dl class='dl-horizontal'>";
			content += "<dt>Anarana</dt>";
			content += "<dd>"+nom+"</dd>";
			content += "<dt>Taona</dt>";
			content += "<dd>"+age+"</dd>";
			content += "<dt>Sex</dt>";
			content += "<dd>"+sex+"</dd>";
			if (cin.length > 0) {
				content += "<dt>Karapanondro</dt>";
				content += "<dd>"+cin+"</dd>";
			}
			if (datecin.length > 0) {
				content += "<dt>Nomena t@</dt>";
				content += "<dd>"+datecin+"</dd>";
			}
			if (asa.length > 0) {
				content += "<dt>Asa</dt>";
				content += "<dd>"+asa+"</dd>";
			}
			if (andraikitra.length > 0) {
				content += "<dt>Andraikitra</dt>";
				content += "<dd>"+andraikitra+"</dd>";
			}
			if (dad.length > 0) {
				content += "<dt>Ray</dt>";
				content += "<dd>"+dad+"</dd>";
			}
			if (mom.length > 0) {
				content += "<dt>Reny</dt>";
				content += "<dd>"+mom+"</dd>";
			}
			if (adress.length > 0) {
				content += "<dt>Adiresy</dt>";
				content += "<dd>"+adress+"</dd>";
			}
			content += "</dl>";
			bootbox.dialog({
				message: content,
			  	title: "Detail du fokonolona",
			  	buttons: {
			    	success: {
			      		label: "Fermer",
			      		className: "btn-primary",
			      		callback: function() {
			        		
			      		}
			    	}
			  	}
			});
			return false;
		});
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
						        			tr.html('<td colspan="6">Pas de olona.</td>');
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
    });
</script>