<div class="wrapper">
	<!-- Our Footer -->
	<section class="ulockd-footer">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 align-center">
					<div class="ulockd-footer-widget" style="width:75%;">
    					<div id="myCarouselAdv" class="carousel slide" data-ride="carousel">
		                    <div class="carousel-inner" id="AdvCarousel">
		                    	<?php
									$directory = opendir(FCPATH."assets/web/images/advertisement");
									while($file = readdir($directory)){
									    if($file !== '.' && $file !== '..'){
									        echo '<div class="item">
				                                	<img src="'.base_url().'assets/web/images/advertisement/'.$file.'" style="width:100%">
				                              	</div>';
									    }
									}
		                    	?>
		                    </div>
		                </div>
    				</div>
					<ul class="list-inline ulockd-footer-font-icon ulockd-mrgn1220">
						<li><a href="https://business.google.com/dashboard/l/10970491224926670678?hl=en" target="_blank"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="https://www.youtube.com/channel/UCco-JePUVZeZd9MJtBQx74A" target="_blank"><i class="fa fa-youtube"></i></a></li>
						<li><a href="https://www.facebook.com/Shree-Depa-Jain-Mahajan-Trust-100489125467624" target="_blank"><i class="fa fa-facebook"></i></a></li>
						<li><a href="https://www.instagram.com/shreedepajainmahajantrust/" target="_blank"><i class="fa fa-instagram"></i></a></li>
						<li><a href="https://twitter.com/DepaJain" target="_blank"><i class="fa fa-twitter"></i></a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
					<div class="ulockd-footer-lnews">
						<h3 class="text-uppercase">Latest Events</h3>
						<div class="ulockd-media-box">
							<?php
							$result = getEvents(); 
							if($result){
								foreach($result as $rs){
									$url = base_url().'newsevents/detail/'.$rs['id'];
									$dt = $rs['event_date'];
									echo '<div class="media">
										    <div class="media-left pull-left">
											    <a href="'.$url.'">
											    	<img class="media-object" src="'.base_url().'uploads/news/'.$rs['image'].'" alt="'.$rs['image'].'" style="width:100px">
											    </a>
										    </div>
										    <div class="media-body">
										    	<a href="'.$url.'" ><h4 class="media-heading">'.$rs['title'].'</h4></a>
												<a href="'.$url.'" class="post-date">'.$dt.'</a>
										    </div>
										</div>';									
								}
							}
							?>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
					<div class="ulockd-footer-lnews">
						<h3 class="text-uppercase">Blogs</h3>
						<div class="ulockd-media-box">
							<?php
							$result = getBlogs(); 
							//print_r($result);
							if($result){
								foreach($result as $rs){
									$url = base_url().'blog/detail/'.$rs['slug'];
									$dt = $rs['added_on'];
									echo '<div class="media">
										    <div class="media-left pull-left">
											    <a href="'.$url.'">
											    	<img class="media-object" src="'.base_url().'uploads/blog/'.$rs['image'].'" alt="'.$rs['image'].'" style="width:100px">
											    </a>
										    </div>
										    <div class="media-body">
										    	<a href="'.$url.'" ><h4 class="media-heading">'.$rs['title'].'</h4></a>
										    	<a href="'.$url.'" class="post-date">Added By : '.$rs['uploaded_by'].'<br />
												On '.$dt.'</a>
										    </div>
										</div>';									
								}
							}
							?>
						</div>
					</div>
    				<div class="ulockd-footer-newsletter">
    					<h4 class="title text-uppercase">News Letter</h4>
		                <form class="ulockd-mailchimp">
		                    <div class="input-group">
			                    <input type="email" class="form-control input-md" placeholder="Your email" name="EMAIL" value="">
			                    <span class="input-group-btn">
			                        <button type="submit" class="btn btn-md"><i class="icon flaticon-right-arrow"></i></button>
			                    </span>
		                    </div>
		                </form>
    				</div>			
				</div>
			</div>
		</div>
	</section>

	<!-- Our CopyRight Section -->
	<section class="ulockd-copy-right">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<span>SHREE DEPA JAIN MAHAJAN TRUST. All right reserved.</span>
				</div>
			</div>
		</div>
	</section>
</div>

