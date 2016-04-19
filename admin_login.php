<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meiconn - Settings</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />
	<link href="assets/css/settings.css" rel="stylesheet" />

<script>
function User_info()
{
if ( (document.forms[1].radio1[1].checked == true ) )  
    {  
		document.getElementById("select_user").style.visibility="visible";
	}
	else{
		document.getElementById("select_user").style.visibility="invisible";
	}
}
</script>
</head>

<body>
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
            
        </nav>
        <!-- end navbar top -->

        <!-- end navbar side -->
        <!--  page-wrapper -->
          <div id="page-wrapper1">
            <div class="row">
                 <!-- page header -->
                <div class="col-lg-12">
                    <h1 class="page-header"><font color = "white">Admin panel</font></h1>
					<span>
                    <font color='green'>
                     <?php if(isset($_GET['msg']))
                      echo $_GET['msg'];
                      ?>
                    </font>
                </div>
                 <div class="col-lg-12">
                    <!-- Form Elements -->

								
                                <div class="col-lg-6">
									 <form action="admin_config_db.php" method="post">
                                          <fieldset>
                                            <legend><font color='white'>Company info</font></legend>
											<span>
												<font color='Red'>
												 <?php if(isset($_GET['devid_error']))
												  echo $_GET['devid_error'];
												  ?>
												</font>
									
											<label for="company_name">Company name:</label>
                                            <input type="text" id="cmp_name" name="cmp_name">
                                            
                                            <label for="company_logo">Company logo:</label>
                                            <input type="text" id="cmp_logo" name="cmp_logo">

											<label for="admin name">Change admin login id:</label>
                                            <input type="text" id="user_name" name="user_name">
                                  		  
											<label for="admin pass">Change admin login password:</label>
                                            <input type="text" id="admin_pass" name="admin_pass">
											
											<label for="admin email">Email ID:</label>
                                            <input type="email" id="admin_email" name="admin_email">
												
                                  		  </br>
										  </br>
                                        <button type="submit">Submit</button>
										
                                      </form>
                                      
                                      </div>
									  
									  
									  <div class="col-lg-6">
									 <form name="user_info" action="admin_user_config_db.php" method="post">
                                          <fieldset>
                                            <legend><font color='white'>User info</font></legend>
											<span>
												<font color='Red'>
												 <?php if(isset($_GET['devid_error']))
												  echo $_GET['devid_error'];
												  ?>
												</font>
												
													
																							
											<input type="radio"   name="user_type" value="new" checked="checked" onclick = "User_info()"><label for="new" class="light">New</label>
                                            <input type="radio"   name="user_type" value="existing" onclick = "User_info()"><label for="existing" class="light">Existing</label>
											
											<label for="company_name">Company name:</label>
                                            <input type="text" id="cmp_name" name="cmp_name">
                                            	
											<div id="select_user">
											<label for="select_user">Select user:</label>
                                            <select for="select_user" name="select_user">
												  <option value="supervisor">Supervisor</option>
												  <option value="user">User</option>
											</select></div>
											
											<label for="select_user_type">User type:</label>
                                            <select for="select_user_type" name="select_user_type">
												  <option value="supervisor">Supervisor</option>
												  <option value="user">User</option>
											</select>
																							
                                            <label for="user_name">Login name:</label>
                                            <input type="text" id="user_login_name" name="user_login_name">
                                            
                                            											
                                  		  <label for="user_login_pass">Login password:</label>
                                            <input type="text" id="user_login_pass" name="user_login_pass">
                                  		  
                                  		  <label for="user email">Email ID:</label>
                                            <input type="email" id="user_email" name="user_email">
											
											
                                  		  
                                        <button type="submit">Submit</button>
										
                                      </form>
                                      
                                      </div>
                            </div>
                   
                     <!-- End Form Elements -->
                </div>
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

</body>

</html>
