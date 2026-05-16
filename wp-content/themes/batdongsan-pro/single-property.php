<?php get_header(); ?>
<main>
	<?php
	while ( have_posts() ) :
		the_post();
		$post_id      = get_the_ID();
		$favorite_url = is_user_logged_in()
			? wp_nonce_url( add_query_arg( 'bd_favorite', $post_id ), 'bd_favorite_' . $post_id )
			: add_query_arg( 'redirect_to', rawurlencode( get_permalink() ), home_url( '/dang-nhap/' ) );

		$status_terms = get_the_terms( $post_id, 'property_status' );
		$is_rental    = false;
		$is_payable   = false;

		if ( ! empty( $status_terms ) && ! is_wp_error( $status_terms ) ) {
			foreach ( $status_terms as $status_term ) {
				if ( 'cho-thue' === $status_term->slug ) {
					$is_rental = true;
				}
				if ( in_array( $status_term->slug, array( 'cho-thue', 'dang-ban', 'du-an-moi' ), true ) ) {
					$is_payable = true;
				}
			}
		}

		$payment_title  = $is_rental ? 'Thanh toán tiền thuê / đặt cọc' : 'Thanh toán đặt cọc';
		$payment_amount = $is_rental ? '2.000.000' : '50.000.000';
		?>
		<section class="bd-single-hero">
			<div class="bd-container bd-single-grid">
				<div>
					<div class="bd-gallery-main">
						<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail( 'full' );
						}
						?>
					</div>

					<?php
					$gallery_images = get_post_meta( $post_id, '_bd_gallery_images', true );
					$gallery_images = is_array( $gallery_images ) ? array_filter( array_map( 'absint', $gallery_images ) ) : array();
					if ( $gallery_images ) :
						?>
						<div class="bd-gallery-strip">
							<?php foreach ( $gallery_images as $image_id ) : ?>
								<a href="<?php echo esc_url( wp_get_attachment_image_url( $image_id, 'full' ) ); ?>" target="_blank" rel="noopener">
									<?php echo wp_get_attachment_image( $image_id, 'medium_large' ); ?>
								</a>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

					<h1 class="bd-single-title"><?php echo esc_html( bd_pro_property_title( $post_id ) ); ?></h1>
					<p class="bd-location"><?php echo esc_html( bd_pro_clean_text( bd_pro_property_meta( $post_id, 'address' ) ) ); ?></p>

					<div class="bd-action-row">
						<a class="bd-btn bd-btn-light" href="<?php echo esc_url( $favorite_url ); ?>">Lưu tin yêu thích</a>
						<a class="bd-btn bd-btn-light" href="#lich-xem-nha">Đặt lịch xem nhà</a>
						<?php if ( $is_payable ) : ?>
							<a class="bd-btn" href="#rental-payment-modal" data-bd-modal-open><?php echo esc_html( $payment_title ); ?></a>
						<?php endif; ?>
					</div>

					<div class="bd-content"><?php the_content(); ?></div>

					<section class="bd-detail-section">
						<h2>Bản đồ và tiện ích xung quanh</h2>
						<div class="bd-map">
							<?php if ( bd_pro_property_meta( $post_id, 'virtual_tour' ) ) : ?>
								<iframe title="Bản đồ bất động sản" src="https://maps.google.com/maps?q=<?php echo esc_attr( bd_pro_property_meta( $post_id, 'lat' ) ); ?>,<?php echo esc_attr( bd_pro_property_meta( $post_id, 'lng' ) ); ?>&z=15&output=embed" loading="lazy"></iframe>
							<?php endif; ?>
						</div>
						<div class="bd-insight-grid">
							<div><strong>Trường học</strong><span>5-8 phút đi xe</span></div>
							<div><strong>Bệnh viện</strong><span>10 phút đi xe</span></div>
							<div><strong>Chợ / Siêu thị</strong><span>700m - 1,2km</span></div>
							<div><strong>Trạm xe buýt</strong><span>3 phút đi bộ</span></div>
							<div><strong>Chất lượng không khí</strong><span>Đang chờ API môi trường</span></div>
							<div><strong>Tiếng ồn</strong><span>Cần cập nhật dữ liệu khu vực</span></div>
						</div>
					</section>

					<section class="bd-detail-section">
						<h2>Trải nghiệm xem nhà</h2>
						<div class="bd-immersive-grid">
							<div class="bd-panel">
								<strong>Virtual Tour 360 / VR</strong>
								<p>Sẵn sàng nhúng link tour 360, video VR hoặc Matterport vào trường quản trị.</p>
								<a class="bd-btn bd-btn-light" href="<?php echo esc_url( bd_pro_property_meta( $post_id, 'virtual_tour' ) ?: '#' ); ?>" target="_blank" rel="noopener">Mở tour</a>
							</div>
							<div class="bd-panel">
								<strong>Sơ đồ mặt bằng tương tác</strong>
								<p>Đặt ảnh mặt bằng tại đây. Mỗi phòng có thể gắn ảnh thực tế khi có dữ liệu.</p>
							</div>
							<div class="bd-panel">
								<strong>View từ ban công</strong>
								<p><?php echo esc_html( bd_pro_property_meta( $post_id, 'balcony_view' ) ); ?></p>
							</div>
						</div>
					</section>

					<section class="bd-detail-section">
						<h2>Phân tích tài chính</h2>
						<div class="bd-finance">
							<label>Giá nhà (tỷ VND)<input class="bd-field" id="bd-loan-price" type="number" value="<?php echo esc_attr( bd_pro_property_meta( $post_id, 'price_number' ) ); ?>" step="0.1"></label>
							<label>Vay (%)<input class="bd-field" id="bd-loan-ratio" type="number" value="70"></label>
							<label>Lãi suất năm (%)<input class="bd-field" id="bd-loan-rate" type="number" value="9.5" step="0.1"></label>
							<label>Thời hạn (năm)<input class="bd-field" id="bd-loan-years" type="number" value="20"></label>
							<div class="bd-loan-result"><span>Trả hằng tháng ước tính</span><strong id="bd-loan-result">--</strong></div>
						</div>
						<div class="bd-chart-placeholder">Dự báo tăng trưởng giá và so sánh bất động sản trong bán kính 1-2km sẽ dùng dữ liệu giao dịch lịch sử khi có API hoặc CSV nguồn.</div>
					</section>

					<section class="bd-detail-section">
						<h2>Checklist pháp lý</h2>
						<ul class="bd-checklist">
							<li>Kiểm tra sổ đỏ / sổ hồng và thông tin chủ sở hữu</li>
							<li>Tra cứu quy hoạch tại cổng thông tin địa phương</li>
							<li>Lập hợp đồng đặt cọc và thời hạn công chứng</li>
							<li>Công chứng, nộp thuế, đăng bộ / sang tên</li>
						</ul>
					</section>
				</div>

				<aside class="bd-panel">
					<?php if ( isset( $_GET['lead_sent'] ) ) : ?>
						<div class="bd-notice">Đã gửi thông tin liên hệ.</div>
					<?php endif; ?>
					<?php if ( isset( $_GET['appointment_sent'] ) ) : ?>
						<div class="bd-notice">Đã ghi nhận lịch xem nhà.</div>
					<?php endif; ?>
					<?php if ( isset( $_GET['payment_success'] ) ) : ?>
						<div class="bd-notice">Thanh toán thành công. Hệ thống đã ghi nhận giao dịch.</div>
					<?php endif; ?>
					<?php if ( isset( $_GET['payment_waiting'] ) ) : ?>
						<div class="bd-notice">Đã ghi nhận yêu cầu thanh toán. Vui lòng hoàn tất chuyển khoản theo hướng dẫn.</div>
					<?php endif; ?>
					<?php if ( isset( $_GET['payment_failed'] ) ) : ?>
						<div class="bd-notice bd-notice-error">Thanh toán chưa hoàn tất. Vui lòng thử lại hoặc liên hệ hỗ trợ.</div>
					<?php endif; ?>

					<div class="bd-price"><?php echo esc_html( bd_pro_property_price_label( $post_id ) ); ?></div>
					<div class="bd-specs">
						<span><?php echo esc_html( bd_pro_property_area_label( $post_id ) ); ?></span>
						<span><?php echo esc_html( bd_pro_property_meta( $post_id, 'bed' ) ); ?> PN</span>
						<span><?php echo esc_html( bd_pro_property_meta( $post_id, 'bath' ) ); ?> WC</span>
					</div>
					<p><strong>Loại hình:</strong> <?php echo esc_html( bd_pro_clean_text( bd_pro_type_label( bd_pro_property_meta( $post_id, 'type' ) ) ) ); ?></p>
					<p><strong>Hướng nhà:</strong> <?php echo esc_html( bd_pro_clean_text( bd_pro_property_meta( $post_id, 'direction' ) ) ); ?></p>
					<p><strong>Pháp lý:</strong> <?php echo esc_html( bd_pro_clean_text( bd_pro_property_meta( $post_id, 'legal' ) ) ); ?></p>
					<p><strong>Khu vực:</strong> <?php echo esc_html( bd_pro_clean_text( bd_pro_property_meta( $post_id, 'district' ) ) ); ?>, <?php echo esc_html( bd_pro_clean_text( bd_pro_property_meta( $post_id, 'city' ) ) ); ?></p>
					<p><strong>Địa chỉ:</strong> <?php echo esc_html( bd_pro_clean_text( bd_pro_property_meta( $post_id, 'address' ) ) ); ?></p>

					<form class="bd-side-form" method="post">
						<h3>Gửi yêu cầu tư vấn</h3>
						<?php wp_nonce_field( 'bd_front_action', 'bd_nonce' ); ?>
						<input type="hidden" name="bd_action" value="lead">
						<input type="hidden" name="property_id" value="<?php echo esc_attr( $post_id ); ?>">
						<input class="bd-field" name="bd_name" placeholder="Họ và tên" required>
						<input class="bd-field" name="bd_phone" placeholder="Số điện thoại" required>
						<input class="bd-field" type="email" name="bd_email" placeholder="Email">
						<textarea class="bd-field" name="bd_message" placeholder="Nhu cầu tư vấn"></textarea>
						<button class="bd-btn" type="submit">Gửi liên hệ</button>
					</form>

					<form id="lich-xem-nha" class="bd-side-form" method="post">
						<h3>Đặt lịch xem nhà</h3>
						<?php wp_nonce_field( 'bd_front_action', 'bd_nonce' ); ?>
						<input type="hidden" name="bd_action" value="appointment">
						<input type="hidden" name="property_id" value="<?php echo esc_attr( $post_id ); ?>">
						<input class="bd-field" name="bd_name" placeholder="Họ và tên" required>
						<input class="bd-field" name="bd_phone" placeholder="Số điện thoại" required>
						<input class="bd-field" type="email" name="bd_email" placeholder="Email">
						<input class="bd-field" type="date" name="bd_date" required>
						<input class="bd-field" type="time" name="bd_time" required>
						<button class="bd-btn" type="submit">Xác nhận lịch hẹn</button>
					</form>

					<?php if ( $is_payable ) : ?>
						<div id="rental-payment-modal" class="bd-modal" aria-hidden="true">
							<div class="bd-modal-box">
								<button class="bd-modal-close" type="button" data-bd-modal-close>×</button>
								<form id="thanh-toan-thue" class="bd-side-form bd-payment-box" method="post">
									<h3><?php echo esc_html( $payment_title ); ?></h3>
									<p>Nhập thông tin để mở trang thanh toán WooCommerce. Cổng Quét Mã Vietinbank sẽ tạo QR đúng số tiền và nội dung đơn hàng.</p>
									<?php wp_nonce_field( 'bd_front_action', 'bd_nonce' ); ?>
									<input type="hidden" name="bd_action" value="property_payment">
									<input type="hidden" name="property_id" value="<?php echo esc_attr( $post_id ); ?>">
									<input class="bd-field" name="bd_name" placeholder="Họ và tên" required>
									<input class="bd-field" name="bd_phone" placeholder="Số điện thoại" required>
									<input class="bd-field" type="email" name="bd_email" placeholder="Email">
									<input class="bd-field" name="bd_amount" value="<?php echo esc_attr( $payment_amount ); ?>" placeholder="Số tiền thanh toán">
									<input type="hidden" name="bd_method" value="Quét Mã Vietinbank">
									<button class="bd-btn" type="submit">Mở thanh toán Vietinbank</button>
								</form>
							</div>
						</div>
					<?php endif; ?>
				</aside>
			</div>
		</section>
	<?php endwhile; ?>
</main>
<?php get_footer(); ?>
