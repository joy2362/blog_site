<?php
$count = 1;
	require 'masterHeader.php';
?>
		<div class="container">
				<div class="row">
					<?php
						include_once 'postHandler.php'; 
						$post=new Post();
						$viewPost=$post->view();
		                while ($row = $viewPost->fetch(PDO::FETCH_ASSOC)){
		                	if ($count<=3) {
		                		?>
		                		<div class="col-md-4">
									<div class="featured-cols cols-last">
										<div class="featured-bg-gradient">&nbsp;</div>
										<span class="blog-format-default">Image</span>
										<img src="<?php echo $row['postImage'];?>" alt="super-natural" style="height: 300px;width: 350px;">							
										<div class="featured-desc">
											<span class="categories"><a href="#"><?php echo $row['category'];?></a></span>
											<h4><a href="blog-details.php?id=<?php echo $row['post_id'];?>"><?php echo $row['title'];?></a></h4>
											<label>
												<span>admin&nbsp;‐</span> Feb 20, 2017
											</label>
										</div>
									</div>				
								</div>
		                		<?php
		                		$count++;
		                	}
		                }
		                $count=1;
		              ?>
			</div><!-- /.row -->
			<div class="tr-content">
				<div class="row">
					<div class="col-md-8 col-lg-9 tr-sticky">
						<div class="theiaStickySidebar">
							<div class="blog-list masonry clearfix">	
								<div class="row">
									<?php
									include_once 'postHandler.php'; 
									$post=new Post();
									$viewPost=$post->view();
					                while ($row = $viewPost->fetch(PDO::FETCH_ASSOC)){
					                	if ($count<4) {
					                		$count++;
					                	}elseif ($count==4) {
					                		?>
					                		<div class="col-md-6 col-lg-4">
										<div class="masonry-item clearfix">
											<div class="blog-mask">
												<a href="blog-details.php?id=<?php echo $row['post_id'];?>" class="blog-format-image-hover">
													<i class="fa fa-external-link fa-3x"></i>
												</a>
												<div class="blog-image">
													<a href="blog-details.php?id=<?php echo $row['post_id'];?>"><img src="<?php echo $row['postImage'];?>" alt="Image" style="height: 237px;width: 263px;"></a>	
												</div>
											</div>
											<div class="blog-list-desc">
												<span class="categories">
													<a href="#"><?php echo $row['category'];?></a>
												</span>
												<h4><a href="blog-details.php?id=<?php echo $row['post_id'];?>"><?php echo $row['title'];?></a></h4>
												<label>
													<span>admin&nbsp;‐</span> Feb 22, 2017		
												</label>
												<p><?php echo substr($row['description'],0,75)."....";?></p>
											</div>
										</div>					
									</div>
					                		<?php
					                	}
					              ?>
									
									<?php
								}
								?>

									
								</div>
							</div>

							<div class="home-content">
								<div id="mc4wp_form_widget-2" class="widget widget_mc4wp_form_widget">
									<h5>Newsletter</h5>
									<form id="mc4wp-form-1" class="mc4wp-form mc4wp-form-61" method="post" data-name="theme-form">
										<div class="mc4wp-form-fields">
											<label>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</label>
											<input type="email" name="EMAIL" placeholder="Email Address" required="">
										  	<input type="submit" value="Subscribe">
										</div>
									</form>
								</div>
							</div><!-- /.home-content -->	
						
							<!-- Pagination -->
							<div class="pagination clearfix">
								<ul class="page-numbers">
									<li><span class="page-numbers current">1</span></li>
									<li><a class="page-numbers" href="#">2</a></li>
									<li><a class="next page-numbers" href="#"></a></li>
								</ul>
							</div><!-- /.pagination -->							
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