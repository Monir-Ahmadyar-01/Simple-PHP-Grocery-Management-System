<?php 
        include_once("database.php");
        include_once("jdf");
    // part fetch item for print noska
    if(isset($_POST["id"])){
        
        $new_pass = $_POST["new_pass"];
        $id = $_POST["id"];
        $db_pass = mysqli_query($connection,"select password from users where id='$id'");
        $fetch_id_db = mysqli_fetch_assoc($db_pass);
        if($fetch_id_db["password"] == $new_pass){
            $query = mysqli_query($connection,"update users set password='$new_pass' where id='$id'");
            if($query){
                echo "success";
            }
            else{
                echo "failed";
            }

        }
     
        exit();
    }
?>
<?php 
        include_once("database.php");
    // part fetch item for print noska
    if(isset($_GET["item_name"])){
        $item_name = $_GET["item_name"];
        $sql_command = mysqli_query($connection , "select * from item_store where name='$item_name'");
        
        while($fetch = mysqli_fetch_assoc($sql_command)){
            echo "<option>".$fetch["detail"]."</option>";
        }
        exit();
    }
?>
<?php
    // part register item
            if (isset($_GET["item_name2"])) {
              $name_item = $_GET["item_name2"];
              $mg_item = $_GET["detail"];
              $mount = $_GET["mount"];
              $sell_price = $_GET["sell_price"];
              $date = $_GET["date"];

              $sqlcommand5 = mysqli_query($connection , "INSERT INTO `item_store` (`id`, `name`, `detail`, `mount`, `sell_price`, `date`)
               VALUES (NULL, '$name_item', '$mg_item', '$mount', '$sell_price','$date')");
               
               if($sqlcommand5){
                   sleep(1);
                   $sqlcommand_s = mysqli_query($connection , "INSERT INTO `plus_items` (`id`, `name`, `detail`, `mount`, `sell_price`, `exp_date`)
               VALUES (NULL, '$name_item', '$mg_item', '$mount', '$sell_price','$date')");
                   echo "success";
               }
               else{
                   echo "failed";
               }
               exit();
            }
?>
<?php 
// part insert impressions
        if (isset($_GET["Impression"])) {
                $impression = $_GET["Impression"];
                $sql_command2 = mysqli_query($connection,"INSERT INTO `impression` (`id`, `impression`) VALUES (NULL, '$impression')");
            if($sql_command2){
                   sleep(1);
                   echo "success";
               }
               else{
                   echo "failed";
               }
               exit();
            }
            
            
            ?>

<?php 
// part insert Repository
        if (isset($_POST["item_name"])) {
                $item_name = $_POST["item_name"];
                $description = $_POST["description"];
                $mount = $_POST["mount"];
                $price = $_POST["price"];
                $date = $_POST["date"];
                $sql_command33 = mysqli_query($connection,"INSERT INTO `repository` (`id`, `item_name`, `description`, `mount`, `price`, `date`) 
                VALUES (NULL, '$item_name', '$description', '$mount', '$price', '$date')");
            if($sql_command33){
                   sleep(1);
                   echo "success";
               }
               else{
                   echo "failed";
               }
               exit();
            }
            
            
            ?>
<?php
            // part insert Expense
                if (isset($_POST["code"])) {
                        $code = $_POST["code"];
                        $description = $_POST["description"];
                        $mount = $_POST["mount"];
                        $price = $_POST["price"];
                        $date = $_POST["date"];
                        $sql_command29 = mysqli_query($connection,"INSERT INTO `expense` (`id`, `code`, `description`, `price1`, `mount`, `date`)
                        VALUES (NULL, '$code', '$description', '$price', '$mount', '$date')");
                    if($sql_command29){
                        sleep(1);
                        echo "success";
                    }
                    else{
                        echo "failed";
                    }
                    exit();
                }
                // part insert item Store Expenses
                if (isset($_POST["code_item_expense"])) {
                        $code_item_expense = $_POST["code_item_expense"];
                        $description = $_POST["description"];
                        $mount = $_POST["mount"];
                        $price = $_POST["price"];
                        $date = $_POST["date"];
                        $sql_command29 = mysqli_query($connection,"INSERT INTO `item_expenses` (`id`, `code`, `description`, `amount`, `price1`, `date_sh`)
                         VALUES (NULL, '$code_item_expense', '$description', '$mount', '$price', '$date')");
                    if($sql_command29){
                        sleep(1);
                        echo "success";
                    }
                    else{
                        echo "failed";
                    }
                    exit();
                    }
            ?>
<?php 
        // part insert Repository
        if (isset($_POST["item_names"])) {
                $person_name = $_POST["person_name"];
                $item_names = $_POST["item_names"];
                $mount = $_POST["mount"];
                $price = $_POST["price"];
                $date = $_POST["date"];
                $sql_command34 = mysqli_query($connection,"INSERT INTO `item_store` (`id`,`person_name`, `item_name`, `mount`, `price`, `date`)
                 VALUES (NULL, '$person_name','$item_names', '$mount', '$price', '$date')");
                $sql_command11 = mysqli_query($connection,"select mount  from repository where item_name='$item_names'");
                $update_mount;
                while($row = mysqli_fetch_assoc($sql_command11)){
                   
                    
                    $update_mount = $row["mount"]-$mount;
                }
                
                
                 $sql_command35 = mysqli_query($connection,"update repository set mount='$update_mount' where item_name='$item_names'");
            if($sql_command34 && $sql_command35){
                   sleep(1);
                   echo "success";
               }
               else{
                   echo "failed";
               }
               exit();
            }
            
            
            ?>

<?php
//  part insert print page
              if(isset($_POST["submit1"])){
              if(count($_POST))
              {
                $name = $_POST["c_name"];
                $date = $_POST["date"];
                
                $len = count($_POST['linkurl']);
                $check = false;
              	for ($i=0; $i < $len-1; $i++)
              	{
                  $rx =  $_POST['linkurl'][$i];
                  $naw = $_POST['naw'][$i];
                  $x1 = $_POST['x1'][$i];
                  $x2 = $_POST['x2'][$i];
                  $xx = $x1." x ".$x2;
                  $n = $_POST['n'][$i];
                  $ghiza = null;
                  if(!empty($_POST['ghiza'][$i])){
                    $ghiza = $_POST['ghiza'][$i];
                  }
                  else{
                    $ghiza = "wasat";
                  }
                  

                  $badi_ghiza = null;
                  $sql_query7 = mysqli_query($connection,"INSERT INTO `customer_noskha` (`id`, `name`, `rx`, `naw`, 
                  `time`, `n`, `ghiza`, `date`)
                   VALUES (NULL, '$name', '$rx','$naw','$xx','$n','$ghiza', '$date')");
                   if($sql_query7){
                    $check = true;
                  }
                }
                if($check == true){
                    echo "success";
                }
                else{
                    echo "failed";
                }
              }
            }
              ?>
<?php
            // insert new user
            if(isset($_POST["name"])){
            $sourcePath = $_FILES['file']['tmp_name'];
            $name = $_POST["name"];
            $lastname = $_POST["lastname"];
            $username = $_POST["username"];
            $password = base64_encode($_POST["password"]);
            $authority = $_POST["authority"];
            $user_image=$_FILES['file']['name'];
            $targetPath = "image/".$_FILES['file']['name'];
            move_uploaded_file($sourcePath,$targetPath);
             $sql_command2 = mysqli_query($connection,"INSERT INTO `users` (`id`, `username`, `password`, `name`,
                  `lastname`, `authority`,
                 `image`) VALUES (NULL, '$username', '$password', '$name', '$lastname', '$authority', '$user_image')");
           if($sql_command2){
                   sleep(2);
                   echo "success";
               }
               else{
                   echo "failed";
               }
             
            exit();
        }

        
            ?>
<?php
            // insert new stuff
            if(isset($_POST["name_s"])){
            $sourcePath = $_FILES['file']['tmp_name'];
            $name_s = $_POST["name_s"];
            $lastname_s = $_POST["lastname_s"];
            $fathername_s = $_POST["fathername_s"];
            $work_area_s = $_POST["work_area_s"];
            $email_s = $_POST["email_s"];
            $ph_number_s = $_POST["ph_number_s"];
            $date_s = $_POST["date_s"];
            $id_number_s = $_POST["id_number_s"];
            $home_add_s = $_POST["home_add_s"];
            $stuff_image=$_FILES['file']['name'];
            $targetPath = "image/".$_FILES['file']['name'];
            move_uploaded_file($sourcePath,$targetPath);
             $sql_command2 = mysqli_query($connection,"INSERT INTO `stuff` (`id`, `name`, `lastname`, `fathername`, `work_area_s`, 
             `email_s`, `ph_number_s`,
              `date_s`, `id_number_s`, `home_add_s`, `stuff_image`) VALUES (NULL, 
              '$name_s', '$lastname_s', '$fathername_s', '$work_area_s', '$email_s', '$ph_number_s', '$date_s', '$id_number_s', '$home_add_s', '$stuff_image')");
           if($sql_command2){
                   sleep(2);
                   echo "success";
               }
               else{
                   echo "failed";
               }
             
            exit();
        }

        
            ?>

<?php 
                // change password
         if(isset($_POST["pre_password"])){
            
            $username = $_POST["username"];
            $pre_password = $_POST["pre_password"];            
            $new_password = $_POST["new_password"];            
            $sql_command2 = mysqli_query($connection ,"select username,password from users");
            $status = false;
            while($row = mysqli_fetch_assoc($sql_command2)){
                if($username == $row["username"] && $pre_password == $row["password"]){
                    $status = true;
                }
            }
            if($status == true){
                    $sql_command3 = mysqli_query($connection,"update users set password='$new_password' where username='$username' and password='$pre_password'");
                if($sql_command3 == 1){
                        sleep(2);
                        echo "success";
                    }
                    else{
                        echo "failed";
                    }
                }
                else{
                    echo "failed";
                } 
            exit();
        }
            
            
            ?>
<?php
            // part insert patient data
                if (isset($_GET["Patientid"])) {
                    include_once("jdf.php");
                  $v1 ="  cycle/minute";
                  $v2 ="  bite/minute";
                  $v3 ="  C";
                  $v4 ="  kg";
                  $date = jdate("Y/n/j");
                  $data  = array( $_GET["Patientid"],$_GET["name"],$_GET["surname"]
                  ,$_GET["age"],$_GET["gender"],$_GET["Province"],$_GET["Job"],
                  $_GET["Diagnosis1"],$_GET["Diagnosis2"],$_GET["Diagnosis3"],$_GET["BP"]." mmhg",
                  $_GET["HR"].$v1 ,$_GET["PR"].$v2 ,$_GET["RR"].$v1,$_GET["BT"].$v3,$_GET["BW"].$v4);
                  $fees = $_GET["fees"];

                  $time =date('h:i:s a', strtotime($_GET["time"]));
                  $payed_fees = $_GET["payed_fees"];
                    $sqlcommand4 = mysqli_query($connection , "INSERT INTO `castomer` (`id`, `Patientid`,
                       `name`, `surname`, `age`, `gender`, `Province`, `Job`, `Diagnosis1`,
                        `Diagnosis2`,
                        `Diagnosis3`, `BP`, `HR`, `PR`, `RR`, `BT`,
                     `BW`,`fees`,`date`,`Time`,`prepaid_fees`) VALUES (NULL, '$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]',
                        '$data[5]', '$data[6]', '$data[7]', '$data[8]',
                       '$data[9]', '$data[10]', '$data[11]', '$data[12]', '$data[13]', '$data[14]', '$data[15]','$fees','$date','$time','$payed_fees')");
                       if($sqlcommand4){
                            sleep(1);
                            $date_add = jdate("Y/n/j");
                            $sql_command_add = mysqli_query($connection,"INSERT INTO `qist` (`id`, `patient_id`, `name`, `surname`, `age`, `fees`, `added_fees`, `date`) VALUES
                             (NULL, '$data[0]', '$data[1]', '$data[2]', '$data[3]', '$fees', '$payed_fees', '$date_add')");
                            echo "success";
                        }
                        else{
                            echo "failed";
                        }
                       exit();
                }

             ?>