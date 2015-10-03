<?php get_header(); ?>

<div class="container">
  <div class="row row-offcanvas row-offcanvas-right">
      
    <div class="col-md-9">
        
        <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle Sidebar</button>
          </p>
        
        <?php woocommerce_content(); ?>
        
    
        
    </div>
      
    <?php get_sidebar(); ?>
      
  </div>

 <?php get_footer(); ?>
