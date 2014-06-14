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
						<div class="main-form">					
							<div class="form-group">
								<label for="karapokotany">Karapokotany</label>
								<select name="karapokotany" id="karapokotany" class="form-control select-karapokotany">
									<option></option>
									<?php if (isset($karapokotanies) && count($karapokotanies)) {
										foreach ($karapokotanies as $item) {?>
											<option value="<?php echo $item->getId(); ?>"><?php echo $item->getLaharana(); ?></option>
										<?php }
									}?>
								</select>							
							</div>
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
								<input type="text" class="form-control" name="anarana" placeholder="Anarana" value="<?php echo isset($anarana) ? $anarana : ''; ?> ">
							</div>
							<div class="form-group">
								<label for="fanampiny">Fanampiny</label>
								<input type="text" class="form-control" name="fanampiny" placeholder="Fanampiny" value="<?php echo isset($fanampiny) ? $fanampiny : ''; ?> ">
							</div>						
							<div class="form-group">
								<label for="nahaterahana">Daty nahaterahana</label>
								<input type="text" class="form-control datepicker" name="nahaterahana" placeholder="Daty nahaterahana" value="<?php echo isset($nahaterahana) ? $nahaterahana : ''; ?> ">
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
								<input type="text" class="form-control" name="cin" value="<?php echo isset($cin) ? $cin : ''; ?> "  data-inputmask="'mask': ['999-999-999-999']" data-mask/>
							</div>
							<div class="form-group">
								<label for="date_cin">Nomena t@</label>
								<input type="text" class="form-control datepicker" name="date_cin" placeholder="Nomena t@" value="<?php echo isset($date_cin) ? $date_cin : ''; ?> ">
							</div>
							<div class="form-group">
								<label for="asa">Asa</label>
								<input type="text" class="form-control select-asa" name="asa" placeholder="Asa" value="<?php echo isset($asa) ? $asa : ''; ?> ">
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
						<div class="vady-form" style="display:none;">
							<div class="form-group">
								<label for="vady-andraikitra">Andraikitra</label>
								<select name="vady-andraikitra" class="form-control select-andraikitra">
									<option></option>
									<?php if (isset($andraikitras) && count($andraikitras)) {
										foreach ($andraikitras as $item) {?>
											<option value="<?php echo $item->getId(); ?>"><?php echo $item->getAnarana(); ?></option>
										<?php }
									}?>
								</select>
							</div>
							<div class="form-group">
								<label for="vady-anarana">Anarana</label>
								<input type="text" class="form-control" name="vady-anarana">
							</div>
							<div class="form-group">
								<label for="vady-fanampiny">Fanampiny</label>
								<input type="text" class="form-control" name="vady-fanampiny">
							</div>						
							<div class="form-group">
								<label for="vady-nahaterahana">Daty nahaterahana</label>
								<input type="text" class="form-control datepicker" name="vady-nahaterahana">
							</div>
							<div class="form-group">
								<label for="vady-sex">Sexe</label>
								<label class="radio-inline">
									<input type="radio" class="form-control minimal" value="1" name="vady-sex"/>
									Lehilahy
	                            </label>
	                            <label class="radio-inline">
									<input type="radio" class="form-control minimal" value="2" name="vady-sex"/>
									Vehivavy
	                            </label>
							</div>
							<div class="form-group">
								<label for="vady-cin">Karapanondro</label>
								<input type="text" class="form-control" name="vady-cin"  data-inputmask="'mask': ['999-999-999-999']" data-mask/>
							</div>
							<div class="form-group">
								<label for="vady-date_cin">Nomena t@</label>
								<input type="text" class="form-control datepicker" name="vady-date_cin">
							</div>
							<div class="form-group">
								<label for="vady-asa">Asa</label>
								<input type="text" class="form-control select-asa" name="vady-asa">
							</div>	
						</div><!-- /.vady-form -->
					</div><!-- /.box-body -->
					<div class="box-footer">
						<button type="subselect2mit" class="btn btn-primary btn-previous" style="display:none;">Pr&eacute;c&eacute;dent</button>						
						<button type="subselect2mit" class="btn btn-success pull-right btn-next">Enregistrer</button>
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
var andraikitras = <?php echo json_encode($listAndraikitras); ?>

