<?php
/**
* Page template
*
* @package Alexastudiocreation
*/

get_header();

?>


<div id="secondary" class="post-page-container">
  <main id="main" class="site-main mt-5" role="main">
      <div class="container">

          <?php
          if (have_posts()) :
              while (have_posts()) : the_post();
          ?>
                  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                      <header class="entry-header">
                          <h1 class="single-post-custom-title"><?php the_title(); ?></h1>
                      </header>

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
      </div>
        <!-- BOUTON CONTACT -->
      <a href="<?php echo esc_url(get_permalink(get_page_by_title('Contact'))); ?>" class="contact-button">Contact</a>
  </main>
</div>

<?php get_footer(); ?>
