<?php
get_header();

while ( have_posts() ) :
	the_post();
	$slug = get_post_field( 'post_name', get_the_ID() );
	?>
	<main>
		<?php if ( ! in_array( $slug, array( 'du-an', 'phan-tich-danh-gia' ), true ) ) : ?>
		<section class="bd-page-title">
			<div class="bd-container">
				<div class="bd-breadcrumb">Trang chủ / <?php the_title(); ?></div>
				<span class="bd-title-chip">HTB Resident</span>
				<h1><?php the_title(); ?></h1>
				<?php if ( has_excerpt() ) : ?>
					<p><?php the_excerpt(); ?></p>
				<?php else : ?>
					<p><?php echo esc_html( wp_strip_all_tags( get_the_content() ) ? wp_trim_words( wp_strip_all_tags( get_the_content() ), 24 ) : 'Thông tin được cập nhật cho người dùng HTB Resident.' ); ?></p>
				<?php endif; ?>
			</div>
		</section>
		<?php endif; ?>

		<?php if ( 'dang-nhap' === $slug || 'dang-ky' === $slug ) : ?>
			<section class="bd-section">
				<div class="bd-container bd-auth-wrap">
					<div class="bd-auth-card">
						<div class="bd-auth-tabs">
							<a class="<?php echo 'dang-nhap' === $slug ? 'active' : ''; ?>" href="<?php echo esc_url( home_url( '/dang-nhap/' ) ); ?>">Đăng nhập</a>
							<a class="<?php echo 'dang-ky' === $slug ? 'active' : ''; ?>" href="<?php echo esc_url( home_url( '/dang-ky/' ) ); ?>">Đăng ký</a>
						</div>
						<?php if ( is_user_logged_in() ) : ?>
							<div class="bd-notice">Bạn đang đăng nhập với tài khoản <?php echo esc_html( wp_get_current_user()->display_name ?: wp_get_current_user()->user_login ); ?>.</div>
							<div class="bd-action-row">
								<a class="bd-btn" href="<?php echo esc_url( home_url( '/yeu-thich/' ) ); ?>">Xem tin yêu thích</a>
								<a class="bd-btn bd-btn-light" href="<?php echo esc_url( wp_logout_url( home_url( '/' ) ) ); ?>">Đăng xuất</a>
							</div>
						<?php elseif ( 'dang-nhap' === $slug ) : ?>
							<?php if ( isset( $_GET['login_error'] ) ) : ?><div class="bd-error">Không đăng nhập được. Vui lòng kiểm tra lại tài khoản hoặc mật khẩu.</div><?php endif; ?>
							<form class="bd-auth-form" method="post">
								<?php wp_nonce_field( 'bd_front_action', 'bd_nonce' ); ?>
								<input type="hidden" name="bd_action" value="login">
								<input type="hidden" name="bd_redirect" value="<?php echo esc_url( isset( $_GET['redirect_to'] ) ? esc_url_raw( wp_unslash( $_GET['redirect_to'] ) ) : home_url( '/yeu-thich/' ) ); ?>">
								<label>Tên đăng nhập<input class="bd-field" name="bd_login" autocomplete="username" required></label>
								<label>Mật khẩu<input class="bd-field" type="password" name="bd_password" autocomplete="current-password" required></label>
								<label class="bd-check-row"><input type="checkbox" name="bd_remember" value="1"> Ghi nhớ đăng nhập</label>
								<button class="bd-btn" type="submit">Đăng nhập</button>
								<p>Chưa có tài khoản? <a class="bd-red-link" href="<?php echo esc_url( home_url( '/dang-ky/' ) ); ?>">Đăng ký ngay</a></p>
							</form>
						<?php else : ?>
							<?php if ( isset( $_GET['register_error'] ) ) : ?>
								<div class="bd-error">Không tạo được tài khoản: <?php echo esc_html( sanitize_text_field( wp_unslash( $_GET['register_error'] ) ) ); ?></div>
							<?php endif; ?>
							<form class="bd-auth-form" method="post">
								<?php wp_nonce_field( 'bd_front_action', 'bd_nonce' ); ?>
								<input type="hidden" name="bd_action" value="register">
								<label>Họ tên<input class="bd-field" name="bd_name" autocomplete="name" required></label>
								<label>Tên đăng nhập<input class="bd-field" name="bd_username" autocomplete="username" required></label>
								<label>Email<input class="bd-field" type="email" name="bd_email" autocomplete="email" required></label>
								<label>Số điện thoại<input class="bd-field" name="bd_phone" autocomplete="tel"></label>
								<label>Vai trò<select class="bd-field" name="bd_role"><option value="user">Khách hàng</option><option value="agent">Môi giới / Người bán</option></select></label>
								<label>Mật khẩu<input class="bd-field" type="password" name="bd_password" autocomplete="new-password" required></label>
								<label>Nhập lại mật khẩu<input class="bd-field" type="password" name="bd_password_confirm" autocomplete="new-password" required></label>
								<button class="bd-btn" type="submit">Tạo tài khoản</button>
								<p>Đã có tài khoản? <a class="bd-red-link" href="<?php echo esc_url( home_url( '/dang-nhap/' ) ); ?>">Đăng nhập</a></p>
							</form>
						<?php endif; ?>
					</div>
					<aside class="bd-panel bd-auth-side">
						<h2>Tài khoản HTB Resident</h2>
						<ul class="bd-checklist">
							<li>Lưu danh sách bất động sản yêu thích.</li>
							<li>Gửi yêu cầu tư vấn và đặt lịch xem nhà.</li>
							<li>Đăng tin bất động sản chờ admin duyệt.</li>
							<li>Quản lý thông tin liên hệ gọn hơn.</li>
						</ul>
					</aside>
				</div>
			</section>

		<?php elseif ( 'du-an' === $slug ) : ?>
			<section class="bd-project-hero" style="--hero:url('<?php echo esc_url( bd_pro_upload_url( '1920x540.jpg' ) ); ?>')">
				<div class="bd-project-hero-inner">
					<span>Đang mở bán</span>
						<h1>Dự án đang hình thành</h1>
						<div class="bd-project-hero-stats">
							<div><strong>2026</strong><small>Kế hoạch mở bán</small></div>
							<div><strong>3</strong><small>Thành phố trọng điểm</small></div>
							<div><strong>5+</strong><small>Nhóm sản phẩm tương lai</small></div>
						</div>
					<p>Đường Đông Đa, Phường Phú Nhuận, Thành phố Huế, Thừa Thiên Huế</p>
				</div>
			</section>
			<section class="bd-project-page">
				<div class="bd-container">
					<form class="bd-project-search" action="<?php echo esc_url( get_post_type_archive_link( 'property' ) ); ?>" method="get">
						<input class="bd-field" type="search" name="s" placeholder="Tìm kiếm dự án...">
						<select class="bd-field" name="bd_city"><option value="">Khu vực: Toàn quốc</option><option>Hà Nội</option><option>Đà Nẵng</option><option>TP. HCM</option></select>
						<select class="bd-field" name="bd_type"><option value="">Loại hình: Tất cả</option><option value="Can ho">Căn hộ</option><option value="Nha pho">Nhà phố</option><option value="Biet thu">Biệt thự</option></select>
						<select class="bd-field" name="property_status"><option value="">Trạng thái: Tất cả</option><option value="du-an-moi">Dự án mới</option><option value="dang-ban">Đang bán</option></select>
						<button class="bd-btn" type="submit">Tìm</button>
					</form>
					<div class="bd-future-strip">
						<div><span>01</span><strong>Ý tưởng</strong><p>Đánh giá vị trí, nhu cầu thật và biên tăng trưởng khu vực.</p></div>
						<div><span>02</span><strong>Chuẩn bị</strong><p>Theo dõi pháp lý, quy hoạch, mặt bằng giá và tiến độ hạ tầng.</p></div>
						<div><span>03</span><strong>Mở bán</strong><p>Cập nhật giỏ hàng, lịch nhận booking và mức giá dự kiến.</p></div>
					</div>
					<div class="bd-project-layout">
						<div>
							<div class="bd-breadcrumb">Dự án / Dự án BĐS Toàn Quốc</div>
							<h2>Dự án toàn quốc</h2>
							<p>Hiện đang có <?php echo esc_html( wp_count_posts( 'property' )->publish ); ?> dự án và tin bất động sản.</p>
							<div class="bd-project-list">
								<?php
								$projects = new WP_Query(
									array(
										'post_type'      => 'property',
										'post_status'    => 'publish',
										'posts_per_page' => 8,
										'tax_query'      => array(
											array(
												'taxonomy' => 'property_status',
												'field'    => 'slug',
												'terms'    => array( 'du-an-moi', 'dang-ban' ),
											),
										),
									)
								);
									$project_index = 0;
									while ( $projects->have_posts() ) :
										$projects->the_post();
										$project_id = get_the_ID();
										$image      = get_the_post_thumbnail_url( $project_id, 'large' ) ?: bd_pro_property_fallback_image( $project_id );
										$phase      = array( 'Đang nghiên cứu', 'Chuẩn bị mở bán', 'Nhận booking', 'Sắp bàn giao' )[ $project_index % 4 ];
										$progress   = array( 28, 46, 63, 82 )[ $project_index % 4 ];
										$open_time  = array( 'Q2/2026', 'Q3/2026', 'Q4/2026', '2027' )[ $project_index % 4 ];
										$project_index++;
									?>
									<article class="bd-project-row">
										<a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( bd_pro_property_title( $project_id ) ); ?>"></a>
										<div>
											<span>Đang cập nhật</span>
												<span class="bd-project-phase"><?php echo esc_html( $phase ); ?></span>
												<h3><a href="<?php the_permalink(); ?>"><?php echo esc_html( bd_pro_property_title( $project_id ) ); ?></a></h3>
											<p><strong><?php echo esc_html( bd_pro_property_area_label( $project_id ) ); ?></strong> · <?php echo esc_html( bd_pro_property_meta( $project_id, 'bed' ) ); ?> PN · <?php echo esc_html( bd_pro_property_meta( $project_id, 'bath' ) ); ?> WC</p>
											<p><?php echo esc_html( bd_pro_property_meta( $project_id, 'district' ) ); ?>, <?php echo esc_html( bd_pro_property_meta( $project_id, 'city' ) ); ?></p>
												<p><?php echo esc_html( wp_trim_words( get_the_excerpt() ?: wp_strip_all_tags( get_the_content() ), 24 ) ); ?></p>
												<div class="bd-project-progress"><b style="--progress:<?php echo esc_attr( $progress ); ?>%"></b><small><?php echo esc_html( $progress ); ?>% tiến độ thông tin · Dự kiến <?php echo esc_html( $open_time ); ?></small></div>
												<div class="bd-project-actions">
													<a class="bd-project-cta" href="<?php the_permalink(); ?>">Xem hồ sơ dự án</a>
													<?php if ( current_user_can( 'manage_options' ) ) : ?>
														<a class="bd-project-edit" href="<?php echo esc_url( get_edit_post_link( $project_id ) ); ?>">Sửa</a>
														<form method="post" onsubmit="return confirm('Xóa dự án này?');">
															<?php wp_nonce_field( 'bd_front_action', 'bd_nonce' ); ?>
															<input type="hidden" name="property_id" value="<?php echo esc_attr( $project_id ); ?>">
															<button class="bd-project-delete" type="submit" name="bd_action" value="delete_project">Xóa</button>
														</form>
													<?php endif; ?>
												</div>
										</div>
									</article>
									<?php
								endwhile;
								wp_reset_postdata();
								?>
							</div>
						</div>
						<aside class="bd-project-side">
							<h3>Đánh giá dự án</h3>
							<a class="bd-side-feature" href="<?php echo esc_url( home_url( '/phan-tich-danh-gia/' ) ); ?>">
								<img src="<?php echo esc_url( bd_pro_upload_url( 'can-ho-mau-the-nelson-private-residences.jpg' ) ); ?>" alt="Đánh giá dự án">
								<strong>Có cần thu dưới 100 triệu/m² ở khu trung tâm không?</strong>
							</a>
							<h3>Tin tức</h3>
							<?php foreach ( array( 'Hanoi Signature tạo đô thị đáng sống', 'Chính thức mở bán Riverside', 'Hạ tầng tăng tốc, Nam Phú Quốc hút khách' ) as $news_title ) : ?>
								<a class="bd-side-news" href="<?php echo esc_url( home_url( '/tin-tuc/' ) ); ?>">
									<img src="<?php echo esc_url( bd_pro_upload_url( 'news-market-01.jpg' ) ); ?>" alt="<?php echo esc_attr( $news_title ); ?>">
									<span><?php echo esc_html( $news_title ); ?></span>
								</a>
							<?php endforeach; ?>
						</aside>
					</div>
				</div>
			</section>

		<?php elseif ( 'tin-tuc' === $slug ) : ?>
			<section class="bd-news-hub">
				<div class="bd-container">
					<?php
					$news = array(
						array( 'news-market-01.jpg', 'Thị trường căn hộ tiếp tục phân hóa theo vị trí và pháp lý', 'Thị trường', '6 phút đọc', 'Nguồn cung mới tập trung vào các dự án có pháp lý rõ, tiện ích vận hành tốt và vị trí kết nối nhanh.' ),
						array( 'news-infra-01.jpg', 'Hạ tầng phía Đông tạo thêm lực kéo cho giá nhà ở', 'Hạ tầng', '4 phút đọc', 'Các tuyến vành đai, metro và trục kết nối mới đang làm thay đổi cách nhà đầu tư nhìn khu Đông.' ),
						array( 'news-legal-01.jpg', 'Kinh nghiệm kiểm tra pháp lý trước khi đặt cọc', 'Pháp lý', '5 phút đọc', 'Checklist các điểm cần kiểm tra trước khi ký cọc để giảm rủi ro tranh chấp và sai lệch thông tin.' ),
						array( 'property-photo-villa-01.jpg', 'Người mua nhà ưu tiên tiện ích sống và kết nối giao thông', 'Xu hướng', '3 phút đọc', 'Nhu cầu ở thực đang dịch chuyển sang các dự án có dịch vụ nội khu và hạ tầng xung quanh hoàn chỉnh.' ),
						array( 'property-photo-project-01.jpg', 'Dự án trung tâm được quan tâm nhờ nguồn cung hạn chế', 'Dự án', '4 phút đọc', 'Nguồn cung trung tâm ít khiến nhóm sản phẩm có pháp lý tốt tiếp tục được tìm kiếm nhiều.' ),
						array( 'news-finance-01.jpg', 'Lãi suất vay mua nhà và những điểm cần tính trước', 'Tài chính', '7 phút đọc', 'Người mua cần tính dòng tiền, tỷ lệ vay và biên an toàn trước khi quyết định xuống tiền.' ),
					);
					$featured_news = $news[0];
					?>
					<div class="bd-news-hub-grid bd-news-overview">
						<article class="bd-news-featured">
							<img src="<?php echo esc_url( bd_pro_upload_url( $featured_news[0] ) ); ?>" alt="<?php echo esc_attr( $featured_news[1] ); ?>">
							<div>
								<span><?php echo esc_html( $featured_news[2] ); ?> · <?php echo esc_html( $featured_news[3] ); ?></span>
								<h2><?php echo esc_html( $featured_news[1] ); ?></h2>
								<p><?php echo esc_html( $featured_news[4] ); ?></p>
								<a href="#news-detail-0" data-news-open="news-detail-0">Xem phân tích thị trường</a>
							</div>
						</article>
						<aside class="bd-news-tools">
							<form action="<?php echo esc_url( get_post_type_archive_link( 'property' ) ); ?>" method="get">
								<label>Tìm nhanh theo khu vực hoặc dự án</label>
								<div><input class="bd-field" type="search" name="s" placeholder="VD: Hà Nội, căn hộ, dự án mới"><button class="bd-btn" type="submit">Tìm</button></div>
							</form>
							<div class="bd-news-watch">
								<strong>Radar thị trường</strong>
								<p>Giá căn hộ trung tâm giữ mức cao, trong khi khu vực ven đô có nhiều lựa chọn hơn cho ngân sách vừa.</p>
							</div>
							<form class="bd-news-subscribe" method="post">
								<?php wp_nonce_field( 'bd_front_action', 'bd_nonce' ); ?>
								<input type="hidden" name="bd_action" value="newsletter">
								<label>Nhận bản tin HTB Resident</label>
								<div><input class="bd-field" type="email" name="bd_email" placeholder="Email của bạn" required><button class="bd-btn" type="submit">Gửi</button></div>
							</form>
						</aside>
					</div>
					<div class="bd-news-categories bd-news-overview">
						<a href="#thi-truong">Thị trường</a>
						<a href="#ha-tang">Hạ tầng</a>
						<a href="#phap-ly">Pháp lý</a>
						<a href="#tai-chinh">Tài chính</a>
						<a href="<?php echo esc_url( home_url( '/du-an/' ) ); ?>">Dự án tương lai</a>
					</div>
					<div class="bd-news-modern-grid bd-news-overview">
						<?php foreach ( array_slice( $news, 1 ) as $index => $item ) : ?>
							<?php $detail_id = 'news-detail-' . ( $index + 1 ); ?>
							<article id="<?php echo esc_attr( sanitize_title( $item[2] ) ); ?>">
								<a href="#<?php echo esc_attr( $detail_id ); ?>" data-news-open="<?php echo esc_attr( $detail_id ); ?>"><img src="<?php echo esc_url( bd_pro_upload_url( $item[0] ) ); ?>" alt="<?php echo esc_attr( $item[1] ); ?>"></a>
								<div>
									<span><?php echo esc_html( $item[2] ); ?> · <?php echo esc_html( $item[3] ); ?></span>
									<h3><?php echo esc_html( $item[1] ); ?></h3>
									<p><?php echo esc_html( $item[4] ); ?></p>
									<a href="#<?php echo esc_attr( $detail_id ); ?>" data-news-open="<?php echo esc_attr( $detail_id ); ?>">Đọc phân tích</a>
								</div>
							</article>
						<?php endforeach; ?>
					</div>
					<div class="bd-news-detail-wrap">
						<?php foreach ( $news as $index => $item ) : ?>
							<article class="bd-news-detail" id="news-detail-<?php echo esc_attr( $index ); ?>" hidden>
								<button type="button" data-news-back>← Quay lại tin tức</button>
								<img src="<?php echo esc_url( bd_pro_upload_url( $item[0] ) ); ?>" alt="<?php echo esc_attr( $item[1] ); ?>">
								<span><?php echo esc_html( $item[2] ); ?> · <?php echo esc_html( $item[3] ); ?></span>
								<h2><?php echo esc_html( $item[1] ); ?></h2>
								<p><?php echo esc_html( $item[4] ); ?></p>
								<div class="bd-news-detail-body">
									<p><strong>Điểm chính:</strong> <?php echo esc_html( $item[4] ); ?></p>
									<p><strong>Tác động thực tế:</strong> người mua nên đối chiếu giá/m², pháp lý, tiến độ hạ tầng và khả năng khai thác dòng tiền trước khi xuống tiền.</p>
									<p><strong>Gợi ý hành động:</strong> lưu lại khu vực quan tâm, so sánh ít nhất 3-5 tin cùng phân khúc và dùng trang phân tích để kiểm tra ngân sách phù hợp.</p>
								</div>
							</article>
						<?php endforeach; ?>
					</div>
				</div>
			</section>

		<?php elseif ( false && 'tin-tuc' === $slug ) : ?>
			<section class="bd-section">
				<div class="bd-container">
					<div class="bd-news-grid bd-page-news">
						<?php
						$news = array(
							array( 'Homepage-400_380.jpg', 'Thị trường căn hộ tiếp tục phân hóa theo vị trí và pháp lý' ),
							array( 'template5.png', 'Hạ tầng phía Đông tạo thêm lực kéo cho giá nhà ở' ),
							array( 'Contact-400_380.jpg', 'Kinh nghiệm kiểm tra pháp lý trước khi đặt cọc' ),
							array( 'About-400_380.jpg', 'Người mua nhà ưu tiên tiện ích sống và kết nối giao thông' ),
							array( 'can-ho-mau-the-nelson-private-residences.jpg', 'Dự án trung tâm được quan tâm nhờ nguồn cung hạn chế' ),
							array( '968x798_1.jpg', 'Lãi suất vay mua nhà và những điểm cần tính trước' ),
						);
						foreach ( $news as $index => $item ) :
							?>
							<article>
								<img src="<?php echo esc_url( bd_pro_upload_url( $item[0] ) ); ?>" alt="<?php echo esc_attr( $item[1] ); ?>">
								<div><strong><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></strong><h3><?php echo esc_html( $item[1] ); ?></h3></div>
							</article>
						<?php endforeach; ?>
					</div>
				</div>
			</section>

		<?php elseif ( 'wiki-bds' === $slug ) : ?>
			<section class="bd-section">
				<div class="bd-container bd-two-col">
					<div>
						<h2>Công cụ nhanh</h2>
						<div class="bd-tool-grid bd-tool-grid-page">
							<a class="active" href="#loan" data-bd-tool="loan">▦ <span>Tính lãi vay</span></a>
							<a href="#legal" data-bd-tool="legal">✓ <span>Checklist pháp lý</span></a>
							<a href="#cost" data-bd-tool="cost">▤ <span>Chi phí mua nhà</span></a>
							<a href="#feng" data-bd-tool="feng">☼ <span>Phong thủy cơ bản</span></a>
						</div>
						<div id="legal" class="bd-panel bd-wiki-panel bd-tool-panel">
							<h3>Checklist pháp lý trước khi mua</h3>
							<ul class="bd-checklist">
								<li>Đối chiếu thông tin chủ sở hữu trên sổ đỏ/sổ hồng.</li>
								<li>Kiểm tra quy hoạch, thế chấp và tranh chấp.</li>
								<li>Soạn hợp đồng đặt cọc có điều khoản hoàn cọc rõ ràng.</li>
								<li>Công chứng, kê khai thuế và sang tên đúng thời hạn.</li>
							</ul>
						</div>
						<div id="cost" class="bd-panel bd-wiki-panel bd-tool-panel">
							<h3>Ước tính chi phí mua/làm nhà</h3>
							<p>Chi phí nên dự trù gồm đặt cọc, công chứng, thuế phí sang tên, nội thất, sửa chữa và khoản dự phòng 5-10% giá trị giao dịch.</p>
							<div class="bd-tool-calc">
								<label>Giá trị giao dịch (tỷ VND)<input class="bd-field" id="bd-cost-price" type="number" value="5" step="0.1"></label>
								<label>Nội thất/sửa chữa (%)<input class="bd-field" id="bd-cost-renovation" type="number" value="5" step="0.5"></label>
								<label>Dự phòng (%)<input class="bd-field" id="bd-cost-buffer" type="number" value="5" step="0.5"></label>
								<div class="bd-loan-result"><span>Tổng chi phí dự kiến</span><strong id="bd-cost-result">--</strong></div>
							</div>
						</div>
						<div id="feng" class="bd-panel bd-wiki-panel bd-tool-panel">
							<h3>Phong thủy và tuổi xây nhà</h3>
							<p>Thông tin phong thủy chỉ mang tính tham khảo. Người mua nên ưu tiên pháp lý, tài chính, hướng nắng gió, tiếng ồn và khả năng kết nối giao thông.</p>
							<div class="bd-tool-calc">
								<label>Năm sinh<input class="bd-field" id="bd-feng-year" type="number" value="1990"></label>
								<label>Hướng nhà<select class="bd-field" id="bd-feng-direction"><option>Đông</option><option>Tây</option><option>Nam</option><option>Bắc</option><option>Đông Nam</option><option>Tây Nam</option></select></label>
								<div class="bd-loan-result"><span>Gợi ý tham khảo</span><strong id="bd-feng-result">--</strong></div>
							</div>
						</div>
					</div>
					<aside id="loan" class="bd-panel bd-tool-panel active">
						<h2>Tính lãi vay</h2>
						<div class="bd-finance bd-finance-page">
							<label>Giá nhà (tỷ VND)<input class="bd-field" id="bd-loan-price" type="number" value="5" step="0.1"></label>
							<label>Vay (%)<input class="bd-field" id="bd-loan-ratio" type="number" value="70"></label>
							<label>Lãi suất năm (%)<input class="bd-field" id="bd-loan-rate" type="number" value="9.5" step="0.1"></label>
							<label>Thời hạn (năm)<input class="bd-field" id="bd-loan-years" type="number" value="20"></label>
							<div class="bd-loan-result"><span>Trả hàng tháng ước tính</span><strong id="bd-loan-result">--</strong></div>
						</div>
					</aside>
				</div>
			</section>

		<?php elseif ( 'phan-tich-danh-gia' === $slug ) : ?>
			<?php
			$analysis_posts = get_posts(
				array(
					'post_type'      => 'property',
					'post_status'    => 'publish',
					'posts_per_page' => -1,
				)
			);
			$total_price  = 0;
			$total_area   = 0;
			$priced       = 0;
			$aread        = 0;
			$locations    = array();
			$location_sum = array();
			$types        = array();
			foreach ( $analysis_posts as $analysis_post ) {
				$price = (float) get_post_meta( $analysis_post->ID, '_bd_price_number', true );
				$area  = (float) get_post_meta( $analysis_post->ID, '_bd_area_number', true );
				$city  = bd_pro_clean_text( get_post_meta( $analysis_post->ID, '_bd_city', true ) ?: get_post_meta( $analysis_post->ID, '_bd_district', true ) );
				$type  = bd_pro_clean_text( get_post_meta( $analysis_post->ID, '_bd_type', true ) );
				if ( $price > 0 ) {
					$total_price += $price;
					$priced++;
				}
				if ( $area > 0 ) {
					$total_area += $area;
					$aread++;
				}
				if ( $city ) {
					$locations[ $city ]    = isset( $locations[ $city ] ) ? $locations[ $city ] + 1 : 1;
					$location_sum[ $city ] = isset( $location_sum[ $city ] ) ? $location_sum[ $city ] + $price : $price;
				}
				if ( $type ) {
					$types[ $type ] = isset( $types[ $type ] ) ? $types[ $type ] + 1 : 1;
				}
			}
			arsort( $locations );
			arsort( $types );
			$avg_price     = $priced ? round( $total_price / $priced, 1 ) : 0;
			$avg_area      = $aread ? round( $total_area / $aread ) : 0;
			$top_locations = array_slice( $locations, 0, 5, true );
			$top_types     = array_slice( $types, 0, 5, true );
			$max_location  = $top_locations ? max( $top_locations ) : 1;
			$max_type      = $top_types ? max( $top_types ) : 1;
			$latest_posts  = array_slice( $analysis_posts, 0, 3 );
			$lead_city     = $top_locations ? key( $top_locations ) : 'Ha Noi';
			?>
			<section class="bd-analysis-hero">
				<div class="bd-container bd-analysis-hero-inner">
					<div>
						<span>HTB Resident Intelligence</span>
						<h1>Phân tích đánh giá thị trường</h1>
						<p>Theo dõi nguồn cung, mặt bằng giá và mức độ phù hợp tài chính từ dữ liệu tin đăng đang có trên hệ thống.</p>
					</div>
					<div class="bd-analysis-signal">
						<strong><?php echo esc_html( $avg_price ?: '0' ); ?> tỷ</strong>
						<span>Giá trung bình hiện tại</span>
						<em><?php echo esc_html( count( $analysis_posts ) ); ?> tin đang được tổng hợp</em>
					</div>
				</div>
			</section>
			<section class="bd-section bd-analysis-page">
				<div class="bd-container">
					<div class="bd-stat-grid bd-analysis-stats">
						<div><strong><?php echo esc_html( count( $analysis_posts ) ); ?></strong><span>Tin đang phân tích</span></div>
						<div><strong><?php echo esc_html( $avg_price ); ?></strong><span>Giá TB, tỷ VND</span></div>
						<div><strong><?php echo esc_html( $avg_area ); ?></strong><span>Diện tích TB, m²</span></div>
						<div><strong><?php echo esc_html( count( $locations ) ); ?></strong><span>Khu vực có dữ liệu</span></div>
					</div>
					<div class="bd-panel bd-market-lab">
						<div class="bd-card-head">
							<div>
								<h2>Market Lab</h2>
								<p>Chọn khu vực, loại hình và ngân sách để hệ thống gợi ý nhóm tài sản nên ưu tiên.</p>
							</div>
							<a href="<?php echo esc_url( home_url( '/dang-tin/' ) ); ?>">Gửi tin cần duyệt</a>
						</div>
						<div class="bd-market-lab-grid">
							<label>Khu vực
								<select class="bd-field" id="bd-chart-city">
									<?php foreach ( $top_locations as $label => $count ) : ?>
										<option><?php echo esc_html( $label ); ?></option>
									<?php endforeach; ?>
									<?php if ( ! $top_locations ) : ?><option>Hà Nội</option><?php endif; ?>
								</select>
							</label>
							<label>Loại hình
								<select class="bd-field" id="bd-chart-type">
									<?php foreach ( $top_types as $label => $count ) : ?>
										<option><?php echo esc_html( bd_pro_type_label( $label ) ); ?></option>
									<?php endforeach; ?>
									<?php if ( ! $top_types ) : ?><option>Căn hộ</option><?php endif; ?>
								</select>
							</label>
							<label>Ngân sách tối đa (tỷ)
								<input class="bd-field" id="bd-chart-budget" type="number" value="<?php echo esc_attr( max( 1, $avg_price ) ); ?>" step="0.5">
							</label>
							<div class="bd-market-lab-result" id="bd-chart-result">Đang tính gợi ý...</div>
						</div>
						<div class="bd-market-actions">
							<div><strong><?php echo esc_html( $lead_city ); ?></strong><span>Khu vực có dữ liệu nổi bật nhất</span></div>
							<div><strong><?php echo esc_html( $priced ? round( $priced / max( 1, count( $analysis_posts ) ) * 100 ) : 0 ); ?>%</strong><span>Tin có giá số để so sánh</span></div>
							<div><strong><?php echo esc_html( $aread ? round( $aread / max( 1, count( $analysis_posts ) ) * 100 ) : 0 ); ?>%</strong><span>Tin có diện tích để tính giá/m²</span></div>
						</div>
					</div>
					<div class="bd-analysis-layout">
						<div class="bd-panel bd-market-card bd-analysis-main-card">
							<div class="bd-card-head">
								<div>
									<h2>Bức tranh nguồn cung</h2>
									<p>Những khu vực đang có nhiều dữ liệu nhất trên HTB Resident.</p>
								</div>
								<a href="<?php echo esc_url( get_post_type_archive_link( 'property' ) ); ?>">Xem tin đăng</a>
							</div>
							<div class="bd-bar-list bd-analysis-bars">
								<?php foreach ( $top_locations as $label => $count ) : ?>
									<?php $avg_city_price = ! empty( $locations[ $label ] ) ? round( $location_sum[ $label ] / $locations[ $label ], 1 ) : 0; ?>
									<div>
										<span><?php echo esc_html( $label ); ?><small><?php echo esc_html( $avg_city_price ); ?> tỷ TB</small></span>
										<b style="--bar:<?php echo esc_attr( max( 8, round( $count / $max_location * 100 ) ) ); ?>%"><?php echo esc_html( $count ); ?> tin</b>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
						<div class="bd-panel bd-market-card">
							<h2>Cơ cấu loại hình</h2>
							<div class="bd-bar-list">
								<?php foreach ( $top_types as $label => $count ) : ?>
									<div><span><?php echo esc_html( bd_pro_type_label( $label ) ); ?></span><b style="--bar:<?php echo esc_attr( max( 8, round( $count / $max_type * 100 ) ) ); ?>%"><?php echo esc_html( $count ); ?> tin</b></div>
								<?php endforeach; ?>
							</div>
						</div>
						<div class="bd-panel bd-market-card bd-analysis-calculator">
							<h2>Bộ tính điểm mua</h2>
							<p>Nhập ngân sách của bạn để xem mức phù hợp tương đối.</p>
							<div class="bd-analysis-calc">
								<label>Giá mua (tỷ)<input class="bd-field" id="bd-analysis-price" type="number" value="<?php echo esc_attr( $avg_price ?: 5 ); ?>" step="0.1"></label>
								<label>Diện tích (m²)<input class="bd-field" id="bd-analysis-area" type="number" value="<?php echo esc_attr( $avg_area ?: 80 ); ?>"></label>
								<label>Vay ngân hàng (%)<input class="bd-field" id="bd-analysis-loan" type="number" value="60"></label>
								<label>Lợi suất thuê/năm (%)<input class="bd-field" id="bd-analysis-yield" type="number" value="4.5" step="0.1"></label>
								<div class="bd-score-box"><span>Điểm phù hợp</span><strong id="bd-analysis-score">--</strong><em id="bd-analysis-note">--</em></div>
							</div>
						</div>
						<div class="bd-panel bd-market-card bd-risk-panel">
							<h2>Kiểm tra rủi ro nhanh</h2>
							<p>Chấm nhanh theo giá, tỷ lệ vay và trạng thái pháp lý trước khi hẹn xem.</p>
							<div class="bd-risk-grid">
								<label>Giá dự kiến (tỷ)<input class="bd-field" id="bd-risk-price" type="number" value="<?php echo esc_attr( $avg_price ?: 8 ); ?>" step="0.5"></label>
								<label>Vay ngân hàng (%)<input class="bd-field" id="bd-risk-loan" type="number" value="55"></label>
								<label>Pháp lý
									<select class="bd-field" id="bd-risk-legal">
										<option value="clear">Đã rõ</option>
										<option value="check">Cần kiểm tra</option>
									</select>
								</label>
								<div class="bd-risk-result" id="bd-risk-result">Đang tính...</div>
							</div>
						</div>
						<div class="bd-panel bd-market-card bd-analysis-main-card">
							<div class="bd-card-head">
								<div>
									<h2>Khuyến nghị nhanh</h2>
									<p>Các điểm cần kiểm tra trước khi liên hệ hoặc đặt cọc.</p>
								</div>
							</div>
							<div class="bd-insight-list bd-analysis-checklist">
								<p><strong>Giá/m² tham chiếu:</strong> khoảng <span id="bd-analysis-ppm">--</span> triệu/m² theo thông số bạn nhập.</p>
								<p><strong>Thanh khoản:</strong> ưu tiên tin có ảnh thật, giá số rõ ràng, địa chỉ cụ thể và nằm trong khu vực có nhiều dữ liệu.</p>
								<p><strong>Dòng tiền:</strong> nếu tỷ lệ vay vượt 70%, cần kiểm tra khoản trả hàng tháng trước khi đặt cọc.</p>
							</div>
						</div>
					</div>
					<div class="bd-analysis-bottom">
						<div class="bd-panel">
							<h2>Tin nổi bật để đối chiếu</h2>
							<div class="bd-analysis-mini-list">
								<?php foreach ( $latest_posts as $latest_post ) : ?>
									<a href="<?php echo esc_url( get_permalink( $latest_post ) ); ?>">
										<?php echo get_the_post_thumbnail( $latest_post, 'medium' ); ?>
										<span><?php echo esc_html( get_the_title( $latest_post ) ); ?></span>
									</a>
								<?php endforeach; ?>
							</div>
						</div>
						<div class="bd-panel bd-analysis-note-card">
							<h2>Cách đọc dữ liệu</h2>
							<p>Số liệu trên trang này được tổng hợp từ tin đã được duyệt. Đây là công cụ sàng lọc ban đầu, không thay thế thẩm định pháp lý, quy hoạch và khảo sát giá giao dịch thực tế.</p>
						</div>
					</div>
				</div>
			</section>

		<?php elseif ( false && 'phan-tich-danh-gia' === $slug ) : ?>
			<section class="bd-section">
				<div class="bd-container">
					<?php
					$analysis_posts = get_posts(
						array(
							'post_type'      => 'property',
							'post_status'    => 'publish',
							'posts_per_page' => -1,
						)
					);
					$total_price = 0;
					$total_area  = 0;
					$priced      = 0;
					$locations   = array();
					$types       = array();
					foreach ( $analysis_posts as $analysis_post ) {
						$price = (float) get_post_meta( $analysis_post->ID, '_bd_price_number', true );
						$area  = (float) get_post_meta( $analysis_post->ID, '_bd_area_number', true );
						$city  = bd_pro_clean_text( get_post_meta( $analysis_post->ID, '_bd_city', true ) ?: get_post_meta( $analysis_post->ID, '_bd_district', true ) );
						$type  = bd_pro_clean_text( get_post_meta( $analysis_post->ID, '_bd_type', true ) );
						if ( $price > 0 ) {
							$total_price += $price;
							$priced++;
						}
						if ( $area > 0 ) {
							$total_area += $area;
						}
						if ( $city ) {
							$locations[ $city ] = isset( $locations[ $city ] ) ? $locations[ $city ] + 1 : 1;
						}
						if ( $type ) {
							$types[ $type ] = isset( $types[ $type ] ) ? $types[ $type ] + 1 : 1;
						}
					}
					arsort( $locations );
					arsort( $types );
					$avg_price = $priced ? round( $total_price / $priced, 1 ) : 0;
					$avg_area  = $analysis_posts ? round( $total_area / count( $analysis_posts ) ) : 0;
					?>
					<div class="bd-stat-grid">
						<div><strong><?php echo esc_html( count( $analysis_posts ) ); ?></strong><span>Tin đang phân tích</span></div>
						<div><strong><?php echo esc_html( $avg_price ); ?></strong><span>Giá TB, tỷ VND</span></div>
						<div><strong><?php echo esc_html( $avg_area ); ?></strong><span>Diện tích TB, m²</span></div>
						<div><strong><?php echo esc_html( count( $locations ) ); ?></strong><span>Khu vực có dữ liệu</span></div>
					</div>
					<div class="bd-market-dashboard">
						<div class="bd-panel bd-market-card">
							<h2>Phân bổ theo khu vực</h2>
							<div class="bd-bar-list">
								<?php foreach ( array_slice( $locations, 0, 5, true ) as $label => $count ) : ?>
									<div><span><?php echo esc_html( $label ); ?></span><b style="--bar:<?php echo esc_attr( min( 100, $count * 22 ) ); ?>%"><?php echo esc_html( $count ); ?> tin</b></div>
								<?php endforeach; ?>
							</div>
						</div>
						<div class="bd-panel bd-market-card">
							<h2>Cơ cấu loại hình</h2>
							<div class="bd-bar-list">
								<?php foreach ( array_slice( $types, 0, 5, true ) as $label => $count ) : ?>
									<div><span><?php echo esc_html( bd_pro_type_label( $label ) ); ?></span><b style="--bar:<?php echo esc_attr( min( 100, $count * 24 ) ); ?>%"><?php echo esc_html( $count ); ?> tin</b></div>
								<?php endforeach; ?>
							</div>
						</div>
						<div class="bd-panel bd-market-card">
							<h2>Bộ tính điểm mua</h2>
							<div class="bd-analysis-calc">
								<label>Giá mua (tỷ)<input class="bd-field" id="bd-analysis-price" type="number" value="<?php echo esc_attr( $avg_price ?: 5 ); ?>" step="0.1"></label>
								<label>Diện tích (m²)<input class="bd-field" id="bd-analysis-area" type="number" value="<?php echo esc_attr( $avg_area ?: 80 ); ?>"></label>
								<label>Vay ngân hàng (%)<input class="bd-field" id="bd-analysis-loan" type="number" value="60"></label>
								<label>Lợi suất thuê/năm (%)<input class="bd-field" id="bd-analysis-yield" type="number" value="4.5" step="0.1"></label>
								<div class="bd-score-box"><span>Điểm phù hợp</span><strong id="bd-analysis-score">--</strong><em id="bd-analysis-note">--</em></div>
							</div>
						</div>
						<div class="bd-panel bd-market-card bd-market-wide">
							<h2>Khuyến nghị theo dữ liệu hiện có</h2>
							<div class="bd-insight-list">
								<p><strong>Giá/m² tham chiếu:</strong> khoảng <span id="bd-analysis-ppm">--</span> triệu/m² theo thông số bạn nhập.</p>
								<p><strong>Thanh khoản:</strong> ưu tiên tin có ảnh thật, giá số rõ ràng, địa chỉ cụ thể và nằm trong khu vực đang có nhiều dữ liệu.</p>
								<p><strong>Dòng tiền:</strong> nếu tỷ lệ vay vượt 70%, nên kiểm tra lại khoản trả hàng tháng trước khi đặt cọc.</p>
							</div>
						</div>
					</div>
				</div>
			</section>

		<?php elseif ( 'danh-ba' === $slug ) : ?>
			<section class="bd-section">
				<div class="bd-container">
					<div class="bd-directory-grid">
						<?php
						$agents = array(
							array( 'Trần Hà', 'Tư vấn căn hộ, nhà phố Hà Nội', '0909 188 001' ),
							array( 'Ngọc Bình', 'Chuyên dự án và đất nền Đà Nẵng', '0909 188 002' ),
							array( 'Ngô Thắng', 'Nhà phố, căn hộ và đầu tư TP. HCM', '0909 188 003' ),
						);
						foreach ( $agents as $agent ) :
							?>
							<article class="bd-agent-card">
								<div><?php echo esc_html( mb_substr( $agent[0], 0, 1 ) ); ?></div>
								<h2><?php echo esc_html( $agent[0] ); ?></h2>
								<p><?php echo esc_html( $agent[1] ); ?></p>
								<a class="bd-btn" href="tel:<?php echo esc_attr( str_replace( ' ', '', $agent[2] ) ); ?>"><?php echo esc_html( $agent[2] ); ?></a>
							</article>
						<?php endforeach; ?>
					</div>
				</div>
			</section>

		<?php elseif ( 'duyet-phan-hoi' === $slug ) : ?>
			<section class="bd-section">
				<div class="bd-container">
					<?php if ( ! current_user_can( 'manage_options' ) ) : ?>
						<div class="bd-panel"><h2>Chỉ admin được duyệt phản hồi</h2><p>Vui lòng đăng nhập bằng tài khoản admin để xem và xử lý phản hồi khách gửi từ website.</p></div>
					<?php else : ?>
						<?php if ( isset( $_GET['feedback_updated'] ) ) : ?><div class="bd-notice">Đã cập nhật phản hồi.</div><?php endif; ?>
						<div class="bd-approval-head">
							<h2>Phản hồi khách gửi</h2>
							<p>Duyệt phản hồi hợp lệ, chuyển nháp phản hồi cần kiểm tra thêm, hoặc xóa phản hồi không còn cần xử lý.</p>
						</div>
						<div class="bd-approval-list">
							<?php
							$feedback_query = new WP_Query(
								array(
									'post_type'      => 'bd_feedback',
									'post_status'    => array( 'pending', 'publish' ),
									'posts_per_page' => 50,
									'orderby'        => 'date',
									'order'          => 'DESC',
								)
							);
							if ( $feedback_query->have_posts() ) :
								while ( $feedback_query->have_posts() ) :
									$feedback_query->the_post();
									$feedback_id     = get_the_ID();
									$feedback_status = get_post_status( $feedback_id );
									$status_label    = 'pending' === $feedback_status ? 'Chờ duyệt' : ( 'publish' === $feedback_status ? 'Đã duyệt' : 'Nháp' );
									$topic           = get_post_meta( $feedback_id, '_bd_topic', true ) ?: get_the_title( $feedback_id );
									$name            = get_post_meta( $feedback_id, '_bd_name', true );
									$phone           = get_post_meta( $feedback_id, '_bd_phone', true );
									$email           = get_post_meta( $feedback_id, '_bd_email', true );
									$message         = get_post_meta( $feedback_id, '_bd_message', true ) ?: get_the_content();
									?>
									<article class="bd-approval-card bd-feedback-card">
										<div>
											<h3><?php echo esc_html( $topic ); ?></h3>
											<p><strong>Trạng thái:</strong> <?php echo esc_html( $status_label ); ?> · <strong>Ngày gửi:</strong> <?php echo esc_html( get_the_date( 'd/m/Y H:i', $feedback_id ) ); ?></p>
											<p><strong>Khách:</strong> <?php echo esc_html( $name ?: 'Chưa nhập tên' ); ?> · <?php echo esc_html( $phone ?: 'Chưa có số điện thoại' ); ?> · <?php echo esc_html( $email ?: 'Chưa có email' ); ?></p>
											<p><?php echo esc_html( wp_trim_words( wp_strip_all_tags( $message ), 45 ) ); ?></p>
										</div>
										<form method="post">
											<?php wp_nonce_field( 'bd_front_action', 'bd_nonce' ); ?>
											<input type="hidden" name="feedback_id" value="<?php echo esc_attr( $feedback_id ); ?>">
											<?php if ( 'publish' !== $feedback_status ) : ?>
												<button class="bd-btn" type="submit" name="bd_action" value="approve_feedback">Duyệt</button>
											<?php endif; ?>
											<?php if ( 'draft' !== $feedback_status ) : ?>
												<button class="bd-btn bd-btn-light" type="submit" name="bd_action" value="draft_feedback">Chuyển nháp</button>
											<?php endif; ?>
											<button class="bd-btn bd-btn-light" type="submit" name="bd_action" value="delete_feedback" onclick="return confirm('Xóa phản hồi này?');">Xóa</button>
										</form>
									</article>
									<?php
								endwhile;
								wp_reset_postdata();
							else :
								echo '<div class="bd-panel"><h2>Chưa có phản hồi</h2><p>Khi khách gửi phản hồi trên website, phản hồi sẽ xuất hiện tại đây để admin duyệt.</p></div>';
							endif;
							?>
						</div>
						<div class="bd-approval-head bd-draft-head">
							<h2>Kho phản hồi nháp</h2>
							<p>Các phản hồi đã chuyển nháp được lưu riêng tại đây để admin kiểm tra lại trước khi duyệt hoặc xóa.</p>
						</div>
						<div class="bd-approval-list">
							<?php
							$draft_feedback_query = new WP_Query(
								array(
									'post_type'      => 'bd_feedback',
									'post_status'    => 'draft',
									'posts_per_page' => 50,
									'orderby'        => 'date',
									'order'          => 'DESC',
								)
							);
							if ( $draft_feedback_query->have_posts() ) :
								while ( $draft_feedback_query->have_posts() ) :
									$draft_feedback_query->the_post();
									$feedback_id = get_the_ID();
									$topic       = get_post_meta( $feedback_id, '_bd_topic', true ) ?: get_the_title( $feedback_id );
									$name        = get_post_meta( $feedback_id, '_bd_name', true );
									$phone       = get_post_meta( $feedback_id, '_bd_phone', true );
									$email       = get_post_meta( $feedback_id, '_bd_email', true );
									$message     = get_post_meta( $feedback_id, '_bd_message', true ) ?: get_the_content();
									?>
									<article class="bd-approval-card bd-feedback-card bd-draft-card">
										<div>
											<h3><?php echo esc_html( $topic ); ?></h3>
											<p><strong>Trạng thái:</strong> Nháp · <strong>Ngày gửi:</strong> <?php echo esc_html( get_the_date( 'd/m/Y H:i', $feedback_id ) ); ?></p>
											<p><strong>Khách:</strong> <?php echo esc_html( $name ?: 'Chưa nhập tên' ); ?> · <?php echo esc_html( $phone ?: 'Chưa có số điện thoại' ); ?> · <?php echo esc_html( $email ?: 'Chưa có email' ); ?></p>
											<p><?php echo esc_html( wp_trim_words( wp_strip_all_tags( $message ), 45 ) ); ?></p>
										</div>
										<form method="post">
											<?php wp_nonce_field( 'bd_front_action', 'bd_nonce' ); ?>
											<input type="hidden" name="feedback_id" value="<?php echo esc_attr( $feedback_id ); ?>">
											<button class="bd-btn" type="submit" name="bd_action" value="approve_feedback">Duyệt lại</button>
											<button class="bd-btn bd-btn-light" type="submit" name="bd_action" value="delete_feedback" onclick="return confirm('Xóa phản hồi này?');">Xóa</button>
										</form>
									</article>
									<?php
								endwhile;
								wp_reset_postdata();
							else :
								echo '<div class="bd-panel"><h2>Kho phản hồi nháp đang trống</h2><p>Phản hồi được chuyển nháp sẽ xuất hiện tại đây.</p></div>';
							endif;
							?>
						</div>
					<?php endif; ?>
				</div>
			</section>

		<?php elseif ( 'phe-duyet-tin' === $slug ) : ?>
			<section class="bd-section">
				<div class="bd-container">
					<?php if ( ! current_user_can( 'manage_options' ) ) : ?>
						<div class="bd-panel"><h2>Chỉ admin được phê duyệt tin</h2><p>Vui lòng đăng nhập bằng tài khoản admin để xem danh sách tin chờ duyệt.</p></div>
					<?php else : ?>
						<?php if ( isset( $_GET['approval_updated'] ) ) : ?><div class="bd-notice">Đã cập nhật trạng thái tin.</div><?php endif; ?>
						<div class="bd-approval-head">
							<h2>Tin khách gửi chờ duyệt</h2>
							<p>Duyệt tin hợp lệ để xuất bản lên website, hoặc đưa về bản nháp nếu cần chỉnh sửa thêm.</p>
						</div>
						<div class="bd-approval-list">
							<?php
							$pending_query = new WP_Query(
								array(
									'post_type'      => 'property',
									'post_status'    => 'pending',
									'posts_per_page' => 20,
								)
							);
							if ( $pending_query->have_posts() ) :
								while ( $pending_query->have_posts() ) :
									$pending_query->the_post();
									$pending_id = get_the_ID();
									$pending_image = get_the_post_thumbnail_url( $pending_id, 'medium_large' ) ?: bd_pro_property_fallback_image( $pending_id );
									?>
									<article class="bd-approval-card">
										<img src="<?php echo esc_url( $pending_image ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
										<div>
											<h3><?php the_title(); ?></h3>
											<p><strong><?php echo esc_html( bd_pro_property_price_label( $pending_id ) ); ?></strong> · <?php echo esc_html( bd_pro_property_area_label( $pending_id ) ); ?></p>
											<p><?php echo esc_html( bd_pro_property_meta( $pending_id, 'district' ) ); ?>, <?php echo esc_html( bd_pro_property_meta( $pending_id, 'city' ) ); ?></p>
											<p>Người gửi: <?php echo esc_html( get_post_meta( $pending_id, '_bd_submitter_name', true ) ); ?> · <?php echo esc_html( get_post_meta( $pending_id, '_bd_submitter_phone', true ) ); ?></p>
										</div>
										<form method="post">
											<?php wp_nonce_field( 'bd_front_action', 'bd_nonce' ); ?>
											<input type="hidden" name="property_id" value="<?php echo esc_attr( $pending_id ); ?>">
											<button class="bd-btn" type="submit" name="bd_action" value="approve_property">Phê duyệt</button>
											<button class="bd-btn bd-btn-light" type="submit" name="bd_action" value="reject_property">Chuyển nháp</button>
										</form>
									</article>
									<?php
								endwhile;
								wp_reset_postdata();
							else :
								echo '<div class="bd-panel"><h2>Không có tin chờ duyệt</h2><p>Khi khách đăng tin mới, tin sẽ xuất hiện tại đây để admin phê duyệt.</p></div>';
							endif;
							?>
						</div>
						<div class="bd-approval-head bd-draft-head">
							<h2>Kho tin nháp</h2>
							<p>Các tin đã chuyển nháp được lưu tại đây. Admin có thể đưa lại về hàng chờ duyệt khi cần.</p>
						</div>
						<div class="bd-approval-list">
							<?php
							$draft_query = new WP_Query(
								array(
									'post_type'      => 'property',
									'post_status'    => 'draft',
									'posts_per_page' => 20,
								)
							);
							if ( $draft_query->have_posts() ) :
								while ( $draft_query->have_posts() ) :
									$draft_query->the_post();
									$draft_id = get_the_ID();
									$draft_image = get_the_post_thumbnail_url( $draft_id, 'medium_large' ) ?: bd_pro_property_fallback_image( $draft_id );
									?>
									<article class="bd-approval-card bd-draft-card">
										<img src="<?php echo esc_url( $draft_image ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
										<div>
											<h3><?php the_title(); ?></h3>
											<p><strong><?php echo esc_html( bd_pro_property_price_label( $draft_id ) ); ?></strong> · <?php echo esc_html( bd_pro_property_area_label( $draft_id ) ); ?></p>
											<p><?php echo esc_html( bd_pro_property_meta( $draft_id, 'district' ) ); ?>, <?php echo esc_html( bd_pro_property_meta( $draft_id, 'city' ) ); ?></p>
											<p>Chuyển nháp: <?php echo esc_html( get_post_meta( $draft_id, '_bd_rejected_at', true ) ?: get_the_modified_date( 'd/m/Y H:i' ) ); ?></p>
										</div>
										<form method="post">
											<?php wp_nonce_field( 'bd_front_action', 'bd_nonce' ); ?>
											<input type="hidden" name="property_id" value="<?php echo esc_attr( $draft_id ); ?>">
											<button class="bd-btn" type="submit" name="bd_action" value="restore_property">Đưa lại chờ duyệt</button>
										</form>
									</article>
									<?php
								endwhile;
								wp_reset_postdata();
							else :
								echo '<div class="bd-panel"><h2>Kho nháp đang trống</h2><p>Tin bị chuyển nháp sẽ xuất hiện ở đây.</p></div>';
							endif;
							?>
						</div>
					<?php endif; ?>
				</div>
			</section>

		<?php elseif ( 'dang-tin' === $slug ) : ?>
			<section class="bd-section">
				<div class="bd-container bd-two-col">
					<div class="bd-panel">
						<?php if ( isset( $_GET['property_submitted'] ) ) : ?>
							<div class="bd-notice">Tin đã được gửi và đang chờ admin duyệt.</div>
						<?php endif; ?>
						<h2>Gửi tin bất động sản</h2>
						<form class="bd-submit-form" method="post" enctype="multipart/form-data">
							<?php wp_nonce_field( 'bd_front_action', 'bd_nonce' ); ?>
							<input type="hidden" name="bd_action" value="submit_property">
							<label>Tiêu đề tin<input class="bd-field" name="bd_title" required></label>
							<div class="bd-form-grid">
								<label>Giá hiển thị<input class="bd-field" name="bd_price" placeholder="Ví dụ: 5,2 tỷ" required></label>
								<label>Giá số (tỷ)<input class="bd-field" type="number" step="0.1" name="bd_price_number"></label>
								<label>Diện tích<input class="bd-field" name="bd_area" placeholder="Ví dụ: 80 m²" required></label>
								<label>Diện tích số<input class="bd-field" type="number" name="bd_area_number"></label>
								<label>Phòng ngủ<input class="bd-field" type="number" name="bd_bed"></label>
								<label>WC<input class="bd-field" type="number" name="bd_bath"></label>
							</div>
							<div class="bd-form-grid">
								<label>Loại hình<select class="bd-field" name="bd_type"><option>Căn hộ</option><option>Nhà phố</option><option>Biệt thự</option><option>Đất nền</option></select></label>
								<label>Tỉnh/Thành<input class="bd-field" name="bd_city"></label>
								<label>Quận/Huyện<input class="bd-field" name="bd_district"></label>
								<label>Địa chỉ<input class="bd-field" name="bd_address"></label>
							</div>
							<label>Mô tả<textarea class="bd-field" name="bd_description" required></textarea></label>
							<div class="bd-form-grid">
								<label>Họ tên<input class="bd-field" name="bd_name" required></label>
								<label>Số điện thoại<input class="bd-field" name="bd_phone" required></label>
								<label>Email<input class="bd-field" type="email" name="bd_email"></label>
							</div>
							<label>Hình ảnh bất động sản<input class="bd-field bd-file-field" type="file" name="bd_images[]" accept="image/jpeg,image/png,image/webp" multiple></label>
							<button class="bd-btn" type="submit">Gửi tin chờ duyệt</button>
						</form>
					</div>
					<aside class="bd-panel"><h2>Quy trình duyệt tin</h2><ol class="bd-step-list"><li>Người bán gửi thông tin.</li><li>Admin kiểm tra pháp lý, giá và hình ảnh.</li><li>Tin hợp lệ được xuất bản.</li><li>Khách hàng gửi lead hoặc đặt lịch xem nhà.</li></ol></aside>
				</div>
			</section>

		<?php elseif ( 'yeu-thich' === $slug ) : ?>
			<section class="bd-section">
				<div class="bd-container">
					<?php if ( ! is_user_logged_in() ) : ?>
						<div class="bd-panel"><h2>Đăng nhập để xem tin yêu thích</h2><p>Sau khi đăng nhập, các tin bạn lưu bằng biểu tượng trái tim sẽ hiển thị tại đây.</p><a class="bd-btn" href="<?php echo esc_url( home_url( '/dang-nhap/' ) ); ?>">Đăng nhập</a></div>
					<?php else : ?>
						<?php
						$favorites = get_user_meta( get_current_user_id(), '_bd_favorites', true );
						$favorites = is_array( $favorites ) ? array_filter( array_map( 'absint', $favorites ) ) : array();
						if ( $favorites ) :
							$fav_query = new WP_Query( array( 'post_type' => 'property', 'post__in' => $favorites, 'posts_per_page' => 12 ) );
							?>
							<div class="bd-grid bd-listing-grid">
								<?php
								while ( $fav_query->have_posts() ) :
									$fav_query->the_post();
									bd_pro_property_card();
								endwhile;
								wp_reset_postdata();
								?>
							</div>
						<?php else : ?>
							<div class="bd-panel"><h2>Chưa có tin yêu thích</h2><p>Hãy mở trang chi tiết bất động sản và bấm lưu tin để thêm vào danh sách.</p></div>
						<?php endif; ?>
					<?php endif; ?>
				</div>
			</section>

		<?php else : ?>
			<section class="bd-section">
				<div class="bd-container bd-content"><?php the_content(); ?></div>
			</section>
		<?php endif; ?>
	</main>
	<?php
endwhile;

get_footer();
