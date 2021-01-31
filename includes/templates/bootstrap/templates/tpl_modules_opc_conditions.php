<?php
// -----
// Part of the One-Page Checkout plugin, provided under GPL 2.0 license by lat9 (cindy@vinosdefrutastropicales.com).
// Copyright (C) 2013-2018, Vinos de Frutas Tropicales.  All rights reserved.
//
// Modified for use by the 'bootstrap' template:  Bootstrap/OPC v1.0.0
//
if ($_SESSION['opc']->isGuestCheckout() && DISPLAY_PRIVACY_CONDITIONS == 'true') {
?>
    <div id="privacy-div" class="card mb-3">
        <h4 class="card-header"><?php echo TABLE_HEADING_PRIVACY_CONDITIONS; ?></h4>
        <div class="card-body">
            <div class="information mb-2"><?php echo TEXT_PRIVACY_CONDITIONS_DESCRIPTION;?></div>
            <div class="custom-control custom-checkbox">
                <?php echo zen_draw_checkbox_field('privacy_conditions', '1', false, 'id="privacy" required'); ?>
                <label class="custom-control-label checkboxLabel" for="privacy"><?php echo TEXT_PRIVACY_CONDITIONS_CONFIRM; ?></label>
            </div>
        </div>
    </div>
<?php
}

if (DISPLAY_CONDITIONS_ON_CHECKOUT == 'true') {
?>
<!--bof conditions block -->
    <div id="conditions-div" class="card mb-3">
        <h4 class="card-header"><?php echo TABLE_HEADING_CONDITIONS; ?></h4>
        <div class="card-body">
            <div class="mb-2"><?php echo TEXT_CONDITIONS_DESCRIPTION;?></div>
            <div class="custom-control custom-checkbox">
                <?php echo zen_draw_checkbox_field('conditions', '1', false, 'id="conditions" required'); ?>
                <label class="custom-control-label checkboxLabel" for="conditions"><?php echo TEXT_CONDITIONS_CONFIRM; ?></label>
            </div>
        </div>
    </div>
<!--eof conditions block -->
<?php
}