jQuery(document).ready(function() {
	var selectKarapokotany = jQuery(".select-karapokotany").select2({minimumResultsForSearch: 10, placeholder: 'Selectionner karapokotany'});
	var selectAndraikitra = jQuery(".select-andraikitra").select2({minimumResultsForSearch: 10, placeholder: 'Selectionner andraikitra'});

	jQuery('.datepicker').datepicker();

	var next = $('.btn-next');
	var previous = $('.btn-previous');

	var isVady, isZanaka, numberZanaka, selectZAndraikitra = {};

	jQuery('input[type="radio"].minimal').on('ifChecked', function(event){
    	jQuery(this).valid();
	});
	
	
    $('body').on('ifChecked', 'input[name="vady"].minimal, input[name="zanaka"].minimal', function(event){
    	isVady = $('input[name="vady"]:checked').val();
		isZanaka = $('input[name="zanaka"]:checked').val();
    	
    	if (isZanaka == 1) {
            $('.childnumber').removeClass('hide');
            
        } else {
        	$('.childnumber').addClass('hide');
        }
        if ((isZanaka == 1) || (isVady == 1)) {
            
        	next.removeClass('btn-success').addClass('btn-warning').html('Suivant');
        } else {
        	next.addClass('btn-success').removeClass('btn-warning').html('Enregistrer');
        	//previous.fadeOut('slow');
        }
        if (isVady == 1) {
            next.addClass('step-vady');
        } else {
        	next.removeClass('step-vady');
        }
        if (isZanaka == 1) {
        	next.addClass('step-zanaka').attr('id', 'zanaka-0');
        } else {
        	next.removeClass('step-zanaka').removeAttr('id');
        }
    });

    next.click(function() {       
        if ($('#validation-form').valid()) {
        	if (isZanaka == 1) { // adding zanaka subform to .box-body
            	numberZanaka = parseInt($('input[name="isany"]').val());
            	if (numberZanaka > 0) {
                	for (var i = 0; i < numberZanaka; i++) {
                    	if ($('.zanaka-form-'+i).length > 0) {
                    		$('.zanaka-form-'+i).remove();
                    	}
                		var subform = createSubForm(i);
                        $('.box-body').append($(subform));

                        $("input[type='radio']").iCheck({
                            radioClass: 'iradio_minimal'
                        });
                        
                        $('input[type="radio"].minimal').on('ifChecked', function(event){
                            var that = this;
                        	$(that).valid();
                    	});
                        selectZAndraikitra[i] = jQuery(".select-zanaka-andraikitra-"+i).select2({minimumResultsForSearch: 10, placeholder: 'Selectionner andraikitra'});
                        selectZAndraikitra[i].change(function(){
                            $(this).valid();
                        });
                	}
            		
            	}
        	}
        	if ($(this).hasClass('step-vady')) { // add vady info
            	previous.fadeIn('slow');
            	previous.addClass('step-main');
            	$('.box-title').html('Ajouter vady');
            	if (isZanaka != 1) {
            		next.addClass('btn-success').removeClass('btn-warning').removeClass('step-vady').addClass('btn-save').html('Enregistrer');
            	} else {
            		next.removeClass('btn-success').removeClass('btn-save').addClass('btn-warning').html('Suivant');
            	}
                $('.main-form').fadeOut('slow'); // hide main form
                $('.vady-form').fadeIn('slow', function() {
                	$('select[name="vady-andraikitra"]').rules("add", {
                    	required: true,
                    	messages: {
                    	    required: "Inona no andraikiny?"
                		}
                    });
                	$('input[name="vady-anarana"]').rules("add", {
                    	required: true,
                    	minlength: 5,
                    	messages: {
	                		required: "Iza no anarany?",
	        				minlength: "Litera 5 fara-fahakeliny"
                		}
                    });
                	$('input[name="vady-sex"]').rules("add", {
                    	required: true,
                    	messages: {
                			required: "Lahy sa vavy?"
                		}
                    });
                	$('input[name="vady-nahaterahana"]').rules("add", {
                    	date: true,
                    	messages: {
                			date: "Daty mm/dd/yyyy"
                		}
                    });
                	$('input[name="vady-date_cin"]').rules("add", {
                    	date: true,
                    	messages: {
                			date: "Daty mm/dd/yyyy"
                		}
                    });
                });                
                
            } else if ($(this).hasClass('step-zanaka')) {
                if (numberZanaka > 0) {
                	previous.fadeIn('slow');
                	previous.addClass('step-main');
                    var step = parseInt($(this).attr('id').slice(7));
                    var suiv = step + 1;
                    $('.box-title').html('Ajouter zanaka ' + suiv);
                    if (step == numberZanaka - 1) {
                    	next.addClass('btn-success').removeClass('btn-warning').removeClass('step-zanaka').addClass('btn-save').html('Enregistrer');
                    } else {
                    	next.attr('id', 'zanaka-'+suiv);
                    }    
                    if (step > 0) {
                        var prev = step - 1;
                    	$('.zanaka-form-'+prev).fadeOut('slow');   
                        previous.removeClass('step-main').addClass('step-zanaka').attr('id', 'zanaka-'+prev);                 	
                    } else {
                        if ($('.vady-form').css('display') == 'block') {
                        	previous.removeClass('step-main').addClass('step-vady');
                        	$('.vady-form').fadeOut('slow');
                        } else {
                        	$('.main-form').fadeOut('slow');
                        }
                    	
                    }                	
                	
                    $('.zanaka-form-'+step).fadeIn('slow', function() {
                    	$('select[name="zanaka-andraikitra-'+step+'"]').rules("add", {
                        	required: true,
                        	messages: {
                        	    required: "Inona no andraikiny?"
                    		}
                        });
                    	$('input[name="zanaka-anarana-'+step+'"]').rules("add", {
                        	required: true,
                        	minlength: 5,
                        	messages: {
                        		required: "Iza no anarany?",
                    			minlength: "Litera 5 fara-fahakeliny"
                    		}
                        });
                    	$('input[name="zanaka-sex-'+step+'"]').rules("add", {
                        	required: true,
                        	messages: {
                    			required: "Lahy sa vavy?"
                    		}
                        });
                    	$('input[name="zanaka-nahaterahana-'+step+'"]').rules("add", {
                        	date: true,
                        	messages: {
                    			date: "Daty mm/dd/yyyy"
                    		}
                        });
                    	$('input[name="zanaka-date_cin-'+step+'"]').rules("add", {
                        	date: true,
                        	messages: {
                    			date: "Daty mm/dd/yyyy"
                    		}
                        });
                    });
                }
            }
        }
                
    });

    previous.click(function() {
    	if ($(this).hasClass('step-main')) { // STEP 0 : go back to main info
        	previous.removeClass('step-main');
        	previous.fadeOut('slow');
        	if (isZanaka == 1) {
            	next.addClass('step-zanaka').attr('id', 'zanaka-0');
            } else {
            	next.removeClass('step-zanaka').removeAttr('id');
            }
        	$('.box-title').html('Ajouter olona');
        	if ((isZanaka == 1) || (isVady == 1)) {
            	next.removeClass('btn-success').addClass('btn-warning').html('Suivant');
            } else {
            	next.addClass('btn-success').removeClass('btn-warning').html('Enregistrer');            	
            }
            if (isVady == 1) {
                next.addClass('step-vady');
            } else {
            	next.removeClass('step-vady');
            }    
            if ($('.vady-form').css('display') == 'block') {
            	$('.main-form').fadeIn('slow');
                $('.vady-form').fadeOut('slow');
            } else {
            	$('.main-form').fadeIn('slow');
            	$('.zanaka-form-0').fadeOut('slow');
            }	
            
            
        } else if ($(this).hasClass('step-vady')) {
        	previous.removeClass('step-vady').addClass('step-main');
        	$('.box-title').html('Ajouter vady');
        	if (isVady == 1) {
                next.addClass('step-zanaka');
            } else {
            	next.removeClass('step-zanaka');
            }    	
        	if (isZanaka == 1) {
        		next.removeClass('btn-success').removeClass('btn-save').addClass('btn-warning').html('Suivant');
        	}
            $('.vady-form').fadeIn('slow');
            $('.zanaka-form-0').fadeOut('slow');
        }
    });
   
    $("[data-mask]").inputmask();
    
    $('#validation-form').validate({
		errorElement: 'span',
		errorClass: 'help-block',
		focusInvalid: false,
		rules: {
    		karapokotany: {
				required: true
			},
			andraikitra: {
				required: true
			},
			anarana: {
				required: true,
				minlength: 5
			},
			lohany: {
				required: true,
			},
			sex: {
				required: true
			},
			nahaterahana: {
				date: true
			},
			date_cin: {
				date: true
			},
			vady: 'required',
			zanaka: 'required',
			isany: {
				required: true,
				digits: true
			}
		},

		messages: {
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
				digits: "Mampidira isa"
			},
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
				/*var controls = element.closest('.controls');
				if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
				else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));*/
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
		},
		invalidHandler: function (form) {
		}
	});    
    selectKarapokotany.change(function(){
        jQuery(this).valid();
     });
    selectAndraikitra.change(function(){
        jQuery(this).valid();
    });
});

function createSubForm(number, isVady) {
	var formClass, andraikitraName, selectClass,
	anaranaName, fanampinyName, nahaterahanaName,
	sexName, cinName, date_cinName, asaName;

	if (isVady) {
		formClass = 'vady-form';
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
		formClass = 'zanaka-form-'+number;
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
	
	var form = '<div class="'+formClass+'" style="display:none;"> \
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
//-->
</script>