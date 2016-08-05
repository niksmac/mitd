<?php
/**
 * @file
 * The primary PHP file for this theme.
 */

function mitds_process_page(&$variables) {
  if (!empty($variables['page']['sidebar_first']) && !empty($variables['page']['sidebar_second'])) {
    $variables['page_class'] = 'col-md-6';
  }

  elseif (!empty($variables['page']['sidebar_first'])) {
    $variables['page_class'] = 'col-md-9';
  }
  elseif (!empty($variables['page']['sidebar_second'])) {
    $variables['page_class'] = 'col-md-9';
  }
  else {
    $variables['page_class'] = 'col-md-12';
  }
}


/**
 * Implements hook_preprocess_page().
 */
function mitds_preprocess_page(&$variables) {


global $user;

if (arg(0) == "user" && is_numeric(arg(1)) && arg(1) == $user->uid){
  $variables['theme_hook_suggestions'][] =  'page__dash';
}

$variables['full_name'] = "";
$variables['designation'] =  "";
if (isset($variables['user'])) {
  $user_data = $variables['user'];
  $user_data = user_load($user_data->uid);

  $variables['full_name'] =  $user_data->field_first_name['und'][0]['value']." ".$user_data->field_last_name['und'][0]['value'];
  $variables['designation'] = !empty($user_data->field_designation) ? $user_data->field_designation['und'][0]['value'] : "";
}
}

/**
 * Implements hook_menu_alter().
 */
function mitds_menu_alter(&$items) {
  $items['messages/view/%privatemsg_thread']['type'] = MENU_CALLBACK;
}

/**
 * Implements hook_menu_link_alter().
 */
function mitds_menu_link_alter(&$link) {

  if ($link['link_title'] == 'messages/view/%privatemsg_thread') {

    $link['options']['alter'] = TRUE;
  }
}
