
<section class="call-to-action">
  <div class="container">
    <aside>
      <h3><?php echo get_theme_mod( 'smallwins_cta_headline' ); ?></h3>
      <p><?php echo get_theme_mod( 'smallwins_cta_subheadline' ); ?></p>
    </aside>
    <?php if( get_theme_mod('smallwins_cta_link') !== '' && get_theme_mod('smallwins_cta_link_url') !== ''){ ?>
      <a href="<?php echo get_theme_mod('smallwins_cta_link_url')?>" class="button xl"><?php echo get_theme_mod('smallwins_cta_link') ?></a>
    <?php }?>
  </div>
</section>
