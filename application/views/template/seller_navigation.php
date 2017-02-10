<nav class="navbar navbar-default navbar-static-top" id="navbar-trendle">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#trendle-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url(); ?>"><span class="color-orange font-2">Trendle</span><span class="color-bluegreen font-2">Deals</span></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="trendle-navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li name="deals"><a href="<?php echo base_url(); ?>deals" class="text-uppercase <?php echo $this->uri->segment(1) == 'deals' ? 'active' : ''; ?>">Deals</a></li>
                <li name="mypromotions"><a href="<?php echo base_url(); ?>mypromotions" class="text-uppercase <?php echo $this->uri->segment(1) == 'mypromotions' ? 'active' : ''; ?>">My Promotions</a></li>
                <li name="archive"><a href="<?php echo base_url(); ?>archive" class="text-uppercase <?php echo $this->uri->segment(1) == 'archive' ? 'active' : ''; ?>">Archive</a></li>
                <!--li><a href="<?php echo base_url(); ?>faq/shopper" class="text-uppercase <?php echo $this->uri->segment(1) == 'faq' ? 'active' : ''; ?>">FAQ</a></li-->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle text-uppercase  <?php echo $this->uri->segment(1) == 'account' ? 'active' : ''; ?>" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url(); ?>account/seller">User Details</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo base_url(); ?>reviewerdashboard/logout">Logout</a></li>
                    </ul>
                </li>
				<li>
					<a href="<?php echo base_url(); ?>faq" target="_blank">FAQ &nbsp;</a>
				</li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</nav>
<?php  if($this->session->userdata('isverified')==0){ ?>
		<br>
		<div class="alert alert-info" style="margin-left: 10px; margin-right: 10px;">
		<a href="#" class="close close-verification-alert" data-dismiss="alert" aria-label="close">&times;</a>
		 <p>Please confirm your account by clicking on the link received in the email received at registration 
		(remember to check your Spam folder). If you haven't received your link please 
		<a href='' style="word-break: keep-all; white-space: nowrap;" onclick='return resend_verifiication();'>click here!</a>
		</p>
		</div>
<?php } ?>