<?php
/**
 * Plugin Name: CiviCRM Stripe Allow Promotion Codes
 * Plugin URI: https://github.com/yo61/civicrm_stripe_allow_promo_codes
 * Description: Sets allow_promotion_codes to true in StripeCheckout parameters
 * Version: 0.2.0
 * Author: Robin Bowes
 * License: GNU Affero General Public License version 3 (AGPLv3)
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Alter payment processor parameters to enable promotion codes for Stripe
 *
 * @param object $paymentObj Instance of payment class of the payment processor invoked
 * @param array $rawParams The associative array passed by CiviCRM to the processor
 * @param array $cookedParams The associative array of parameters as translated into the processor's API
 */
function civicrm_allow_promo_codes_alter_params($paymentObj, &$rawParams, &$cookedParams) {
    // Only set for Stripe Checkout payment processor
    // if ($paymentObj->class_name === 'Payment_StripeCheckout') {
    //    $cookedParams['allow_promotion_codes'] = true;
    //}
    $cookedParams['allow_promotion_codes'] = true;
}

// Register the hook
add_action('civicrm_alterPaymentProcessorParams', 'civicrm_allow_promo_codes_alter_params', 10, 3);
