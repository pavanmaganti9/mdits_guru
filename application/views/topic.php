<?php include 'header.php'; ?>
<link href="<?php echo base_url(); ?>assets/front/css/style.css" rel="stylesheet">
  <!-- Page Content -->
  <div class="container">
	<div><br></div>
    <!-- Content Row -->
    <div class="row">
      <!-- Sidebar Column 
	  <div class="col-sm-12">-->
	  
      <div class="col-lg-2">
	  <div class="scroll">
<?php $url = base_url(uri_string()); 
	  $chunk = explode('/',$url);
	  $url_chunk = $chunk[5];
	  ?>	  
        <?php $concepts = array();
		//print_r($topics);
	$langgu = array();
	$conce = array();
	foreach($topics as $topicc){
		$langgu[] = $topicc['language'];
			$concepts []= ($topicc['heading']);
			$conce []= ($topicc['concept']);

	}
	$con_res = array_unique($concepts);
	$concqwe = array_unique($conce);
	print_r("<h4>".$concqwe[0]."</h4>");
	  foreach($con_res as $row){
		  ?>
		<div class="leftmenu2">
			<h2 class="spanh2"><span class="spanh2" style="color:red;"><?php echo $row;?></span></h2>
		</div>
		<?php foreach($topics as $roww){
			//print_r($roww['name']);
			if($row == $roww['heading']){?>
		<div class="leftmenu">
			<a href="<?php echo base_url('topic/'.$roww['slug']);?>" style="text-decoration:none;"><?php if($url_chunk == $roww['slug']){ echo "<b style='color:#000;'>".$roww['name']."</b>"; }else{ echo $roww['name'];}?></a>
			</div><br><?php } } } ?>
      </div></div>
      <!-- Content Column -->
      <div class="col-lg-6 no-copy">
	  <?php //print_r($usersess);
	  $utopics = $usersess['topic'];
	  $utopic = explode(',',$utopics);
	  $currentopic = $topic['language'];
	   $utopicststus = $usersess['tstatus'];
	  $present_date = date("Y/m/d H:i");
	 $endate = $usersess['tenddate'];
	  //$diff = (strtotime($endate) - strtotime($present_date)); 
		/* $years   = floor($diff / (365*60*60*24)); 
		$months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
		$days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
		$hours   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 
		$minutes  = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60); 
		$seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60)); 
		$to_time = strtotime(date("Y/m/d H:i"));
		$from_time = strtotime($endate);
		$exp = round(($to_time - $from_time) / 60,2); */
		//printf("%d years, %d months, %d days, %d hours, %d minutes\n, %d seconds\n", $years, $months, $days, $hours, $minutes, $seconds); 
$date1 = new DateTime($endate);
$date2 = new DateTime($present_date);
$diff = $date1->diff($date2);
//print_r($date2);
// 3036 seconds to go [number is variable]
 ( ($diff->days * 24 ) * 60 ) + ( $diff->i * 60 ) + $diff->s . ' seconds';
// passed means if its negative and to go means if its positive
$exp = ($diff->invert == 1 ) ? 'passed' : 'expired';
//echo $exp;

	  ?>
	  <?php if((in_array($currentopic, $utopic)) && $utopicststus == 1 && $exp == 'passed'){ ?>
        <h2><?php echo $topic['name'];?></h2><p align="right"><!--<a href="<?php echo base_url().'front/download/'.$topic['image']; ?>">Download Topic</a>--></p>
        <p><?php echo $topic['description'];?></p>
		<!--<p>Executer the <a href="../front/fw">code</a></p>
		<object data="<?php //echo base_url('assets/images/topic_doc/'.$topic['image']);?>#toolbar=0&scrollbar=0&navpanes=0&embedded=true&statusbar=0&view=Fit;readonly=true;disableprint=true;" type="application/pdf" width="100%" height="70%">
		  <p>Your browser does not support PDFs.
			<a href="<?php //echo base_url('assets/images/topic_doc/'.$topic['image']);?>">Download the PDF</a>.</p>
		</object>-->

	  <?php if($topic['language'] == 'PHP'){?>
	  <iframe src="<?php echo base_url('front/fw'); ?>" height="60%" width="100%"> </iframe>
	  <?php } } else{ ?>
		You have no permission to view this topic. Please contact MDITS.
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
		// "C" key
      if (e.ctrlKey && e.shiftKey && e.keyCode == 67) {
        disabledEvent(e);
      }
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
.scroll {
  height: 90%;
  width:16%;
  position:fixed;
  overflow-x:auto;
  overflow-y:auto;
  z-index: 1;
  overflow: scroll; 
    background-color:#FFF;
}
</style>
  <!-- Footer 
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; MDITS <?php echo date("Y");?></p>
    </div>
   
  </footer>-->

  <!-- Bootstrap core JavaScript -->
  <script src="<?php echo base_url(); ?>assets/front/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/front/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
