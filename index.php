 <?php
		include_once("database.php");
		session_start();
		// ob_start();
		// system('ipconfig/all');
		// $mycam = ob_get_contents();
		// ob_clean();
		// $findme = "Physical";
		// $pmac = strpos($mycam,$findme);
		// $mac = substr($mycam,($pmac+36),17);
		// $check = false;
		// $sql_command = mysqli_query($connection,"select * from licence");
		// while($row = mysqli_fetch_assoc($sql_command)){
		// 	if($mac == $row["mac"]){
		// 		$check = true;
		// 	}
		// }
		// if($check == true){
		// }else{
		// 	header("location:licence.php");
		// }

?>

 <!DOCTYPE html>
 <html lang="en">

     <head>
         <title>Sony Store ( login )</title>
         <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <!--===============================================================================================-->
         <link rel="icon" href="image/icons/warehouse.png" />
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
         <!--===============================================================================================-->


         <?php

					if (isset($_POST["login_btn"])) {
						$_SESSION["username"] = $username = $_POST["username"];
						$_SESSION["password"]	= $password = $_POST["password"];

						$sql_command1 = mysqli_query($connection , "select username , password  from users");
						$check = false;
						while ($row = mysqli_fetch_assoc($sql_command1)) {
								if ($username == $row["username"] && $password == base64_decode($row["password"])) {
											$check = true;

								}

						}
						if($check == true){

							echo "<script>window.open('home.php','_self');</script>";
						}
					}


				 ?>



         <meta charset="utf-8">
         <meta name="author" content="Kodinger">
         <meta name="viewport" content="width=device-width,initial-scale=1">

         <link rel="stylesheet" href="css/bootstrap.min.css">
         <link rel="stylesheet" type="text/css" href="css/my-login.css">
     </head>

     <body class="my-login-page">
         <section class="h-100">
             <div class="container h-100">
                 <div class="row justify-content-md-center h-100">
                     <div class="card-wrapper">
                         <br></br>
                         <div class="brand">
                             <img src="image/icons/warehouse.png" alt="logo">
                         </div>

                         <div class="card fat">
                             <div class="card-body">
                                 <h4 class="card-title"
                                     style="text-align:center; font-family:bahij yekan; font-size:31px; color:RGB(40,96,144);">
                                     Sony Store</h4>
                                 <form method="POST" class="my-login-validation" novalidate="">
                                     <div class="form-group">
                                         <label for="email">Username</label>
                                         <input id="email" type="text" class="form-control" name="username" value=""
                                             required autofocus>

                                     </div>

                                     <div class="form-group">
                                         <label for="password">Password

                                         </label>
                                         <input id="password" type="password" class="form-control" name="password"
                                             required data-eye>

                                     </div>



                                     <div class="form-group m-0">
                                         <button type="submit" name="login_btn" class="btn btn-primary btn-block">
                                             Login
                                         </button>
                                     </div>

                                 </form>
                             </div>
                         </div>
                         <div class="footer">
                             Copyright &copy; <span id="copy"></span>
                             <script>
                             var d = new Date();
                             document.getElementById("copy").innerHTML = d.getFullYear();
                             </script> &mdash; <a href="https://www.asrepoya.com" target="_blank"
                                 style="text-decoration:none;"> AsrePoya </a>
                         </div>
                     </div>
                 </div>
             </div>
         </section>

         <script src="js/jquery-3.3.1.slim.min.js"></script>
         <script src="js/popper.min.js"></script>
         <script src="js/bootstrap.min.js"></script>
         <script src="js/my-login.js"></script>
     </body>

 </html>