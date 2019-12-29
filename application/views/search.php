<?php include 'header.php'; ?>
  <!-- Page Content -->
  <div class="container">
<br>

<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <h2>
                        <?php echo $cnt; ?> results found for: <span class="text-navy"><b><?php echo $word;?></b></span>
                    </h2>
                    <small>Request time  (0.23 seconds)</small>
					
					
                    <!--<div class="search-form">
                        <form action="#" method="get">
                            <div class="input-group">
                                <input type="text" placeholder="Bootdey" name="search" class="form-control input-lg">
                                <div class="input-group-btn">
                                    <button class="btn btn-lg btn-primary" type="submit">
                                        Search
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>-->

					<?php
	  if(!empty($query)){
				foreach($query as $row){ ?>
                    <div class="hr-line-dashed"></div>
                    <div class="search-result">
                        <h3><a href="<?php echo base_url('topic/'.$row['slug']); ?>"><?php echo $row['name'];?></a></h3>
                        <a href="#" class="search-link"></a>
                        <p>

                        </p>
                    </div>
	  <?php } }?>
                    <div class="hr-line-dashed"></div>
                   
                   
                    
                    <!--<div class="text-center">
                        <div class="btn-group">
                            <button class="btn btn-white" type="button"><i class="glyphicon glyphicon-chevron-left"></i></button>
                            <button class="btn btn-white">1</button>
                            <button class="btn btn-white  active">2</button>
                            <button class="btn btn-white">3</button>
                            <button class="btn btn-white">4</button>
                            <button class="btn btn-white">5</button>
                            <button class="btn btn-white">6</button>
                            <button class="btn btn-white">7</button>
                            <button class="btn btn-white" type="button"><i class="glyphicon glyphicon-chevron-right"></i> </button>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.ibox-content {
    background-color: #FFFFFF;
    color: inherit;
    padding: 15px 20px 20px 20px;
    border-color: #E7EAEC;
    border-image: none;
    border-style: solid solid none;
    border-width: 1px 0px;
}

.search-form {
    margin-top: 10px;
}

.search-result h3 {
    margin-bottom: 0;
    color: #1E0FBE;
}

.search-result .search-link {
    color: #006621;
}

.search-result p {
    font-size: 12px;
    margin-top: 5px;
}

.hr-line-dashed {
    border-top: 1px dashed #E7EAEC;
    color: #ffffff;
    background-color: #ffffff;
    height: 1px;
    margin: 20px 0;
}

h2 {
    font-size: 24px;
    font-weight: 100;
}

</style>

</div> 
<!--container end.//-->

<br>
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
