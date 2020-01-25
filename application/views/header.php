<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/images/t.jpg">
  <title><?php echo $title;?></title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url(); ?>assets/front/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url(); ?>assets/front/css/modern-business.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/font-awesome/css/font-awesome.min.css">
  <style>
  .button {
    background-image: url ('/image/btn.png') no-repeat;
    cursor:pointer;
}
  </style>
</head>

<body oncopy="return false" oncut="return false" onpaste="return false">

  <!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="<?php echo base_url();?>">Trainuonline</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
	  
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
		
		
          <?php if(isset($_SESSION['userProfile']['email'])){?>
		  <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url().'logout';?>">Logout</a>
		  </li>
		  <?php }else{ ?>
		  <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url().'register';?>">Register</a>
        </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url().'login';?>">Login</a>
          </li>
		  <?php } ?>
		  <li>&nbsp;&nbsp;&nbsp;</li>
          <li>
			<form method="post" action="<?php echo base_url().'search';?>" id="sform">
				<div class="input-group">
			<input type="text" class="form-control" placeholder="Search" required name="search">
			<div class="input-group-append">
			
			  <button class="btn btn-secondary" form="sform" type="submit">
				<i class="fa fa-search"></i>
			  </button>
			</div>
		  </div></form>
		</li>
         
        </ul>
      </div>
    </div>
  </nav>