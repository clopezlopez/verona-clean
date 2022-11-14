<?php
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}
$wshkviewsubscriptionid = get_option('wshk_viewsubscriptionid');
if ( empty( $subscription ) ) {
	global $wp;

	if ( ! isset( $wp->query_vars['view-subscription'] ) || 'hf_shop_subscription' != get_post_type( absint( $wp->query_vars['view-subscription'] ) ) || ! current_user_can( 'view_order', absint( $wp->query_vars['view-subscription'] ) ) ) {
		echo '<div class="woocommerce-error">' . esc_html__( 'Invalid Subscription.', HF_Woocommerce_Subscription_Admin::TEXT_DOMAIN ) . ' <a href="' . esc_url( wc_get_page_permalink( 'myaccount' ) ) . '" class="wc-forward">'. esc_html__( 'My Account', HF_Woocommerce_Subscription_Admin::TEXT_DOMAIN ) .'</a>' . '</div>';
		return;
	}
        $subcription_id = $wp->query_vars['view-subscription'];
	$subscription = hf_get_subscription( $subcription_id );
}
wc_print_notices();

?>

<table class="shop_table subscription_details">
	<tr>
            <td><?php _e( 'Status', HF_Woocommerce_Subscription_Admin::TEXT_DOMAIN ); ?></td>
		<td><?php echo esc_html( hf_get_subscription_status_name( $subscription->get_status() ) ); ?></td>
	</tr>
	<tr>
		<td><?php echo __( 'Start Date',  HF_Woocommerce_Subscription_Admin::TEXT_DOMAIN ); ?></td>
		<td><?php echo  $subscription->get_date_to_display( 'date_created' ); ?></td>
	</tr>
	<?php foreach ( array(
		'last_order_date_created' => __( 'Last Order Date',  HF_Woocommerce_Subscription_Admin::TEXT_DOMAIN ),
		'next_payment'            => __( 'Next Payment Date',  HF_Woocommerce_Subscription_Admin::TEXT_DOMAIN ),
		'end'                     => __( 'End Date', HF_Woocommerce_Subscription_Admin::TEXT_DOMAIN ),
		) as $date_type => $date_title ) : ?>
		<?php $date = $subscription->get_date( $date_type ); ?>
		<?php if ( ! empty( $date ) ) : ?>
			<tr>
				<td><?php echo $date_title ; ?></td>
				<td><?php echo $subscription->get_date_to_display( $date_type ); ?></td>
			</tr>
		<?php endif; ?>
	<?php endforeach; ?>
	<?php 
        do_action( 'hf_subscription_before_actions', $subscription );
	
        // show available action buttons
        
        $actions = available_user_actions_for_subscription( $subscription, get_current_user_id() ); 
        ?>
	<?php if ( ! empty( $actions ) ) : ?>
		<tr>
                    <td><?php _e( 'Actions', HF_Woocommerce_Subscription_Admin::TEXT_DOMAIN ); ?></td>
			<td>
				<?php foreach ( $actions as $key => $action ) : ?>
					<a href="<?php echo esc_url( $action['url'].$wshkviewsubscriptionid ); ?>" class="button <?php echo sanitize_html_class( $key ) ?> webtoffee"><?php echo esc_html( $action['name'] ); ?></a>
				<?php endforeach; ?>
			</td>
		</tr>
	<?php endif; ?>
	<?php do_action( 'hf_subscription_after_actions', $subscription ); ?>
</table>
<?php if ( $notes = $subscription->get_customer_order_notes() ) :
	?>
	<h2><?php _e( 'Subscription Updates', HF_Woocommerce_Subscription_Admin::TEXT_DOMAIN ); ?></h2>
	<ol class="commentlist notes">
		<?php foreach ( $notes as $note ) : ?>
		<li class="comment note">
			<div class="comment_container">
				<div class="comment-text">
                                    <p class="meta"><?php echo esc_html( date_i18n( _x( 'l jS \o\f F Y, h:ia', 'date on subscription updates list. Will be localized', HF_Woocommerce_Subscription_Admin::TEXT_DOMAIN ), Date_Time_Utils::convert_date_to_time( $note->comment_date ) ) ); ?></p>
					<div class="description">
						<?php echo wp_kses_post($note->comment_content); ?>
					</div>
	  				<div class="clear"></div>
	  			</div>
				<div class="clear"></div>
			</div>
		</li>
		<?php endforeach; ?>
	</ol>
