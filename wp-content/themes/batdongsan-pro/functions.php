<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'BD_PRO_VERSION', '1.0.0' );

function bd_pro_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	register_nav_menus(
		array(
			'primary' => __( 'Menu chinh', 'batdongsan-pro' ),
		)
	);
}
add_action( 'after_setup_theme', 'bd_pro_setup' );

function bd_pro_assets() {
	wp_enqueue_style( 'bd-pro-style', get_stylesheet_uri(), array(), BD_PRO_VERSION );
	wp_enqueue_script( 'bd-pro-script', get_template_directory_uri() . '/assets/site.js', array(), BD_PRO_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'bd_pro_assets' );

function bd_pro_activation_tasks() {
	add_role(
		'bd_agent',
		'Moi gioi / Nguoi ban',
		array(
			'read'                  => true,
			'upload_files'          => true,
			'edit_posts'            => true,
			'delete_posts'          => true,
			'edit_published_posts'  => true,
			'delete_published_posts'=> true,
			'publish_posts'         => true,
		)
	);
	add_role(
		'bd_applicant',
		'Khach hang',
		array(
			'read' => true,
		)
	);
}
add_action( 'after_switch_theme', 'bd_pro_activation_tasks' );

function bd_pro_register_property_type() {
	$labels = array(
		'name'          => 'Bất động sản',
		'singular_name' => 'Bất động sản',
		'add_new_item'  => 'Thêm bất động sản',
		'edit_item'     => 'Sửa bất động sản',
	);

	register_post_type(
		'property',
		array(
			'labels'       => $labels,
			'public'       => true,
			'menu_icon'    => 'dashicons-building',
			'has_archive'  => true,
			'rewrite'      => array( 'slug' => 'bat-dong-san' ),
			'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			'show_in_rest' => true,
		)
	);

	register_taxonomy(
		'property_location',
		'property',
		array(
			'label'        => 'Khu vực',
			'public'       => true,
			'hierarchical' => true,
			'rewrite'      => array( 'slug' => 'khu-vuc' ),
			'show_in_rest' => true,
		)
	);

	register_taxonomy(
		'property_status',
		'property',
		array(
			'label'        => 'Trang thai',
			'public'       => true,
			'hierarchical' => true,
			'rewrite'      => array( 'slug' => 'nhu-cau' ),
			'show_in_rest' => true,
		)
	);

	register_post_type(
		'bd_lead',
		array(
			'labels'       => array( 'name' => 'Khách liên hệ', 'singular_name' => 'Khách liên hệ' ),
			'public'       => false,
			'show_ui'      => true,
			'menu_icon'    => 'dashicons-email-alt2',
			'supports'     => array( 'title' ),
			'capability_type' => 'post',
		)
	);

	register_post_type(
		'bd_appointment',
		array(
			'labels'       => array( 'name' => 'Lịch xem nhà', 'singular_name' => 'Lịch xem nhà' ),
			'public'       => false,
			'show_ui'      => true,
			'menu_icon'    => 'dashicons-calendar-alt',
			'supports'     => array( 'title' ),
			'capability_type' => 'post',
		)
	);

	register_post_type(
		'bd_feedback',
		array(
			'labels'          => array( 'name' => 'Phản hồi', 'singular_name' => 'Phản hồi' ),
			'public'          => false,
			'show_ui'         => true,
			'menu_icon'       => 'dashicons-format-chat',
			'supports'        => array( 'title' ),
			'capability_type' => 'post',
		)
	);

	register_post_type(
		'bd_subscriber',
		array(
			'labels'          => array( 'name' => 'Đăng ký nhận tin', 'singular_name' => 'Đăng ký nhận tin' ),
			'public'          => false,
			'show_ui'         => true,
			'menu_icon'       => 'dashicons-email',
			'supports'        => array( 'title' ),
			'capability_type' => 'post',
		)
	);

	register_post_type(
		'bd_payment',
		array(
			'labels'          => array( 'name' => 'Thanh toán giữ chỗ', 'singular_name' => 'Thanh toán giữ chỗ' ),
			'public'          => false,
			'show_ui'         => true,
			'menu_icon'       => 'dashicons-money-alt',
			'supports'        => array( 'title' ),
			'capability_type' => 'post',
		)
	);
}
add_action( 'init', 'bd_pro_register_property_type' );

function bd_pro_meta_fields() {
	return array(
		'price'            => 'Giá hiển thị',
		'price_number'     => 'Giá số (tỷ VND)',
		'area'             => 'Diện tích hiển thị',
		'area_number'      => 'Diện tích số (m²)',
		'bed'              => 'Phòng ngủ',
		'bath'             => 'Phòng tắm',
		'type'             => 'Loại hình',
		'direction'        => 'Hướng nhà',
		'legal'            => 'Pháp lý',
		'city'             => 'Tỉnh/Thành phố',
		'district'         => 'Quận/Huyện',
		'address'          => 'Địa chỉ',
		'lat'              => 'Vĩ độ',
		'lng'              => 'Kinh độ',
		'virtual_tour'     => 'Link virtual tour 360/VR',
		'balcony_view'     => 'Mô tả view từ ban công',
		'seo_title'        => 'SEO title',
		'seo_description'  => 'SEO meta description',
	);
}

function bd_pro_add_meta_boxes() {
	add_meta_box( 'bd_property_details', 'Thong tin bat dong san', 'bd_pro_property_meta_box', 'property', 'normal', 'high' );
	add_meta_box( 'bd_lead_details', 'Thong tin khach lien he', 'bd_pro_readonly_meta_box', 'bd_lead', 'normal', 'high' );
	add_meta_box( 'bd_appointment_details', 'Thong tin lich xem nha', 'bd_pro_readonly_meta_box', 'bd_appointment', 'normal', 'high' );
	add_meta_box( 'bd_feedback_details', 'Thong tin phan hoi', 'bd_pro_readonly_meta_box', 'bd_feedback', 'normal', 'high' );
	add_meta_box( 'bd_subscriber_details', 'Thong tin dang ky', 'bd_pro_readonly_meta_box', 'bd_subscriber', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'bd_pro_add_meta_boxes' );

function bd_pro_feedback_admin_columns( $columns ) {
	return array(
		'cb'          => $columns['cb'],
		'title'       => 'Tiêu đề',
		'bd_name'     => 'Khách hàng',
		'bd_contact'  => 'Liên hệ',
		'bd_message'  => 'Nội dung',
		'bd_status'   => 'Trạng thái',
		'bd_actions'  => 'Duyệt phản hồi',
		'date'        => 'Thời gian',
	);
}
add_filter( 'manage_bd_feedback_posts_columns', 'bd_pro_feedback_admin_columns' );

function bd_pro_feedback_admin_column_content( $column, $post_id ) {
	if ( 'bd_name' === $column ) {
		echo esc_html( get_post_meta( $post_id, '_bd_name', true ) ?: 'Khách chưa nhập tên' );
		return;
	}
	if ( 'bd_contact' === $column ) {
		$phone = get_post_meta( $post_id, '_bd_phone', true );
		$email = get_post_meta( $post_id, '_bd_email', true );
		echo esc_html( trim( $phone . ( $phone && $email ? ' - ' : '' ) . $email ) ?: 'Chưa có thông tin' );
		return;
	}
	if ( 'bd_message' === $column ) {
		echo esc_html( wp_trim_words( get_post_meta( $post_id, '_bd_message', true ), 18 ) );
		return;
	}
	if ( 'bd_status' === $column ) {
		$status = get_post_status( $post_id );
		$labels = array(
			'pending' => 'Chờ duyệt',
			'publish' => 'Đã duyệt',
			'draft'   => 'Đã chuyển nháp',
			'trash'   => 'Đã xóa',
		);
		echo esc_html( $labels[ $status ] ?? $status );
		return;
	}
	if ( 'bd_actions' === $column ) {
		$status = get_post_status( $post_id );
		$links  = array();
		if ( 'publish' !== $status ) {
			$links[] = '<a class="button button-primary" href="' . esc_url( bd_pro_feedback_action_url( $post_id, 'approve' ) ) . '">Duyệt</a>';
		}
		if ( 'draft' !== $status ) {
			$links[] = '<a class="button" href="' . esc_url( bd_pro_feedback_action_url( $post_id, 'draft' ) ) . '">Chuyển nháp</a>';
		}
		$links[] = '<a class="button-link-delete" href="' . esc_url( bd_pro_feedback_action_url( $post_id, 'trash' ) ) . '" onclick="return confirm(\'Xóa phản hồi này?\')">Xóa</a>';
		echo wp_kses_post( implode( ' ', $links ) );
	}
}
add_action( 'manage_bd_feedback_posts_custom_column', 'bd_pro_feedback_admin_column_content', 10, 2 );

function bd_pro_feedback_action_url( $post_id, $action ) {
	return wp_nonce_url(
		add_query_arg(
			array(
				'bd_feedback_action' => $action,
				'feedback_id'        => absint( $post_id ),
			),
			admin_url( 'edit.php?post_type=bd_feedback' )
		),
		'bd_feedback_action_' . absint( $post_id )
	);
}

function bd_pro_handle_feedback_admin_action() {
	if ( ! is_admin() || ! current_user_can( 'edit_posts' ) || empty( $_GET['bd_feedback_action'] ) || empty( $_GET['feedback_id'] ) ) {
		return;
	}

	$post_id = absint( $_GET['feedback_id'] );
	if ( 'bd_feedback' !== get_post_type( $post_id ) ) {
		return;
	}
	check_admin_referer( 'bd_feedback_action_' . $post_id );

	$action = sanitize_key( wp_unslash( $_GET['bd_feedback_action'] ) );
	if ( 'approve' === $action ) {
		wp_update_post( array( 'ID' => $post_id, 'post_status' => 'publish' ) );
		update_post_meta( $post_id, '_bd_status', 'Đã duyệt' );
	}
	if ( 'draft' === $action ) {
		wp_update_post( array( 'ID' => $post_id, 'post_status' => 'draft' ) );
		update_post_meta( $post_id, '_bd_status', 'Đã chuyển nháp' );
	}
	if ( 'trash' === $action ) {
		wp_trash_post( $post_id );
	}

	wp_safe_redirect( remove_query_arg( array( 'bd_feedback_action', 'feedback_id', '_wpnonce' ) ) );
	exit;
}
add_action( 'admin_init', 'bd_pro_handle_feedback_admin_action' );

function bd_pro_register_feedback_review_page() {
	add_submenu_page(
		'edit.php?post_type=bd_feedback',
		'Duyệt phản hồi',
		'Duyệt phản hồi',
		'edit_posts',
		'bd-feedback-review',
		'bd_pro_feedback_review_page'
	);
}
add_action( 'admin_menu', 'bd_pro_register_feedback_review_page' );

function bd_pro_feedback_review_page() {
	if ( ! current_user_can( 'edit_posts' ) ) {
		wp_die( esc_html__( 'Bạn không có quyền xem trang này.', 'batdongsan-pro' ) );
	}

	$feedbacks = get_posts(
		array(
			'post_type'      => 'bd_feedback',
			'post_status'    => array( 'pending', 'publish', 'draft' ),
			'posts_per_page' => 50,
			'orderby'        => 'date',
			'order'          => 'DESC',
		)
	);
	?>
	<div class="wrap">
		<h1>Duyệt phản hồi khách</h1>
		<p>Phản hồi mới của khách sẽ vào trạng thái <strong>Chờ duyệt</strong>. Admin có thể duyệt, chuyển nháp hoặc xóa tại đây.</p>
		<table class="widefat striped">
			<thead>
				<tr>
					<th>Chủ đề</th>
					<th>Khách hàng</th>
					<th>Liên hệ</th>
					<th>Nội dung</th>
					<th>Trạng thái</th>
					<th>Thao tác</th>
				</tr>
			</thead>
			<tbody>
				<?php if ( $feedbacks ) : ?>
					<?php foreach ( $feedbacks as $feedback ) : ?>
						<?php
						$status = get_post_status( $feedback );
						$labels = array(
							'pending' => 'Chờ duyệt',
							'publish' => 'Đã duyệt',
							'draft'   => 'Đã chuyển nháp',
						);
						?>
						<tr>
							<td><strong><?php echo esc_html( get_post_meta( $feedback->ID, '_bd_topic', true ) ?: $feedback->post_title ); ?></strong><br><a href="<?php echo esc_url( get_edit_post_link( $feedback->ID ) ); ?>">Xem chi tiết</a></td>
							<td><?php echo esc_html( get_post_meta( $feedback->ID, '_bd_name', true ) ?: 'Khách chưa nhập tên' ); ?></td>
							<td><?php echo esc_html( trim( get_post_meta( $feedback->ID, '_bd_phone', true ) . ' ' . get_post_meta( $feedback->ID, '_bd_email', true ) ) ?: 'Chưa có thông tin' ); ?></td>
							<td><?php echo esc_html( wp_trim_words( get_post_meta( $feedback->ID, '_bd_message', true ), 24 ) ); ?></td>
							<td><?php echo esc_html( $labels[ $status ] ?? $status ); ?></td>
							<td>
								<?php if ( 'publish' !== $status ) : ?>
									<a class="button button-primary" href="<?php echo esc_url( bd_pro_feedback_action_url( $feedback->ID, 'approve' ) ); ?>">Duyệt</a>
								<?php endif; ?>
								<?php if ( 'draft' !== $status ) : ?>
									<a class="button" href="<?php echo esc_url( bd_pro_feedback_action_url( $feedback->ID, 'draft' ) ); ?>">Chuyển nháp</a>
								<?php endif; ?>
								<a class="button-link-delete" href="<?php echo esc_url( bd_pro_feedback_action_url( $feedback->ID, 'trash' ) ); ?>" onclick="return confirm('Xóa phản hồi này?')">Xóa</a>
							</td>
						</tr>
					<?php endforeach; ?>
				<?php else : ?>
					<tr><td colspan="6">Chưa có phản hồi nào.</td></tr>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
	<?php
}

function bd_pro_property_meta_box( $post ) {
	wp_nonce_field( 'bd_pro_save_property_meta', 'bd_pro_property_nonce' );
	foreach ( bd_pro_meta_fields() as $key => $label ) {
		$value = get_post_meta( $post->ID, '_bd_' . $key, true );
		echo '<p><label style="display:block;font-weight:600;margin-bottom:6px" for="bd_' . esc_attr( $key ) . '">' . esc_html( $label ) . '</label>';
		echo '<input style="width:100%;max-width:620px" type="text" id="bd_' . esc_attr( $key ) . '" name="bd_' . esc_attr( $key ) . '" value="' . esc_attr( $value ) . '"></p>';
	}
}

function bd_pro_readonly_meta_box( $post ) {
	$fields = array(
		'_bd_property_id' => 'Bất động sản',
		'_bd_name'        => 'Họ tên',
		'_bd_phone'       => 'Số điện thoại',
		'_bd_email'       => 'Email',
		'_bd_message'     => 'Nội dung',
		'_bd_date'        => 'Ngày hẹn',
		'_bd_time'        => 'Giờ hẹn',
		'_bd_topic'       => 'Chủ đề',
		'_bd_email'       => 'Email',
		'_bd_source'      => 'Nguồn',
	);
	echo '<table class="widefat striped"><tbody>';
	foreach ( $fields as $key => $label ) {
		$value = get_post_meta( $post->ID, $key, true );
		if ( '' === $value ) {
			continue;
		}
		if ( '_bd_property_id' === $key ) {
			$link  = get_edit_post_link( (int) $value );
			$value = $link ? '<a href="' . esc_url( $link ) . '">' . esc_html( get_the_title( (int) $value ) ) . '</a>' : esc_html( $value );
		} else {
			$value = esc_html( $value );
		}
		echo '<tr><th style="width:180px">' . esc_html( $label ) . '</th><td>' . $value . '</td></tr>';
	}
	echo '</tbody></table>';
}

function bd_pro_save_property_meta( $post_id ) {
	if ( ! isset( $_POST['bd_pro_property_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['bd_pro_property_nonce'] ) ), 'bd_pro_save_property_meta' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	foreach ( array_keys( bd_pro_meta_fields() ) as $key ) {
		if ( isset( $_POST[ 'bd_' . $key ] ) ) {
			update_post_meta( $post_id, '_bd_' . $key, sanitize_text_field( wp_unslash( $_POST[ 'bd_' . $key ] ) ) );
		}
	}
}
add_action( 'save_post_property', 'bd_pro_save_property_meta' );

function bd_pro_property_meta( $post_id, $key ) {
	return get_post_meta( $post_id, '_bd_' . $key, true );
}

function bd_pro_type_label( $type ) {
	$types = array(
		'Can ho'   => 'Căn hộ',
		'Căn hộ'   => 'Căn hộ',
		'Nha pho'  => 'Nhà phố',
		'Nhà phố'  => 'Nhà phố',
		'Biet thu' => 'Biệt thự',
		'Biệt thự' => 'Biệt thự',
		'Dat nen'  => 'Đất nền',
		'Đất nền'  => 'Đất nền',
	);
	return $types[ $type ] ?? $type;
}

function bd_pro_term_label( $slug, $fallback = '' ) {
	$labels = array(
		'dang-ban'        => 'Đang bán',
		'da-ban'          => 'Đã bán',
		'cho-thue'        => 'Cho thuê',
		'da-cho-thue'     => 'Đã cho thuê',
		'dang-cho-duyet'  => 'Đang chờ duyệt',
		'du-an-moi'       => 'Dự án mới',
		'quan-1'          => 'Quận 1',
		'thu-duc'         => 'Thủ Đức',
		'binh-thanh'      => 'Bình Thạnh',
		'da-nang'         => 'Đà Nẵng',
		'ha-noi'          => 'Hà Nội',
	);
	return $labels[ $slug ] ?? ( $fallback ?: $slug );
}

function bd_pro_clean_text( $value ) {
	$map = array(
		'?ang b?n'       => 'Đang bán',
		'?? b?n'         => 'Đã bán',
		'Cho thu?'       => 'Cho thuê',
		'?ang ch? duy?t' => 'Đang chờ duyệt',
		'D? ?n m?i'      => 'Dự án mới',
		'TP HCM'         => 'TP. HCM',
		'Ho Chi Minh'    => 'Hồ Chí Minh',
		'H? Ch? Minh'    => 'Hồ Chí Minh',
		'Ha Noi'         => 'Hà Nội',
		'H? N?i'         => 'Hà Nội',
		'Da Nang'        => 'Đà Nẵng',
		'?? N?ng'        => 'Đà Nẵng',
		'Binh Thanh'     => 'Bình Thạnh',
		'B?nh Th?nh'     => 'Bình Thạnh',
		'Thu Duc'        => 'Thủ Đức',
		'Th? ??c'        => 'Thủ Đức',
		'Quan 1'         => 'Quận 1',
		'Qu?n 1'         => 'Quận 1',
		'Can ho'         => 'Căn hộ',
		'C?n h?'         => 'Căn hộ',
		'Nha pho'        => 'Nhà phố',
		'Nh? ph?'        => 'Nhà phố',
		'Biet thu'       => 'Biệt thự',
		'Bi?t th?'       => 'Biệt thự',
		'Dat nen'        => 'Đất nền',
		'??t n?n'        => 'Đất nền',
		'Dong Nam'       => 'Đông Nam',
		'Tay Bac'        => 'Tây Bắc',
		'Son Tra'        => 'Sơn Trà',
		'So hong rieng'  => 'Sổ hồng riêng',
		'So do'          => 'Sổ đỏ',
	);

	return $map[ $value ] ?? $value;
}

function bd_pro_ensure_property_status_terms() {
	if ( ! taxonomy_exists( 'property_status' ) ) {
		return;
	}
	$statuses = array(
		'dang-ban'        => 'Đang bán',
		'da-ban'          => 'Đã bán',
		'cho-thue'        => 'Cho thuê',
		'da-cho-thue'     => 'Đã cho thuê',
		'dang-cho-duyet'  => 'Đang chờ duyệt',
		'du-an-moi'       => 'Dự án mới',
	);
	foreach ( $statuses as $slug => $name ) {
		if ( ! term_exists( $slug, 'property_status' ) ) {
			wp_insert_term( $name, 'property_status', array( 'slug' => $slug ) );
		}
	}
}
add_action( 'init', 'bd_pro_ensure_property_status_terms', 20 );

function bd_pro_payment_amount_to_vnd( $amount ) {
	$digits = preg_replace( '/[^0-9]/', '', (string) $amount );
	return $digits ? absint( $digits ) : 0;
}

function bd_pro_sepay_config() {
	return array(
		'bank'          => defined( 'BD_SEPAY_BANK_ID' ) ? BD_SEPAY_BANK_ID : 'VietinBank',
		'account'       => defined( 'BD_SEPAY_ACCOUNT_NO' ) ? BD_SEPAY_ACCOUNT_NO : '107668817559',
		'account_name'  => defined( 'BD_SEPAY_ACCOUNT_NAME' ) ? BD_SEPAY_ACCOUNT_NAME : 'NGUYEN NGOC BINH',
		'webhook_token' => defined( 'BD_SEPAY_WEBHOOK_TOKEN' ) ? BD_SEPAY_WEBHOOK_TOKEN : '',
	);
}

function bd_pro_payment_code( $post_id ) {
	return 'HTB' . absint( $post_id );
}

function bd_pro_payment_qr_url( $post_id, $amount ) {
	$config   = bd_pro_sepay_config();
	$add_info = bd_pro_payment_code( $post_id );
	$query = array(
		'amount'      => bd_pro_payment_amount_to_vnd( $amount ),
		'addInfo'     => $add_info,
		'des'         => $add_info,
		'accountName' => $config['account_name'],
	);
	return 'https://img.vietqr.io/image/' . rawurlencode( $config['bank'] ) . '-' . rawurlencode( $config['account'] ) . '-compact2.png?' . http_build_query( $query, '', '&', PHP_QUERY_RFC3986 );
}

function bd_pro_property_paid_status_slug( $property_id ) {
	$status_slugs = wp_get_post_terms( $property_id, 'property_status', array( 'fields' => 'slugs' ) );
	return in_array( 'cho-thue', $status_slugs, true ) ? 'da-cho-thue' : 'da-ban';
}

function bd_pro_mark_property_paid( $property_id ) {
	bd_pro_ensure_property_status_terms();
	wp_set_object_terms( $property_id, bd_pro_property_paid_status_slug( $property_id ), 'property_status', false );
}

function bd_pro_record_property_payment( $property_id, $amount, $status, $source, $raw = array(), $name = '', $phone = '', $email = '' ) {
	$payment_id = wp_insert_post(
		array(
			'post_type'   => 'bd_payment',
			'post_status' => 'publish',
			'post_title'  => 'Thanh toán - ' . get_the_title( $property_id ) . ' - ' . current_time( 'mysql' ),
		)
	);
	if ( ! $payment_id || is_wp_error( $payment_id ) ) {
		return 0;
	}
	update_post_meta( $payment_id, '_bd_property_id', $property_id );
	update_post_meta( $payment_id, '_bd_name', $name );
	update_post_meta( $payment_id, '_bd_phone', $phone );
	update_post_meta( $payment_id, '_bd_email', $email );
	update_post_meta( $payment_id, '_bd_amount', $amount );
	update_post_meta( $payment_id, '_bd_method', $source );
	update_post_meta( $payment_id, '_bd_status', $status );
	update_post_meta( $payment_id, '_bd_payment_code', bd_pro_payment_code( $property_id ) );
	update_post_meta( $payment_id, '_bd_raw_payload', wp_json_encode( $raw, JSON_UNESCAPED_UNICODE ) );
	return $payment_id;
}

function bd_pro_payment_gateway_id() {
	return 'mpay_up_vietinbank';
}

function bd_pro_create_property_payment_order( $property_id, $amount, $name, $phone, $email = '' ) {
	if ( ! function_exists( 'wc_create_order' ) || ! class_exists( 'WC_Order_Item_Fee' ) ) {
		return new WP_Error( 'woocommerce_missing', 'WooCommerce chua san sang.' );
	}

	$total = bd_pro_payment_amount_to_vnd( $amount );
	if ( ! $total ) {
		return new WP_Error( 'invalid_amount', 'So tien thanh toan khong hop le.' );
	}

	$order = wc_create_order();
	if ( is_wp_error( $order ) ) {
		return $order;
	}

	$item = new WC_Order_Item_Fee();
	$item->set_name( 'Thanh toan giu cho - ' . get_the_title( $property_id ) );
	$item->set_amount( $total );
	$item->set_total( $total );
	$order->add_item( $item );

	$name_parts = preg_split( '/\s+/', trim( $name ) );
	$last_name  = $name_parts ? array_pop( $name_parts ) : '';
	$first_name = trim( implode( ' ', $name_parts ) );
	$order->set_billing_first_name( $first_name ?: $name );
	$order->set_billing_last_name( $last_name );
	$order->set_billing_phone( $phone );
	if ( $email ) {
		$order->set_billing_email( $email );
	}

	$gateway_id = bd_pro_payment_gateway_id();
	$gateways   = WC()->payment_gateways() ? WC()->payment_gateways()->payment_gateways() : array();
	if ( isset( $gateways[ $gateway_id ] ) ) {
		$order->set_payment_method( $gateways[ $gateway_id ] );
	} else {
		$order->set_payment_method( $gateway_id );
	}

	$payment_code = bd_pro_payment_code( $property_id );
	$order->update_meta_data( '_bd_property_id', $property_id );
	$order->update_meta_data( '_bd_payment_code', $payment_code );
	$order->update_meta_data( '_bd_payment_source', 'property_payment' );
	$order->set_customer_note( 'Ma thanh toan tin bat dong san: ' . $payment_code );
	$order->calculate_totals();
	$order->save();

	update_post_meta( $property_id, '_bd_expected_payment_amount', $total );
	bd_pro_record_property_payment( $property_id, $total, 'Cho thanh toan WooCommerce', 'Quet ma Vietinbank', array( 'order_id' => $order->get_id() ), $name, $phone, $email );

	return $order;
}

function bd_pro_property_payment_redirect_url( $order ) {
	if ( ! $order || ! function_exists( 'WC' ) || ! WC()->payment_gateways() ) {
		return $order ? $order->get_checkout_payment_url() : home_url( '/' );
	}

	$gateway_id = bd_pro_payment_gateway_id();
	$gateways   = WC()->payment_gateways()->payment_gateways();
	if ( isset( $gateways[ $gateway_id ] ) && method_exists( $gateways[ $gateway_id ], 'process_payment' ) ) {
		$result = $gateways[ $gateway_id ]->process_payment( $order->get_id() );
		if ( is_array( $result ) && ! empty( $result['redirect'] ) ) {
			return $result['redirect'];
		}
	}

	return $order->get_checkout_payment_url();
}

function bd_pro_mark_property_paid_from_order( $order_id ) {
	$order = function_exists( 'wc_get_order' ) ? wc_get_order( $order_id ) : null;
	if ( ! $order ) {
		return;
	}

	$property_id = absint( $order->get_meta( '_bd_property_id' ) );
	if ( ! $property_id || 'property' !== get_post_type( $property_id ) ) {
		return;
	}

	if ( get_post_meta( $property_id, '_bd_paid_order_id', true ) === (string) $order_id ) {
		return;
	}

	$paid_status = bd_pro_property_paid_status_slug( $property_id );
	bd_pro_record_property_payment(
		$property_id,
		$order->get_total(),
		'Thanh cong',
		'WooCommerce - ' . $order->get_payment_method_title(),
		array( 'order_id' => $order_id, 'order_status' => $order->get_status() ),
		trim( $order->get_billing_first_name() . ' ' . $order->get_billing_last_name() ),
		$order->get_billing_phone(),
		$order->get_billing_email()
	);
	bd_pro_mark_property_paid( $property_id );
	update_post_meta( $property_id, '_bd_paid_order_id', $order_id );
	update_post_meta( $property_id, '_bd_paid_status', $paid_status );
}
add_action( 'woocommerce_payment_complete', 'bd_pro_mark_property_paid_from_order' );
add_action( 'woocommerce_order_status_completed', 'bd_pro_mark_property_paid_from_order' );
add_action( 'woocommerce_order_status_processing', 'bd_pro_mark_property_paid_from_order' );
add_action( 'woocommerce_order_status_paid', 'bd_pro_mark_property_paid_from_order' );

function bd_pro_extract_sepay_property_id( $payload ) {
	$haystack = array();
	foreach ( array( 'content', 'description', 'transferContent', 'transaction_content', 'referenceCode', 'code' ) as $key ) {
		if ( isset( $payload[ $key ] ) ) {
			$haystack[] = (string) $payload[ $key ];
		}
	}
	$text = implode( ' ', $haystack );
	if ( preg_match( '/\bHTB\s*([0-9]+)\b/i', $text, $matches ) ) {
		return absint( $matches[1] );
	}
	return 0;
}

function bd_pro_extract_sepay_amount( $payload ) {
	foreach ( array( 'transferAmount', 'amount', 'money', 'value' ) as $key ) {
		if ( isset( $payload[ $key ] ) ) {
			return bd_pro_payment_amount_to_vnd( $payload[ $key ] );
		}
	}
	return 0;
}

function bd_pro_sepay_webhook_permission( WP_REST_Request $request ) {
	$config = bd_pro_sepay_config();
	if ( '' === $config['webhook_token'] ) {
		return true;
	}
	$token = $request->get_header( 'x-sepay-token' );
	if ( ! $token ) {
		$token = (string) $request->get_param( 'token' );
	}
	return hash_equals( $config['webhook_token'], $token );
}

function bd_pro_handle_sepay_webhook( WP_REST_Request $request ) {
	$payload = $request->get_json_params();
	if ( ! is_array( $payload ) || empty( $payload ) ) {
		$payload = $request->get_body_params();
	}
	$property_id = bd_pro_extract_sepay_property_id( $payload );
	if ( ! $property_id || 'property' !== get_post_type( $property_id ) ) {
		return new WP_REST_Response( array( 'success' => false, 'message' => 'Không tìm thấy mã tin HTB trong giao dịch.' ), 422 );
	}
	$amount          = bd_pro_extract_sepay_amount( $payload );
	$expected_amount = bd_pro_payment_amount_to_vnd( get_post_meta( $property_id, '_bd_expected_payment_amount', true ) );
	if ( $expected_amount && $amount && $amount < $expected_amount ) {
		bd_pro_record_property_payment( $property_id, $amount, 'Thiếu tiền', 'SePay webhook', $payload );
		return new WP_REST_Response( array( 'success' => false, 'message' => 'Số tiền thanh toán chưa đủ.' ), 422 );
	}
	$paid_status = bd_pro_property_paid_status_slug( $property_id );
	bd_pro_record_property_payment( $property_id, $amount, 'Thành công', 'SePay webhook', $payload );
	bd_pro_mark_property_paid( $property_id );
	return new WP_REST_Response( array( 'success' => true, 'property_id' => $property_id, 'status' => $paid_status ), 200 );
}

function bd_pro_register_sepay_routes() {
	register_rest_route(
		'bd-pro/v1',
		'/sepay-webhook',
		array(
			'methods'             => WP_REST_Server::CREATABLE,
			'callback'            => 'bd_pro_handle_sepay_webhook',
			'permission_callback' => 'bd_pro_sepay_webhook_permission',
		)
	);
}
add_action( 'rest_api_init', 'bd_pro_register_sepay_routes' );

function bd_pro_property_title( $post_id = null ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	$slug    = get_post_field( 'post_name', $post_id );
	$titles  = array(
		'the-nelson-private-residences' => 'The Nelson Private Residences',
		'lumiere-riverside-thu-duc'     => 'Lumiere Riverside Thủ Đức',
		'villa-palm-garden'             => 'Villa Palm Garden',
		'nha-pho-hang-xanh'             => 'Nhà phố Hàng Xanh',
		'can-ho-son-tra-ocean'          => 'Căn hộ Sơn Trà Ocean',
		'dat-nen-ven-song-district-9'   => 'Đất nền ven sông District 9',
	);

	return $titles[ $slug ] ?? bd_pro_clean_text( get_the_title( $post_id ) );
}

function bd_pro_decimal_label( $number ) {
	$number = (float) str_replace( ',', '.', (string) $number );
	if ( ! $number ) {
		return '';
	}
	$label = number_format( $number, 1, ',', '.' );
	return preg_replace( '/,0$/', '', $label );
}

function bd_pro_property_price_label( $post_id ) {
	$status_terms = get_the_terms( $post_id, 'property_status' );
	$is_rental = false;
	if ( ! empty( $status_terms ) && ! is_wp_error( $status_terms ) ) {
		foreach ( $status_terms as $status_term ) {
			if ( in_array( $status_term->slug, array( 'cho-thue', 'da-cho-thue' ), true ) ) {
				$is_rental = true;
				break;
			}
		}
	}
	$price_number = (float) str_replace( ',', '.', (string) bd_pro_property_meta( $post_id, 'price_number' ) );
	if ( $is_rental && $price_number > 0 && $price_number < 1 ) {
		return bd_pro_decimal_label( $price_number * 1000 ) . ' triệu/tháng';
	}
	$price = bd_pro_clean_text( bd_pro_property_meta( $post_id, 'price' ) );
	if ( $price && false === strpos( $price, '?' ) ) {
		return $price;
	}
	$number = bd_pro_decimal_label( bd_pro_property_meta( $post_id, 'price_number' ) );
	return $number ? $number . ' tỷ' : 'Giá thỏa thuận';
}

function bd_pro_property_area_label( $post_id ) {
	$area = bd_pro_clean_text( bd_pro_property_meta( $post_id, 'area' ) );
	if ( $area && false === strpos( $area, '?' ) ) {
		return $area;
	}
	$number = bd_pro_decimal_label( bd_pro_property_meta( $post_id, 'area_number' ) );
	return $number ? $number . ' m²' : '';
}

function bd_pro_tax_select( $taxonomy, $name, $selected, $placeholder ) {
	$terms = get_terms(
		array(
			'taxonomy'   => $taxonomy,
			'hide_empty' => false,
		)
	);
	echo '<select class="bd-field" name="' . esc_attr( $name ) . '">';
	echo '<option value="">' . esc_html( $placeholder ) . '</option>';
	if ( ! is_wp_error( $terms ) ) {
		foreach ( $terms as $term ) {
			if ( 'property_status' === $taxonomy && 'dang-cho-duyet' === $term->slug ) {
				continue;
			}
			echo '<option value="' . esc_attr( $term->slug ) . '" ' . selected( $selected, $term->slug, false ) . '>' . esc_html( bd_pro_term_label( $term->slug, $term->name ) ) . '</option>';
		}
	}
	echo '</select>';
}

function bd_pro_upload_url( $file_name ) {
	$attachment_id = bd_pro_seed_attachment_by_file( $file_name );
	if ( $attachment_id ) {
		return wp_get_attachment_image_url( $attachment_id, 'large' );
	}

	$upload_dir = wp_upload_dir();
	$relative   = '2026/05/' . ltrim( $file_name, '/' );
	$file_path  = trailingslashit( $upload_dir['basedir'] ) . $relative;

	return file_exists( $file_path ) ? trailingslashit( $upload_dir['baseurl'] ) . $relative : '';
}

function bd_pro_property_fallback_image( $post_id ) {
	$fallbacks = array(
		'can-ho-mau-the-nelson-private-residences.jpg',
		'can-ho-mau-the-nelson-private-residences-1.jpg',
		'1920x540.jpg',
		'968x798_1.jpg',
		'526x526.jpg',
		'526x526_01.jpg',
		'526x526_02.jpg',
		'526x526_03.jpg',
		'526x526_04.jpg',
		'526x526_05.jpg',
		'526x526_06.jpg',
		'526x526_07.jpg',
		'526x526_08.jpg',
		'526x526_09.jpg',
		'526x526_10.jpg',
		'526x526_11.jpg',
		'can-ho-cao-cap-ha-noi.jpg',
		'nha-pho-hien-dai-hcm.jpg',
		'biet-thu-san-vuon.jpg',
		'dat-nen-do-thi-moi.jpg',
		'can-ho-view-song.jpg',
		'du-an-tuong-lai.jpg',
		'penthouse-trung-tam.jpg',
		'shophouse-mat-tien.jpg',
		'khu-do-thi-xanh.jpg',
		'can-ho-cho-thue.jpg',
		'villa-song-lap.jpg',
		'toa-nha-van-phong.jpg',
		'property-photo-apartment-01.jpg',
		'property-photo-apartment-02.jpg',
		'property-photo-townhouse-01.jpg',
		'property-photo-villa-01.jpg',
		'property-photo-land-01.jpg',
		'property-photo-rental-01.jpg',
		'property-photo-project-01.jpg',
		'property-photo-office-01.jpg',
	);
	$image = bd_pro_upload_url( $fallbacks[ absint( $post_id ) % count( $fallbacks ) ] );

	return $image ?: bd_pro_upload_url( 'can-ho-mau-the-nelson-private-residences.jpg' );
}

function bd_pro_stock_image_url( $index = 0 ) {
	$attachments = get_posts(
		array(
			'post_type'      => 'attachment',
			'posts_per_page' => -1,
			'meta_key'       => '_bd_source_image_path',
			'orderby'        => 'ID',
			'order'          => 'ASC',
			'fields'         => 'ids',
		)
	);
	if ( $attachments ) {
		$attachment_id = $attachments[ absint( $index ) % count( $attachments ) ];
		$url = wp_get_attachment_image_url( $attachment_id, 'large' );
		return $url ?: wp_get_attachment_url( $attachment_id );
	}
	return bd_pro_upload_url( 'can-ho-mau-the-nelson-private-residences.jpg' );
}

function bd_pro_attachment_has_real_image( $attachment_id ) {
	$file = $attachment_id ? get_attached_file( $attachment_id ) : '';
	if ( ! $file || ! file_exists( $file ) ) {
		return false;
	}

	$size = filesize( $file );
	return false !== $size && $size > 1000;
}

function bd_pro_keyword_property_ids( $keyword ) {
	global $wpdb;

	$keyword = trim( (string) $keyword );
	if ( '' === $keyword ) {
		return array();
	}

	$like = '%' . $wpdb->esc_like( $keyword ) . '%';
	$ids  = $wpdb->get_col(
		$wpdb->prepare(
			"SELECT DISTINCT p.ID
			FROM {$wpdb->posts} p
			LEFT JOIN {$wpdb->postmeta} pm ON p.ID = pm.post_id
			WHERE p.post_type = 'property'
				AND p.post_status = 'publish'
				AND (
					p.post_title LIKE %s
					OR p.post_content LIKE %s
					OR p.post_excerpt LIKE %s
					OR (pm.meta_key IN ('_bd_city', '_bd_district', '_bd_address', '_bd_type') AND pm.meta_value LIKE %s)
				)",
			$like,
			$like,
			$like,
			$like
		)
	);

	return array_map( 'absint', $ids );
}

function bd_pro_ensure_static_pages() {
	$pages = array(
		'du-an' => array(
			'title'   => 'Dự án',
			'content' => '<p>Danh sách dự án nổi bật, đang mở bán và sắp mở bán. Bạn có thể bổ sung thêm bộ lọc theo chủ đầu tư, vị trí và tiến độ triển khai tại đây.</p>',
		),
		'tin-tuc' => array(
			'title'   => 'Tin tức',
			'content' => '<p>Cập nhật tin tức thị trường bất động sản, chính sách, hạ tầng và các xu hướng đầu tư mới.</p>',
		),
		'wiki-bds' => array(
			'title'   => 'Wiki BĐS',
			'content' => '<p>Kho kiến thức về mua bán, cho thuê, vay mua nhà, pháp lý, phong thủy và kinh nghiệm giao dịch bất động sản.</p>',
		),
		'phan-tich-danh-gia' => array(
			'title'   => 'Phân tích đánh giá',
			'content' => '<p>Phân tích dự án, so sánh giá khu vực, đánh giá tiện ích và tiềm năng tăng trưởng.</p>',
		),
		'danh-ba' => array(
			'title'   => 'Danh bạ',
			'content' => '<p>Danh bạ môi giới, chủ đầu tư, văn phòng giao dịch và đơn vị dịch vụ liên quan đến bất động sản.</p>',
		),
		'dang-tin' => array(
			'title'   => 'Đăng tin',
			'content' => '<p>Trang dành cho môi giới và chủ nhà gửi thông tin bất động sản. Admin có thể duyệt, bổ sung hình ảnh và xuất bản tin đăng trong hệ thống.</p>',
		),
		'phe-duyet-tin' => array(
			'title'   => 'Phê duyệt tin',
			'content' => '<p>Trang dành cho admin duyệt tin bất động sản do khách gửi lên trước khi xuất bản.</p>',
		),
		'duyet-phan-hoi' => array(
			'title'   => 'Duyệt phản hồi',
			'content' => '<p>Trang dành cho admin duyệt phản hồi khách gửi từ website.</p>',
		),
		'yeu-thich' => array(
			'title'   => 'Tin yêu thích',
			'content' => '<p>Đăng nhập để xem và quản lý danh sách bất động sản bạn đã lưu.</p>',
		),
	);

	$pages['dang-nhap'] = array(
		'title'   => 'Đăng nhập',
		'content' => '<p>Đăng nhập tài khoản HTB Resident để lưu tin, đăng tin và quản lý yêu cầu tư vấn.</p>',
	);
	$pages['dang-ky'] = array(
		'title'   => 'Đăng ký',
		'content' => '<p>Tạo tài khoản HTB Resident để lưu tin yêu thích, gửi yêu cầu tư vấn và đăng bất động sản.</p>',
	);

	foreach ( $pages as $slug => $page ) {
		$existing = get_page_by_path( $slug );
		if ( $existing ) {
			wp_update_post(
				array(
					'ID'           => $existing->ID,
					'post_title'   => $page['title'],
					'post_content' => $page['content'],
				)
			);
			continue;
		}
		wp_insert_post(
			array(
				'post_type'    => 'page',
				'post_status'  => 'publish',
				'post_name'    => $slug,
				'post_title'   => $page['title'],
				'post_content' => $page['content'],
			)
		);
	}
}

function bd_pro_int_param( $key, $default = 0 ) {
	return isset( $_GET[ $key ] ) ? max( 0, (int) $_GET[ $key ] ) : $default;
}

function bd_pro_current_user_can_manage_property( $post_id = 0 ) {
	if ( current_user_can( 'manage_options' ) ) {
		return true;
	}
	if ( ! is_user_logged_in() ) {
		return false;
	}
	return $post_id ? ( (int) get_post_field( 'post_author', $post_id ) === get_current_user_id() ) : current_user_can( 'edit_posts' );
}

function bd_pro_handle_property_images( $post_id ) {
	if ( empty( $_FILES['bd_images']['name'] ) || ! is_array( $_FILES['bd_images']['name'] ) ) {
		return;
	}

	require_once ABSPATH . 'wp-admin/includes/image.php';
	require_once ABSPATH . 'wp-admin/includes/file.php';
	require_once ABSPATH . 'wp-admin/includes/media.php';

	$attachment_ids = array();
	$file_count     = count( $_FILES['bd_images']['name'] );

	for ( $index = 0; $index < $file_count; $index++ ) {
		if ( empty( $_FILES['bd_images']['name'][ $index ] ) || UPLOAD_ERR_OK !== (int) $_FILES['bd_images']['error'][ $index ] ) {
			continue;
		}

		$file = array(
			'name'     => sanitize_file_name( wp_unslash( $_FILES['bd_images']['name'][ $index ] ) ),
			'type'     => sanitize_mime_type( wp_unslash( $_FILES['bd_images']['type'][ $index ] ) ),
			'tmp_name' => $_FILES['bd_images']['tmp_name'][ $index ],
			'error'    => (int) $_FILES['bd_images']['error'][ $index ],
			'size'     => (int) $_FILES['bd_images']['size'][ $index ],
		);

		if ( ! wp_check_filetype_and_ext( $file['tmp_name'], $file['name'], array( 'jpg|jpeg|jpe' => 'image/jpeg', 'png' => 'image/png', 'webp' => 'image/webp' ) )['type'] ) {
			continue;
		}

		$_FILES['bd_property_image'] = $file;
		$attachment_id               = media_handle_upload( 'bd_property_image', $post_id );

		if ( $attachment_id && ! is_wp_error( $attachment_id ) ) {
			$attachment_ids[] = (int) $attachment_id;
		}
	}

	unset( $_FILES['bd_property_image'] );

	if ( $attachment_ids ) {
		set_post_thumbnail( $post_id, $attachment_ids[0] );
		update_post_meta( $post_id, '_bd_gallery_images', $attachment_ids );
	}
}

function bd_pro_handle_front_actions() {
	if ( 'POST' === $_SERVER['REQUEST_METHOD'] && isset( $_POST['bd_action'] ) ) {
		$action = sanitize_key( wp_unslash( $_POST['bd_action'] ) );
		if ( ! isset( $_POST['bd_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['bd_nonce'] ) ), 'bd_front_action' ) ) {
			return;
		}

		$property_id = isset( $_POST['property_id'] ) ? absint( $_POST['property_id'] ) : 0;
		$name        = isset( $_POST['bd_name'] ) ? sanitize_text_field( wp_unslash( $_POST['bd_name'] ) ) : '';
		$phone       = isset( $_POST['bd_phone'] ) ? sanitize_text_field( wp_unslash( $_POST['bd_phone'] ) ) : '';
		$email       = isset( $_POST['bd_email'] ) ? sanitize_email( wp_unslash( $_POST['bd_email'] ) ) : '';
		$message     = isset( $_POST['bd_message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['bd_message'] ) ) : '';

		if ( 'login' === $action ) {
			$username = isset( $_POST['bd_login'] ) ? sanitize_user( wp_unslash( $_POST['bd_login'] ) ) : '';
			$password = isset( $_POST['bd_password'] ) ? (string) wp_unslash( $_POST['bd_password'] ) : '';
			$remember = ! empty( $_POST['bd_remember'] );
			$redirect = isset( $_POST['bd_redirect'] ) ? esc_url_raw( wp_unslash( $_POST['bd_redirect'] ) ) : home_url( '/' );
			$user = wp_signon(
				array(
					'user_login'    => $username,
					'user_password' => $password,
					'remember'      => $remember,
				),
				is_ssl()
			);
			if ( is_wp_error( $user ) ) {
				wp_safe_redirect( add_query_arg( 'login_error', rawurlencode( $user->get_error_message() ), home_url( '/dang-nhap/' ) ) );
				exit;
			}
			wp_safe_redirect( $redirect ?: home_url( '/' ) );
			exit;
		}

		if ( 'register' === $action ) {
			$username = isset( $_POST['bd_username'] ) ? sanitize_user( wp_unslash( $_POST['bd_username'] ) ) : '';
			$password = isset( $_POST['bd_password'] ) ? (string) wp_unslash( $_POST['bd_password'] ) : '';
			$confirm  = isset( $_POST['bd_password_confirm'] ) ? (string) wp_unslash( $_POST['bd_password_confirm'] ) : '';
			$role     = isset( $_POST['bd_role'] ) && 'agent' === sanitize_key( wp_unslash( $_POST['bd_role'] ) ) ? 'bd_agent' : 'bd_applicant';
			if ( ! $username || ! $email || ! $password || $password !== $confirm ) {
				wp_safe_redirect( add_query_arg( 'register_error', 'missing_or_mismatch', home_url( '/dang-ky/' ) ) );
				exit;
			}
			$user_id = wp_insert_user(
				array(
					'user_login'   => $username,
					'user_pass'    => $password,
					'user_email'   => $email,
					'display_name' => $name ?: $username,
					'role'         => $role,
				)
			);
			if ( is_wp_error( $user_id ) ) {
				wp_safe_redirect( add_query_arg( 'register_error', rawurlencode( $user_id->get_error_message() ), home_url( '/dang-ky/' ) ) );
				exit;
			}
			if ( $phone ) {
				update_user_meta( $user_id, '_bd_phone', $phone );
			}
			wp_set_current_user( $user_id );
			wp_set_auth_cookie( $user_id, true );
			wp_safe_redirect( add_query_arg( 'registered', '1', home_url( '/yeu-thich/' ) ) );
			exit;
		}

		if ( 'lead' === $action && $property_id && $name && $phone ) {
			$lead_id = wp_insert_post(
				array(
					'post_type'   => 'bd_lead',
					'post_status' => 'publish',
					'post_title'  => $name . ' - ' . get_the_title( $property_id ),
				)
			);
			if ( $lead_id && ! is_wp_error( $lead_id ) ) {
				update_post_meta( $lead_id, '_bd_property_id', $property_id );
				update_post_meta( $lead_id, '_bd_name', $name );
				update_post_meta( $lead_id, '_bd_phone', $phone );
				update_post_meta( $lead_id, '_bd_email', $email );
				update_post_meta( $lead_id, '_bd_message', $message );
				wp_safe_redirect( add_query_arg( 'lead_sent', '1', get_permalink( $property_id ) ) );
				exit;
			}
		}

		if ( 'property_payment' === $action && $property_id && $name && $phone ) {
			$amount = isset( $_POST['bd_amount'] ) ? sanitize_text_field( wp_unslash( $_POST['bd_amount'] ) ) : '';
			$order  = bd_pro_create_property_payment_order( $property_id, $amount, $name, $phone, $email );
			if ( ! is_wp_error( $order ) ) {
				wp_safe_redirect( bd_pro_property_payment_redirect_url( $order ) );
				exit;
			}
			wp_safe_redirect( add_query_arg( 'payment_failed', rawurlencode( $order->get_error_message() ), get_permalink( $property_id ) ) );
			exit;
			$amount    = isset( $_POST['bd_amount'] ) ? sanitize_text_field( wp_unslash( $_POST['bd_amount'] ) ) : '';
			$method    = isset( $_POST['bd_method'] ) ? sanitize_text_field( wp_unslash( $_POST['bd_method'] ) ) : 'Chuyển khoản';
			$payment_id = wp_insert_post(
				array(
					'post_type'   => 'bd_payment',
					'post_status' => 'publish',
					'post_title'  => 'Thanh toán - ' . $name . ' - ' . get_the_title( $property_id ),
				)
			);
			if ( $payment_id && ! is_wp_error( $payment_id ) ) {
				update_post_meta( $payment_id, '_bd_property_id', $property_id );
				update_post_meta( $payment_id, '_bd_name', $name );
				update_post_meta( $payment_id, '_bd_phone', $phone );
				update_post_meta( $payment_id, '_bd_email', $email );
				update_post_meta( $payment_id, '_bd_amount', $amount );
				update_post_meta( $payment_id, '_bd_method', $method );
				update_post_meta( $payment_id, '_bd_status', 'Chờ SePay xác nhận' );
				update_post_meta( $payment_id, '_bd_status', 'Chờ SePay xác nhận' );
				update_post_meta( $payment_id, '_bd_payment_code', bd_pro_payment_code( $property_id ) );
				update_post_meta( $property_id, '_bd_expected_payment_amount', bd_pro_payment_amount_to_vnd( $amount ) );
				wp_safe_redirect( add_query_arg( 'payment_waiting', '1', get_permalink( $property_id ) ) );
				exit;
			}
		}

		if ( 'rental_payment_old' === $action && $property_id && $name && $phone ) {
			$amount = isset( $_POST['bd_amount'] ) ? sanitize_text_field( wp_unslash( $_POST['bd_amount'] ) ) : '';
			$method = isset( $_POST['bd_method'] ) ? sanitize_text_field( wp_unslash( $_POST['bd_method'] ) ) : 'Chuyển khoản';
			$payment_id = wp_insert_post(
				array(
					'post_type'   => 'bd_payment',
					'post_status' => 'publish',
					'post_title'  => 'Giữ chỗ thuê - ' . $name . ' - ' . get_the_title( $property_id ),
				)
			);
			if ( $payment_id && ! is_wp_error( $payment_id ) ) {
				update_post_meta( $payment_id, '_bd_property_id', $property_id );
				update_post_meta( $payment_id, '_bd_name', $name );
				update_post_meta( $payment_id, '_bd_phone', $phone );
				update_post_meta( $payment_id, '_bd_email', $email );
				update_post_meta( $payment_id, '_bd_amount', $amount );
				update_post_meta( $payment_id, '_bd_method', $method );
				update_post_meta( $payment_id, '_bd_status', 'Chờ xác nhận' );
				wp_safe_redirect( add_query_arg( 'payment_sent', '1', get_permalink( $property_id ) ) );
				exit;
			}
		}

		if ( 'appointment' === $action && $property_id && $name && $phone ) {
			$date = isset( $_POST['bd_date'] ) ? sanitize_text_field( wp_unslash( $_POST['bd_date'] ) ) : '';
			$time = isset( $_POST['bd_time'] ) ? sanitize_text_field( wp_unslash( $_POST['bd_time'] ) ) : '';
			$appointment_id = wp_insert_post(
				array(
					'post_type'   => 'bd_appointment',
					'post_status' => 'publish',
					'post_title'  => $date . ' ' . $time . ' - ' . $name,
				)
			);
			if ( $appointment_id && ! is_wp_error( $appointment_id ) ) {
				update_post_meta( $appointment_id, '_bd_property_id', $property_id );
				update_post_meta( $appointment_id, '_bd_name', $name );
				update_post_meta( $appointment_id, '_bd_phone', $phone );
				update_post_meta( $appointment_id, '_bd_email', $email );
				update_post_meta( $appointment_id, '_bd_date', $date );
				update_post_meta( $appointment_id, '_bd_time', $time );
				wp_safe_redirect( add_query_arg( 'appointment_sent', '1', get_permalink( $property_id ) ) );
				exit;
			}
		}

		if ( 'submit_property' === $action ) {
			$title       = isset( $_POST['bd_title'] ) ? sanitize_text_field( wp_unslash( $_POST['bd_title'] ) ) : '';
			$price       = isset( $_POST['bd_price'] ) ? sanitize_text_field( wp_unslash( $_POST['bd_price'] ) ) : '';
			$area        = isset( $_POST['bd_area'] ) ? sanitize_text_field( wp_unslash( $_POST['bd_area'] ) ) : '';
			$type        = isset( $_POST['bd_type'] ) ? sanitize_text_field( wp_unslash( $_POST['bd_type'] ) ) : '';
			$city        = isset( $_POST['bd_city'] ) ? sanitize_text_field( wp_unslash( $_POST['bd_city'] ) ) : '';
			$district    = isset( $_POST['bd_district'] ) ? sanitize_text_field( wp_unslash( $_POST['bd_district'] ) ) : '';
			$address     = isset( $_POST['bd_address'] ) ? sanitize_text_field( wp_unslash( $_POST['bd_address'] ) ) : '';
			$description = isset( $_POST['bd_description'] ) ? sanitize_textarea_field( wp_unslash( $_POST['bd_description'] ) ) : '';

			if ( $title && $price && $area && $name && $phone ) {
				$new_property_id = wp_insert_post(
					array(
						'post_type'    => 'property',
						'post_status'  => 'pending',
						'post_title'   => $title,
						'post_excerpt' => wp_trim_words( $description, 28 ),
						'post_content' => wpautop( $description ),
						'post_author'  => get_current_user_id() ?: 1,
					)
				);
				if ( $new_property_id && ! is_wp_error( $new_property_id ) ) {
					update_post_meta( $new_property_id, '_bd_price', $price );
					update_post_meta( $new_property_id, '_bd_area', $area );
					update_post_meta( $new_property_id, '_bd_price_number', isset( $_POST['bd_price_number'] ) ? sanitize_text_field( wp_unslash( $_POST['bd_price_number'] ) ) : '' );
					update_post_meta( $new_property_id, '_bd_area_number', isset( $_POST['bd_area_number'] ) ? sanitize_text_field( wp_unslash( $_POST['bd_area_number'] ) ) : '' );
					update_post_meta( $new_property_id, '_bd_bed', isset( $_POST['bd_bed'] ) ? sanitize_text_field( wp_unslash( $_POST['bd_bed'] ) ) : '' );
					update_post_meta( $new_property_id, '_bd_bath', isset( $_POST['bd_bath'] ) ? sanitize_text_field( wp_unslash( $_POST['bd_bath'] ) ) : '' );
					update_post_meta( $new_property_id, '_bd_type', $type );
					update_post_meta( $new_property_id, '_bd_city', $city );
					update_post_meta( $new_property_id, '_bd_district', $district );
					update_post_meta( $new_property_id, '_bd_address', $address );
					update_post_meta( $new_property_id, '_bd_submitter_name', $name );
					update_post_meta( $new_property_id, '_bd_submitter_phone', $phone );
					update_post_meta( $new_property_id, '_bd_submitter_email', $email );
					bd_pro_handle_property_images( $new_property_id );
					wp_set_object_terms( $new_property_id, 'Dang cho duyet', 'property_status' );
					if ( $district ) {
						wp_set_object_terms( $new_property_id, $district, 'property_location' );
					}
					wp_safe_redirect( add_query_arg( 'property_submitted', '1', home_url( '/dang-tin/' ) ) );
					exit;
				}
			}
		}

		if ( 'newsletter' === $action && $email ) {
			$subscriber_id = wp_insert_post(
				array(
					'post_type'   => 'bd_subscriber',
					'post_status' => 'publish',
					'post_title'  => $email,
				)
			);
			if ( $subscriber_id && ! is_wp_error( $subscriber_id ) ) {
				update_post_meta( $subscriber_id, '_bd_email', $email );
				update_post_meta( $subscriber_id, '_bd_source', 'Footer newsletter' );
				wp_safe_redirect( add_query_arg( 'newsletter_sent', '1', wp_get_referer() ?: home_url( '/' ) ) );
				exit;
			}
		}

		if ( 'feedback' === $action && $name && $message ) {
			$topic = isset( $_POST['bd_topic'] ) ? sanitize_text_field( wp_unslash( $_POST['bd_topic'] ) ) : 'Phan hoi website';
			$feedback_id = wp_insert_post(
				array(
					'post_type'   => 'bd_feedback',
					'post_status' => 'pending',
					'post_title'  => $topic . ' - ' . $name,
				)
			);
			if ( $feedback_id && ! is_wp_error( $feedback_id ) ) {
				update_post_meta( $feedback_id, '_bd_topic', $topic );
				update_post_meta( $feedback_id, '_bd_name', $name );
				update_post_meta( $feedback_id, '_bd_phone', $phone );
				update_post_meta( $feedback_id, '_bd_email', $email );
				update_post_meta( $feedback_id, '_bd_message', $message );
				update_post_meta( $feedback_id, '_bd_status', 'Chờ duyệt' );
				wp_safe_redirect( add_query_arg( 'feedback_sent', '1', wp_get_referer() ?: home_url( '/' ) ) );
				exit;
			}
		}

		if ( current_user_can( 'manage_options' ) && $property_id && in_array( $action, array( 'delete_project', 'delete_property' ), true ) ) {
			wp_delete_post( $property_id, false );
			wp_safe_redirect( add_query_arg( 'property_deleted', '1', wp_get_referer() ?: home_url( '/du-an/' ) ) );
			exit;
		}

		if ( current_user_can( 'manage_options' ) && $property_id && in_array( $action, array( 'approve_property', 'reject_property', 'restore_property' ), true ) ) {
			$new_status = 'approve_property' === $action ? 'publish' : 'draft';
			if ( 'restore_property' === $action ) {
				$new_status = 'pending';
			}
			wp_update_post(
				array(
					'ID'          => $property_id,
					'post_status' => $new_status,
				)
			);
			if ( 'publish' === $new_status ) {
				wp_set_object_terms( $property_id, 'Dang ban', 'property_status' );
			}
			if ( 'draft' === $new_status ) {
				update_post_meta( $property_id, '_bd_rejected_at', current_time( 'mysql' ) );
			}
			if ( 'pending' === $new_status ) {
				wp_set_object_terms( $property_id, 'Dang cho duyet', 'property_status' );
			}
			wp_safe_redirect( add_query_arg( 'approval_updated', '1', home_url( '/phe-duyet-tin/' ) ) );
			exit;
		}

		$feedback_id = isset( $_POST['feedback_id'] ) ? absint( $_POST['feedback_id'] ) : 0;
		if ( current_user_can( 'manage_options' ) && $feedback_id && 'bd_feedback' === get_post_type( $feedback_id ) && in_array( $action, array( 'approve_feedback', 'draft_feedback', 'delete_feedback' ), true ) ) {
			if ( 'approve_feedback' === $action ) {
				wp_update_post( array( 'ID' => $feedback_id, 'post_status' => 'publish' ) );
				update_post_meta( $feedback_id, '_bd_status', 'Đã duyệt' );
			}
			if ( 'draft_feedback' === $action ) {
				wp_update_post( array( 'ID' => $feedback_id, 'post_status' => 'draft' ) );
				update_post_meta( $feedback_id, '_bd_status', 'Đã chuyển nháp' );
			}
			if ( 'delete_feedback' === $action ) {
				wp_trash_post( $feedback_id );
			}
			wp_safe_redirect( add_query_arg( 'feedback_updated', '1', home_url( '/duyet-phan-hoi/' ) ) );
			exit;
		}
	}

	if ( isset( $_GET['bd_favorite'], $_GET['_wpnonce'] ) && is_user_logged_in() ) {
		$property_id = absint( $_GET['bd_favorite'] );
		if ( $property_id && wp_verify_nonce( sanitize_text_field( wp_unslash( $_GET['_wpnonce'] ) ), 'bd_favorite_' . $property_id ) ) {
			$favorites = get_user_meta( get_current_user_id(), '_bd_favorites', true );
			$favorites = is_array( $favorites ) ? array_map( 'absint', $favorites ) : array();
			if ( in_array( $property_id, $favorites, true ) ) {
				$favorites = array_values( array_diff( $favorites, array( $property_id ) ) );
			} else {
				$favorites[] = $property_id;
			}
			update_user_meta( get_current_user_id(), '_bd_favorites', $favorites );
			wp_safe_redirect( remove_query_arg( array( 'bd_favorite', '_wpnonce' ) ) );
			exit;
		}
	}
}
add_action( 'template_redirect', 'bd_pro_handle_front_actions' );

function bd_pro_output_seo_meta() {
	if ( ! is_singular( 'property' ) ) {
		return;
	}
	$post_id     = get_queried_object_id();
	$title       = bd_pro_property_meta( $post_id, 'seo_title' );
	$description = bd_pro_property_meta( $post_id, 'seo_description' );
	if ( $title ) {
		echo '<meta property="og:title" content="' . esc_attr( $title ) . '">' . "\n";
	}
	if ( $description ) {
		echo '<meta name="description" content="' . esc_attr( $description ) . '">' . "\n";
		echo '<meta property="og:description" content="' . esc_attr( $description ) . '">' . "\n";
	}
}
add_action( 'wp_head', 'bd_pro_output_seo_meta', 2 );

function bd_pro_document_title( $title ) {
	if ( is_singular( 'property' ) ) {
		$seo_title = bd_pro_property_meta( get_queried_object_id(), 'seo_title' );
		if ( $seo_title ) {
			return $seo_title;
		}
	}
	return $title;
}
add_filter( 'pre_get_document_title', 'bd_pro_document_title' );

function bd_pro_property_card( $post_id = null ) {
	$post_id  = $post_id ? $post_id : get_the_ID();
	$location = get_the_terms( $post_id, 'property_location' );
	$status   = get_the_terms( $post_id, 'property_status' );
	$is_rental = false;
	$is_payable = false;
	if ( ! empty( $status ) && ! is_wp_error( $status ) ) {
		foreach ( $status as $status_term ) {
			if ( 'cho-thue' === $status_term->slug ) {
				$is_rental = true;
			}
			if ( in_array( $status_term->slug, array( 'cho-thue', 'dang-ban', 'du-an-moi' ), true ) ) {
				$is_payable = true;
			}
		}
	}
	$thumb_id = get_post_thumbnail_id( $post_id );
	$image    = bd_pro_attachment_has_real_image( $thumb_id ) ? get_the_post_thumbnail_url( $post_id, 'large' ) : '';
	if ( ! $image ) {
		$image = bd_pro_property_fallback_image( $post_id );
	}
	$title    = bd_pro_property_title( $post_id );
	$district = bd_pro_clean_text( bd_pro_property_meta( $post_id, 'district' ) ?: ( ! empty( $location ) && ! is_wp_error( $location ) ? bd_pro_term_label( $location[0]->slug, $location[0]->name ) : '' ) );
	$city     = bd_pro_clean_text( bd_pro_property_meta( $post_id, 'city' ) );
	$favorites = is_user_logged_in() ? get_user_meta( get_current_user_id(), '_bd_favorites', true ) : array();
	$favorites = is_array( $favorites ) ? array_map( 'absint', $favorites ) : array();
	$is_favorite = in_array( absint( $post_id ), $favorites, true );
	$favorite_url = is_user_logged_in() ? wp_nonce_url( add_query_arg( 'bd_favorite', $post_id ), 'bd_favorite_' . $post_id ) : add_query_arg( 'redirect_to', rawurlencode( get_permalink( $post_id ) ), home_url( '/dang-nhap/' ) );
	?>
	<article class="bd-card">
		<a class="bd-card-img" href="<?php echo esc_url( get_permalink( $post_id ) ); ?>">
			<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $title ); ?>" loading="lazy">
			<?php if ( ! empty( $status ) && ! is_wp_error( $status ) ) : ?>
				<span class="bd-badge"><?php echo esc_html( bd_pro_term_label( $status[0]->slug, $status[0]->name ) ); ?></span>
			<?php endif; ?>
		</a>
		<div class="bd-card-body">
			<h3><a href="<?php echo esc_url( get_permalink( $post_id ) ); ?>"><?php echo esc_html( $title ); ?></a></h3>
			<div class="bd-card-price"><?php echo esc_html( bd_pro_property_price_label( $post_id ) ); ?> <span>·</span> <?php echo esc_html( bd_pro_property_area_label( $post_id ) ); ?></div>
			<p class="bd-location"><span aria-hidden="true">⌖</span><?php echo esc_html( trim( $district . ( $city ? ', ' . $city : '' ), ', ' ) ); ?></p>
			<div class="bd-card-foot">
				<span></span>
				<?php if ( $is_payable ) : ?>
					<a class="bd-rent-pay-link" href="<?php echo esc_url( get_permalink( $post_id ) . '#rental-payment-modal' ); ?>">Thanh toán</a>
				<?php endif; ?>
				<a class="bd-love <?php echo $is_favorite ? 'is-active' : ''; ?>" href="<?php echo esc_url( $favorite_url ); ?>" aria-label="<?php echo esc_attr( $is_favorite ? 'Bỏ thích' : 'Thích tin này' ); ?>"><?php echo $is_favorite ? '♥' : '♡'; ?></a>
			</div>
			<?php if ( current_user_can( 'manage_options' ) ) : ?>
				<div class="bd-card-admin-actions">
					<a href="<?php echo esc_url( get_edit_post_link( $post_id ) ); ?>">Sửa</a>
					<form method="post" onsubmit="return confirm('Xóa tin này?');">
						<?php wp_nonce_field( 'bd_front_action', 'bd_nonce' ); ?>
						<input type="hidden" name="property_id" value="<?php echo esc_attr( $post_id ); ?>">
						<button type="submit" name="bd_action" value="delete_property">Xóa</button>
					</form>
				</div>
			<?php endif; ?>
		</div>
	</article>
	<?php
}

function bd_pro_filter_form() {
	$keyword  = isset( $_GET['s'] ) ? sanitize_text_field( wp_unslash( $_GET['s'] ) ) : '';
	$status   = isset( $_GET['property_status'] ) ? sanitize_text_field( wp_unslash( $_GET['property_status'] ) ) : '';
	$type     = isset( $_GET['bd_type'] ) ? sanitize_text_field( wp_unslash( $_GET['bd_type'] ) ) : '';
	$city     = isset( $_GET['bd_city'] ) ? sanitize_text_field( wp_unslash( $_GET['bd_city'] ) ) : '';
	$district = isset( $_GET['bd_district'] ) ? sanitize_text_field( wp_unslash( $_GET['bd_district'] ) ) : '';
	$price_min = bd_pro_int_param( 'bd_price_min' );
	$price_max = bd_pro_int_param( 'bd_price_max' );
	$area_min  = bd_pro_int_param( 'bd_area_min' );
	$area_max  = bd_pro_int_param( 'bd_area_max' );
	$price_limit = 1000;
	?>
	<form action="<?php echo esc_url( get_post_type_archive_link( 'property' ) ); ?>" method="get">
		<input class="bd-field" type="search" name="s" value="<?php echo esc_attr( $keyword ); ?>" placeholder="Nhập khu vực, tên dự án">
		<select class="bd-field" name="bd_city">
			<option value="">Tất cả khu vực</option>
			<?php foreach ( array( 'Hà Nội', 'Đà Nẵng', 'TP. HCM' ) as $city_option ) : ?>
				<option value="<?php echo esc_attr( $city_option ); ?>" <?php selected( $city, $city_option ); ?>><?php echo esc_html( $city_option ); ?></option>
			<?php endforeach; ?>
		</select>
		<?php
		bd_pro_tax_select( 'property_status', 'property_status', $status, 'Mua / Thuê' );
		?>
		<select class="bd-field" name="bd_type">
			<option value="">Loại hình</option>
			<?php foreach ( array( 'Can ho' => 'Căn hộ', 'Nha pho' => 'Nhà phố', 'Biet thu' => 'Biệt thự', 'Dat nen' => 'Đất nền' ) as $value => $label ) : ?>
				<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $type, $value ); ?>><?php echo esc_html( $label ); ?></option>
			<?php endforeach; ?>
		</select>
		<input class="bd-field" type="text" name="bd_district" value="<?php echo esc_attr( $district ); ?>" placeholder="Quận/Huyện">
		<div class="bd-range">
			<label>Khoảng giá <span><b data-range-display="bd_price_min"><?php echo esc_html( $price_min ?: 0 ); ?></b> - <b data-range-display="bd_price_max"><?php echo esc_html( $price_max ?: $price_limit ); ?></b> tỷ</span></label>
			<div class="bd-price-inputs">
				<input class="bd-field" type="number" min="0" max="<?php echo esc_attr( $price_limit ); ?>" step="1" name="bd_price_min" value="<?php echo esc_attr( $price_min ); ?>" placeholder="Từ">
				<input class="bd-field" type="number" min="0" max="<?php echo esc_attr( $price_limit ); ?>" step="1" name="bd_price_max" value="<?php echo esc_attr( $price_max ?: $price_limit ); ?>" placeholder="Đến">
			</div>
			<label>Giá từ <span><?php echo esc_html( $price_min ?: 0 ); ?></span> tỷ</label>
			<input type="range" min="0" max="<?php echo esc_attr( $price_limit ); ?>" step="1" data-sync-field="bd_price_min" value="<?php echo esc_attr( $price_min ); ?>">
			<label>Đến <span><?php echo esc_html( $price_max ?: $price_limit ); ?></span> tỷ</label>
			<input type="range" min="0" max="<?php echo esc_attr( $price_limit ); ?>" step="1" data-sync-field="bd_price_max" value="<?php echo esc_attr( $price_max ?: $price_limit ); ?>">
		</div>
		<div class="bd-range">
			<label>Diện tích từ <span><?php echo esc_html( $area_min ?: 0 ); ?></span> m²</label>
			<input type="range" min="0" max="500" step="10" name="bd_area_min" value="<?php echo esc_attr( $area_min ); ?>">
			<label>Đến <span><?php echo esc_html( $area_max ?: 500 ); ?></span> m²</label>
			<input type="range" min="0" max="500" step="10" name="bd_area_max" value="<?php echo esc_attr( $area_max ?: 500 ); ?>">
		</div>
		<button class="bd-btn" data-i18n="search" type="submit">Tìm kiếm</button>
	</form>
	<?php
}

function bd_pro_property_query_args( $limit = 6 ) {
	$args = array(
		'post_type'      => 'property',
		'posts_per_page' => $limit,
		'post_status'    => 'publish',
	);

	if ( isset( $_GET['s'] ) && '' !== $_GET['s'] ) {
		$args['post__in'] = bd_pro_keyword_property_ids( sanitize_text_field( wp_unslash( $_GET['s'] ) ) ) ?: array( 0 );
	}

	$tax_query = array();
	foreach ( array( 'property_location', 'property_status' ) as $tax ) {
		if ( isset( $_GET[ $tax ] ) && '' !== $_GET[ $tax ] ) {
			$tax_query[] = array(
				'taxonomy' => $tax,
				'field'    => 'slug',
				'terms'    => sanitize_text_field( wp_unslash( $_GET[ $tax ] ) ),
			);
		}
	}
	if ( $tax_query ) {
		$args['tax_query'] = $tax_query;
	}

	$meta_query = array();
	if ( isset( $_GET['bd_type'] ) && '' !== $_GET['bd_type'] ) {
		$type_value = sanitize_text_field( wp_unslash( $_GET['bd_type'] ) );
		$meta_query[] = array(
			'key'     => '_bd_type',
			'value'   => array_unique( array( $type_value, bd_pro_type_label( $type_value ) ) ),
			'compare' => 'IN',
		);
	}
	foreach ( array( 'bd_city' => '_bd_city', 'bd_district' => '_bd_district' ) as $param => $meta_key ) {
		if ( isset( $_GET[ $param ] ) && '' !== $_GET[ $param ] ) {
			$meta_query[] = array(
				'key'     => $meta_key,
				'value'   => sanitize_text_field( wp_unslash( $_GET[ $param ] ) ),
				'compare' => 'LIKE',
			);
		}
	}
	$price_min = bd_pro_int_param( 'bd_price_min' );
	$price_max = bd_pro_int_param( 'bd_price_max' );
	if ( $price_min || $price_max ) {
		$meta_query[] = array(
			'key'     => '_bd_price_number',
			'value'   => array( $price_min, $price_max ?: 999999 ),
			'type'    => 'NUMERIC',
			'compare' => 'BETWEEN',
		);
	}
	$area_min = bd_pro_int_param( 'bd_area_min' );
	$area_max = bd_pro_int_param( 'bd_area_max' );
	if ( $area_min || $area_max ) {
		$meta_query[] = array(
			'key'     => '_bd_area_number',
			'value'   => array( $area_min, $area_max ?: 999999 ),
			'type'    => 'NUMERIC',
			'compare' => 'BETWEEN',
		);
	}
	if ( $meta_query ) {
		$args['meta_query'] = array_merge(
			array( 'relation' => 'AND' ),
			$meta_query
		);
	}

	return $args;
}

function bd_pro_seed_attachment_by_file( $file_name ) {
	$attachment = get_page_by_title( pathinfo( $file_name, PATHINFO_FILENAME ), OBJECT, 'attachment' );
	if ( $attachment ) {
		return $attachment->ID;
	}
	$existing = get_posts(
		array(
			'post_type'      => 'attachment',
			'posts_per_page' => 1,
			'meta_query'     => array(
				array(
					'key'     => '_wp_attached_file',
					'value'   => $file_name,
					'compare' => 'LIKE',
				),
			),
		)
	);
	return $existing ? $existing[0]->ID : 0;
}

function bd_pro_seed_site() {
	bd_pro_register_property_type();
	bd_pro_activation_tasks();
	bd_pro_ensure_static_pages();

	$locations = array( 'Quận 1', 'Thủ Đức', 'Bình Thạnh', 'Đà Nẵng', 'Hà Nội' );
	$statuses  = array( 'Đang bán', 'Đã bán', 'Cho thuê', 'Đang chờ duyệt', 'Dự án mới' );
	foreach ( $locations as $term ) {
		wp_insert_term( $term, 'property_location' );
	}
	foreach ( $statuses as $term ) {
		wp_insert_term( $term, 'property_status' );
	}

	$properties = array(
		array( 'The Nelson Private Residences', 'Căn hộ hạng sang trung tâm với tiện ích riêng tư, phù hợp gia đình cần không gian sống tinh tế.', '18,5 tỷ', '126 m²', '3', '2', 'Căn hộ', '29 Láng Hạ, Hà Nội', 'Hà Nội', 'Đang bán', 'can-ho-mau-the-nelson-private-residences.jpg' ),
		array( 'Lumiere Riverside Thủ Đức', 'Căn hộ view sông, kết nối nhanh đến trung tâm, sản phẩm tốt cho ở thực và đầu tư trung hạn.', '7,2 tỷ', '89 m²', '2', '2', 'Căn hộ', 'Xa lộ Hà Nội, TP. Thủ Đức', 'Thủ Đức', 'Đang bán', '968x798_1.jpg' ),
		array( 'Villa Palm Garden', 'Biệt thự sân vườn yên tĩnh, mặt tiền rộng, thiết kế nhiều ánh sáng và có khu tiệc ngoài trời.', '32 tỷ', '320 m²', '4', '5', 'Biệt thự', 'Khu Thảo Điền, TP. Thủ Đức', 'Thủ Đức', 'Dự án mới', '526x526_01.jpg' ),
		array( 'Nhà phố Hàng Xanh', 'Nhà phố gần trục Điện Biên Phủ, phù hợp vừa ở vừa làm văn phòng đại diện nhỏ.', '15,8 tỷ', '92 m²', '4', '4', 'Nhà phố', 'Bình Thạnh, TP. HCM', 'Bình Thạnh', 'Đang bán', '526x526_08.jpg' ),
		array( 'Căn hộ Sơn Trà Ocean', 'Căn hộ nghỉ dưỡng gần biển, nội thất hoàn thiện, khai thác cho thuê du lịch tốt.', '4,9 tỷ', '72 m²', '2', '2', 'Căn hộ', 'Sơn Trà, Đà Nẵng', 'Đà Nẵng', 'Cho thuê', '526x526_10.jpg' ),
		array( 'Đất nền ven sông District 9', 'Lô đất pháp lý rõ ràng, đường nội khu 12m, phù hợp xây nhà ở hoặc giữ tài sản.', '9,6 tỷ', '180 m²', '0', '0', 'Đất nền', 'Long Trường, TP. Thủ Đức', 'Thủ Đức', 'Đang bán', '526x526_11.jpg' ),
	);

	foreach ( $properties as $item ) {
		if ( get_page_by_title( $item[0], OBJECT, 'property' ) ) {
			continue;
		}
		$post_id = wp_insert_post(
			array(
				'post_type'    => 'property',
				'post_status'  => 'publish',
				'post_title'   => $item[0],
				'post_excerpt' => $item[1],
				'post_content' => '<p>' . esc_html( $item[1] ) . '</p><h2>Điểm nổi bật</h2><p>Sản phẩm được chọn lọc theo tiêu chí vị trí, pháp lý, khả năng thanh khoản và chất lượng vận hành. Đội ngũ môi giới có thể cập nhật thêm hình ảnh, bảng giá và lịch xem nhà trong trang quản trị.</p><h2>Tiện ích và kết nối</h2><p>Gần các tuyến giao thông chính, khu thương mại, trường học và dịch vụ thiết yếu. Thông tin hiện tại là dữ liệu mẫu để bạn thấy được cấu trúc website bất động sản hoàn chỉnh.</p>',
			)
		);
		if ( is_wp_error( $post_id ) ) {
			continue;
		}
		update_post_meta( $post_id, '_bd_price', $item[2] );
		update_post_meta( $post_id, '_bd_area', $item[3] );
		update_post_meta( $post_id, '_bd_bed', $item[4] );
		update_post_meta( $post_id, '_bd_bath', $item[5] );
		update_post_meta( $post_id, '_bd_type', $item[6] );
		update_post_meta( $post_id, '_bd_address', $item[7] );
		wp_set_object_terms( $post_id, $item[8], 'property_location' );
		wp_set_object_terms( $post_id, $item[9], 'property_status' );
		$thumb_id = bd_pro_seed_attachment_by_file( $item[10] );
		if ( $thumb_id ) {
			set_post_thumbnail( $post_id, $thumb_id );
		}
	}

	$enhanced = array(
		'The Nelson Private Residences' => array( '18.5', '126', 'Tây Nam', 'Sổ hồng lâu dài', 'Hà Nội', 'Đống Đa', '21.0166', '105.8159', 'https://www.google.com/maps/embed?pb=', 'View hồ điều hòa và trung tâm thành phố từ tầng cao.' ),
		'Lumiere Riverside Thu Duc'     => array( '7.2', '89', 'Đông Nam', 'Hợp đồng mua bán', 'TP. HCM', 'Thủ Đức', '10.8021', '106.7413', 'https://www.google.com/maps/embed?pb=', 'View sông Sài Gòn, thoáng sáng vào buổi chiều.' ),
		'Villa Palm Garden'             => array( '32', '320', 'Nam', 'Sổ hồng riêng', 'TP. HCM', 'Thủ Đức', '10.8088', '106.7334', 'https://www.google.com/maps/embed?pb=', 'View sân vườn và khu biệt thự thấp tầng.' ),
		'Nha pho Hang Xanh'             => array( '15.8', '92', 'Đông', 'Sổ hồng riêng', 'TP. HCM', 'Bình Thạnh', '10.8015', '106.7112', 'https://www.google.com/maps/embed?pb=', 'View mặt tiền đường nội bộ, phù hợp kinh doanh.' ),
		'Can ho Son Tra Ocean'          => array( '4.9', '72', 'Đông Bắc', 'Sổ hồng sở hữu lâu dài', 'Đà Nẵng', 'Sơn Trà', '16.0839', '108.2447', 'https://www.google.com/maps/embed?pb=', 'View biển Sơn Trà, phù hợp khai thác nghỉ dưỡng.' ),
		'Dat nen ven song District 9'   => array( '9.6', '180', 'Tây Bắc', 'Sổ đỏ riêng', 'TP. HCM', 'Thủ Đức', '10.8029', '106.8189', 'https://www.google.com/maps/embed?pb=', 'View kênh xanh, mật độ xây dựng thấp.' ),
	);
	foreach ( $enhanced as $title => $data ) {
		$property = get_page_by_title( $title, OBJECT, 'property' );
		if ( ! $property ) {
			continue;
		}
		update_post_meta( $property->ID, '_bd_price_number', $data[0] );
		update_post_meta( $property->ID, '_bd_area_number', $data[1] );
		update_post_meta( $property->ID, '_bd_direction', $data[2] );
		update_post_meta( $property->ID, '_bd_legal', $data[3] );
		update_post_meta( $property->ID, '_bd_city', $data[4] );
		update_post_meta( $property->ID, '_bd_district', $data[5] );
		update_post_meta( $property->ID, '_bd_lat', $data[6] );
		update_post_meta( $property->ID, '_bd_lng', $data[7] );
		update_post_meta( $property->ID, '_bd_virtual_tour', $data[8] );
		update_post_meta( $property->ID, '_bd_balcony_view', $data[9] );
		update_post_meta( $property->ID, '_bd_seo_title', $title . ' | HTB Resident' );
		update_post_meta( $property->ID, '_bd_seo_description', 'Thông tin giá, diện tích, pháp lý, tiện ích và lịch xem nhà của ' . $title . '.' );
	}

	$home_page = get_page_by_path( 'trang-chu-bat-dong-san' );
	$home_id   = $home_page ? $home_page->ID : 0;
	if ( ! $home_id ) {
		$home_id = wp_insert_post(
			array(
				'post_type'    => 'page',
				'post_status'  => 'publish',
				'post_title'   => 'Trang chu bat dong san',
				'post_name'    => 'trang-chu-bat-dong-san',
				'post_content' => '',
			)
		);
	}
	if ( $home_id && ! is_wp_error( $home_id ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $home_id );
	}

	$menu_name = 'Menu Bat Dong San';
	$menu      = wp_get_nav_menu_object( $menu_name );
	if ( ! $menu ) {
		$menu_id = wp_create_nav_menu( $menu_name );
		wp_update_nav_menu_item( $menu_id, 0, array( 'menu-item-title' => 'Trang chu', 'menu-item-url' => home_url( '/' ), 'menu-item-status' => 'publish' ) );
		wp_update_nav_menu_item( $menu_id, 0, array( 'menu-item-title' => 'Bat dong san', 'menu-item-url' => get_post_type_archive_link( 'property' ), 'menu-item-status' => 'publish' ) );
		wp_update_nav_menu_item( $menu_id, 0, array( 'menu-item-title' => 'Lien he', 'menu-item-url' => home_url( '/#lien-he' ), 'menu-item-status' => 'publish' ) );
		set_theme_mod( 'nav_menu_locations', array( 'primary' => $menu_id ) );
	}

	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'bd_pro_seed_site' );
