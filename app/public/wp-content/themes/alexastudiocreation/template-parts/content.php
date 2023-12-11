<?php
/**
 * Content template
 *
 * @package Alexastudiocreation
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'mb-5' ); ?>>
  <?php
    get_template_part( 'template-parts/components/photos/entry-header' );
  ?>
</article>
