# Tracking Notification Plugin

**Plugin Name:** Tracking Notification Plugin
**Description:** Fetches customer tracking info and sends notifications.
**Version:** 1.0
**Author:** Ogunbiyi Elijah Akintunde

## Overview

The Tracking Notification Plugin is a WordPress plugin designed to help WooCommerce store owners fetch customer tracking information and send notifications to customers regarding their orders. This plugin integrates with WooCommerce and provides a secure and efficient way to handle tracking notifications via email and SMS.

## Installation

To install the Tracking Notification Plugin, follow these steps:

1. Download the plugin ZIP file from the [GitHub repository](https://github.com/Akins20/Tracking-Notification-Plugin) or another source.
2. In your WordPress admin panel, navigate to **Plugins > Add New**.
3. Click the **Upload Plugin** button.
4. Choose the downloaded ZIP file and click **Install Now**.
5. Activate the plugin.

## Usage

Once the plugin is activated, you can implement tracking notifications by following these steps:

1. Make sure you have WooCommerce installed and configured on your WordPress website.

2. Create a page in WordPress where customers can input their order number and email address to request tracking information. You can use the `[tracking_notification_form]` shortcode to embed the form on the page.

3. Add the Tracking Notification Plugin JavaScript to your page or theme template. Make sure you include the `tracking-notification.js` file.

4. Customize the appearance and behavior of the tracking notification form as needed using CSS and JavaScript.

5. Customers can now enter their order number and email address on the designated page and click the "Submit" button to request tracking information.

## Features

- Secure nonce implementation to protect against CSRF attacks.
- Verification of the order number and email address.
- Integration with WooCommerce for fetching order information.
- Sending email notifications with tracking information.
- Sending SMS notifications (requires custom integration with an SMS gateway).
- Logging of successful notifications (consider implementing a logging mechanism).
- Customizable form and notification templates.

## Customization

The Tracking Notification Plugin can be customized to fit your specific needs. You can modify the appearance of the tracking notification form, integrate with additional services, and implement advanced logging and notification features.

## Support and Feedback

For questions, bug reports, or feedback, please contact the plugin author:

- Author: Ogunbiyi Elijah Akintunde
- Email: ogunbiye@gmail.com
- GitHub: [Akins20](https://github.com/Akins20/)

## License

This plugin is licensed under the [GNU General Public License v3.0](LICENSE.txt). You are free to use, modify, and distribute it in accordance with the terms of the license.

## Acknowledgments

We would like to thank the WordPress and WooCommerce communities for their support and contributions to the open-source ecosystem.

