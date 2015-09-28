<?php
/*
    Template Name: Product Review Template
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
</div>
   <div class="container"> 
   <div class="row">
      <?php     
           global $wpdb;
               
                $reviews_sql= "SELECT * FROM hockey_review";
                $reviews_query = mysql_query($reviews_sql) or die(mysql_error());
                $rsReviews = mysql_fetch_assoc($reviews_query);
                ?>
                    <?php do{ ?>
       
                    <div class="col-sm-6 gear-review">
                         <div class="img-container">
                            <div id="img-review">
                             <?php 
                                $image =  $rsReviews['upload_image'];
                             ?>
                            
                            <?php 
                                    $content_path = content_url();
                             ?>
                                <img src="<?php echo $content_path . $image; ?>" />
                            </div>         
                        </div>
                        
                        <div id="product-name">
                            <h3><?php echo $rsReviews['product_name']; ?> </h3>
                        </div>
                        
                        <div id="brand">
                            <h4>Brand: </h4>
                            <p><?php echo $rsReviews['brand']; ?> </p>
                        </div>
                        
                        <div id="category">
                            <h4>Category: </h4>
                            <p><?php echo $rsReviews['category']; ?> </p>
                        </div>
                        
                        <div id="description">
                            <h4>Description: </h4>
                            <p><?php echo $rsReviews['form_description']; ?> </p>
                        </div>
                        
                        <div id="price">
                            <h4>Price: </h4>
                            <p><?php echo $rsReviews['price']; ?> </p>
                        </div>
                        
                        <div id="score">
                            <h4>Score: </h4>
                            <p><?php echo $rsReviews['score']; ?> </p>
                        </div>
                        
                        <div id="link-to-buy">
                            <p><a href="<?php echo $rsReviews['linkToBuy']; ?>">Link to buy</a></p>
                        </div>
                    </div>
                    
                        
                    <?php } while ($rsReviews = mysql_fetch_assoc($reviews_query)) ?>

        
       
</div>
       


  
       <script type="text/javascript">
                $rsReviews.toFixed(2)
                
                Number.prototype.formatMoney = function(c, d, t) {
                  var n = this, 
                    c = isNaN(c = Math.abs(c)) ? 2 : c, 
                    d = d == undefined ? "." : d, 
                    t = t == undefined ? "," : t, 
                    s = n < 0 ? "-" : "", 
                    i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", 
                    j = (j = i.length) > 3 ? j % 3 : 0;
                   return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");   
                    
                };
       
       </script>
    

 <?php get_footer(); ?>
