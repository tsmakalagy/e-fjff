
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
(function($) {
	var privateFunction = function() {
		// code here
	}
 
	var methods = {
		init: function(options) {
 
			// Repeat over each element in selector
			return this.each(function() {
				var $this = $(this);
 
				// Attempt to grab saved settings, if they don't exist we'll get "undefined".
				var settings = $this.data('validateInput');

				var timeout;
 
				// If we could't grab settings, create them from defaults and passed options
				if(typeof(settings) == 'undefined') {
 
					var defaults = {
						url: url,
					    btnRegister: '.btn-register',
					    query: '',
						onSomeEvent: function() {}
					}
 
					settings = $.extend({}, defaults, options);
 
					// Save our newly created settings
					$this.data('validateInput', settings);
				} else {
					// We got settings, merge our passed options in with them (optional)
					settings = $.extend({}, settings, options);
 
					// If you wish to save options passed each time, add:
					// $this.data('pluginName', settings);
				}
 
				$this.on("keypress", function() {
					if (timeout) clearTimeout(timeout);
					timeout = setTimeout(function() {
			            if ($this.val() != '') {
			            	$.ajax({
			                	type: "POST",
			                    url: settings.url,
			                    data: settings.name+"="+$this.val()+settings.query,
			                    dataType: "json",
			    				beforeSend: function() {    
			            			$(settings.loadingClass).html("<i class='fa fa-spinner fa-spin fa-lg'></i>"); 
			            			$this.parents('.form-group').removeClass('has-error');
			                    	$this.parents('.form-group').find('.help-block').remove();			
			            		},
			                    success: function(res) {
			                        if (!res.success) {
			                        	$(settings.loadingClass).html("<i class='fa fa-times text-danger fa-lg'></i>");                        	
			                        	$this.parents('.form-group').addClass('has-error');
			                        	$this.parents('.form-group').append(res.error_msg);
			                        	$(settings.btnRegister).addClass('disabled');
			                        } else {
			                        	$(settings.loadingClass).html("<i class='fa fa-check text-success fa-lg'></i>");
			                        	$(settings.btnRegister).removeClass('disabled');
			                        }
			            			
			            		}
			                });
			            } else {
			            	$(settings.loadingClass).html("");
			            	$this.parents('.form-group').removeClass('has-error');
			            	$this.parents('.form-group').find('.help-block').remove();
			            }
			            
			        }, 1000);
				});			
				$this.on("blur", function() {
					if ($this.val() == '') {
						$(settings.loadingClass).html("");
						$this.parents('.form-group').removeClass('has-error');
						$this.parents('.form-group').find('.help-block').remove();
					} 
				});	
 
			});
		},
		destroy: function(options) {
			// Repeat over each element in selector
			return $(this).each(function() {
				var $this = $(this);
 				$this.off("keypress");
 				$this.off("blur");
				// run code here
 
				// Remove settings data when deallocating our plugin
				$this.removeData('pluginName');
			});
		},
		val: function(options) {
			// code here, use .eq(0) to grab first element in selector
			// we'll just grab the HTML of that element for our value
			var someValue = this.val();
 
			// return one value
			return someValue;
		}
	};
 
	$.fn.validateInput = function() {
		var method = arguments[0];
 
		if(methods[method]) {
			method = methods[method];
			arguments = Array.prototype.slice.call(arguments, 1);
		} else if( typeof(method) == 'object' || !method ) {
			method = methods.init;
		} else {
			$.error( 'Method ' +  method + ' does not exist on jQuery.pluginName' );
			return this;
		}
 
		return method.apply(this, arguments);
 
	}
 
})(jQuery);


$(document).ready(function() {
	$('.go-back-login').click(function(e) {
		e.preventDefault();
		$('.modal-register').fadeOut('slow', function() {
			$('.modal-login').fadeIn('slow', function() {});
		});
	});
	$('.btn-register').addClass('disabled');
	$('input[name="username"]').validateInput({
		name: 'username',
		loadingClass: '.loading-username'
	});
	$('input[name="password"]').validateInput({
		name: 'password',
		loadingClass: '.check-password'
	});	


	$('input[name="password"]').change(function(e) {
		var password = $(this).val();
		$('input[name="passwordVerify"]').validateInput("destroy");
		$('input[name="passwordVerify"]').validateInput("init", {
			name: 'passwordVerify',
			loadingClass: '.check-password-verify',
			query: '&password='+password
			
		});	
		
	});

	$("form#registerForm").submit(function(e) {
		var $this = $(this);
		e.preventDefault();
		$('.btn-register').button('loading');
		$.ajax({
        	type: "POST",
            url: url_register,
            data: $("form#registerForm").serialize(),
            dataType: "json",
			beforeSend: function() {    
    					
    		},
            success: function(res) {
    			if (res.success == false) {
                	$('#loginModal').modal().find('.modal-dialog').html(res.form);
                	$('.modal-login').hide();
                	$('.modal-register').show();    
                } else {
                    var success_message = '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                    success_message += 'Thank you for registering.</div>';
                	$this.prepend(success_message);
                	window.setTimeout(function() {
                		$('.modal-register').fadeOut('slow', function() {
                			$('.modal-login').fadeIn('slow', function() {});
                		});
                	}, 5000);                	
                }
    			
    		}
        });
        return false;
	});
	
});
</script>