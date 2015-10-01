<?php
/*
    Template Name: Hockey Workouts Main Page
*/
?>
<?php get_header(); ?>

<div class="container">
  <div class="row">
      
    <div class="col-md-12">
        
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
         <div class="jumbotron jumbotron-container">
            <div class="page-header">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
        
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
<!--END Header----------------------------------------------------->

<div class="container">
  <div class="row">
            
    <div class="col-md-12">
        
                
<!-- Hockey Strength Trainer-->

        <div class="col-lg-4">
                      <p><a href="http://dev.herohockeyclub.com/choose-a-workout/strength-trainer/"><img class="img-circle" src="http://dev.herohockeyclub.com/wp-content/uploads/2015/09/strength.jpg" alt="Strength Trainer graphic" width="300" height="300"></a></p>
          <h2 id="workout-title">Hockey Strength Trainer</h2>
            
          <p><a class="btn btn-default" href="http://dev.herohockeyclub.com/choose-a-workout/strength-trainer/" role="button">LETS GO &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
          
                    
               
<!-- Hockey Endurance Trainer-->
        <div class="col-lg-4">
                      <p><a href="http://dev.herohockeyclub.com/choose-a-workout/strength-trainer/"><img class="img-circle" src="http://dev.herohockeyclub.com/wp-content/uploads/2015/09/endurance.jpg" alt="Endurance graphic" width="300" height="300"></a></p>
          <h2 id="workout-title">Endurance</h2>
            
          <p><a class="btn btn-default" href="http://dev.herohockeyclub.com/hockey-workouts/endurance/" role="button">LETS GO &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
          

                
<!-- Hockey Agility Trainer -->
        <div class="col-lg-4">
                      <p><a href="http://dev.herohockeyclub.com/hockey-workouts/agility/"><img class="img-circle" src="http://dev.herohockeyclub.com/wp-content/uploads/2015/09/agility.jpg" alt="Agility graphic" width="300" height="300"></a></p>
          <h2 id="workout-title">Agility</h2>
            
          <p><a class="btn btn-default" href="http://dev.herohockeyclub.com/hockey-workouts/agility/" role="button">LETS GO &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        
  
                
<!-- Hockey Speed Trainer -->
        <div class="col-lg-4">
                      <p><a href="http://dev.herohockeyclub.com/hockey-workouts/speed-trainer/"><img class="img-circle" src="http://dev.herohockeyclub.com/wp-content/uploads/2015/09/speed.jpg" alt="Speed Trainer graphic" width="300" height="300"></a></p>
          <h2 id="workout-title">Speed Trainer</h2>
            
          <p><a class="btn btn-default" href="http://dev.herohockeyclub.com/hockey-workouts/speed-trainer/" role="button">LETS GO &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
          
                    

       
            
    </div> 
          
</div>
</div>
   
      <hr>
   
 <?php get_footer(); ?>
