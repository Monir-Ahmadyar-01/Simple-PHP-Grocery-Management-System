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
                            <button class="btn btn-primary"
                                onclick="window.open('item_store_comapanies.php','_self');">back</button>

                            <h2 class="card-title" style="text-align:center;"><?php 
                                if(isset($_GET["company_name"])){
                                    echo $_GET["company_name"];
                                }
                            ?></h2>
                            <hr>
                            <form method="POST" id="uploadForm" class="my-login-validation"
                                enctype="multipart/form-data" novalidate="">
                                <table class="table table-bordered">

                                    <tr>
                                        <th>Bill No</th>
                                        <th>Company Name</th>
                                        <th>Agent Name</th>
                                        <th>Buy Amount</th>
                                        <th>Received</th>
                                        <th>Rest</th>
                                        <th>Date</th>

                                    </tr>
                                    <?php
										
										if(isset($_POST["btn_submit"])){
                                            $bill_no = $_POST["bill_no"];
											$company_name = $_POST["company_name"];
											$agent_name = $_POST["agent_name"];
											$buy_amount = $_POST["buy_amount"];
											$received = $_POST["received"];
											$baqi = $_POST["baqi"];
											$date_sh = $_POST["date_sh"];
                                            $sql_query4  = mysqli_query($connection , "INSERT INTO `company_account` (`id`, `bill_no`, `company_name`, `agent_name`, `buy_amount`, `received`, `date_sh`)
                                            VALUES (NULL, '$bill_no', '$company_name', '$agent_name', '$buy_amount', '$received', '$date_sh')
                                            ");
											 if ($sql_query4) {
											 		echo "<script>alert('Data Added Successfully')</script>";
											 }
										}

									?>

                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="bill_no" id="bill_no"
                                                    required autofocus>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control" value="<?php 
                                                $company_name ;
                                                if(isset($_GET["company_name"])){
                                                    $company_name=$_GET["company_name"];
                                                    echo $_GET["company_name"];
                                                }
                                            ?>" name="company_name" readonly id="company_name" required autofocus>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="agent_name"
                                                    id="agent_name" required autofocus>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="buy_amount"
                                                    onkeyup="setbaqi()" id="buy_amount" required autofocus>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="received"
                                                    onkeyup="setbaqi()" id="received" required autofocus>
                                            </div>
                                        </td>
                                        <script>
                                        function setbaqi() {
                                            var buy_amount = $("#buy_amount").val();
                                            var received = $("#received").val();
                                            var baqi = parseInt(buy_amount) - parseInt(received);
                                            $("#baqi").val(baqi);
                                        }
                                        </script>
                                        <td>
                                            <div class="form-group">
                                                <input name="baqi" type="text" id="baqi" style="color:red;"
                                                    class="form-control" required>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="date_sh"
                                                    value="<?php echo jdate("d/m/Y","","","Asia/kabul","en"); ?>"
                                                    required autofocus>
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
                            <script>
                            function edit(id) {
                                var idd = id;
                                window.open("edit.php?id_c_account=" + idd + "", "_self");

                            }

                            function delet(id) {
                                var confirm = window.confirm("Are You sure You want To delete");
                                if (confirm == true) {
                                    window.open("delete.php?id_c_account=" + id, "_self");
                                } else {

                                }
                            }
                            </script>
                            <table class="table table-bordered">
                                <tr class="tr" style="background-color:#144b6f;color:white;">
                                    <th>#No</th>
                                    <th>Bill No</th>
                                    <th>Company Name</th>
                                    <th>Agent Name</th>
                                    <th>Buy Amount</th>
                                    <th>Received</th>
                                    <th>Rest</th>
                                    <th>Date</th>
                                    <th title="Edit & Delete" class="authority">E & D</th>
                                </tr>
                                <?php 
                                    $company_name_02 ;
                                    if(isset($_GET["company_name"])){
                                        $company_name_02 = $_GET["company_name"];
                                    }
                                    $sql = mysqli_query($connection,"select * from company_account where company_name='$company_name'");
                                    $count=1;
                                    while($row = mysqli_fetch_assoc($sql)){
                                        ?>
                                <tbody id="myTable">
                                    <tr>
                                        <td style="color:green;"><?php echo $count;?></td>
                                        <td><?php echo $row["bill_no"];?></td>
                                        <td><?php echo $row["company_name"];?></td>
                                        <td><?php echo $row["agent_name"];?></td>
                                        <td><?php echo $row["buy_amount"];?></td>
                                        <td><?php echo $row["received"];?></td>
                                        <td style="color:red;"><?php echo $row["buy_amount"] - $row["received"];?></td>
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

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </body>

</html>