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
			 <?php
			 	include_once 'postHandler.php';
				$post=new Post();
                $recent=$post->recentpost();
                while ($row = $recent->fetch(PDO::FETCH_ASSOC)){
              ?>
				<li>
					<div class="clearfix">
						<div class="pp-image">
							<a href="blog-details.php?id=<?php echo $row['post_id']?>"><img src="<?php echo $row['postImage']?>" alt="Image" style="width: 39px; height: 43px;"></a>
						</div>
						<div class="pp-desc">
							<span class="pp-categories"><a href="blog-details.php?id=<?php echo $row['post_id']?>"><?php echo $row['title']?></a></span>
							<span class="pp-date">Feb 14, 2017</span>
						</div>
					</div>
					<h4><a href="blog-details.php?id=<?php echo $row['post_id']?>"><?php echo substr($row['description'],0,10)."....";?></a></h4>
				</li>				
				
				<?php
			}
		?>		
			</ul>		
		</div>
			
		<div class="widget widget_calendar">
			<h5>Calendar</h5>
			<div id="calendar_wrap" class="calendar_wrap">
				<table id="wp-calendar">
					<caption>February 2020</caption>
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
			 <?php
			 	include_once 'category.php';
				$category=new Category();
               $viwecategory=$category->view();
                while ($row = $viwecategory->fetch(PDO::FETCH_ASSOC)){
               ?>	
				
				<li><a href="#"><?php echo $row['category'];?><span> 1</span></a></li>
				<?php
                    }
                ?>
			</ul>
		</div>
	</div><!-- /.sidebar -->	
</div>	