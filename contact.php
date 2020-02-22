<?php
	require 'masterHeader.php';
?>
		<div class="container">		
			<div class="tr-content">
				<div class="row">
					<div class="col-md-8 col-lg-9 tr-sticky">
						<div class="theiaStickySidebar">
							<div class="breadcrumbs">
								<a href="#">Home</a>
								<span>/&nbsp;</span>Contact
							</div>	

							<div id="gmap">
								<iframe width="400px" src="https://www.google.com/maps/embed/v1/directions?key=AIzaSyBHWG8MM9PMSImA-dKkHT8uRUDKbCTNP5E&origin=Oslo+Norway
							 	&destination=Telemark+Norway
							  	&avoid=tolls|highways"></iframe>
							</div>
							
							<div class="contact-description">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
							</div>
							<div class="contact-info clearfix">
								<div class="row">
									<div class="col-md-4">
										<div class="contact-details">
											<h4>Address</h4>
											<span>123, New Lenox Chicago, IL 60606</span>
										</div>				
									</div>
									<div class="col-md-4">
										<div class="contact-details">
											<h4>Mobile</h4>
											<span>(+899) 123-9465-12345</span>
										</div>			
									</div>
									<div class="col-md-4">
										<div class="contact-details last">
											<h4>Email</h4>
											<span>
												<a href="#">adsupport@desilog.com</a>
											</span>
										</div>			
									</div>
								</div><!-- /.row -->		
							</div><!-- /.contact-info -->		
							<div class="contact-form comment-form clearfix">
								<h4>Send us your feedback</h4>
								<form class="contact-form" name="contact-form" method="post" action="#">
								    <div class="row">
								        <div class="col-lg-4">
								            <div class="form-group">
								                <input type="text" class="form-control" required="required" placeholder="Name">
								            </div>
								        </div>
								        <div class="col-lg-4">
								            <div class="form-group">
								                <input type="email" class="form-control" required="required" placeholder="Email Address">
								            </div> 
								        </div>
								        <div class="col-lg-4">
								            <div class="form-group">
								                <input type="text" class="form-control" required="required" placeholder="Website">
								            </div> 
								        </div>
								        <div class="col-lg-12">
								            <div class="form-group">
								                <textarea name="message" required="required" class="form-control" rows="7"  placeholder="Message"></textarea>
								            </div>             
								        </div>     
								    </div>
								    <div class="form-group text-center">
								        <button type="submit" class="wpcf7-form-control wpcf7-submit">Submit</button>
								    </div>
								</form><!-- /.contact-form -->	
							</div>							
						</div><!-- /.theiaStickySidebar -->
					</div>	
					<?php
						require 'sidebar.php';
					?>								
				</div><!-- /.row -->		
			</div><!-- /.tr-content -->					
		</div><!-- /.container -->
<?php
	require 'masterfooter.php';
?>