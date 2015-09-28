<?php
/*
    Template Name: Submit Gear Review Template
*/
?>
<?php

get_header(); 

?>



<div class="container">

<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				
				<h1><?php the_title(); ?></h1>
				
				<?php the_content(); ?>



    <form action = "<?php echo get_template_directory(); ?> process_form_review.php" method="post" name="submit-review-form" class="form-horizontal">

      <div class="form-group">
        <label for="productName" class="col-sm-2 control-label">Product Name- Ex: Warrior Dynasty HD1 Grip</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="productName" name="productName">
        </div>
      </div>

        <div class="form-group">
        <label for="brand" class="col-sm-2 control-label">Brand</label>
        <div class="col-sm-10">
          <input type="select" class="form-control" id="brand" name="brand" placeholder="Select the brand from the dropdown">
            <select class="form-control">
              <option>Bauer</option>
              <option>CCM</option>
              <option>Eagle</option>
              <option>Easton</option>
              <option>Graf</option>
              <option>Mission</option>
              <option>Pro Stock</option>
              <option>Reebok</option>
              <option>Sherwood</option>
              <option>Warrior</option>
              <option>Other</option>
            </select>
        </div>
      </div>

        <div class="form-group">
        <label for="category" class="col-sm-2 control-label">Category</label>
        <div class="col-sm-10">
          <input type="select" class="form-control" id="category" id="category" placeholder="Select the category from the dropdown">
            <select class="form-control">
              <option>Cages/ Visors</option>
              <option>Elbow Pads</option>
              <option>Gloves</option>
              <option>Helmets</option>
              <option>Jocks</option>
              <option>Pants</option>
              <option>Shin Pads</option>
              <option>Shoulder Pads</option>
              <option>Skates</option>
              <option>Sticks</option>
              <option>Other</option>
            </select>
        </div>
      </div>

        <div class="form-group">
        <label for="description" class="col-sm-2 control-label">Review</label>
        <div class="col-sm-10">
          <input type="textarea" class="form-control" id="form-description" name="form-description" placeholder="Ex: This stick has been great. After two months of use the stick still feels sturdy and whippy">
        </div>
      </div>

        <div class="form-group">
        <label for="price" class="col-sm-2 control-label">Price</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="price" name="price" placeholder="Ex: $299.99">
        </div>
      </div>

        <div class="form-group">
        <label for="score" class="col-sm-2 control-label">Score</label>
        <div class="col-sm-10">
          <input type="select" class="form-control" id="score" name="score" placeholder="1= Bad, 5= Amazing">
            <select class="form-control">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>
      </div>

        <div class="form-group">
        <label for="upload" class="col-sm-2 control-label">Upload</label>
        <div class="col-sm-10">
            <input type="file" class="form-control btn btn-default btn-file" id="upload" name="upload" placeholder="Please upload an image or video of the product">
            </div>
        </div>

        <div class="form-group">
        <label for="linkToBuy" class="col-sm-2 control-label">Link to Buy</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="linkToBuy" name="linkToBuy" placeholder="Ex: Please enter a URl for a website with a good price on this product">
        </div>
      </div>  


      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Submit Review</button>
        </div>
      </div>
        

    </form>
</div> <!--end form container-->

				
				

			<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #primary -->


<script type="text/javascript">
/* JS validation code here */
    function validateForm()
    {
    /* Validating productName field */
    var x=document.forms["submit-review-form"]["productName"].value;
    if (x==null || x=="")
     {
     alert("Product Name must be filled out");
     return false;
     }
        
    /* Validating brand field */
    var x=document.forms["submit-review-form"]["brand"].value;
    if (x==null || x=="")
     {
     alert("Brand must be filled out");
     return false;
     }
        
         /* Validating brand field */
    var x=document.forms["submit-review-form"]["category"].value;
    if (x==null || x=="")
     {
     alert("Category must be filled out");
     return false;
     }
        
    
    }
</script> 

 <?php get_footer(); ?>
