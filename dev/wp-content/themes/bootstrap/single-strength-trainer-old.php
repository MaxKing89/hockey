<?php
/*
    Template Name: Single Workout Template Old
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
        ?>
                <?php do{ ?>
                <?php// if(isset($rs_workout_day['youtube_video'])) { ?>
                <!--<div class="responsive-video">
                    <iframe width="560" height="315" src="<?php //echo $rs_workout_day['youtube_video'] ; ?>" frameborder="0" allowfullscreen></iframe>
                </div>-->
                <?php// } ?>
            
                <div class="row">
                    <div class="col-sm-3">
                        <h3>Exercise:</h3> 
                        <h4><?php echo $rs_workout_day['exercise']; ?></h4>
                    </div>
                    <div class="col-sm-3">
                        <h3>Sets: </h3>
                        <h4><?php echo $rs_workout_day['sets']; ?> </h4>
                    </div>
                    <div class="col-sm-3">
                        <h3>Reps: </h3>
                        <h4><?php echo $rs_workout_day['reps']; ?></h4>
                    </div>
                    <div class="form-group col-sm-3">
                        <h3>Weight: </h3>
                      <input type="text" class="form-control" id="weight">
                    </div>
                </div>
                <hr>
                <?php } while ($rs_workout_day = mysql_fetch_assoc($workout_day_query)) ?>
      
           
            <button type="submit" class="btn btn-default">Complete Workout</button>
              <br>

        <?php echo do_shortcode('[print_button]'); ?>
            <?php get_footer(); ?>
      </div>  