<?php
/**
 * @file
 * wizzlern_frontend_dtd4.features.menu_links.inc
 */

/**
 * Implements hook_menu_default_menu_links().
 */
function wizzlern_frontend_dtd4_menu_default_menu_links() {
  $menu_links = array();

  // Exported menu link: main-menu_columns:columns
  $menu_links['main-menu_columns:columns'] = array(
    'menu_name' => 'main-menu',
    'link_path' => 'columns',
    'router_path' => 'columns',
    'link_title' => 'Columns',
    'options' => array(
      'attributes' => array(
        'title' => '',
      ),
      'identifier' => 'main-menu_columns:columns',
    ),
    'module' => 'menu',
    'hidden' => 0,
    'external' => 0,
    'has_children' => 0,
    'expanded' => 0,
    'weight' => 20,
    'customized' => 1,
  );
  // Translatables
  // Included for use with string extractors like potx.
  t('Columns');


  return $menu_links;
}
