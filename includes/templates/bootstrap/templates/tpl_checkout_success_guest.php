<?php
/**
 * Page Template
 *
 * Loaded automatically by index.php?main_page=checkout_success.<br />
 * Displays confirmation details after order has been successfully processed.
 *
 * @package templateSystem
 * @copyright Copyright 2003-2016 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: Author: DrByte  Mon Mar 23 13:48:06 2015 -0400 Modified in v1.5.5 $
 */
// -----
// Part of the One-Page Checkout plugin, provided under GPL 2.0 license by lat9 
// Copyright (C) 2018-2019, Vinos de Frutas Tropicales.  All rights reserved.
//
// Modified for use by the 'bootstrap' template:  Bootstrap/OPC v1.0.0
//
?>
<div class="centerColumn" id="checkoutSuccess">
<?php 
if ($messageStack->size('checkout_success') > 0) {
    echo $messageStack->output('checkout_success');
}
?>
    <h1 id="checkoutSuccessHeading"><?php echo HEADING_TITLE; ?></h1>
    <div id="checkoutSuccessOrderNumber"><?php echo TEXT_YOUR_ORDER_NUMBER . $zv_orders_id; ?></div>
<?php
if ($offer_account_creation) {
?>
    <div id="checkoutSuccessGuestPassword" class="card mb-3 mt-2">
        <div class="card-body">
            <p class="card-title"><?php echo TEXT_GUEST_ADD_PWD_TO_CREATE_ACCT; ?></p>
            
            <?php echo zen_draw_form('guest-pwd', zen_href_link(FILENAME_CHECKOUT_SUCCESS, 'action=create_account', 'SSL'), 'post'); ?>
                <div class="form-group row">
                    <label class="inputLabel" for="password-new" class="col-sm-2 col-form-label"><?php echo ENTRY_PASSWORD; ?></label>
                    <div class="col-sm-4">
                        <?php echo zen_draw_password_field('password', '', 'id="password-new" autocomplete="off" placeholder="' . ENTRY_PASSWORD_TEXT . '"'); ?>
                    </div>

                    <label class="inputLabel" for="password-confirm" class="col-sm-2 col-form-label"><?php echo ENTRY_PASSWORD_CONFIRMATION; ?></label>
                    <div class="col-sm-4">
                        <?php echo zen_draw_password_field('confirmation', '', 'id="password-confirm" autocomplete="off" placeholder="' . ENTRY_PASSWORD_CONFIRMATION_TEXT . '"'); ?>
                    </div>
                </div>
                <h3><?php echo ENTRY_EMAIL_PREFERENCE; ?></h3>
<?php
    if (ACCOUNT_NEWSLETTER_STATUS != 0) {
?>
                <div class="custom-control custom-checkbox">
                    <?php echo zen_draw_checkbox_field('newsletter', '1', false, 'id="newsletter-checkbox"'); ?>
                    <label class="custom-control-label checkboxLabel" for="newsletter-checkbox"> <?php echo ENTRY_NEWSLETTER; ?></label>
                </div>
                <?php echo (zen_not_null(ENTRY_NEWSLETTER_TEXT) ? '<span class="alert">' . ENTRY_NEWSLETTER_TEXT . '</span>': ''); ?>
<?php 
    } 
?>
                <div class="custom-control custom-radio custom-control-inline ml-3">
                    <?php echo zen_draw_radio_field('email_format', 'HTML', ($email_format == 'HTML'),'id="email-format-html"'); ?>
                    <label class="custom-control-label radioButtonLabel" for="email-format-html"><?php echo ENTRY_EMAIL_HTML_DISPLAY; ?></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <?php echo zen_draw_radio_field('email_format', 'TEXT', ($email_format == 'TEXT'), 'id="email-format-text"'); ?>
                    <label class="custom-control-label radioButtonLabel" for="email-format-text"><?php echo ENTRY_EMAIL_TEXT_DISPLAY; ?></label>
                </div>
                
                <div class="text-right"><?php echo zen_image_submit(BUTTON_IMAGE_CREATE_ACCOUNT, BUTTON_CREATE_ACCOUNT_ALT); ?></div>
            <?php echo '</form>'; ?>
        </div>
    </div>
<?php
}

if (DEFINE_CHECKOUT_SUCCESS_STATUS >= 1 and DEFINE_CHECKOUT_SUCCESS_STATUS <= 2) {
?>
    <div id="checkoutSuccessMainContent" class="content"><?php require $define_page; ?></div>
<?php 
} 
?>
<!-- bof payment-method-alerts -->
<?php
if (isset($additional_payment_messages) && $additional_payment_messages != '') {
?>
    <div class="content"><?php echo $additional_payment_messages; ?></div>
<?php
}
?>
    <div id="checkoutSuccessOrderLink"><?php echo TEXT_SEE_ORDERS_GUEST;?></div>

    <div id="checkoutSuccessContactLink"><?php echo TEXT_CONTACT_STORE_OWNER;?></div>

<!-- bof order details -->
<?php
require $template->get_template_dir('tpl_account_history_info_default.php', DIR_WS_TEMPLATE, $current_page_base, 'templates') . '/tpl_account_history_info_default.php';
?>
<!-- eof order details -->

    <h3 id="checkoutSuccessThanks" class="text-center"><?php echo TEXT_THANKS_FOR_SHOPPING; ?></h3>
</div>
