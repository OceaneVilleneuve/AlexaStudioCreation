<?php
get_header();
?>

<main id="main" class="site-main mt-5" role="main">
  <a href="<?php echo esc_url(get_permalink(get_page_by_title('Contact'))); ?>"class="available-tag-photo-single-page">Disponible</a>
  <div class="">
      <?php
      if (have_posts()) :
          while (have_posts()) : the_post();
      ?>
              <h1 class="single-post-custom-title">
                  <?php the_title(); ?>
              </h1>
          <div class="grid-item"> <!-- Ajoutez la classe "grid-item" ici -->
              <div class="single-page-photo-content">
                  <div class="display-photo">
                      <?php the_content(); ?>
                  </div>
              </div>
          </div>
      <?php
          endwhile;
      else :
          get_template_part('template-parts/content-none');
      endif;
      ?>

  <!-- BOUTON CONTACT -->
  <a href="<?php echo esc_url(get_permalink(get_page_by_title('Contact'))); ?>" class="contact-button">Contact</a>
  </div>
</main>

<?php
get_footer();
?>
