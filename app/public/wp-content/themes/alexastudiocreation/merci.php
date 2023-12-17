<?php
/**
 * Template Name: Merci Custom Template
 *
 * @package Alexastudiocreation
 */

get_header();
?>

<main id="main" class="site-main mt-5 " role="main">
    <div id="merci" class="post-page-container ">
          <?php
          if (have_posts()) :
              while (have_posts()) : the_post();
          ?>
                  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                      <div class="merci-content">
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
    </div>
  </main>

<?php
get_footer();
?>
