<?php include 'header.php';?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Topics</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            View all Topics
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Language</th>
                                            <th>Image</th>
                                            <th>Created</th>
											<th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php if(!empty($topics)){ 
									//$user_type = $sess['user_type'];
									foreach($topics as $lang): ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $lang['name']; ?></td>
                                            <td><?php echo $lang['image']; ?></td>
                                            <td><?php echo $lang['created']; ?></td>
                                            <td align="center"><a href="<?php echo site_url('admin/edittopic/'.$lang['id']); ?>" title="Edit Record"><img src="<?php echo base_url('assets/images/edit.png'); ?>" width="23"/></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url('admin/deletetopic/'.$lang['id']); ?>" title="Delete Record"><img src="<?php echo base_url('assets/images/delete.png'); ?>" width="23"/></a></td>
                                        </tr>
                                      <?php endforeach; }?>   
                                     
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="<?php echo base_url(); ?>assets/admin/js/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Tables -->
    <script src="<?php echo base_url(); ?>assets/admin/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/plugins/dataTables/dataTables.bootstrap.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="<?php echo base_url(); ?>assets/admin/js/sb-admin.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script>

</body>

</html>
