<!-- Home Design Inner Pages -->
<div class="ulockd-inner-home">
    <div class="container text-center">
        <div class="row">
            <div class="ulockd-inner-conraimer-details">
                <div class="col-md-12">
                    <h1 class="text-uppercase"><?= $pagetitle;?></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Home Design Inner Pages -->
<?php $this->load->view('web/includes/breadcrumb');?>

<!-- Inner Pages Main Section -->
<section class="ulockd-service-three">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 text-center">
                <div class="ulockd-main-title">
                    <h2 class="text-uppercase">Our Video <span class="text-thm2">Gallery</span></h2>
                </div>
            </div>
        </div>
        <div class="row">

        	<?php

        		//print_r($data);

        		foreach($data as $value){
    
        			if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/\s]{11})%i', $value['link'], $match)) {
    					    $video_id = $match[1];
    				}
        	?>
        	
        	<div class="col-md-4">
        	    <h5 style="background: black;padding: 10px;margin-bottom: 0px;color: #00ffa9;"><?= $value['title']; ?></h5>
        		<iframe width="420" height="315" src="https://www.youtube.com/embed/<?php echo $video_id; ?>" allowfullscreen></iframe>
        	</div>

        	<?php } ?>

        </div>
    </div>
</section>