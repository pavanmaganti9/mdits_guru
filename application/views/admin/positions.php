<?php include 'header.php';?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Set the topic position</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           
               <form method="post" action="<?php echo base_url('admin/searchpos');?>">        
           <div id="custom-search-input">
                            <div class="input-group col-md-8">
								
                                <input type="text" required="required" name="searchpos" class="search-query form-control" placeholder="Search for heading"/>
                                <span class="input-group-btn">
									<input type="submit" name="searchSubmit" class="btn btn-primary" value="Search">
                                </span>
								
                            </div>
                        </div></form>
						<?php if(isset($_POST['searchSubmit'])){ ?>
						<br>
						Searched for <b><?php echo $word;?></b><br><br>
						<div class="table-responsive col-md-8">
						<table border="" class="table table-hover table-bordered">
				<tr>
					<td>Title</td>
					<td>Heading</td>
					<td>Position</td>
				</tr>
						<?php
	  
				foreach($query as $row){ ?>
				
				<tr>
					<td><a href="<?php echo base_url('topic/'.$row['id']); ?>"><?php echo $row['name'];?></a></td>
					<td><?php echo $row['heading'];?></td>
					<td><?php echo $row['position'];?><a href="<?php echo base_url('admin/changepos/down/'.$row['id']); ?>"><i class="fa fa-arrow-circle-o-down" style="font-size:25px;"></i></a>&nbsp;<a href="<?php echo base_url('admin/changepos/up/'.$row['id']); ?>"><i class="fa fa-arrow-circle-o-up" style="font-size:25px;"></i></a></td>
				</tr>
                    
					
						<?php } ?></table></div><?php } ?>
                        <!-- /.panel-body -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<style>

#custom-search-input {
        margin:0;
        margin-top: 10px;
        padding: 0;
    }
 
    #custom-search-input .search-query {
        padding-right: 3px;
        padding-right: 4px \9;
        padding-left: 3px;
        padding-left: 4px \9;
        /* IE7-8 doesn't have border-radius, so don't indent the padding */
 
        margin-bottom: 0;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }
 
    #custom-search-input button {
        border: 0;
        background: none;
        /** belows styles are working good */
        padding: 2px 5px;
        margin-top: 2px;
        position: relative;
        left: -28px;
        /* IE7-8 doesn't have border-radius, so don't indent the padding */
        margin-bottom: 0;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        color:#D9230F;
    }
 
    .search-query:focus + button {
        z-index: 3;   
    }
</style>
    <!-- Core Scripts - Include with every page -->
    <script src="<?php echo base_url(); ?>assets/admin/js/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>

    

    <!-- SB Admin Scripts - Include with every page -->
    <script src="<?php echo base_url(); ?>assets/admin/js/sb-admin.js"></script>

   

</body>

</html>
