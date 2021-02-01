<?php
// -----
// Part of the One-Page Checkout plugin, provided under GPL 2.0 license by lat9 (cindy@vinosdefrutastropicales.com).
// Copyright (C) 2013-2019, Vinos de Frutas Tropicales.  All rights reserved.
//
// The following definition is used in multiple pages and will in the main language file, e.g. english.php, for
// Zen Cart versions 1.5.7 and later.
//
// Provide an in-script override for the case it's not defined.
//
// Modified for use by the 'bootstrap' template:  Bootstrap/OPC v1.0.0
//
if (!defined('TEXT_OPTION_DIVIDER')) define('TEXT_OPTION_DIVIDER', '&nbsp;-&nbsp;');

$display_tax_column = (count($order->info['tax_groups']) > 1);

// -----
// Setting here, for use by tpl_modules_order_totals.php further down.
//
$_SESSION['zca_bootstrap_ot_colspan'] = ($display_tax_column) ? '3' : '2';
?>
<!--bof shopping-cart block -->
<div class="table-responsive card mb-3">
    <h4 class="card-header"><?php echo HEADING_PRODUCTS; ?></h4>
    <div class="card-body">
        <div class="text-right mb-2">
            <?php echo '<a href="' . zen_href_link(FILENAME_SHOPPING_CART) . '" class="d-block">' . zen_image_button(BUTTON_IMAGE_EDIT_SMALL, BUTTON_EDIT_SMALL_ALT) . '</a>'; ?>
        </div>
        <table class="cartTableDisplay table table-bordered table-striped">
            <thead>
                <tr class="cartTableHeading">
                    <th scope="col" id="ccQuantityHeading"><?php echo TABLE_HEADING_QUANTITY; ?></th>
                    <th scope="col" id="ccProductsHeading"><?php echo TABLE_HEADING_PRODUCTS; ?></th>
<?php
// If there are tax groups, display the tax columns for price breakdown
if ($display_tax_column) {
?>
                    <th scope="col" id="ccTaxHeading"><?php echo HEADING_TAX; ?></th>
<?php
}
?>
                    <th scope="col" id="ccTotalHeading" class="text-right"><?php echo TABLE_HEADING_TOTAL; ?></th>
                </tr>
            </thead>
            <tbody>
<?php 
// now loop thru all products to display quantity and price
for ($i = 0, $n = count($order->products); $i < $n; $i++) {
?>
                <tr>
                    <td class="cartQuantity"><?php echo $order->products[$i]['qty']; ?>&nbsp;x</td>
                    <td class="cartProductDisplay"><?php echo $order->products[$i]['name'] . $stock_check[$i]; ?>
<?php 
// if there are attributes, loop thru them and display one per line
    if (isset ($order->products[$i]['attributes']) && count ($order->products[$i]['attributes']) > 0 ) {
?>
                        <ul class="cartAttribsList">
<?php
        foreach ($order->products[$i]['attributes'] as $next_attribute) {
?>
                            <li><?php echo $next_attribute['option'] . TEXT_OPTION_DIVIDER . nl2br(zen_output_string_protected($next_attribute['value'])); ?></li>
<?php
        } // end loop
?>
                        </ul>
<?php
    } // endif attribute-info
    
    if (isset($posStockMessage)) {
        echo '<br>' . $posStockMessage[$i];
    }
?>
                    </td>
<?php 
  // display tax info if exists
    if ($display_tax_column)  { 
?>
                    <td class="cartTotalDisplay"><?php echo zen_display_tax_value($order->products[$i]['tax']); ?>%</td>
<?php
    }  // endif tax info display  
?>
                    <td class="cartTotalDisplay text-right">
<?php 
    echo $currencies->display_price($order->products[$i]['final_price'], $order->products[$i]['tax'], $order->products[$i]['qty']);
    if ($order->products[$i]['onetime_charges'] != 0 ) {
        echo '<br> ' . $currencies->display_price($order->products[$i]['onetime_charges'], $order->products[$i]['tax'], 1);
    }
?>
                    </td>
                </tr>
<?php  
}  
// end for loopthru all products 
?>
            </tbody>
<?php
if (MODULE_ORDER_TOTAL_INSTALLED) {
?>
            <tfoot id="orderTotalDivs">
<?php
    $order_total_modules->process(); 
    $order_total_modules->output();
?>
            </tfoot>
<?php
}
?>
        </table>
    </div>
</div>
<!--eof shopping-cart block -->
