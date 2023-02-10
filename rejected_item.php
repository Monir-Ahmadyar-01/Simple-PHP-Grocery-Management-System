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



        <!-- file uploads js -->
        <script src="fileuploads/js/dropify.min.js"></script>
        <!-- form Uploads -->
        <link href="fileuploads/css/dropify.css" rel="stylesheet" type="text/css" />

        <!--===============================================================================================-->

    </head>
    <script>
    </script>

    <body class="my-login-page">
        <section class="h-100" style=" padding:0px !important;">
            <div class="container-fluid h-100" style=" width:100%;">
                <div class="card-wrapper" style="width:100%;margin-top:1%; ">
                    <div class="card fat" style="">
                        <div class="card-body">
                            <h2 class="card-title" style="text-align:center;">Add New Item</h2>
                            <hr>
                            <form method="POST" id="uploadForm" class="my-login-validation"
                                enctype="multipart/form-data" novalidate="">
                                <table class="table table-bordered">

                                    <tr>
                                        <th>Barcode</th>
                                        <th>Name</th>
                                        <th>Mount</th>
                                        <th>Buy Price</th>
                                    </tr>
                                    <?php
                                        $fetch_05;
                                        $get_barcode;
										if(isset($_GET["barcode"])){
											$get_barcode = $_GET["barcode"];
											$sql_query_05 = mysqli_query($connection,"select * from item_store where barcode='$get_barcode'");
											$fetch_05 = mysqli_fetch_assoc($sql_query_05);
										}
										if(isset($_POST["btn_submit"])){
											$barcode = $_POST["barcode"];
											$name = $_POST["item_name"];
											$mount = $_POST["mount"];
											$buy_price = $_POST["buy_price"];
											
											$date_sh = jdate("d/m/Y","","","Asia/kabul","en");
											$sql_query_04  = mysqli_query($connection , "INSERT INTO `plus_item` (`id`, `barcode`, `name`,`mount`, `buy_price`, `sell_price`,`date`)
                                             VALUES (NULL, '$barcode', '$name', '$mount', '$buy_price', '','$date_sh')");
											 if ($sql_query_04) {
                                                    $sql_query_06 = mysqli_query($connection,"select mount from item_store where barcode='$get_barcode'");
                                                    $fetch_06 = mysqli_fetch_assoc($sql_query_06);
                                                    $db_amount = $fetch_06["mount"];
                                                    $add_mount = $mount;
                                                    $up_mount = $db_amount+$add_mount;
                                                    $sql_query_07 = mysqli_query($connection,"update item_store set mount='$up_mount' where barcode='$get_barcode'");
											 		if($sql_query_07){
                                                         
                                                         echo "<script>window.open('manage_item.php','_self');</script>";
                                                     }
											 }
										}

									?>

                                    <tr>

                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="barcode" readonly
                                                    value="<?php echo $fetch_05["barcode"];?>" id="barcode" required
                                                    autofocus>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="item_name" readonly
                                                    value="<?php echo $fetch_05["name"];?>" id="item_name" required
                                                    autofocus>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="mount" id="lastname"
                                                    required autofocus>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input name="buy_price" type="number" id="buy_price"
                                                    class="form-control" required>
                                            </div>
                                        </td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="10">
                                            <div class="form-group m-0">
                                                <button type="submit" name="btn_submit"
                                                    class="btn btn-primary btn-block">
                                                    Submit
                                                </button>

                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <div id="state" style="width:49%; float:left;" class="">
                                        </div>
                                    </tr>
                                </table>
                                <br>
                                <br>
                                <br>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </body>

</html>