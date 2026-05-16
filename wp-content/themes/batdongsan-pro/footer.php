<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$archive_url = get_post_type_archive_link( 'property' );
$footer_groups = array(
	'Chủ đề nổi bật' => array(
		'Tin tức bất động sản' => home_url( '/tin-tuc/' ),
		'Bất động sản Hà Nội' => add_query_arg( 'bd_city', 'Ha Noi', $archive_url ),
		'Bất động sản Hồ Chí Minh' => add_query_arg( 'bd_city', 'TP HCM', $archive_url ),
		'Báo cáo thị trường' => home_url( '/phan-tich-danh-gia/' ),
		'Mua bất động sản' => add_query_arg( 'property_status', 'dang-ban', $archive_url ),
	),
	'Bất động sản bán' => array(
		'Bán căn hộ chung cư' => add_query_arg( array( 'property_status' => 'dang-ban', 'bd_type' => 'Can ho' ), $archive_url ),
		'Bán chung cư mini, căn hộ dịch vụ' => add_query_arg( array( 'property_status' => 'dang-ban', 's' => 'chung cư mini' ), $archive_url ),
		'Bán nhà riêng' => add_query_arg( array( 'property_status' => 'dang-ban', 'bd_type' => 'Nha pho' ), $archive_url ),
		'Bán biệt thự, liền kề' => add_query_arg( array( 'property_status' => 'dang-ban', 'bd_type' => 'Biet thu' ), $archive_url ),
		'Bán nhà mặt phố, mặt tiền' => add_query_arg( array( 'property_status' => 'dang-ban', 's' => 'mặt tiền' ), $archive_url ),
	),
	'Bất động sản thuê' => array(
		'Thuê căn hộ chung cư' => add_query_arg( array( 'property_status' => 'cho-thue', 'bd_type' => 'Can ho' ), $archive_url ),
		'Thuê chung cư mini, căn hộ dịch vụ' => add_query_arg( array( 'property_status' => 'cho-thue', 's' => 'chung cư mini' ), $archive_url ),
		'Thuê nhà riêng' => add_query_arg( array( 'property_status' => 'cho-thue', 'bd_type' => 'Nha pho' ), $archive_url ),
		'Thuê biệt thự, liền kề' => add_query_arg( array( 'property_status' => 'cho-thue', 'bd_type' => 'Biet thu' ), $archive_url ),
		'Thuê văn phòng' => add_query_arg( array( 'property_status' => 'cho-thue', 's' => 'văn phòng' ), $archive_url ),
	),
	'Bất động sản toàn quốc' => array(
		'Mua bán bất động sản Hà Nội' => add_query_arg( array( 'property_status' => 'dang-ban', 'bd_city' => 'Ha Noi' ), $archive_url ),
		'Cho thuê bất động sản Hà Nội' => add_query_arg( array( 'property_status' => 'cho-thue', 'bd_city' => 'Ha Noi' ), $archive_url ),
		'Mua bán bất động sản Hồ Chí Minh' => add_query_arg( array( 'property_status' => 'dang-ban', 'bd_city' => 'TP HCM' ), $archive_url ),
		'Cho thuê bất động sản Hồ Chí Minh' => add_query_arg( array( 'property_status' => 'cho-thue', 'bd_city' => 'TP HCM' ), $archive_url ),
	),
	'Dự án nổi bật' => array(
		'Căn hộ chung cư' => home_url( '/du-an/?bd_type=Can%20ho' ),
		'Biệt thự liền kề' => home_url( '/du-an/?bd_type=Biet%20thu' ),
		'Khu đô thị mới' => home_url( '/du-an/?s=khu%20do%20thi' ),
		'Khu phức hợp' => home_url( '/du-an/?s=khu%20phuc%20hop' ),
		'Nhà ở xã hội' => home_url( '/du-an/?s=nha%20o%20xa%20hoi' ),
	),
	'Chủ đầu tư nổi bật' => array(
		'Bất động sản Vinhomes' => add_query_arg( 's', 'Vinhomes', $archive_url ),
		'Bất động sản Sunshine' => add_query_arg( 's', 'Sunshine', $archive_url ),
		'Bất động sản Phú Mỹ Hưng' => add_query_arg( 's', 'Phu My Hung', $archive_url ),
		'Masterise Homes' => add_query_arg( 's', 'Masterise', $archive_url ),
		'Hưng Thịnh' => add_query_arg( 's', 'Hung Thinh', $archive_url ),
	),
	'Bất động sản Quận/Huyện' => array(
		'Nhà riêng Hồ Chí Minh' => add_query_arg( array( 'bd_city' => 'TP HCM', 'bd_type' => 'Nha pho' ), $archive_url ),
		'Nhà riêng Hà Nội' => add_query_arg( array( 'bd_city' => 'Ha Noi', 'bd_type' => 'Nha pho' ), $archive_url ),
		'Căn hộ chung cư Hà Nội' => add_query_arg( array( 'bd_city' => 'Ha Noi', 'bd_type' => 'Can ho' ), $archive_url ),
		'Căn hộ chung cư Hồ Chí Minh' => add_query_arg( array( 'bd_city' => 'TP HCM', 'bd_type' => 'Can ho' ), $archive_url ),
	),
	'Giá bất động sản toàn quốc' => array(
		'Giá căn hộ chung cư' => home_url( '/phan-tich-danh-gia/?type=can-ho' ),
		'Giá nhà đất' => home_url( '/phan-tich-danh-gia/?type=nha-dat' ),
		'Giá biệt thự liền kề' => home_url( '/phan-tich-danh-gia/?type=biet-thu' ),
		'Giá shophouse, nhà phố' => home_url( '/phan-tich-danh-gia/?type=shophouse' ),
	),
);
?>
<section id="footer-links" class="bd-seo-links">
	<div class="bd-container">
		<p><strong>HTB Resident</strong> là nền tảng bất động sản dành cho người tìm mua, thuê và đầu tư. Website cung cấp dữ liệu tin rao, dự án, khu vực và công cụ hỗ trợ để người dùng chọn sản phẩm phù hợp.</p>
		<div class="bd-footer-link-grid">
			<?php foreach ( $footer_groups as $title => $links ) : ?>
				<div>
					<h3><?php echo esc_html( $title ); ?></h3>
					<?php foreach ( $links as $label => $url ) : ?>
						<a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $label ); ?>⌄</a>
					<?php endforeach; ?>
					<a class="bd-red-link" href="<?php echo esc_url( $archive_url ); ?>">Xem thêm</a>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<footer class="bd-footer">
	<div class="bd-container">
		<div class="bd-footer-top">
			<a class="bd-logo bd-footer-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<span class="bd-logo-mark" aria-hidden="true"></span>
				<span><strong>HTB Resident</strong><small>Nền tảng bất động sản</small></span>
			</a>
			<div><strong>Hotline</strong><span>1900 1881</span></div>
			<div><strong>Hỗ trợ khách hàng</strong><span>trogiup.htbresident.vn</span></div>
			<div><strong>Chăm sóc khách hàng</strong><span>hotro@htbresident.vn</span></div>
		</div>
		<div class="bd-footer-main">
			<div>
				<h3>HTB Resident</h3>
				<p>Thương hiệu của chúng tôi</p>
				<p>Nền tảng bất động sản dành cho người mua, thuê, đầu tư và quản lý nhu cầu nhà ở tại Việt Nam.</p>
			</div>
			<div><h3>HƯỚNG DẪN</h3><a href="<?php echo esc_url( home_url( '/danh-ba/' ) ); ?>">Về chúng tôi</a><a href="<?php echo esc_url( home_url( '/dang-tin/' ) ); ?>">Báo giá và hỗ trợ</a><a href="<?php echo esc_url( home_url( '/wiki-bds/' ) ); ?>">Câu hỏi thường gặp</a><a href="#bd-feedback-modal" data-bd-modal-open>Góp ý báo lỗi</a><a href="<?php echo esc_url( home_url( '/sitemap.xml' ) ); ?>">Sitemap</a></div>
			<div><h3>QUY ĐỊNH</h3><a href="<?php echo esc_url( home_url( '/dang-tin/' ) ); ?>">Quy định đăng tin</a><a href="<?php echo esc_url( home_url( '/danh-ba/' ) ); ?>">Quy chế hoạt động</a><a href="<?php echo esc_url( home_url( '/wiki-bds/' ) ); ?>">Điều khoản thỏa thuận</a><a href="<?php echo esc_url( home_url( '/wiki-bds/' ) ); ?>">Chính sách bảo mật</a><a href="#bd-feedback-modal" data-bd-modal-open>Giải quyết khiếu nại</a></div>
			<div>
				<h3>ĐĂNG KÝ NHẬN TIN</h3>
				<?php if ( isset( $_GET['newsletter_sent'] ) ) : ?><div class="bd-mini-notice">Đã đăng ký nhận tin.</div><?php endif; ?>
				<form class="bd-newsletter" method="post">
					<?php wp_nonce_field( 'bd_front_action', 'bd_nonce' ); ?>
					<input type="hidden" name="bd_action" value="newsletter">
					<input type="email" name="bd_email" placeholder="Nhập email của bạn" required>
					<button type="submit">➤</button>
				</form>
				<h3 data-i18n="locale_title">QUỐC GIA & NGÔN NGỮ</h3>
				<details class="bd-locale-select">
					<summary><span data-bd-locale-label>Việt Nam / Tiếng Việt</span></summary>
					<div class="bd-locale-menu">
						<label>Quốc gia<select class="bd-field" data-bd-country>
							<option value="vn">Việt Nam</option>
							<option value="us">United States</option>
							<option value="jp">Japan</option>
							<option value="kr">Korea</option>
						</select></label>
						<label>Ngôn ngữ<select class="bd-field" data-bd-language>
							<option value="vi">Tiếng Việt</option>
							<option value="en">English</option>
							<option value="ja">日本語</option>
							<option value="ko">한국어</option>
						</select></label>
					</div>
				</details>
			</div>
		</div>
		<div class="bd-branches">
			<button class="bd-branch-toggle" type="button">⌄ Xem chi nhánh của HTB Resident</button>
			<div class="bd-branch-list"><p><b>Chi nhánh TP. Hồ Chí Minh</b><br>Tầng 2, 285 Cách Mạng Tháng Tám, Quận 10. Hotline: 1900 1881</p><p><b>Chi nhánh Đà Nẵng</b><br>Tầng 9 Vĩnh Trung Plaza, 255-257 Hùng Vương. Hotline: 1900 1881</p><p><b>Chi nhánh Hải Phòng</b><br>TD Business Center, Lô 20A Lê Hồng Phong. Hotline: 1900 1881</p></div>
		</div>
	</div>
