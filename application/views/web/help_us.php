<!-- Home Design Inner Pages -->
<div class="ulockd-inner-home">
    <div class="container text-center">
        <div class="row">
            <div class="ulockd-inner-conraimer-details">
                <div class="col-md-12">
                    <h1 class="text-uppercase"><?= $pagetitle; ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Home Design Inner Pages -->
<?php $this->load->view('web/includes/breadcrumb');?>

<?php

if ($this->session->userdata('logintype') != 'normal') {
    redirect(base_url(), 'refresh');
}

?>

<!-- Inner Pages Main Section -->
<section class="ulockd-about">
    <div class="container">
	<?php if($client == 'web'){ ?>
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 text-center">
                <div class="ulockd-dtitle hvr-float-shadow">
                    <h2 class="text-uppercase">Help Us Lists</span></h2>
                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem labore voluptates consequuntur velit necessitatibus maiores fugiat eaque.</p> -->
                </div>
            </div>
        </div>
    <?php } ?>
        
    <div class="row">
	    <h3>Help Us Details

                <a href="<?= base_url(); ?>add_help_us" class="btn btn-warning btn-sm">Submit New Ticket</a>

            
            </h3>
	    <div class="table-responsive">
	        <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="myTable">
	            <thead>
	                <tr>
	                    <th>Sr No.</th>
	                    <th>Title</th>
	                    <th>contact_person</th>
	                    <th>contact_number</th>
	                    <th>details</th>
	                    <th>status</th>
	                    <th>created</th>
	                    <th>Action</th>
	                </tr>
	            </thead>
	            <tfoot>
	                <tr>
	                    <th>Sr No.</th>
	                    <th>Title</th>
	                    <th>contact_person</th>
	                    <th>contact_number</th>
	                    <th>details</th>
	                    <th>status</th>
	                    <th>created</th>
	                    <th>Action</th>
	                </tr>
	            </tfoot>
	            <tbody>
	            <?php 

				$size  = sizeof($result['help_us_list']);
				// print_r($result['help_us_list']);
				// die();

	            if($size > 0){

	            	$i = 1;

	                foreach($result['help_us_list'] as $members){

	                    echo '<tr>';
	                    echo '<td class="align-center">'.$i.'</td>';
	                    echo '<td>'.$members['title'].'</td>';
	                    echo '<td> '.$members['contact_person'].'</td>';
	                    echo '<td>'.$members['contact_number'].'</td>';
	                    echo '<td>'.$members['details'].'</td>';

	                    if ($members['status'] == 0) {
	                    	echo '<td><span class="badge badge-warning">Pending</span></td>';
	                    }else if ($members['status'] == 1) {
	                    	echo '<td><span class="badge badge-success">Completed</span></td>';
	                    }else {
	                    	echo '<td><span class="badge badge-danger">Cancele</span></td>';
	                    }

	                    echo '<td>'.$members['created_date'].'</td>';
	                    
	                    
	                    if ($members['status'] == 0) {
	                    	echo '<td>
    	                    <a href="javascript:;" data-id="'.$members['id'].'" id="delete" class="btn btn-danger btn-sm">Delete</a>
    	                    </td>';
	                    }else if ($members['status'] == 1) {
	                    	echo '<td>
    	                    <a href="'.base_url().'helpus_detail/'.$members['id'].'" class="btn btn-primary btn-sm">View</a>
    	                    <a href="javascript:;" data-id="'.$members['id'].'" id="delete" class="btn btn-danger btn-sm">Delete</a>
    	                    </td>';
	                    }else {
	                    	echo '<td>
    	                    <a href="'.base_url().'helpus_detail/'.$members['id'].'" class="btn btn-primary btn-sm">View</a>
    	                    </td>';
	                    }

	                    echo '</tr>';

	                    $i++;

	                }


	                
	            }

	            ?>
	            </tbody>
	        </table>
	    </div>
	</div> 


    </div>
</section>