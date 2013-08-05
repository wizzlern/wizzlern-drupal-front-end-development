<?php

/**
 * @file
 * Contains theme override functions and preprocess functions for the Base 2013 theme.
 */

/**
 * Implements hook_preprocess_page().
 *
 * Override or insert variables into the page template.
 */
function base2013_process_page(&$variables) {
  // Set a default page title and slogan in case they are not set.
  // These are simple examples of how to modify existing template variables.
  if (!$variables['title']) {
    $variables['title'] = variable_get('site_name', 'Drupal');
  }
  $variables['slogan'] = (variable_get('site_slogan', '') ? variable_get('site_slogan', '') : t('The future proof starting point for any website!'));

  // Place the Drupal message on top of the page content.
  // Modification of the Render Array is a very powerfull way to move pieces of
  // content arround the page.
  if ($variables['messages']) {
    array_unshift($variables['page']['content'], array(
      'messages' => array(
        '#markup' => $variables['messages'],
      ),
    ));
  }
}

/**
 * Implements hook_preprocess_html().
 *
 * Override or insert variables into the html template.
 */
function base2013_preprocess_html(&$variables) {
  // $head_title is the variable in html.tpl.php which defines the title of the
  // document, the value of the <title> tag.
  $variables['head_title'] = implode(' - ', $variables['head_title_array']);

  // Add JS and CSS for this theme.
  // Note that unconditional JavaScript and CSS will be loaded on every page.
  // Unconditional CSS and JS is often added using the theme's .info file, but
  // adding it an a preprocess gives more flexibility.
  drupal_add_css('http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Playfair+Display:400italic', array('group' => CSS_THEME, 'preprocess' => FALSE));

  // Add conditional CSS for IE6.
  drupal_add_js('http://html5shiv.googlecode.com/svn/trunk/html5.js', array('group' => JS_THEME, 'browsers' => array('IE' => 'lt IE 9', '!IE' => FALSE), 'preprocess' => FALSE));

  drupal_add_js(path_to_theme() . '/js/foundation.min.js', array('scope' => 'footer'));
  drupal_add_js(path_to_theme() . '/js/app.js', array('scope' => 'footer', 'weight' => 100));
}

/**
 * Implements hook_preprocess_region().
 *
 * Override or insert variables into the region template.
 */
function base2013_preprocess_region(&$variables) {

  // Set the HTML tag for the region wrapper.
  // The $region_tag variable is used in region.tpl.php. The template has been
  // customized and added to the templates folder.
  switch ($variables['region']) {
    case 'navigation':
      $variables['region_tag'] = 'nav';
      break;

    case 'footer':
      $variables['region_tag'] = 'footer';
      break;

    default:
      $variables['region_tag'] = 'section';
      break;
  }
}

/**
 * Implements hook_preprocess_node().
 *
 * Override or insert variables into the node template.
 */
function base2013_preprocess_node(&$variables) {
  if (!$variables['page']) {
    $variables['classes_array'][] = 'six';
    $variables['classes_array'][] = 'columns';
  }
}

/**
 * Implements hook_preprocess_block().
 *
 * Override or insert variables into the block template.
 */
function base2013_preprocess_block(&$variables) {
  // Add a css class to every block.
  // By using unset() existing classes can be removed from this array too.
  $variables['classes_array'][] = 'beer';
}

/**
 * Implements hook_preprocess_links().
 *
 * Override or insert variables into the links theme function.
 */
function base2013_preprocess_links(&$variables) {
  // Set CSS classes of the "read more" link in node teasers.
  // Note that any existing classes are ignored here and replaced with our own.
  if (isset($variables['links']['node-readmore'])) {
    $variables['links']['node-readmore']['attributes']['class'] = array('button', 'secondary', 'small', 'radius');
  }
}

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
/**
 * Theme override WITH theme hook suggestion for theme_menu_tree().
 */
function base2013_menu_tree__menu_base2013_social_menu($variables) {
  // Wrap the social menu in a <div> to add the required classes.
  return '<div class="twelve columns footer">' . $variables['tree'] . '</div>';
}

/**
 * Theme override WITH theme hook suggestion for theme_menu_link().
 */
function base2013_menu_link__menu_base2013_social_menu($variables) {
  // Override the menu links to add class and title.
  $element = $variables['element'];
  $element['#localized_options']['attributes']['class'] = array('lsf-icon');
  $element['#localized_options']['attributes']['title'] = strtolower($element['#title']);
  return l($element['#title'], $element['#href'], $element['#localized_options']);
}
