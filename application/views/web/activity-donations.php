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
                    <h2 class="text-uppercase">Your Donations List</span></h2>
                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem labore voluptates consequuntur velit necessitatibus maiores fugiat eaque.</p> -->
                </div>
            </div>
        </div>
    <?php } ?>
        
    <div class="row">
	    <h3>Your Donation Details</h3>
	    <div class="table-responsive">
	        <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="myTable">
	            <thead>
	                <tr>
	                    <th>Sr No.</th>
	                    <th>Member ID</th>
	                    <th>Name</th>
	                    <th>Email</th>
	                    <th>Address</th>
	                    <th>Amount</th>
	                    <th>Ref No.</th>
	                    <th>Status</th>
	                    <th>Action</th>
	                </tr>
	            </thead>
	            <tfoot>
	                <tr>
	                    <th style="width:70px;">Sr No.</th>
	                    
	                    <th>Family ID</th>
	                    <th>Name</th>
	                    <th style="width:135px;">Email</th>
	                    <th>Address</th>
	                    <th>Amount</th>
	                    <th>Ref No.</th>
	                    <th>Status</th>
	                    <th>Action</th>
	                </tr>
	            </tfoot>
	            <tbody>
	            <?php 

				$size  = sizeof($result['donations_list']);

	            if($size > 0){

	            	$i = 1;

	                foreach($result['donations_list'] as $members){

	                    echo '<tr>';
	                    echo '<td class="align-center">'.$i.'</td>';
	                    echo '<td>'.$members['family_id'].'</td>';
	                    echo '<td>'.$members['donor_name'].'</td>';
	                    echo '<td>'.$members['email'].'</td>';
	                    echo '<td>'.$members['address'].'</td>';
	                    echo '<td>₹ '.$members['amount'].'</td>';
	                    echo '<td>'.$members['refernumber'].'</td>';

	                    if ($members['status'] == 0) {
	                    	echo '<td><span class="badge badge-warning">Pending</span></td>';
	                    }else if ($members['status'] == 1) {
	                    	echo '<td><span class="badge badge-success">Approved</span></td>';
	                    }else {
	                    	echo '<td><span class="badge badge-danger">Rejected</span></td>';
	                    }
	                    
	                    if ($members['recept_number'] != "") {
		                    echo '<td><a href="../uploads/receipts/'.$members['recept_number'].'" download id="btn_download" data-id="'.$members['id'].'" class="btn btn-success btn-sm download">Download</a></td>';
		                }else{
		                	echo '<td>No Receipt</td>';
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