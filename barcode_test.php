<?php
  include('database.php');
  session_start();
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
        <title></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex, nofollow">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/dataTables.bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
        <style>
        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
            margin-bottom: 4px;
            border-radius: 0;
        }

        /* Add a gray background color and some padding to the footer */
        footer {
            background-color: #f2f2f2;
            padding: 25px;
        }

        .carousel-inner img {
            width: 100%;
            /* Set width to 100% */
            margin: auto;
            min-height: 200px;
        }

        .navbar-brand {
            padding: 5px 40px;
        }

        .navbar-brand:hover {
            background-color: #ffffff;
        }

        @media print {
            .inv_input {
                margin-top: 1px !important;
                border: none !important;
                height: 20px !important;
                border-radius: 0px !important;

            }

            .inv_input2 {
                border: none !important;
                border-radius: 0px !important;
            }

            .total_input {
                border: none !important;
                background-color: white;
                color: black;

            }

            .print {
                display: none !important;
            }

            .div_print {
                display: none !important;
            }

            .design {
                background-color: red !important;
            }
        }

        /* Hide the carousel text when the screen is less than 600 pixels wide */
        @media (max-width: 600px) {
            .carousel-caption {
                display: none;
            }
        }
        </style>
    </head>

    <body>
        <style>
        .box {
            width: 100%;
            max-width: 1390px;
            border-radius: 5px;
            border: 1px solid #ccc;
            padding: 15px;
            margin: 0 auto;
            margin-top: 50px;
            box-sizing: border-box;
        }

        .inv_input {
            margin-top: 1px;
            border: none;
            height: 20px;
            border-radius: 0px;

        }
        </style>
        <link rel="stylesheet" href="css/datepicker.css">
        <script src="js/bootstrap-datepicker1.js"></script>
        <script>
        $(document).ready(function() {
            $('#order_date').datepicker({
                format: "yyyy-mm-dd",
                autoclose: true
            });
        });
        </script>
        <div class="container-fluid">
            <br>
            <br>
            <div class="div_print">
                <a href="add_item.php"><button class="btn btn-primary btn-xs" style="margin-right:10px;">Add New
                        Item</button></a>
                <a href="manage_item.php"><button class="btn btn-primary btn-xs" style="margin-right:10px;">Added Items
                        (Plus Item)</button></a>
                <a href="item_store_expenses.php"><button class="btn btn-success btn-xs"
                        style="margin-right:10px;">Expenses</button></a>
                <a href="item_store_daily_report.php" class="authority"><button class="btn btn-primary btn-xs"
                        style="margin-right:10px; float:right;">Billans</button></a>
                <a href="item_store_comapanies.php"><button class="btn btn-success btn-xs"
                        style="margin-right:10px; float:right;">Item Store Company</button></a>
            </div>
            <br>
            <br>
            <br>
            <div id="printarea">

                <form method="post" id="form_upload">
                    <table class="table table-bordered" style="width:100%;">
                        <tr>
                            <th colspan="4" style="text-align:center;">
                                <h1>INVOICE</h1>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <img src="image/sony logo.png" style="height:100%; width:100%; margin-top:10%; " alt="">
                            </th>
                            <th>
                                <input type="text" id="From" name="From" placeholder="From"
                                    class="form-control inv_input">
                                <input type="text" id="Number" name="Number" placeholder="Number"
                                    class="form-control inv_input">
                                <input type="text" id="Email" name="Email" placeholder="Email"
                                    class="form-control inv_input">
                                <input type="text" id="Website" name="Website" placeholder="Website"
                                    class="form-control inv_input">
                            </th>
                            <th>
                                <input type="text" id="To" name="To" placeholder="To" class="form-control inv_input">
                                <input type="text" id="To_Number" name="To_Number" placeholder="Number"
                                    class="form-control inv_input">
                                <input type="text" id="To_Email" name="To_Email" placeholder="Email"
                                    class="form-control inv_input">
                                <input type="text" id="To_Website" name="To_Website" placeholder="Website"
                                    class="form-control inv_input">
                            </th>
                            <th>
                                <input type="text" id="Invoice_inp" value="Invoice No:1" placeholder="Invoice"
                                    class="form-control inv_input">
                                <input type="text" id="Date_invoice" name="Date_invoice" placeholder="Date"
                                    value="<?php echo date("m/d/Y"); ?>" class="form-control inv_input">
                                <input type="text" id="payment_cash" name="payment_cash" value="Payment Cash"
                                    placeholder="Payment Cash" class="form-control inv_input">
                            </th>

                        </tr>
                        <tr>
                            <table class="table table-bordered table-striped print">
                                <tr>
                                    <th>
                                        <input type="search" placeholder="Search Barcode Here .. " list="search_list"
                                            class="form-control" style="border:1px solid red;" id="myinput">
                                    </th>
                                </tr>
                            </table>
                            <datalist id="search_list">
                                <?php 
          $sql_command_01 = mysqli_query($connection,"select name from item_store");
          while($row = mysqli_fetch_assoc($sql_command_01)){
        ?>
                                <option value="<?php echo $row["name"]; ?>"><?php echo $row["name"]; ?></option>
                                <?php
          }
        ?>
                            </datalist>
                            <form method="post" id="form_upload">
                                <table id="invoice-item-table" class="table table-bordered">
                                    <tr class="design">
                                        <th>No</th>
                                        <th class="div_print">Barcode</th>
                                        <th>Item Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                        <th class="print">Delete</th>
                                    </tr>
                                    <?php
              if(isset($_POST["btn_submit"])){
              if(count($_POST))
              {
                // $len = count($_POST['barcode']);
                // $check = false;
              	// for ($i=0; $i < $len-1; $i++)
              	// {
                //   $barcode =  $_POST['barcode'][$i];
                //   $item_name = $_POST['item_name'][$i];
                //   $order_item_quantity = $_POST['order_item_quantity'][$i];
                //   $order_item_price = $_POST['order_item_price'][$i];
                //   $order_item_final_amount = $_POST['order_item_final_amount'][$i];
                //     $check = true;
                //   }
                // }
                // if($check == true){
                //     echo "<script>alert('data added successfully');</script>";
				// }
				echo "<script>alert('data added successfully');</script>";
			}
			}

              ?>
                                    <!-- <tr>
                      <td><span id="sr_no">1</span></td>
                      <td><input type="text" name="barcode[]" id="1"  class="form-control input-sm barcode2" /></td>
                      <td><input type="text" name="item_name[]" id="item_name1" class="form-control input-sm" required/></td>
                      <td><input type="text" name="order_item_quantity[]" id="order_item_quantity1" required data-srno="1" class="form-control input-sm order_item_quantity" /></td>
                      <td><input type="text" name="order_item_price[]" id="order_item_price1" required data-srno="1" class="form-control input-sm number_only order_item_price" /></td>
                      <td><input type="text" name="order_item_final_amount[]" id="order_item_final_amount1" data-srno="1" readonly class="form-control input-sm order_item_final_amount" /></td>
                      <td></td>
                    </tr> -->
                                </table>

                                </td>
                        </tr>
                        <tr>
                            <h1 align="left" style="float:left;"><b>Total ( Dollor )</h1>
                            <!-- <span align="right"><input type="text" id="final_total_amt" readonly  class="form-control total_input" style="color:white; width:200px; background-color:green;" /> -->
                            <h1 id="final_total_amt" style="padding:25px; margin-left:400px;"></h1>
                        </tr>

                        <td colspan="2" align="center">
                            <input type="hidden" name="total_item" id="total_item" value="1" />
                        </td>
                        <br>
                        <br>
                        <td colspan="3">
                            <button style=" margin-left:20%;border-radius:2px; width:50%;" type="button"
                                onclick="send_data()" name="btn_submit"
                                class="btn btn-primary btn-lg print">Save</button>
                        </td>
                        <td colspan="3">
                            <button style="border-radius:2px; width:10%; margin-left:2%;" type="button"
                                onclick="window.print()"
                                class="btn btn-success btn-lg glyphicon glyphicon-print print"></button>
                        </td>
                    </table>
                    </tr>
                    <!-- end -->
                    </table>
                </form>
            </div>
            <br>

            <script type="text/javascript">
            function print_div(divname) {

                var printContent = document.getElementById(divname).innerHTML;
                var orginalContent = document.body.innerHTML;
                document.body.innerHTML = printContent;
                window.print();
                document.body.innerHTML = orginalContent;

            }
            </script>
            <script>
            $(document).ready(function() {
                var final_total_amt = $('#final_total_amt').text();
                var count = 0;

                // $(document).on('search', '#myinput', function(){
                //   alert($("#myinput").val());
                //   count++;
                //   $('#total_item').val(count);
                //   var html_code = '';
                //   html_code += '<tr id="row_id_'+count+'">';
                //   html_code += '<td><span id="sr_no">'+count+'</span></td>';
                //   html_code += '<td><input type="text" name="barcode[]" id="'+count+'" class="form-control input-sm barcode2" /></td>';
                //   html_code += '<td><input type="text" name="item_name[]" id="item_name'+count+'" class="form-control input-sm" /></td>';
                //   html_code += '<td><input type="text" name="order_item_quantity[]" id="order_item_quantity'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_quantity" /></td>';
                //   html_code += '<td><input type="text" name="order_item_price[]" id="order_item_price'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_price" /></td>';
                //   html_code += '<td><input type="text" name="order_item_final_amount[]" id="order_item_final_amount'+count+'" data-srno="'+count+'" readonly class="form-control input-sm order_item_final_amount" /></td>';
                //   html_code += '<td><button type="button" name="remove_row" id="'+count+'" class="btn btn-danger btn-xs remove_row">X</button></td>';
                //   html_code += '</tr>';
                //   $('#invoice-item-table').append(html_code);
                //   $("#myinput").val("");
                // });
                //
                $(document).on('search', '#myinput', function() {
                    var row_id = $(this).attr("id");
                    var barcode = $("#myinput").val();
                    var total_item_amount = $('#order_item_quantity' + row_id).val();
                    var ajax;
                    if (window.XMLHttpRequest) {
                        ajax = new XMLHttpRequest();
                    } else {
                        ajax = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    ajax.open("GET", "server.php?barcode=" + barcode);
                    ajax.send();
                    ajax.onreadystatechange = function() {
                        if (ajax.status == 200 && ajax.readyState == 4) {
                            var response = ajax.responseText.trim().split(",");
                            // $('#item_name'+row_id).val(response[0]);
                            // $('#order_item_price'+row_id).val(response[1]);

                            count++;
                            $('#total_item').val(count);
                            var html_code = '';
                            var quantity_01 = 1;
                            html_code += '<tr id="row_id_' + count + '">';
                            html_code += '<td><span id="sr_no">' + count + '</span></td>';
                            html_code +=
                                '<td class="div_print"><input type="text" name="barcode[]" readonly id="' +
                                count + '" value="' + response[0] +
                                '" class="form-control input-sm barcode2 inv_input2 " /></td>';
                            html_code +=
                                '<td><input type="text" name="item_name[]" readonly id="item_name' +
                                count + '" value="' + response[1] +
                                '" class="form-control input-sm inv_input2" /></td>';
                            html_code +=
                                '<td><input type="text" name="order_item_quantity[]" id="order_item_quantity' +
                                count + '" value="' + quantity_01 + '" data-srno="' + count +
                                '" class="form-control input-sm inv_input2 number_only order_item_quantity" /></td>';
                            html_code +=
                                '<td><input type="text" name="order_item_price[]" id="order_item_price' +
                                count + '" value="' + response[2] + '" data-srno="' + count +
                                '" class="form-control input-sm inv_input2 number_only order_item_price" /></td>';
                            html_code +=
                                '<td><input type="text" name="order_item_final_amount[]" id="order_item_final_amount' +
                                count + '" value="' + (response[2] * quantity_01) +
                                '" data-srno="' + count +
                                '" readonly class="form-control inv_input2 input-sm order_item_final_amount" /></td>';
                            html_code +=
                                '<td class="print"><button type="button" name="remove_row" id="' +
                                count +
                                '" class="btn btn-danger btn-xs remove_row">X</button></td>';
                            html_code += '</tr>';
                            $('#invoice-item-table').append(html_code);
                            $("#myinput").val("");
                            cal_final_total(count);
                        }
                    }
                });
                //

                $(document).on('click', '.remove_row', function() {
                    var row_id = $(this).attr("id");
                    var total_item_amount = $('#order_item_final_amount' + row_id).val();
                    var final_amount = $('#final_total_amt').text();
                    var result_amount = parseFloat(final_amount) - parseFloat(total_item_amount);
                    $('#final_total_amt').text(result_amount.toFixed(0));
                    $('#row_id_' + row_id).remove();

                    $('#total_item').val(count);
                });

                function cal_final_total(count) {
                    var total_amount = 0;
                    for (var x = 1; x <= count; x++) {
                        var order_item_quantity = $("#order_item_quantity" + x).val();
                        if (order_item_quantity > 0) {
                            var order_item_price = $("#order_item_price" + x).val();
                            var actual_amount = parseFloat(order_item_quantity) * parseFloat(order_item_price);
                            $("#order_item_final_amount" + x).val(actual_amount);
                            var total_amount = parseFloat(total_amount) + parseFloat(actual_amount);
                            $("#final_total_amt").text(total_amount.toFixed(0));
                        }


                    }
                }

                $(document).on('keyup', '.order_item_price', function() {
                    cal_final_total(count);
                });

                $(document).on('keyup', '.order_item_quantity', function() {
                    cal_final_total(count);
                });


                $('#create_invoice').click(function() {
                    if ($.trim($('#order_receiver_name').val()).length == 0) {
                        alert("Please Enter Reciever Name");
                        return false;
                    }

                    if ($.trim($('#order_no').val()).length == 0) {
                        alert("Please Enter Invoice Number");
                        return false;
                    }

                    //   if($.trim($('#order_date').val()).length == 0)
                    //   {
                    //     alert("Please Select Invoice Date");
                    //     return false;
                    //   }

                    for (var no = 1; no <= count; no++) {
                        if ($.trim($('#item_name' + no).val()).length == 0) {
                            alert("Please Enter Item Name");
                            $('#item_name' + no).focus();
                            return false;
                        }

                        if ($.trim($('#order_item_quantity' + no).val()).length == 0) {
                            alert("Please Enter Quantity");
                            $('#order_item_quantity' + no).focus();
                            return false;
                        }

                        if ($.trim($('#order_item_price' + no).val()).length == 0) {
                            alert("Please Enter Price");
                            $('#order_item_price' + no).focus();
                            return false;
                        }

                    }

                    $('#invoice_form').submit();

                });

            });
            </script>

            <script>
            $(document).ready(function() {
                $('#order_no').val("<?php echo $row["order_no"]; ?>");
                $('#order_date').val("<?php echo $row["order_date"]; ?>");
                $('#order_receiver_name').val("<?php echo $row["order_receiver_name"]; ?>");
                $('#order_receiver_address').val("<?php echo $row["order_receiver_address"]; ?>");
            });
            </script>
            <script>
            // $(document).ready(function(){
            //   var final_total_amt = $('#final_total_amt').text();
            //   var count = "<?php echo $m; ?>";

            //   $(document).on('click', '#add_row', function(){
            //     count++;
            //     $('#total_item').val(count);
            //     var html_code = '';
            //     html_code += '<tr id="row_id_'+count+'">';
            //     html_code += '<td><span id="sr_no">'+count+'</span></td>';

            //     html_code += '<td><input type="text" name="item_name[]" id="item_name'+count+'" class="form-control input-sm" /></td>';

            //     html_code += '<td><input type="text" name="order_item_quantity[]" id="order_item_quantity'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_quantity" /></td>';
            //     html_code += '<td><input type="text" name="order_item_price[]" id="order_item_price'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_price" /></td>';
            //     html_code += '<td><input type="text" name="order_item_actual_amount[]" id="order_item_actual_amount'+count+'" data-srno="'+count+'" class="form-control input-sm order_item_actual_amount" readonly /></td>';

            //     html_code += '<td><input type="text" name="order_item_tax1_rate[]" id="order_item_tax1_rate'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_tax1_rate" /></td>';
            //     html_code += '<td><input type="text" name="order_item_tax1_amount[]" id="order_item_tax1_amount'+count+'" data-srno="'+count+'" readonly class="form-control input-sm order_item_tax1_amount" /></td>';
            //     html_code += '<td><input type="text" name="order_item_tax2_rate[]" id="order_item_tax2_rate'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_tax2_rate" /></td>';
            //     html_code += '<td><input type="text" name="order_item_tax2_amount[]" id="order_item_tax2_amount'+count+'" data-srno="'+count+'" readonly class="form-control input-sm order_item_tax2_amount" /></td>';
            //     html_code += '<td><input type="text" name="order_item_tax3_rate[]" id="order_item_tax3_rate'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_tax3_rate" /></td>';
            //     html_code += '<td><input type="text" name="order_item_tax3_amount[]" id="order_item_tax3_amount'+count+'" data-srno="'+count+'" readonly class="form-control input-sm order_item_tax3_amount" /></td>';
            //     html_code += '<td><input type="text" name="order_item_final_amount[]" id="order_item_final_amount'+count+'" data-srno="'+count+'" readonly class="form-control input-sm order_item_final_amount" /></td>';
            //     html_code += '<td><button type="button" name="remove_row" id="'+count+'" class="btn btn-danger btn-xs remove_row">X</button></td>';
            //     html_code += '</tr>';
            //     $('#invoice-item-table').append(html_code);
            //   }); -->

            $(document).on('click', '.remove_row', function() {
                var row_id = $(this).attr("id");
                alert(row_id);
                var total_item_amount = $('#order_item_final_amount' + row_id).val();
                var final_amount = $('#final_total_amt').text();
                var result_amount = parseFloat(final_amount) - parseFloat(total_item_amount);
                $('#final_total_amt').text(result_amount);
                $('#row_id_' + row_id).remove();
                count--;
                $('#total_item').val(count);
            });

            function cal_final_total(count) {

                for (j = 1; j <= count; j++) {
                    var quantity = 0;
                    var price = 0;
                    var actual_amount = 0;
                    var tax1_rate = 0;
                    var tax1_amount = 0;
                    var tax2_rate = 0;
                    var tax2_amount = 0;
                    var tax3_rate = 0;
                    var tax3_amount = 0;
                    var item_total = 0;
                    var final_item_total = 0;
                    quantity = $('#order_item_quantity' + j).val();
                    if (quantity > 0) {
                        price = $('#order_item_price' + j).val();
                        if (price > 0) {
                            actual_amount = parseFloat(quantity) * parseFloat(price);
                            $('#order_item_actual_amount' + j).val(actual_amount);
                            tax1_rate = $('#order_item_tax1_rate' + j).val();
                            if (tax1_rate > 0) {
                                tax1_amount = parseFloat(actual_amount) * parseFloat(tax1_rate) / 100;
                                $('#order_item_tax1_amount' + j).val(tax1_amount);
                            }
                            tax2_rate = $('#order_item_tax2_rate' + j).val();
                            if (tax2_rate > 0) {
                                tax2_amount = parseFloat(actual_amount) * parseFloat(tax2_rate) / 100;
                                $('#order_item_tax2_amount' + j).val(tax2_amount);
                            }
                            tax3_rate = $('#order_item_tax3_rate' + j).val();
                            if (tax3_rate > 0) {
                                tax3_amount = parseFloat(actual_amount) * parseFloat(tax3_rate) / 100;
                                $('#order_item_tax3_amount' + j).val(tax3_amount);
                            }
                            item_total = parseFloat(actual_amount) + parseFloat(tax1_amount) + parseFloat(tax2_amount) +
                                parseFloat(tax3_amount);
                            final_item_total = parseFloat(final_item_total) + parseFloat(item_total);
                            $('#order_item_final_amount' + j).val(item_total);
                        }
                    }
                }
                $('#final_total_amt').text(final_item_total);
            }


            $('#create_invoice').click(function() {
            if ($.trim($('#order_receiver_name').val()).length == 0) {
                alert("Please Enter Reciever Name");
                return false;
            }

            if ($.trim($('#order_no').val()).length == 0) {
                alert("Please Enter Invoice Number");
                return false;
            }

            if ($.trim($('#order_date').val()).length == 0) {
                alert("Please Select Invoice Date");
                return false;
            }

            for (var no = 1; no <= count; no++) {
                if ($.trim($('#item_name' + no).val()).length == 0) {
                    alert("Please Enter Item Name");
                    $('#item_name' + no).focus();
                    return false;
                }

                if ($.trim($('#order_item_quantity' + no).val()).length == 0) {
                    alert("Please Enter Quantity");
                    $('#order_item_quantity' + no).focus();
                    return false;
                }

                if ($.trim($('#order_item_price' + no).val()).length == 0) {
                    alert("Please Enter Price");
                    $('#order_item_price' + no).focus();
                    return false;
                }

            }

            $('#invoice_form').submit();

            });

            });
            </script>


        </div>

    </body>

