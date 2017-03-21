<?php
/**
 * IAN CUSTOM HOME TEMPLATE FOR POSTS (copy of index then modded)
 */

get_header(); ?>

<div id="page" role="main">
	<article class="main-content">
	<?php if ( have_posts() ) : ?>

		<div class="row small-up-1 medium-up-2 large-up-3">

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>



				<div class="column">

				<?php the_post_thumbnail(); ?>

			<?php get_template_part( 'template-parts/content', get_post_format() ); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class('blogpost-entry'); ?>>
					<header>
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<?php foundationpress_entry_meta(); ?>
					</header>
					<div class="entry-content">
						<?php the_content( __( 'Continue reading...', 'foundationpress' ) ); ?>
					</div>
					<footer>
						<?php $tag = get_the_tags(); if ( $tag ) { ?><p><?php the_tags(); ?></p><?php } ?>
					</footer>
					<hr />
				</div>

				</div>


		<?php endwhile; ?>

		</div>

		<?php else : ?>
			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; // End have_posts() check. ?>

		<?php /* Display navigation to next/previous pages when applicable */ ?>
		<?php
		if ( function_exists( 'foundationpress_pagination' ) ) :
			foundationpress_pagination();
		elseif ( is_paged() ) :
		?>
			<nav id="post-nav">
				<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
				<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
			</nav>
		<?php endif; ?>

	</article>
	<?php get_sidebar(); ?>

</div>

<?php get_footer();
