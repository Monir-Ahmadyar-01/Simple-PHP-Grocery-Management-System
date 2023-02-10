  <?php 
    include_once("expp.php");
  ?>
  <!DOCTYPE html>

  <html lang="en">

      <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <meta http-equiv="X-UA-Compatible" content="ie=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link type="text/css" rel="stylesheet" href="css/bootstrap.css">
          <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
          <script type="text/javascript" src="js/bootstrap.js"></script>
          <script type="text/javascript" src="js/bootstrap.min.js"></script>
          <script type="text/javascript" src="js/jquery.js"></script>
          <link type="text/css" rel="stylesheet" href="css/style.css">
          <script type="text/javascript" src="js/datepicker.js">
          </script>
          <script language="JavaScript">
          /**
           * Disable right-click of mouse, F12 key, and save key combinations on page
           * By Arthur Gareginyan (https://www.arthurgareginyan.com)
           * For full source code, visit https://mycyberuniverse.com
           */
          window.onload = function() {
              document.addEventListener("contextmenu", function(e) {
                  e.preventDefault();
              }, false);
              document.addEventListener("keydown", function(e) {
                  //document.onkeydown = function(e) {
                  // "I" key
                  if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
                      disabledEvent(e);
                  }
                  // "J" key
                  if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
                      disabledEvent(e);
                  }
                  // "S" key + macOS
                  if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
                      disabledEvent(e);
                  }
                  // "U" key
                  if (e.ctrlKey && e.keyCode == 85) {
                      disabledEvent(e);
                  }
                  // "F12" key
                  if (event.keyCode == 123) {
                      disabledEvent(e);
                  }
              }, false);

              function disabledEvent(e) {
                  if (e.stopPropagation) {
                      e.stopPropagation();
                  } else if (window.event) {
                      window.event.cancelBubble = true;
                  }
                  e.preventDefault();
                  return false;
              }
          };
          </script>

          <link rel="stylesheet" href="css/datepicker.css">
          <style>
          caption,
          td,
          th {
              text-align: center;
              font-family: arial;
          }

          caption {
              background-color: #5f7682;
              color: white;
          }
          </style>
      </head>

      <body>
          <?php 
    include_once("database.php");
    include_once("jdf.php");
?>
          <?php 
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $sql_query = mysqli_query($connection,"select * from impression where id='$id'");
        $fetch1 = mysqli_fetch_assoc($sql_query);
