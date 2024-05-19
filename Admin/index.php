
<!DOCTYPE html>
<html lang="en">

<head>
	
	
    <title>Admin Panel</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../image/logo3.png">
	<link rel="stylesheet" href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/skin.css">
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="../index.php" class="brand-logo">
                <img class="brand-title" src="../image/logo3.png" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    
                                </span>
                                
                            </div>
                        </div>

                       
                                   
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="dlabnav">
            <div class="dlabnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <li><a class="ai-icon" href="index.php" aria-expanded="false">
							<i class="la la-calendar"></i>
							<span class="nav-text">Dashboard</span>
						</a>
                    </li>
					
					<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
							<i class="la la-user"></i>
							<span class="nav-text">Teacher</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="all-professors.php">All Teachers</a></li>
                            <li><a href="add-professor.php">Add Teachers</a></li>
                            
                            
                        </ul>
                    </li>
					<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
							<i class="la la-users"></i>
							<span class="nav-text">Students</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="all-students.php">All Students</a></li>
                            <li><a href="add-student.php">Add Students</a></li>
                            
                            
                        </ul>
                    </li>
					
				</ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
				    
                <div class="row">
					<div class="col-xl-6 col-xxl-6 col-sm-12">
						<div class="row">
							<div class="col-xl-6 col-xxl-6 col-sm-6">
                            <?php
                                $con = new mysqli('localhost', 'root', '', 'main_db');

                                 if($con->connect_errno > 0){
                                 die('Unable to connect to database [' . $con->connect_error . ']');
                                 }
                                   $query1 = mysqli_query($con,  "SELECT * FROM main_db.user WHERE type='student'");
                                   $c=0;
                                       while($s=mysqli_fetch_array($query1)) 
                                      {$c=$c+1;
                                      }
                                      $query1 = mysqli_query($con,  "SELECT * FROM main_db.user WHERE type='teacher'");
                                   $c1=0;
                                       while($s=mysqli_fetch_array($query1)) 
                                      {$c1=$c1+1;
                                      }
                                      ?>
								<div class="widget-stat card">
									<div class="card-body">
										<h4 class="card-title">Total Students</h4>
										<h3><?php echo $c ?></h3>
										<div class="progress mb-2">
											<div class="progress-bar progress-animated bg-primary" style="width: 80%"></div>
										</div>
										<small>80% Increase in 20 Days</small>
									</div>
								</div>
							</div>
							<div class="col-xl-6 col-xxl-6 col-sm-6">
								<div class="widget-stat card">
									<div class="card-body">
										<h4 class="card-title">Total Teachers</h4>
										<h3><?php echo $c1 ?></h3>
										<div class="progress mb-2">
											<div class="progress-bar progress-animated bg-warning" style="width: 50%"></div>
										</div>
										<small>50% Increase in 25 Days</small>
									</div>
								</div>
							</div>
							<div class="col-xl-6 col-xxl-6 col-sm-6">
								<div class="widget-stat card">
									
								</div>
							</div>
							
						</div>
                    </div>					
					<div class="col-xl-12 col-lg-12 col-xxl-12 col-md-12">
						<div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Student List</h4>
                            </div>
                            <div class="card-body">
							    <div class="table-responsive recentOrderTable">
                                    <table class="table verticle-middle table-responsive-md">
                                        
                                        <thead>
                                            
                                            <tr>
                                                <th scope="col">
                                                    <div class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" id="checkAll">
														<label class="custom-control-label" for="checkAll"></label>
													</div>
                                                </th>
                                                <th scope="col">Student Name</th>
                                                <th scope="col">Gender</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">Last logout</th>
                                               
                                            </tr>
                                        </thead>


                                <?php


                                  $con = new mysqli('localhost', 'root', '', 'main_db');

                                 if($con->connect_errno > 0){
                                  die('Unable to connect to database [' . $con->connect_error . ']');
                                 }
                                 $query1 = mysqli_query($con,  "SELECT * FROM main_db.user WHERE type='student'");


                                while($s=mysqli_fetch_array($query1))



                                      
                                 {
                                        
                                           ?>
                                    
                                        <tbody>
                                            
                                       
                                            
					
												</thead>
												<tbody>
													<tr>
														<td class="rounded-circle" width="35" alt=""></td>
														<td><?php echo $s['fullname'] ?></td>
														<td><?php echo $s['gender'] ?></td>
														<td><?php echo $s['email'] ?></td>
														<td><?php echo $s['phone'] ?></td>
														<td><?php echo $s['address'] ?></td>
                                                        <td><?php echo $s['last_logout'] ?></td>
													</tr>
													
												</tbody>

                                <?php
}
?>
											</table>
										</div>
									</div>
									



                                    
								
						
						
					
				</div>
            </div>
        </div><div class="col-xl-12 col-lg-12 col-xxl-12 col-md-12">
						<div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Teacher List</h4>
                            </div>
                            <div class="card-body">
							    <div class="table-responsive recentOrderTable">
                                    <table class="table verticle-middle table-responsive-md">
                                        
                                        <thead>
                                            
                                            <tr>
                                                <th scope="col">
                                                    <div class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" id="checkAll">
														<label class="custom-control-label" for="checkAll"></label>
													</div>
                                                </th>
                                                <th scope="col">Teacher Name</th>
                                                <th scope="col">Gender</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">Last Logout</th>
                                               
                                            </tr>
                                        </thead>


                                     <?php


                                       $con = new mysqli('localhost', 'root', '', 'main_db');

                                      if($con->connect_errno > 0){
                                      die('Unable to connect to database [' . $con->connect_error . ']');
                                      }
                                      $query1 = mysqli_query($con,  "SELECT * FROM main_db.user WHERE type='teacher'");
                                       while($s=mysqli_fetch_array($query1))
                                       {
                                        
?>
                                    
                                        <tbody>
												</thead>
												<tbody>
													<tr>
														<td class="rounded-circle" width="35" alt=""></td>
														<td><?php echo $s['fullname'] ?></td>
														<td><?php echo $s['gender'] ?></td>
														<td><?php echo $s['email'] ?></td>
														<td><?php echo $s['phone'] ?></td>
														<td><?php echo $s['address'] ?></td>
                                                        <td><?php echo $s['last_logout'] ?></td>
													</tr>
													
												</tbody>

                                <?php
}
?>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>













        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="js/custom.min.js"></script>
		
    <!-- Chart Morris plugin files -->
    <script src="vendor/raphael/raphael.min.js"></script>
    <script src="vendor/morris/morris.min.js"></script>
		
	
	<!-- Chart piety plugin files -->
    <script src="vendor/peity/jquery.peity.min.js"></script>
	
		<!-- Demo scripts -->
    <script src="js/dashboard/dashboard-2.js"></script>
	
	<!-- Svganimation scripts -->
    <script src="vendor/svganimation/vivus.min.js"></script>
    <script src="vendor/svganimation/svg.animation.js"></script>
    <script src="js/styleSwitcher.js"></script>

		
	
</body>
</html>