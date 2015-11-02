<?php
/*
    Template Name: My Completed Workouts
*/
?>

    <?php get_header(); ?>

            <div class="container">
                <div class="row">

                    <div class="col-md-12">

                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                            <div class="page-header">
                                <h1><?php the_title(); ?></h1>
                                
                                <p>
                                    <?php the_content(); ?>
                                </p>
                            </div>
                        <?php endwhile; else: ?> 
                        <div class="page-header">
                            <h1>Oh no!</h1>
                        </div>

                        <p>No content is appearing for this page!</p>

                    <?php endif; ?>
                    </div>
                </div><!---------------------End header row---------------------------->
            </div><!---------------------End header container---------------------------->


 <?php     
       global $wpdb;
        $current_user = wp_get_current_user();
        $current_username = $current_user->user_login;
        $my_workouts_sql="SELECT * FROM completed_workouts WHERE username = '$current_username'";
        $my_workouts_query = mysql_query($my_workouts_sql) or die(mysql_error());
        $rs_my_workouts= mysql_fetch_assoc($my_workouts_query);
?>

<div class="container">

        <?php do{ ?>
            <div class="row my-workouts-container">
               
                    <div class="workout-header col-sm-12 col-md-12">
                     <?php if (isset($rs_my_workouts['workout_title'])) { ?>

                         <h1><?php echo $rs_my_workouts['workout_title']; ?></h1>

                    <?php } ?>
                    <?php if (isset($rs_my_workouts['muscle_group'])) { ?>

                         <h3>Muscle Group: <?php echo $rs_my_workouts['muscle_group']; ?></h3>

                    <?php } ?>

                    <?php if (isset($rs_my_workouts['date_completed'])) { ?>

                         <h3>Date Completed: <?php echo $rs_my_workouts['date_completed']; ?></h3>

                    <?php } ?>

                    
                    <?php if (isset($rs_my_workouts['day'])) { ?>
                    
                        <div class="completed-day-container col-sm-6">

                         <h3>Day: <?php echo $rs_my_workouts['day']; ?></h3>
                    </div>
                    <?php } ?>

                    <?php if (isset($rs_my_workouts['week'])) { ?>
                        <div class="completed-week-container col-sm-6">
                         <h3>Week: <?php echo $rs_my_workouts['week']; ?></h3>
                        </div>
                    <?php } ?>
               </div><!------------------------End Workout Header ------------------------------>               
                    
                        
                    <div class="all-exercise-container col-sm-12">
                    
                    <?php if (isset($rs_my_workouts['exercise1'])) { ?>
                        
                    <div class="individual-exercise-container col-sm-4">

                         <h4>Exercise: <?php echo $rs_my_workouts['exercise1']; ?></h4>

                    <?php } ?>
                    <?php if (isset($rs_my_workouts['weight1'])) { ?>

                         <h4>Weight: <?php echo $rs_my_workouts['weight1']; ?></h4>
                    </div><!---------------------End individual exercise container---------------------------->
                    <?php } ?>
                    <?php if (isset($rs_my_workouts['exercise2'])) { ?>
                        <div class="individual-exercise-container col-sm-4">
                         <h4>Exercise: <?php echo $rs_my_workouts['exercise2']; ?></h4>

                    <?php } ?>
                    <?php if (isset($rs_my_workouts['weight2'])) { ?>

                         <h4><?php echo $rs_my_workouts['weight2']; ?></h4>
                    </div><!---------------------End individual exercise container---------------------------->
                    <?php } ?>
                    <?php if (isset($rs_my_workouts['exercise3'])) { ?>
                    <div class="individual-exercise-container col-sm-4">
                    
                         <h4>Exercise: <?php echo $rs_my_workouts['exercise3']; ?></h4>

                    <?php } ?>
                    <?php if (isset($rs_my_workouts['weight3'])) { ?>

                         <h4>Weight: <?php echo $rs_my_workouts['weight3']; ?></h4>
                    </div><!---------------------End individual exercise container---------------------------->
                    <?php } ?>
                     <?php if (isset($rs_my_workouts['exercise4'])) { ?>
                        <div class="individual-exercise-container col-sm-4">
                         <h4>Exercise: <?php echo $rs_my_workouts['exercise4']; ?></h4>

                    <?php } ?>
                    <?php if (isset($rs_my_workouts['weight4'])) { ?>

                         <h4>Weight: <?php echo $rs_my_workouts['weight4']; ?></h4>
                    </div><!---------------------End individual exercise container---------------------------->
                    <?php } ?>
                     <?php if (isset($rs_my_workouts['exercise5'])) { ?>
                        <div class="individual-exercise-container col-sm-4">
                         <h4>Exercise: <?php echo $rs_my_workouts['exercise5']; ?></h4>

                    <?php } ?>
                    <?php if (isset($rs_my_workouts['weight5'])) { ?>

                         <h4>Weight: <?php echo $rs_my_workouts['weight5']; ?></h4>
                    </div><!---------------------End individual exercise container---------------------------->
                    <?php } ?>
                     <?php if (isset($rs_my_workouts['exercise6'])) { ?>
                        <div class="individual-exercise-container col-sm-4">
                         <h4>Exercise: <?php echo $rs_my_workouts['exercise6']; ?></h4>

                    <?php } ?>
                    <?php if (isset($rs_my_workouts['weight6'])) { ?>

                         <h4>Weight: <?php echo $rs_my_workouts['weight6']; ?></h4>
                    </div><!---------------------End individual exercise container---------------------------->
                    <?php } ?>
                     <?php if (isset($rs_my_workouts['exercise7'])) { ?>
                        <div class="individual-exercise-container col-sm-4">
                         <h4>Exercise: <?php echo $rs_my_workouts['exercise7']; ?></h4>

                    <?php } ?>
                    <?php if (isset($rs_my_workouts['weight7'])) { ?>

                         <h4>Weight: <?php echo $rs_my_workouts['weight7']; ?></h4>
                    </div><!---------------------End individual exercise container---------------------------->
                    <?php } ?>
                     <?php if (isset($rs_my_workouts['exercise8'])) { ?>
                        <div class="individual-exercise-container col-sm-4">
                         <h4>Exercise: <?php echo $rs_my_workouts['exercise8']; ?></h4>
                        
                    <?php } ?>
                    <?php if (isset($rs_my_workouts['weight8'])) { ?>

                         <h4>Weight: <?php echo $rs_my_workouts['weight8']; ?></h4>
                            
                    </div><!---------------------End individual exercise container---------------------------->
                        <?php } ?>
                                
                            
                    </div><!---------------------End all exercise container---------------------------->
                   

            
     
    </div><!---------------------End workout Row--------------------------------------------------------->
    
         <div class="strong-hr">
            <hr> 
        </div><!---------------------End strong hr---------------------------------------------->
    
        <?php } while ($rs_my_workouts = mysql_fetch_assoc($my_workouts_query)) ?>
    
 <?php get_footer(); ?>
    
    </div><!---------------------End Container--------------------------------------------------------->
