<?php include 'header.php';?>

	<script src="<?php echo base_url(); ?>assets/admin/ckeditor/ckeditor.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/ckeditor/samples/js/sample.js"></script>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Topic</h1>
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
                                            <label>Concept Name</label>
                                            <input class="form-control" name="conceptname" value="<?php echo !empty($post['concept'])?$post['concept']:''; ?>">
											<?php echo form_error('conceptname','<p class="help-block" style="color:red;">','</p>'); ?>
											<p class="help-block">Please write same Concept name (case-sensitive) for related topics.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Topic Name</label>
                                            <input class="form-control" name="topicname" value="<?php echo !empty($post['name'])?$post['name']:''; ?>">
											<?php echo form_error('topicname','<p class="help-block" style="color:red;">','</p>'); ?>
                                        </div>
										<div class="form-group">
                                            <label>Document</label><br><br>
											<?php if($post['image']!=''){?>
											<a href="<?php echo site_url('assets/images/topic_doc/'.$post['image']); ?>"><?php echo $post['image'];?></a>&nbsp;&nbsp;<a href="<?php echo site_url('admin/Admin/deletedoc/'.$id); ?>" title="Delete Document"><img src="<?php echo base_url('assets/images/delete.png'); ?>" width="23"/></a><br><br><?php }else{ ?>
                                            <input type="file" name="topicdoc">
											<?php echo form_error('topicdoc','<p class="help-block" style="color:red;">','</p>'); ?>
											<p class="help-block">Please upload files with extension ".pdf", ".doc", ".docx"</p><?php } ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="ckeditor" rows="3" id="topicdesc" name="topicdesc"><?php echo !empty($post['description'])?$post['description']:''; ?></textarea>
											<?php echo form_error('topicdesc','<p class="help-block" style="color:red;">','</p>'); ?>
                                        </div>
										<div class="form-group">
						<input type="submit" name="topicupdate" class="btn btn-primary" value="Update Topic">
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
