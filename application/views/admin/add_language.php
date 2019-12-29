<?php include 'header.php';?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add a Language</h1>
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
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Language
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                   <form role="form" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="langname" value="<?php echo set_value('langname'); ?>">
											<?php echo form_error('langname','<p class="help-block" style="color:red;">','</p>'); ?>
                                        </div>
										
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="langimage">
											<?php echo form_error('langimage','<p class="help-block" style="color:red;">','</p>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" rows="3" name="langdesc"><?php echo set_value('langdesc'); ?></textarea>
											<?php echo form_error('langdesc','<p class="help-block" style="color:red;">','</p>'); ?>
                                        </div>
										<div class="form-group">
						<input type="submit" name="langSubmit" class="btn btn-primary" value="Add Language">
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
