<?php wp_footer(); ?>
</main>
<div id="footer-wrapper" class="bg-dark">
<div class="container">
  <footer class="text-light pt-5">
    <div class="row py-4">
      <div class="col-2">
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

      <div class="col-2">
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

      <div class="col-2">
        <h5>Section</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
        </ul>
      </div>

      <div class="col-4 offset-1">
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
      <p>&copy; 2022 wp-bootstrap by <a href="https://www.linkedin.com/in/dseruela/">@danseruela</a>. All rights reserved.</p>
      <ul class="list-unstyled d-flex">
        <li class="ms-3"><a class="link-light" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a></li>
        <li class="ms-3"><a class="link-light" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
        <li class="ms-3"><a class="link-light" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
      </ul>
    </div>
  </footer>
</div>
</div>
<!-- <footer class="blog-footer bg-dark text-light">
  <p>Blog template built for <a href="#">WP Bootstrap</a> by <a href="https://www.linkedin.com/in/dseruela/">@danseruela</a>.</p>
  <p>
    <a href="#">Back to top</a>
  </p>
</footer> -->
</body>
</html>