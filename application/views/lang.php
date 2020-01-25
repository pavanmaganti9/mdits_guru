<?php include 'header.php'; ?>
<link href="<?php echo base_url(); ?>assets/front/css/style.css" rel="stylesheet">
  <!-- Page Content -->
  <div class="container">
	<div><br></div>
    <!-- Content Row -->
    <div class="row">
      <!-- Sidebar Column -->
      <div class="col-lg-2">
	  <?php $concepts = array();
	$langgu = array();
	foreach($topics as $topicc){
		$langgu[] = $topicc['language'];
			$concepts []= ($topicc['concept']);
	}
	$con_res = array_unique($concepts);
	  foreach($con_res as $row){?>
		<div class="leftmenu2">
			<h2 class="spanh2"><span class="spanh2" style="color:red;"><?php echo $row;?></span></h2>
		</div>
		<?php foreach($topics as $roww){
			//print_r($roww['name']);
			if($row == $roww['concept']){?>
		<div class="leftmenu">
			<a href="<?php echo base_url('topic/'.$roww['slug']);?>" style="text-decoration:none;"><?php echo $roww['name'];?></a>
			</div><br><?php } } } ?>
          <!--<div class="list-group">
		  <?php foreach($topics as $row){?>
          <a href="<?php echo base_url('topic/'.$row['slug']);?>" class="list-group-item"><?php echo $row['name'];?></a>
		  <?php } ?>
        </div>-->
      </div>
      <!-- Content Column -->
      <div class="col-lg-6 no-copy">
	  
	  <img src="<?php echo site_url('assets/images/languages/'.$language['image']); ?>" style="width:10%;">
        <h2><?php echo $language['name'];?></h2>
        <p><?php echo $language['description'];?></p>
      </div>
	  <div style="margin-bottom:50%;"><br></div>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
  <script language="JavaScript">
  /**
    * Disable right-click of mouse, F12 key, and save key combinations on page
    * By Arthur Gareginyan (arthurgareginyan@gmail.com)
    * For full source code, visit https://mycyberuniverse.com
    */
  window.onload = function() {
    document.addEventListener("contextmenu", function(e){
      e.preventDefault();
    }, false);
    document.addEventListener("keydown", function(e) {
    //document.onkeydown = function(e) {
      // "I" key
      if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
        disabledEvent(e);
      }
      // "J" key
      if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
        disabledEvent(e);
      }
      // "S" key + macOS
      if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
        disabledEvent(e);
      }
      // "U" key
      if (e.ctrlKey && e.keyCode == 85) {
        disabledEvent(e);
      }
      // "F12" key
      if (event.keyCode == 123) {
        disabledEvent(e);
      }
    }, false);
    function disabledEvent(e){
      if (e.stopPropagation){
        e.stopPropagation();
      } else if (window.event){
        window.event.cancelBubble = true;
      }
      e.preventDefault();
      return false;
    }
  };
</script>
<style>
.no-copy {
  -webkit-user-select: none;  /* Chrome all / Safari all */
  -moz-user-select: none;     /* Firefox all */
  -ms-user-select: none;      /* IE 10+ */
  user-select: none;          /* Likely future */     
}
.container {
    max-width: 1400px;
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