?>

          <div class="container-fluid">
              <div class="row">
                  <div class="col-sm-5">
                      <table class="table table-bordered table-striped">
                          <tr>
                              <th>Impression</th>
                          </tr>
                          <?php 
                                if(isset($_POST["btn_update"])){
                                    $impression = $_POST["impression"];
                                    $sql_query2 = mysqli_query($connection,"update impression set impression='$impression' where id='$id'");
                                    if($sql_query2){
                                        header("location:manage_impression.php");
                                    }
                                    else{
                                        echo "<script>alert('Database Error')</script>";
                                    }
                                }
                            ?>
                          <form action="" method="post">
                              <tr>
                                  <td><input type="text" name="impression" value="<?php echo $fetch1["impression"];?>"
                                          class="form-control"></td>
                              </tr>
                              <tr>
                                  <td><button type="submit" name="btn_update" class="btn btn-primary btn-sm"
                                          style="width:100%;">Update</button></td>
                              </tr>
                          </form>

                      </table>
                  </div>
              </div>
          </div>

          <?php
        exit();
            }

        ?>
          <!-- part edit company -->
          <?php 
    if(isset($_GET["id_company"])){
        $id = $_GET["id_company"];
        $sql_query = mysqli_query($connection,"select * from new_company where id='$id'");
        $fetch1 = mysqli_fetch_assoc($sql_query);
?>

          <div class="container-fluid">
              <div class="row">
                  <div class="col-sm-10">
                      <table class="table table-bordered table-striped">
                          <tr>
                              <th>Edit Company</th>
                          </tr>

                          <div class="card-wrapper" style="width:100%;margin-top:1%; ">
                              <div class="card fat" style="">
                                  <div class="card-body">
                                      <button class="btn btn-primary btn-sm"
                                          onclick="window.open('new_company.php','_self');">back</button>

                                      <hr>
                                      <form method="POST" id="uploadForm" class="my-login-validation"
                                          enctype="multipart/form-data" novalidate="">
                                          <table class="table table-bordered">
                                              <tr>
                                                  <th>Company Name</th>
                                                  <th>Description</th>
                                                  <th>Phone Number</th>
                                                  <th>Email</th>
                                                  <th>Address</th>
                                                  <th>Date</th>
                                              </tr>
                                              <?php
										
										if(isset($_POST["btn_submit"])){
											$company_name = $_POST["company_name"];
											$description = $_POST["description"];
											$phone_number = $_POST["phone_number"];
											$email = $_POST["email"];
											$address = $_POST["address"];
											$date_sh = $_POST["date_sh"];
                                            $sql_query4  = mysqli_query($connection , "
                                              update new_company set company_name='$company_name',description='$description',
                                              phone_number='$phone_number',phone_number='$phone_number',email='$email',address='$address',date_sh='$date_sh' where id='$id'
                                            ");
											 if ($sql_query4) {
                           echo "<script>alert('Company updated Successfully')</script>";
                           header("location:new_company.php");
											 }
										}

									?>

                                              <tr>

                                                  <td>
                                                      <div class="form-group">
                                                          <input type="text" class="form-control"
                                                              value="<?php echo $fetch1["company_name"]; ?>"
                                                              name="company_name" id="company_name" required autofocus>
                                                      </div>
                                                  </td>
                                                  <td>
                                                      <div class="form-group">
                                                          <input type="text" class="form-control" name="description"
                                                              value="<?php echo $fetch1["description"]; ?>"
                                                              id="description" required autofocus>
                                                      </div>
                                                  </td>
                                                  <td>
                                                      <div class="form-group">
                                                          <input type="text" class="form-control" name="phone_number"
                                                              value="<?php echo $fetch1["phone_number"]; ?>"
                                                              id="phone_number" required autofocus>
                                                      </div>
                                                  </td>

                                                  <td>
                                                      <div class="form-group">
                                                          <input type="text" class="form-control" name="email"
                                                              value="<?php echo $fetch1["email"]; ?>" id="email"
                                                              required autofocus>
                                                      </div>
                                                  </td>
                                                  <td>
                                                      <div class="form-group">
                                                          <input name="address" type="text" id="address"
                                                              value="<?php echo $fetch1["address"]; ?>"
                                                              class="form-control" required>
                                                      </div>
                                                  </td>
                                                  <td>
                                                      <div class="form-group">
                                                          <input type="text" class="form-control" name="date_sh"
                                                              value="<?php echo $fetch1["date_sh"]; ?>" required
                                                              autofocus>
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


                      </table>
                  </div>
              </div>
          </div>

          <?php
        exit();
            }

        ?>
          <!-- end part edit company -->
          <?php 
        // part Edit added_item
    if(isset($_GET["id_add_item"])){
        $id = $_GET["id_add_item"];
        $sql_query = mysqli_query($connection,"select * from repository where id='$id'");
        $fetch1 = mysqli_fetch_assoc($sql_query);
    
                                if(isset($_POST["btn_submit"])){
                                    $item_name = $_POST["item_name"];
                                    $description = $_POST["description"];
                                    $mount = $_POST["mount"];
                                    $price = $_POST["price"];
                                    $date = $_POST["date"];
                                    $sql_query2 = mysqli_query($connection,"update repository set item_name='$item_name',description='$description',mount='$mount',price='$price',date='$date' where id='$id'");
                                    if($sql_query2){
                                        header("location:godam_items.php");
                                    }
                                    else{
                                        echo "<script>alert('Database Error')</script>";
                                    }
                                }
                            
?>

          <section class="h-100" style=" padding:0px !important;">
              <div class="container-fluid h-100" style=" width:100%;">
                  <div class="card-wrapper" style="width:100%;margin-top:1%; ">
                      <div class="card fat" style="">
                          <div class="card-body">

                              <hr>
                              <form method="POST" class="my-login-validation" enctype="multipart/form-data"
                                  novalidate="">
                                  <table class="table table-bordered">
                                      <tr>

                                          <th>Item Name</th>
                                          <th>Description</th>
                                          <th>Mount</th>
                                          <th>Price | 1</th>
                                          <th>Date</th>
                                      </tr>
                                      <tr>
                                          <td>
                                              <div class="form-group">
                                                  <input type="text" class="form-control" name="item_name"
                                                      value="<?php echo $fetch1["item_name"]; ?>" required autofocus>
                                              </div>
                                          </td>
                                          <td>
                                              <div class="form-group">
                                                  <textarea class="form-control" name="description">
                                                  <?php echo $fetch1["description"]; ?> 
                                                </textarea>
                                              </div>
                                          </td>
                                          <td>
                                              <div class="form-group">
                                                  <input name="mount" value="<?php echo $fetch1["mount"]; ?>"
                                                      type="text" class="form-control" id="mount" required>
                                              </div>
                                          </td>


                                          <td>
                                              <div class="form-group">
                                                  <input type="text" class="form-control"
                                                      value="<?php echo $fetch1["price"]; ?>" name="price" id="total"
                                                      required autofocus>
                                              </div>
                                          </td>

                                          <td>
                                              <div class="form-group">
                                                  <input type="text" class="form-control" name="date"
                                                      value="<?php echo $fetch1["date"]; ?>" required autofocus>
                                              </div>
                                          </td>


                                          </td>
                                      </tr>
                                      <tr>
                                          <td colspan="10">
                                              <div class="form-group m-0">
                                                  <button type="submit" name="btn_submit" id="loading"
                                                      class="btn btn-primary btn-block">
                                                      Submit
                                                  </button>

                                              </div>
                                          </td>
                                      </tr>
                                      <tr>

                                      </tr>
                                  </table>

                              </form>
                          </div>
                      </div>

                  </div>
              </div>
          </section>

          <?php
        exit();
            }

        ?>
          <?php 
        // part Edit selled item
    if(isset($_GET["id_selled_item"])){
        $id = $_GET["id_selled_item"];
        $sql_query = mysqli_query($connection,"select * from item_store where id='$id'");
        $fetch1 = mysqli_fetch_assoc($sql_query);
    
                                if(isset($_POST["btn_submit"])){
                                    $item_name = $_POST["item_name"];
                                    $person_name = $_POST["person_name"];
                                    $mount = $_POST["mount"];
                                    $price = $_POST["price"];
                                    $date = $_POST["date"];
                                    $sql_query2 = mysqli_query($connection,"update item_store set person_name='$person_name',item_name='$item_name',mount='$mount',price='$price',date='$date' where id='$id'");
                                    if($sql_query2){
                                        header("location:selled_items.php");
                                    }
                                    else{
                                        echo "<script>alert('Database Error')</script>";
                                    }
                                }
                            
?>

          <section class="h-100" style=" padding:0px !important;">
              <div class="container-fluid h-100" style=" width:100%;">
                  <div class="card-wrapper" style="width:100%;margin-top:1%; ">
                      <div class="card fat" style="">
                          <div class="card-body">

                              <hr>
                              <form method="POST" class="my-login-validation" enctype="multipart/form-data"
                                  novalidate="">
                                  <table class="table table-bordered">
                                      <tr>

                                          <th>Full Name</th>
                                          <th>Item Name</th>
                                          <th>Mount</th>
                                          <th>Price | 1</th>
                                          <th>Date</th>
                                      </tr>
                                      <tr>
                                          <td>
                                              <div class="form-group">
                                                  <input type="text" class="form-control" name="person_name"
                                                      value="<?php echo $fetch1["person_name"]; ?>" required autofocus>
                                              </div>
                                          </td>
                                          <td>
                                              <div class="form-group">
                                                  <input type="text" class="form-control" name="item_name"
                                                      value="<?php echo $fetch1["item_name"]; ?>" required autofocus>
                                              </div>
                                          </td>


                                          <td>
                                              <div class="form-group">
                                                  <input name="mount" value="<?php echo $fetch1["mount"]; ?>"
                                                      type="text" class="form-control" id="mount" required>
                                              </div>
                                          </td>


                                          <td>
                                              <div class="form-group">
                                                  <input type="text" class="form-control"
                                                      value="<?php echo $fetch1["price"]; ?>" name="price" id="total"
                                                      required autofocus>
                                              </div>
                                          </td>

                                          <td>
                                              <div class="form-group">
                                                  <input type="text" class="form-control" name="date"
                                                      value="<?php echo $fetch1["date"]; ?>" required autofocus>
                                              </div>
                                          </td>


                                          </td>
                                      </tr>
                                      <tr>
                                          <td colspan="10">
                                              <div class="form-group m-0">
                                                  <button type="submit" name="btn_submit" id="loading"
                                                      class="btn btn-primary btn-block">
                                                      Submit
                                                  </button>

                                              </div>
                                          </td>
                                      </tr>
                                      <tr>

                                      </tr>
                                  </table>

                              </form>
                          </div>
                      </div>

                  </div>
              </div>
          </section>

          <?php
        exit();
            }

        ?>
          <?php
        // part Edit Added Expenses
    if(isset($_GET["id_added_expenses"])){
        $id = $_GET["id_added_expenses"];
        $sql_query = mysqli_query($connection,"select * from expense where id='$id'");
        $fetch1 = mysqli_fetch_assoc($sql_query);
    
                                if(isset($_POST["btn_submit"])){
                                    $code = $_POST["code"];
                                    $description = $_POST["description"];
                                    $mount = $_POST["mount"];
                                    $price = $_POST["price"];
                                    $date = $_POST["date"];
                                    $sql_query2 = mysqli_query($connection,"update expense set code='$code',description='$description',mount='$mount',price1='$price',date='$date' where id='$id'");
                                    if($sql_query2){
                                        header("location:added_expenses.php");
                                    }
                                    else{
                                        echo "<script>alert('Database Error')</script>";
                                    }
                                }
                            
?>

          <section class="h-100" style=" padding:0px !important;">
              <div class="container-fluid h-100" style=" width:100%;">
                  <div class="card-wrapper" style="width:100%;margin-top:1%; ">
                      <div class="card fat" style="">
                          <div class="card-body">

                              <hr>
                              <form method="POST" class="my-login-validation" enctype="multipart/form-data"
                                  novalidate="">
                                  <table class="table table-bordered">
                                      <tr>

                                          <th>Code</th>
                                          <th>Description</th>
                                          <th>Mount</th>

                                          <th>Price | 1</th>
                                          <th>Date</th>
                                      </tr>
                                      <tr>
                                          <td>
                                              <div class="form-group">
                                                  <input type="text" class="form-control" name="code"
                                                      value="<?php echo $fetch1["code"]; ?>" required autofocus>
                                              </div>
                                          </td>
                                          <td>
                                              <div class="form-group">
                                                  <textarea name="description" class="form-control">
                                                <?php echo $fetch1["description"];?>
                                              </textarea>
                                              </div>
                                          </td>

                                          <td>
                                              <div class="form-group">
                                                  <input name="mount" value="<?php echo $fetch1["mount"]; ?>"
                                                      type="text" class="form-control" id="mount" required>
                                              </div>
                                          </td>


                                          <td>
                                              <div class="form-group">
                                                  <input type="text" class="form-control"
                                                      value="<?php echo $fetch1["price1"]; ?>" name="price" id="total"
                                                      required autofocus>
                                              </div>
                                          </td>


                                          <td>
                                              <div class="form-group">
                                                  <input type="text" class="form-control" name="date"
                                                      value="<?php echo $fetch1["date"]; ?>" required autofocus>
                                              </div>
                                          </td>



                                          </td>
                                      </tr>
                                      <tr>
                                          <td colspan="10">
                                              <div class="form-group m-0">
                                                  <button type="submit" name="btn_submit" id="loading"
                                                      class="btn btn-primary btn-block">
                                                      Submit
                                                  </button>

                                              </div>
                                          </td>
                                      </tr>
                                      <tr>

                                      </tr>
                                  </table>

                              </form>
                          </div>
                      </div>

                  </div>
              </div>
          </section>

          <?php
        exit();
            }

        ?>
          <!-- part edit company_account -->
          <?php
    if(isset($_GET["id_c_account"])){
        $id = $_GET["id_c_account"];
        $sql_query = mysqli_query($connection,"select * from company_account where id='$id'");
        $fetch1 = mysqli_fetch_assoc($sql_query);
       
       ?>

          <section class="h-100" style=" padding:0px !important;">
              <div class="container-fluid h-100" style=" width:100%;">
                  <div class="card-wrapper" style="width:100%;margin-top:1%; ">
                      <div class="card fat" style="">
                          <div class="card-body">

                              <hr>
                              <form method="POST" id="uploadForm" class="my-login-validation"
                                  enctype="multipart/form-data" novalidate="">
                                  <h2 class="card-title" style="text-align:center;"><?php 
                                echo $fetch1["company_name"];
                            ?></h2>
                                  <hr>
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
                      $sql_query4  = mysqli_query($connection , "update company_account set bill_no='$bill_no',company_name='$company_name',agent_name='$agent_name',buy_amount='$buy_amount',received='$received',date_sh='$date_sh' where id='$id'");
											 if ($sql_query4) {
                          
                           echo "<script>alert('Data Added Successfully')</script>";
                           header("location:company_account.php?company_name=$company_name");
                       }
                       else{
                         header("location:company_account.php?company_name=$company_name");
                       }
										}

									?>

                                      <tr>
                                          <td>
                                              <div class="form-group">
                                                  <input type="text" class="form-control" name="bill_no"
                                                      value="<?php echo $fetch1["bill_no"]; ?>" id="bill_no" required
                                                      autofocus>
                                              </div>
                                          </td>
                                          <td>
                                              <div class="form-group">
                                                  <input type="text" class="form-control"
                                                      value="<?php echo $fetch1["company_name"]; ?>" name="company_name"
                                                      readonly id="company_name" required autofocus>
                                              </div>
                                          </td>

                                          <td>
                                              <div class="form-group">
                                                  <input type="text" class="form-control"
                                                      value="<?php echo $fetch1["agent_name"]; ?>" name="agent_name"
                                                      id="agent_name" required autofocus>
                                              </div>
                                          </td>

                                          <td>
                                              <div class="form-group">
                                                  <input type="text" class="form-control" name="buy_amount"
                                                      value="<?php echo $fetch1["buy_amount"]; ?>" onkeyup="setbaqi()"
                                                      id="buy_amount" required autofocus>
                                              </div>
                                          </td>

                                          <td>
                                              <div class="form-group">
                                                  <input type="text" class="form-control" name="received"
                                                      value="<?php echo $fetch1["received"]; ?>" onkeyup="setbaqi()"
                                                      id="received" required autofocus>
                                              </div>
                                          </td>
                                          <script>
                                          function setbaqi() {
                                              var buy_amount = document.getElementById("buy_amount").value;
                                              var received = document.getElementById("received").value;
                                              var baqi = parseInt(buy_amount) - parseInt(received);
                                              document.getElementById("baqi").value = baqi;
                                          }
                                          </script>
                                          <td>
                                              <div class="form-group">
                                                  <input name="baqi" type="text" id="baqi" style="color:red;"
                                                      class="form-control"
                                                      value="<?php echo $fetch1["buy_amount"]-$fetch1["received"]; ?>"
                                                      required>
                                              </div>
                                          </td>
                                          <td>
                                              <div class="form-group">
                                                  <input type="text" class="form-control" name="date_sh"
                                                      value="<?php echo $fetch1["date_sh"]; ?>" required autofocus>
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
                              </form>
                          </div>
                      </div>

                  </div>
              </div>
          </section>

          <?php
        exit();
            }

        ?>
          <!-- part edit added item expenses -->
          <?php
        
    if(isset($_GET["id_added_item_store"])){
        $id = $_GET["id_added_item_store"];
        $sql_query = mysqli_query($connection,"select * from item_expenses where id='$id'");
        $fetch1 = mysqli_fetch_assoc($sql_query);
    
                                if(isset($_POST["btn_submit"])){
                                    $code = $_POST["code"];
                                    $description = $_POST["description"];
                                    $mount = $_POST["mount"];
                                    $price = $_POST["price"];
                                    $date = $_POST["date"];
                                    $sql_query2 = mysqli_query($connection,"update item_expenses set code='$code',description='$description',amount='$mount',price1='$price',date_sh='$date' where id='$id'");
                                    if($sql_query2){
                                        header("location:item_store_added_expenses.php");
                                    }
                                    else{
                                        echo "<script>alert('Database Error')</script>";
                                    }
                                }
                            
?>

          <section class="h-100" style=" padding:0px !important;">
              <div class="container-fluid h-100" style=" width:100%;">
                  <div class="card-wrapper" style="width:100%;margin-top:1%; ">
                      <div class="card fat" style="">
                          <div class="card-body">

                              <hr>
                              <form method="POST" class="my-login-validation" enctype="multipart/form-data"
                                  novalidate="">
                                  <table class="table table-bordered">
                                      <tr>
                                          <th>Code</th>
                                          <th>Description</th>
                                          <th>Mount</th>
                                          <th>Price | 1</th>
                                          <th>Date</th>
                                      </tr>
                                      <tr>
                                          <td>
                                              <div class="form-group">
                                                  <input type="text" class="form-control" name="code"
                                                      value="<?php echo $fetch1["code"]; ?>" required autofocus>
                                              </div>
                                          </td>
                                          <td>
                                              <div class="form-group">
                                                  <textarea name="description" class="form-control">
                                                <?php echo $fetch1["description"];?>
                                              </textarea>
                                              </div>
                                          </td>

                                          <td>
                                              <div class="form-group">
                                                  <input name="mount" value="<?php echo $fetch1["amount"]; ?>"
                                                      type="text" class="form-control" id="mount" required>
                                              </div>
                                          </td>


                                          <td>
                                              <div class="form-group">
                                                  <input type="text" class="form-control"
                                                      value="<?php echo $fetch1["price1"]; ?>" name="price" id="total"
                                                      required autofocus>
                                              </div>
                                          </td>


                                          <td>
                                              <div class="form-group">
                                                  <input type="text" class="form-control" name="date"
                                                      value="<?php echo $fetch1["date_sh"]; ?>" required autofocus>
                                              </div>
                                          </td>



                                          </td>
                                      </tr>
                                      <tr>
                                          <td colspan="10">
                                              <div class="form-group m-0">
                                                  <button type="submit" name="btn_submit" id="loading"
                                                      class="btn btn-primary btn-block">
                                                      Submit
                                                  </button>

                                              </div>
                                          </td>
                                      </tr>
                                      <tr>

                                      </tr>
                                  </table>

                              </form>
                          </div>
                      </div>

                  </div>
              </div>
          </section>

          <?php
        exit();
            }

        ?>
          <?php 
    if(isset($_GET["id_d"])){
        $id_d = $_GET["id_d"];
        $sql_query = mysqli_query($connection,"select * from item_store where id='$id_d'");
        $fetch1 = mysqli_fetch_assoc($sql_query);
?>

          <div class="container-fluid">
              <div class="row">
                  <div class="col-sm-10">
                      <table class="table table-bordered table-striped">
                          <tr>
                              <th>Barcode</th>
                              <th>Name</th>
                              <th>Mount</th>
                              <th>Buy Price</th>
                              <th>Sell Price</th>
                              <th>Date</th>
                          </tr>
                          <?php 
                                if(isset($_POST["btn_update2"])){
                                    $barcode = $_POST["barcode"];
                                    $name = $_POST["name"];
                                    $detail = $_POST["detail"];
                                    $mount = $_POST["mount"];
                                    $buy_price = $_POST["buy_price"];
                                    $sell_price = $_POST["sell_price"];
                                    $date = $_POST["date"];
                                    $sql_query2 = mysqli_query($connection,"update item_store set barcode='$barcode',name='$name',mount='$mount',buy_price='$buy_price',sell_price='$sell_price',date='$date' where id='$id_d'");
                                    if($sql_query2){
                                        header("location:manage_item.php");
                                    }
                                    else{
                                        echo "<script>alert('Database Error')</script>";
                                    }
                                }
                            ?>
                          <form action="" method="post">
                              <tr>
                                  <td><input type="text" name="barcode" value="<?php echo $fetch1["barcode"];?>"
                                          class="form-control"></td>
                                  <td><input type="text" name="name" value="<?php echo $fetch1["name"];?>"
                                          class="form-control"></td>
                                  <td><input type="text" name="mount" value="<?php echo $fetch1["mount"];?>"
                                          class="form-control"></td>
                                  <td><input type="text" name="buy_price" value="<?php echo $fetch1["buy_price"];?>"
                                          class="form-control"></td>
                                  <td><input type="text" name="sell_price" value="<?php echo $fetch1["sell_price"];?>"
                                          class="form-control"></td>
                                  <td><input type="text" name="date" value="<?php echo $fetch1["date"];?>"
                                          class="form-control"></td>

                              </tr>
                              <tr>
                                  <td colspan="7"><button type="submit" name="btn_update2"
                                          class="btn btn-primary btn-sm" style="width:100%;">Update</button></td>
                              </tr>
                          </form>

                      </table>
                  </div>
              </div>
          </div>

          <?php
        exit();
            }

        ?>
          <?php 
            //  part edit stuff
    if(isset($_GET["id_s"])){
        $id_s = $_GET["id_s"];
        $sql_query_s = mysqli_query($connection,"select * from stuff where id='$id_s'");
        $fetch3 = mysqli_fetch_assoc($sql_query_s);
?>

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
                  <script type="text/javascript" src="js/jquery.js"></script>
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

              </head>
              <script>
              </script>
              <?php 
    if(isset($_POST["btn_submit"])){
            $name_s = $_POST["name_s"];
            $lastname_s = $_POST["lastname_s"];
            $fathername_s = $_POST["fathername_s"];
            $work_area_s = $_POST["work_area_s"];
            $email_s = $_POST["email_s"];
            $ph_number_s = $_POST["ph_number_s"];
            $date_s = $_POST["date_s"];
            $id_number_s = $_POST["id_number_s"];
            $home_add_s = $_POST["home_add_s"];
            $sql_command_s = mysqli_query($connection , "update stuff set name='$name_s',lastname='$lastname_s',fathername='$fathername_s',
            work_area_s='$work_area_s',email_s='$email_s',ph_number_s='$ph_number_s',date_s='$date_s',id_number_s='$id_number_s',
            home_add_s='$home_add_s' where id='$id_s'
            ");
            if($sql_command_s){
                echo "<script>window.open('manage_stuff.php','_self');</script>";
            }
            else{
              echo "<script>alert('data cant update');</script>";
            }
          }
  
  ?>

              <body class="my-login-page">
                  <section class="h-100" style=" padding:0px !important;">
                      <div class="container-fluid h-100" style=" width:100%;">
                          <div class="card-wrapper" style="width:100%;margin-top:1%; ">
                              <div class="card fat" style="">
                                  <div class="card-body">
                                      <button class="btn btn-primary"
                                          onclick="window.open('manage_stuff.php','_self');">back</button>

                                      <form method="POST" id="uploadForm" class="my-login-validation"
                                          enctype="multipart/form-data" novalidate="">
                                          <table class="table table-bordered">
                                              <tr>
                                                  <th>Name</th>
                                                  <th>Last Name</th>
                                                  <th>Father Name</th>
                                                  <th>Work Area</th>
                                                  <th>Email Address</th>
                                                  <th>Ph.Number</th>
                                                  <th>Date</th>
                                                  <th>ID Number</th>
                                                  <th>Home Address</th>
                                              </tr>
                                              <tr>
                                                  <td>
                                                      <div class="form-group">
                                                          <input type="text" class="form-control" name="name_s"
                                                              value="<?php echo $fetch3["name"]; ?>" id="name_s"
                                                              required autofocus>
                                                      </div>
                                                  </td>
                                                  <td>
                                                      <div class="form-group">
                                                          <input type="text" class="form-control"
                                                              value="<?php echo $fetch3["lastname"]; ?>"
                                                              name="lastname_s" id="lastname_s" required autofocus>
                                                      </div>
                                                  </td>
                                                  <td>
                                                      <div class="form-group">
                                                          <input name="fathername_s"
                                                              value="<?php echo $fetch3["fathername"]; ?>" type="text"
                                                              class="form-control" required>
                                                      </div>
                                                  </td>
                                                  <td>
                                                      <div class="form-group">
                                                          <input type="text" class="form-control"
                                                              value="<?php echo $fetch3["work_area_s"]; ?>"
                                                              name="work_area_s" id="name" required autofocus>
                                                      </div>
                                                  </td>
                                                  <td>
                                                      <div class="form-group">
                                                          <input type="email" class="form-control"
                                                              value="<?php echo $fetch3["email_s"]; ?>" name="email_s"
                                                              id="lastname" required autofocus>
                                                      </div>
                                                  </td>
                                                  <td>
                                                      <div class="form-group">
                                                          <input name="ph_number_s" type="text"
                                                              value="<?php echo $fetch3["ph_number_s"]; ?>"
                                                              class="form-control" required>
                                                      </div>
                                                  </td>
                                                  <td>
                                                      <div class="form-group">
                                                          <input type="text" class="form-control"
                                                              value="<?php echo $fetch3["date_s"]; ?>" name="date_s"
                                                              id="datepicker0" required autofocus>
                                                      </div>
                                                  </td>
                                                  <td>
                                                      <div class="form-group">
                                                          <input type="text" class="form-control" name="id_number_s"
                                                              value="<?php echo $fetch3["id_number_s"]; ?>" id="name"
                                                              required autofocus>
                                                      </div>
                                                  </td>
                                                  <td>
                                                      <div class="form-group">
                                                          <input type="text" class="form-control" name="home_add_s"
                                                              value="<?php echo $fetch3["home_add_s"]; ?>" id="lastname"
                                                              required autofocus>
                                                      </div>
                                                  </td>

                                              </tr>
                                              <tr>
                                                  <td colspan="10">
                                                      <div class="form-group m-0">
                                                          <button type="submit" name="btn_submit" id="loading"
                                                              class="btn btn-primary btn-block">
                                                              update
                                                          </button>

                                                      </div>
                                                  </td>
                                              </tr>

                                          </table>

                                      </form>
                                  </div>
                              </div>

                          </div>
                      </div>
                  </section>


              </body>

          </html>

          <?php
        exit();
            }

        ?>



          <!-- part edit page manage-customers -->
          <?php  if(isset($_GET["id_c"])){
            $id = $_GET["id_c"];
            $sql_command = mysqli_query($connection,"select * from castomer where id='$id'");
            $fetch = mysqli_fetch_assoc($sql_command);
            ?>
          <div class="container-fluid">
              <div class="row">
                  <?php
                if (isset($_POST["submit_btn"])) {
                  $v1 ="  cycle/minute";
                  $v2 ="  bite/minute";
                  $v3 ="  C";
                  $v4 ="  kg";
                  $data  = array( $_POST["Patientid"],$_POST["name"],$_POST["surname"]
                  ,$_POST["age"],$_POST["gender"],$_POST["Province"],$_POST["Job"],
                  $_POST["Diagnosis1"],$_POST["Diagnosis2"],$_POST["Diagnosis3"],$_POST["BP"],
                  $_POST["HR"] ,$_POST["PR"] ,$_POST["RR"],$_POST["BT"],$_POST["BW"]);
                  $date = jdate("Y/n/j");
                    $sqlcommand4 = mysqli_query($connection , "update castomer set Patientid ='$data[0]',
                       name = '$data[1]', surname = '$data[2]', age='$data[3]', gender='$data[4]',
                        Province='$data[5]', Job='$data[6]', Diagnosis1='$data[7]',
                        Diagnosis2='$data[8]',
                        Diagnosis3='$data[9]', BP='$data[10]', HR='$data[11]', PR='$data[12]', RR='$data[13]', BT='$data[14]',
                     BW='$data[15]',date='$date' where id='$id'");
                       if ($sqlcommand4) {
                         echo "<script>alert('Castomer updated successfully')</script>";
                         header("location:manage_customers.php");
                       }
                }

             ?>


                  <form class="form" action="" method="post">
                      <div class="col-sm-3" style=" height:70%; ">

                          <table class="table table-bordered table-striped">
                              <caption>Vital Signs</caption>
                              <tr>
                                  <th>BP</th>
                                  <td>
                                      <input type="text" name="BP" value="<?php echo $fetch["BP"];?>"
                                          class="form-control">
                                  </td>
                              </tr>
                              <tr>
                                  <th>HR</th>
                                  <td>
                                      <input type="text" name="HR" value="<?php echo $fetch["HR"];?>"
                                          class="form-control">
                                  </td>
                              </tr>
                              <tr>
                                  <th>PR</th>
                                  <td>
                                      <input type="text" name="PR" value="<?php echo $fetch["PR"];?>"
                                          class="form-control">
                                  </td>
                              </tr>
                              <tr>
                                  <th>RR</th>
                                  <td>
                                      <input type="text" name="RR" value="<?php echo $fetch["RR"];?>"
                                          class="form-control">
                                  </td>
                              </tr>
                              <tr>
                                  <th>BT</th>
                                  <td>
                                      <input type="text" name="BT" value="<?php echo $fetch["BT"];?>"
                                          class="form-control">
                                  </td>
                              </tr>
                              <tr>
                                  <th>BW</th>
                                  <td>
                                      <input type="text" name="BW" value="<?php echo $fetch["BW"];?>"
                                          class="form-control">
                                  </td>
                              </tr>

                          </table>
                      </div>

                      <div class="col-sm-5" style=" height:70%; ">
                          <table class="table table-bordered table-striped">
                              <caption>Impression</caption>
                              <tr>
                                  <th>Diagnosis 1</th>
                                  <td>
                                      <input type="text" name="Diagnosis1" value="<?php echo $fetch["Diagnosis1"];?>"
                                          class="form-control" list="list1">
                                      <datalist id="list1">
                                          <?php
                        $sql_command3 = mysqli_query($connection,"select impression from impression");
                        while ($row = mysqli_fetch_assoc($sql_command3)) {
                          ?>
                                          <option value="<?php echo $row["impression"]; ?>"></option>
                                          <?php
                        } ?>
                                      </datalist>
                                  </td>
                              </tr>

                              <tr>
                                  <th>Ph Number</th>
                                  <td>
                                      <input type="text" name="Diagnosis2" value="<?php echo $fetch["Diagnosis2"];?>"
                                          class="form-control">
                                  </td>

                              </tr>

                              <tr>
                                  <th>Refered</th>
                                  <td>
                                      <input type="text" name="Diagnosis3" value="<?php echo $fetch["Diagnosis3"];?>"
                                          class="form-control">
                                  </td>

                              </tr>
                          </table>
                      </div>

                      <div class="col-sm-4" style=" height:70%; ">
                          <table class="table table-bordered table-striped">
                              <caption>Patient BioDate</caption>
                              <tr>
                                  <th>Patient ID</th>
                                  <td>
                                      <input type="text" name="Patientid" readonly
                                          value="<?php echo $fetch["Patientid"];?>" class="form-control">
                                  </td>
                              </tr>

                              <tr>
                                  <th>Name</th>
                                  <td>
                                      <input type="text" name="name" value="<?php echo $fetch["name"];?>"
                                          class="form-control">
                                  </td>
                              </tr>

                              <tr>
                                  <th>Father Name</th>
                                  <td>
                                      <input type="text" name="surname" value="<?php echo $fetch["surname"];?>"
                                          class="form-control">
                                  </td>
                              </tr>

                              <tr>
                                  <th>Age</th>
                                  <td>
                                      <input type="number" name="age" value="<?php echo $fetch["age"];?>"
                                          class="form-control">
                                  </td>
                              </tr>

                              <tr>
                                  <th>Gender</th>
                                  <td>
                                      <select name="gender" class="form-control">
                                          <?php 
                        $genderr =$fetch["gender"];

                        if($genderr=="Male"){
                            echo "<option selected>Male</option>
                            <option>Female</option>
                        ";
                        }
                        else{
                            
                            echo "<option >Male</option>
                            <option selected>Female</option>
                        ";
                        
                        }
                      ?>
                                      </select>
                                  </td>
                              </tr>
                              <tr>
                                  <th>Address</th>
                                  <td>
                                      <input type="text" name="Province" value="<?php echo $fetch["Province"];?>"
                                          class="form-control">
                                  </td>
                              </tr>
                              <tr>
                                  <th>Job</th>
                                  <td>
                                      <input type="text" name="Job" value="<?php echo $fetch["Job"];?>"
                                          class="form-control">
                                  </td>
                              </tr>
                          </table>
                      </div>
                      <button type="submit" name="submit_btn" class="btn btn-primary "
                          style="width:80%; margin-left:10%;">Update</button>
                  </form>

              </div>
          </div>


          <?php
        }
        exit();
        ?>
      </body>

  </html>