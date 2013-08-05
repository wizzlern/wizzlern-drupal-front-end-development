<?php

/**
 * @file
 * Contains theme override functions and preprocess functions for the Base 2013 theme.
 */

/**
 * Overrides theme_breadcrumb().
 *
 * Changes:
 * - Custom breadcrumb separator symbol.
 */
function base2013_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];

  if (!empty($breadcrumb)) {
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';

    $output .= '<div class="breadcrumb">' . implode(' > ', $breadcrumb)
      . '</div>';
    return $output;
  }
}
