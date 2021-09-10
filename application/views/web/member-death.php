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
<?php
?>
<!-- Home Design Inner Pages -->
<?php $this->load->view('web/includes/breadcrumb');?>
<style type="text/css">
    .ulockd-dtitle{margin-bottom:20px!important }
    .size10{font-size: 10px}
    label{line-height: 45px;height: 45px}
    .lbl{line-height: 21px !important;height: auto !important;}
</style>
<!-- Inner Pages Main Section -->
<section class="ulockd-fservice">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 text-center">
                <div class="ulockd-dtitle hvr-float-shadow">
                    <h2 class="text-uppercase"><?= $title;?></span></h2>
                </div>
            </div>
        </div>

        <div class="row ">
            <div class="col-sm-12 col-md-12">
                <form class="donation-form donor-details" id="member-form" method="POST">
                    <div class="row">
                        <div class="col-md-6" firstname>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Date of Death</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="dod" name="dod" value="<?= $result['dod'] ?? '' ;?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" secondname>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>New Head of Family</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                       <select name="hof" id="hof" class="form-control ms">
                                        <option value="0">Select Member</option>
                                       <?php 
                                       // print_r($result['relation_id']);
                                        foreach($result as $member){
                                            if($member['id'] != $member_id && $member['live_type'] != 'Death'){
                                                echo '<option value="'.$member['id'].'">'.$member['fullname'].' ('.$member['member_no'].')</option>';
                                            }
                                        }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table id="expense_table" class="table mb-1" cellspacing="0" cellpadding="0">
                                 <thead class="thead-light">
                                    <tr>
                                        <th width="10%">Sr No</th>
                                        <th width="20%">Member No</th>
                                        <th width="40%">Full Name</th>
                                        <th width="30%">Relation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <input type="hidden" name="client" value="web">
                        <input type="hidden" name="ip" value="<?= $this->input->ip_address();?>">
                        <!-- <input type="hidden" name="photo_file_old" id="photo_file_old" value="<?= $result['image'] ?? '';?>"> -->
                        <input type="hidden" name="member_id" id="member_id" value="<?= $member_id;?>">
                        <input type="hidden" name="family_id" id="family_id" value="<?= $family_id;?>">
                        <button type="button" class="btn btn-md btn-success" id="submitdeath" data-form="member-form">Update <i class="fa fa-save"></i></button>
                        <button type="button" class="btn btn-md btn-danger" id="cancel">Cancel <i class="fa fa-close"></i></button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</section>
<script type="text/javascript">
     //<![CDATA[
    var dod = "<?= $result['dod'] ?? ''; ?>";
    var members, relation;
    <?php if($result){?>
        members = <?= json_encode($result); ?>;
    <?php } ?>
    <?php if($relation){?>
        relation = <?= json_encode($relation); ?>;
    <?php } ?>
    //]]>
</script>