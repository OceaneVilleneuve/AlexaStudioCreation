<?php
/**
 * Single post template file.
 *
 * @package Alexastudiocreation
 */
get_header();
?>


<div id="primary" class="post-page-container">
  <main id="main" class="site-main mt-5" role="main">
    <?php
    if ( have_posts() ) :
      ?>
      <div class="container">
        <?php
        if ( is_home() && ! is_front_page() ) {
          ?>
          <header class="mb-5">
            <h1 class="">
              <?php single_post_title(); ?>
            </h1>
          </header>
          <?php
        }
            // Start the loop.
              while ( have_posts() ) : the_post();
              ?>
              <h1 class="single-post-custom-title">
                  <?php the_title(); ?>
              </h1>
              <?php
              get_template_part( 'template-parts/content' );
              endwhile;
              ?>
          </div>
        </div>
        <?php

        else :

          get_template_part( 'template-parts/content-none' );

        endif;

          ?>
      </div>
  </main>
  <!-- BOUTON CONTACT -->
  <a href="<?php echo esc_url(get_permalink(get_page_by_title('Contact'))); ?>" class="contact-button">Contact</a>
</div>


<?php
get_footer();
