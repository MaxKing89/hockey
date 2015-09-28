<?php
/*
    Template Name: Gear Review Template
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
           'post_type' => 'gear-review' 
        );
        $the_query = new WP_Query( $args );

       ?>
       
       <?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
       <div class="review">
           <div class="col-sm-6 gear-review">

                <?php
                    //$thumbnail_id = get_post_thumbnail_id(); 
                    //$thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail-size', true )
                ?>

                <!--<p><a href="<//?php the_permalink(); ?>"><img src="<//?php echo $thumbnail_url[0]; ?>" alt="<//?php the_title();?> graphic"></a></p>-->
               <!--<h4 id="product-title"><a href="<//?php the_permalink(); ?>"><//?php the_title(); ?></a></h4>-->
               <div class="img-container">
                   <div id="img-review">
                       <!--<h4>Image Upload: </h4>-->

                           <?php
                                $image=get_field('upload_image');
                                if( !empty($image) ): ?>
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo$image['alt']?>" />;
                           <?php endif; ?>
                    </div>         
               </div>
               <br>

               <div id="product-name">
                   <!--<h4>Product Name: </h4>-->
                   <h3><?php the_field( 'product_name' ); ?></h3>
               </div>
               
               <div  id="brand">
                   <h4>Brand: </h4>
                   <p><?php the_field( 'brand' ); ?></p>
               </div>
               <div id="category">
                   <h4>Category: </h4>
                   <p><?php the_field( 'category' ); ?></p>
                </div>
               
               <div id="description">
                   <h4>Description: </h4>
                   <p><?php the_field( 'description' ); ?> </p>
                </div>
               
               <div id="price">
                   <h4> Price: </h4>
                   <p><?php the_field( 'price' ); ?> </p>
                </div>
               
               <div id="score">
                   <h4>Score: </h4>
                   <p><?php the_field( 'score' ); ?></p>
               </div>
               
               <div id="video-review">
                   <!--<h4>Video Upload: </h4>-->
                   <p><?php the_field( 'upload_video' ); ?></p>
               </div>
               
               
               <div id="link-review">
                   <!--<h4>Link to Buy: </h4>-->
                   <p><a href="<?php the_field( 'link_to_buy' ); ?>">Link to buy</a></p>
                   <br>
               </div>
               <br>

           </div>
        </div>
       <?php $test =  $the_query->current_post; ?>
       <?php echo $test; ?>
       <?php $review_count = $the_query->current_post + 1; ?>
       <?php if ( $review_count % 2 == 0): ?>
    </div><div class="row">
    
        <?php endif; ?>
       
        <?php endwhile; endif; ?>
    
    </div> 
    

 <?php get_footer(); ?>
