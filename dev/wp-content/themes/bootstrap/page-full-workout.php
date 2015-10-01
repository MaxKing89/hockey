<?php
/*
    Template Name: Full Workout Template
*/
?>
<?php get_header(); ?>

<div class="container">
  <div class="row">
      
    <div class="col-md-12">
        
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        
            <div class="page-header">
                <h1><?php the_title(); ?></h1>
            </div>
        
            
        <div class="featured-image-shelf img-responsive">
        <?php 
            if ( has_post_thumbnail() ) {
            the_post_thumbnail();
            }  
        ?>
        </div><!--Featured Image-->
            <?php the_content(); ?>
        
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

        $workout_schedule_sql= "SELECT * FROM workout_schedule";
        $workout_schedule_query = mysql_query($workout_schedule_sql) or die(mysql_error());
        $rs_workout_schedule = mysql_fetch_assoc($workout_schedule_query);
        $i = 1;
        $url= get_bloginfo(url);
        $strength_url = $url . '/hockey-strength-trainer-day/' ;
        ?>
            <?php do{ ?>
            <?php $current_day = $rs_workout_schedule['day']; ?>
            <?php $strength_day_url = $strength_url . '/day-' . $current_day; ?>
            <?php if($i == 1) { ?>

                <!--Week -->      
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Week: <?php echo $rs_workout_schedule['week']; ?></h2>
                        </div>
                    </div>

                <!--End Week -->

                <!--Day --> 
                            <div class="day-container">
                                <a href="<?php echo $strength_day_url ?>">

                                    <h3>Day: <?php echo $rs_workout_schedule['day']; ?></h3>
                                    <h4>Muscle Group: <?php echo $rs_workout_schedule['muscle_group']; ?></h4>
                                </a>
                            </div>


  <!--End Day -->  

<?php $i++; 

?>




<?php } else { ?>
                <!--Day --> 

                        <div class="day-container">
                            <a href="<?php echo $strength_day_url ?>">
                                <h3>Day: <?php echo $rs_workout_schedule['day']; ?></h3>
                                <h4>Muscle Group: <?php echo $rs_workout_schedule['muscle_group']; ?></h4>
                            </a>
                        </div>

<?php $i++; 
?>

<?php if ($i == 8) {
    $i = 1;
}
?>

<?php } ?>

            <?php } while ($rs_workout_schedule = mysql_fetch_assoc($workout_schedule_query)) ?>
                
<?php get_footer(); ?>

</div>
