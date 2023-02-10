<?php
session_start();
include_once("expp.php");
if (isset($_SESSION["username"])) {

}
else {
  header("location:index.php");
}
 ?>
<?php
  include_once("database.php");
  include_once("jdf.php");
 ?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="author" content="Kodinger">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>My Login Page &mdash; Bootstrap 4 Login Page Snippet</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/my-login.css">
        <link href="fileuploads/css/dropify.css" rel="stylesheet" type="text/css" />
        <script src="fileuploads/js/dropify.min.js"></script>
        <script src="js/jquery-3.3.1.slim.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/my-login.js"></script>
        <!--===============================================================================================-->
        <link rel="icon" href="image/doctor assistant logo.png" />
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">

        <script src="js/jquery.min.js"></script>

        <!-- file uploads js -->
        <script src="fileuploads/js/dropify.min.js"></script>
        <!-- form Uploads -->
        <link href="fileuploads/css/dropify.css" rel="stylesheet" type="text/css" />

        <!--===============================================================================================-->
        <?php 
	
		if(isset($_GET["username"]) && isset($_GET["password"])){
			$username = $_GET["username"];
			$password = $_GET["password"];
			if(isset($_POST["btn_submit"])){
				$prev_pass = base64_encode($_POST["prev_pass"]);
				$new_pass = base64_encode($_POST["new_pass"]);
					$confirm_pass = base64_encode($_POST["confirm_pass"]);
					if( $new_pass == $confirm_pass){
						if($password == $prev_pass){
							
							$sql_query = mysqli_query($connection,"update users set password='$new_pass' where username='$username' and password='$password'");
							if($sql_query)
							echo "<script>alert('password Changed Successfully ');</script>";
						}
						else{
							echo "<script>alert('password does not match !');</script>";
						}
					}
					else{
						echo "<script>alert('password does not match !');</script>";
					}
				
			}
		}
	?>
    </head>

    <body class="my-login-page">
        <section class="h-100">
            <div class="container h-100">

                <div class="card-wrapper" style="width:70%; margin-left:15%;margin-top:10%;">
                    <div class="card fat">
                        <div class="card-body">
                            <button class="btn btn-primary" onclick="window.open('profile.php','_self');">Back</button>
                            <h2 class="card-title" style="text-align:center;">Change Password</h2>
                            <hr>
                            <form method="POST" class="my-login-validation" enctype="multipart/form-data" novalidate="">
                                <div class="form-group" style="width:49%; float:left;">
                                    <label for="name">Previous Password</label>
                                    <input type="password" class="form-control" name="prev_pass" id="prev_pass" required
                                        autofocus>

                                </div>
                                <div class="form-group" style="width:48%; float:left; margin-left:1%;">
                                    <label for="lastname">New Password</label>
                                    <input name="new_pass" id="new_pass" type="password" class="form-control" required>

                                </div>
                                <div class="form-group " style="width:49%; float:left;">
                                    <label for="username">Confim Password</label>
                                    <input name="confirm_pass" id="confirm_pass" type="password" class="form-control"
                                        required>

                                </div>

                                <div id="state" style="width:49%; float:left;" class="">
                                </div>

                                <div class="form-group m-0">
                                    <button type="submit" name="btn_submit" id="loading"
                                        class="btn btn-primary btn-block">
                                        Submit
                                    </button>

                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <script>
        $('.dropify').dropify({
            messages: {
                'default': 'choose your profile',
                'replace': 'choose different image',
                'remove': 'Remove',
                'error': 'Ooops, something wrong appended.'
            },
            error: {
                'fileSize': 'The file size is too big (2M max).'
            }
        });
        </script>


    </body>

</html>