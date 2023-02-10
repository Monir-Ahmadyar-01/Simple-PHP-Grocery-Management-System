<?php
session_start();
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
      $username = $_SESSION["username"];
      $password = base64_encode($_SESSION["password"]);
        $sql2 = mysqli_query($connection,"select * from users where username='$username' and password='$password'");
        $authority = null;
        while($fetch = mysqli_fetch_assoc($sql2)){
    
          $authority = $fetch["authority"];
        }
        if($authority=="50%"){
            echo "<style>
              .authority{
                display:none;
              }
            </style>";
        }
      ?>
    </head>
    <?php
            // update user data
            if(isset($_POST["btn_submit"])){
            $sourcePath = $_FILES['file']['tmp_name'];
            $name = $_POST["namep"];
            $lastname = $_POST["lastnamep"];
            $username = $_POST["usernamep"];
            $id = $_POST["id"];
            $user_image=$_FILES['file']['name'];
            $targetPath = "image/".$_FILES['file']['name'];
            move_uploaded_file($sourcePath,$targetPath);
             $sql_command2 = mysqli_query($connection,"update users set name='$name',lastname='$lastname',username='$username',image='$user_image' where id='$id'");
           if($sql_command2){
                   
                   echo "<script>alert('profile updated successfully ');</script>";
               }
               else{
				echo "<script>alert('Failed to Update profile ! ');</script>";
               }
             
        }

        
            ?>

    <body class="my-login-page">
        <section class="h-100">
            <div class="container h-100">

                <div class="card-wrapper" style="width:70%; margin-left:15%;margin-top:10%;">
                    <div class="card fat">
                        <div class="card-body">
                            <button class="btn btn-success authority" onclick="window.open('register.php','_self');">Add
                                User</button>
                            <a
                                href="change_password.php?username=<?php echo $username?> & password=<?php echo $password;?>"><button
                                    type="button" class="btn  btn-primary mb-3 mb-md-0">change password</button></a>
                            <h2 class="card-title" style="text-align:center;">Complete Your profile</h2>
                            <hr>
                            <form method="POST" id="uploadForm" class="my-login-validation"
                                enctype="multipart/form-data" novalidate="">
                                <div class="form-group" style="width:49%; float:left;">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="namep" id="name" required autofocus>

                                </div>

                                <div class="form-group" style="width:49%; float:left; margin-left:1%;">
                                    <label for="lastname">Last Name</label>
                                    <input name="lastnamep" id="lastname" type="text" class="form-control" required>

                                </div>
                                <div class="form-group " style="width:49%; float:left;">
                                    <label for="username">Username</label>
                                    <input name="usernamep" value="<?php echo $_SESSION["username"];?>" id="username"
                                        type="text" class="form-control" required>

                                </div>
                                <?php 
                                                                $usern = $_SESSION["username"];
                                                                $pass = base64_encode($_SESSION["password"]);
                                                                $sql = mysqli_query($connection,"select * from users where username='$usern' and password='$pass'");
                                                                $fetch = mysqli_fetch_assoc($sql);
                                                            ?>
                                <input type="text" name="id" style="display:none;" value="<?php echo $fetch["id"];?>" />

                                <div class="row" style="float:right; width:50%;">
                                    <div class="col-sm-12">
                                        <div class="card shadow">

                                            <div class="card-body">
                                                <input type="file" id="file" name="file" class="dropify"
                                                    data-default-file="image/default_img.gif" data-height="100" />
                                            </div>
                                        </div>
                                    </div>
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