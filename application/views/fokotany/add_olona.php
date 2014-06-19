<link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/datepicker3.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/select2/css/select2.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/select2/css/select2-bootstrap.css');?>">
<!-- iCheck for checkboxes and radio inputs -->
<link href="<?php echo base_url('assets/adminlte/css/iCheck/all.css');?>" rel="stylesheet" type="text/css" />
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Olona
		<small><?php echo $section_title; ?></small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo site_url('admin'); ?>"><i class="fa fa-dashboard"></i> Accueil</a></li>
		<li class="active">Olona</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<!-- left column -->
		<div class="col-md-6 col-md-offset-3">
			<!-- general form elements -->
			<div class="box box-primary">
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
							<?php if (isset($biraos) && count($biraos)) {?>
							<div class="form-group">
								<label for="birao">Birao</label>
								<select name="birao" id="birao" class="form-control select-birao">
									<option></option>
										<?php		
										foreach ($biraos as $item) {?>
											<option value="<?php echo $item['id']; ?>"><?php echo $item['fokotany']; ?></option>
										<?php }?>									
								</select>							
							</div>	
							<div class="form-group">
								<label for="karapokotany">Karapokotany</label>
								<input type="text" class="form-control select-karapokotany-admin" name="karapokotany" placeholder="Selectionner karapokotany">
							</div>
							<?php }?>
							<?php if (isset($karapokotanies) && count($karapokotanies)) {?>				
							<div class="form-group">
								<label for="karapokotany">Karapokotany</label>
								<select name="karapokotany" id="karapokotany" class="form-control select-karapokotany">
									<option></option>
										<?php									
										foreach ($karapokotanies as $item) {?>
											<option value="<?php echo $item->getId(); ?>"><?php echo $item->getLaharana(); ?></option>
										<?php }?>
								</select>							
							</div>
							<?php } ?>
							<div class="form-group">
								<label for="andraikitra">Andraikitra</label>
								<select name="andraikitra" class="form-control select-andraikitra">
									<option></option>
									<?php if (isset($andraikitras) && count($andraikitras)) {
										foreach ($andraikitras as $item) {?>
											<option value="<?php echo $item->getId(); ?>"><?php echo $item->getAnarana(); ?></option>
										<?php }
									}?>
								</select>
							</div>
							<div class="form-group">
								<label for="sex">Loham-pianakaviana</label>
								<label class="radio-inline">
									<input type="radio" class="form-control minimal" value="1" name="lohany"/>
									Eny
	                            </label>
	                            <label class="radio-inline">
									<input type="radio" class="form-control minimal" value="0" name="lohany"/>
									Tsia
	                            </label>
							</div>
							<div class="form-group">
								<label for="anarana">Anarana</label>
								<input type="text" class="form-control" name="anarana" placeholder="Anarana" value="<?php echo isset($anarana) ? $anarana : ''; ?>">
							</div>
							<div class="form-group">
								<label for="fanampiny">Fanampiny</label>
								<input type="text" class="form-control" name="fanampiny" placeholder="Fanampiny" value="<?php echo isset($fanampiny) ? $fanampiny : ''; ?>">
							</div>						
							<div class="form-group">
								<label for="nahaterahana">Daty nahaterahana</label>
								<input type="text" class="form-control datepicker" name="nahaterahana" placeholder="Daty nahaterahana" value="<?php echo isset($nahaterahana) ? $nahaterahana : ''; ?>">
							</div>
							<div class="form-group">
								<label for="sex">Sexe</label>
								<label class="radio-inline">
									<input type="radio" class="form-control minimal" value="1" name="sex"/>
									Lehilahy
	                            </label>
	                            <label class="radio-inline">
									<input type="radio" class="form-control minimal" value="2" name="sex"/>
									Vehivavy
	                            </label>
							</div>
							<div class="form-group">
								<label for="cin">Karapanondro</label>
								<input type="text" class="form-control" name="cin" value="<?php echo isset($cin) ? $cin : ''; ?>"  data-inputmask="'mask': ['999-999-999-999']" data-mask/>
							</div>
							<div class="form-group">
								<label for="date_cin">Nomena t@</label>
								<input type="text" class="form-control datepicker" name="date_cin" placeholder="Nomena t@" value="<?php echo isset($date_cin) ? $date_cin : ''; ?>">
							</div>
							<div class="form-group">
								<label for="asa">Asa</label>
								<input type="text" class="form-control select-asa" name="asa" placeholder="Asa" value="<?php echo isset($asa) ? $asa : ''; ?>">
							</div>	
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
<script src="<?php echo base_url('assets/select2/js/select2.min.js');?>"></script>
<script src="<?php echo base_url('assets/datepicker/js/bootstrap-datepicker.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.validate.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/additional-methods.min.js');?>"></script>
<script src="<?php echo base_url('assets/adminlte/js/plugins/iCheck/icheck.js');?>"></script>
<!-- InputMask -->
<script src="<?php echo base_url('assets/adminlte/js/plugins/input-mask/jquery.inputmask.js');?>" type="text/javascript"></script>

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
	var selectAndraikitra = $(".select-andraikitra").select2({
		minimumResultsForSearch: 10, 
		allowClear: true,
		placeholder: 'Selectionner andraikitra'
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