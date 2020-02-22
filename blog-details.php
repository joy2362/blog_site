<?php
if (!isset($_GET['id']) && $_SERVER['REQUEST_METHOD'] === 'GET') {
		header('location:404.php');
	}else{
		include_once 'postHandler.php';
		$post=new Post();
		$id=$_GET['id'];
		$singlePost=$post->viewpost($id);
		if ($singlePost==0) {
			header('location:404.php');
		}
	}
	require 'masterHeader.php';
?>
		<div class="container">		
			<div class="tr-content">
				<div class="row">
					<div class="col-md-8 col-lg-9 tr-sticky">
						<div class="theiaStickySidebar">
							<div class="breadcrumbs">
								<a href="index.php">Home</a>
								<span>/&nbsp;</span>Blog Details
							</div>										
							<div class="blog-post">
								<div class="blog-post-content">
									<div class="blog-list-desc">
										<span class="categories"><a href="http://themecss.com/wp/Desilog/category/graphic-design/"><?php echo $singlePost['category'];?></a></span>
										<h3><?php echo $singlePost['title'];?></h3>									
										<label>
											<span>admin&nbsp;‐</span> 
											April 20, 2016										
											<span class="blog-comments">
												<i class="fa fa-comment-o"></i>
												<a href="http://themecss.com/wp/Desilog/super-natural-british/#comments">
												0</a>
											</span>
										</label>
									</div>

									<!-- Post Thumbnail -->
									<div class="blog-image">
										<img src="<?php echo $singlePost['postImage'];?>" alt="Image">	
									</div>
									<div class="blog-text">
										<p><?php echo $singlePost['description'];?></p>
									</div>
								</div>
												
								<div class="blog-share">
									<ul class="clearfix">	
										<li>
											<a href="#" class="facebook"><i class="fa fa-facebook fa-lg"></i>Facebook</a>
										</li>
										<li>
											<a href="#" class="twitter"><i class="fa fa-twitter fa-lg"></i>Twitter</a>
										</li>
										<li>
											<a href="#" class="gplus"><i class="fa fa-google-plus fa-lg"></i>Google+</a>
										</li>
										<li>
											<a href="#" class="pinterest"><i class="fa fa-pinterest fa-lg"></i>Pinterest</a>
										</li>
									</ul>
								</div><!-- Share Post -->
								<?php
									$id=$_GET['id'];
									$previous=$post->viewpost($id-1);
									if ($previous!=0) {
										?>
										<div class="post-link-blog clearfix">
											<div class="prev-post clearfix">
												<a href="blog-details.php?id=<?php echo $previous['post_id']?>" rel="prev">Previous Article</a>
												<span>
													<a href="blog-details.php?id=<?php echo $previous['post_id']?>"><img src="<?php echo $previous['postImage']?>" alt="Image"style="height: 39px; width: 43px;"></a>
												</span> 
												<label><a href="blog-details.php?id=<?php echo $previous['post_id']?>"><?php echo $previous['title']?></a></label>
											</div>
										</div><!-- /.post-link-blog -->
										<?php
									}
								?>								
								<div class="blog-author clearfix">
									<img alt="Image" src="http://1.gravatar.com/avatar/1986f5007ea888ec7ba6542025be0310?s=64&amp;r=g">
									<div class="author-desc">
										<h4>Mark Abucayon</h4>
										<ul class="author-socials clearfix">
											<li><a href="#"><i class="fa fa-facebook fa-lg"></i></a></li>
											<li><a href="#"><i class="fa fa-twitter fa-lg"></i></a></li>
											<li><a href="#"><i class="fa fa-google-plus fa-lg"></i></a></li>
											<li><a href="#"><i class="fa fa-linkedin fa-lg"></i></a></li>
											<li><a href="#"><i class="fa fa-globe fa-lg"></i></a></li>
										</ul>
										<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
									</div>
								</div>
								<div class="blog-other-post clearfix">
									<h5>You may also like</h5>
									<div class="row">
										 <?php
						                    $recent=$post->recentpost();
						                    while ($row = $recent->fetch(PDO::FETCH_ASSOC)){
						                  ?>
										<div class="col-md-6 col-lg-4">
											<div class="masonry-item">
												<div class="blog-mask">
													<a href="" class="blog-format-image-hover">
													<i class="fa fa-external-link fa-3x"></i>
												</a>
												
												<!-- Post Thumbnail -->
												<div class="blog-image">
													<a href="blog-details.php?id=<?php echo $row['post_id']?>"><img src="<?php echo $row['postImage']?>" alt="Image" class="img-fluid" style="width: 250px; height: 300px;"></a>	
												</div>

												</div>
												<div class="blog-list-desc">
													<span class="categories"><a href="#">Branding</a></span>
													<h4><a href="blog-details.php?id=<?php echo $row['post_id']?>"><?php echo $row['title']?></a></h4>		
													<label>
														<span>admin&nbsp;‐</span> 
														April 20, 2016		
													</label>
													<p><?php echo substr($row['description'],0,50)."....";?></p>
												</div>
											</div>		
										</div>
										 <?php
							                      }
							                        ?>
									</div><!-- /.row -->
								</div><!-- Other Posts -->
									
								<div class="contact-form comment-form clearfix">
									<h4>Leave a Comment</h4>
									<form class="contact-form" name="contact-form" method="post" action="#">
									    <div class="row">
									        <div class="col-lg-12">
									            <div class="form-group">
									                <textarea name="message" required="required" class="form-control" rows="7"  placeholder="Message"></textarea>
									            </div>             
									        </div> 
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
									    </div>
									    <div class="form-group text-center">
									        <button type="submit" class="wpcf7-form-control wpcf7-submit">Post a Message</button>
									    </div>
									</form><!-- /.contact-form -->	
								</div><!-- /.contact-form -->
							</div>							
						</div><!-- /.theiaStickySidebar -->
					</div>

					<div class="col-md-4 col-lg-3 tr-sticky">
						<div class="sidebar theiaStickySidebar">
							<div class="widget widget_text">
								<h5>Advertise Here</h5>			
								<div class="textwidget">
									<a href="#"><img src="images/ads_one.jpg" alt="Sidebar Banner Advertisements" class="img-fluid"></a>
								</div>
							</div>

							<div class="widget desilog_widget-popular-posts">
								<h5>Popular Posts</h5>	
								<ul>
									<li>
										<div class="clearfix">
											<div class="pp-image">
												<a href="#"><img src="images/new-illustrations-late-2015-43x39.jpg" alt="Image" class="img-fluid"></a>
											</div>
											<div class="pp-desc">
												<span class="pp-categories"><a href="#">Typography</a></span>
												<span class="pp-date">April 20, 2016</span>
											</div>
										</div>
										<h4><a href="#">New Illustrations – late 2015</a></h4>
									</li>	
									<li>
										<div class="clearfix">
											<div class="pp-image">
												<a href="#"><img src="images/theater-hannover-43x39.jpg" alt="theater-hannover" class="img-fluid"></a>								
											</div>
											<div class="pp-desc">
												<span class="pp-categories"><a href="#">Character Design</a> <a href="#">Drawing</a></span>
												<span class="pp-date">April 20, 2016</span>
											</div>
										</div>
										<h4><a href="#">Freies Theater Hannover</a></h4>
									</li>	
									<li>
										<div class="clearfix">
										<div class="pp-image">
											<a href="#"><img src="images/skills-radar-43x39.jpg" alt="Image" class="img-fluid"></a>
										</div>
										<div class="pp-desc">
											<span class="pp-categories"><a href="#">Graphic Design</a></span>
											<span class="pp-date">April 20, 2016</span>
										</div>
										</div>
										<h4><a href="#">Tutorial: Skills Radar Chart</a></h4>						
									</li>	
									<li>
										<div class="clearfix">
											<div class="pp-image">
												<a href="#"><img src="images/color-relationships-43x39.jpg" alt="Image" class="img-fluid"></a>			
											</div>
											<div class="pp-desc">
												<span class="pp-categories"><a href="#">Illustration</a></span>
												<span class="pp-date">April 20, 2016</span>
											</div>
										</div>
										<h4><a href="#">Color Relationships</a></h4>	
									</li>	
								</ul>		
							</div>

							<div class="widget widget_calendar">
								<h5>Calendar</h5>
								<div id="calendar_wrap" class="calendar_wrap">
									<table id="wp-calendar">
										<caption>February 2017</caption>
										<thead>
											<tr>
												<th scope="col" title="Monday">M</th>
												<th scope="col" title="Tuesday">T</th>
												<th scope="col" title="Wednesday">W</th>
												<th scope="col" title="Thursday">T</th>
												<th scope="col" title="Friday">F</th>
												<th scope="col" title="Saturday">S</th>
												<th scope="col" title="Sunday">S</th>
											</tr>
										</thead>

										<tbody>
											<tr>
												<td colspan="2" class="pad">&nbsp;</td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td>
											</tr>
											<tr>
												<td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td>
											</tr>
											<tr>
												<td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td>
											</tr>
											<tr>
												<td id="today">20</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td>
											</tr>
											<tr>
												<td>27</td><td>28</td>
												<td class="pad" colspan="5">&nbsp;</td>
											</tr>
										</tbody>

										<tfoot>
											<tr>
												<td colspan="3" id="prev"><a href="#">« Apr</a></td>
												<td class="pad">&nbsp;</td>
												<td colspan="3" id="next" class="pad">&nbsp;</td>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>

							<div class="widget widget_categories">
								<h5>Categories</h5>		
								<ul>
									<li><a href="#">Branding<span> 1</span></a></li>
									<li><a href="#">Character Design<span> 2</span></a></li>
									<li><a href="#">Drawing<span> 2</span></a></li>
									<li><a href="#">Editorial Design<span> 1</span></a></li>
									<li><a href="#">Graphic Design<span> 3</span></a></li>
									<li><a href="#">Illustration<span> 1</span></a></li>
									<li><a href="#/">Typography<span> 1</span></a></li>
								</ul>
							</div>

							<div class="widget widget_tag_cloud">
								<h5>Tags</h5>
								<div>
									<a href="#" class="tag-link">books</a>
									<a href="#" class="tag-link">illustrations</a>
									<a href="#">kombat</a>
									<a href="#">natural</a>
									<a href="#">projects</a>
									<a href="#">relationships</a>
									<a href="#">super</a>
									<a href="#">theater</a>
								</div>
							</div>
						</div><!-- /.sidebar -->	
					</div>	
				</div><!-- /.row -->

			</div><!-- /.tr-content -->						
		</div><!-- /.container -->

		<?php
	require 'masterfooter.php';
?>