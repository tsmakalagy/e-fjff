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
		<div class="col-md-10 col-md-offset3">
			
			<h4 class="lighter">
								<i class="icon-hand-right icon-animated-hand-pointer blue"></i>
								<a href="#modal-wizard" data-toggle="modal" class="pink"> Wizard Inside a Modal Box </a>
							</h4>
			
								<div id="fuelux-wizard" data-target="#modal-step-contents">
									<ul class="wizard-steps clearfix">
										<li data-target="#modal-step1" class="active">
											<span class="step">1</span>
											<span class="title">Validation states</span>
										</li>

										<li data-target="#modal-step2">
											<span class="step">2</span>
											<span class="title">Alerts</span>
										</li>

										<li data-target="#modal-step3">
											<span class="step">3</span>
											<span class="title">Payment Info</span>
										</li>

										<li data-target="#modal-step4">
											<span class="step">4</span>
											<span class="title">Other Info</span>
										</li>
									</ul>
								</div>

								<div class="step-content" id="modal-step-contents">
									<div class="step-pane active" id="modal-step1">
										<div class="center">
											<h4 class="blue">Step 1</h4>
										</div>
									</div>

									<div class="step-pane" id="modal-step2">
										<div class="center">
											<h4 class="blue">Step 2</h4>
										</div>
									</div>

									<div class="step-pane" id="modal-step3">
										<div class="center">
											<h4 class="blue">Step 3</h4>
										</div>
									</div>

									<div class="step-pane" id="modal-step4">
										<div class="center">
											<h4 class="blue">Step 4</h4>
										</div>
									</div>
								</div>

								<div class="wizard-actions">
									<button class="btn btn-small btn-prev">
										<i class="icon-arrow-left"></i>
										Prev
									</button>

									<button class="btn btn-success btn-small btn-next" data-last="Finish ">
										Next
										<i class="icon-arrow-right icon-on-right"></i>
									</button>
									
								</div>
								
								
			
			
		</div><!--/.col (right) -->
	</div>   <!-- /.row -->
</section><!-- /.content -->
<script src="<?php echo base_url('assets/select2/js/select2.min.js');?>"></script>
<script src="<?php echo base_url('assets/datepicker/js/bootstrap-datepicker.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.validate.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/additional-methods.min.js');?>"></script>
<script src="<?php echo base_url('assets/adminlte/js/plugins/iCheck/icheck.js');?>"></script>
<script src="<?php echo base_url('assets/adminlte/js/plugins/fuelux/fuelux.wizard.min.js');?>"></script>
<script src="<?php echo base_url('assets/adminlte/js/ace-elements.min.js');?>"></script>
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
	$('#fuelux-wizard').ace_wizard();
	var selectKarapokotany = jQuery(".select-karapokotany").select2({minimumResultsForSearch: 10, placeholder: 'Selectionner karapokotany'});
	var selectAndraikitra = jQuery(".select-andraikitra").select2({minimumResultsForSearch: 10, placeholder: 'Selectionner andraikitra'});

	jQuery('.datepicker').datepicker();

	var next = $('.btn-next');
	var previous = $('.btn-previous');

	var isVady, isZanaka, numberZanaka, selectZAndraikitra = {};

	jQuery('input[type="radio"].minimal').on('ifChecked', function(event){
    	jQuery(this).valid();
	});
	
	
    jQuery('input[name="vady"].minimal, input[name="zanaka"].minimal').on('ifChecked', function(event){
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

function createSubForm(number) {
	var form = '<div class="zanaka-form-'+number+'" style="display:none;"> \
		<div class="form-group"> \
			<label for="zanaka-andraikitra-'+number+'">Andraikitra</label> \
			<select name="zanaka-andraikitra-'+number+'" class="form-control select-zanaka-andraikitra-'+number+'"> \
				<option></option>';
	for (i = 0; i < andraikitras.length; i++) {
		form += '<option value="'+andraikitras[i].id+'">'+andraikitras[i].anarana+'</option>';
	}
	form += '</select> \
		</div> \
		<div class="form-group"> \
			<label for="zanaka-anarana-'+number+'">Anarana</label> \
			<input type="text" class="form-control" name="zanaka-anarana-'+number+'"> \
		</div> \
		<div class="form-group"> \
			<label for="zanaka-fanampiny-'+number+'">Fanampiny</label> \
			<input type="text" class="form-control" name="zanaka-fanampiny-'+number+'"> \
		</div> \
		<div class="form-group"> \
			<label for="zanaka-nahaterahana-'+number+'">Daty nahaterahana</label> \
			<input type="text" class="form-control datepicker" name="zanaka-nahaterahana-'+number+'"> \
		</div> \
		<div class="form-group"> \
			<label for="zanaka-sex-'+number+'">Sexe</label> \
			<label class="radio-inline"> \
				<input type="radio" class="form-control minimal" value="1" name="zanaka-sex-'+number+'"/> \
				Lehilahy \
    		</label> \
    		<label class="radio-inline"> \
				<input type="radio" class="form-control minimal" value="2" name="zanaka-sex-'+number+'"/> \
				Vehivavy \
    		</label> \
		</div> \
		<div class="form-group"> \
			<label for="zanaka-cin-'+number+'">Karapanondro</label> \
			<input type="text" class="form-control" name="zanaka-cin-'+number+'"  data-inputmask="\'mask\': [\'999-999-999-999\']" data-mask/> \
		</div> \
		<div class="form-group"> \
			<label for="zanaka-date_cin-'+number+'">Nomena t@</label> \
			<input type="text" class="form-control datepicker" name="zanaka-date_cin-'+number+'"> \
		</div> \
		<div class="form-group"> \
			<label for="zanaka-asa-'+number+'">Asa</label> \
			<input type="text" class="form-control select-asa" name="zanaka-asa-'+number+'"> \
		</div> \
	</div>';	
	return form;
}
//-->
</script>