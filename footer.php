  <footer class="site-footer">
    <a class="back-to-top">
      <i class="fas fa-chevron-up"></i>
    </a>

    <div class="social-icons">
      <?php if (get_theme_mod( 'smallwins_facebook_page' )) { ?><a class="social-icon" href="<?php echo get_theme_mod( 'smallwins_facebook_page' ); ?>"><i class="fab fa-facebook"></i></a><?php } ?>
      <?php if (get_theme_mod( 'smallwins_instagram_account' )) { ?><a class="social-icon" href="<?php echo get_theme_mod( 'smallwins_instagram_account' ); ?>"><i class="fab fa-instagram"></i></a><?php } ?>
      <?php if (get_theme_mod( 'smallwins_twitter_account' )) { ?><a class="social-icon" href="<?php echo get_theme_mod( 'smallwins_twitter_account' ); ?>"><i class="fab fa-twitter"></i></a><?php } ?>
    </div>

    <div class='footer-widgets'>
      <aside class="footer-widget">
        <?php dynamic_sidebar('footer_left'); ?>
      </aside>
      <aside class="footer-widget">
        <?php dynamic_sidebar('footer_right'); ?>
      </aside>
    </div>
    <!-- <img src="<?php echo get_template_directory_uri() . '/assets/skyline.png'; ?>" /> -->
    <nav class="footer-menu">
      <?php wp_nav_menu(array( 'theme_location' => 'footer' )); ?>
    </nav>
    <p class="copyright">Copyright <?php echo bloginfo('name') . " " . date("Y")?>.
  </footer>
  <?php wp_footer(); ?>
</body>
</html>
