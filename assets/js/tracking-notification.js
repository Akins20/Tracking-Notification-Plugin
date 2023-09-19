// JavaScript for handling form submission via AJAX
jQuery(document).ready(function ($) {
    $('#tracking-form').submit(function (e) {
        e.preventDefault();

        var orderNumber = $('#order-number').val();
        var email = $('#email').val();

        $.ajax({
            type: 'POST',
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            data: {
                action: 'fetch_tracking_info',
                order_number: orderNumber,
                email: email,
                security: '<?php echo wp_create_nonce('tracking_notification_nonce'); ?>',
            },
            success: function (response) {
                $('#notification-response').html(response);
            },
        });
    });
});
