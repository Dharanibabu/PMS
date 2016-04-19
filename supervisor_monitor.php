<!DOCTYPE html>

<?php
session_start();
   
if($_SESSION['supervisor'] == false)
{
	header('Location: index.php');
}
	
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meiconn - Monitor</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
	<link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />

    <!-- Page-Level CSS -->
    <link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
		<link href="assets/css/settings.css" rel="stylesheet" />

		
</head>


<body onload="getMachineValue()">
	<script type="text/javascript" src="assets/dist/jquery.min.js"></script>
		<script type="text/javascript" src="assets/dist/jquery.jqplot.min.js"></script>
		<script type="text/javascript" src="assets/dist/plugins/jqplot.meterGaugeRenderer.min.js"></script>
		<link rel="stylesheet" type="text/css" href="assets/dist/jquery.jqplot.min.css" />
		 <script src="assets/scripts/RGraph.common.core.js" ></script>
		<script src="assets/scripts/RGraph.gauge.js" ></script>
        <script src="assets/scripts/sup_monitor.js"></script>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">
                    <img src="assets/img/logo.gif" alt="" />
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- navbar-top-links -->
            <!-- end navbar-top-links -->
			<ul class="nav navbar-top-links navbar-right">
				
                    <button class="reset_button">Reset</button>
                   
               
			</ul>
			<ul class="nav navbar-top-links navbar-right"><label></label></ul>
			<ul class="nav navbar-top-links navbar-right">
				
                   
					<button class="reset_button" onclick="window.location.href='logout.php'">Logout</button>
					
           
			</ul>
			<div id="reports">
			<ul class="nav navbar-top-links navbar-right">
				
                 <label class="report" ></label>
               
               
			</ul>
			
			<ul class="nav navbar-top-links navbar-right">
				<label class="report" id="lbl_target">Target: </label>
				               
			</ul>
			<ul class="nav navbar-top-links navbar-right">
				
                    <label class="report" id="lbl_actual">Actual:</label>
                   
               
			</ul>
			<ul class="nav navbar-top-links navbar-right">
				
                    <label class="report" id="lbl_balance">Balance:</font></label>
                   
               
			</ul>
			
			</div>

        </nav>
        <!-- end navbar top -->

        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
            
				
				<div >
                        
                        <div >
                            <div class="row">
                                <div class="col-lg-12">
									<span>
									
									 <form id="config" action="supervisor_config_db.php" method="post" >
                                          <fieldset>
                                             <font color='green'>
												 <?php if(isset($_GET['msg']))
												  echo $_GET['msg'];
												  ?>
												</font>
											 
											<label >Location:</label>
											<font color='red'>
											 <?php if(isset($_GET['location_error']))
											  echo $_GET['location_error'];
											  ?>
											</font>
                                            <input type="text" id="location" name="location" >
											
											
                                            <label for="device_id">Machine id:</label>
											<font color='red'>
											 <?php if(isset($_GET['macid_err']))
											  echo $_GET['macid_err'];
											  ?>
											</font>
                                            <input type="number" id="mac_id" name="mac_id">
											
											<label for="dev_loc">Machine name:</label>
											<font color='red'>
											 <?php if(isset($_GET['machine_name_error']))
											  echo $_GET['machine_name_error'];
											  ?>
											</font>
                                            <input type="text" id="mac_name" name="mac_name">
                                            
                                            <label for="dev_loc">Operator:</label>
											<font color='red'>
											 <?php if(isset($_GET['operator_name_error']))
											  echo $_GET['operator_name_error'];
											  ?>
											</font>
                                            <input type="text" id="opt_name" name="opt_name">
											
                                          	<label for="volume">Target</label>
											<font color='red'>
											 <?php if(isset($_GET['target_error']))
											  echo $_GET['target_error'];
											  ?>
											</font>
										    <input type="number" id="target" name="target">
											
											<label for="volume">Actual</label>
											<font color='red'>
											 <?php if(isset($_GET['actual_error']))
											  echo $_GET['actual_error'];
											  ?>
											</font>
										    <input type="number" id="actual" name="actual"></br>
                                          	</br>
											<label for="volume">Performance</label><br>
										        <input type="radio" id="hour"  name="performance" value="hour" checked><label for="hour" class="light">Hour</label>
                                                <input type="radio" id="day"  name="performance" value="day"><label for="day" class="light">Day</label><br>
											</br>	
                                            <label for="total_hours">Target Hours/Days</label>
											<font color='red'>
											 <?php if(isset($_GET['total_h_d_error']))
											  echo $_GET['total_h_d_error'];
											  ?>
											</font>
										    <input type="number" id="total_h_d" name="total_h_d">
											
									
											
											<label for="report_to">Report to</label>
											<font color='red'>
											 <?php if(isset($_GET['report_to_error']))
											  echo $_GET['report_to_error'];
											  ?>
											</font>
										    <input type="text" id="report_to" name="report_to">
											
											<label for="cycle">Cycle</label>
										    <input type="checkbox" id="cycle" name="cycle">
											
											<label for="rejection">Rejection</label>
										    <input type="checkbox" id="rejection" name="rejection">
											
											
                                          	
											
                                        <fieldset>
                                        <button type="submit">Submit</button>
										
                                      </form>
                                      
                                      </div>
                            </div>
                        </div>
                    </div>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->
        <!--  page-wrapper -->
        <div id="page-wrapper">

          
            <div class="row" >
			<font color = "white">
                 <!--  page header -->
                <div class="col-lg-12">
                    <h1 "><font color = "white">Monitor</font></h1>
					
				
           
				
				</font>
				<?php
				 include("config_db.php");
				 $query = "SELECT * FROM monitor";
                        $exec = mysqli_query($db,$query);
						$num_rows = mysqli_num_rows($exec);
						
						for($i = 0 ; $i< $num_rows; $i++)
						{
							
							$j = 0;
							echo "<div class='row' > ";
								while($j < 4)
								{
									if($row = mysqli_fetch_array($exec))
									{
										$location = $row['machine_location'];
										$mac_id = $row['machine_id'];
										$machine_name = $row['machine_name'];	
										$opt_name = $row['machine_operator'];
										$target = $row['machine_target'];
										$actual = $row['machine_actual'];
										
										
										$total_h_d = $row['machine_target_hour'];
										$report_to = $row['report_to'];
										$cycle = $row['machine_cycle'];
										$rejection = $row['machine_rejection_set'];
										
										
										
										echo "<div class='col-sm-3'>     <canvas id=".$mac_id ." width='250' height='250' >[No canvas support]</canvas></div>";
    
										echo "<script type='text/javascript'>
											var mac_name = '$machine_name';
											var target = '$target';
											var mac_id = '$mac_id';
											var loc = '$location';
											var opt_name = '$opt_name';
											var actual = '$actual';
											var total_h_d = '$total_h_d';
											var report = '$report_to';
											var cycle = '$cycle';
											var rejection = '$rejection';
											drawMachine(mac_id,mac_name,target,loc,opt_name,actual,total_h_d,report,cycle,rejection);//(dev_name,target,dev_id);
											</script>";
										$j++;
									}
									else{
										$i = $num_rows;
										break;
									}
								}
							
								echo "</div>";
							
						}
						
                        
				 
				?>
						
				<!-- end  page header -->
            </div>
            
            
        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
    <script src="assets/scripts/siminta.js"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>

</body>

</html>
