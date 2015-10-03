
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="icon" href="<?php bloginfo('template_directory');?>/images/favicon.ico">

    <title>
        <?php wp_title( '|', true, 'right' ); ?>
        <?php bloginfo( 'name' ) ?>
      
    </title>


    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
     
      
      <?php wp_head(); ?>
      
  </head>

  <body <?php body_class(); ?>>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php bloginfo( 'url' ); ?>"><?php bloginfo( 'name' ); ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            
            <?php 
                $args = array(
                    'menu'   => 'header-menu',
                    'menu_class' => 'nav navbar-nav',
                    'container' => 'false'
                );
                wp_nav_menu( $args );
            ?>
            
            <!--WOOCOMMERCE CART---------------------------->
            
            <?php/* if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { ?>
 
   <?php $count = WC()->cart->cart_contents_count;
    ?><a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php if ( $count > 0 ) echo '(' . $count . ')'; ?></a>
 
<?php } */?>
            
              <!--END WOOCOMMERCE CART---------------------------->

        </div><!--/.navbar-collapse -->
      </div>
    </nav>