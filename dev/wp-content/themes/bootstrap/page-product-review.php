<?php
/*
    Template Name: Product Review Template
*/
?>
<?php get_header(); ?>

<div class="container">
  <div class="row">
      
    <div class="col-md-9">
        
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
      
          <?php //get_sidebar( 'product-review' ); ?>
      
  </div>
    <!--Custom Search----------------------------------------------------------------------------------->
 
    
<?php     
           global $wpdb;

                $search= $_GET['search'];

                if (isset($search)) 
                 {                 
               
                $custom_reviews_sql= "SELECT * FROM hockey_review WHERE product_name LIKE " ."'%$search%' or brand LIKE " ."'%$search%' or category LIKE " ."'%$search%' LIMIT 30";
                $custom_reviews_query = mysql_query($custom_reviews_sql) or die(mysql_error());
                $custom_rsReviews = mysql_fetch_assoc($custom_reviews_query);
                //$total_count_sql = "SELECT COUNT(*) FROM hockey_review WHERE product_name LIKE " ."'%$search%' or brand LIKE " ."'%$search%'";
                //$total_count_query = mysql_query($total_count_sql) or die(mysql_error());
                //$total_count_results = mysql_fetch_assoc($total_count_query);
                $num_rows = mysql_num_rows($custom_reviews_query);


                //total score
                $review_score_sum_sql= "SELECT SUM(score) AS value_sum FROM hockey_review WHERE product_name LIKE " ."'%$search%' or brand LIKE " ."'%$search%' or category LIKE " ."'%$search%'";
                $review_score_sum_query = mysql_query($review_score_sum_sql) or die(mysql_error());
                $review_score_sum_result = mysql_fetch_assoc($review_score_sum_query);
                $sum= $review_score_sum_result['value_sum'];
                $avg_score=$sum/$num_rows;
                $avg_score_rounded= round($avg_score,1);
                
              
                ?>
    
        <div class="custom-search-form col-sm-6">      
        <form method="get" id="searchform" action="">
            <p>
                <label>Search:</label> <input type="text" name="search" id="search" value="" />
                <input type="submit" id="searchsubmit" value="SEARCH" />
            </p>
        </form>
    </div>
    
    <div class="num-of-search-results col-sm-6">
        <h4>Number of search results: <?php echo $num_rows ?></h4>
    
    </div>
    
    <div class="average-score col-sm-6">
        <h4>Average Score: <?php echo $avg_score_rounded; ?>/5.0</h4>
    
    </div>
    
    <div class="search-results">
                    <?php do{ ?>
       
                    <div class="col-sm-6 gear-review">
                         <div class="img-container img-responsive">
                            <div id="img-review">
                             <?php 
                                $image =  $custom_rsReviews['upload_image'];
                             ?>
                            
                            <?php 
                                    $content_path = content_url();
                             ?>
                                <img src="<?php echo $content_path . $image; ?>" />
                            </div>         
                        </div>
                        
                        <div id="product-name">
                            <h3><?php echo $custom_rsReviews['product_name']; ?> </h3>
                        </div>
                        
                        <div id="brand">
                            <h4>Brand: </h4>
                            <p><?php echo $custom_rsReviews['brand']; ?> </p>
                        </div>
                        
                        <div id="category">
                            <h4>Category: </h4>
                            <p><?php echo $custom_rsReviews['category']; ?> </p>
                        </div>
                        
                        <div id="description">
                            <h4>Description: </h4>
                            <p><?php echo $custom_rsReviews['form_description']; ?> </p>
                        </div>
                        
                        <div id="price">
                            <h4>Price: </h4>
                            <p><?php echo $custom_rsReviews['price']; ?> </p>
                        </div>
                        
                        <div id="score">
                            <h4>Score: </h4>
                            <p><?php echo $custom_rsReviews['score']; ?> </p>
                        </div>
                        
                        <div id="link-to-buy">
                            <p><a href="<?php echo $custom_rsReviews['linkToBuy']; ?>">Link to buy</a></p>
                        </div>
                    </div>
                    
                        
                    <?php } while ($custom_rsReviews = mysql_fetch_assoc($custom_reviews_query)) ?>
        
    </div>
    <?php } else{ ?>
    
    <div class="custom-search-form col-sm-6">      
        <form method="get" id="searchform" action="">
            <p>
                <label>Search:</label> <input type="text" name="search" id="search" value="" />
                <input type="submit" id="searchsubmit" value="SEARCH" />
            </p>
        </form>
    </div>
    
    <?php } ?>
   
 
       
