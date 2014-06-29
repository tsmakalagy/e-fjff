<link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/font-awesome.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/datepicker3.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/select2/css/select2.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/select2/css/select2-bootstrap.css');?>">
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
							<span class="col-md-5">
								<a class="fileinput-button show-modal" href="#">
									<span class="upload-profile-picture">
										<label class="" data-title="Modifier image">
											<span data-title="No File ..." class=""><i class="fa fa-picture-o fa-5x"></i></span>									
										</label>
									</span>
								</a>
							</span>
							<span class="col-md-7">
								<div class="form-group">
									<input type="text" class="form-control" name="nom" placeholder="Anarana" value="<?php echo isset($anarana) ? $anarana : ''; ?>">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" name="prenom" placeholder="Fanampiny" value="<?php echo isset($fanampiny) ? $fanampiny : ''; ?>">
								</div>
							</span>
							<div class="clearfix"></div>
							<hr/>
							<span class="col-md-8 col-md-offset-2">
								<div class="form-group">
									<label for="nahaterahana">Daty nahaterahana</label>
									<input type="text" class="form-control datepicker" name="datenaissance" value="<?php echo isset($nahaterahana) ? $nahaterahana : ''; ?>">
								</div>
								<div class="form-group">
									<label for="sexe">Sexe</label>
									<label class="radio-inline">
										<input type="radio" class="form-control minimal" value="1" name="sexe" selected="selected"/>
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
									<label for="vady">Manam-bady</label>
									<label class="radio-inline">
										<input type="radio" class="form-control minimal" value="1" name="vady" />
										Eny
		                            </label>
		                            <label class="radio-inline">
										<input type="radio" class="form-control minimal" value="0" name="vady" />
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
										<input type="radio" class="form-control minimal" value="0" name="zanaka" />
										Tsia
		                            </label>
								</div>
								<div class="form-group hide childnumber">
									<label for="isany">Isan'ny zanaka</label>
									<input type="text" class="form-control" name="isany">
								</div>	
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

<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <div class="template-upload">
	<span class="preview"></span>
	<strong class="error red"></strong>
	<p class="size">Processing...</p>
        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="bar progress-bar-success" style="width:0%;"></div></div>
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
		<span class="profile-picture"><img src="{%=file.mediumUrl%}" id="target"></span>
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
<script src="<?php echo base_url('assets/file-upload/js/upload.godana.js');?>"></script>

<script type="text/javascript">
<!--
<?php
$listAndraikitras = array(); 
if (isset($andraikitras) && count($andraikitras)) {
	foreach ($andraikitras as $item) {
		array_push($listAndraikitras, array('id' => $item->getId(), 'anarana' => $item->getAnarana()));
	}
}?>
var andraikitras = <?php echo json_encode($listAndraikitras); ?>;
var karapokotany_url = "<?php echo site_url('fokotany/karapokotany/ajax'); ?>";
var ajaxUrl = "<?php echo site_url('upload'); ?>";
var cropUrl = "<?php echo site_url('crop'); ?>";
function format(item) { return item.text; };

