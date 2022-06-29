<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>WP Boostrap</title>

    <?php wp_head(); ?>
  </head>
  <body>
  <!-- Navigation Menu -->
  <?php
  if( is_user_logged_in() ) {
    $add_space_admin_bar = 'admin-bar';
  }
  ?>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark py-4 <?=$add_space_admin_bar; ?>">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">Fixed navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <?php
          $args = array(
              'theme_location'    =>  'primary',
              'container_class'   =>  'collapse navbar-collapse',
              'add_li_class'      =>  'nav-item',
              'menu_class'        =>  'navbar-nav me-auto mb-2 mb-md-0',
          );

          wp_nav_menu($args);
        ?>
        <!-- <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-primary" type="submit">Search</button>
        </form> -->
        <?php
            get_search_form();
        ?>
      </div>
  </div>
</nav>
<main class="spacer mb-4">
<?php
  if( is_front_page() ) {
    ?>
    <div id="myCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class=""></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" class="active" aria-current="true"></button>
    </div>
    <div class="carousel-inner text-center bg-dark">
      <div class="carousel-item">

        <div class="container">
          <div class="carousel-caption">
            <h1>Example headline.</h1>
            <p>Some representative placeholder content for the first slide of the carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">

        <div class="container">
          <div class="carousel-caption">
            <h1>Another example headline.</h1>
            <p>Some representative placeholder content for the second slide of the carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item active">

        <div class="container">
          <div class="carousel-caption">
            <h1>One more for good measure.</h1>
            <p>Some representative placeholder content for the third slide of this carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
    <?php
  } elseif( is_search() ) {
    ?>
    <div class="container">
      <div class="row justify-content-center align-items-center h-100 py-4 bg-light">
          <div class="col-md-6">
              <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-center py-0 bg-transparent">
                      <li class="breadcrumb-item"><a href="/">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">
                        <?php 
                          echo "Search results for: "
                        ?>
                      </li>
                  </ol>
              </nav>
              <h1 class="text-center"><?php the_search_query(); ?></h1>
          </div>
      </div>
    </div>
    <?php
  } elseif( !is_single() ) {
    ?>
    <div class="container">
      <div class="row justify-content-center align-items-center h-100 py-4">
          <div class="col-md-6">
              <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-center py-0 bg-transparent">
                      <li class="breadcrumb-item"><a href="/">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page"><?php echo single_post_title(); ?></li>
                  </ol>
              </nav>
              <h1 class="text-center"><?php echo single_post_title(); ?></h1>
          </div>
      </div>
    </div>
    <?php
  } 
?>
