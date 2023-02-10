<?php
    include("database.php"); 
    include("jdf.php"); 
    if(isset($_GET["barcode"])){
        $barcode = $_GET["barcode"];
        $sql_query_01 = mysqli_query($connection,"select * from item_store where barcode='$barcode' or name='$barcode'");
        $fetch_01 = mysqli_fetch_assoc($sql_query_01);
        echo $fetch_01["barcode"].",".$fetch_01["name"].",".$fetch_01["sell_price"];
        exit();
    }
    // daily_report check_id
    if(isset($_GET["checkid"])){
        $checkid = $_GET["checkid"];
        $sql_query_02 = mysqli_query($connection,"update item_expenses set status='true' where id='$checkid'");
        exit();
    }
    // daily_report delete_id
    if(isset($_GET["delete_id"])){
        $delete_id = $_GET["delete_id"];
        $sql_query_02 = mysqli_query($connection,"delete from item_expenses where id='$delete_id'");
        exit();
    }
   
    // for saving data
    if(isset($_GET["barcode_loop"])){
        $From = $_GET["From"];
        $To = $_GET["To"];
        $Invoice_detail = $_GET["Invoice_detail"];
        $barcode_loop = $_GET["barcode_loop"];
        $item_name = $_GET["item_name"];
        $order_item_quantity = $_GET["order_item_quantity"];
        $order_item_price = $_GET["order_item_price"];
        $date_sh = jdate("d/m/Y","","","Asia/kabul","en");
        $barcode_loop_arr=explode("*",$barcode_loop); 
        $item_name_arr=explode("*",$item_name); 
        $order_item_quantity_arr=explode("*",$order_item_quantity); 
        $order_item_price_arr=explode("*",$order_item_price); 
        
        $barcode_loop_arr_length = count($barcode_loop_arr);
        
        $count = 0;
        $check = 1;
        while($count<$barcode_loop_arr_length){
            if(empty($barcode_loop_arr[$count])){
                
            }
            else{
                $sql_query_02 = mysqli_query($connection,"INSERT INTO `stored_item` (`id`,`from_detail`,`to_detail`,`invoice_detail`,`barcode`, `item_name`,`mount`, `sell_price`, `date`)
                 VALUES (NULL,'$From','$To','$Invoice_detail','$barcode_loop_arr[$count]', '$item_name_arr[$count]', '$order_item_quantity_arr[$count]', '$order_item_price_arr[$count]','$date_sh')");
                $sql_query_03 = mysqli_query($connection,"select mount from item_store where barcode='$barcode_loop_arr[$count]'");
                $fetch_03 = mysqli_fetch_assoc($sql_query_03);
                $g_mount = $fetch_03["mount"];
                $s_mount = $order_item_quantity_arr[$count];
                $up_mount = $g_mount - $s_mount ;
                $sql_query_04 = mysqli_query($connection,"update item_store set mount='$up_mount' where barcode='$barcode_loop_arr[$count]'");
                $check = 2;
            }
            $count++;
        }
        if($check == 2){
            echo "Item selled Successfully";
        };
       
        
        exit();
    }
?>