<?php endif; ?>
<?php $allow_remove_item = hf_can_items_be_removed( $subscription );?>
<h2><?php esc_html_e( 'Subscription Totals', HF_Woocommerce_Subscription_Admin::TEXT_DOMAIN ); ?></h2>
<table class="shop_table order_details">
	<thead>
		<tr>
			<?php if ( $allow_remove_item ) : ?>
			<th class="product-remove" style="width: 3em;">&nbsp;</th>
			<?php endif; ?>
			<th class="product-name"><?php echo __( 'Product', HF_Woocommerce_Subscription_Admin::TEXT_DOMAIN ); ?></th>
			<th class="product-total"><?php echo __( 'Total', HF_Woocommerce_Subscription_Admin::TEXT_DOMAIN ); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php
		if ( sizeof( $subscription_items = $subscription->get_items() ) > 0 ) {

			foreach ( $subscription_items as $item_id => $item ) {
				$_product  = apply_filters( 'hf_subscription_order_item_product', $subscription->get_product_from_item( $item ), $item );
				if ( apply_filters( 'woocommerce_order_item_visible', true, $item ) ) {
					?>
					<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_order_item_class', 'order_item', $item, $subscription ) ); ?>">
						<?php if ( $allow_remove_item ) : ?>
							<td class="remove_item"><a href="<?php echo esc_url( get_item_remove_url( $subscription->get_id(), $item_id ) );?>" class="remove" onclick="return confirm('<?php printf( esc_html__( 'Are you sure you want remove this item from your subscription?', HF_Woocommerce_Subscription_Admin::TEXT_DOMAIN ) ); ?>');">&times;</a></td>
						<?php endif; ?>
						<td class="product-name">
							<?php
							if ( $_product && ! $_product->is_visible() ) {
								echo esc_html( apply_filters( 'woocommerce_order_item_name', $item['name'], $item, false ) );
							} else {
								echo wp_kses_post( apply_filters( 'woocommerce_order_item_name', sprintf( '<a href="%s">%s</a>', get_permalink( $item['product_id'] ), $item['name'] ), $item, false ) );
							}

							echo wp_kses_post( apply_filters( 'woocommerce_order_item_quantity_html', ' <strong class="product-quantity">' . sprintf( '&times; %s', $item['qty'] ) . '</strong>', $item ) );
							do_action( 'woocommerce_order_item_meta_start', $item_id, $item, $subscription );
							display_subscription_item_meta( $item, $subscription );
							// display_subscription_item_downloads( $item, $subscription );
							do_action( 'woocommerce_order_item_meta_end', $item_id, $item, $subscription );
                                                        
							?>
						</td>
						<td class="product-total">
							<?php echo wp_kses_post( $subscription->get_formatted_line_subtotal( $item ) ); ?>
						</td>
					</tr>
					<?php
				}

				if ( $subscription->has_status( array( 'completed', 'processing' ) ) && ( $purchase_note = get_post_meta( $_product->id, '_purchase_note', true ) ) ) {
					?>
					<tr class="product-purchase-note">
						<td colspan="3"><?php echo  $purchase_note; ?></td>
					</tr>
					<?php
				}
			}
		}
		?>
	</tbody>
		<tfoot>
		<?php

		if ( $totals = $subscription->get_order_item_totals() ) {
			foreach ( $totals as $key => $total ) {
				?>
			<tr>
				<th scope="row" <?php echo ( $allow_remove_item ) ? 'colspan="2"' : ''; ?>><?php echo esc_html( $total['label'] ); ?></th>
				<td><?php echo wp_kses_post( $total['value'] ); ?></td>
			</tr>
				<?php
			}
		} ?>
	</tfoot>
</table>

<?php include('related-orders.php');  ?>





<?php do_action( 'hf_subscription_details_after_subscription_table', $subscription ); ?>
<?php wc_get_template( 'order/order-details-customer.php', array( 'order' => $subscription ) ); ?>
<div class="clear"></div>