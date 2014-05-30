<div class="modal-content modal-login">
      <div class="modal-header">
          <h1 class="text-center">Login</h1>
      </div>
      <div class="modal-body">      
          <form class="form col-md-12 center-block" id="loginForm" method="post" action="">
          <?php echo validation_errors(); ?>
            <div class="form-group">
              <input type="text" name="login-username" class="form-control input-lg" placeholder="Username">
            </div>
            <div class="form-group">
              <input type="password" name="login-password" class="form-control input-lg" placeholder="Password">
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block btn-login" type="submit" data-loading-text="Loading...">Sign In</button>              
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn btn-danger register" >Register</button>
		  </div>	
      </div>
  </div>
<script type="text/javascript">
<!--
var urlLogin = "<?php echo site_url('user/login');?>";
var urlHome = "<?php echo site_url('/');?>"; 
jQuery(function() {
	jQuery("form#loginForm").submit(function(e) {
		e.preventDefault();
		jQuery('.btn-login').button('loading');
		jQuery.ajax({
        	type: "POST",
            url: urlLogin,
            data: jQuery("form#loginForm").serialize(),
            dataType: "json",
			beforeSend: function() {    
    					
    		},
            success: function(res) {
                if (res.success == false) {
                	jQuery('#loginModal').modal().find('.modal-dialog').html(res.form);    
                } else {
                	jQuery(location).attr('href',urlHome); 
                }
    		}
        });
        return false;
	});
	window.setTimeout(function() {
		jQuery('.alert').fadeOut("slow");
	}, 50000);
	jQuery(document).on('click', '.register', function(e) {
		e.preventDefault();
		jQuery('.modal-login').fadeOut('slow', function() {
			jQuery('.modal-register').fadeIn('slow', function() {});
		});
	});
});
-->
</script>