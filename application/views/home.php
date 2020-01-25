<?php include 'header.php';?>
<link href="<?php echo base_url(); ?>assets/front/css/style.css" rel="stylesheet">
  <!--<header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active" style="background-image: url('http://placehold.it/1900x1080')">
          <div class="carousel-caption d-none d-md-block">
            <h3>First Slide</h3>
            <p>This is a description for the first slide.</p>
          </div>
        </div>
        <div class="carousel-item" style="background-image: url('http://placehold.it/1900x1080')">
          <div class="carousel-caption d-none d-md-block">
            <h3>Second Slide</h3>
            <p>This is a description for the second slide.</p>
          </div>
        </div>
        <div class="carousel-item" style="background-image: url('http://placehold.it/1900x1080')">
          <div class="carousel-caption d-none d-md-block">
            <h3>Third Slide</h3>
            <p>This is a description for the third slide.</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </header>-->

  <!-- Page Content -->
  <div class="container">

    <h1 class="my-4">Welcome to Trainuonline</h1>
	<?php if(isset($_SESSION['userProfile']['email'])){
		  echo "Hai <b>".$_SESSION['userProfile']['email']."</b><br><br>";
	  } ?>
	  
	<?php if(!empty($languages)){
                  foreach($languages as $lang): ?>
	<div class="card">
  <div class="card-body">
    <div>
	<div align="left"><a href="<?php echo base_url();?>course/<?php echo $lang->slug;?>" style="text-decoration:none;color:#000;"><h5 class="card-title"><?php echo $lang->name;?>&nbsp;&nbsp;<img class="img-responsive" src="<?php echo site_url('assets/images/languages/'.$lang->image); ?>" alt="<?php echo $lang->name;?>" width="50" height="50"></h5></a>
	</div>
	<div align="right"><a href="<?php echo base_url();?>course/<?php echo $lang->slug;?>">View All</a></div>
	</div>
	
	<div class="row">
	<?php foreach($tutorial as $tuto) {
		$img = $tuto->tutoimage;
                    $chunk = explode(".",$img);
                    $thumb = $chunk[0]."_thumb.".$chunk[1];
			if($tuto->techno == $lang->name){
	?>
	<a href="<?php echo base_url('concept/'.$tuto->tutoname);?>" style="text-decoration:none;">
	<div class="homecontent"><img class="lazyloaded" alt="<?php echo $tuto->tutoname;?>" src="<?php echo base_url('assets/images/tutorials/'.$thumb);?>">
    <p><?php echo $tuto->tutoname;?></p>
    </div>
	</a>
	<?php } } ?>
	</div>
	 
	 </div>
	
	</div>
	
	<br>
	<?php endforeach; } ?>  
    <!-- Marketing Icons Section -->
    <!--<div class="row">
		<?php if(!empty($languages)){
                  foreach($languages as $lang): ?>
		
	 <div class="col-lg-4 mb-4">
	 
        <div class="card h-100">
		
          <h4 class="card-header"><?php echo $lang->name;?></h4>
          <div class="card-body"><a href="<?php echo base_url();?>course/<?php echo $lang->slug;?>" style="text-decoration:none;color:#000;">
		  <img class="img-responsive" src="<?php echo site_url('assets/images/languages/'.$lang->image); ?>" alt="<?php echo $lang->name;?>" style="width:50px;height:auto;"><p></p>
            <p class="card-text"><?php echo substr($lang->description,0,100);?>...</p></a>
          </div>
          <div class="card-footer">
            <a href="<?php echo base_url();?>course/<?php echo $lang->slug;?>" class="btn btn-primary">Learn More</a>
          </div>
        </div>
      </div>
      <?php endforeach; } ?>  
    </div>-->
    <!-- /.row -->


  </div>
  <!-- /.container -->

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
