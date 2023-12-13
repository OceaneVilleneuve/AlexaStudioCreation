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
  <span class="available-tag">Disponible</span>
    <div class="front-page-content">
        <div class="grid">
            <?php
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    ?>
                    <?php
                    // Afficher uniquement la miniature
                    if (has_post_thumbnail()) {
                        ?>
                        <div class="col-lg-4 col-md-6 col-sm-12 ">
                            <a href="<?php the_permalink(); ?>" class="thumbnail-container">
                                <?php the_post_thumbnail(
                                    'medium',
                                    [
                                        'class' => 'custom-thumbnail',
                                        'alt'   => get_the_title(),
                                    ]
                                ); ?>
                                <button class="custom-button-for-home snow-button">En savoir plus</button>
                            </a>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                endwhile;
                wp_reset_postdata(); // Réinitialiser la requête
            else :
                get_template_part('template-parts/content-none');
            endif;
            ?>
        </div>

    <!-- BOUTON CONTACT -->
    <a href="<?php echo esc_url(get_permalink(get_page_by_title('Contact'))); ?>" class="contact-button">Contact</a>
    </div>

</main>

<?php
get_footer();
?>
