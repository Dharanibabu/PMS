<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
   <link href="assets/css/style.css" rel="stylesheet" />
      <link href="assets/css/main-style.css" rel="stylesheet" />

</head>

<body class="body-Login-back">

    <div class="container">
       
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center logo-margin ">
              <img src="assets/img/logo.gif" alt=""/>
                </div>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">                  
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign As</h3>
                    </div>
                    <div class="panel-body">
                        <form action="login_db.php" method="post">
                            <fieldset>
							 
								<div >
                                    
                                         <input type="radio" id="admin"  name="user_level" value="admin"><label for="hour" class="light">Admin</label>
                                            <input type="radio" id="sup"  name="user_level" value="supervisor"><label for="day" class="light">Supervisor</label>
                                            <input type="radio" id="user"  name="user_level" value="monitor"><label for="week" class="light">User</label>
                                            
                                    
                                </div> 
								<font color='red'>
										<?php if(isset($_GET['error']))
										  echo $_GET['error'];
										  ?>
										</font>
                                <div class="form-group">
									
                                    <input  class = "form-control" placeholder="Username" id="username" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
									
                                    <input class = "form-control" placeholder="Password" id="password" name="password" type="password" value="">
                                </div>
                               
								 <!-- Change this to a button or input when using this as a form -->
                                <button class="btn btn-lg btn-success btn-block" type="submit">Submit</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>

</body>

</html>
