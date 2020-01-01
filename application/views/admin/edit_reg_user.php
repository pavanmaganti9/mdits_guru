<?php include 'header.php';?>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  	<script type="text/javascript">
        $(document).ready(function () {
			
			//DatePicker Example
			$('#datetimepicker').datetimepicker();
			$('#datetimepickerr').datetimepicker();
			
			//TimePicke Example
			$('#datetimepicker1').datetimepicker({
				datepicker:false,
				format:'H:i'
			});
			
			//Inline DateTimePicker Example
			$('#datetimepicker2').datetimepicker({
				format:'Y-m-d H:i',
				inline:true
			});
			
			//minDate and maxDate Example
			$('#datetimepicker3').datetimepicker({
				 format:'Y-m-d',
				 timepicker:false,
				 minDate:'-1970/01/02', //yesterday is minimum date
				 maxDate:'+1970/01/02' //tomorrow is maximum date
			});
			
			//allowTimes options TimePicker Example
			$('#datetimepicker4').datetimepicker({
				datepicker:false,
				allowTimes:[
				  '11:00', '13:00', '15:00', 
				  '16:00', '18:00', '19:00', '20:00'
				]
			});
			
		});
    </script>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">View Registered User</h1>
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
                            Users
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                            <form role="form" method="post">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input class="form-control" name="topicname" disabled value="<?php echo !empty($user['first_name'])?$user['first_name']:''; ?>">
                                        </div>
										<div class="form-group">
                                            <label>Last Name</label>
                                            <input class="form-control" name="topicname" disabled value="<?php echo !empty($user['last_name'])?$user['last_name']:''; ?>">
											<?php echo form_error('topicname','<p class="help-block" style="color:red;">','</p>'); ?>
                                        </div>
										<div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" name="topicname" disabled value="<?php echo !empty($user['email'])?$user['email']:''; ?>">
                                        </div>
										<?php if($user['phone'] != ''){?>
										<div class="form-group">
                                            <label>Phone</label>
                                            <input class="form-control" name="topicname" disabled value="<?php echo !empty($user['phone'])?$user['phone']:''; ?>">
                                        </div>
										<?php } ?>
										<?php if($user['oauth_provider'] != ''){?>
										<div class="form-group">
                                            <label>Registered through</label>
                                            <input class="form-control" name="topicname" disabled value="<?php echo !empty($user['oauth_provider'])?$user['oauth_provider']:''; ?>">
                                        </div>
										<?php } ?>
										<div class="form-group">
                                            <label>Last Login</label>
                                            <input class="form-control" name="topicname" disabled value="<?php echo !empty($user['modified'])?$user['modified']:''; ?>">
											<?php echo form_error('topicname','<p class="help-block" style="color:red;">','</p>'); ?>
                                        </div>
										<div class="form-group">
                                            <label>Register Date</label>
                                            <input class="form-control" name="topicname" disabled value="<?php echo !empty($user['created'])?$user['created']:''; ?>">
											<?php echo form_error('topicname','<p class="help-block" style="color:red;">','</p>'); ?>
                                        </div>
										<div class="form-group">
													<label for="lang">Topic</label>
										<select name="topic" class="form-control">
										 <option value="none">---Select Company---</option>
										 <option value="<?php echo $user['topic'];?>" selected> <?php echo $user['topic'];?></option>
										<?php foreach($lang as $post): ?>
										<option value="<?php echo $post['name'];?>"> <?php echo $post['name'];?></option>
										<?php endforeach;?>
										</select>
										<?php echo form_error('topic','<p class="help-block" style="color:red;">','</p>'); ?>
										</div>
										<div class="form-group">
													<label for="lang">Topic status</label>
										<?php if($user['tstatus'] == 1){ $usts = "Active";}else{$usts = "Inactive";}?>
										<select name="topicstat" class="form-control">
										 <option value="none">---Select Company---</option>
										 <option value="<?php echo $user['tstatus'];?>" selected> <?php echo $usts;?></option>
										<?php if($user['tstatus'] == 1){?>
										<option value="0">Inactive</option>
										<?php }else{ ?>
										<option value="1">Active</option>
										<?php } ?>
										</select>
										<?php echo form_error('lang','<p class="help-block" style="color:red;">','</p>'); ?>
										</div>
										<div class="form-group">
										<label>Topic Start date</label>
											<input type="text" name="tsdate" id="datetimepicker" class="form-control" value="<?php echo !empty($user['tstartdate'])?$user['tstartdate']:''; ?>"/>
										</div>
										<div class="form-group">
										<label>Topic Expiry date</label>
											<input type="text" name="tedate" id="datetimepickerr" class="form-control" value="<?php echo !empty($user['tenddate'])?$user['tenddate']:''; ?>"/>
										</div>
										<div class="form-group">
													<label for="lang">User status</label>
										<?php if($user['ustatus'] == 1){ $usts = "Active";}else{$usts = "Inactive";}?>
										<select name="userstat" class="form-control">
										 <option value="none">---Select Company---</option>
										 <option value="<?php echo $user['ustatus'];?>" selected> <?php echo $usts;?></option>
										<?php if($user['ustatus'] == 1){?>
										
										<option value="0">Inactive</option>
										<?php }else{ ?>
										<option value="1">Active</option>
										<?php } ?>
										</select>
										<?php echo form_error('userstat','<p class="help-block" style="color:red;">','</p>'); ?>
										</div>
										<div class="form-group">
										<input type="submit" name="userupdate" class="btn btn-primary" value="Update User">
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
	<script src="<?php echo base_url(); ?>assets/admin/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/css/jquery.datetimepicker.min.css"/>
	<script src="<?php echo base_url(); ?>assets/admin/js/jquery.datetimepicker.js"></script>
    <!-- Page-Level Plugin Scripts - Forms -->
    <style type="text/css">
        .top-buffer {
            margin-top: 50px;
        }
		.bottom-buffer {
            margin-bottom: 50px;
        }
    </style>
    <!-- SB Admin Scripts - Include with every page -->
    <script src="<?php echo base_url(); ?>assets/admin/js/sb-admin.js"></script>

    <!-- Page-Level Demo Scripts - Forms - Use for reference -->

</body>

</html>
