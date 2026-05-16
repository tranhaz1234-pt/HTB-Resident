<?php
get_header();
$city_images = array(
	array( 'TP. Hồ Chí Minh', '72.921 tin đăng', '1920x540.jpg', 'bd-place-large' ),
	array( 'Hà Nội', '40.432 tin đăng', '968x798_1.jpg', '' ),
	array( 'Đà Nẵng', '10.025 tin đăng', '526x526_10.jpg', '' ),
	array( 'Bình Dương', '7.423 tin đăng', '526x526_08.jpg', '' ),
	array( 'Đồng Nai', '3.528 tin đăng', '526x526_11.jpg', '' ),
);
$project_images = array( 'can-ho-mau-the-nelson-private-residences.jpg', '968x798_1.jpg', '1920x540.jpg', '526x526_01.jpg' );
$project_names  = array( 'Hue Heritage', 'Ecolife Retreat', 'Sol Garden', 'Imperia Sky Park' );
$news_items     = array(
	array( 'news-market-01.jpg', 'Nam Long ADC ký kết hợp tác chiến lược với Nishi-Nippon Railroad', 'Thị trường', 'Nguồn cung nhà ở tiếp tục phân hóa theo vị trí, pháp lý và khả năng vận hành sau bàn giao.' ),
	array( 'news-infra-01.jpg', 'Đông Bắc TP.HCM: Hạ tầng mở lối cho sự trỗi dậy của căn hộ Bespoke', 'Hạ tầng', 'Các trục kết nối mới đang tạo động lực cho những khu vực có quy hoạch đồng bộ và tiện ích hoàn chỉnh.' ),
	array( 'property-photo-project-01.jpg', 'Lễ động thổ Block Selavia Aura 1-2 tại dự án Selavia Phú Quốc', 'Dự án', 'Những dự án có tiến độ rõ ràng và sản phẩm khác biệt tiếp tục thu hút nhóm khách mua dài hạn.' ),
);
?>
<main>
	<section class="bd-search-hero">
		<div class="bd-container bd-search-hero-inner">
			<div class="bd-hero-copy">
				<span>HTB Resident</span>
				<h1>Tìm nhà phù hợp với ngân sách và lối sống của bạn</h1>
				<p>Lọc tin mua bán, cho thuê, dự án và khu vực nổi bật trên một giao diện gọn, rõ thông tin và dễ so sánh.</p>
				<div class="bd-hero-stats">
					<div><strong>1.200+</strong><small>Tin đăng chọn lọc</small></div>
					<div><strong>24/7</strong><small>Tư vấn & lịch hẹn</small></div>
					<div><strong>360°</strong><small>Tour xem nhà từ xa</small></div>
				</div>
			</div>
			<div class="bd-home-search">
				<div class="bd-search-tabs">
					<a class="active" href="<?php echo esc_url( get_post_type_archive_link( 'property' ) ); ?>">Mua bán</a>
					<a href="<?php echo esc_url( add_query_arg( 'property_status', 'cho-thue', get_post_type_archive_link( 'property' ) ) ); ?>">Cho thuê</a>
					<a href="<?php echo esc_url( home_url( '/du-an/' ) ); ?>">Dự án</a>
				</div>
				<form action="<?php echo esc_url( get_post_type_archive_link( 'property' ) ); ?>" method="get">
					<span class="bd-search-icon">⌕</span>
					<input type="search" name="s" placeholder="Nhà phố Bình Thạnh, căn hộ Quận 7...">
					<button type="submit">Tìm kiếm</button>
				</form>
				<div class="bd-quick-chips">
					<a href="<?php echo esc_url( add_query_arg( 's', 'chung cư mini', get_post_type_archive_link( 'property' ) ) ); ?>">Chung cư mini</a>
					<a href="<?php echo esc_url( add_query_arg( 'bd_city', 'Hà Nội', get_post_type_archive_link( 'property' ) ) ); ?>">Hà Nội</a>
					<a href="<?php echo esc_url( add_query_arg( 'bd_city', 'TP. HCM', get_post_type_archive_link( 'property' ) ) ); ?>">TP. HCM</a>
					<a href="<?php echo esc_url( add_query_arg( 'property_status', 'cho-thue', get_post_type_archive_link( 'property' ) ) ); ?>">Cho thuê</a>
				</div>
			</div>
		</div>
	</section>

	<section class="bd-section bd-feed-section">
		<div class="bd-container">
			<div class="bd-section-head bd-tabs-head">
				<h2>Bất động sản dành cho bạn</h2>
				<div class="bd-text-tabs">
					<a href="<?php echo esc_url( get_post_type_archive_link( 'property' ) ); ?>">Tin nhà đất bán mới nhất</a>
					<a href="<?php echo esc_url( add_query_arg( 'property_status', 'cho-thue', get_post_type_archive_link( 'property' ) ) ); ?>">Tin nhà đất cho thuê mới nhất</a>
				</div>
			</div>
			<div class="bd-grid bd-listing-grid">
				<?php
				$featured = new WP_Query( bd_pro_property_query_args( 8 ) );
				if ( $featured->have_posts() ) :
					while ( $featured->have_posts() ) :
						$featured->the_post();
						bd_pro_property_card();
					endwhile;
					wp_reset_postdata();
				endif;
				?>
			</div>
		</div>
	</section>

	<section id="du-an" class="bd-section">
		<div class="bd-container">
			<div class="bd-section-head">
				<h2>Dự án bất động sản nổi bật</h2>
				<a class="bd-more-link" href="<?php echo esc_url( home_url( '/du-an/' ) ); ?>">Xem thêm →</a>
			</div>
			<div class="bd-project-grid">
				<?php foreach ( $project_names as $index => $name ) : ?>
					<article class="bd-project-card">
						<div class="bd-project-img">
							<img src="<?php echo esc_url( bd_pro_stock_image_url( $index + 4 ) ); ?>" alt="<?php echo esc_attr( $name ); ?>">
							<span>▧ <?php echo esc_html( 6 - $index ); ?></span>
						</div>
						<div class="bd-project-body">
							<em><?php echo 3 === $index ? 'Sắp mở bán · Dự kiến tháng 03/2026' : 'Đang mở bán'; ?></em>
							<h3><?php echo esc_html( $name ); ?></h3>
							<p><?php echo esc_html( 0 === $index ? '8.664 m²' : ( 1 === $index ? '2.001 m²' : '4,01 ha' ) ); ?></p>
							<span><?php echo esc_html( 0 === $index ? 'Huế, Thừa Thiên Huế' : ( 1 === $index ? 'Bắc Giang, Bắc Giang' : 'Hoài Đức, Hà Nội' ) ); ?></span>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="bd-section bd-location-section">
		<div class="bd-container">
			<h2>Bất động sản theo địa điểm</h2>
			<div class="bd-place-grid">
				<?php foreach ( $city_images as $place_index => $place ) : ?>
					<a class="bd-place-card <?php echo esc_attr( $place[3] ); ?>" href="<?php echo esc_url( add_query_arg( 'bd_city', $place[0], get_post_type_archive_link( 'property' ) ) ); ?>">
						<img src="<?php echo esc_url( bd_pro_stock_image_url( $place_index ?? 0 ) ); ?>" alt="<?php echo esc_attr( $place[0] ); ?>">
						<span><strong><?php echo esc_html( $place[0] ); ?></strong><?php echo esc_html( $place[1] ); ?></span>
					</a>
				<?php endforeach; ?>
			</div>
			<div class="bd-chip-row">
				<?php foreach ( array( 'Vinhomes Central Park', 'Vinhomes Grand Park', 'Vinhomes Smart City', 'Vinhomes Ocean Park', 'Vũng Tàu Pearl', 'Bcons Green View', 'Grandeur Palace' ) as $chip ) : ?>
					<a href="<?php echo esc_url( add_query_arg( 's', $chip, get_post_type_archive_link( 'property' ) ) ); ?>"><?php echo esc_html( $chip ); ?></a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section id="tin-tuc" class="bd-section">
		<div class="bd-container">
			<h2>Tin tức bất động sản</h2>
			<div class="bd-news-grid">
				<?php foreach ( $news_items as $index => $item ) : ?>
					<?php $detail_id = 'home-news-detail-' . $index; ?>
					<article>
						<a href="#<?php echo esc_attr( $detail_id ); ?>" data-news-open="<?php echo esc_attr( $detail_id ); ?>"><img src="<?php echo esc_url( bd_pro_stock_image_url( $index + 12 ) ); ?>" alt="<?php echo esc_attr( $item[1] ); ?>"></a>
						<div><strong><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></strong><h3><a href="#<?php echo esc_attr( $detail_id ); ?>" data-news-open="<?php echo esc_attr( $detail_id ); ?>"><?php echo esc_html( $item[1] ); ?></a></h3></div>
					</article>
				<?php endforeach; ?>
			</div>
			<div class="bd-news-detail-wrap">
				<?php foreach ( $news_items as $index => $item ) : ?>
					<article class="bd-news-detail" id="home-news-detail-<?php echo esc_attr( $index ); ?>" hidden>
						<button type="button" data-news-back>← Quay lại tin tức</button>
						<img src="<?php echo esc_url( bd_pro_stock_image_url( $index + 12 ) ); ?>" alt="<?php echo esc_attr( $item[1] ); ?>">
						<span><?php echo esc_html( $item[2] ); ?> · 4 phút đọc</span>
						<h2><?php echo esc_html( $item[1] ); ?></h2>
						<p><?php echo esc_html( $item[3] ); ?></p>
						<div class="bd-news-detail-body">
							<p><strong>Điểm chính:</strong> <?php echo esc_html( $item[3] ); ?></p>
							<p><strong>Tác động:</strong> người mua nên theo dõi pháp lý, tiến độ hạ tầng và thanh khoản trước khi quyết định.</p>
							<p><strong>Gợi ý:</strong> so sánh thêm các tin cùng khu vực và lưu lại dự án phù hợp để theo dõi.</p>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section id="wiki-bds" class="bd-section bd-tools-section">
		<div class="bd-container">
			<h2>Hỗ trợ tiện ích</h2>
			<div class="bd-tool-grid">
				<a href="<?php echo esc_url( home_url( '/wiki-bds/#feng' ) ); ?>">☯ <span>Xem tuổi xây nhà</span></a>
				<a href="<?php echo esc_url( home_url( '/wiki-bds/#cost' ) ); ?>">▤ <span>Chi phí làm nhà</span></a>
				<a href="<?php echo esc_url( home_url( '/wiki-bds/#loan' ) ); ?>">▦ <span>Tính lãi suất</span></a>
				<a href="<?php echo esc_url( home_url( '/wiki-bds/#feng' ) ); ?>">☀ <span>Tư vấn phong thủy</span></a>
			</div>
		</div>
	</section>

	<section id="phan-tich" class="bd-section bd-category-section">
		<div class="bd-container bd-service-grid">
			<a href="<?php echo esc_url( add_query_arg( 'property_status', 'dang-ban', get_post_type_archive_link( 'property' ) ) ); ?>"><strong>▥</strong><h3>Bất động sản bán</h3><p>Bạn có thể tìm thấy nhà riêng, căn hộ, đất nền và shophouse tại nhiều khu vực.</p></a>
			<a href="<?php echo esc_url( add_query_arg( 'property_status', 'cho-thue', get_post_type_archive_link( 'property' ) ) ); ?>"><strong>▤</strong><h3>Bất động sản cho thuê</h3><p>Cập nhật căn hộ, nhà riêng, văn phòng và mặt bằng kinh doanh.</p></a>
			<a href="<?php echo esc_url( home_url( '/phan-tich-danh-gia/' ) ); ?>"><strong>▶</strong><h3>Đánh giá dự án</h3><p>Thông tin tổng quan dự án, tiện ích, vị trí và phân tích tiềm năng.</p></a>
			<a href="<?php echo esc_url( home_url( '/wiki-bds/' ) ); ?>"><strong>⌂</strong><h3>Wiki BĐS</h3><p>Kinh nghiệm về mua bán, cho thuê, vay mua nhà và phong thủy.</p></a>
		</div>
	</section>
</main>
<?php get_footer(); ?>
