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

<html>

    <head>
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
        <title>Sony Store ( Home )</title>
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
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <link rel="icon" href="image/icons/indexlogo.png">
        <style>
        .d {
            color: white;
            text-align: center;
            font-family: arial;
        }

        img:hover {
            cursor: pointer;
        }

        /* Dropdown Button */
        .dropbtn {
            background-color: #4CAF50;

            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
        }

        /* The container <div> - needed to position the dropdown content */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        /* Dropdown Content (Hidden by Default) */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            border: 1px dotted #144b6f;
            border-radius: 3px;
            z-index: 1;
        }

        .h {
            background-image: url("image/loading.gif");
        }

        /* Links inside the dropdown */
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        /* Change color of dropdown links on hover */
        .dropdown-content a:hover {
            background-color: #ddd;
        }

        /* Show the dropdown menu on hover */
        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Change the background color of the dropdown button when the dropdown content is shown */
        .dropdown:hover .dropbtn {
            background-color: #3e8e41;
        }
        </style>
    </head>

    <body id="body">

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="background-color:rgb(40,96,144); height:70px; width:100%;">

                    <div class="menu_image"
                        style="position:absolute;top:12px; width:40%; margin-left:0.3%; height:50px;">
                        <h4 style="float:left; margin-right:10px; color:#e6f7ff;"></h4>
                        <!-- <img src="image/icons/patient2.png"  title="Patient"  height="40px" width="40px" style="margin-left:0%;" onclick="window.open('manage_customers.php','frame');" /> -->

                        <!-- <img src="image/icons/impression.png"  title="Impression"  height="46px" width="46px" style="margin-left:1%;  " onclick="window.open('manage_impression.php','frame');" /> -->
                        <img src="image/icons/warehouse2.png" title="Drug" height="40px" width="40px"
                            style="margin-left:1.9%;" onclick="window.open('barcode_test.php','frame');" />
                        <!-- <img src="image/icons/warehouse2.png" title="Warehouse"  height="42px" width="42px" style="margin-left:1%;" onclick="window.open('godam_items.php','frame');" />    -->
                        <!-- <img src="image/icons/stuff.png" title="Staff "  height="40px" width="40px" style="margin-left:1%;" onclick="window.open('manage_stuff.php','frame');" /> -->


                        <!-- <img src="image/icons/expenses.png"  title="Expense"  height="40px" width="40px" style="margin-left:1%;" onclick="window.open('expense.php','frame');" /> -->




                        <img src="image/icons/restore.png" title="Backup" height="40px" width="40px"
                            style="margin-left:1%;" onclick="window.open('backup.php','frame');" />
                        <!-- <img src="image/icons/report.png" title="Report"  height="40px" width="40px" style="margin-left:1%;" onclick="window.open('report.php','frame');" /> -->


                        <img class="authority" src="image/icons/setting.png" title="Setting" height="40px" width="40px"
                            style="margin-left:1%;" onclick="window.open('profile.php','frame');" />
                        <!-- <img src="image/icons/video.png"  height="40px" width="40px" title="Tutorial" data-toggle="modal" data-target="#videomodal"  style="margin-left:1.9%;" /> -->

                    </div>
                    <div class="modal" id="videomodal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Modal Heading</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    Modal body..
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>

                            </div>
                        </div>
                    </div>

                    <a href="logout.php"><img src="image/icons/logout.png" width="40px" height="40px"
                            style="float:right; margin-top:16px; margin-right:0.5%;"></a></img>

                    <div style=" position:absolute; float:left; height:80px;width:300px; left:57%;top:-10px;">
                        <a href="home.php">
                            <!-- <img src="image/icons/warehouse.png" style="height:100%; width:80px;" alt=""/> -->
                            <span
                                style="color:#e6f7ff; font-size:25px; font-family:arial; position:relative; top:25px;">Sony
                                Store</span>
                        </a>

                    </div>
                    <!-- <img src="image/<?php if($image == ""){echo "user.webp";}else{echo $image;}?>" class="img-circle" title="<?php echo strtoupper($name)."  ".strtoupper($lastname); ?>"  style="float:right; margin-right:20%; height:50px; margin-top:10px; width:50px;" />
-->
                </div>
            </div>
            <div class="row" style="margin-top:5px;">

                <div class="col-sm-12" style="border:1px dotted green; height:90%;">
                    <iframe src="barcode_test.php" name="frame" style="height:100%; border: none;width:100%;"></iframe>

                </div>
                <!-- <div class="col-sm-2" style="border:1px dotted green; height:90%;">
                <iframe src="ragister_dawa.php" style="height:100%; border:none; width:100%;"></iframe>
              </div> -->


            </div>
        </div>

    </body>

</html>