</footer>
<div id="bd-feedback-modal" class="bd-modal" aria-hidden="true">
	<div class="bd-modal-box">
		<button class="bd-modal-close" type="button" data-bd-modal-close>×</button>
		<h2>Gửi phản hồi</h2>
		<?php if ( isset( $_GET['feedback_sent'] ) ) : ?><div class="bd-notice">Đã ghi nhận phản hồi.</div><?php endif; ?>
		<form class="bd-submit-form" method="post">
			<?php wp_nonce_field( 'bd_front_action', 'bd_nonce' ); ?>
			<input type="hidden" name="bd_action" value="feedback">
			<label>Chủ đề<input class="bd-field" name="bd_topic" value="Góp ý website"></label>
			<label>Họ tên<input class="bd-field" name="bd_name" required></label>
			<label>Số điện thoại<input class="bd-field" name="bd_phone"></label>
			<label>Email<input class="bd-field" type="email" name="bd_email"></label>
			<label>Nội dung<textarea class="bd-field" name="bd_message" required></textarea></label>
			<button class="bd-btn" type="submit">Gửi phản hồi</button>
		</form>
	</div>
</div>
<a class="bd-feedback" href="#bd-feedback-modal" data-bd-modal-open>Phản hồi</a>
<a class="bd-chat" href="#bd-feedback-modal" data-bd-modal-open>☰</a>
<a class="bd-backtop" href="#">↑</a>
<?php wp_footer(); ?>
</body>
</html>
