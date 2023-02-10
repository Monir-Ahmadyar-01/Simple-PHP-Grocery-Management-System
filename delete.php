<?php 
    include_once("expp.php");
    include_once("database.php");
?>
<?php 
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $sql_query = mysqli_query($connection , "delete from impression where id='$id'");
        if($sql_query){
            header("location:manage_impression.php");
        }
        else{
            header("location:manage_impression.php");
        }
        exit();
    }

?>
<!-- part delete company -->
<?php 
    if(isset($_GET["id_company"])){
        $id = $_GET["id_company"];
        $sql_query = mysqli_query($connection , "delete from new_company where id='$id'");
        if($sql_query){
            header("location:new_company.php");
        }
        else{
            header("location:new_company.php");
        }
        exit();
    }

?>
<!-- part delete company account -->
<?php 
    if(isset($_GET["id_c_account"])){
        $id = $_GET["id_c_account"];
        $sql_query_02 = mysqli_query($connection,"select company_name from company_account where id='$id'");
        $fetch_02 = mysqli_fetch_assoc($sql_query_02);
        $company_name = $fetch_02["company_name"];
        $sql_query = mysqli_query($connection , "delete from company_account where id='$id'");
        if($sql_query){
            // echo '<script>window.open("company_account.php?company_name="+'.$company_name.',"_self");</script>';
            header("location:company_account.php?company_name=$company_name");
        }
        else{
            header("location:company_account.php?company_name=$company_name");
        }
        exit();
    }

?>
<!-- part Delete item_store -->
<?php 
    if(isset($_GET["id_d"])){
        $id = $_GET["id_d"];
        $sql_query = mysqli_query($connection , "delete from item_store where id='$id'");
        if($sql_query){
            header("location:manage_item.php");
        }
       
        exit();
    }

?>
<!-- part Delete Godam Item -->
<?php 
    if(isset($_GET["id_g_i"])){
        $id = $_GET["id_g_i"];
        $sql_query2 = mysqli_query($connection , "delete from repository where id='$id'");
        if($sql_query2){
            header("location:godam_items.php");
        }
       
        exit();
    }

?>
<!-- part Delete Added Expenses -->
<?php 
    if(isset($_GET["id_added_item_store"])){
        $id = $_GET["id_added_item_store"];
        $sql_query2 = mysqli_query($connection , "delete from item_expenses where id='$id'");
        if($sql_query2){
            header("location:item_store_added_expenses.php");
        }
       
        exit();
    }

?>
<!-- part Delete sell Godam Item -->
<?php 
    if(isset($_GET["id_s_i"])){
        $id = $_GET["id_s_i"];
        $sql_query2 = mysqli_query($connection , "delete from item_store where id='$id'");
        if($sql_query2){
            header("location:selled_items.php");
        }
       
        exit();
    }

?>
<!-- part delete tmp_table data  -->
tmp_table_id
<?php 
    if(isset($_GET["tmp_table_id"])){
        $id = $_GET["tmp_table_id"];
        $sql_query2 = mysqli_query($connection , "delete from tmp_table where id='$id'");
        if($sql_query2){
            header("location:barcode_test.php");
        }
       
        exit();
    }

?>
<!-- part Delete Expenses -->
<?php 
    if(isset($_GET["id_exp"])){
        $id = $_GET["id_exp"];
        $sql_query2 = mysqli_query($connection , "delete from expense where id='$id'");
        if($sql_query2){
            header("location:added_expenses.php");
        }
       
        exit();
    }

?>

<!-- part Delete stuff -->
<?php 
    if(isset($_GET["id_s"])){
        $id = $_GET["id_s"];
        $sql_query = mysqli_query($connection , "delete from stuff where id='$id'");
        if($sql_query){
            header("location:manage_stuff.php");
        }
        
        exit();
    }

?>
<!-- part delete page manage-customers -->
<?php 
    if(isset($_GET["id_c"])){
        $id = $_GET["id_c"];
        $sql_query = mysqli_query($connection , "delete from castomer where id='$id'");
        if($sql_query){
            header("location:manage_customers.php");
        }
        else{
            echo "cant delete";
        }
        exit();
    }

?>