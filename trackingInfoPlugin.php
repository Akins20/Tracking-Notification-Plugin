<?php
/*
Plugin Name: Tracking Notification Plugin
Description: Fetches customer tracking info and sends notifications.
Version: 1.0
Author: Ogunbiyi Elijah Akintunde
*/

// Enqueue JavaScript for AJAX
function enqueue_tracking_notification_script() {
    wp_enqueue_script('tracking-notification', plugins_url('js/tracking-notification.js', __FILE__), array('jquery'), '1.0', true);

    // Add a nonce to the AJAX URL
    wp_localize_script('tracking-notification', 'tracking_data', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'security' => wp_create_nonce('tracking_notification_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_tracking_notification_script');

// AJAX handler for fetching tracking info and sending notifications
function fetch_tracking_info_and_notify() {
    // Verify the nonce to protect against CSRF attacks
    if (isset($_POST['security']) && wp_verify_nonce($_POST['security'], 'tracking_notification_nonce')) {
        $order_number = sanitize_text_field($_POST['order_number']);
        $email = sanitize_email($_POST['email']);

        // Check if the order exists and the email matches
        $order = wc_get_order($order_number);
        if ($order && $email === $order->get_billing_email()) {
            // Implement the get_tracking_info function to fetch tracking info from a shipping carrier API
            $tracking_info = get_tracking_info($order);

            if (!empty($tracking_info)) {
                // Send email notification
                $email_subject = 'Your Order Tracking Info';
                $email_message = 'Your order tracking info: ' . $tracking_info;
                $email_headers = array('Content-Type: text/html; charset=UTF-8');
                $email_result = wp_mail($email, $email_subject, $email_message, $email_headers);

                // Send SMS notification using a hypothetical send_sms() function
                $sms_message = 'Your order tracking info: ' . $tracking_info;
                $sms_result = send_sms($order, $sms_message);

                if ($email_result && $sms_result) {
                    // Log successful notifications (consider implementing a logging mechanism)
                    wp_send_json_success('Tracking info sent successfully.');
                } else {
                    wp_send_json_error('Failed to send notifications.');
                }
            } else {
                wp_send_json_error('Unable to fetch tracking info.');
            }
        } else {
            wp_send_json_error('Invalid order number or email.');
        }
    } else {
        wp_send_json_error('Security verification failed.');
    }
}

add_action('wp_ajax_fetch_tracking_info', 'fetch_tracking_info_and_notify');
add_action('wp_ajax_nopriv_fetch_tracking_info', 'fetch_tracking_info_and_notify');
