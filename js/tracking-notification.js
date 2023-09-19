jQuery(document).ready(function($) {
    $('#tracking-notification-button').click(function(e) {
        e.preventDefault();

        var order_number = $('#order-number').val();
        var email = $('#email').val();

        $.ajax({
            type: 'POST',
            url: tracking_data.ajax_url,
            data: {
                action: 'fetch_tracking_info',
                order_number: order_number,
                email: email,
            },
            success: function(response) {
                alert(response.data);
                // Implement logic to display tracking info on the page.
            },
        });
    });
});