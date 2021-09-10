<!-- Home Design Inner Pages -->
<div class="ulockd-inner-home">
    <div class="container align-center">
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
<section class="ulockd-fservice">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="ulockd-dtitle hvr-float-shadow">
                    <h2 class="text-uppercase">Business Details</h2>
                </div>
            </div>
            <div class="col-md-4 align-right">
                <div class="ulockd-dtitle hvr-float-shadow">
                    <h2>Member ID : <?= $result['family'][0]['member_no'];?></h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="myTable">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Company Name</th>
                            <th>Designation</th>
                            <th>Address</th>
                            <th>Area</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Website</th>
                            <?php if($this->session->userdata('family_id') == $result['family'][0]['family_id']){ ?>
                            <th  class="align-center"><a href="<?= base_url(); ?>business/add/<?= $result['family'][0]['member_id'];?>" class="btn btn-warning btn-sm">Add Business</a></th>
                            <?php }else{ ?>
                                <th>Action</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th style="width:70px;">Sr No.</th>
                            <th>Company Name</th>
                            <th>Designation</th>
                            <th>Address</th>
                            <th>Area</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Website</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php 
                    if($result['business']){
                        $i = 1;
                        foreach($result['business'] as $members){
                            echo '<tr>';
                            echo '<td class="align-center">'.$i.'</td>';
                            echo '<td>'.$members['company_name'].'</td>';
                            echo '<td>'.$members['designation'].'</td>';
                            echo '<td>'.$members['address_1'].'</td>';
                            echo '<td>'.$members['area'].'-'.$members['pincode'].'</td>';
                            echo '<td>'.$members['contact'].'</td>';
                            echo '<td>'.$members['email'].'</td>';
                            echo '<td>'.$members['website'].'</td>';
                            echo '<td class="align-center">';
                            if($this->session->userdata('family_id') == $members['family_id']){
                                echo '<a href="'.base_url().'business/edit/'.$members['id'].'" class="btn btn-info btn-sm edit">Edit</a>';
                            }
                            //echo ' <a href="'.base_url().'business/view/'.$members['id'].'" class="btn btn-primary btn-sm view">View</a></td>';
                            echo '</td></tr>';
                            $i++;
                        }
                    }?>
                    </tbody>
                </table>
            </div>
        </div>        
    </div>
</section>