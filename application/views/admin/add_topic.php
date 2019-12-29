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
                                            <label>Topic Name</label>
                                            <input class="form-control" name="topicname" value="<?php echo set_value('topicname'); ?>">
											<?php echo form_error('topicname','<p class="help-block" style="color:red;">','</p>'); ?>
                                        </div>
										<div class="form-group">
													<label for="lang">Language</label>
													<select name="lang" class="form-control" required>
										 <option>--- Select Language ---</option>
										 <?php foreach($languages as $post): ?>
										<option value="<?php echo $post['name'];?>"> <?php echo $post['name'];?></option>
										<?php endforeach;?>
										</select>
										<?php echo form_error('lang','<p class="help-block" style="color:red;">','</p>'); ?>
										</div>
										<div class="form-group">
                                            <label>Document</label>
                                            <input type="file" name="topicdoc">
											<?php echo form_error('topicdoc','<p class="help-block" style="color:red;">','</p>'); ?>
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

    <!-- Page-Level Demo Scripts - Forms - Use for reference -->

</body>

</html>
