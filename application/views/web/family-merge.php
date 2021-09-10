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
                    <h2 class="text-uppercase"><?= $title; ?></h2>
                </div>
            </div>
            <div class="col-md-4 align-right">
                <div class="ulockd-dtitle hvr-float-shadow">
                    <h2>Family ID : <?= $family['family'][0]['family_id'];?></h2>
                    <input type="hidden" name="family_id" id="family_id" value="<?= $family['family'][0]['id']; ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <h3>Select Members</h3>
            <div class="table-responsive">
               <form class="donation-form donor-details" id="split-form" method="POST">
                <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="myTable">
                    <thead>
                        <tr>
                            <th style="width:70px;">Sr No.</th>
                            <th>Select</th>
                            <!-- <th style="width:135px;">Image</th> -->
                            <th>Member ID</th>
                            <th>Name</th>
                            <th>Mobile</th>
                        </tr>
                    </thead>
                    <tbody id="count">
                    <?php 
                    if($result){
                        $i = 1;
                        foreach($result as $members){
                            $late   = '';
                            $check = '';
                            $status = '';
                            if($members['live_type'] == 'Death'){
                                $late = ' (Late)';
                            }
                            if ($members['merge_flag']==0) {
                                $status = '';
                                $check = '<td class="align-center"><input type="checkbox" name="member_id[]" id="member_id_'.$members['id'].'" value="'.$members['id'].'"></td>';
                            }else{
                                $status = 'style="background-color: #ffcc87;"';
                                $check = '<td class="align-center"><span class="badge bagde-warning">Approval Pending</span></td>';
                            }

                            echo '<tr '.$status.'>';
                            echo '<td class="align-center">'.$i.'</td>';
                            echo $check;
                            echo '<td>'.$members['member_no'].'</td>';
                            echo '<td>'.$members['fullname'].' '.$late.'</td>';
                            echo '<td>'.$members['contact'].'</td>';
                            echo '</tr>';
                            $i++;
                        }
                    }?>
                    <tr>
                        <td colspan=5>
                            <input type="hidden" name="client" value="web">
                            <input type="hidden" name="ip" value="<?= $this->input->ip_address();?>">
                            <input type="hidden" name="family_id" id="family_id" value="<?= $family_id; ?>">
                            <input type="hidden" name="member_no" id="member_no" value="<?= $this->session->userdata('member_no'); ?>">
                            <input type="hidden" name="family_no" id="family_no" value="<?= $this->session->userdata('family_no'); ?>">

                            <input type="hidden" name="merge_members_info" id="merge_members_info" value="">

                            <button type="button" class="btn btn-md btn-success" id="submitmerge" data-form="member-form">Merge  <i class="fa fa-save"></i></button>
                            <button type="button" class="btn btn-md btn-danger" id="cancel">Cancel <i class="fa fa-close"></i></button>
                        </td>
                    </tr>
                    </tbody>
                </table>
                </form>
            </div>
        </div>        
    </div>
</section>
