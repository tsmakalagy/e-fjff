<style type="text/css">
	.modal-footer {   border-top: 0px; }
</style>
<div class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
          	<a href="<?php echo site_url('home');?>" class="navbar-brand">e-Fokonolona</a>
          	<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            	<span class="icon-bar"></span>
            	<span class="icon-bar"></span>
            	<span class="icon-bar"></span>
          	</button>
        </div><!-- / div.navbar-header -->
        <div class="navbar-collapse collapse" id="navbar-main">
          	<ul class="nav navbar-nav">
          		<?php if (is_connected()): ?>
            	<li class="dropdown">
              		<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="">Fokotany <span class="caret"></span></a>
              		<ul class="dropdown-menu" aria-labelledby="fokotany">
		                <li><a href="<?php echo site_url('fokotany/add/olona');?>">Add olona</a></li>
		                <li class="divider"></li>
		                <li><a href="<?php echo site_url('fokotany/add/karatra');?>">Add karatra</a></li>
		                <li class="divider"></li>
		                <li><a href="<?php echo site_url('fokotany/add/andraikitra');?>">Add andraikitra</a></li>
		                <li class="divider"></li>
		                <li><a href="<?php echo site_url('localite/fokotany/add');?>">Add fokotany</a></li>
		                <li class="divider"></li>
		                <li><a href="#">List fokotany</a></li>
		        	</ul><!-- / ul.dropdown-menu -->
            	</li><!-- / li.dropdown -->
	            <li class="dropdown">
              		<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="">Region <span class="caret"></span></a>
              		<ul class="dropdown-menu" aria-labelledby="region">
		                <li><a href="<?php echo site_url('localite/region/add');?>">Add region</a></li>
		                <li class="divider"></li>
		                <li><a href="#">List region</a></li>
		        	</ul><!-- / ul.dropdown-menu -->
            	</li><!-- / li.dropdown -->
	            <li class="dropdown">
              		<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="">District <span class="caret"></span></a>
              		<ul class="dropdown-menu" aria-labelledby="district">
		                <li><a href="<?php echo site_url('localite/district/add');?>">Add district</a></li>
		                <li class="divider"></li>
		                <li><a href="#">List district</a></li>
		        	</ul><!-- / ul.dropdown-menu -->
            	</li><!-- / li.dropdown -->
	            <li class="dropdown">
              		<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="">Fivondronana <span class="caret"></span></a>
              		<ul class="dropdown-menu" aria-labelledby="fivondronana">
		                <li><a href="<?php echo site_url('localite/fivondronana/add');?>">Add fivondronana</a></li>
		                <li class="divider"></li>
		                <li><a href="#">List fivondronana</a></li>
		        	</ul><!-- / ul.dropdown-menu -->
            	</li><!-- / li.dropdown -->
            	<li class="dropdown">
              		<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="">Firaisana <span class="caret"></span></a>
              		<ul class="dropdown-menu" aria-labelledby="firaisana">
		                <li><a href="<?php echo site_url('localite/firaisana/add');?>">Add firaisana</a></li>
		                <li class="divider"></li>
		                <li><a href="#">List firaisana</a></li>
		        	</ul><!-- / ul.dropdown-menu -->
            	</li><!-- / li.dropdown -->
	            <?php endif; ?>
          	</ul><!-- / ul.navbar-nav -->

          	<ul class="nav navbar-nav navbar-right">   
          		<?php if (is_connected()): ?>
          		<li class="dropdown">
          			<a class="dropdown-toggle" data-toggle="dropdown" href="#" ><?php echo display_username();?> <span class="caret"></span></a>
	              	<ul class="dropdown-menu">
		                <li><a href="<?php echo site_url('user/logout');?>">Logout</a></li>
		            </ul>
          		</li>
          		<?php else: ?>         	
            	<li><a href="#" class="login">Login</a></li>
            	<?php endif; ?>
          	</ul><!-- / ul.navbar-right -->

        </div><!-- / div#navbar-main -->
	</div><!-- / div.container -->
</div><!-- / div.navbar-fixed-top -->
<div class="container content">
<?php echo $content; ?>
</div><!-- / div.container -->

<!-- Login modal ajax -->
<div id="loginModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  
  </div>
</div>

<script type="text/javascript">
var urlLoadLoginForm = "<?php echo site_url('user/load/login');?>"; 
$(function() {
	$(document).on('click', '.login', function(e) {
		e.preventDefault();
		$.ajax({
        	type: "GET",
            url: urlLoadLoginForm,
            dataType: "json",
			beforeSend: function() {    
    					
    		},
            success: function(res) {
    			$('#loginModal').modal().find('.modal-dialog').html(res.form);
    			
    		}
        });
	});
	
});
</script>