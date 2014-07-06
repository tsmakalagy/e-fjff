<link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/font-awesome.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/datepicker3.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/select2/css/select2.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/select2/css/select2-bootstrap.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/css/daterangepicker/daterangepicker-bs3.css');?>">
<!-- FileUpload and Crop -->
<link rel="stylesheet" href="<?php echo base_url('assets/file-upload/css/file-upload.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/file-upload/css/jquery.fileupload.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/file-upload/css/jquery.fileupload-ui.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/file-upload/css/jquery.Jcrop.css');?>">
<!-- iCheck for checkboxes and radio inputs -->
<link href="<?php echo base_url('assets/adminlte/css/iCheck/all.css');?>" rel="stylesheet" type="text/css" />
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Pasteur
		<small><?php echo $section_title; ?></small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo site_url('admin'); ?>"><i class="fa fa-dashboard"></i> Accueil</a></li>
		<li class="active">Pasteur</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<!-- left column -->
		<div class="col-md-8 col-md-offset-2">
			<!-- general form elements -->
			<div class="box box-solid box-primary">
				<div class="box-header">
					<h3 class="box-title"><?php echo $section_title; ?></h3>
				</div><!-- /.box-header -->
				<!-- form start -->
				<form role="form" method="post" id="validation-form" action="">
					<div class="box-body">
						<?php echo validation_errors(); ?>
						<?php if (isset($success) && strlen($success)) {?>
							<div class="alert-user alert alert-success alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<?php echo $success; ?>
							</div>
						<?php }?>	
						<div id="olona-form">							
							<h3 class="text-light-blue form-title">Mombamomba</h3>
							<span class="col-md-4">								
								<a class="fileinput-button show-modal" href="#">								
									<span class="upload-profile-picture change-image">									
										<label class="" data-title="Modifier image">
											<span data-title="No File ..." class="img-preview"><i class="fa fa-picture-o fa-5x"></i></span>									
										</label>
									</span>
								</a>
							</span>
							<span class="col-md-7">
								<div class="form-group">
									<input type="text" class="form-control" name="nom" placeholder="Anarana">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" name="prenom" placeholder="Fanampiny">
								</div>
							</span>
							<div class="clearfix"></div>
							<hr/>
							<span class="col-md-8 col-md-offset-2">
								<div class="form-group">
									<label for="datenaissance">Daty nahaterahana</label>
									<div class="input-group">
                                        <input type="text" class="form-control datepicker" name="datenaissance">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    </div>									
								</div>
								<div class="form-group">
									<label for="sexe">Sexe</label>
									<label class="radio-inline">
										<input type="radio" class="form-control minimal" value="1" name="sexe" checked="checked"/>
										Lehilahy
		                            </label>
		                            <label class="radio-inline">
										<input type="radio" class="form-control minimal" value="2" name="sexe"/>
										Vehivavy
		                            </label>
								</div>
							</span>
							<div class="clearfix"></div>
							<hr/>
							<span class="col-md-8 col-md-offset-2">
								<div class="form-group">
									<label for="statut">Manam-bady</label>
									<label class="radio-inline">
										<input type="radio" class="form-control minimal" value="1" name="statut" />
										Eny
		                            </label>
		                            <label class="radio-inline">
										<input type="radio" class="form-control minimal" value="0" name="statut" checked="checked"/>
										Tsia
		                            </label>
								</div>	
								<div class="form-group">
									<label for="zanaka">Manan-janaka</label>
									<label class="radio-inline">
										<input type="radio" class="form-control minimal" value="1" name="zanaka" />
										Eny
		                            </label>
		                            <label class="radio-inline">
										<input type="radio" class="form-control minimal" value="0" name="zanaka" checked="checked"/>
										Tsia
		                            </label>
								</div>
								<div class="form-group hide childnumber">
									<label for="isany">Isan'ny zanaka</label>
									<input type="text" class="form-control" name="isany">
								</div>	
							</span>
							<div class="clearfix"></div>
							<hr/>
							<span class="col-md-8 col-md-offset-2">
								<div class="form-group">
									<label for="telephone">Finday</label>
									<div class="input-group">
                                        <input type="text" class="form-control input-mask-phone" name="telephone">
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    </div>
									
								</div>
							</span>							
							<div class="clearfix"></div>
							<h3 class="text-light-blue form-title">Asa</h3>
							<span class="col-md-11 col-md-offset-1">
								<div class="form-group">
									<label for="occupation">Andraikitra</label>
									<label class="radio-inline">
										<input type="radio" class="form-control minimal" value="1" name="occupation" checked="checked"/>
										Sekoly Ara-baiboly
		                            </label>
		                            <label class="radio-inline">
										<input type="radio" class="form-control minimal" value="2" name="occupation"/>
										Mpitandrina
		                            </label>
								</div>
							</span>
							<div class="clearfix"></div>
							<span class="col-md-8 col-md-offset-2">
								<div class="form-group">
									<label for="datesab">Daty nidirana SAB</label>
									<div class="input-group">
                                        <input type="text" class="form-control datepicker" name="datesab">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    </div>									
								</div>
								<div class="form-group datenanosorana" style="display: none;">
									<label for="dateosotra">Daty nanosorana</label>
									<div class="input-group">
                                        <input type="text" class="form-control datepicker" name="dateosotra">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    </div>									
								</div>
								<div class="form-group">
									<label for="current-poste">Toerana iasana</label>
									<select name="current-poste" class="form-control select-current-poste">
										<option></option>
										<?php if (isset($eglises) && count($eglises)) {
											foreach ($eglises as $item) {?>
												<option value="<?php echo $item->getId(); ?>"><?php echo $item->getNom(); ?></option>
											<?php }
										}?>
									</select>
								</div>
								<div class="form-group">
									<label for="current-debut">Daty nahatongavana</label>
									<div class="input-group">
                                        <input type="text" class="form-control datepicker" name="current-debut">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    </div>									
								</div>
							</span>
							<div class="clearfix"></div>
							<h3 class="text-light-blue form-title">Niasana taloha</h3>
							<span class="col-md-12">
								<?php for ($i = 0; $i < 5; $i++) { ?>
								<div class="separation">
								<span class="col-md-5">
									<select name="last-poste[]" class="form-control select-last-poste">
										<option></option>
										<?php if (isset($eglises) && count($eglises)) {
											foreach ($eglises as $item) {?>
												<option value="<?php echo $item->getId(); ?>"><?php echo $item->getNom(); ?></option>
											<?php }
										}?>
									</select>
								</span>
								<span class="col-md-7">
									<input type="text" class="form-control last-date" name="last-debut[]" placeholder="Taona">
								</span>
								<div class="clearfix"></div>
								</div>
								<?php } ?>
							</span>
							<div class="clearfix"></div>
						</div><!-- /.main-form -->
						
					</div><!-- /.box-body -->
					<div class="box-footer">
						<button type="subselect2mit" class="btn btn-primary btn-previous" style="display:none;">Pr&eacute;c&eacute;dent</button>						
						<button type="submit" class="btn btn-success pull-right btn-next">Enregistrer</button>
						<div class="clearfix"></div>
					</div>
				</form>
			</div><!-- /.box -->
		</div><!--/.col (right) -->
	</div>   <!-- /.row -->
