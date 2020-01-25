<?php include 'header.php';?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add a Tutorial</h1>
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
                            Tutorial
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                   <form role="form" method="post" enctype="multipart/form-data">
										<div class="form-group">
													<label for="lang">Technology</label>
													<select name="lang" class="form-control">
										 <option value="none" selected="">--- Select Technology ---</option>
										 <?php foreach($languages as $post): ?>
										<option value="<?php echo $post['name'];?>"> <?php echo $post['name'];?></option>
										<?php endforeach;?>
										</select>
										<?php echo form_error('lang','<p class="help-block" style="color:red;">','</p>'); ?>
										</div>
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="tutoname" value="<?php echo set_value('tutoname'); ?>">
											<?php echo form_error('tutoname','<p class="help-block" style="color:red;">','</p>'); ?>
                                        </div>
										
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="tutoimage">
											<?php echo form_error('tutoimage','<p class="help-block" style="color:red;">','</p>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" rows="3" name="tutodesc"><?php echo set_value('tutodesc'); ?></textarea>
											<?php echo form_error('tutodesc','<p class="help-block" style="color:red;">','</p>'); ?>
                                        </div>
										<div class="form-group">
						<input type="submit" name="tutoSubmit" class="btn btn-primary" value="Add Tutorial">
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
