<?php
/**
 * Template Name: Prestation Custom Template
 *
 * @package Alexastudiocreation
 */

get_header();
?>

  <main id="main" class="site-main mt-5" role="main">


      <?php
      $count = 0;
      if (have_posts()) :
        while (have_posts()) : the_post();
        ?>
        <header class="entry-header">
              <h1 class="single-post-custom-title prestation-custom-title"><?php the_title(); ?></h1>
            </header>
            <?php
          $count++;
      ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class('wp-block-media-text'); ?>>

            <div class="entry-content">
              <?php the_content(); ?>
            </div>
          </article>

      <?php
        endwhile;
      else :
        get_template_part('template-parts/content-none');
      endif;
      ?>

    <!-- BOUTON CONTACT -->
    <a href="<?php echo esc_url(get_permalink(get_page_by_title('Contact'))); ?>" class="contact-button">Contact</a>
  </main>


<?php
get_footer();
?>
