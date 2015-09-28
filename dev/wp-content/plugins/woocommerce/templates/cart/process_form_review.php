<?php
/*
    Template Name: Process Gear Review
*/
?>
<?php

get_header(); 

?>


<?php 
//get the form elements and store them in variables
$productName = $_POST["productName"]; 
$brand = $_POST["brand"]; 
$category = $_POST["category"]; 
$form_description = $_POST["form-description"]; 
$price = $_POST["price"];
$score = $_POST["score"];
$upload_image = $_POST["upload"];
$link_to_buy = $_POST["linkToBuy"]; 
?>


<!--connect to db-->
<?php 
//establish connection
$con = mysqli_connect("localhost","kmtspart","Hockey10!$","kmtspart_hockeydev"); 
//on connection failure, throw an error
if(!$con) {  
die('Could not connect: '.mysql_error()); 
} 
?>

<?php 
$sql="INSERT INTO `kmtspart_hockeydev`.`hockey_postmeta` ( `productName` , `brand`, 'category', 'form-description', 'price', 'score', 'upload', 'linkToBuy' ) VALUES ( '$productName','$brand', '$category', '$form_description', '$price', '$score', '$upload_image', '$link_to_buy')"; 
mysqli_query($con,$sql); 
?>

<?php
//Redirects to the specified page
header("Location: http://dev.herohockeyclub.com/your-review-has-been-subitted"); 
?>