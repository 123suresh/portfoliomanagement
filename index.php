<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
	unset($_SESSION['first_name']);
	unset($_SESSION['last_name']);
	header("location: table.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="Inventmng/srtdash/assets/bootstrap.min.css">
</head>
<body>


<script>src="srtdash/assets/js/vendor/jquery-2.2.4.min.js" </script>
<script>src="srtdash/assets/js/vendor/modernizr-2.8.3.min.js" </script>
</body>
</html>



<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <style type="text/css">
        .view_table{
            background-color: white;
            border:2pt solid blue;
            margin: 50px;
            font-size: 20px;
        }
    </style>
</head>

<body>
    
    <div id="preloader">
        <div class="loader"></div>
    </div>

    <div class="page-container">
        <div class="sidebar-menu">
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="active">
                                <a href="index.php" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                                
                            </li>
                            
                           
                            
                           
                            <li>
                                <a href="table.php" aria-expanded="true"><i class="fa fa-table"></i>
                                    <span>Buy or Sell share</span></a>

								
                            </li>
                           
                            
                          
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <div class="main-content">
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['username']?> <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                 
							<a class="dropdown-item" href="index.php?logout='1'">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          <div>








		
		 <?php  if (isset($_SESSION['first_name']) ) : ?>
		<h2 style="text-align:center"> Welcome <strong><?php echo $_SESSION['first_name']; echo " " ;echo $_SESSION['last_name'];?></strong></h2>
		
		<?php endif ?>


        <table class='view_table'>
<tr>
<th>Sum of total price</th>
</tr>
<?php
 $conn = new mysqli("localhost","root","","portfoliomanagement");
foreach($conn->query('SELECT SUM(price) 
FROM product') as $row) {
echo "<tr>";
echo "<td>" . $row['SUM(price)'] . "</td>";
echo "</tr>";

}
?>

<tr>
<th>Total quantity</th>
</tr>
<?php
 $conn = new mysqli("localhost","root","","portfoliomanagement");
foreach($conn->query('SELECT SUM(quantity) 
FROM product') as $row) {
echo "<tr>";
echo "<td>" . $row['SUM(quantity)'] . "</td>";
echo "</tr>";

}
?>


</tbody></table>
		


        <div>
            <table class="table text-dark text-center">
                                            <thead class="text-uppercase">
                                                <tr class="table-active">
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="col">Transaction Type</th>
                                                    <th scope="col">Transaction Date</th>
                                                     <th scope="col">Action</th>
                                                     

                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
            <?php 
               $conn = new mysqli("localhost","root","","portfoliomanagement");
               $sql = "SELECT * FROM product";
               $result = $conn->query($sql);
                    $count=0;
               if ($result -> num_rows >  0) {
                  
                 while ($row = $result->fetch_assoc()) 
                 {
                      $count=$count+1;
                   ?>
                  
                   
                   <tr>
                    <th><?php echo $count ?></th>
                      <th><?php echo $row["product_name"] ?></th>
                      <th><?php echo $row["price"]  ?></th>
                      <th><?php echo $row["quantity"]  ?></th>
                       <th><?php echo $row["transaction_type"]  ?></th>
                        <th><?php echo $row["transaction_date"]  ?></th>
                      
                      <th> <a href="up"Edit</a><a href="edit.php?id=<?php echo $row["product_id"] ?>">Edit</a> <a href="up"Edit</a><a href="delete.php?id=<?php echo $row["product_id"] ?>">Delete</a></th>
                    
                      
                    </tr>
            <?php
                 
                 }
               }

            ?>

                                            </tbody>
                                        </table>






        </div>
		
		</div>
               
                
                    
        </div>
		
    </div>










    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>