</html>
<script type="text/javascript">
$(document).ready(function() {
    var table = $('#data-table').DataTable({
        "order": [],
        "columnDefs": [{
            "targets": [4, 5, 6],
            "orderable": false,
        }, ],
        "pageLength": 25
    });
    $(document).on('click', '.delete', function() {
        var id = $(this).attr("id");
        if (confirm("Are you sure you want to remove this?")) {
            window.location.href = "invoice.php?delete=1&id=" + id;
        } else {
            return false;
        }
    });
});
</script>

<script>
$(document).ready(function() {
    $('.number_only').keypress(function(e) {
        return isNumbers(e, this);
    });

    function isNumbers(evt, element) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (
            (charCode != 46 || $(element).val().indexOf('.') != -1) && // “.” CHECK DOT, AND ONLY ONE.
            (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
});
</script>
<script>
$("#From").val(localStorage.getItem(1));
$("#Number").val(localStorage.getItem(2));
$("#Email").val(localStorage.getItem(3));
$("#Website").val(localStorage.getItem(4));

$("#Invoice_inp").val(localStorage.getItem(5));
$("#payment_cash").val(localStorage.getItem(6));

function send_data() {
    var check = window.confirm("Data will store to DB  for accept press ok for reject press cancel");
    if (check == true) {

        var barcode_arr = [];
        var item_name_arr = [];
        var order_item_quantity_arr = [];
        var order_item_price_arr = [];
        var count2 = 1;
        var barcode, item_name, order_item_quantity, order_item_price;
        var From = $("#From").val() + "," + $("#Number").val() + "," + $("#Email").val() + "," + $("#Website").val();
        var To = $("#To").val() + "," + $("#To_Number").val() + "," + $("#To_Email").val() + "," + $("#To_Website")
            .val();
        var Invoice_Detail = $("#Invoice_inp").val() + "," + $("#Date_invoice").val() +
            "," +
            $("#payment_cash").val();

        localStorage.setItem(1, $("#From").val());
        localStorage.setItem(2, $("#Number").val());
        localStorage.setItem(3, $("#Email").val());
        localStorage.setItem(4, $("#Website").val());

        localStorage.setItem(5, $("#Invoice_inp").val());
        // localStorage.setItem(6, $("#Date_invoice").val());
        localStorage.setItem(6, $("#payment_cash").val());


        $("#From").val(localStorage.getItem(1));
        $("#Number").val(localStorage.getItem(2));
        $("#Email").val(localStorage.getItem(3));
        $("#Website").val(localStorage.getItem(4));

        $("#Invoice_inp").val(localStorage.getItem(5));
        $("#payment_cash").val(localStorage.getItem(6));

        while (count2 < 20) {
            barcode = $("#" + count2).val();
            item_name = $("#item_name" + count2).val();
            order_item_quantity = $("#order_item_quantity" + count2).val();
            order_item_price = $("#order_item_price" + count2).val();
            if (barcode == "") {
                count2 = 30;
            } else {
                barcode_arr.push(barcode);
                item_name_arr.push(item_name);
                order_item_quantity_arr.push(order_item_quantity);
                order_item_price_arr.push(order_item_price);
                count2++;
            }
        }
        var barcode_str = barcode_arr.join("*");
        var item_name_str = item_name_arr.join("*");
        var order_item_quantity_str = order_item_quantity_arr.join("*");
        var order_item_price_str = order_item_price_arr.join("*");
        // self company info




        var ajax;
        if (window.XMLHttpRequest) {
            ajax = new XMLHttpRequest();
        } else {
            ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }
        ajax.open("GET", "server.php?barcode_loop=" + barcode_str + "&item_name=" + item_name_str +
            "&order_item_quantity=" + order_item_quantity_str + "&order_item_price=" + order_item_price_str +
            "&From=" + From + "&To=" + To + "&Invoice_detail=" + Invoice_Detail);
        ajax.send();
        ajax.onreadystatechange = function() {
            if (ajax.status == 200 && ajax.readyState == 4) {
                var response2 = ajax.responseText.trim();
                alert(response2);
            }
        }

    } else {

    }

}
count_inv++;
</script>