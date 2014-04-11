<style type="text/css">
	.modal-footer {   border-top: 0px; }
</style>
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h1 class="text-center">Register</h1>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block" method="post" action="">
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
              <button class="btn btn-primary btn-lg btn-block">Register</button>
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancel</button>
		  </div>	
      </div>
  </div>
  </div>
</div>
<script type="text/javascript">
var timeoutReference, pwdTimeout;
var url = "<?php echo site_url('user/validation_check');?>";
$(document).ready(function() {

	$('input[name="username"]').blur(function() {
		if ($(this).val() == '') {
			$('.loading-username').html("");
			$(this).parents('.form-group').removeClass('has-error');
			$(this).parents('.form-group').find('.help-block').remove();
		}
	});

	$('input[name="password"]').blur(function() {
		if ($(this).val() == '') {
			$('.check-password').html("");
			$(this).parents('.form-group').removeClass('has-error');
			$(this).parents('.form-group').find('.help-block').remove();
		}
	});

    $('input[name="username"]').keypress(function() {
        var _this = $(this); 
        
        if (timeoutReference) clearTimeout(timeoutReference);
        timeoutReference = setTimeout(function() {
            if (_this.val() != '') {
                var username = _this.val();
            	$.ajax({
                	type: "POST",
                    url: url,
                    data: "username="+username,
                    dataType: "json",
    				beforeSend: function() {    
            			$('.loading-username').html("<i class='fa fa-spinner fa-spin fa-lg'></i>"); 
            			_this.parents('.form-group').removeClass('has-error');
                    	_this.parents('.form-group').find('.help-block').remove();			
            		},
                    success: function(res) {
                        if (!res.success) {
                        	$('.loading-username').html("<i class='fa fa-times text-danger fa-lg'></i>");                        	
                        	_this.parents('.form-group').addClass('has-error');
                        	_this.parents('.form-group').append(res.error_msg);
                        } else {
                        	$('.loading-username').html("<i class='fa fa-check text-success fa-lg'></i>");
                        }
            			
            		}
                });
            } else {
            	$('.loading-username').html("");
            	_this.parents('.form-group').removeClass('has-error');
            	_this.parents('.form-group').find('.help-block').remove();
            }
            
        }, 1000);
    });

    $('input[name="password"]').keypress(function() {
        var _this = $(this); 
        
        if (timeoutReference) clearTimeout(timeoutReference);
        timeoutReference = setTimeout(function() {
            if (_this.val() != '') {
                var password = _this.val();
            	$.ajax({
                	type: "POST",
                    url: url,
                    data: "password="+password,
                    dataType: "json",
    				beforeSend: function() {    
            			$('.check-password').html("<i class='fa fa-spinner fa-spin fa-lg'></i>"); 
            			_this.parents('.form-group').removeClass('has-error');
                    	_this.parents('.form-group').find('.help-block').remove();			
            		},
                    success: function(res) {
                        if (!res.success) {
                        	$('.check-password').html("<i class='fa fa-times text-danger fa-lg'></i>");                        	
                        	_this.parents('.form-group').addClass('has-error');
                        	_this.parents('.form-group').append(res.error_msg);
                        } else {
                        	$('.check-password').html("<i class='fa fa-check text-success fa-lg'></i>");
                        }
            			
            		}
                });
            } else {
            	$('.check-password').html("");
            	_this.parents('.form-group').removeClass('has-error');
            	_this.parents('.form-group').find('.help-block').remove();
            }
            
        }, 1000);
    });

    /*$('input[name="passwordVerify"]').keypress(function() {
        var _this = $(this); 
        var pwd = $('input[name="password"]').val();

        if (pwdTimeout) clearTimeout(pwdTimeout);

        pwdTimeout = setTimeout(function() {
        	$('.check-password').html("<i class='fa fa-spinner fa-spin fa-lg'></i>");
            if (_this.val() != pwd) {
            	$('.check-password').html("<i class='fa fa-times text-danger fa-lg'></i>");
            } else {
            	$('.check-password').html("<i class='fa fa-check text-success fa-lg'></i>");
            }
        }, 1000);
    });*/
    
    
});
</script>