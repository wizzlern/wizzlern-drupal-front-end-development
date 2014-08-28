<?php
/**
 * @file
 * Enables modules and site configuration for a standard site installation.
 */

/**
 * Implements hook_form_FORM_ID_alter().
 *
 * Allows the profile to alter the site configuration form.
 */
function wizzlern_frontend_form_install_configure_form_alter(&$form, $form_state) {
  // Deny access to the site name field.
  $form['site_information']['site_name']['#access'] = FALSE;
}
