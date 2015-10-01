<?php
/*
    Template Name: Single Workout Template
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
                </div>
            </div>


<!-- Custom Query + loop-->
    <div class="container">

        <?php     
       global $wpdb;
            $current_url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
            //echo $current_url."<br>";
            $current_workoutday = substr($current_url, strpos($current_url, "day-") + 4); 
            //echo $current_workoutday."<br>";
            $current_workoutday_clean = chop($current_workoutday,"/");
            //echo $current_workoutday_clean;
            $workout_day_sql= "SELECT * FROM workout_day WHERE day = $current_workoutday_clean";
            $workout_day_query = mysql_query($workout_day_sql) or die(mysql_error());
            $rs_workout_day = mysql_fetch_assoc($workout_day_query);
            $lift_id= $rs_workout_day['lift_id'];
            $workout_title= $rs_workout_day['workout_title'];
            $date_completed= date("Y/m/d");
            $day= $rs_workout_day['day'];
            $week= $rs_workout_day['week'];
            $muscle_group= $rs_workout_day['muscle_group'];
            $exercise1= $rs_workout_day['exercise1'];
            $exercise2= $rs_workout_day['exercise2'];
            $exercise3= $rs_workout_day['exercise3'];
            $exercise4= $rs_workout_day['exercise4'];
            $exercise5= $rs_workout_day['exercise5'];
            $exercise6= $rs_workout_day['exercise6'];
            $exercise7= $rs_workout_day['exercise7'];
            $exercise8= $rs_workout_day['exercise8'];
            

        ?>
        

                <?php do{ ?>
                <?php// if(isset($rs_workout_day['youtube_video'])) { ?>
                <!--<div class="responsive-video">
                    <iframe width="560" height="315" src="<?php //echo $rs_workout_day['youtube_video'] ; ?>" frameborder="0" allowfullscreen></iframe>
                </div>-->
                <?php// } ?>
            <!--Start Exercise 1---------------------------------------------->
        <form action = "../../../processing-workout-submission/" method="post" name="complete-workout-form" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
            
            <?php //echo $lift_id ?>
            <?php //echo $workout_title ?>
            <?php //echo $day ?>
            <?php //echo $week ?>
            <?php //echo $muscle_group ?>
            <?php //echo $exercise1 ?>
            <?php //echo $exercise2 ?>
            <?php //echo $exercise3 ?>
            <?php //echo $exercise4 ?>
            <?php //echo $exercise5 ?>
            <?php //echo $exercise6 ?>
            <?php //echo $exercise7 ?>
            <?php //echo $exercise8 ?>

            
            <input type="hidden" name="lift-id" value="<?php echo $lift_id ?>;">
            <input type="hidden" name="workout-title" value="<?php echo $workout_title; ?>">
            <input type="hidden" name="date-completed" value="<?php echo $date_completed; ?>">
            <input type="hidden" name="workout-day" value="<?php echo $day; ?>">
            <input type="hidden" name="workout-week" value="<?php echo $week; ?>">
            <input type="hidden" name="muscle-group" value="<?php echo $muscle_group; ?>">
            <input type="hidden" name="exercise1" value="<?php echo $exercise1; ?>">
            <input type="hidden" name="exercise2" value="<?php echo $exercise2; ?>">
            <input type="hidden" name="exercise3" value="<?php echo $exercise3; ?>">
            <input type="hidden" name="exercise4" value="<?php echo $exercise4; ?>">
            <input type="hidden" name="exercise5" value="<?php echo $exercise5; ?>">
            <input type="hidden" name="exercise6" value="<?php echo $exercise6; ?>">
            <input type="hidden" name="exercise7" value="<?php echo $exercise7; ?>">
            <input type="hidden" name="exercise8" value="<?php echo $exercise8; ?>">

        
        <div class="row">
                    <?php if (isset($rs_workout_day['muscle_group'])) { ?>
                        <div class="col-sm-6">
                            <h1>Muscle Group:<?php echo $rs_workout_day['muscle_group']; ?></h1>
                        </div>
                    <?php } ?>
        </div>
        
        
                <div class="row">
                    <?php if (isset($rs_workout_day['exercise1'])) { ?>
                        <div class="col-sm-3">
                            <h3>Exercise:</h3> 
                            <h4><?php echo $rs_workout_day['exercise1']; ?></h4>
                        </div>
                    <?php } ?>
                    <?php if (isset($rs_workout_day['sets1'])) { ?>
                        <div class="col-sm-3">
                            <h3>Sets: </h3>
                            <h4><?php echo $rs_workout_day['sets1']; ?> </h4>
                        </div>
                     <?php } ?>
                    <?php if (isset($rs_workout_day['reps1'])) { ?>
                        <div class="col-sm-3">
                            <h3>Reps: </h3>
                            <h4><?php echo $rs_workout_day['reps1']; ?></h4>
                        </div>
                     <?php } ?>
                     <?php if (isset($rs_workout_day['exercise1'])) { ?>
                        <div class="form-group col-sm-3">
                            <h3>Weight: </h3>
                          <input type="text" class="form-control" id="weight1" name="weight1">
                        </div>
                    <?php } ?>
                </div>

        <!--End Exercise 1------------------------------------------------------->
            <!--Start Exercise 2---------------------------------------------->
                <div class="row">
                    <?php if (isset($rs_workout_day['exercise2'])) { ?>
                        <div class="col-sm-3">
                            <h3>Exercise:</h3> 
                            <h4><?php echo $rs_workout_day['exercise2']; ?></h4>
                        </div>
                    <?php } ?>
                    <?php if (isset($rs_workout_day['sets2'])) { ?>
                        <div class="col-sm-3">
                            <h3>Sets: </h3>
                            <h4><?php echo $rs_workout_day['sets2']; ?> </h4>
                        </div>
                     <?php } ?>
                    <?php if (isset($rs_workout_day['reps2'])) { ?>
                        <div class="col-sm-3">
                            <h3>Reps: </h3>
                            <h4><?php echo $rs_workout_day['reps2']; ?></h4>
                        </div>
                     <?php } ?>
                    <?php if (isset($rs_workout_day['exercise2'])) { ?>
                        <div class="form-group col-sm-3">
                            <h3>Weight: </h3>
                          <input type="text" class="form-control" id="weight2" name="weight2">
                        </div>
                    <?php } ?>
                </div>

        <!--End Exercise 2------------------------------------------------------->
            <!--Start Exercise 3---------------------------------------------->
                <div class="row">
                    <?php if (isset($rs_workout_day['exercise3'])) { ?>
                        <div class="col-sm-3">
                            <h3>Exercise:</h3> 
                            <h4><?php echo $rs_workout_day['exercise3']; ?></h4>
                        </div>
                    <?php } ?>
                    <?php if (isset($rs_workout_day['sets3'])) { ?>
                        <div class="col-sm-3">
                            <h3>Sets: </h3>
                            <h4><?php echo $rs_workout_day['sets3']; ?> </h4>
                        </div>
                     <?php } ?>
                    <?php if (isset($rs_workout_day['reps3'])) { ?>
                        <div class="col-sm-3">
                            <h3>Reps: </h3>
                            <h4><?php echo $rs_workout_day['reps3']; ?></h4>
                        </div>
                     <?php } ?>
                    <?php if (isset($rs_workout_day['exercise3'])) { ?>
                        <div class="form-group col-sm-3">
                            <h3>Weight: </h3>
                          <input type="text" class="form-control" id="weight3" name="weight3">
                        </div>
                    <?php } ?>
                </div>

        <!--End Exercise 3------------------------------------------------------->
            <!--Start Exercise 4---------------------------------------------->
                <div class="row">
                    <?php if (isset($rs_workout_day['exercise4'])) { ?>
                        <div class="col-sm-3">
                            <h3>Exercise:</h3> 
                            <h4><?php echo $rs_workout_day['exercise4']; ?></h4>
                        </div>
                    <?php } ?>
                    <?php if (isset($rs_workout_day['sets4'])) { ?>
                        <div class="col-sm-3">
                            <h3>Sets: </h3>
                            <h4><?php echo $rs_workout_day['sets4']; ?> </h4>
                        </div>
                     <?php } ?>
                    <?php if (isset($rs_workout_day['reps4'])) { ?>
                        <div class="col-sm-3">
                            <h3>Reps: </h3>
                            <h4><?php echo $rs_workout_day['reps4']; ?></h4>
                        </div>
                     <?php } ?>
                    <?php if (isset($rs_workout_day['exercise4'])) { ?>
                        <div class="form-group col-sm-3">
                            <h3>Weight: </h3>
                          <input type="text" class="form-control" id="weight4" name="weight4">
                        </div>
                     <?php } ?>
                </div>

        <!--End Exercise 4------------------------------------------------------->
            <!--Start Exercise 5---------------------------------------------->
                <div class="row">
                    <?php if (isset($rs_workout_day['exercise5'])) { ?>
                        <div class="col-sm-3">
                            <h3>Exercise:</h3> 
                            <h4><?php echo $rs_workout_day['exercise5']; ?></h4>
                        </div>
                    <?php } ?>
                    <?php if (isset($rs_workout_day['sets5'])) { ?>
                        <div class="col-sm-3">
                            <h3>Sets: </h3>
                            <h4><?php echo $rs_workout_day['sets5']; ?> </h4>
                        </div>
                     <?php } ?>
                    <?php if (isset($rs_workout_day['reps5'])) { ?>
                        <div class="col-sm-3">
                            <h3>Reps: </h3>
                            <h4><?php echo $rs_workout_day['reps5']; ?></h4>
                        </div>
                     <?php } ?>
                    <?php if (isset($rs_workout_day['exercise5'])) { ?>
                        <div class="form-group col-sm-3">
                            <h3>Weight: </h3>
                          <input type="text" class="form-control" id="weight5" name="weight5">
                        </div>
                     <?php } ?>
                </div>

        <!--End Exercise 5------------------------------------------------------->
            <!--Start Exercise 6---------------------------------------------->
                <div class="row">
                    <?php if (isset($rs_workout_day['exercise6'])) { ?>
                        <div class="col-sm-3">
                            <h3>Exercise:</h3> 
                            <h4><?php echo $rs_workout_day['exercise6']; ?></h4>
                        </div>
                    <?php } ?>
                    <?php if (isset($rs_workout_day['sets6'])) { ?>
                        <div class="col-sm-3">
                            <h3>Sets: </h3>
                            <h4><?php echo $rs_workout_day['sets6']; ?> </h4>
                        </div>
                     <?php } ?>
                    <?php if (isset($rs_workout_day['reps6'])) { ?>
                        <div class="col-sm-3">
                            <h3>Reps: </h3>
                            <h4><?php echo $rs_workout_day['reps6']; ?></h4>
                        </div>
                     <?php } ?>
                    <?php if (isset($rs_workout_day['exercise6'])) { ?>
                        <div class="form-group col-sm-3">
                            <h3>Weight: </h3>
                          <input type="text" class="form-control" id="weight6" name="weight6">
                        </div>
                    <?php } ?>
                </div>

        <!--End Exercise 6------------------------------------------------------->
            <!--Start Exercise 7---------------------------------------------->
                <div class="row">
                    <?php if (isset($rs_workout_day['exercise7'])) { ?>
                        <div class="col-sm-3">
                            <h3>Exercise:</h3> 
                            <h4><?php echo $rs_workout_day['exercise7']; ?></h4>
                        </div>
                    <?php } ?>
                    <?php if (isset($rs_workout_day['sets7'])) { ?>
                        <div class="col-sm-3">
                            <h3>Sets: </h3>
                            <h4><?php echo $rs_workout_day['sets7']; ?> </h4>
                        </div>
                     <?php } ?>
                    <?php if (isset($rs_workout_day['reps7'])) { ?>
                        <div class="col-sm-3">
                            <h3>Reps: </h3>
                            <h4><?php echo $rs_workout_day['reps7']; ?></h4>
                        </div>
                     <?php } ?>
                    <?php if (isset($rs_workout_day['exercise7'])) { ?>
                        <div class="form-group col-sm-3">
                            <h3>Weight: </h3>
                          <input type="text" class="form-control" id="weight7" name="weight7">
                        </div>
                    <?php } ?>
                </div>

        <!--End Exercise 7------------------------------------------------------->
            <!--Start Exercise 8---------------------------------------------->
                <div class="row">
                    <?php if (isset($rs_workout_day['exercise8'])) { ?>
                        <div class="col-sm-3">
                            <h3>Exercise:</h3> 
                            <h4><?php echo $rs_workout_day['exercise8']; ?></h4>
                        </div>
                    <?php } ?>
                    <?php if (isset($rs_workout_day['sets8'])) { ?>
                        <div class="col-sm-3">
                            <h3>Sets: </h3>
                            <h4><?php echo $rs_workout_day['sets8']; ?> </h4>
                        </div>
                     <?php } ?>
                    <?php if (isset($rs_workout_day['reps8'])) { ?>
                        <div class="col-sm-3">
                            <h3>Reps: </h3>
                            <h4><?php echo $rs_workout_day['reps8']; ?></h4>
                        </div>
                     <?php } ?>
                    <?php if (isset($rs_workout_day['exercise8'])) { ?>
                        <div class="form-group col-sm-3">
                            <h3>Weight: </h3>
                          <input type="text" class="form-control" id="weight8" name="weight8">
                        </div>
                     <?php } ?>
                </div>
        <!--End Exercise 8------------------------------------------------------->

                
                <?php } while ($rs_workout_day = mysql_fetch_assoc($workout_day_query)) ?>
      
           
            <button type="submit" class="btn btn-default submit-workout">Complete Workout</button>
        </form>

        <?php echo do_shortcode('[print_button]'); ?>
            <?php get_footer(); ?>
      </div>  