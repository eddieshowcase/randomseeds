<?php
/**
 * IAN CUSTOM HOME TEMPLATE FOR POSTS (copy of index then modded)
 */

get_header(); ?>

<div id="page" class="homepage page-wide" role="main">
	<article class="main-content p0">

		<!--		<h1 class="text-center mb-">A portfolio of sorts.</h1>-->
		<h1 id="quip" class="ml mr">
			I call them <i>projects</i> because <i>work</i> implies no fun.
		</h1>

		<?php if ( have_posts() ) : ?>

		<div class="row small-up-1 medium-up-2 large-up-3 page-wide">

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

				<div class="column mb">

					<?php //get_template_part( 'template-parts/content', get_post_format() ); ?>

					<div id="post-<?php the_ID(); ?>" <?php post_class('blogpost-entry border-randomseeds round-corners card-randomseeds'); ?>>

						<a href="<?php the_permalink(); ?>">

							<?php //the_post_thumbnail(); ?>
							<!--							<img src="--><?php //the_post_thumbnail_url(); ?><!--" class="round-top-corners"/>-->
							<!--							<div class="round-top-corners"
									 style="background: url(<?php //the_post_thumbnail_url(); ?>); background-size: cover; background-position: center; height: 320px;">
							</div> -->

							<?php
							$post_id = get_the_ID();

							$post_thumb_path = get_post_meta( $post_id, 'thumb', true);

							// use a specific post thumbnail first
							if (!empty($post_thumb_path)) {
								//$post_thumb = "http://localhost/randomseeds/images/thumbs/".$post_thumb_path;
								$post_thumb = "http://randomseeds.com/images/thumbs/".$post_thumb_path;
							}
							// else use featured image if one exists
							else if (has_post_thumbnail()) {
								$size = "medium_large";
								$image_id = get_post_thumbnail_id();
								$image_attrs = wp_get_attachment_image_src($image_id, $size);
								$post_thumb = $image_attrs[0];
								//$post_thumb = the_post_thumbnail_url();
							}
							// else grab the first image found in the post
							// TODO

							// last case: use a default stock image
							if (empty($post_thumb)) {
								$post_thumb = "http://randomseeds.com/images/random_rubix_2k.jpg";
							}

							?>
							<img src="<?php echo $post_thumb ?>"/>

							<header class="p-">
								<h2 class="mb0"><?php the_title(); ?></h2>
								<?php echo(get_the_excerpt()); ?>
							</header>

						</a>

						<!--<footer>-->
						<!--	--><?php //$tag = get_the_tags(); if ( $tag ) { ?><!--<p>--><?php //the_tags(''); ?><!--</p>--><?php //} ?>
						<!--</footer>-->

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
