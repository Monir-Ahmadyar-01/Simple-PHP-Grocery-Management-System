<?php
session_start();

 ?>
<?php
  include_once("database.php");
  include_once("jdf.php");
 ?>
<html>

    <head>
        <title>Login page</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link type="text/css" rel="stylesheet" href="css/bootstrap.css">
        <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <script type="text/javascript" src="js/datepicker.js">
        </script>
        <link rel="stylesheet" href="css/datepicker.css">
        <style>
        </style>
    </head>

    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-5" style="margin-left:28%; margin-top:15%;">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2 style="font-family:arial; text-align:center;">Welcome To Doctor Assistant</h2>
                        </div>
                    </div>
                    <?php 
                        if(isset($_POST["btn_licence"])){
                            ob_start();
                            system('ipconfig/all');
                            $mycam = ob_get_contents();
                            ob_clean();
                            $findme = "Physical"; 
                            $pmac = strpos($mycam,$findme);
                            $mac = substr($mycam,($pmac+36),17);
                            $licence = $_POST["licence"];
                            $sql_command = mysqli_query($connection , " select * from licence");
                            $check = false;
                            $db_licence=null;
                            while($row = mysqli_fetch_assoc($sql_command)){
                                if($licence == $row["licence"]){
                                    $db_licence = $row["licence"];
                                    $check = true;
                                }
                            }
                            if($check == true){
                                $sql_command2 = mysqli_query($connection,"update licence set licence='$licence',mac='$mac',status='used' where licence='$db_licence'");
                                if($sql_command2){
                                    echo "<script>alert('Congratulation Your licence Registerd Successfully ');</script>";
                                    header("location:index.php");
                                }
                            }
                            else{
                                    echo "<script>alert(' Licence Registeration Failed Your Licence is not Available ');</script>";
                            }
                        }
                    
                    ?>
                    <form action="" method="post">
                        <table class="table table-striped">
                            <tr>
                                <td><input type="text" class="form-control" placeholder="Enter Your licence Number"
                                        name="licence"></td>
                            </tr>
                            <tr>
                                <td><button type="submit" class="btn btn-primary" style="width:100%;"
                                        name="btn_licence">Get licence</button></td>
                            </tr>
                        </table>
                    </form>
                    <span style="color:green; font-family:arial;">if You dont Have licence Contact us And Get Your
                        licence : 0771 838 034 -- 0792212900 <br>Email : order@asrepoya.com</span>
                </div>
            </div>

        </div>
    </body>

</html>