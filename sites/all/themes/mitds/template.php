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