<!--End Custom Search----------------------------------------------------------------------------------->
    
</div>


<div class="strong-hr">
<hr>
</div>


   <div class="container"> 
   <div class="row">
      <?php     
           global $wpdb;

                 //paginate results
                //This checks to see if there is a page number. If not, it will set it to page 1 
                // User Input
                $cur_page = isset($_GET['cur-page']) ? (int)$_GET['cur-page'] : 1;
                $perPage= isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 20;


                //Positioning
                $start = ($cur_page >1) ? ($cur_page * $perPage) - $perPage :0;

                 //if (!(isset($pagenum))) 
                 //{ 
                 //$pagenum = 1; 
                 //} 
               
                // Query
                $reviews_sql= "SELECT * FROM hockey_review LIMIT {$start}, {$perPage}";
                $reviews_query = mysql_query($reviews_sql) or die(mysql_error());
                $rsReviews = mysql_fetch_assoc($reviews_query);


                //Count Query
                $total_rows_sql = "SELECT * FROM hockey_review";
                $total_reviews_query = mysql_query($total_rows_sql) or die(mysql_error());
               

                //get total number of results
                $total= mysql_num_rows($total_reviews_query);
                //echo $total;

                $pages= ceil($total/$perPage);
                //echo $pages;


                //This is the number of results displayed per page 
                //$page_rows = 2;

                //This tells us the page number of our last page 
                 //$last = ceil($total_rows/$page_rows); 

                 //this makes sure the page number isn't below one, or more than our maximum pages 
                 //if ($pagenum < 1) 
                 //{ 
                 //$pagenum = 1; 
                 //} 
                 //elseif ($pagenum > $last) 
                 //{ 
                 //$pagenum = $last; 
                 //} 

                 //This sets the range to display in our query 
                 //$max = 'limit ' .($pagenum - 1) * $page_rows .',' .$page_rows;


                //$page_reviews_sql= "SELECT * FROM hockey_review $max";
                //$page_reviews_query = mysql_query($page_reviews_sql) or die(mysql_error());
                //$page_rsReviews = mysql_fetch_assoc($page_reviews_query);

    ?>
       
       <div class="all-reviews">
           <h2>All Reviews</h2>
       </div>
                    <?php do{ ?>
       
                    <div class="col-sm-6 gear-review">
                         <div class="img-container img-responsive">
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
                   
       
                    <!-- Show the user what page they are on, and the total number of pages-->
                   <?php //echo " --Page $pagenum of $last-- <p>"; ?>
       
                   <!-- First check if we are on page one. If we are then we don't need a link to the previous page or the first page so we do nothing. If we aren't then we generate links to the first page, and to the previous page.-->
            <?php  
                //$Path=$_SERVER['REQUEST_URI'];
                //$URI='http://dev.herohockeyclub.com'.$Path;
               // echo $URI;
                ?>
                
           
       
       
            <?php /*if ($pagenum == 1) 
               
      
                 {
                
                
                 } 
                 else 
                 {
                 echo " <a href='$URI?pagenum=1'> <<-First</a> ";
                 echo " ";
                 $previous = $pagenum-1;
                 echo " <a href='$URI?pagenum=$previous'> <-Previous</a> ";
                 } 
                  //just a spacer
                 echo " ---- ";
                  //This does the same as above, only checking if we are on the last page, and then generating the Next and Last links
                 if ($pagenum == $last) 
                 {
                 } 
                 else {
                 $next = $pagenum +1;
                 echo " <a href='$URI?pagenum=$next'>Next -></a> ";
                 echo " ";
                 echo " <a href='$URI?pagenum=$last'>Last ->></a> ";
                 } */
             ?>

        
       
</div>
       <div class="row">
            <div class="pagination clear">
                <?php for($x = 1; $x <= $pages; $x++): ?>
                    <a href="?cur-page=<?php echo $x ?>&perpage=<?php echo $perPage; ?>"<?php if($cur_page === $x) { echo ' class="selected"'; } ?>><?php echo $x; ?></a>
                <?php endfor; ?>

            </div>
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
