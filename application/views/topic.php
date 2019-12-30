<?php include 'header.php'; ?>

  <!-- Page Content -->
  <div class="container">
	<div><br></div>
    <!-- Content Row -->
    <div class="row">
      <!-- Sidebar Column -->
      <div class="col-lg-3 mb-4">
				
          <div class="list-group">
		  <?php foreach($topics as $row){?>
          <a href="<?php echo base_url('topic/'.$row['slug']);?>" class="list-group-item"><?php echo $row['name'];?></a>
		  <?php } ?>
        </div>
      </div>
      <!-- Content Column -->
      <div class="col-lg-9 mb-4">
	  
        <h2><?php echo $topic['name'];?></h2><p align="right"><a href="<?php echo base_url().'front/download/'.$topic['image']; ?>">Download Topic</a></p>
        <p><?php echo $topic['description'];?></p>
		<p>Executer the <a href="../front/fw">code</a></p>
		<!--<object data="<?php //echo base_url('assets/images/topic_doc/'.$topic['image']);?>#toolbar=0&scrollbar=0&navpanes=0&embedded=true&statusbar=0&view=Fit;readonly=true;disableprint=true;" type="application/pdf" width="100%" height="70%">
  <p>Your browser does not support PDFs.
    <a href="<?php //echo base_url('assets/images/topic_doc/'.$topic['image']);?>">Download the PDF</a>.</p>
</object>-->

	  <?php if($topic['language'] == 'PHP'){?>
	  <iframe src="<?php echo base_url('front/fw'); ?>" height="60%" width="100%"> 
    </iframe>
	  <?php } ?>
		
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
