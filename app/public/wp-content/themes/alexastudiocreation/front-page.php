<?php
/**
* Front page template
*
* @package Alexastudiocreation
*/

get_header();
$args = array(
  'category_name' => 'photos',
  'posts_per_page' => -1,
);

$query = new WP_Query( $args );
?>

<?php

if ( $query->have_posts() ) :
  while ( $query->have_posts() ) : $query->the_post();
    ?>
    <div class="col-lg-4 col-md-6 col-sm-12">
      <?php
      // Afficher uniquement la miniature
      if ( has_post_thumbnail() ) {
        ?>
        <div class="thumbnail">
          <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail( 'thumbnail' ); // 'thumbnail' est la taille de la miniature ?>
          </a>
        </div>
        <?php
      }
      ?>
    </div>
    <?php
  endwhile;
  wp_reset_postdata(); // Réinitialiser la requête
else :
  get_template_part( 'template-parts/content-none' );
endif;
?>
</main>


<?php
get_footer();
?>
