<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<?php

$item_name = "";
$item_price    = "";


$db = mysqli_connect('localhost', 'root', '', 'portfoliomanagement');
if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }


if (isset($_POST['add'])) {
  echo "connect";
  $item_name=mysqli_real_escape_string($db, $_POST['product_name']);
  $item_price=mysqli_real_escape_string($db, $_POST['price']);
  $quant=mysqli_real_escape_string($db, $_POST['quant']);
  $transaction_type=mysqli_real_escape_string($db, $_POST['transaction_type']);
  $transaction_date=mysqli_real_escape_string($db, $_POST['transaction_date']);
  
    $query = "INSERT INTO product (product_name,price,quantity,transaction_type,transaction_date) 
  			  VALUES('$item_name','$item_price','$quant','$transaction_type','$transaction_date')";
      if(mysqli_query($db, $query))
      {
      echo "<script>alert('Successfully stored');</script>";
				
    }
    else{
        echo"<script>alert('Somthing wrong!!!');</script>";
    }
  	
  	header('location: table.php');
  
}
?>

