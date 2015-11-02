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
            
            <?php endwhile; ?>
    </div>
    </div>


<div class="container form">


    <form action = "../process-gear-review-submission/" method="post" name="submit-review-form" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
        

          <div class="form-group">
            <label for="productName" class="col-sm-2 control-label" >Product Name </label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="productName" name="productName" placeholder="Ex: Warrior Dynasty HD1 Grip" required>
            </div>
          </div>

        <div class="form-group">
        <label for="brand" class="col-sm-2 control-label">Brand</label>
        <div class="col-sm-10">
       
            <select class="form-control" id="brand" name="brand">
              <option value="bauer">Bauer</option>
              <option value="ccm">CCM</option>
              <option value="eagle">Eagle</option>
              <option value="easton">Easton</option>
              <option value="graf">Graf</option>
              <option value="mission">Mission</option>
              <option value="pro_stock">Pro Stock</option>
              <option value="reebok">Reebok</option>
              <option value="sherwood">Sherwood</option>
              <option value="warrior">Warrior</option>
              <option value="other">Other</option>
            </select>
        </div>
        </div>
      

        <div class="form-group">
        <label for="category" class="col-sm-2 control-label">Category</label>
        <div class="col-sm-10">
            
            <select class="form-control" id="category" name="category">
              <option value="cages_visors">Cages and Visors</option>
              <option value="elbow_pads">Elbow Pads</option>
              <option value="gloves">Gloves</option>
              <option value="helmets">Helmets</option>
              <option value="jocks">Jocks</option>
              <option value="pants">Pants</option>
              <option value="shin_pad">Shin Pads</option>
              <option value="shoulder_pads">Shoulder Pads</option>
              <option value="skates">Skates</option>
              <option selected="selected" value="sticks">Sticks</option>
              <option value="other">Other</option>
            </select>
        </div>
        </div>


        <div class="form-group">
        <label for="form_description" class="col-sm-2 control-label">Review</label>
        <div class="col-sm-10">
          <input type="textarea" class="form-control" id="form_description" name="form_description" placeholder="Ex: This stick has been great. After two months of use the stick still feels sturdy and whippy required">
        </div>
      </div>

        <div class="form-group">
        <label for="price" class="col-sm-2 control-label">Price </label>          
        <div class="col-sm-10">
            <div class="input-group">
                <span class="input-group-addon" >$</span>
                <input type="number" class="form-control" id="price" name="price" placeholder="Ex: $299.99">
            </div>
        </div>
      </div>

        <div class="form-group">
        <label for="score" class="col-sm-2 control-label">Score</label>
        <div class="col-sm-10">
            <select class="form-control" id="score" name="score">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        </div>

        <div class="form-group">
        <label for="upload_image" class="col-sm-2 control-label">Upload</label>
        <div class="col-sm-10">
            <input type="file" class="form-control btn btn-default btn-file" id="upload_image" name="upload_image" placeholder="Please upload an image or video of the product">
        </div>
        </div>

        <div class="form-group">
        <label for="linkToBuy" class="col-sm-2 control-label">Link to Buy</label>
        <div class="col-sm-10">
          <input type="url" class="form-control" id="linkToBuy" name="linkToBuy" placeholder="Ex: Please enter a URl for a website with a good price on this product">
        </div>
      </div>  


      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" name="submit" class="btn btn-default gear-submit">Submit Review</button>
        </div>
      </div>
        

    </form>
</div> <!--end form container-->
<!--<script type="text/javascript">
    function validateForm()
    {
    /* Validating Product Name field */
    var x=document.forms["submit-review-form"]["productName"].value;
    if (x==null || x=="")
     {
     alert("Product Name must be filled out");
     return false;
     }
    
    }
    }
</script>-->



    
 


 <?php get_footer(); ?>
    
    </div>
