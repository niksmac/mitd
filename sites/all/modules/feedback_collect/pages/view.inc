<?php

/**
 * @file
 * File view.inc.
 *
 * Listing all the content of type feedback_collect.
 */

/**
 * Page callback: Displays a list of feedback_collect content.
 *
 * Path q = feedback-collect.
 *
 * @return array
 *   A render array for a page containing a list of content.
 *
 * @see feedback_collect_menu()
 */
function feedback_collect_page() {
  $content = array();

  $header = array(
    'id' => array(
      'data' => t('ID'),
      'field' => 'n.nid',
    ),
    'name' => array(
      'data' => t('Feedback excerpt'),
      'field' => 'n.title',
    ),
    'page' => array(
      'data' => t('Feedback origin'),
    ),
    'submitted' => array(
      'data' => t('Time submitted'),
      'field' => 'n.created',
      'sort' => 'desc',
    ),
    'email' => array(
      'data' => t('Email'),
    ),
  );

  $data = feedback_collect_query($header);
  $nodes = node_load_multiple($data);

  $rows = array();
  foreach ($nodes as $node) {
    $page = feedback_collect_get_page($node);
    $mail = feedback_collect_get_user_mail($node);
    $rows[] = array(
      l($node->nid, drupal_get_path_alias('node/' . $node->nid)),
      $node->title,
      $page,
      date('j M Y, H:i', $node->created),
      $mail,
    );
  }

  $content['table'] = array(
    '#theme' => 'table',
    '#header' => $header,
    '#rows' => $rows,
    '#empty' => t('There is no feedback available'),
  );

  $content['pager'] = array(
    '#theme' => 'pager',
  );

  return $content;
}

/**
 * Helper function for retrieving query result.
 *
 * @param array $header
 *   Drupal header array.
 *
 * @return array
 *   Returns node keys to be used in loading nodes.
 */
function feedback_collect_query(array $header) {
  $query = db_select('node', 'n');
  $query = $query->extend('TableSort');
  $query->fields('n', array('nid', 'title', 'created'))
    ->distinct()
    ->condition('n.type', 'feedback_collect');

  $query->orderByHeader($header);
  $query = $query->extend('PagerDefault');
  $query->limit(10);
  $query->orderBy('n.nid');

  $results = $query->execute()->fetchAllAssoc('nid');
  return array_keys($results);
}

/**
 * Returns information about the user who has submitted the feedback.
 *
 * @param object $node
 *   Drupal node object.
 *
 * @return string
 *   Returns user email or 'anonymous' string.
 */
function feedback_collect_get_user_mail($node) {
  if (isset($node->field_fc_email) &&
    !empty($node->field_fc_email[$node->language])) {
    return $node->field_fc_email[$node->language][0]['value'];
  }
  else {
    if ($node->uid) {
      $the_user = user_load($node->uid);
      if ($the_user) {
        return $the_user->mail;
      }
    }
  }
  return t('anonymous');
}

/**
 * Returns link to page from which the feedback was submitted.
 *
 * @param object $node
 *   Drupal node object.
 *
 * @return string
 *   Returns HTML markup for passed node object.
 *
 * @see feedback_collect_generate_url()
 */
function feedback_collect_get_page($node) {
  $page = ((isset($node->field_fc_feedback_origin) && !empty($node->field_fc_feedback_origin[$node->language])) ? $node->field_fc_feedback_origin[$node->language][0]['value'] : '');
  return feedback_collect_generate_url($page);
}
