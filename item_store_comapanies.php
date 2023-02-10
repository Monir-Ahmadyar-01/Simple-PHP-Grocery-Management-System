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
  include("jdf.php");
 ?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="author" content="Kodinger">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/persian-datepicker.css">
        <link rel="stylesheet" type="text/css" href="css/my-login.css">
        <link href="fileuploads/css/dropify.css" rel="stylesheet" type="text/css" />
        <script src="fileuploads/js/dropify.min.js"></script>
        <script src="js/jquery-3.3.1.slim.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/persian-datepicker.js"></script>
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
        <link type="text/css" href="css/persian-datepicker.css" rel="stylesheet" />
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/persian-datepicker.js"></script>

        <script type="text/javascript">
        $(function() {
            $('#datepicker0').datepicker({
                changeMonth: true,
                changeYear: true
            });
        });
        </script>

        <!-- file uploads js -->
        <script src="fileuploads/js/dropify.min.js"></script>
        <!-- form Uploads -->
        <link href="fileuploads/css/dropify.css" rel="stylesheet" type="text/css" />

        <!--===============================================================================================-->
        <style>
        td {
            text-align: center;
            vertical-align: middle;
        }

        .well-link {
            text-decoration: none;
        }

        .panel-shadow {
            box-shadow: 0 8px 10px 1px rgba(0, 0, 0, .14), 0 3px 14px 2px rgba(0, 0, 0, .12), 0 5px 5px -3px rgba(0, 0, 0, .2);
        }
        </style>
    </head>
    <script>
    </script>
    <script>
    function edit(id) {
        var idd = id;
        window.open("edit.php?id_s=" + idd, "_self");

    }

    function delet(id) {
        var confirm = window.confirm("Are You sure You want To delete");
        if (confirm == true) {
            window.open("delete.php?id_s=" + id, "_self");
        } else {

        }
    }
    </script>

    <body class="my-login-page">
        <section class="h-100" style=" padding:0px !important;">
            <div class="container-fluid h-100" style=" width:100%;">
                <div class="card-wrapper" style="width:100%;margin-top:1%; ">
                    <div class="card fat" style="">
                        <div class="card-body">

                            <button class="btn btn-primary"
                                onclick="window.open('barcode_test.php','_self');">Back</button>
                            <button class="btn btn-success" onclick="window.open('new_company.php','_self');">New
                                Company</button>
                            <?php 
                                $sql_query_03 = mysqli_query($connection,"select sum(received-buy_amount) as total_baqi from company_account");
                                $fetch_03 = mysqli_fetch_assoc($sql_query_03);
                            
                            ?>
                            <h2 class="card-title" style="text-align:center;">Item Store Company Names</h2>
                            <h2 class="card-title" style="text-align:center;">Total Rest : <span
                                    style="color:red;"><?php echo $fetch_03["total_baqi"] . " $ "; ?></span></h2>
                            <hr>
                            <?php 
                                $count = 1; 
                                $sql_query_01 = mysqli_query($connection,"select company_name from new_company");
                                while($fetch_01 = mysqli_fetch_assoc($sql_query_01)){
                            ?>
                            <div class="col-md-3">
                                <a href="company_account.php?company_name=<?php echo $fetch_01["company_name"]; ?>"
                                    class="well-link">
                                    <div class="panel panel-primary panel-shadow">
                                        <div class="panel-heading" style="text-align:center;">
                                            <?php echo $fetch_01["company_name"]; ?></div>
                                        <div class="panel-body">
                                            <?php 
                                                    $company_name =$fetch_01["company_name"];
                                                    $sql_query_02 = mysqli_query($connection,"select sum(received-buy_amount) as total_baqi from company_account where company_name='$company_name'");
                                                    $fetch_02 = mysqli_fetch_assoc($sql_query_02);
                                                     $baqi = $fetch_02["total_baqi"];
                                                    if($baqi >= 0){
                                                        echo "<style>
                                                            .bd{
                                                                background-color:red;
                                                                color:white;
                                                            }
                                                        </style>";
                                                    }
                                                    
                                                ?>
                                            <strong>Total Rest</strong> <span class="badge bd"
                                                style="font-size:15px;float:right;"><?php echo $fetch_02["total_baqi"];?>
                                                $</span>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <?php 
                                $count++;   
                            }
                            ?>
                        </div>
                    </div>

                </div>
            </div>
        </section>



    </body>

</html>