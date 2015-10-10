<?php
/*
    Template Name: Register
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
        <p><?php wp_register('', ''); ?></p>
            
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

    
  
        <?php get_footer(); ?>