<?php get_header(); ?>
<main>
	<section class="bd-page-title">
		<div class="bd-container">
			<div class="bd-breadcrumb">Trang chủ / Nội dung</div>
			<span class="bd-title-chip">HTB Resident</span>
			<h1><?php echo esc_html( get_the_archive_title() ?: get_bloginfo( 'name' ) ); ?></h1>
		</div>
	</section>
	<section class="bd-section">
		<div class="bd-container">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					?>
					<article class="bd-panel" style="margin-bottom:18px">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<?php the_excerpt(); ?>
					</article>
					<?php
				endwhile;
			endif;
			?>
		</div>
	</section>
</main>
<?php get_footer(); ?>
