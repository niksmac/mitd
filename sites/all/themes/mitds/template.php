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

  if (arg(0) == "user" && is_numeric(arg(1))){
    $variables['theme_hook_suggestions'][] =  'page__dash';
    if ($user->uid != arg(1)){
      $variables['tabs'] = array();
    }
    $user_data = user_load(arg(1));
    $variables['full_name'] =  !empty($user_data->field_first_name['und'][0]['value']) ? $user_data->field_first_name['und'][0]['value']." ".$user_data->field_last_name['und'][0]['value'] : "";
    $variables['designation'] = !empty($user_data->field_designation) ? $user_data->field_designation['und'][0]['value'] : "";
  }
}


/**
 * Implements hook_preprocess_html().
 */
function mitds_preprocess_html(&$variables) {
  if (arg(0) == "node" && arg(2) == "invite") {
    $node = node_load(arg(1));
    $variables['classes_array'][] = "node-".$node->type;
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

function mitds_form_comment_form_alter(&$form, &$form_state) {

  $form['wrapper']['#type'] = 'fieldset';
  $form['wrapper']['#title'] = 'Your Message';
  $form['wrapper']['#collapsible'] = FALSE;
  $form['wrapper']['author'] = $form['author'];
  unset($form['author']);

  //Comment
  $form['wrapper']['comment_body'] = $form['comment_body'];
  unset($form['comment_body']);
  
  $form['field_proposal_files']['#type'] = 'markup';
  $form['wrapper']['field_proposal_files'] = $form['field_proposal_files'];
  unset($form['field_proposal_files']);



  $form['actions']['submit']['#value'] = 'Send Message';
  $form['actions']['submit']['#attributes']['class'][] = 'btn-success mar-top10';

  $form['wrapper']['actions'] = $form['actions'];
  unset($form['actions']);


  $form['author']['homepage']['#access'] = FALSE;
  $form['author']['mail']['#required'] = TRUE;
}

function mitds_image_style($variables) {
  if ($variables['style_name'] == 'blog_teaser' ) {
     $variables['attributes'] = array(
        'class' => 'thumb',
      );
  }

  $dimensions = array(
    'width' => $variables['width'],
    'height' => $variables['height'],
  );

  image_style_transform_dimensions($variables['style_name'], $dimensions);

  $variables['width'] = $dimensions['width'];
  $variables['height'] = $dimensions['height'];


  // Determine the url for the styled image.
  $variables['path'] = image_style_url($variables['style_name'], $variables['path']);

  return theme('image', $variables);
}


function _mitds_access_invite(){
  return TRUE;
  $node = node_load(arg(1));
  if($node->type == "opportunity"){
    return TRUE;
  }
  return FALSE;
}

function mitds_preprocess_comment(&$vars) {
  
  $comment = $vars['comment'];
  $uri = entity_uri('comment', $comment);
  $uri['options'] += array('attributes' => array(
    'class' => 'permalink',
    'rel' => 'bookmark',
  ));
   $vars['permalink'] = l('#' . $vars['id'], $uri['path'], $uri['options']);
}
?>