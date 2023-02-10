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
        <style>
        tr,
        td {
            text-align: center !important;
        }
        </style>
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
                            <button class="btn btn-success"
                                onclick="window.open('item_store_added_expenses.php','_self');">Added Expenses</button>

                            <h2 class="card-title" style="text-align:center;">Item Store Expense</h2>
                            <hr>
                            <form method="POST" id="uploadForm" class="my-login-validation"
                                enctype="multipart/form-data" novalidate="">
                                <table class="table table-bordered">
                                    <tr>

                                        <th>Code</th>
                                        <th>Description</th>
                                        <th>Mount</th>

                                        <th>Price | 1</th>
                                        <th>Total</th>
                                        <th>Date</th>
                                    </tr>
                                    <tr>

                                        <td>
                                            <div class="form-group">
                                                <select class="form-control" style="height:35px;"
                                                    name="code_item_expense" id="code_item_expense" required autofocus>
                                                    <?php 
														$count = 1;
														while($count <=10){
														?>
                                                    <option value="<?php echo $count; ?>"><?php echo $count;?></option>
                                                    <?php 
													
                                                $count++;    
                                                }
													?>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <textarea name="description" cols="30" rows="4"></textarea>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input name="mount" type="text" value="1" class="form-control"
                                                    id="mount" required>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="price"
                                                    onkeyup="settotal()" id="price" required autofocus>
                                            </div>
                                        </td>
                                        <script>
                                        function settotal() {
                                            var mount = $("#mount").val();
                                            var price = $("#price").val();
                                            $("#total").val(mount * price);
                                        }
                                        </script>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control" readonly name="total" id="total"
                                                    required autofocus>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="date"
                                                    value="<?php echo jdate("d/m/Y","","","Asia/kabul","en"); ?>"
                                                    required autofocus>
                                            </div>
                                        </td>


                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="10">
                                            <div class="form-group m-0">
                                                <button type="submit" id="loading" class="btn btn-primary btn-block">
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

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <script type="text/javascript">
        $(document).ready(function(e) {
            $("#uploadForm").on('submit', (function(e) {
                e.preventDefault();
                document.getElementById("loading").innerHTML =
                    "<img src='image/loading.gif' style='height:20px; width:20px;'/>";
                var code_item_expense = document.getElementById("code_item_expense").value;

                function callback() {
                    document.getElementById("state").innerHTML =
                        "<div class='alert alert-danger shadow'>please fill form data </div>";
                    setTimeout(() => {
                        document.getElementById("state").innerHTML = "";

                    }, 3000);
                    document.getElementById("loading").innerHTML = "Submit";

                }
                if (code_item_expense == "") {
                    callback();
                } else {

                    $.ajax({
                        url: "test.php",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            document.getElementById("state").innerHTML =
                                "<div class='alert alert-success shadow'>Expense Added Successfully </div>";
                            setTimeout(() => {
                                document.getElementById("state").innerHTML = "";
                            }, 3000);
                            document.getElementById("loading").innerHTML = "Submit";
                            document.getElementById("uploadForm").reset();
                        },
                        error: function() {
                            document.getElementById("state").innerHTML =
                                "<div class='alert alert-danger shadow'>Failed To Add Item </div>";
                            setTimeout(() => {
                                document.getElementById("state").innerHTML = "";

                            }, 3000);
                            document.getElementById("loading").innerHTML = "Submit";
                        }
                    });
                }
            }));

        });
        </script>


    </body>

</html>