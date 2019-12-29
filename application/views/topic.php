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
		<!--<object data="<?php //echo base_url('assets/images/topic_doc/'.$topic['image']);?>#toolbar=0&scrollbar=0&navpanes=0&embedded=true&statusbar=0&view=Fit;readonly=true;disableprint=true;" type="application/pdf" width="100%" height="70%">
  <p>Your browser does not support PDFs.
    <a href="<?php //echo base_url('assets/images/topic_doc/'.$topic['image']);?>">Download the PDF</a>.</p>
</object>-->

	  <?php if($topic['language'] == 'PHP'){?>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front/codemirror/lib/codemirror.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front/codemirror/theme/ambiance.css">
		<script src="<?php echo base_url(); ?>assets/front/vendor/jquery/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/front/codemirror/lib/codemirror.js"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front/codemirror/style.css">
		<!--<script src="<?php //echo base_url(); ?>assets/front/codemirror/editor-action.js"></script>-->
		<script src="<?php echo base_url(); ?>assets/front/codemirror/mode/htmlmixed/htmlmixed.js"></script>
		<script src="<?php echo base_url(); ?>assets/front/codemirror/mode/xml/xml.js"></script>
		<script src="<?php echo base_url(); ?>assets/front/codemirror/mode/javascript/javascript.js"></script>
		<script src="<?php echo base_url(); ?>assets/front/codemirror/mode/css/css.js"></script>
		<script src="<?php echo base_url(); ?>assets/front/codemirror/mode/clike/clike.js"></script>
		<script src='<?php echo base_url(); ?>assets/front/codemirror/mode/php/php.js'></script>
		<script src='<?php echo base_url(); ?>assets/front/codemirror/addon/selection/active-line.js'></script>
		<script src='<?php echo base_url(); ?>assets/front/codemirror/addon/edit/matchbrackets.js'></script>
		
			<textarea class="codemirror-textarea" id="code-editor"></textarea>
			<div class="app-row">
				<button class="btn-action" id="run">Run Code</button>
				<button class="btn-action" id="clear">Clear</button>
				<button class="btn-action" id="refresh">Refresh</button><span id="error"></span>
			</div>
			<br>
			<div class="app-row">
		  <div id="result"></div>
			</div>
		<script>
$(document).ready(function(){
	var codeEditorElement = $(".codemirror-textarea")[0];
    var editor = CodeMirror.fromTextArea(codeEditorElement, {
        mode: "application/x-httpd-php",
        lineNumbers: true,
        matchBrackets: true,
        theme: "ambiance",
        lineWiseCopyCut: true,
        undoDepth: 200
      });
    editor.setValue('<?php\necho "Hello Pavan123!";\n?>');

	$(document).on('click', '#run', function(e){
		
		e.preventDefault();
		$("#error").html("").hide();
		var editorCode = editor.getValue();
		if(editorCode != ''){
			var baseURL= "<?php echo base_url();?>";
		$.ajax({
			url: baseURL+'front/fw',
			type: 'POST',
			dataType: 'json',
			data: {input:editorCode},
			success:function(response){
				alert(response);
				$("#result").html(response);
				
			},
			complete:function(){
				$.ajax({
					url: 'code-editable.php',
					type: 'GET',
					success:function(response){
						console.log("response:  "+response);
						alert(response);
						$("#result").html(response)	;
					},
					error:function(){
						console.log("error: "+response);
						}
					});	
				}
			});

		} else{
			$("#error").html("Code should not be empty").show();
		}

	});

	$(document).on('click', '#clear', function(e){
		e.preventDefault();
		$("#error").html("").hide();
		editor.setValue('');
	});

	$(document).on('click', '#refresh', function(e){
		e.preventDefault();
		$("#error").html("").hide();
		location.reload();
	});
});
		</script>
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
  /* window.onload = function() {
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
  }; */
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
