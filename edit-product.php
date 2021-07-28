<!DOCTYPE HTML>
<html>

<head>
    <title>Glance Design Dashboard an Admin Panel Category Flat Bootstrap Responsive Website Template | Forms :: w3layouts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />

    <!-- font-awesome icons CSS -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome icons CSS -->

    <!-- side nav css file -->
    <link href='css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css' />
    <!-- side nav css file -->

    <!-- js-->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/modernizr.custom.js"></script>

    <!--webfonts-->
    <link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
    <!--//webfonts-->

    <!-- Metis Menu -->
    <script src="js/metisMenu.min.js"></script>
    <script src="js/custom.js"></script>
    <link href="css/custom.css" rel="stylesheet">
    <!--//Metis Menu -->

</head>
<?php
include "./class/atclass.php";
$editid = $_GET['eid'];
if (!isset($_GET['eid']) || empty($_GET['eid'])) {
    header("location:display-product.php");
}
$editq = mysqli_query($connection, "select * from tbl_product where pro_id = '$editid' ") or die(mysqli_error($connection));
$selectrow = mysqli_fetch_array($editq);
print_r($selectrow);

$msg = "";
if ($_POST) {
    $id = $_POST['id'];
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pdetail = $_POST['pdetail'];

    $query = mysqli_query($connection, "update tbl_product set pro_name='{$pname}',pro_price='{$pprice}',pro_detail='{$pdetail}' where pro_id='{$id}'")
        or die(mysqli_error($connection));
    if ($query) {
      echo "<script>alert('Record Updated');window.location='display-product.php';</script>";
    }
}

?>

<body class="cbp-spmenu-push">
    <div class="main-content">


        <?php
        include "sidebar.php";
        ?>
        <!--left-fixed -navigation-->

        <!-- header-starts -->
        <?php
        include 'header.php';
        ?>
        <!-- //header-ends -->
        <!-- main content start-->
        <div id="page-wrapper">
            <div class="main-page">
                <div class="forms">
                    <h2 class="title1">Product Forms</h2>
                    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
                        <?php
                        echo $msg;
                        ?>
                        <div class="form-title">
                            <h4>Edit Product Information</h4>
                        </div>
                        <div class="form-body">
                            <form method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                <input type="hidden" name="id" value="<?php echo $selectrow['pro_id']?>">
                                    <label for="exampleInputEmail1">Product Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $selectrow['pro_name']?>" name="pname" placeholder="Enter Product Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Price</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"  value="<?php echo $selectrow['pro_price']?>" name="pprice" placeholder="Enter Product price" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Detail</label>
                                    <textarea class="form-control"   name="pdetail" required><?php echo $selectrow['pro_detail']?></textarea>
                                </div>



                        </div>

                        <button type="submit" class="btn btn-primary">Edit Product</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <button type="button" onclick="window.lication=''" class="btn btn-primary">Riev</button>
                        </form>
                    </div>
                </div>



            </div>
        </div>
    </div>
    <!--footer-->
    <?php
    include "footer.php";
    ?>
    <!--//footer-->
    </div>

    <!-- side nav js -->
    <script src='js/SidebarNav.min.js' type='text/javascript'></script>
    <script>
        $('.sidebar-menu').SidebarNav()
    </script>
    <!-- //side nav js -->

    <!-- Classie -->
    <!-- for toggle left push menu script -->
    <script src="js/classie.js"></script>
    <script>
        var menuLeft = document.getElementById('cbp-spmenu-s1'),
            showLeftPush = document.getElementById('showLeftPush'),
            body = document.body;

        showLeftPush.onclick = function() {
            classie.toggle(this, 'active');
            classie.toggle(body, 'cbp-spmenu-push-toright');
            classie.toggle(menuLeft, 'cbp-spmenu-open');
            disableOther('showLeftPush');
        };

        function disableOther(button) {
            if (button !== 'showLeftPush') {
                classie.toggle(showLeftPush, 'disabled');
            }
        }
    </script>
    <!-- //Classie -->
    <!-- //for toggle left push menu script -->

    <!--scrolling js-->
    <script src="js/jquery.nicescroll.js"></script>
    <script src="js/scripts.js"></script>
    <!--//scrolling js-->

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.js"> </script>

</body>

</html>