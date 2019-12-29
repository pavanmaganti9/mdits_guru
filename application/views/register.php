<?php include 'header.php'; ?>
  <!-- Page Content -->
  <div class="container">
<br>

<div class="card bg-light">
<article class="card-body mx-auto col-sm-4" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Create Account</h4>
	<p class="text-center">Get started with your free account</p>
	<?php  if($this->session->flashdata('errmessage')){ ?>	
						<div class="" role="alert" align="center" style="color:red;">
		<?php echo $this->session->flashdata('errmessage'); ?>
									<br></div><br>
		<?php } ?>
	<p align="center">
		
		<!--<a href="" class="btn btn-block btn-twitter"> <i class="fab fa-twitter"></i>   Login via Twitter</a>
		<a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via facebook</a>-->
		<a href="<?php echo $loginURL; ?>"><img src="<?php echo base_url('assets/images/btn_google_signin_dark_pressed_web.png'); ?>" /></a>
	</p>
	<p class="divider-text">
        <span class="bg-light">OR</span>
    </p>
	<?php  if($this->session->flashdata('message')){ ?>	
						<div class="" role="alert" align="center" style="color:green;">
	<?php echo $this->session->flashdata('message'); ?>
								<br></div><br>
	<?php } ?>
	<form method="post">
	<input type="hidden" name="registertoken" value="<?php echo $token;?>">
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="fname" class="form-control" placeholder="First name" type="text" value="<?php echo set_value('fname'); ?>">
    </div> <!-- form-group// -->
	<?php echo form_error('fname','<p class="help-block" style="color:red;">','</p>'); ?>
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="lname" class="form-control" placeholder="Last name" type="text" value="<?php echo set_value('lname'); ?>">
    </div>
	<?php echo form_error('lname','<p class="help-block" style="color:red;">','</p>'); ?>
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="email" class="form-control" placeholder="Email address" type="email" value="<?php echo set_value('email'); ?>">
    </div>
	<?php echo form_error('email','<p class="help-block" style="color:red;">','</p>'); ?>
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		</div>
		
    	<input name="phone" class="form-control" placeholder="Phone number" type="number" value="<?php echo set_value('phone'); ?>">
    </div>
	<?php echo form_error('phone','<p class="help-block" style="color:red;">','</p>'); ?>
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		</div>
		<select name="gender" class="form-control">
			<option value="none" selected=""> Select Gender</option>
			<option value="Male" <?php echo set_select('gender','Male', ( !empty($data) && $data == "Male" ? TRUE : FALSE )); ?>>Male</option>
			<option value="Female" <?php echo set_select('gender','Female', ( !empty($data) && $data == "Female" ? TRUE : FALSE )); ?>>Female</option>
		</select>
	</div>
	<?php echo form_error('gender','<p class="help-block" style="color:red;">','</p>'); ?>
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control" name="password" placeholder="Create password" type="password" value="<?php echo set_value('password'); ?>">
    </div>
	<?php echo form_error('password','<p class="help-block" style="color:red;">','</p>'); ?>
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control" name="rpassword" placeholder="Repeat password" type="password" value="<?php echo set_value('rpassword'); ?>">
    </div>
	<?php echo form_error('rpassword','<p class="help-block" style="color:red;">','</p>'); ?>	
    <div class="form-group">
		<input type="submit" name="regsiterSubmit" class="btn btn-primary btn-block" value="Create Account">
    </div> <!-- form-group// -->      
    <p class="text-center">Have an account? <a href="<?php echo base_url().'login';?>">Log In</a> </p>                                                                 
</form>
</article>
</div> <!-- card.// -->

</div> 
<!--container end.//-->

<br>
  <!-- /.container -->
<style>
.divider-text {
    position: relative;
    text-align: center;
    margin-top: 15px;
    margin-bottom: 15px;
}
.divider-text span {
    padding: 7px;
    font-size: 12px;
    position: relative;   
    z-index: 2;
}
.divider-text:after {
    content: "";
    position: absolute;
    width: 100%;
    border-bottom: 1px solid #ddd;
    top: 55%;
    left: 0;
    z-index: 1;
}

.btn-facebook {
    background-color: #405D9D;
    color: #fff;
}
.btn-twitter {
    background-color: #42AEEC;
    color: #fff;
}
</style>
  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; MDITS <?php echo date("Y");?></p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="<?php echo base_url(); ?>assets/front/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/front/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
