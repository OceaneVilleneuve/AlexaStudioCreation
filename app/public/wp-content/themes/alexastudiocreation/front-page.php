<?php
/**
 * Front page template
 *
 * @package Alexastudiocreation
 */

get_header();
$args = array(
    'category_name'   => 'photos',
    'posts_per_page'  => -1,
);

$query = new WP_Query( $args );
?>

<main id="main" class="site-main">

    <div class="row">
        <?php

        if ( $query->have_posts() ) :
            while ( $query->have_posts() ) : $query->the_post();
                ?>
                <?php
                // Afficher uniquement la miniature
                if ( has_post_thumbnail() ) {
                  ?>
                  <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="<?php the_permalink(); ?>">
                      <?php the_post_thumbnail(
                        'medium', // Taille de l'image (vous pouvez utiliser d'autres tailles prédéfinies telles que 'medium', 'thumbnail', etc.)
                        [
                            'class' => 'attachment-large size-large', // Classe CSS pour personnaliser le style de l'image
                            'alt'   => get_the_title(), // Texte alternatif basé sur le titre de l'article
                        ]
                      );
                      ?>
                    </a>
                    </div>
                    <?php
                }
                ?>
                <?php
            endwhile;
            wp_reset_postdata(); // Réinitialiser la requête
        else :
            get_template_part( 'template-parts/content-none' );
        endif;
        ?>
    </div>

</main>

<?php
get_footer();
?>
