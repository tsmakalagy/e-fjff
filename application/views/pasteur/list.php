<!-- Content Header (Page header) -->
<link href="<?php echo base_url('assets/adminlte/css/datatables/dataTables.bootstrap.css');?>" rel="stylesheet" type="text/css" />
<section class="content-header">
	<h1>
		Pasteur
		<small>Lister Pasteur</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
		<li class="active">Pasteur</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<!-- left column -->
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Liste Pasteur</h3>
				</div><!-- /.box-header -->
				<div class="box-body table-responsive">
					<table class="table table-bordered table-striped" id="table-olona">					
						<thead>
							<tr>
								<th style="width: 10px">#</th>
								<th>Andraikitra</th>
								<th>Anarana</th>
								<th>Taona</th>
								<th>Sexe</th>
								<th>Toerana iasana</th>
								<th style="width: 120px">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php if (isset($pasteurs) && count($pasteurs)) {
								foreach ($pasteurs as $item) {?>
							<tr id="row-<?php echo $item['id']; ?>">
								<td><?php echo $item['id']; ?></td>
								<td><?php echo $item['occupation']; ?></td>
								<td><?php echo $item['name']; ?></td>
								<td><?php echo $item['age']; ?></td>
								<td><?php echo $item['sexe']; ?></td>		
								<td><?php echo isset($item['current_poste']) ? $item['current_poste'] : ' - '; ?></td>						
								<td>
									<a class="btn btn-sm btn-danger and_view my-tooltip" 
										data-toggle="tooltip" 
										data-placement="bottom"
										data-vady="<?php echo $item['isVady'] ?>"
										data-zanaka="<?php echo $item['isZanaka'] ?>"
										data-id="<?php echo $item['id'] ?>"
										data-urlvady="<?php echo site_url("/pasteur/detail/vady/".$item['id']) ?>"
										data-urlzanaka="<?php echo site_url("/pasteur/detail/zanaka/".$item['id']) ?>"
										data-urlprint="<?php echo site_url("/pasteur/print/".$item['id']) ?>"
										title="Detail"
										href="<?php echo site_url("/pasteur/detail/pasteur/".$item['id']) ?>"								
										>
										<i class="fa fa-eye"></i></a>									
									<a class="btn btn-sm btn-warning and_delete my-tooltip" data-toggle="tooltip" data-placement="bottom" href="#" title="Supprimer"><i class="fa fa-trash-o"></i></a>
								</td>
							</tr>		
							<?php }
							}  ?>
						</tbody>					
					</table>	
					
			</div><!-- /.box -->
		</div><!--/.col (right) -->
	</div>   <!-- /.row -->
