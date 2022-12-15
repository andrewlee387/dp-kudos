
<?php get_header(); ?>
	<div id="content" class="narrowcolumn">
<?php is_tag(); ?>
		<?php if (have_posts()) : ?>

 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		<h2 class="pagetitle">Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h2 class="pagetitle">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="pagetitle">Archive for <?php the_time('F jS, Y'); ?></h2>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="pagetitle">Archive for <?php the_time('F, Y'); ?></h2>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="pagetitle">Archive for <?php the_time('Y'); ?></h2>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="pagetitle">Author Archive</h2>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="pagetitle">Blog Archives</h2>
 	  <?php } ?>


		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>
		<button id="test">hi</button>
		<script>
			window.addEventListener('load', function () {
				// confetti();

				// setTimeout(() => {
				// 	// do this for 30 seconds
				// 	var duration = 2 * 1000;
				// 	var end = Date.now() + duration;

				// 	(function frame() {
				// 	// launch a few confetti from the left edge
				// 	confetti({
				// 		particleCount: 7,
				// 		angle: 60,
				// 		spread: 55,
				// 		origin: { x: 0 }
				// 	});
				// 	// and launch a few from the right edge
				// 	confetti({
				// 		particleCount: 7,
				// 		angle: 120,
				// 		spread: 55,
				// 		origin: { x: 1 }
				// 	});

				// 	// keep going until we are out of time
				// 	if (Date.now() < end) {
				// 		requestAnimationFrame(frame);
				// 	}
				// 	}());
				// }, 2000);
			})

		</script>
		<?php while (have_posts()) : the_post(); ?>
		<div style="margin: 2px; padding: 20px; border: 1px solid gray; max-width: 500px; margin: 5px auto;">
			<div style="display: flex; align-items: center; gap: 20px;">
				<?php echo get_avatar( get_post_meta(get_the_ID(), 'recipient', true) , 60 ); ?>

				<div>
					<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
					<small><?php the_time('l, F jS, Y') ?></small>
					<div class="entry">
						<?php the_content() ?>
					</div>
				</div>
			</div>
		</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
