<link rel="stylesheet" href="<?php echo base_url('assets/select2/css/select2.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/select2/css/select2-bootstrap.css');?>">
<div class="form-box" id="login-box">
	<div class="header">Cr&eacute;er un nouveau compte</div>
	<form action="" method="post" id="validation-form">
		<div class="body bg-gray">
			<?php echo validation_errors(); ?>
			<?php if (isset($errors) && count($errors)) {
				foreach ($errors as $err) {?>
					<div class="alert-user alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<?php echo $err; ?>
					</div>
				<?php }				
			} ?>
			<div class="form-group">
				<input type="text" name="name" class="form-control" placeholder="Nom" value="<?php echo set_value('name'); ?>"/>
			</div>
			<div class="form-group">
				<input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email'); ?>"/>
			</div>
			<div class="form-group">
				<input type="password" name="password" class="form-control" placeholder="Mot de passe"/>
			</div>
			<div class="form-group">
				<input type="password" name="passwordVerify" class="form-control" placeholder="R&eacute;peter mot de passe"/>
			</div>
			<?php if (isset($roles) && count($roles)) {?>
			<div class="form-group">
				<select name="role" class="form-control select-role">
					<option></option>
					<?php foreach ($roles as $item) {?>
					<option value="<?php echo $item->getId(); ?>"><?php echo $item->getLibelle(); ?></option>
					<?php }?>
				</select>
			</div>
			<?php } ?>
			<?php if (isset($biraos) && count($biraos)) {?>
			<div class="form-group hide birao">
				<select name="birao" class="form-control select-birao">
					<option></option>
					<?php foreach ($biraos as $item) {?>
					<option value="<?php echo $item['id']; ?>"><?php echo $item['fokotany']; ?></option>
					<?php }?>
				</select>
			</div>
			<?php } ?>
		</div>
		<div class="footer bg-gray">
			<button type="submit" class="btn btn-success btn-block">Enregistrer</button>
			<?php if (!isset($hide_login)) {?>
				<a href="<?php echo site_url('user/login'); ?>" class="text-center">J'ai d&eacute;j&agrave; un compte</a>
			<?php }?>			
		</div>
	</form>
</div> 
<script src="<?php echo base_url('assets/select2/js/select2.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.validate.min.js');?>"></script>
<script type="text/javascript">

$(document).ready(function() {
	var selectRole = $(".select-role").select2({
		minimumResultsForSearch: 10, 
		placeholder: 'Sélectionner role',
		allowClear: true
	}).on('change', function(event){
		if(event.target == this){
			var roleId = event.val;
			if (roleId == 3) { // user_fokotany
				$('.birao').removeClass('hide');	
			} else {
				$('.birao').addClass('hide');
				$(".select-birao").select2("val", "");
			}
		}
	});	
	var selectBirao = $(".select-birao").select2({
		minimumResultsForSearch: 10, 
		placeholder: 'Sélectionner birao'
	});		
	$('#validation-form').validate({
		errorElement: 'span',
		errorClass: 'help-block',
		focusInvalid: false,
		rules: {
    		role:'required',
			birao: 'required'
		},

		messages: {
			birao: {
				required: "Misafidiana birao"
			},
			role: {
				required: "Misafidiana andraikitra"
			}
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
    selectBirao.change(function(){
        $(this).valid();
     });
    selectRole.change(function(){
        $(this).valid();
    });
});
</script>