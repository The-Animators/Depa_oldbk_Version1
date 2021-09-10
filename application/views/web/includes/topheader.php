<div class="header-topped">
	<div class="container">
		<div class="row">
			<div class="lohgu">
				<img src="<?= base_url();?>assets/web/images/logo1.png" style="width:90px">
			</div>
			<div class="col-md-7 col-md-offset2 col-sm-8 col-sm-offset4">
				<div class="text-right">
					<h4><span class="ulockd-welcntxt" style="margin-left: 10px">SHREE DEPA JAIN MAHAJAN TRUST</span></h4>
				</div>
			</div>
			<div class="col-md-5">
				<div class="welcm-ht text-right mt-10">
					<ul class="list-inline">
						<li>
							<?php if(($this->session->userdata('logintype') == 'normal') && ($this->session->userdata('logged_in'))){
							?>

							<a href="<?= base_url();?>family/<?= $this->session->userdata('family_no');?>">
								<i class="fa fa-user"></i> Family Details
							</a>
							<span style="color:#FFF;"> || </span>
							<a href="<?= base_url();?>donations/<?= $this->session->userdata('family_no');?>">
								<i class="fa fa-money"></i> Donations
							</a>
							<span style="color:#FFF;"> || </span> 
							<a href="<?= base_url();?>Api/login/logout">
								<i class="fa fa-lock"></i> Logout
							</a>
							
						<?php }else{?>

							<a href="javascript:void(0)">
								<div data-toggle="modal" data-target="#loginModal" id="login"><i class="fa fa-user"></i> Login</div>
							</a>

						<?php }?>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>		