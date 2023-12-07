<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * @package Alexastudiocreation
 */

?>

<section class="no-result not-found">
  <header class="page-header">
    <h1 class="page-title"> <?php esc_html_e( 'Aucun Post', 'alexastudiocreation' ); ?> </h1>
  </header>
  <div class="page-content">
    <?php
      if ( is_home() && current_user_can( 'publish_posts' ) ) {
        ?>
        <p>
          <?php
          printf(
            wp_kses(
              __( 'Prêt à publier ton premier post? <a href="%s">Commence ici</a>', 'alexastudiocreation' ),
            [
                'a' => [
                    'href' => []
                ]
            ]
          ),
          esc_url( admin_url( 'post-new.php' ) )
        )

          ?>
        </p>
        <?php
      } else {
        ?>
        <p><?php esc_html_e( "Il semble que la page demandée n'existe pas. Nous sommes navrés." ) ?></p>
        <?php
      }
    ?>
  </div>
</section>
