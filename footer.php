<?php wp_footer(); ?>
</main>
<div id="footer-wrapper" class="bg-dark">
<div class="container">
  <footer class="text-light pt-5">
    <div class="row py-4">
      <div class="col-sm-2">

      </div>
      
      <div class="col-sm-3">
        <h5>Explore</h5>
          <?php
            $args = [
              'theme_location'        =>  'secondary',
              'menu_class'            =>  'nav flex-column',
              'add_footer_li_class'   =>  'nav-item mb-2',
            ];
            wp_nav_menu($args);
          ?>
      </div>

      <div class="col-sm-3">
        <h5>Check More</h5>
        <ul class="nav flex-column">
          <?php
              $categories = get_categories();
              foreach ($categories as $category) {
                  echo "<li class='nav-item mb-2'><a class='nav-link p-0 text-muted' href='" . get_category_link($category->term_id) . "'>" . $category->name . "</a></li>";
              }
          ?>
        </ul>
      </div>

      <div class="col-sm-4">
        <form>
          <h5>Subscribe to our newsletter</h5>
          <p>Monthly digest of whats new and exciting from us.</p>
          <div class="d-flex w-100 gap-2">
            <label for="newsletter1" class="visually-hidden">Email address</label>
            <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
            <button class="btn btn-primary" type="button">Subscribe</button>
          </div>
        </form>
      </div>
    </div>

    <div id="copyright" class="d-flex justify-content-between py-3 border-top">
      <p>
        <?php 
        printf(
          'Copyright &copy %s. %s by <a href="%s" target="_blank">%s</a>. %s.',
          date_i18n( 'Y' ),
          get_bloginfo('name'),
          WPBOOTSTRAP_THEME_AUTH_URL,
          WPBOOTSTRAP_THEME_AUTH,
          get_option( 'wpbootstrap_copyright_text', __('copyright', 'wpbootstrap') ),
        );
        ?>
        
      </p>
      <ul class="list-unstyled d-flex">
        <li class="ms-4"><a class="link-light" href="#"><i class="bi bi-twitter"></i></a></li>
        <li class="ms-4"><a class="link-light" href="#"><i class="bi bi-instagram"></i></a></li>
        <li class="ms-4"><a class="link-light" href="#"><i class="bi bi-facebook"></i></svg></a></li>
      </ul>
    </div>

  </footer>
</div>
</div>

</body>
</html>