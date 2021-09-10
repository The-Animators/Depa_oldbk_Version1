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
                    <h2 class="text-uppercase">Your Matrimony Lists</span></h2>
                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem labore voluptates consequuntur velit necessitatibus maiores fugiat eaque.</p> -->
                </div>
            </div>
        </div>
    <?php } ?>
        
    <div class="row">
	    <h3>
		    Members Details List
		    <a href="<?= base_url(); ?>matrimonial_add" class="btn btn-warning btn-sm">Add New Matrimoni</a>
		</h3>
	    <div class="table-responsive">
	        <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="myTable">
	            <thead>
	                <tr>
	                    <th>Sr No.</th>
	                    <th>Member ID</th>
	                    <th>Name</th>
	                    <th>Email</th>
	                    <th>Created</th>
	                    <th>Status</th>
	                    <th>Action</th>
	                </tr>
	            </thead>
	            <tfoot>
	                <tr>
	                    <th>Sr No.</th>
	                    <th>Member ID</th>
	                    <th>Name</th>
	                    <th>Email</th>
	                    <th>Created</th>
	                    <th>Status</th>
	                    <th>Action</th>
	                </tr>
	            </tfoot>
	            <tbody>
	            <?php 

				$size  = sizeof($result['matrimonial_list']);

				//print_r($result['matrimonial_list']);


	            if($size > 0){

	            	$i = 1;

	                foreach($result['matrimonial_list'] as $members){

	                    echo '<tr>';
	                    echo '<td class="align-center">'.$i.'</td>';
	                    echo '<td>'.$members['member_no'].'</td>';
	                    echo '<td>'.$members['fullname'].'</td>';
	                    echo '<td>'.$members['email'].'</td>';
	                    echo '<td>'.$members['created_on'].'</td>';

	                    if ($members['status'] == 0) {
	                    	echo '<td><span class="badge badge-warning">Pending</span></td>';
	                    }else if ($members['status'] == 1) {
	                    	echo '<td><span class="badge badge-success">Aproved</span></td>';
	                    }else {
	                    	echo '<td><span class="badge badge-danger">Cancele</span></td>';
	                    }
	                    
	                    echo '<td>
	                    <a href="'.base_url().'matrimonialdetail/'.$members['member_no'].'" class="btn btn-primary btn-sm">View</a>
	                    <a href="javascript:;" data-id="'.$members['matrimonial_id'].'" data-member_no="'.$members['member_no'].'" id="delete" class="btn btn-danger btn-sm">Delete</a>
	                    </td>';

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