$(document).ready(function() {
	var selectBirao = $(".select-birao").select2({
		minimumResultsForSearch: 10,
		allowClear: true, 
		placeholder: 'Selectionner birao'
	});
	var selectKarapokotany = $(".select-karapokotany").select2({
		minimumResultsForSearch: 10, 
		allowClear: true,
		placeholder: 'Selectionner karapokotany'
	});
	var selectAndraikitra = $(".select-occupation").select2({
		minimumResultsForSearch: 10, 
		allowClear: true,
		placeholder: 'Selectionner andraikitra'
	});

	$('.show-modal').imageupload({
		doCrop: true,
		uploadUrl: ajaxUrl,
		cropUrl: cropUrl
	});	


	var karapokotany_opts = {};

	selectBirao.on('change', function(event){
		$(this).valid();
		if(event.target == this){
			var biraoId = event.val;
			if (biraoId > 0) {
				var url = karapokotany_url + "/" + biraoId;
				var data = {results: []};
				$.ajax({
					url: url,
					dataType: 'json',
					success: function(res) {
						data.results = res;
						karapokotany_opts = {
							placeholder: "Selectionner karapokotany",
							allowClear: true,
							minimumResultsForSearch: 10,
							query: function(query) {
								query.callback(data);
							}
						};
						$(".select-karapokotany-admin").data("s3opts", karapokotany_opts).
							select2(karapokotany_opts).
							on('change', function() {
								$(this).valid();
							});
					}
				});	
			}	
		}
	});

	$('.datepicker').datepicker();

	var next = $('.btn-next');
	var previous = $('.btn-previous');

	var isVady, isZanaka, previousTarget, nextTarget, previousForm, 
		numberZanaka, selectVAndraikitra, selectZAndraikitra = {},
		shown, toShowNext, toHideNext, toShowPrev, toHidePrev;

	$('input[type="radio"].minimal').on('ifChecked', function(event){
    	$(this).valid();
	});
	
	
    $('body').on('ifChecked', 'input[name="vady"].minimal, input[name="zanaka"].minimal', function(event){
    	var vadyCheckbox = $('input[name="vady"]:checked').val();
		var zanakaCheckbox = $('input[name="zanaka"]:checked').val();

		if (vadyCheckbox == 1) {
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
            		var subform = createSubForm(true);
            		if ($('.box-body').has(toShowNext).length) {
            			removeRule(true);
                		$(toShowNext).remove();
            		}
                  	$('.box-body').append($(subform));                    	               	
                  	$(toHideNext).fadeOut('slow'); // hide main form
                  	$(toShowNext).fadeIn('slow', function() {
                  		addRule(true);     
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
                		var subform = createSubForm(false, id);
                		if ($('.box-body').has(toShowNext).length) {
                    		removeRule(false, id);
                    		$(toShowNext).remove();
                		}
                      	$('.box-body').append($(subform));                    	               	
                      	$(toHideNext).fadeOut('slow'); // hide previous form
                      	$(toShowNext).fadeIn('slow', function() {
                      		addRule(false, id);
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

   
    $("[data-mask]").inputmask();
    
    $('#validation-form').validate({
		errorElement: 'span',
		errorClass: 'help-block',
		focusInvalid: false,
		rules: {
			birao: 'required',
    		karapokotany:'required',
			andraikitra: 'required',
			anarana: {
				required: true,
				minlength: 5
			},
			lohany: 'required',
			sex: 'required',
			nahaterahana: 'date',
			date_cin: 'date',
			vady: 'required',
			zanaka: 'required',
			isany: {
				required: true,
				min: 1
			}
		},

		messages: {
			birao: {
				required: "Misafidiana birao"
			},
			karapokotany: {
				required: "Misafidiana karapokotany"
			},
			andraikitra: {
				required: "Inona no andraikiny?"
			},
			lohany: {
				required: "Loham-pianakaviana ve?"
			},
			nahaterahana: {
				date: "Daty mm/dd/yyyy"
			},
			dae_cin: {
				date: "Daty mm/dd/yyyy"
			},
			sex: {
				required: "Lahy sa vavy?"
			},
			anarana: {
				required: "Iza no anarany?",
				minlength: "Litera 5 fara-fahakeliny"
			},
			vady: {
				required: "Manam-bady ve?"
			},
			zanaka: {
				required: "Manan-janaka ve?"
			},
			isany: {
				required: "Firy ny isany?",
				min: "Isa mihoatra ny 0"
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
			else error.insertAfter(element);
		},

		submitHandler: function (form) {
			form.submit();
		},
		invalidHandler: function (form) {
		}
	});    
    selectKarapokotany.change(function(){
        $(this).valid();
     });
    selectAndraikitra.change(function(){
        $(this).valid();
    });
});

function createSubForm(isVady, number) {
	var formId, andraikitraName, selectClass,
	anaranaName, fanampinyName, nahaterahanaName,
	sexName, cinName, date_cinName, asaName;

	if (isVady) {
		formId = 'vady-form';
		andraikitraName = 'vady-andraikitra';
		selectClass = 'select-vady-andraikitra';
		anaranaName = 'vady-anarana';
		fanampinyName = 'vady-fanampiny';
		nahaterahanaName = 'vady-nahaterahana';
		sexName = 'vady-sex';
		cinName = 'vady-cin';
		date_cinName = 'vady-date_cin';
		asaName = 'vady-asa';
	} else {
		formId = 'zanaka-form-'+number;
		andraikitraName = 'zanaka-andraikitra-'+number;
		selectClass = 'select-zanaka-andraikitra-'+number;
		anaranaName = 'zanaka-anarana-'+number;
		fanampinyName = 'zanaka-fanampiny-'+number;
		nahaterahanaName = 'zanaka-nahaterahana-'+number;
		sexName = 'zanaka-sex-'+number;
		cinName = 'zanaka-cin-'+number;
		date_cinName = 'zanaka-date_cin-'+number;
		asaName = 'zanaka-asa-'+number;
	}
	
	var form = '<div id="'+formId+'" style="display:none;"> \
		<div class="form-group"> \
			<label for="'+andraikitraName+'">Andraikitra</label> \
			<select name="'+andraikitraName+'" class="form-control '+selectClass+'"> \
				<option></option>';
	for (i = 0; i < andraikitras.length; i++) {
		form += '<option value="'+andraikitras[i].id+'">'+andraikitras[i].anarana+'</option>';
	}
	form += '</select> \
		</div> \
		<div class="form-group"> \
			<label for="'+anaranaName+'">Anarana</label> \
			<input type="text" class="form-control" name="'+anaranaName+'"> \
		</div> \
		<div class="form-group"> \
			<label for="'+fanampinyName+'">Fanampiny</label> \
			<input type="text" class="form-control" name="'+fanampinyName+'"> \
		</div> \
		<div class="form-group"> \
			<label for="'+nahaterahanaName+'">Daty nahaterahana</label> \
			<input type="text" class="form-control datepicker" name="'+nahaterahanaName+'"> \
		</div> \
		<div class="form-group"> \
			<label for="'+sexName+'">Sexe</label> \
			<label class="radio-inline"> \
				<input type="radio" class="form-control minimal" value="1" name="'+sexName+'"/> \
				Lehilahy \
    		</label> \
    		<label class="radio-inline"> \
				<input type="radio" class="form-control minimal" value="2" name="'+sexName+'"/> \
				Vehivavy \
    		</label> \
		</div> \
		<div class="form-group"> \
			<label for="'+cinName+'">Karapanondro</label> \
			<input type="text" class="form-control" name="'+cinName+'"  data-inputmask="\'mask\': [\'999-999-999-999\']" data-mask/> \
		</div> \
		<div class="form-group"> \
			<label for="'+date_cinName+'">Nomena t@</label> \
			<input type="text" class="form-control datepicker" name="'+date_cinName+'"> \
		</div> \
		<div class="form-group"> \
			<label for="'+asaName+'">Asa</label> \
			<input type="text" class="form-control select-asa" name="'+asaName+'"> \
		</div> \
	</div>';	
	return form;
}

function addRule(isVady, number) {
	var selectClass, andraikitraName, anaranaName, nahaterahanaName,
		sexName, date_cinName, select2Andraikitra;

	if (isVady) {
		$('.box-title').html('Ajouter vady');
		selectClass = 'select-vady-andraikitra';
		andraikitraName = 'vady-andraikitra';
		anaranaName = 'vady-anarana';
		nahaterahanaName = 'vady-nahaterahana';
		sexName = 'vady-sex';
		date_cinName = 'vady-date_cin';
	} else {
		var num = number + 1;
		$('.box-title').html('Ajouter zanaka-' + num);
		selectClass = 'select-zanaka-andraikitra-'+number;
		andraikitraName = 'zanaka-andraikitra-'+number;
		anaranaName = 'zanaka-anarana-'+number;
		nahaterahanaName = 'zanaka-nahaterahana-'+number;
		sexName = 'zanaka-sex-'+number;
		date_cinName = 'zanaka-date_cin-'+number;
	}
	$('select[name="'+andraikitraName+'"]').rules("add", {
    	required: true,
    	messages: {
    	    required: "Inona no andraikiny?"
		}
    });
	$('input[name="'+anaranaName+'"]').rules("add", {
    	required: true,
    	minlength: 5,
    	messages: {
    		required: "Iza no anarany?",
			minlength: "Litera 5 fara-fahakeliny"
		}
    });
	$('input[name="'+sexName+'"]').rules("add", {
    	required: true,
    	messages: {
			required: "Lahy sa vavy?"
		}
    });
	$('input[name="'+nahaterahanaName+'"]').rules("add", {
    	date: true,
    	messages: {
			date: "Daty mm/dd/yyyy"
		}
    });
	$('input[name="'+date_cinName+'"]').rules("add", {
    	date: true,
    	messages: {
			date: "Daty mm/dd/yyyy"
		}
    });

	$("input[type='radio']").iCheck({
      	radioClass: 'iradio_minimal'
  	});
  
  	$('input[type="radio"].minimal').on('ifChecked', function(event){
      	var that = this;
  		$(that).valid();
	});
  	select2Andraikitra = $('.'+selectClass).select2({
  	  	minimumResultsForSearch: 10, 
  	  	placeholder: 'Selectionner andraikitra'
  	});
  	select2Andraikitra.change(function(){
      	$(this).valid();
  	});
  	$("[data-mask]").inputmask();
  	$('.datepicker').datepicker();
}

function removeRule(isVady, number) {
	var andraikitraName, anaranaName, nahaterahanaName,
		sexName, date_cinName;

	if (isVady) {
		andraikitraName = 'vady-andraikitra';
		anaranaName = 'vady-anarana';
		nahaterahanaName = 'vady-nahaterahana';
		sexName = 'vady-sex';
		date_cinName = 'vady-date_cin';
	} else {
		andraikitraName = 'zanaka-andraikitra-'+number;
		anaranaName = 'zanaka-anarana-'+number;
		nahaterahanaName = 'zanaka-nahaterahana-'+number;
		sexName = 'zanaka-sex-'+number;
		date_cinName = 'zanaka-date_cin-'+number;
	}
	$('select[name="'+andraikitraName+'"]').rules("remove");
	$('input[name="'+anaranaName+'"]').rules("remove");
	$('input[name="'+sexName+'"]').rules("remove");
	$('input[name="'+nahaterahanaName+'"]').rules("remove");
	$('input[name="'+date_cinName+'"]').rules("remove");
}

//-->
</script>