<?php

/**
 * @file
 * File feedback_collect.features.inc.
 */

/**
 * Implements hook_node_info().
 */
function feedback_collect_node_info() {
  $items = array(
    'feedback_collect' => array(
      'name' => t('Feedback'),
      'base' => 'node_content',
      'description' => t('Allow users to provide quick feedback'),
      'has_title' => '0',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  drupal_alter('node_info', $items);
  return $items;
}
