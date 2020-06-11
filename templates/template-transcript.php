<?php
/**
 * Template to display transcripts of podcasts.
 *
 * Based on twentynineteen
 *
 * @package tenup_podcasting
 */

get_header();
?>
<div class="wrap">
	<section id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php
					the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
					?>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php
					$podcast_transcript = get_post_meta( get_the_ID(), 'podcast_transcript', true );
					if ( ! empty( $podcast_transcript ) ) {
						echo wp_kses_post( $podcast_transcript );
					} else {
						echo 'No transcript available';
					}
					?>
				</div><!-- .entry-content -->

			</article><!-- #post-${ID} -->
				<?php

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</section><!-- #primary -->
</div>
<?php
get_footer();
