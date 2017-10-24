<?php

/**
 * @file
 * Module configuration form with submit and validation handlers.
 */

/**
 * Page callback: Constructs the module settings form.
 *
 * Path q = admin/config/user-interface/feedback-collect.
 *
 * @see feedback_collect_variables_form_validate()
 * @see feedback_collect_variables_form_submit()
 *
 * @ingroup forms
 */
function feedback_collect_variables_form($form, &$form_state) {
  $settings = feedback_collect_get_default_settings();

  $form['cont'] = array(
    '#type' => 'container',
    '#attributes' => array('class' => array('config-fieldset-wrapper')),
  );

  $form['cont']['email'] = array(
    '#type' => 'textarea',
    '#title' => t("Administrator email"),
    '#description' => t("Enter comma separated email addresses of users who should receive notifications when new feedback is submitted. If empty, no notification mails will be sent."),
    '#default_value' => $settings['email'],
    '#rows' => 2,
  );

  $form['cont']['anonymous'] = array(
    '#type' => 'checkbox',
    '#title' => t("Allow anonymous submissions"),
    '#description' => t("Users will be able to submit anonymous feedback. Their email addresses will not be saved."),
    '#default_value' => $settings['anonymous'],
  );

  $form['cont']['exclude'] = array(
    '#type' => 'textarea',
    '#title' => t("Exclude paths"),
    '#description' => t("Enter paths on which the 'Collect Feedback' button should not appear, each in a separate row, without punctuation. <pre> <br>admin/*<br>node/*/edit<br>node/*/delete<br>front</pre>"),
    '#default_value' => $settings['exclude'],
  );

  $form['cont']['button_text'] = array(
    '#type' => 'textfield',
    '#title' => t("Button text"),
    '#description' => t("Enter text that should appear on the 'Collect Feedback' button (button that opens feedback form)."),
    '#default_value' => $settings['button_text'],
    '#required' => TRUE,
  );

  $form['cont']['icon_support'] = array(
    '#type' => 'checkbox',
    '#title' => t("Icon support"),
    '#description' => t("Use icon on the 'Collect Feedback' button."),
    '#default_value' => $settings['icon_support'],
  );

  $form['cont']['icon_settings'] = array(
    '#type' => 'fieldset',
    '#title' => t("Icon settings"),
    '#states' => array(
      'visible' => array(
        ':input[name=icon_support]' => array('checked' => TRUE),
      ),
    ),
  );

  $form['cont']['icon_settings']['icon_classes'] = array(
    '#type' => 'textfield',
    '#title' => t("Icon classes"),
    '#description' => t("Enter required icon classes separated by spaces. <br> e.g. glyphicon glyphicon-comment"),
    '#default_value' => $settings['icon_classes'],
  );

  $form['cont']['icon_settings']['hide_text'] = array(
    '#type' => 'checkbox',
    '#title' => t("Hide button text?"),
    '#description' => t("Show icon only."),
    '#default_value' => $settings['hide_text'],
  );

  $form['cont']['bootstrap_support'] = array(
    '#type' => 'checkbox',
    '#title' => t("Bootstrap support"),
    '#description' => t("Use Bootstrap button classes on 'Collect Feedback' button (btn and btn-primary). Trigger Bootstrap modal on low resolutions."),
    '#default_value' => $settings['bootstrap_support'],
  );

  $form['cont']['custom_css'] = array(
    '#type' => 'checkbox',
    '#title' => t("Use custom CSS"),
    '#description' => t("Allows you possibility not to use any styles and style the form and the button any way you want. Note: You MUST have fixed positioning on the element."),
    '#default_value' => $settings['custom_css'],
  );

  $form['cont']['reply_to'] = array(
    '#type' => 'checkbox',
    '#title' => t("Answer the reporter directly from the email"),
    '#description' => t("Allows you possibility to answer the reporter directly from the email by setting the Reply-To header with the reporter's email."),
    '#default_value' => $settings['reply_to'],
  );

  $form['cont']['position'] = array(
    '#type' => 'fieldset',
    '#title' => t("Button position"),
    '#states' => array(
      'visible' => array(
        ':input[name=custom_css]' => array('checked' => FALSE),
      ),
    ),
  );

  $form['cont']['position']['placement'] = array(
    '#title' => t("Choose placement of the button"),
    '#type' => 'select',
    '#options' => array(
      'top left',
      'top right',
      'bottom right',
      'bottom left',
    ),
    '#default_value' => $settings['placement'],
  );

  $form['cont']['position']['margin'] = array(
    '#type' => 'textfield',
    '#title' => t("Set number of pixels from the edge"),
    '#description' => t("e.g. 10px or 10px 20px (for instance, 10px from top, 20px from right)"),
    '#default_value' => $settings['margin'],
  );

  $form['actions'] = array('#type' => 'actions');
  $form['actions']['save'] = array(
    '#type'      => 'submit',
    '#value'     => t("Save"),
    '#validate'  => array('feedback_collect_variables_form_validate'),
    '#submit'    => array('feedback_collect_variables_form_submit'),
  );

  return $form;
}

/**
 * Form validation handler for feedback_collect_variables_form().
 *
 * @see feedback_collect_variables_form_submit()
 */
function feedback_collect_variables_form_validate($form, &$form_state) {
  $emails = $form_state['values']['email'];
  $email_array = explode(',', $emails);
  foreach ($email_array as $email) {
    $email = trim($email);
    if ($email != '' && filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
      $error_text = t('@email is not a valid email address', array('@email' => $email));
      form_set_error('email', $error_text);
    }
  }
}

/**
 * Form submission handler for feedback_collect_variables_form().
 *
 * @see feedback_collect_variables_form_validate()
 */
function feedback_collect_variables_form_submit($form, &$form_state) {
  $input = $form_state['values'];

  $excludes = !empty($input['exclude']) ? explode("\r\n", $input['exclude']) : FALSE;
  if ($excludes) {
    foreach ($excludes as &$exclude) {
      $exclude = trim($exclude);
    }
    $excludes = implode("\r\n", $excludes);
  }

  variable_set('feedback_collect_settings_email', $input['email']);
  variable_set('feedback_collect_settings_anonymous', $input['anonymous']);
  variable_set('feedback_collect_settings_exclude', $excludes);
  variable_set('feedback_collect_settings_button_text', $input['button_text']);
  variable_set('feedback_collect_settings_bootstrap_support', (!empty($input['bootstrap_support']) ? $input['bootstrap_support'] : FALSE));
  variable_set('feedback_collect_settings_custom_css', (!empty($input['custom_css']) ? $input['custom_css'] : FALSE));
  variable_set('feedback_collect_settings_placement', $input['placement']);
  variable_set('feedback_collect_settings_margin', (!empty($input['margin']) ? $input['margin'] : FALSE));
  variable_set('feedback_collect_settings_icon_support', (!empty($input['icon_support']) ? $input['icon_support'] : FALSE));
  variable_set('feedback_collect_settings_icon_classes', (!empty($input['icon_classes']) ? $input['icon_classes'] : FALSE));
  variable_set('feedback_collect_settings_hide_text', (!empty($input['hide_text']) ? $input['hide_text'] : FALSE));
  variable_set('feedback_collect_settings_reply_to', (!empty($input['reply_to']) ? $input['reply_to'] : FALSE));

  drupal_set_message(t("Settings saved successfully"));
}
