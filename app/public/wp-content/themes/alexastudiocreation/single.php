<?php
/**
 * Single post template file.
 *
 * @package Alexastudiocreation
 */
get_header();
?>

<div id="primary">
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
	</div>

<?php
get_footer();
