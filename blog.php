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
								<span>/&nbsp;</span>Blog				
								<div class="post-counter">
									<span class="count-number">10</span>
									<span class="count-text">Total Post</span>
								</div>
							</div>					
							<div class="blog-list masonry clearfix">	
								<div class="row">
									<?php
									include_once 'postHandler.php'; 
									$post=new Post();
									$viewPost=$post->view();
					                while ($row = $viewPost->fetch(PDO::FETCH_ASSOC)){
					              ?>
									<div class="col-md-6 col-lg-4">
										<div class="masonry-item clearfix">
											<div class="blog-mask">
												<a href="blog-details.php?id=<?php echo $row['post_id'];?>" class="blog-format-image-hover">
													<i class="fa fa-external-link fa-3x"></i>
												</a>
												<div class="blog-image">
													<a href="blog-details.php?id=<?php echo $row['post_id'];?>"><img src="<?php echo $row['postImage'];?>" alt="super-natural" style="height: 300px;width: 250px;"></a>	
												</div>
											</div>
											<div class="blog-list-desc">
												<span class="categories">
													<a href="#"><?php echo $row['category'];?></a>
													</span>
												<h4><a href="blog-details.php?id=<?php echo $row['post_id'];?>"><?php echo $row['title'];?></a></h4>		
												<label>
													<span>admin&nbsp;‐</span> April 20, 2016		
												</label>
												<p><?php echo substr($row['description'],0,75)."....";?></p>
											</div>
										</div>					
									</div>
									<?php
								}
									?>

								</div>
							</div>
							<div class="page-banner">
								<a href="#">
									<img src="images/page-banner.png" alt="Page Banner Advertisements" class="img-fluid">
								</a>
							</div>						
							<!-- Pagination -->
							<div class="pagination clearfix">
								<ul class="page-numbers">
									<li><span class="page-numbers current">1</span></li>
									<li><a class="page-numbers" href="#">2</a></li>
									<li><a class="next page-numbers" href="#"></a></li>
								</ul>
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