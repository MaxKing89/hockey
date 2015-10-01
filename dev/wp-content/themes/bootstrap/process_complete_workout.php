<?php
/*
    Template Name: Process Complete Workout
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

if(isset($_POST['weight1'])) $weight1=$_POST["weight1"]; 
if(isset($_POST['weight2'])) $weight2=$_POST["weight2"];
if(isset($_POST['weight3'])) $weight3=$_POST["weight3"]; 
if(isset($_POST['weight4'])) $weight4=$_POST["weight4"]; 
if(isset($_POST['weight5'])) $weight5=$_POST["weight5"]; 
if(isset($_POST['weight6'])) $weight6=$_POST["weight6"]; 
if(isset($_POST['weight7'])) $weight7=$_POST["weight7"]; 
if(isset($_POST['weight8'])) $weight8=$_POST["weight8"];
if(isset($_POST['lift-id'])) $lift_id=$_POST["lift-id"];
if(isset($_POST['workout-title'])) $workout_title=$_POST["workout-title"];
if(isset($_POST['date-completed'])) $date_completed=$_POST["date-completed"];
if(isset($_POST['workout-day'])) $day=$_POST["workout-day"];
if(isset($_POST['workout-week'])) $week=$_POST["workout-week"];
if(isset($_POST['muscle-group'])) $muscle_group=$_POST["muscle-group"];
if(isset($_POST['exercise1'])) $exercise1=$_POST["exercise1"];
if(isset($_POST['exercise2'])) $exercise2=$_POST["exercise2"];
if(isset($_POST['exercise3'])) $exercise3=$_POST["exercise3"];
if(isset($_POST['exercise4'])) $exercise4=$_POST["exercise4"];
if(isset($_POST['exercise5'])) $exercise5=$_POST["exercise5"];
if(isset($_POST['exercise6'])) $exercise6=$_POST["exercise6"];
if(isset($_POST['exercise7'])) $exercise7=$_POST["exercise7"];
if(isset($_POST['exercise8'])) $exercise8=$_POST["exercise8"];




//establish connection
$con = mysqli_connect("localhost","kmtspart","Hockey10!$","kmtspart_hockeydev"); 
//on connection failure, throw an error
if(!$con) {  
die('Could not connect: '.mysql_error($con)); 
} 
 
$sql="INSERT INTO completed_workouts ( username, lift_id, workout_title, date_completed, day, week, muscle_group, exercise1, weight1, exercise2, weight2, exercise3, weight3, exercise4, weight4, exercise5, weight5, exercise6, weight6, exercise7, weight7, exercise8, weight8) VALUES ( '$current_username','$lift_id','$workout_title','$date_completed', '$day','$week','$muscle_group','$exercise1','$weight1','$exercise2','$weight2','$exercise3','$weight3','$exercise4','$weight4','$exercise5','$weight5','$exercise6', '$weight6','$exercise7','$weight7','$exercise8','$weight8')"; 
$success = mysqli_query($con,$sql);

if ($success == true) {
    header("http://dev.herohockeyclub.com/workout-submission-success/");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
?>





<?php get_footer(); ?>