<?php include 'header.php';?>

	<script src="<?php echo base_url(); ?>assets/admin/ckeditor/ckeditor.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/ckeditor/samples/js/sample.js"></script>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add a Topic</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
				<?php  if($this->session->flashdata('message')){ ?>	
						    <div class="alert alert-success alert-dismissable">
					        <?php echo $this->session->flashdata('message'); ?>
							</div>
							<?php } ?>
				<?php  if($this->session->flashdata('errmessage')){ ?>	
						    <div class="alert alert-danger alert-dismissable">
					        <?php echo $this->session->flashdata('errmessage'); ?>
							</div>
							<?php } ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Topic
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                            <form role="form" method="post" enctype="multipart/form-data">
										<div class="form-group">
													<label for="lang">Technology</label>
													<select name="lang" class="form-control" required id="lang">
										 <option value="none" selected="">--- Select Technology ---</option>
										 <?php foreach($languages as $post): ?>
										<option value="<?php echo $post['name'];?>"> <?php echo $post['name'];?></option>
										<?php endforeach;?>
										</select>
										<?php echo form_error('lang','<p class="help-block" style="color:red;">','</p>'); ?>
										</div>
										<div class="form-group">
                                            <label>Tutorial Name</label>
											<select class="form-control" name="tutoname" id="tutoname" disabled="">
												<option  value="none" selected="">Select Tutorial</option>
											</select>
											<?php echo form_error('tutoname','<p class="help-block" style="color:red;">','</p>'); ?>
										</div>
										<div class="form-group">
                                            <label>Heading</label>
                                            <input class="form-control" name="heading" value="<?php echo set_value('heading'); ?>">
											<?php echo form_error('heading','<p class="help-block" style="color:red;">','</p>'); ?>
											<p class="help-block">Please write same Heading (case-sensitive) for related Tutorial.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Topic</label>
                                            <input class="form-control" name="topicname" value="<?php echo set_value('topicname'); ?>">
											<?php echo form_error('topicname','<p class="help-block" style="color:red;">','</p>'); ?>
                                        </div>
										
										<div class="form-group">
                                            <label>Document</label>
                                            <input type="file" name="topicdoc">
											<?php //echo form_error('topicdoc','<p class="help-block" style="color:red;">','</p>'); ?>
											<p class="help-block">Please upload files with extension ".pdf", ".doc", ".docx"</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="ckeditor" rows="3" id="topicdesc" name="topicdesc"><?php echo set_value('topicdesc'); ?></textarea>
											<?php echo form_error('topicdesc','<p class="help-block" style="color:red;">','</p>'); ?>
                                        </div>
										<div class="form-group">
						<input type="submit" name="topicSubmit" class="btn btn-primary" value="Add Topic">
                        </div>
							</form>
							   </div>
                                
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
	<script>
	initSample();
</script>
<script>
  CKEDITOR.replace( 'topicdesc' );
</script>
    <!-- /#wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="<?php echo base_url(); ?>assets/admin/js/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Forms -->

    <!-- SB Admin Scripts - Include with every page -->
    <script src="<?php echo base_url(); ?>assets/admin/js/sb-admin.js"></script>

    <script>
		$(document).ready(function(){
			$('#lang').on('change',function(){
				var techno_name = $(this).val();
				if(techno_name == ''){
					$('#tutoname').prop('disabled',true);
				}else{
					$('#tutoname').prop('disabled',false);
					$.ajax({
						url:"<?php echo base_url('admin/get_tutorial'); ?>",
						type:"POST",
						data:{'techno_name':techno_name},
						dataType:'json',
						success:function(data){
							$('#tutoname').html(data);
						},
						error:function(){
							$('#tutoname').prop('disabled',true);
						}
					});
				}
			})
		});
	</script>

</body>

</html>
