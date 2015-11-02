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
$current_user = wp_get_current_user();
$current_username = $current_user->user_login;


 //echo 'Username: ' . $current_user->user_login . '<br />';
    //echo 'User email: ' . $current_user->user_email . '<br />';
    //echo 'User first name: ' . $current_user->user_firstname . '<br />';
    //echo 'User last name: ' . $current_user->user_lastname . '<br />';
    //echo 'User display name: ' . $current_user->display_name . '<br />';
    //echo 'User ID: ' . $current_user->ID . '<br />';w

$productName=sanitize_text_field($_POST["productName"]); 
$brand=sanitize_text_field($_POST["brand"]);
$category=sanitize_text_field($_POST["category"]); 
$form_description=sanitize_text_field($_POST["form_description"]); 
$price=sanitize_text_field($_POST["price"]); 

$score=sanitize_text_field($_POST["score"]);

$upload_image=sanitize_file_name($_POST["upload_image"]); 
$linkToBuy=esc_url($_POST["linkToBuy"]);


//img upload
$file_path = TEMPLATEPATH .'/uploads/'. $_FILES['upload_image']['name'];
$db_path = '/themes'.'/bootstrap'.'/uploads/'. $_FILES['upload_image']['name'];
$target_dir = "dev.herohockeyclub.com/wp-content/themes/bootstrap/uploads";
$target_file = $target_dir . basename($_FILES["upload_image"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["upload_image"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

 // Check file size
if ($_FILES["upload_image"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["upload_image"]["tmp_name"], $file_path)) {
        echo "The file ". basename( $_FILES["upload_image"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}  

//end img upload



//establish connection
$con = mysqli_connect("localhost","kmtspart","Hockey10!$","kmtspart_hockeydev"); 
//on connection failure, throw an error
if(!$con) {  
die('Could not connect: '.mysql_error($con)); 
} 
 
$sql="INSERT INTO hockey_review ( product_name, brand, category, form_description, price, score, upload_image, linkToBuy, submitted_by ) VALUES ( '$productName','$brand','$category','$form_description','$price','$score', '$db_path','$linkToBuy','$current_username')"; 
$success = mysqli_query($con,$sql); 

if ($success == true) {
    header("http://dev.herohockeyclub.com/your-review-has-been-submitted/");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
?>





<?php get_footer(); ?>