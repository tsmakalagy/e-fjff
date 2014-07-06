<link rel="stylesheet" href="<?php echo base_url('assets/select2/css/select2.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/select2/css/select2-bootstrap.css');?>">
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Eglise
		<small><?php echo $section_title; ?></small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo site_url('admin'); ?>"><i class="fa fa-dashboard"></i> Accueil</a></li>
		<li class="active">Eglise</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<!-- left column -->
		<div class="col-md-6 col-md-offset-3">
			<!-- general form elements -->
			<div class="box box-solid box-primary">
				<div class="box-header">
					<h3 class="box-title"><?php echo $section_title; ?></h3>
				</div><!-- /.box-header -->
				<!-- form start -->
				<form role="form" method="post" action="" id="validation-form">
					<div class="box-body">
						<?php echo validation_errors(); ?>
						<?php if (isset($success) && strlen($success)) {?>
							<div class="alert-user alert alert-success alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<?php echo $success; ?>
							</div>
						<?php }?>						
						<div class="form-group">
							<label for="fokotany">Fokotany</label>
							<input type="text" class="form-control select-fokotany" name="fokotany" placeholder="Selectionner fokotany">
						</div>
						<div class="form-group">
							<label for="nom">Anarana</label>
							<input type="text" class="form-control" name="nom" >
						</div>
					</div><!-- /.box-body -->
					<div class="box-footer">
						<button type="submit" class="btn btn-success pull-right">Enregistrer</button>
						<div class="clearfix"></div>					
					</div>
				</form>
			</div><!-- /.box -->
		</div><!--/.col (right) -->
	</div>   <!-- /.row -->
</section><!-- /.content -->
<script src="<?php echo base_url('assets/select2/js/select2.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.validate.min.js');?>"></script>
<script type="text/javascript">
<!--
var fokotany_url = "<?php echo site_url('fokotany/ajax'); ?>";
function format(item) { return item.text + ' - <strong>' + item.district + '</strong>'; };

$(document).ready(function() {
	var fokotany_opts = {};
	
	fokotany_opts = {
		placeholder: "Rechercher fokotany",
		minimumInputLength: 2,
		allowClear: true, 
		ajax: {
			url: fokotany_url,
			dataType: 'json',
			quietMillis: 100,
			data: function (term, page) {
				return {
					q: term, // search term
				};
			},
			results: function (data, page) { 
				return {results: data};
			}
		},
		formatSelection: format,
		formatResult: format
	};
	var selectFokotany = $(".select-fokotany").data("s3opts", fokotany_opts).select2(fokotany_opts);
	$('#validation-form').validate({
		errorElement: 'span',
		errorClass: 'help-block',
		focusInvalid: false,
		rules: {
			nom: {
				required: true,
				minlength: 5
			},
			fokotany: 'required'
		},

		messages: {
			nom: {
				required: "Ce champs est obligatoire",
				minlength: "Entrer au moins 5 caracteres"
			},
			fokotany: {
				required: "Choisir une option"
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

	selectFokotany.change(function(){
        $(this).valid();
     });
});
//-->
</script>
