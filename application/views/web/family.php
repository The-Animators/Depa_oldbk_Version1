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
                    <h2 class="text-uppercase">Family Details</h2>
                </div>
            </div>
            <div class="col-md-4 align-right">
                <div class="ulockd-dtitle hvr-float-shadow">
                    <h2>Family ID : <?= $result['family'][0]['family_id'];?></h2>
                    <input type="hidden" name="family_id" id="family_id" value="<?= $result['family'][0]['id']; ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label>Address:</label>
            </div>
            <div class="col-md-9">
                <?= $result['family'][0]['address_1'];?><br/>
                <?= $result['family'][0]['address_2'];?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label>Contact No:</label>
            </div>
            <div class="col-md-9">
                <?= $result['family'][0]['landline'];?>
            </div>
        </div>
        <div class="row">
            <h3>Member Details
                <?php  if($this->session->userdata('family_id') == $result['family'][0]['id']){ ?>

                <a href="<?= base_url(); ?>member/add" class="btn btn-warning btn-sm">Add Member</a>

                <?php  if($result['family'][0]['split_status'] == 0){ ?>
                <a href="<?= base_url(); ?>member/split" class="btn btn-danger btn-sm">Split Family</a>
                <?php }else{ ?>
                    <a href="javascript:;" class="btn btn-sm">Split Process Under Approval</a>
                <?php } ?>

                <?php  if($result['family'][0]['merge_status'] == 0){ ?>
                <button class="btn btn-success btn-sm" id="mergebtn">Merge Family</button>
                <?php }else{ ?>
                    <a href="javascript:;" class="btn btn-sm text-danger">Merge Process Under Approval</a>
                <?php } ?>
                
                <a href="<?= base_url(); ?>matrimonial/<?= $result['family'][0]['family_id'] ?>" class="btn btn-primary btn-sm">Matrimonial List</a>

            <?php } ?>
            </h3>
            
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="myTable">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Image</th>
                            <th>Member ID</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th style="width:70px;">Sr No.</th>
                            <th style="width:135px;">Image</th>
                            <th>Member ID</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php 
                    if($result['members']){
                        $i = 1;
                        foreach($result['members'] as $members){
                            // print_r($members);
                            $image = $members['image'];
                            $late   = '';
                            if($members['live_type'] == 'Death'){
                                $late = ' (Late)';
                            }
                            if($image != ''){
                                $fileName = FCPATH."uploads/members/".$image;
                                if (file_exists($fileName)) {
                                    $img = base_url().'uploads/members/'.$image;
                                }else{
                                    $img = base_url().'assets/img/noimage.jpg';
                                } 
                            }else{
                                $img = base_url().'assets/img/noimage.jpg';
                            }

                            $status = $members['fm_status'];
                            if ($status==1) {

                                echo '<tr>';
                                echo '<td class="align-center">'.$i.'</td>';
                                echo '<td class="align-center"><img src="'.$img.'" class="img-responsive"></td>';
                                echo '<td>'.$members['member_no'].'</td>';
                                echo '<td>'.$members['fullname'].' '.$late.'</td>';
                                echo '<td>'.$members['contact'].'</td>';
                                echo '<td class="align-center">';
                                echo ' <a href="'.base_url().'member/view/'.$members['member_no'].'" class="btn btn-primary btn-sm view">View</a> ';
                                if($this->session->userdata('family_id') == $result['family'][0]['id']){
                                    echo '<a href="'.base_url().'member/edit/'.$members['id'].'" class="btn btn-info btn-sm edit">Edit</a> ';
                                    echo '<a href="'.base_url().'business/'.$members['id'].'" class="btn btn-success btn-sm edit">Business</a> ';
                                    if($late==''){
                                        if($members['relation_id'] != 22){
                                            echo '<a href="javascript:void(0);" id="btn_death" data-id="'.$members['id'].'" data-dod="'.$members['dod'].'" class="btn btn-danger btn-sm edit">Death</a> ';
                                        }else{
                                            echo '<a href="'.base_url().'member/death/'.$members['id'].'" class="btn btn-danger btn-sm edit">Death</a> ';
                                        }
                                    }
                                    echo '<a href="javascript:void(0);" id="btn_delete" data-id="'.$members['id'].'" data-reason="'.$members['reason'].'" class="btn btn-warning btn-sm edit">Delete</a> ';
                                }
                                echo '</td></tr>';
                            }else if ($status==2 && $this->session->userdata('family_id') == $result['family'][0]['id']) {

                                echo '<tr>';
                                echo '<td class="align-center">'.$i.'</td>';
                                echo '<td class="align-center"><img src="'.$img.'" class="img-responsive"></td>';
                                echo '<td>'.$members['member_no'].'</td>';
                                echo '<td>'.$members['fullname'].' '.$late.'</td>';
                                echo '<td>'.$members['contact'].'</td>';
                                echo '<td class="align-center"> <a href="'.base_url().'member/view/'.$members['member_no'].'" class="btn btn-primary btn-sm view">View</a> <br> Edited (Approval Pending)</td>';
                                echo '</tr>';

                            }

                            $i++;
                        }
                    }?>
                    </tbody>
                </table>
            </div>
        </div>        
    </div>
</section>

<div class="modal fade bs-example-modal-md" id="DeathModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="exampleModalLabel"><span class="flaticon-lock"></span> Death Details</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form class="ulockd-login-form" method="POST" id="death-form" >
                        <div class="col-sm-12 text-center ">
                            <p>Please Enter the Date of Death</p>
                            <div class="form-group" name="test">
                                <input type="text" class="form-control" id="dod" name="dod" value="">

                                <input type="hidden" id="member_id" name="member_id" value="">
                                <input type="hidden" name="client" value="web">
                                <input type="hidden" name="ip" value="<?= $this->input->ip_address();?>">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-toggle="modal" id="updatedeath" data-form="death-form">Update <i class="fa fa-save" style="display: none"></i></button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
            <!-- modal footer start here-->
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-md" id="MergeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="exampleModalLabel"><span class="flaticon-lock"></span> Merge Family</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form class="ulockd-login-form" action="<?= base_url();?>member/merge" method="POST" id="merge-form" >
                        <div class="col-sm-12 text-center ">
                            <p>Please Enter Family No. to Merge</p>
                            <div class="form-group" name="test">
                                <input type="text" class="form-control" id="mfamily_no" name="mfamily_no" value="">
                                <input type="hidden" name="client" value="web">
                                <input type="hidden" name="ip" value="<?= $this->input->ip_address();?>">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-toggle="modal" id="updatemerge" data-form="death-form">Continue <i class="fa fa-save" style="display: none"></i></button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
            <!-- modal footer start here-->
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-md" id="DeleteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="exampleModalLabel"><span class="flaticon-lock"></span> Delete Member</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form class="ulockd-login-form" method="POST" id="delete-form" >
                        <div class="col-sm-12 text-center ">
                            <p>Reason for Delete</p>
                            <div class="form-group" name="test">
                                <input type="text" class="form-control" id="reason" name="reason" value="">
                                <input type="hidden" name="member_id" id="memberid" value="">
                                <input type="hidden" name="client" value="web">
                                <input type="hidden" name="ip" value="<?= $this->input->ip_address();?>">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-toggle="modal" id="updatedelete" data-form="death-form">Continue <i class="fa fa-save" style="display: none"></i></button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
            <!-- modal footer start here-->
        </div>
    </div>
</div>

<script>
    var msg = '<?= $msg; ?>';
</script>