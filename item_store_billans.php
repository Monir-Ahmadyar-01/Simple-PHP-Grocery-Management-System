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
        <script src="js/jquery.min.js"></script>
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
        </style>
    </head>
    <script>
    </script>

    <body class="my-login-page">
        <section class="h-100" style=" padding:0px !important;">
            <div class="container-fluid h-100" style=" width:100%;">
                <div class="card-wrapper" style="width:100%;margin-top:1%; ">
                    <div class="card fat" style="">
                        <div class="card-body">
                            <button class="btn btn-primary"
                                onclick="window.open('item_store_daily_report.php','_self');">Daily Report</button>
                            <button class="btn btn-primary"
                                onclick="window.open('item_store_monthly_report.php','_self');">Monthly Report</button>
                            <button class="btn btn-success"
                                onclick="window.open('item_store_billans.php','_self');">Total Report</button>


                            <h2 class="card-title" style="text-align:center;">Total Pharmacy Report</h2>
                            <hr>
                            <form method="POST" id="uploadForm" class="my-login-validation"
                                enctype="multipart/form-data" novalidate="">
                                <table class="table table-bordered">
                                    <tr style="background-color:#144b6f;color:white;">
                                        <th colspan="2">Stored item</th>
                                        <th colspan="2">Repository</th>
                                        <th colspan="2">Expenses</th>
                                        <th colspan="2">Added Medicine</th>

                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <table class="table table-bordered ">
                                                <tr style="background-color:gray; color:white; ">
                                                    <th colspan="4" style="text-align:center;">Castomers</th>
                                                </tr>
                                                <tr>
                                                    <th>No</th>
                                                    <th colspan='3' style="text-align:center;">Castomer Name</th>
                                                    <!-- <th>mount</th>
                                                <th>sell_price</th> -->
                                                </tr>

                                                <?php 
                                                $today_date = jdate("d/m/Y","","","Asia/kabul","en");
                                                $sql_query = mysqli_query($connection,"select DISTINCT to_detail from stored_item");
                                                $count = 1;
                                                while($row = mysqli_fetch_assoc($sql_query)){
                                            ?>

                                                <tr style="background-color:#99ddff;">
                                                    <td><?php echo $count; ?></td>
                                                    <td colspan='3'><?php
                                                        $org_name = explode(",",$row["to_detail"]);
                                                        echo $org_name[0];?></td>
                                                </tr>

                                                <?php 
                                                        $to_detail = $row["to_detail"];
                                                        $sql_query_02 = mysqli_query($connection,"select *  from stored_item where to_detail='$to_detail'");
                                                        $count_02 = 1;
                                                        while($row = mysqli_fetch_assoc($sql_query_02)){
                                                    ?>
                                                <tr>
                                                    <td><?php echo $count_02; ?></td>
                                                    <td><?php echo $row["item_name"];?></td>
                                                    <td><?php echo $row["mount"];?></td>
                                                    <td><?php echo $row["sell_price"] . " $ ";?></td>
                                                </tr>
                                                <?php
                                                        $count_02++;    
                                                    }
                                                    ?>


                                                <?php 
                                            $count++;   
                                            }
                                            ?>

                                            </table>
                                        </td>
                                        <td colspan="2">
                                            <table class="table table-bordered ">
                                                <tr>
                                                    <th>Item Name</th>
                                                    <th>Mount</th>
                                                </tr>
                                                <?php 
                                                $sql_query2 = mysqli_query($connection,"select name,mount from item_store");
                                                while($row = mysqli_fetch_assoc($sql_query2)){
                                            ?>

                                                <tr>
                                                    <td><?php echo $row["name"];?></td>
                                                    <td><?php echo $row["mount"];?></td>
                                                </tr>
                                                <?php 
                                                }
                                            ?>
                                            </table>
                                        </td>
                                        <td colspan="2">
                                            <table class="table table-bordered " id="mytable">
                                                <tr>
                                                    <th>Code</th>
                                                    <th>Name</th>
                                                    <th>price</th>
                                                    <th>Op</th>
                                                </tr>
                                                <?php 
                                                    $sql_query3;
                                                    $sql_query3 = mysqli_query($connection,"select id,code,description,amount,price1,status from item_expenses");
                                                ?>
                                                <script>
                                                setInterval(function() {
                                                    $("#mytable").load(window.location.href + " #mytable");
                                                }, 1000);
                                                setInterval(function() {
                                                    $("#refresh_id_ex").load(window.location.href +
                                                        " #refresh_id_ex");
                                                }, 1000);
                                                setInterval(function() {
                                                    $("#billans").load(window.location.href + " #billans");
                                                }, 1000);
                                                </script>
                                                <?php 
                                                $count_03 = 1;
                                                while($row = mysqli_fetch_assoc($sql_query3)){
                                                ?>

                                                <tr id="<?php echo $count_03; ?>">
                                                    <td><?php echo $row["code"];?></td>
                                                    <td><?php echo $row["description"];?></td>
                                                    <td><?php echo $row["amount"]*$row["price1"] . " $ " ?></td>

                                                    <td>
                                                        <?php 
                                                        if(!($row["status"] == "true")){
                                                    ?>
                                                        <span class="glyphicon glyphicon-check text text-success"
                                                            onclick="$('#'+<?php echo $count_03; ?>).hide(); setstatus(<?php echo $row['id'];?>);"></span>
                                                        <span class="glyphicon glyphicon-trash text text-danger"
                                                            onclick="$('#'+<?php echo $count_03; ?>).hide(); setdelete(<?php echo $row['id'];?>);"></span>
                                                        <?php
                                                        }
                                                    ?>

                                                    </td>
                                                </tr>
                                                <?php 
                                                $count_03++;  
                                            }
                                            ?>
                                            </table>
                                        </td>
                                        <script>
                                        function setstatus(db_id) {
                                            var ajax;
                                            if (window.XMLHttpRequest) {
                                                ajax = new XMLHttpRequest();
                                            } else {
                                                ajax = new ActiveXObject("Microsoft.XMLHTTP");
                                            }
                                            ajax.open("GET", "server.php?checkid=" + db_id);
                                            ajax.send();
                                            ajax.onreadystatechange = function() {
                                                if (ajax.status == 200 && ajax.readyState == 4) {
                                                    var response2 = ajax.responseText.trim();
                                                }
                                            }
                                        }

                                        function setdelete(db_id) {
                                            var ajax;
                                            if (window.XMLHttpRequest) {
                                                ajax = new XMLHttpRequest();
                                            } else {
                                                ajax = new ActiveXObject("Microsoft.XMLHTTP");
                                            }
                                            ajax.open("GET", "server.php?delete_id=" + db_id);
                                            ajax.send();
                                            ajax.onreadystatechange = function() {
                                                if (ajax.status == 200 && ajax.readyState == 4) {
                                                    var response2 = ajax.responseText.trim();
                                                }
                                            }
                                        }
                                        </script>
                                        <td colspan="2">
                                            <table class="table table-bordered ">
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Mount</th>
                                                    <th>Buy Price</th>
                                                    <th>Total</th>
                                                </tr>
                                                <?php 
                                                $sql_query4 = mysqli_query($connection,"select name,mount,buy_price from plus_item");
                                                while($row = mysqli_fetch_assoc($sql_query4)){
                                            ?>

                                                <tr>
                                                    <td><?php echo $row["name"];?></td>
                                                    <td><?php echo $row["mount"];?></td>
                                                    <td><?php echo $row["buy_price"];?></td>
                                                    <td><?php echo $row["mount"]*$row["buy_price"] . " $ " ?></td>

                                                </tr>
                                                <?php 
                                                }
                                            ?>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="8" class="bg-primary" style="text-align:center;">Billance</th>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Total Stored item</th>
                                        <th colspan="2">Total Company Rest</th>
                                        <th colspan="2">Total Expenses</th>
                                        <!-- <th colspan="2">Total Added Medicine</th> -->
                                        <th colspan="2">Billance</th>
                                    </tr>
                                    <tr>
                                        <?php 
                                            // total Stored item
                                            $sql_query5 = mysqli_query($connection,"select sum(mount*sell_price) as total from stored_item");
                                            $fetch = mysqli_fetch_assoc($sql_query5);
                                            $total_stored_item = $fetch["total"];
                                        ?>
                                        <td colspan="2"><?php echo $total_stored_item . " $ "; ?></td>
                                        <?php 
                                            // total Company Payment 
                                            $sql_query6 = mysqli_query($connection,"select sum(received-buy_amount) as total_price from company_account");
                                            $fetch2 = mysqli_fetch_assoc($sql_query6);
                                            $total_price = $fetch2["total_price"];
                                        ?>
                                        <td colspan="2"><?php echo $total_price . " $ "; ?></td>
                                        <?php 
                                            // total expense 
                                            $sql_query7 = mysqli_query($connection,"select sum(price1*amount) as total_price from item_expenses where date_sh  and status='true'");
                                            $fetch3 = mysqli_fetch_assoc($sql_query7);
                                            $total_price2 = $fetch3["total_price"];
                                        ?>
                                        <td colspan="2" id="refresh_id_ex"><?php echo $total_price2 . " $ "; ?></td>
                                        <!-- <?php 
                                            // total Added Medicine
                                            // $sql_query8 = mysqli_query($connection,"select sum(mount*buy_price) as total_price from plus_items where date like '$today_date'");
                                            // $fetch4 = mysqli_fetch_assoc($sql_query8);
                                            // $total_price3 = $fetch4["total_price"];
                                        ?> -->
                                        <!-- <td colspan="1"><?php echo $total_price3 . " $ "; ?></td> -->
                                        <td colspan="1" id="billans"><?php
                                        $billans = (($total_stored_item)-($total_price2+$total_price));
                                        echo  $billans. " $ "; ?></td>

                                    </tr>
                                    <script>
                                    var billans = "<?php echo $billans;?>";
                                    var id = document.getElementById("billans");
                                    if (billans < 0) {
                                        id.style.backgroundColor = "red";
                                        id.style.color = "white";

                                    } else if (billans == 0) {
                                        id.style.backgroundColor = "grey";
                                        id.style.color = "white";

                                    } else {
                                        id.style.backgroundColor = "green";
                                        id.style.color = "white";
                                    }
                                    </script>


                                </table>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>



    </body>

</html>