<?php
/*
    Template Name: Single Workout Template
*/
?>
<?php get_header(); ?>

<div class="container">

<div class="page-header">
    
<div class="row">
        
        <div class="col-xs-9">
            <h1>Strength Trainer</h1>
        </div>
        
        <div class="col-xs-3 prev-next">
            <?php next_post_link( '%link', '<span class="glyphicon glyphicon-circle-arrow-left"></span>' ); ?>
            <a href="<?php bloginfo('url'); ?>/?p=64"><span class="glyphicon glyphicon-th"></span></a>
            <?php previous_post_link( '%link', '<span class="glyphicon glyphicon-circle-arrow-right"></span>' ); ?>
        </div>
 
    </div>
    
    
    </div>

<div class="container">
  <div class="row">
      
    <div class="col-md-12">
        
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        
            <div class="page-header">
                <h1><?php the_title(); ?></h1>
                <div class="responsive-video">
                    
                </div>
                <p><?php the_content(); ?></p>
            </div>
        
        <h3 class="col-sm-3">Exercise</h3>
        <h3 class="col-sm-3">Sets</h3>
        <h3 class="col-sm-3">Reps</h3>

        
            
        
        
        <?php endwhile; else: ?>
            
            <div class="page-header">
                <h1>Oh no!</h1>
            </div>
        
            <p>No content is appearing for this page!</p>
        
        <?php endif; ?>
        
    </div>
      
    
  </div>
    

    
</div>

        <?php get_footer(); ?>
</div>
