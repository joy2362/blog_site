<?php
	require 'masterHeader.php';
?>
		<div class="container">		
			<div class="tr-content">
				<div class="row">
					<div class="col-sm-6 col-sm-offset-3">			
						<div class="login-page">		
							<div class="login-form">
								<h2>Login</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
								<form method="post" action="users.php" id="homeland-loginform" name="desilog-loginform">
						            <div class="form-group">
						                <input type="text" name="username" class="form-control" required="required" placeholder="Username">
						                <i class="fa fa-user"></i>
						            </div>
						            <div class="form-group">
						                <input type="password" name="pass" class="form-control" required="required" placeholder="Password">
						                <i class="fa fa-unlock-alt"></i>
						            </div>
									<div class="login-links clearfix">
										<div class="log-links">
											<label><input type="checkbox" value="forever" id="rememberme" name="rememberme">
											Remember Me	</label>
											<a href="#" title="Lost Password"><i class="fa fa-key"></i>Forgot your Password?</a>
										</div>
										<div class="login-submit">
										<input type="submit" value="Sign In" class="button-primary" id="wp-submit" name="wp-submit">
										</div>
									</div>
								</form>
							</div>
						</div><!-- /.login-page -->
					</div>
				</div><!-- /.row -->
			</div><!-- /.tr-content -->						
		</div><!-- /.container -->
<?php
	require 'masterfooter.php';
?>