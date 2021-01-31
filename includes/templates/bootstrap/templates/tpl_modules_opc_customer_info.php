<?php
// -----
// Part of the One-Page Checkout plugin, provided under GPL 2.0 license by lat9 (cindy@vinosdefrutastropicales.com).
// Copyright (C) 2018-2019, Vinos de Frutas Tropicales.  All rights reserved.
//
// Modified for use by the 'bootstrap' template:  Bootstrap/OPC v1.0.0
//
if ($_SESSION['opc']->isGuestCheckout()) {
    $cancel_title = 'title="' . BUTTON_CANCEL_CHANGES_TITLE . '"';
    $save_title = 'title="' . BUTTON_SAVE_CHANGES_TITLE . '"';
    
    $email_field_len = zen_set_field_length(TABLE_CUSTOMERS, 'customers_email_address', '40');
    $email_required = ((int)ENTRY_EMAIL_ADDRESS_MIN_LENGTH > 0) ? ' required' : '';
    $email_value = $_SESSION['opc']->getGuestEmailAddress();

    $telephone_field_len = zen_set_field_length(TABLE_CUSTOMERS, 'customers_telephone', '40');
    $telephone_required = ((int)ENTRY_TELEPHONE_MIN_LENGTH > 0) ? ' required' : '';
    $telephone_value = $_SESSION['opc']->getGuestTelephone();
    
    $dob_value = $_SESSION['opc']->getGuestDateOfBirth();
?>
<!--bof customer-information block -->
    <div id="checkoutOneGuestInfo" class="card mb-3">
        <h4 class="card-header"><?php echo TITLE_CONTACT_INFORMATION; ?></h4>
        <div class="card-body">
            <p><?php echo TEXT_CONTACT_INFORMATION; ?></p>

            <label class="inputLabel" for="opc-guest-email"><?php echo ENTRY_EMAIL_ADDRESS; ?></label>
            <?php echo zen_draw_input_field('email_address', $email_value, $email_field_len . ' id="opc-guest-email" placeholder="' . ENTRY_EMAIL_ADDRESS_TEXT . '"' . $email_required, 'email'); ?>
<?php
    if (CHECKOUT_ONE_GUEST_EMAIL_CONFIRMATION == 'true') {
?>            
            <label class="inputLabel" for="opc-guest-email-conf"><?php echo ENTRY_EMAIL_ADDRESS_CONF; ?></label>
            <?php echo zen_draw_input_field('email_address_conf', $email_value, $email_field_len . ' id="opc-guest-email-conf" placeholder="' . ENTRY_EMAIL_ADDRESS_CONF_TEXT . '"' . $email_required, 'email'); ?>
<?php
    }
?>            
            <label class="inputLabel" for="telephone"><?php echo ENTRY_TELEPHONE_NUMBER; ?></label>
            <?php echo zen_draw_input_field('telephone', $telephone_value, $telephone_field_len . ' id="telephone" placeholder="' . ENTRY_TELEPHONE_NUMBER_TEXT . '"' . $telephone_required, 'tel'); ?>
<?php
  if (ACCOUNT_DOB == 'true') {
      $dob_required = (((int)ENTRY_DOB_MIN_LENGTH) > 0) ? ' required' : '';
?>
            <label class="inputLabel" for="dob"><?php echo ENTRY_DATE_OF_BIRTH; ?></label>
            <?php echo zen_draw_input_field('dob', $dob_value, 'id="dob" placeholder="' . ENTRY_DATE_OF_BIRTH_TEXT . '"' . $dob_required); ?>
<?php
  }
?>            
           <div class="opc-buttons text-right">
                <div class="d-flex justify-content-around mt-2">
                    <div id="opc-guest-cancel"><?php echo zen_image_button(BUTTON_IMAGE_CANCEL, BUTTON_CANCEL_CHANGES_ALT, $cancel_title); ?></div>
                    <div id="opc-guest-save"><?php echo zen_image_button(BUTTON_IMAGE_UPDATE, BUTTON_SAVE_CHANGES_ALT, $save_title); ?></div>
                </div>
            </div>
            <div id="messages-guest"></div>
        </div>
    </div>
<!--eof customer-information block -->
<?php
}
