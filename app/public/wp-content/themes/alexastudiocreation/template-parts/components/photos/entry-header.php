<?php
/**
 * Template for entry header
 *
 * @package Alexastudiocreation
 */

$the_post_id = get_the_ID();
$has_post_thumbnail = has_post_thumbnail( $the_post_id );
?>

<header class="entry-header">
  <?php
    // Featured image
    if ( $has_post_thumbnail ) {
      ?>
      <div class="entry-image mb-3">
        <a href="<?php echo esc_url( get_permalink() ); ?>">
          <?php
          the_post_thumbnail(
            'featured-large',
            [
              'sizes' => '(max-width: 590px) 590px, 425px',
              'class' => 'attachment-features-large size-featured-image'
            ]
          );
          ?>
        </a>
      </div>
      <?php
    }
  ?>
</header>
