<?php
include_once("expp.php");
session_start();
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
<html>

    <head>
        <title>Login page</title>
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

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link type="text/css" rel="stylesheet" href="css/bootstrap.css">
        <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <script type="text/javascript" src="js/datepicker.js">
        </script>
        <link rel="stylesheet" href="css/datepicker.css">
        <style>
        table,
        td,
        tr,
        th {
            text-align: center;
            font-family: arial;
        }

        tr:hover {
            background-color: #d4e9f7;
            cursor: pointer;
        }

        .tr th {
            position: sticky !important;
            top: 0px !important;
            background-color: #144b6f;
        }
        </style>
    </head>

    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-7">
                    <table class="table  table-stripped" style="text-align:center !important;">


                        <tr>
                            <th><input type="search" class="form-control" id="myInput" placeholder="Search"></th>


                        </tr>


                    </table>

                </div>
                <div class="col-sm-12">
                    <table class="table table-bordered table-stripped" style="text-align:center !important;">
                        <thead>
                            <tr class="tr" style="background-color:#144b6f;color:white;">
                                <th>#No</th>
                                <th>Barcode</th>
                                <th>Name</th>
                                <th>Mount</th>
                                <th>Buy Price</th>
                                <th>Sell Price</th>
                                <th>Date</th>
                                <th title="Edit or Delete">E or D</th>
                            </tr>
                        </thead>
                        <script>
                        function edit(id) {
                            var idd = id;
                            window.open("edit.php?id_d=" + idd, "_self");

                        }

                        function delet(id) {
                            var confirm = window.confirm("Are You sure You want To delete");
                            if (confirm == true) {
                                window.open("delete.php?id_d=" + id, "_self");
                            } else {

                            }
                        }
                        </script>
                        <tbody id="myTable">
                            <?php 
                            $count = 1;
                            $sql_query1 = mysqli_query($connection , "select * from item_store");
                            while($row = mysqli_fetch_assoc($sql_query1)){
                            ?>
                            <tr>
                                <td><?php echo $count;?></td>
                                <td><?php echo $row["barcode"]?></td>
                                <td><?php echo $row["name"]?></td>
                                <td><?php echo $row["mount"]?></td>
                                <td><?php echo $row["buy_price"]?></td>
                                <td><?php echo $row["sell_price"]?></td>
                                <td><?php echo $row["date"]?></td>
                                <td>
                                    <a href="plus_item.php?barcode=<?php echo $row["barcode"];?>"><span
                                            class="glyphicon glyphicon-plus" style="color:blue;"></span></a> |
                                    <a href="#" class="authority" onclick="edit(<?php echo $row['id'] ;?>)"><span
                                            class="glyphicon glyphicon-edit" style="color:blue;"></span> | </a>
                                    <a href="#" class="authority" onclick="delet(<?php echo $row['id'] ;?>)"><span
                                            class="glyphicon glyphicon-remove authority" style="color:red;"></span></a>
                                </td>
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
    </body>

</html>
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