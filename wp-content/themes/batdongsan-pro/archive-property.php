<?php get_header(); ?>
<main>
	<section class="bd-page-title">
		<div class="bd-container bd-title-grid">
			<div>
				<div class="bd-breadcrumb">Trang chủ / Nhà đất</div>
				<span class="bd-title-chip">Mua bán & cho thuê</span>
				<h1>Nhà đất bán & cho thuê</h1>
				<p>Tất cả tin bán và cho thuê được gom trong một trang. Dùng bộ lọc để chọn khu vực, mua/thuê, loại hình, giá và diện tích phù hợp.</p>
			</div>
			<div class="bd-title-card">
				<strong><?php echo esc_html( wp_count_posts( 'property' )->publish ); ?> tin đang hiển thị</strong>
				<form action="<?php echo esc_url( get_post_type_archive_link( 'property' ) ); ?>" method="get">
					<input class="bd-field" type="search" name="s" placeholder="Nhập khu vực hoặc tên dự án">
					<button class="bd-btn" type="submit">Tìm kiếm</button>
				</form>
			</div>
		</div>
	</section>
	<section class="bd-section">
		<div class="bd-container bd-archive-layout">
			<aside class="bd-filter-panel">
				<h2 data-i18n="filter_title">Bộ lọc</h2>
				<?php bd_pro_filter_form(); ?>
				<div class="bd-mini-map">
					<strong>Bản đồ khu vực</strong>
					<iframe title="Bản đồ danh sách" src="https://maps.google.com/maps?q=10.8021,106.7413&z=12&output=embed" loading="lazy"></iframe>
					<p>Bản đồ đang dùng iframe Google Maps. Khi có API key, có thể thay bằng marker từng bất động sản và tìm quanh vị trí người dùng.</p>
				</div>
			</aside>
			<div>
				<div class="bd-grid">
				<?php
				$args          = bd_pro_property_query_args( 12 );
				$args['paged'] = max( 1, (int) get_query_var( 'paged' ) );
				$query         = new WP_Query( $args );
				if ( $query->have_posts() ) :
					while ( $query->have_posts() ) :
						$query->the_post();
						bd_pro_property_card();
					endwhile;
				else :
					echo '<p>Chưa có bất động sản phù hợp.</p>';
				endif;
				?>
				</div>
				<?php if ( $query->max_num_pages > 1 ) : ?>
					<nav class="bd-pagination" aria-label="Phân trang bất động sản">
						<?php
						echo wp_kses_post(
							paginate_links(
								array(
									'total'     => $query->max_num_pages,
									'current'   => max( 1, (int) get_query_var( 'paged' ) ),
									'prev_text' => 'Trước',
									'next_text' => 'Sau',
								)
							)
						);
						?>
					</nav>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>
	</section>
</main>
<?php get_footer(); ?>
