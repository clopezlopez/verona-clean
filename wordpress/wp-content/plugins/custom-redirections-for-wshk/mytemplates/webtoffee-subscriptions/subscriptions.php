<?php
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

$wshkviewsubscriptionid = get_option('wshk_viewsubscriptionid');
?>
<style>
    .my_account_subscriptions{
        padding:5px;
    }
</style>
<div class="my_account_subscriptions">

	<?php if (HF_Woocommerce_Subscription_Admin::is_woocommerce_prior_to( '2.6' ) ) : ?>
	<h2><?php _e( 'My Subscriptions', HF_Woocommerce_Subscription_Admin::TEXT_DOMAIN ); ?></h2>
	<?php endif; ?>

	<?php $subscriptions = hf_get_users_subscriptions(); //Since v.1.1.3 pro
	if ( ! empty( $subscriptions ) ) : ?>
	<table class="shop_table shop_table_responsive my_account_subscriptions my_account_orders">

	<thead>
		<tr>
			<th class="subscription-id order-number"><span><?php _e( 'Subscription ID', HF_Woocommerce_Subscription_Admin::TEXT_DOMAIN ); ?></span></th>
			<th class="subscription-status order-status"><span><?php _e( 'Status', HF_Woocommerce_Subscription_Admin::TEXT_DOMAIN ); ?></span></th>
			<th class="subscription-next-payment order-date"><span><?php _e( 'Next Payment on', HF_Woocommerce_Subscription_Admin::TEXT_DOMAIN ); ?></span></th>
			<th class="subscription-total order-total"><span><?php _e( 'Total', HF_Woocommerce_Subscription_Admin::TEXT_DOMAIN ); ?></span></th>
			<th class="subscription-actions order-actions"><span><?php _e( 'Actions', HF_Woocommerce_Subscription_Admin::TEXT_DOMAIN ); ?></span></th>
		</tr>
	</thead>

	<tbody>
	<?php foreach ( $subscriptions as $subscription_id => $subscription ) : ?>
		<tr class="order">
			<td class="subscription-id order-number" data-title="<?php esc_attr_e( 'ID', HF_Woocommerce_Subscription_Admin::TEXT_DOMAIN ); ?>">
				<a href="<?php echo esc_url( $subscription->get_view_order_url() .$wshkviewsubscriptionid); ?>"><?php echo esc_html( sprintf( _x( '#%s', 'hash before order number', HF_Woocommerce_Subscription_Admin::TEXT_DOMAIN ), $subscription->get_order_number() ) ); ?></a>
				<?php do_action( 'woocommerce_my_subscriptions_after_subscription_id', $subscription ); ?>
			</td>
			<td class="subscription-status order-status" data-title="<?php esc_attr_e( 'Status', HF_Woocommerce_Subscription_Admin::TEXT_DOMAIN ); ?>">
				<?php echo esc_attr( hf_get_subscription_status_name( $subscription->get_status() ) ); ?>
			</td>
			<td class="subscription-next-payment order-date" data-title="<?php echo __( 'Next Payment', HF_Woocommerce_Subscription_Admin::TEXT_DOMAIN ); ?>">
				<?php echo esc_attr( $subscription->get_date_to_display( 'next_payment' ) ); ?>
				<?php if ( ! $subscription->is_manual() && $subscription->has_status( 'active' ) && $subscription->get_time( 'next_payment' ) > 0 ) : ?>
					<?php
					$payment_method_to_display = sprintf( __( 'Via %s', HF_Woocommerce_Subscription_Admin::TEXT_DOMAIN ), $subscription->get_payment_method_to_display() );
					$payment_method_to_display = apply_filters( 'woocommerce_my_subscriptions_payment_method', $payment_method_to_display, $subscription );
					?>
				<br/><small><?php echo esc_attr( $payment_method_to_display ); ?></small>
				<?php endif; ?>
			</td>
			<td class="subscription-total order-total" data-title="<?php echo __( 'Total', HF_Woocommerce_Subscription_Admin::TEXT_DOMAIN ); ?>">
				<?php echo wp_kses_post( $subscription->get_formatted_order_total() ); ?>
			</td>
			<td class="subscription-actions order-actions">
				<a href="<?php echo esc_url( $subscription->get_view_order_url().$wshkviewsubscriptionid ) ?>" class="button view"><?php echo __( 'View', HF_Woocommerce_Subscription_Admin::TEXT_DOMAIN ); ?></a>
				<?php do_action( 'woocommerce_my_subscriptions_actions', $subscription ); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>

	</table>
	<?php else : ?>

	<p class="no_subscriptions">
            <?php printf( esc_html__( 'No subscriptions found. Find your first subscription in the %sstore%s.', HF_Woocommerce_Subscription_Admin::TEXT_DOMAIN ), ' <a href="' . esc_url( apply_filters( 'hf_subscription_message_store_url', get_permalink( wc_get_page_id( 'shop' ) ) ) ) . '">', '</a>' ); ?>
	</p>

	<?php endif; ?>

</div>