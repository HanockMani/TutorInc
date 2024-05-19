<?php
$con = new mysqli('localhost', 'root', '', 'main_db');

if($con->connect_errno > 0){
    die('Unable to connect to database [' . $con->connect_error . ']');
}
ob_start();
session_start();
if (!isset($_SESSION['user_login'])) {
	$user = "";
}
else {
	header("location: index.php");
}

$u_fname = "";
$u_email = "";
$u_mobile = "";
$u_pass = "";
if (isset($_POST['signup'])) {
//declere veriable
$u_fname = $_POST['first_name'];
$u_email = $_POST['email'];
$u_mobile = $_POST['mobile'];
$u_pass = $_POST['password'];
$u_ac = $_POST['account'];
$u_gender = $_POST['gender'];
//triming name
$_POST['first_name'] = trim($_POST['first_name']);
	try {
		if(empty($_POST['first_name'])) {
			throw new Exception('Fullname can not be empty');
			
		}
		if (is_numeric($_POST['first_name'][0])) {
			throw new Exception('Please write your correct name!');
		}
		if(empty($_POST['email'])) {
			throw new Exception('Email can not be empty');
			
		}
		if(empty($_POST['mobile'])) {
			throw new Exception('Mobile can not be empty');
			
		}
		if(empty($_POST['password'])) {
			throw new Exception('Password can not be empty');
			
		}
		
		// Check if email already exists
		
		$check = 0;
		$e_check = $con->query("SELECT email FROM `user` WHERE email='$u_email'");
		$email_check = mysqli_num_rows($e_check);
		if (strlen($_POST['first_name']) >2 && strlen($_POST['first_name']) <16 ) {
			if ($check == 0 ) {
				if ($email_check == 0) {
					if (strlen($_POST['password']) >1 ) {
						$d = date("Y-m-d"); //Year - Month - Day
						$u_fname = ucwords($_POST['first_name']);
						$u_email = mb_convert_case($u_email, MB_CASE_LOWER, "UTF-8");
						$u_pass = md5($_POST['password']);
						$confirmCode   = mt_rand(100000, 999999);
						// send email
						$msg = "
						Assalamu Alaikum...
						
						Your activation code: ".$confirmCode."
						Signup email: ".$_POST['email']."
						
						";
						//if (@mail($_POST['email'],"eBuyBD Activation Code",$msg, "From:eBuyBD <no-reply@tutorbd.xyz>")) {
								
						//}else {

						//throw new Exception('Email is not valid!');
						//success message

						$sql = "INSERT INTO `user` (`fullname`,`gender`,`email`,`phone`,`pass`,`type`,`confirmcode`) VALUES ('".$u_fname."','".$u_gender."','".$u_email."','".$u_mobile."','".$u_pass."','".$u_ac."','".$confirmCode."')";

						if($con->query($sql)){
							//success message
						$success_message = '
						<div class="signupform_content"><h2><font face="bookman">Registration successfull!</font></h2>
						<div class="signupform_text" style="font-size: 18px; text-align: center;">
						<font face="bookman">
							Email: '.$u_email.'<br>
							Activation code sent to your email. <br>
							Your activation code: '.$confirmCode.'
						</font></div></div>';
						}else{
							echo "Error: " . $sql . "<br>" . $con->error;
						}

						//}
						
						
					}else {
						throw new Exception('Make strong password!');
					}
				}else {
					throw new Exception('Email already taken!');
				}
			}else {
				throw new Exception('Username already taken!');
			}
		}else {
			throw new Exception('Firstname must be 2-15 characters!');
		}
	}
	catch(Exception $e) {
		$error_message = $e->getMessage();
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	
	
    <title>Admin Panel</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../image/logo3.png">
    <link rel="stylesheet" type="text/css" href="css1/style.css">
	<link href="css1/footer.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css1/reg.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" type="text/css" href="css1/homemenu.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
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
				    
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Add Professor</h4>
                        </div>
                    </div>
					<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Professors</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Add Professor</a></li>
                        </ol>
                    </div>
                </div>
				
				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-sm-12">
                        <div class="card">
                            
      
		</div>
	</div>
	<div class="nbody" style="margin: 0px 100px; overflow: hidden;">
		<div class="nfeedleft" style="background-color: unset;">
			<div>
		<div class="testbox">


			<?php
				echo '<div class="signup_error_msg">';
					
						if (isset($error_message)) {echo $error_message;}
						
					
				echo'</div>';
				if(isset($success_message)) {echo $success_message;}
				else echo'
		  			<h1>Basic Info</h1>
					<form action="" method="post">
				      <hr>
				    <div class="accounttype">
				      <input type="radio" value="teacher" id="radioOne" name="account" checked/>
				      <label for="radioOne" class="radio" chec>As a Teacher</label>
				    </div>
				  <hr>
				  
				  <input type="text" name="first_name" id="name" placeholder="Full Name" value="'.$u_fname.'" required/>
				  
				  <input type="text" name="email" id="name" placeholder="Email" value="'.$u_email.'"  required/>
				  <label id="icon" for="name"><i class="icon-envelope "></i></label>
				  <input type="text" name="mobile" id="name" placeholder="Phone" value="'.$u_mobile.'" required/>
				  <label id="icon" for="name"><i class="icon-user"></i></label>
				  <input type="password" name="password" id="name" placeholder="Password" required/>
				  <label id="icon" for="name"><i class="icon-shield"></i></label>
				  <input type="password" name="cpassword" id="name" placeholder="Confirm Password" required/>
				  <div class="gender">
				    <input type="radio" value="male" id="male" name="gender" checked/>
				    <label for="male" class="radio" chec>Male</label>
				    <input type="radio" value="female" id="female" name="gender" />
				    <label for="female" class="radio">Female</label>
				   </div> 
				   <p>By clicking Register, you agree on our <a href="#">terms and condition</a>.</p>
				   <input type="submit" name="signup" class="sub_button" id="submit" value="Registration" required/>
				  </form>'
			?>

		  
		</div>
	</div>
		</div>
		<div class="nfeedright">
			
		</div>
	</div><br><br>

				</div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

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