</section><!-- /.content -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">  
<div class="modal-dialog">
<div class="modal-content"></div>    

      
</div><!-- /.modal-dialog --> 
</div><!-- /.modal -->
<script src="<?php echo base_url('assets/adminlte/js/plugins/datatables/jquery.dataTables.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/adminlte/js/plugins/datatables/dataTables.bootstrap.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/bootbox.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/jsPDF/jspdf.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/jsPDF/libs/Deflate/adler32cs.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/jsPDF/libs/FileSaver.js/FileSaver.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/jsPDF/libs/Blob.js/BlobBuilder.js');?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/jsPDF/jspdf.plugin.addimage.js');?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/jsPDF/jspdf.plugin.standard_fonts_metrics.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/jsPDF/jspdf.plugin.split_text_to_size.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/jsPDF/jspdf.plugin.from_html.js');?>"></script>
<script type="text/javascript">
var deleteUrl = "<?php echo site_url('fokotany/delete/olona');?>";
var mainmmodal, vadymodal, zanakamodal;
function demoImages(pasteurData) {
	// Because of security restrictions, getImageFromUrl will
	// not load images from other domains.  Chrome has added
	// security restrictions that prevent it from loading images
	// when running local files.  Run with: chromium --allow-file-access-from-files --allow-file-access
	// to temporarily get around this issue.
	var getImageFromUrl = function(url, callback) {
		var img = new Image(), data, ret = {
			data: null,
			pending: true
		};
		
		img.onError = function() {
			throw new Error('Cannot load image: "'+url+'"');
		};
		img.onload = function() {
			var canvas = document.createElement('canvas');
			document.body.appendChild(canvas);
			canvas.width = img.width;
			canvas.height = img.height;

			var ctx = canvas.getContext('2d');
			ctx.drawImage(img, 0, 0);
			// Grab the image as a jpeg encoded in base64, but only the data
			data = canvas.toDataURL('image/jpeg').slice('data:image/jpeg;base64,'.length);
			// Convert the data to binary form
			data = atob(data);
			document.body.removeChild(canvas);

			ret['data'] = data;
			ret['pending'] = false;
			if (typeof callback === 'function') {
				callback(data);
			}
		};
		img.src = url;

		return ret;
	};

	// Since images are loaded asyncronously, we must wait to create
	// the pdf until we actually have the image data.
	// If we already had the jpeg image binary data loaded into
	// a string, we create the pdf without delay.
	var createPDF = function(imgData) {
		var doc = new jsPDF();
		doc.setFontSize(18);
		doc.setFontType("bold");
		doc.text(20, 20, 'Fiche du Pasteur '+pasteurData.pasteur.name);
		doc.setFontSize(22);	
		doc.setFontType("bolditalic");
		doc.text(20, 40, 'Mombamomba');		
		doc.line(20, 41, 200, 41);
		doc.addImage(imgData, 'JPEG', 20, 50, 40, 40);
		
		doc.setFontSize(14);
		doc.setFontType("bolditalic");
		doc.text(70, 53, 'Anarana:');
		doc.setFontType("normal");
		doc.text(110, 53, pasteurData.pasteur.name);

		doc.setFontType("bolditalic");
		doc.text(70, 63, 'Taona:');
		doc.setFontType("normal");
		doc.text(110, 63, pasteurData.pasteur.age);

		doc.setFontType("bolditalic");
		doc.text(70, 73, 'Fananahana:');
		doc.setFontType("normal");
		doc.text(110, 73, pasteurData.pasteur.sexe);

		doc.setFontType("bolditalic");
		doc.text(70, 83, 'Finday:');
		doc.setFontType("normal");
		if (pasteurData.pasteur.phone != "undefined") {			
			doc.text(110, 83, pasteurData.pasteur.phone);
		} else {
			doc.text(110, 83, "-");
		}

		doc.setFontSize(22);	
		doc.setFontType("bolditalic");
		doc.text(20, 100, 'Asa');		
		doc.line(20, 101, 200, 101);

		doc.setFontSize(14);
		doc.setFontType("bolditalic");
		doc.text(25, 113, 'Andraikitra:');
		doc.setFontType("normal");
		doc.text(90, 113, pasteurData.pasteur.occupation);

		doc.setFontType("bolditalic");
		doc.text(25, 123, 'Nidirana SAB:');
		doc.setFontType("normal");
		if (typeof pasteurData.pasteur.datesab == "undefined") {			
			doc.text(90, 123, "-");
		} else {
			doc.text(90, 123, pasteurData.pasteur.datesab);
		}

		doc.setFontType("bolditalic");
		doc.text(25, 133, 'Nanosorana:');
		doc.setFontType("normal");
		if (typeof pasteurData.pasteur.dateosotra == "undefined") {
			doc.text(90, 133, "-");
		} else {
			doc.text(90, 133, pasteurData.pasteur.dateosotra);
		}

		doc.setFontType("bolditalic");
		doc.text(25, 143, 'Toerana iasana:');
		doc.setFontType("normal");
		if (typeof pasteurData.pasteur.current_poste == "undefined") {			
			doc.text(90, 143, "-");
		} else {			
			doc.text(90, 143, pasteurData.pasteur.current_poste);
		}

		doc.setFontType("bolditalic");
		doc.text(25, 153, 'Daty nahatongavana:');
		doc.setFontType("normal");
		if (typeof pasteurData.pasteur.current_debut == "undefined") {		
			doc.text(90, 153, "-");
		} else {
			doc.text(90, 153, pasteurData.pasteur.current_debut);
		}

		doc.setFontSize(22);	
		doc.setFontType("bolditalic");
		doc.text(20, 166, 'Niasana taloha');		
		doc.line(20, 167, 200, 167);

		if (typeof pasteurData.pasteur.last_poste != "undefined") {
			var last_poste = pasteurData.pasteur.last_poste;
			var length = last_poste.length;
			var y = 166;
			for (var i = 0; i < length; i++) {
				y += 13;
				doc.setFontSize(14);
				doc.setFontType("bolditalic");
				doc.text(25, y, last_poste[i].eglise);
				doc.setFontType("normal");
				doc.text(90, y, last_poste[i].date);
			}
		}

		

		doc.save('output.pdf');
		//doc.output('datauri');
	}

	getImageFromUrl(pasteurData.pasteur.imgUrl, createPDF);
}
	$(function() {
		var oTable = $("#table-olona").dataTable({
			"bLengthChange": false,
			"bInfo": false,
			"bProcessing": true,
//			"aoColumns": [
//            	null,
//            	null,
//            	null,
//                null,
//                null,
//                { "bSearchable": false },
//        	]
		});
		$(document).on('click', '.and_view', function(e) {
			var that = $(this);
			$.ajax({
				type:'POST',
				url:$(this).attr('href'),
				beforeSend: function() {    
        			$('.box-body').after('<div class="overlay"></div><div class="loading-img"></div>');		
        		},  
				success:function(data) {
        			$('.overlay').remove();
	                $('.loading-img').remove();
	                var isVady = that.data("vady");
	                var urlprint = that.data("urlprint");
		        	mainmmodal = bootbox.dialog({
		        		onEscape: function() {},
		        		message: data,
		        		title: "Detail du pasteur",
		        		buttons: {
		        			"Imprimer": {
		                		className: "btn-danger",
		                		callback: function() {
				        			$.ajax({
				        				type:'POST',
				        				url:urlprint,
				        				dataType: "json",
				        				beforeSend: function() {    
				                			$('.box-body').after('<div class="overlay"></div><div class="loading-img"></div>');		
				                		},
				                		success: function(data) {
				                			$('.overlay').remove();
			            	                $('.loading-img').remove();
			            	                demoImages(data);
				                		}
				        			});	                				
		        				}
		            		},
			        		"Fermer": {
		                		className: "btn-success",
		            		},
		        			success: {
		                		label: "Vady",
		                		className: "btn-warning btn-vady hide",
		                		callback: function() {	
		                			if (isVady) {
			                			var url = that.data("urlvady");
		                				$.ajax({
				            				type:'POST',
				            				url:url,
				            				beforeSend: function() {    
				                    			$('.box-body').after('<div class="overlay"></div><div class="loading-img"></div>');		
				                    		},  
				            				success:function(data) {
				                    			$('.overlay').remove();
				            	                $('.loading-img').remove();
				            		        	vadymodal = bootbox.dialog({
				            		        		onEscape: function() {},
				            		        		message: data,
				            		        		title: "Detail du pasteur",
				            		        		buttons: {
				            			        		"Fermer": {
				            		                		className: "btn-success",
				            		            		},
				            		        			success: {
				            		                		label: "Zanaka",
				            		                		className: "btn-warning btn-zanaka hide",
				            		                		callback: function() {		            				
				            		            				var urlzanaka = that.data("urlzanaka");
				            		            				$.ajax({
				        				            				type:'POST',
				        				            				url:urlzanaka,
				        				            				beforeSend: function() {    
				        				                    			$('.box-body').after('<div class="overlay"></div><div class="loading-img"></div>');		
				        				                    		},  
				        				            				success:function(data) {
				        				                    			$('.overlay').remove();
				        				            	                $('.loading-img').remove()
				        				            		        	zanakamodal = bootbox.dialog({
				        				            		        		onEscape: function() {},
				        				            		        		message: data,
				        				            		        		title: "Detail du zanaka",
				        				            		        		buttons: {
				        				            			        		"Fermer": {
				        				            		                		className: "btn-success",
				        				            		            		}	            		
				        				            		        		},
				        				            		        		show: true
				        				            		    		});
				        				            				}
				        				            			});
				            					      		}
				            		            		},		            		
				            		        		},
				            		        		show: false
				            		    		});
				            	                vadymodal.on('show.bs.modal', function(e) {
				            		                var isZanaka = that.data("zanaka");
				            		                if (isZanaka) {
				            		                	$('.btn-zanaka').removeClass("hide");    
				            		                }
				            	        		});
				            	                vadymodal.modal("show");
				            				}
				            			});
		                			} else {
			                		}
					      		}
		            		},		            		
		        		},
		        		show: false
		    		});
	                mainmmodal.on('show.bs.modal', function(e) {		                
		                if (isVady) {
		                	$('.btn-vady').removeClass("hide");    
		                }
	        		});
	                mainmmodal.modal("show");
				}
			});
			return false;
		});
		
		
//		$('.and_delete').click(function(e) {
//			var tr = $(this).parents('tr');
//			var message = "&Ecirc;tes-vous s&ucirc;r de vouloir supprimer?";
//			var id = tr.attr('id').slice(4);
//			bootbox.dialog({
//				message: message,
//			  	title: "Confirmation de suppression",
//			  	buttons: {
//			    	success: {
//			      		label: "Non",
//			      		className: "btn-primary",
//			      		callback: function() {
//			        		
//			      		}
//			    	},
//			    	main: {
//			      		label: "Oui",
//			      		className: "btn-danger",
//			      		callback: function() {
//				    		$.ajax({
//				            	type: "POST",
//				                url: deleteUrl + '/' + id,
//				                dataType: "json",
//				    			beforeSend: function() {    
//				        			$('.box-body').after('<div class="overlay"></div><div class="loading-img"></div>');		
//				        		},
//				                success: function(res) {
//					                $('.overlay').remove();
//					                $('.loading-img').remove();
//				        			if (res.success == true) {
//					        			if (tr.siblings().length == 1) {
//						        			tr.html('<td colspan="6">Pas de olona.</td>');
//					        			} else {					        			
//				                    		tr.remove();
//					        			}
//				                    } else {
//				                    	       	
//				                    }
//				        			
//				        		}
//				            });
//			      		}
//			    	}
//			  	}
//			});
//			return false;
//		});		
    });
</script>