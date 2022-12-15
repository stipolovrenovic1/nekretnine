<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <script type = "text/javascript" src= <?php echo get_template_directory_uri();?>'/js/skripta.js'></script>
    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">

    <title>AGENCIJA ZA NEKRETNINE</title>
    <?php wp_head(); ?>
  </head>
  <body style="overflow-x: hidden;">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav" style="background-color: grey; height: 100px;">
            <div class="container">
                <a style="color: white; font-weight: bold; position: relative; right: 150px;" class="navbar-brand" href="index.php">AGENCIJA ZA NEKRETNINE</a>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <?php
                        $args = array(
                            'theme_location'  =>  'glavni-menu',
                            'menu_id'       =>  'nekretnine-glavni-menu',
                            'menu_class'    =>  'navbar-nav ml-auto',
                            'container'     =>  'div',
                            'container_class' =>  'collapse navbar-collapse',
                            'container_id'  => 'navbarReponsive'
                        );
                        wp_nav_menu( $args );

                    ?>   
                </div>
            </div>
        </nav>