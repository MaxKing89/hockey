<?php
/*
    Template Name: Shopping Grid Template
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
        
            <?php the_content(); ?>
        
        <?php endwhile; else: ?>
            
            <div class="page-header">
                <h1>Oh no!</h1>
            </div>
        
            <p>No content is appearing for this page!</p>
        
        <?php endif; ?>
        
    </div>
      
  </div>
    
   <div class="row">
       
       <?php
        $args = array(
           'post_type' => 'shop' 
        );
        $the_query = new WP_Query( $args );

       ?>
       
       <?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
       
       <div class="col-sm-3 shopping">
           
            <?php
                $thumbnail_id = get_post_thumbnail_id(); 
                $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail-size', true );
            ?>
           
            <p><a href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail_url[0]; ?>" alt="<?php the_title();?> graphic"></a></p>
           <h4 id="product-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
            <h4 id="price"> Price: <?php the_field( 'price' ); ?> </h4>
       
       </div>
       
       <?php $shopping_count = $the_query->current_post + 1; ?>
       <?php if ( $shopping_count % 4 == 0): ?>
    </div><div class="row">
    
        <?php endif; ?>
       
        <?php endwhile; endif; ?>
    
    </div> 
    

 <?php get_footer(); ?>