</section><!-- /.content -->

<div class="modal fade" id="uploadModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="blue">Modifier profile</h4>
			</div>
	
			<form class="no-margin" id="fileupload" action="" method="POST" enctype="multipart/form-data">
			<div class="modal-body">
				<div class="space-4"></div>
				<div style="width:94%;margin-left:3%;">
				    <div class="gdn-file-input gdn-file-multiple upload-profile-picture">					
						<label data-title="Choisisser une image">
			                <input type="file" name="files[]" id="input_file">
						    <span data-title="No File ..."><i class="fa fa-picture-o fa-5x"></i></span>
						</label>
						<a href="#" class="remove"><i class="fa fa-times"></i></a>
				    </div>
				    <div class="gdn-file-preview">
						<div class="files"></div>
				    </div>
				</div>
			</div>
			
			<div class="modal-footer center">
				<button type="button" class="btn btn-small btn-success submit-button"><i class="fa fa-check"></i> Valider</button>
				<button type="reset" class="btn btn-small btn-danger" data-dismiss="modal"><i class="fa fa-ban"></i> Annuler</button>
			</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="vadyUploadModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="blue">Modifier profile</h4>
			</div>
	
			<form class="no-margin" id="vadyfileupload" action="" method="POST" enctype="multipart/form-data">
			<div class="modal-body">
				<div class="space-4"></div>
				<div style="width:94%;margin-left:3%;">
				    <div class="gdn-file-input gdn-file-multiple upload-profile-picture">					
						<label data-title="Choisisser une image">
			                <input type="file" name="files[]" id="input_file">
						    <span data-title="No File ..."><i class="fa fa-picture-o fa-5x"></i></span>
						</label>
						<a href="#" class="remove"><i class="fa fa-times"></i></a>
				    </div>
				    <div class="gdn-file-preview">
						<div class="files"></div>
				    </div>
				</div>
			</div>
			
			<div class="modal-footer center">
				<button type="button" class="btn btn-small btn-success vady-submit-button"><i class="fa fa-check"></i> Valider</button>
				<button type="reset" class="btn btn-small btn-danger" data-dismiss="modal"><i class="fa fa-ban"></i> Annuler</button>
			</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <div class="template-upload">
	<span class="preview"></span>
	<strong class="error red"></strong>
	<p class="size">Processing...</p>
        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-green" style="width:0%;"></div></div>
	{% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start" disabled>
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Start</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning cancel btn-upload-cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
    </div>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <div class="template-download gdn-dashed">
	    {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
            {% } %}     
            {% if (file.deleteUrl) { %}
                <a href="#" class="delete delete-image remove" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="fa fa-times"></i>
                </a>
            {% } else { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}     
	<span class="preview">
	    {% if (file.mediumUrl) { %}
		<span class="profile-picture"><img src="{%=file.mediumUrl%}" id="{%=file.fileId%}"></span>
	    {% } %}
	</span> 
	<div id="preview-pane" class="hide">
	    <div class="preview-container">
	      <img src="{%=file.mediumUrl%}" class="jcrop-preview" alt="Preview" />
	    </div>	    
	</div>               
    </div>
{% } %}
</script>


<script src="<?php echo base_url('assets/select2/js/select2.min.js');?>"></script>
<script src="<?php echo base_url('assets/datepicker/js/bootstrap-datepicker.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.validate.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/additional-methods.min.js');?>"></script>
<script src="<?php echo base_url('assets/adminlte/js/plugins/iCheck/icheck.js');?>"></script>
<script src="<?php echo base_url('assets/adminlte/js/plugins/daterangepicker/daterangepicker.js');?>"></script>
<!-- InputMask -->
<script src="<?php echo base_url('assets/adminlte/js/plugins/input-mask/jquery.inputmask.js');?>" type="text/javascript"></script>
<!-- FileUpload and Crop -->
<script src="<?php echo base_url('assets/file-upload/js/tmpl.min.js');?>"></script>
<script src="<?php echo base_url('assets/file-upload/js/load-image.min.js');?>"></script>
<script src="<?php echo base_url('assets/file-upload/js/canvas-to-blob.min.js');?>"></script>
<script src="<?php echo base_url('assets/file-upload/js/jquery.iframe-transport.js');?>"></script>
<script src="<?php echo base_url('assets/file-upload/js/jquery.fileupload.js');?>"></script>
<script src="<?php echo base_url('assets/file-upload/js/jquery.fileupload-process.js');?>"></script>
<script src="<?php echo base_url('assets/file-upload/js/jquery.fileupload-image.js');?>"></script>
<script src="<?php echo base_url('assets/file-upload/js/jquery.fileupload-audio.js');?>"></script>
<script src="<?php echo base_url('assets/file-upload/js/jquery.fileupload-video.js');?>"></script>
<script src="<?php echo base_url('assets/file-upload/js/jquery.fileupload-validate.js');?>"></script>
<script src="<?php echo base_url('assets/file-upload/js/jquery.fileupload-ui.js');?>"></script>
<script src="<?php echo base_url('assets/file-upload/js/jquery.Jcrop.js');?>"></script>
<script src="<?php echo base_url('assets/file-upload/js/jquery.gdn-imageupload-ui.js');?>"></script>


<script type="text/javascript">
<!--
var ajaxUrl = "<?php echo site_url('upload'); ?>";
var cropUrl = "<?php echo site_url('crop'); ?>";
function format(item) { return item.text; };

$(document).ready(function() {
	var showvadymodal;
	var selectCurrentPoste = $(".select-current-poste").select2({
		minimumResultsForSearch: 10, 
		allowClear: true,
		placeholder: 'Selectionner eglise'
	});

	var selectLastPoste = $(".select-last-poste").select2({
		minimumResultsForSearch: 10, 
		allowClear: true,
		placeholder: 'Eglise'
	});

	var showmodal = $('.show-modal').imageupload({
		doCrop: true,
		uploadUrl: ajaxUrl,
		cropUrl: cropUrl,
		fileName: 'pasteurFileId',
		xs: 40,
		sm: 60,
		md: 100
	}).bind('imageuploadcomplete', function(event, data) {
		var deleteLink = '<a href="#" class="delete-all remove-all" data-type="'+data.deleteType+'" \
		data-url="'+data.deleteUrl+'" > \
        <i class="fa fa-times"></i> \
        </a>';
        $('.upload-profile-picture.change-image > label').toggleClass("cropped");        
		$(this).before(deleteLink);
	});
	
	$(document).on('click', '.delete-all', function(e) {
		e.preventDefault();
		var that = $(this);
		$.ajax({
			url: that.data("url"),
			type: that.data("type"),
			dataType: 'json',
			success: function(res) {
				if (res) {
					$('.img-preview').html('<i class="fa fa-picture-o fa-5x"></i>');
					$('.upload-profile-picture.change-image > label').toggleClass("cropped");
					that.detach();
				}
			}
		});	
    }); 	

	$('.datepicker').datepicker();

	$('.last-date').daterangepicker();

	var next = $('.btn-next');
	var previous = $('.btn-previous');

	var isVady, isZanaka, isPasteur, previousTarget, nextTarget, previousForm, 
		numberZanaka, selectVAndraikitra, selectZAndraikitra = {},
		shown, toShowNext, toHideNext, toShowPrev, toHidePrev;

	$('input[type="radio"].minimal').on('ifChecked', function(event){
    	$(this).valid();
	});
	
	$('body').on('ifChecked', 'input[name="occupation"].minimal', function(event) {
		var occupationCheckbox = $('input[name="occupation"]:checked').val();
		
		if (occupationCheckbox == 2) {
			isPasteur = true;
		} else {
			isPasteur = false;
		}		
		if (isPasteur) {
            $('.datenanosorana').show('fast');
            
        } else {
        	$('.datenanosorana').hide('fast', function() {
        		$('input[name="dateosotra"]').val("");
        	});        	   	
        }
	});
	
	
    $('body').on('ifChecked', 'input[name="statut"].minimal, input[name="zanaka"].minimal', function(event){
    	var statutCheckbox = $('input[name="statut"]:checked').val();
		var zanakaCheckbox = $('input[name="zanaka"]:checked').val();

		if (statutCheckbox == 1) {
			isVady = true;
		} else {
			isVady = false;
		}

		if (zanakaCheckbox == 1) {
			isZanaka = true;
		} else {
			isZanaka = false;
		}
    	
    	if (isZanaka) {
            $('.childnumber').removeClass('hide');
            
        } else {
        	$('.childnumber').addClass('hide');
        	$('input[name="isany"]').val("");
        }
    	shown = "#olona-form";
        if (isZanaka || isVady) {            
        	next.removeClass('btn-success').addClass('btn-warning').html('Suivant');        	
        	if (isZanaka && !isVady) {		
        		next.data("show", "#zanaka-form-0");	
        	} else {
        		next.data("show", "#vady-form");
        	}
        	next.data("hide", "#olona-form");
        } else {
        	next.addClass('btn-success').removeClass('btn-warning').html('Enregistrer');
        	next.removeData("show");
        	next.removeData("hide");
        }
        
    });

    previous.click(function() {
    	toShowNext = next.data("show");
    	toHideNext = next.data("hide");
    	toShowPrev = previous.data("show");
    	toHidePrev = previous.data("hide");
    	
      	$(toHidePrev).fadeOut('slow');
      	$(toShowPrev).fadeIn('slow', function() {
      		toShowNext = toHidePrev;
          	toHideNext = toShowPrev;
          	next.data("show", toShowNext);
  			next.data("hide", toHideNext);
  			toHidePrev = toShowPrev;
      		if (toShowPrev.indexOf('olona') == 1) { // First step
          		$('.box-title').html('Ajouter olona');
          		previous.fadeOut('slow');
          	} else if (toShowPrev.indexOf('vady') == 1) {
        		$('.box-title').html('Ajouter vady');
        		toShowPrev = "#olona-form";
        	} else if (toShowPrev.indexOf('zanaka') == 1) {
        		var id = parseInt(toShowPrev.slice(13)); 
        		var nextId = id + 1;
        		$('.box-title').html('Ajouter zanaka-' + nextId);
        		if (id == 0) {
            		if (isVady) {
        				toShowPrev = "#vady-form";
            		} else {
            			toShowPrev = "#olona-form";
            		}
        		} else {
            		var prevId = id - 1;
        			toShowPrev = "#zanaka-form-" + prevId;
        		}
        	}   
  			previous.data("show", toShowPrev);
  			previous.data("hide", toHidePrev);
  			
        });
      	
      	
    	if (isZanaka || isVady) {            
        	next.removeClass('btn-success').addClass('btn-warning').html('Suivant');
		}
    	
    	return false;
    });

    next.click(function() {       
        if ($('#validation-form').valid()) {
            if (typeof next.data("show") == "undefined" && typeof next.data("hide") == "undefined") { // No more step from main
                
            } else {
            	previous.fadeIn('slow'); // Show previous button
            	toShowNext = next.data("show");
            	toHideNext = next.data("hide");
            	if (isZanaka) {
          			numberZanaka = parseInt($('input[name="isany"]').val());  
            	}
            	if (toShowNext == "#vady-form") { // The target is the spouse subform
//            		var subform = createVadyForm();
            		if (!$('.box-body').has(toShowNext).length) {
//            			removeVadyRule();
//                		$(toShowNext).remove();
                		var subform = createVadyForm();
                		$('.box-body').append($(subform));
                		addVadyRule();
            		}
//                  	$('.box-body').append($(subform));                    	               	
                  	$(toHideNext).fadeOut('slow'); // hide main form
                  	$(toShowNext).fadeIn('slow', function() {
//                  		addVadyRule();     
                  		toShowPrev = toHideNext;
              			toHidePrev = toShowNext;
              			previous.data("show", toShowPrev);
              			previous.data("hide", toHidePrev);             		
                  		if (isZanaka) {              			
                  			toHideNext = toShowNext;
                  			toShowNext = "#zanaka-form-0";
                  			next.data("show", toShowNext);
                  			next.data("hide", toHideNext);               		
                  		} else {
                  			next.addClass('btn-success').removeClass('btn-warning').html('Enregistrer');
                        	next.removeData("show");
                        	next.removeData("hide");
                  		}	
                  	});
            	} else { // The target is child subform
                	if (toHideNext == "#olona-form") {
                    	previous.fadeIn('slow');
                	}
                	var id = parseInt(toShowNext.slice(13));     	
                	if (id < numberZanaka) {
                		var nextId = id + 1;
                		var subform = createZanakaForm(id);
                		if ($('.box-body').has(toShowNext).length) {
                    		removeZanakaRule(id);
                    		$(toShowNext).remove();
                		}
                      	$('.box-body').append($(subform));                    	               	
                      	$(toHideNext).fadeOut('slow'); // hide previous form
                      	$(toShowNext).fadeIn('slow', function() {
                      		addZanakaRule(id);
							toShowPrev = toHideNext;
                  			toHidePrev = toShowNext;
                  			previous.data("show", toShowPrev);
                  			previous.data("hide", toHidePrev);
                  			toHideNext = toShowNext;
                  			toShowNext = "#zanaka-form-" + nextId;
                  			next.data("show", toShowNext);
                  			next.data("hide", toHideNext); 
                      		if (id == numberZanaka - 1) {
                      			next.addClass('btn-success').removeClass('btn-warning').html('Enregistrer');
                      			next.removeData("show");
                            	next.removeData("hide"); 		
                      		}
                      	});
                	}
            	}
            	return false;
            }            
        }
                
    });

    $('.input-mask-phone').inputmask('(999) 99 999 99');
    $("[data-mask]").inputmask();
    
    $('#validation-form').validate({
		errorElement: 'span',
		errorClass: 'help-block',
		focusInvalid: true,
		rules: {
			nom: {
				required: true,
				minlength: 5
			},
			datenaissance: 'date',
			statut: 'required',
			zanaka: 'required',
			isany: {
				required: true,
				min: 1
			},
			datesab: {
				required: true,
//				date: true
			},
			dateosotra: 'date'
		},

		messages: {
			nom: {
				required: "Ce champs est obligatoire",
				minlength: "Entrer au moins 5 caracteres"
			},
			datenaissance: {
				date: "Format mm/jj/yyy"
			},
			datesab: {
				required: "Ce champs est obligatoire",
				date: "Format mm/jj/yyy"
			},
			dateosotra: {
				date: "Format mm/jj/yyy"
			},
			statut: {
				required: "Choisir une option"
			},
			zanaka: {
				required: "Choisir une option"
			},
			isany: {
				required: "Ce champs est obligatoire",
				min: "Entrer un nombre positif"
			}
		},

		invalidHandler: function (event, validator) { //display error alert on form submit   
			$('.alert-error', $('.login-form')).show();
		},

		highlight: function (e) {
			$(e).closest('.form-group').addClass('has-error');
		},

		success: function (e) {
			$(e).closest('.form-group').removeClass('has-error');
			$(e).remove();
		},

		errorPlacement: function (error, element) {
			if(element.is(':checkbox') || element.is(':radio')) {
				$(element).closest('.form-group').append(error);
			}
			else if(element.is('.select2')) {
				error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
			}
			else if(element.is('.chzn-select')) {
				error.insertAfter(element.siblings('[class*="chzn-container"]:eq(0)'));
			}
			else if (element.parent().hasClass('input-group')) {
				error.insertAfter(element.parent());
			}
			else error.insertAfter(element);
		},

		submitHandler: function (form) {
			form.submit();
		},
		invalidHandler: function (form) {
		}
	});    
    
});

function createVadyForm() {
	var formId, showModal, imgPreview, nomName,
	prenomName, naissanceName, sexeName,
	phoneName, occupationName, datesabName, dateosotraClass,
	dateosotraName;

	formId = 'vady-form';
	showModal = 'vady-show-modal';
	imgPreview = 'vady-img-preview';
	nomName = 'vady-nom';
	prenomName = 'vady-prenom';
	naissanceName = 'vady-datenaissance';
	sexeName = 'vady-sexe';
	phoneName = 'vady-telephone';
	occupationName = 'vady-occupation';
	dateosotraClass = 'vady-datenanosorana';
	datesabName = 'vady-datesab';
	dateosotraName = 'vady-dateosotra';

	var form = '<div id="'+formId+'" style="display:none;"> \
	<h3 class="text-light-blue form-title">Mombamomba ny vady</h3> \
	<span class="col-md-4">	\
		<a class="fileinput-button '+showModal+'" href="#"> \
			<span class="upload-profile-picture change-image">	\
				<label class="" data-title="Modifier image"> \
					<span data-title="No File ..." class="'+imgPreview+'"><i class="fa fa-picture-o fa-5x"></i></span> \
				</label> \
			</span> \
		</a> \
	</span> \
	<span class="col-md-7"> \
		<div class="form-group"> \
			<input type="text" class="form-control" name="'+nomName+'" placeholder="Anarana"> \
		</div> \
		<div class="form-group"> \
			<input type="text" class="form-control" name="'+prenomName+'" placeholder="Fanampiny"> \
		</div> \
	</span> \
	<div class="clearfix"></div> \
	<hr/> \
	<span class="col-md-8 col-md-offset-2"> \
		<div class="form-group"> \
			<label for="'+naissanceName+'">Daty nahaterahana</label> \
			<div class="input-group"> \
	            <input type="text" class="form-control datepicker" name="'+naissanceName+'"> \
	            <span class="input-group-addon"><i class="fa fa-calendar"></i></span> \
	        </div> \
		</div> \
		<div class="form-group"> \
			<label for="'+sexeName+'">Sexe</label> \
			<label class="radio-inline"> \
				<input type="radio" class="form-control minimal" value="1" name="'+sexeName+'" checked="checked"/> \
				Lehilahy \
	        </label> \
	        <label class="radio-inline"> \
				<input type="radio" class="form-control minimal" value="2" name="'+sexeName+'"/> \
				Vehivavy \
	        </label> \
		</div> \
	</span> \
	<div class="clearfix"></div> \
	<hr/> \
	<span class="col-md-8 col-md-offset-2"> \
		<div class="form-group"> \
			<label for="'+phoneName+'">Finday</label> \
			<div class="input-group"> \
	            <input type="text" class="form-control input-mask-phone" name="'+phoneName+'"> \
	            <span class="input-group-addon"><i class="fa fa-phone"></i></span> \
	        </div> \
		</div> \
	</span> \
	<div class="clearfix"></div> \
	<h3 class="text-light-blue form-title">Asan\'ny vady</h3> \
	<span class="col-md-12"> \
		<div class="form-group"> \
			<label for="'+occupationName+'">Andraikitra</label> \
			<label class="radio-inline"> \
				<input type="radio" class="form-control minimal" value="1" name="'+occupationName+'" checked="checked"/> \
				Sekoly Ara-baiboly \
            </label> \
            <label class="radio-inline"> \
				<input type="radio" class="form-control minimal" value="2" name="'+occupationName+'"/> \
				Mpitandrina \
            </label> \
            <label class="radio-inline"> \
				<input type="radio" class="form-control minimal" value="3" name="'+occupationName+'"/> \
				Hafa \
	        </label> \
		</div> \
	</span> \
	<div class="clearfix"></div> \
	<span class="col-md-8 col-md-offset-2"> \
		<div class="form-group"> \
			<label for="'+datesabName+'">Daty nidirana SAB</label> \
			<div class="input-group"> \
	            <input type="text" class="form-control datepicker" name="'+datesabName+'"> \
	            <span class="input-group-addon"><i class="fa fa-calendar"></i></span> \
	        </div> \
		</div> \
		<div class="form-group '+dateosotraClass+'"> \
			<label for="'+dateosotraName+'">Daty nanosorana</label> \
			<div class="input-group"> \
	            <input type="text" class="form-control datepicker" name="'+dateosotraName+'"> \
	            <span class="input-group-addon"><i class="fa fa-calendar"></i></span> \
	        </div> \
		</div> \
	</span> \
	<div class="clearfix"></div> \
	</div><!-- /#'+formId+' -->';
	return form;
}

function addVadyRule() {
	var nomName, naissanceName, datesabName, dateosotraName, showModal, imgPreview;
	$('.box-title').html('Ajouter vady');
	
	nomName = 'vady-nom';
	naissanceName = 'vady-datenaissance';
	datesabName = 'vady-datesab';
	dateosotraName = 'vady-dateosotra';
	showModal = 'vady-show-modal';
	imgPreview = 'vady-img-preview';

	$('input[name="'+nomName+'"]').rules("add", {
    	required: true,
    	minlength: 5,
    	messages: {
			required: "Ce champs est obligatoire",
			minlength: "Entrer au moins 5 caracteres"
		}
    });
	
	$('input[name="'+naissanceName+'"]').rules("add", {
    	date: true,
    	messages: {
			date: "Format mm/jj/yyy"
		}
    });

	$('input[name="'+datesabName+'"]').rules("add", {
    	date: true,
    	messages: {
			date: "Format mm/jj/yyy"
		}
    });

	$('input[name="'+dateosotraName+'"]').rules("add", {
    	date: true,
    	messages: {
			date: "Format mm/jj/yyy"
		}
    });

	$("input[type='radio']").iCheck({
      	radioClass: 'iradio_minimal'
  	});
  
  	$('input[type="radio"].minimal').on('ifChecked', function(event){
      	var that = this;
  		$(that).valid();
	});
  	$('.input-mask-phone').inputmask('(999) 99 999 99');
  	$('.datepicker').datepicker();

  	$('.'+showModal).imageupload({
    	doCrop: true,
  		uploadUrl: ajaxUrl,
  		cropUrl: cropUrl,
  		fileName: 'vadyFileId',
  		imgPreview: imgPreview,
  		modalId: 'vadyUploadModal',
  		formId: 'vadyfileupload',
  		submitButton: 'vady-submit-button',
  		xs: 40,
		sm: 60,
		md: 100
  	}).bind('imageuploadcomplete', function(event, data) {
  		var deleteLink = '<a href="#" class="delete-vady-all remove-all" data-type="'+data.deleteType+'" \
  		data-url="'+data.deleteUrl+'" > \
          <i class="fa fa-times"></i> \
          </a>';
        $('.upload-profile-picture.change-image > label').toggleClass("cropped");  
  		$(this).before(deleteLink);
  	});  

	$(document).on('click', '.delete-vady-all', function(e) {
		e.preventDefault();
		var that = $(this);
		$.ajax({
			url: that.data("url"),
			type: that.data("type"),
			dataType: 'json',
			success: function(res) {
				if (res) {
					$('.vady-img-preview').html('<i class="fa fa-picture-o fa-5x"></i>');
					$('.upload-profile-picture.change-image > label').toggleClass("cropped");
					that.detach();
				}
			}
		});	
    }); 

	
}

function createZanakaForm(number) {
	var formId, nomName, prenomName, naissanceName, sexeName, classeName;
	
	formId = 'zanaka-form-'+number;
	nomName = 'zanaka-nom-'+number;
	prenomName = 'zanaka-prenom-'+number;
	naissanceName = 'zanaka-datenaissance-'+number;
	sexeName = 'zanaka-sexe-'+number;
	classeName = 'zanaka-classe-'+number;

	var form = '<div id="'+formId+'" style="display:none;"> \
	<h3 class="text-light-blue form-title">Mombamomba ny zanaka</h3> \
	<span class="col-md-8 col-md-offset-2"> \
		<div class="form-group"> \
			<label for="'+nomName+'">Anarana</label> \
			<input type="text" class="form-control" name="'+nomName+'"> \
		</div> \
		<div class="form-group"> \
			<label for="'+prenomName+'">Fanampiny</label> \
			<input type="text" class="form-control" name="'+prenomName+'"> \
		</div> \
		<div class="form-group"> \
			<label for="'+naissanceName+'">Daty nahaterahana</label> \
			<div class="input-group"> \
	            <input type="text" class="form-control datepicker" name="'+naissanceName+'"> \
	            <span class="input-group-addon"><i class="fa fa-calendar"></i></span> \
	        </div> \
		</div> \
		<div class="form-group"> \
			<label for="'+sexeName+'">Sexe</label> \
			<label class="radio-inline"> \
				<input type="radio" class="form-control minimal" value="1" name="'+sexeName+'" checked="checked"/> \
				Lehilahy \
	        </label> \
	        <label class="radio-inline"> \
				<input type="radio" class="form-control minimal" value="2" name="'+sexeName+'"/> \
				Vehivavy \
	        </label> \
		</div> \
		<div class="form-group"> \
			<label for="'+classeName+'">Kilasy</label> \
			<input type="text" class="form-control" name="'+classeName+'"> \
		</div> \
	</span> \
	<div class="clearfix"></div> \
	</div><!-- /#'+formId+' -->';
	return form;
}

function addZanakaRule(number) {
	var nomName, naissanceName;
	var num = number + 1;
	$('.box-title').html('Ajouter zanaka-' + num);
	
	nomName = 'zanaka-nom-'+number;
	naissanceName = 'zanaka-datenaissance-'+number;

	$('input[name="'+nomName+'"]').rules("add", {
    	required: true,
    	minlength: 5,
    	messages: {
			required: "Ce champs est obligatoire",
			minlength: "Entrer au moins 5 caracteres"
		}
    });
	
	$('input[name="'+naissanceName+'"]').rules("add", {
    	date: true,
    	messages: {
			date: "Format mm/jj/yyy"
		}
    });
	
	$("input[type='radio']").iCheck({
      	radioClass: 'iradio_minimal'
  	});
  
  	$('input[type="radio"].minimal').on('ifChecked', function(event){
      	var that = this;
  		$(that).valid();
	});
  	$('.datepicker').datepicker();
}

function removeVadyRule() {
	var nomName, naissanceName;
	nomName = 'vady-nom';
	naissanceName = 'vady-datenaissance';

	$('input[name="'+nomName+'"]').rules("remove");	
	$('input[name="'+naissanceName+'"]').rules("remove");
	$('.vady-show-modal').imageupload("destroy");
}

function removeZanakaRule(number) {
	var nomName, naissanceName;
	nomName = 'zanaka-nom-'+number;
	naissanceName = 'zanaka-datenaissance-'+number;

	$('input[name="'+nomName+'"]').rules("remove");	
	$('input[name="'+naissanceName+'"]').rules("remove");
}

//-->
</script>