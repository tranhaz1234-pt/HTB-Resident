<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="bd-header">
	<div class="bd-wide bd-nav">
		<a class="bd-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<span class="bd-logo-mark" aria-hidden="true"></span>
			<span><strong>HTB Resident</strong><small>Nền tảng bất động sản</small></span>
		</a>
		<nav class="bd-menu" aria-label="Menu chính">
			<ul>
				<li><a data-i18n="nav_listing" href="<?php echo esc_url( get_post_type_archive_link( 'property' ) ); ?>">Nhà đất bán & cho thuê</a></li>
				<li><a data-i18n="nav_projects" href="<?php echo esc_url( home_url( '/du-an/' ) ); ?>">Dự án</a></li>
				<li><a data-i18n="nav_news" href="<?php echo esc_url( home_url( '/tin-tuc/' ) ); ?>">Tin tức</a></li>
				<li><a href="<?php echo esc_url( home_url( '/wiki-bds/' ) ); ?>">Wiki BĐS</a></li>
				<li><a data-i18n="nav_analysis" href="<?php echo esc_url( home_url( '/phan-tich-danh-gia/' ) ); ?>">Phân tích đánh giá</a></li>
				<li><a data-i18n="nav_directory" href="<?php echo esc_url( home_url( '/danh-ba/' ) ); ?>">Danh bạ</a></li>
			</ul>
		</nav>
		<div class="bd-header-actions">
			<a class="bd-heart" aria-label="Tin yêu thích" href="<?php echo esc_url( home_url( '/yeu-thich/' ) ); ?>">♡</a>
			<?php if ( is_user_logged_in() ) : ?>
				<?php if ( current_user_can( 'manage_options' ) ) : ?>
					<a class="bd-admin-link" href="<?php echo esc_url( home_url( '/phe-duyet-tin/' ) ); ?>">Duyệt tin</a>
					<a class="bd-admin-link" href="<?php echo esc_url( home_url( '/duyet-phan-hoi/' ) ); ?>">Phản hồi</a>
				<?php endif; ?>
				<a data-i18n="logout" href="<?php echo esc_url( wp_logout_url( home_url( '/' ) ) ); ?>">Đăng xuất</a>
			<?php else : ?>
				<a data-i18n="login" href="<?php echo esc_url( home_url( '/dang-nhap/' ) ); ?>">Đăng nhập</a>
				<a data-i18n="register" href="<?php echo esc_url( home_url( '/dang-ky/' ) ); ?>">Đăng ký</a>
			<?php endif; ?>
			<a class="bd-post-btn" data-i18n="post_property" href="<?php echo esc_url( home_url( '/dang-tin/' ) ); ?>">Đăng tin</a>
			<?php if ( is_user_logged_in() ) : ?>
				<?php $bd_current_user = wp_get_current_user(); ?>
				<span class="bd-user-link"><?php echo esc_html( $bd_current_user->display_name ?: $bd_current_user->user_login ); ?></span>
			<?php endif; ?>
		</div>
	</div>
</header>
