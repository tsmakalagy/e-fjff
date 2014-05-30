<script type="text/javascript" src="<?php echo base_url()."assets/js/util/jquery.validate.js" ?>"></script>
  <div class="modal-content modal-register" style="display:none;">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h1 class="text-center">Register</h1>
      </div>
      <div class="modal-body">
      <?php echo validation_errors(); ?>
          <form class="form col-md-12 center-block" id="registerForm" method="post" action="">
            <div class="form-group">
              <input type="text" name="username" class="form-control input-lg register-input" placeholder="Username" autocomplete="off">
              <span class="pull-right loading-username"></span>
            </div>
            <div class="form-group">
              <input type="password" name="password" class="form-control input-lg" placeholder="Password">
              <span class="pull-right check-password"></span>
            </div>
            <div class="form-group">
              <input type="password" name="passwordVerify" class="form-control input-lg register-input" placeholder="Re-type password">
              <span class="pull-right check-password-verify"></span>
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block btn-register" data-loading-text="Loading...">Register</button>              
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn btn-danger go-back-login" >Login</button>
		  </div>	
      </div>
  </div>

<script type="text/javascript">
var timeoutReference, pwdTimeout;
var url = "<?php echo site_url('user/validation_check');?>";
var url_register = "<?php echo site_url('user/register');?>"; 



jQuery(document).ready(function() {
	jQuery('.go-back-login').click(function(e) {
		e.preventDefault();
		jQuery('.modal-register').fadeOut('slow', function() {
			jQuery('.modal-login').fadeIn('slow', function() {});
		});
	});
	jQuery('.btn-register').addClass('disabled');
	jQuery('input[name="username"]').validateInput({
		name: 'username',
		loadingClass: '.loading-username',
        url: url
	});
	jQuery('input[name="password"]').validateInput({
		name: 'password',
		loadingClass: '.check-password',
        url: url
	});	


	jQuery('input[name="password"]').change(function(e) {
		var password = jQuery(this).val();
		jQuery('input[name="passwordVerify"]').validateInput("destroy");
		jQuery('input[name="passwordVerify"]').validateInput("init", {
			name: 'passwordVerify',
			loadingClass: '.check-password-verify',
			query: '&password='+password,
            url: url
			
		});	
		
	});

	jQuery("form#registerForm").submit(function(e) {
		var $this = jQuery(this);
		e.preventDefault();
		jQuery('.btn-register').button('loading');
		jQuery.ajax({
        	type: "POST",
            url: url_register,
            data: jQuery("form#registerForm").serialize(),
            dataType: "json",
			beforeSend: function() {    
    					
    		},
            success: function(res) {
    			if (res.success == false) {
                	jQuery('#loginModal').modal().find('.modal-dialog').html(res.form);
                	jQuery('.modal-login').hide();
                	jQuery('.modal-register').show();    
                } else {
                    var success_message = '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                    success_message += 'Thank you for registering.</div>';
                	$this.prepend(success_message);
                	window.setTimeout(function() {
                		jQuery('.modal-register').fadeOut('slow', function() {
                			jQuery('.modal-login').fadeIn('slow', function() {});
                		});
                	}, 5000);                	
                }
    			
    		}
        });
        return false;
	});
	
});
</script>