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
<?php
      $username = $_SESSION["username"];
      $password = base64_encode($_SESSION["password"]);

        $sql = mysqli_query($connection,"select * from users where username='$username' and password='$password'");
        $name = null;
        $lastname=null;
        $image=null;
        $authority = null;
        while($fetch = mysqli_fetch_assoc($sql)){
          $name = $fetch["name"];
          $lastname = $fetch["lastname"];
          $image = $fetch["image"];
          $authority = $fetch["authority"];
        }
        if($authority=="50"){
            echo "<style>
              .authority{
                display:none;
              }
            </style>";
        }
        else{

        }
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

        .tr th {
            position: sticky !important;
            top: 0px !important;
            background-color: #144b6f;
        }
        </style>
    </head>
    <script>
    </script>
    <script>
    function edit(id) {
        var idd = id;
        window.open("edit.php?id_added_item_store=" + idd, "_self");
    }

    function delet(id) {
        var confirm = window.confirm("Are You sure You want To delete");
        if (confirm == true) {
            window.open("delete.php?id_added_item_store=" + id, "_self");
        } else {

        }
    }
    </script>

    <body class="my-login-page">
        <section class="h-100" style=" padding:0px !important;">
            <div class="container-fluid h-100" style=" width:100%;">

                <table class="table  table-stripped" style="text-align:center !important;">

                    <tr>
                        <form action="" method="post">
                            <th><input type="search" class="form-control" id="myInput"
                                    placeholder="ٌSearch in here .. "></th>

                        </form>
                    </tr>

                </table>

                <div class="card-wrapper" style="width:100%;margin-top:1%; ">
                    <div class="card fat" style="">
                        <div class="card-body">
                            <button class="btn btn-primary"
                                onclick="window.open('item_store_expenses.php','_self');">back</button>

                            <h2 class="card-title" style="text-align:center;">Item Store Added Expenses</h2>
                            <hr>
                            <form method="POST" id="uploadForm" class="my-login-validation"
                                enctype="multipart/form-data" novalidate="">
                                <table class="table table-bordered">
                                    <tr class="tr" style="background-color:#144b6f;color:white;">
                                        <th>#No</th>
                                        <th>Code</th>
                                        <th>Description</th>
                                        <th>Mount</th>
                                        <th>Price | 1</th>
                                        <th>Total</th>
                                        <th>Date</th>
                                        <th title="Edit & Delete" class="authority">E & D</th>
                                    </tr>
                                    <?php
                                    $sql = mysqli_query($connection,"select * from item_expenses");
                                    $count=1;
                                    while($row = mysqli_fetch_assoc($sql)){
                                        ?>
                                    <tbody id="myTable">
                                        <tr>
                                            <td style="color:green;"><?php echo $count;?></td>
                                            <td><?php echo $row["code"];?></td>
                                            <td><?php echo $row["description"];?></td>
                                            <td><?php echo $row["amount"];?></td>
                                            <td><?php echo $row["price1"];?></td>
                                            <td><?php echo $row["amount"] * $row["price1"];?></td>
                                            <td><?php echo $row["date_sh"];?></td>

                                            <td class="authority"><span class="glyphicon glyphicon-edit" title="edit"
                                                    onclick="edit(<?php echo $row['id'] ;?>)"
                                                    style="color:green; cursor:pointer;"></span>
                                                | <span class="glyphicon glyphicon-remove"
                                                    onclick="delet(<?php echo $row['id'] ;?>)"
                                                    style="color:red; cursor:pointer;" title="delete"></span></td>
                                        </tr>
                                        <?php
                                        $count++;
                                    }
                                  ?>
                                    </tbody>


                                </table>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
        </script>



    </body>

</html>