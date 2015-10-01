<?php
/*
    Template Name: Hockey Workouts
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

<div class="container">
  <div class="row">
      <?php 
        $args = array(
            'post_type' => 'hockey-workouts'
            );
    
        $the_query = new WP_Query( $args );

       ?>
      
    <div class="col-md-12">
        
        <?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        
<!-- Team -->
      <div class="row">
        <div class="col-lg-4">
            <?php
                $thumbnail_id = get_post_thumbnail_id(); 
                $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail-size', true );
            ?>
          <p><a href="<?php the_permalink(); ?>"><img class="img-circle" src="<?php echo $thumbnail_url[0]; ?>" alt="<?php the_title();?> graphic" width="300" height="300"></a></p>
          <h2 id="workout-title"><?php the_field( 'workout_title' ); ?></h2>
            
          <p><a class="btn btn-default" href="<?php the_permalink(); ?>" role="button"><?php echo the_permalink(); ?>LETS GO &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
          
        <?php $team_count = $the_query->current_post + 1; ?>
        <?php if ( $team_count % 3 == 0): ?>
          </div><div class="row">
        
        <?php endif; ?>    

       
        <?php endwhile; endif; ?>
    
    </div> 
          
</div>
   
 <?php get_footer(); ?>
