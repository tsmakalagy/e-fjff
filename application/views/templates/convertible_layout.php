<!-- Container -->
	<div id="container">
		<!-- Header
		    ================================================== -->
		<header class="clearfix">
			<!-- Static navbar -->
			<div class="navbar navbar-default navbar-fixed-top">
				<div class="top-line">
					<div class="container">						
						<ul class="social-icons">
							<?php if (is_connected()): ?>
							<li><a class="my-tooltip" href="<?php echo site_url('user/logout');?>" data-toggle="tooltip" data-placement="bottom" title="Logout" ><i class="fa fa-power-off"></i></a></li>			          		
			          		<?php else: ?>         	
			            	<li><a href="<?php echo site_url('user/login');?>" class="my-tooltip" data-toggle="tooltip" data-placement="bottom" title="Login"><i class="fa fa-sign-in"></i> Se connecter</a></li>
			            	<?php endif; ?>
						</ul>
					</div>
				</div>
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#"><img alt="" src="<?php echo base_url('assets/convertible/images/logo.png');?>"></a>
					</div>
					<div class="navbar-collapse collapse">
						<ul class="nav navbar-nav navbar-right">
							<li><a class="<?php echo isset($home_active) ? $home_active : ''; ?>" href="<?php echo site_url('/'); ?>">Fandraisana</a></li>
							<li><a href="#">Serasera</a></li>
							<li><a href="#">Tsena</a></li>
							<li><a href="#">Momba anay</a></li>
							<li><a href="#">Hifandray</a></li>
							<?php if (is_connected() && has_role('user_fokotany')): ?>
							<li><a href="<?php echo site_url('admin'); ?>">Admin</a></li>
							<?php endif; ?>
						</ul>
					</div>
				</div>
			</div>
		</header>
		<!-- End Header -->
		
		<div id="main-content">
			<?php echo $content; ?>
		</div>
		
		<!-- footer 
			================================================== -->
		<footer>
			<div class="up-footer">
				<div class="container">
					<div class="row">

						<div class="col-md-3">
							<div class="widget footer-widgets text-widget">
								<img alt="" src="<?php echo base_url('assets/convertible/images/logo.png');?>">
								<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem</p>
							</div>
							<div class="widget footer-widgets twitter-widget">
								<h4>Recent Tweets</h4>
								<ul class="tweets">
									<li>
										<p><a class="tweet-acc" href="#">@premiumlayers</a> Thanks for the head up! :) <a href="#">http://support.envato.com</a> was very helpful</p>
										<span>3 days ago</span>
									</li>
									<li>
										<p><a class="tweet-acc" href="#">@envato</a> <a href="#">http://support.envato.com</a> </p>
										<span>4 days ago</span>
									</li>
								</ul>
							</div>
						</div>

						<div class="col-md-3">
							<div class="widget footer-widgets flickr-widget">
								<h4>Flickr Gallery</h4>
								<ul class="flickr-list">
									<li><a href="#"><img alt="" src="<?php echo base_url('assets/convertible/images/flickr1.png');?>"></a></li>
									<li><a href="#"><img alt="" src="<?php echo base_url('assets/convertible/images/flickr2.png');?>"></a></li>
									<li><a href="#"><img alt="" src="<?php echo base_url('assets/convertible/images/flickr3.png');?>"></a></li>
									<li><a href="#"><img alt="" src="<?php echo base_url('assets/convertible/images/flickr4.png');?>"></a></li>
									<li><a href="#"><img alt="" src="<?php echo base_url('assets/convertible/images/flickr5.png');?>"></a></li>
									<li><a href="#"><img alt="" src="<?php echo base_url('assets/convertible/images/flickr6.png');?>"></a></li>
								</ul>
							</div>
							<div class="widget footer-widgets popular-widget">
								<h4>Popular Posts</h4>
								<ul class="pop-post">
									<li><a href="#"><i class="fa fa-pencil-square-o"></i> New Search Platform Update</a></li>
									<li><a href="#"><i class="fa fa-pencil-square-o"></i> Envato's Most Wanted - jQuery5,000 for Ghost Themes</a></li>
									<li><a href="#"><i class="fa fa-pencil-square-o"></i> Update: WordPress Theme Submission Requirements</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3">
							<div class="widget footer-widgets tag-widget">
								<h4>Tags</h4>
								<ul class="tag-widget-list">
									<li><a href="#">web design</a></li>
									<li><a href="#">coding</a></li>
									<li><a href="#">wordpress</a></li>
									<li><a href="#">woo commerce</a></li>
									<li><a href="#">php</a></li>
									<li><a href="#">photography</a></li>
								</ul>
							</div>
							<div class="widget footer-widgets message-widget">
								<h4>Send Message</h4>
								<form id="footer-contact" class="contact-work-form">
									<input type="text" name="name" id="name" placeholder="Name"/>
									<input type="text" name="mail" id="mail" placeholder="Email"/>
									<textarea name="comment" id="comment" placeholder="Message"></textarea>
									<button type="submit" name="contact-submit" class="submit_contact">
										<i class="fa fa-envelope"></i> Send
									</button>
									<div class="msg"></div>
								</form>
							</div>
						</div>

						<div class="col-md-3">
							<div class="widget footer-widgets info-widget">
								<h4>Contact Us</h4>
								<ul class="contact-list">
									<li><a class="phone" href="#"><i class="fa fa-phone"></i>9930 1234 5679</a></li>
									<li><a class="mail" href="#"><i class="fa fa-envelope"></i> contact@yourdomain.com</a></li>
									<li><a class="address" href="#"><i class="fa fa-home"></i> street address example</a></li>
								</ul>
							</div>
							<div class="widget footer-widgets work-widget">
								<h4>Working Hours</h4>
								<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum </p>
								<p class="work-time"><span>Mon - Fri</span> : 10 AM to 5 PM</p>
								<p class="work-time"><span>Sat - Sun</span> : 10 AM to 2 PM</p>
							</div>
						</div>

					</div>
				</div>
			</div>

			<div class="footer-line">
				<div class="container">
					<p>&#169; 2014 GSM,  All Rights Reserved</p>
					<a class="go-top" href="#"></a>
				</div>
			</div>

		</footer>
		<!-- End footer -->
	</div>
	<!-- End Container -->


<!-- Login modal ajax -->
<div id="loginModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  
  </div>
</div>

<script type="text/javascript">
jQuery(function() {
	
	jQuery('.my-tooltip').tooltip();
	
});
</script>