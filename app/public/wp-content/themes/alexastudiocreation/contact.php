<?php
/**
 * Template Name: Contact Custom Template
 *
 * @package Alexastudiocreation
 */

get_header();
?>

<div id="contact" class="post-page-container <?php body_class('page-contact'); ?>">
  <main id="main" class="site-main contact-section mt-5" role="main">
      <div class="container-contact">
          <?php
          if (have_posts()) :
              while (have_posts()) : the_post();
          ?>
                  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                      <!-- <header class="entry-header">
                          <h1 class="single-post-custom-title"><?php the_title(); ?></h1>
                      </header> -->

                      <div class="entry-content-contact">
                          <?php the_content(); ?>
                      </div>
                  </article>

          <?php
              endwhile;
          else :
              get_template_part('template-parts/content-none');
          endif;
          ?>
      </div>
  </main>
</div>

<?php
get_footer();
?>
