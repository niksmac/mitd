/**
 * @file Javascript for feedbackCollect module.
 */

(function($) {
  "use strict";

  // Define variable for checking whether form is open or not (makes it easier to check for future features).
  var formOpen = false;

  // Check if cookies are enabled.
  var cookiesSupported = (typeof $.cookie !== 'undefined');

  // Define timeout variable.
  var fcCloseFormTimeout;

  // Class to add in case we're using standard behavior.
  var tabbedClass = 'feedbackCollect-tabbed';

  // Classes to use in case form is opened within bootstrap modal.
  var modalClasses = 'modal feedbackCollect-bs-modal';

  // Form container, used for binding behaviors.
  var $feedbackCollectFormCont;

  /**
   * Close Form helper function.
   *
   * @param {jQuery} $wrapper
   *   jQuery wrapper element that contains feedbackCollect form
   * @param {jQuery} $button
   *   jQuery button element that contains trigger button
   * @param {boolean} delay
   *   jQuery button element that contains trigger button
   *
   * @todo Check why this is being called twice (bind after form close on a closed form).
   */
  function fcCloseForm($wrapper, $button, delay) {
    var timeout = 0;

    if (typeof delay !== 'undefined' && delay) {
      // Set delay for closing form.
      timeout = 2000;
    }

    // Always clear timeout, in case user clicks on closing the form while it's still in setTimeout function.
    clearTimeout(fcCloseFormTimeout);

    fcCloseFormTimeout = setTimeout(function() {
      if ($wrapper.hasClass(tabbedClass)) {
        $wrapper.html('');
      }
      else {
        $wrapper.modal('hide').html('');
      }

      $button.removeClass('active ajax-processed');
      Drupal.attachBehaviors('#' + $button.attr('id'));

      formOpen = false;
    }, timeout);
  }

  /**
   * In case user confirmed prepopulation of feedback, retrieve what's saved from the cookie.
   *
   * @param {jQuery} $wrapper
   *   jQuery wrapper element that contains feedbackCollect form
   * @param {Object} session
   *   Previous form value from server session
   * @param {Object} formCookie
   *   Previous form value from browser cookie
   *
   * @see jQuery.cookie
   */
  function fcPrepopulateForm($wrapper, session, formCookie) {
    var readFrom = session ? session : formCookie;
    if (typeof readFrom !== 'string' && readFrom) {
      $.each(readFrom, function(key, value) {
        if (key != 'field_fc_anonymous') {
          $wrapper.find('[name^=' + key + ']').val(value);
        }
        else {
          $wrapper.find('[name^=' + key + ']').attr('checked', value).trigger('change');
        }
      });

      if (cookiesSupported) {
        // Remove cookie.
        $.cookie('feedbackCollect_form', null, { expires: 7, path: '/' });
      }
    }
  }

  /**
   * Get form cookie.
   *
   * @return {Object|false}
   *   Either cookie object or false if doesn't exist
   *
   * @see jQuery.cookie
   */
  function fcGetFormCookie() {
    if (cookiesSupported) {
      if (typeof $.cookie('feedbackCollect_form') != 'undefined') {
        return $.cookie('feedbackCollect_form');
      }
    }

    return false;
  }

  /**
   * Saves form cookie to prepopulate the form for next time it loads.
   *
   * @param {jQuery} $wrapper
   *   jQuery wrapper element that contains feedbackCollect form
   * @param {undefined|boolean} skipCheck
   *   Indicates whether checks should be skipped, if caller already checked
   */
  function fcSetFormCookie($wrapper, skipCheck) {
    if (typeof skipCheck === 'undefined') {
      skipCheck = false;
    }

    // Only save the cookie if there was something in description.
    if (skipCheck || $wrapper.find('textarea[name^=field_fc_description]').length) {
      if (skipCheck || $wrapper.find('textarea[name^=field_fc_description]').val().length > 3) {
        // Set browser cookie.
        var $form = $wrapper.find('form');

        var formData = {
          field_fc_feedback_origin: $form.find('input[name^=field_fc_feedback_origin]').val(),
          field_fc_description: $form.find('textarea[name^=field_fc_description]').val(),
          field_fc_email: $form.find('input[name^=field_fc_email]').val()
        };

        // Only when users are logged in there is this field.
        if ($form.find('input[name^=field_fc_anonymous]').length) {
          formData.field_fc_anonymous = $form.find('input[name^=field_fc_anonymous]').is(':checked');
        }
        else {
          formData.field_fc_anonymous = true;
        }

        if (cookiesSupported) {
          // Save cookie across site.
          var cookieFormData = JSON.stringify(formData);
          $.cookie('feedbackCollect_form', cookieFormData, { expires: 7, path: '/' });
        }

        // Send to server side.
        $.get(Drupal.settings.basePath + 'feedback-collect/save-feedback', formData, function(data) {
          if (data) {
            if (cookiesSupported) {
              // Remove cookie.
              $.cookie('feedbackCollect_form', null, { expires: 7, path: '/' });
            }
          }
        }, 'json');
      }
    }
  }

  /**
   * Helper function for retrieving viewport sizes, used to check whether to open bootstrap modal window.
   *
   * @return {{width: *, height: *}}
   *   Returns width and height of the document in pixels.
   */
  function fcViewport() {
    var e = window, a = 'inner';
    if (!('innerWidth' in window)) {
      a = 'client';
      e = document.documentElement || document.body;
    }
    return { width : e[ a + 'Width' ] , height : e[ a + 'Height' ] };
  }

  /**
   * Attaches feedbackCollect's max heights.
   *
   * @property {function} attach
   *   Set attachment container's and form's height
   */
  Drupal.behaviors.feedbackCollectSetMaxHeights = {
    attach: function(context, settings) {
      if (typeof $feedbackCollectFormCont === 'undefined') {
        $feedbackCollectFormCont = $('#feedbackCollect-form-container');
      }

      // Set attachment container's height.
      // @todo: name instead of id.
      $feedbackCollectFormCont.find('table[id^=edit-field-fc-attachment]').once('attachment-height', function() {
        var $table           = $(this);
        var attachmentNumber = $table.find('tbody tr').length;
        var $tableWrapper    = $('<div class="feedbackCollect-attachment-table-wrapper"></div>');

        if (attachmentNumber > 4) {
          var wrapperHeight = + $table.find('thead').outerHeight() + $table.find('tbody tr:first').outerHeight() * 4;

          $tableWrapper.css({
            'overflow': 'auto',
            'max-height': wrapperHeight + 'px'
          });
        }
        $table.wrap($tableWrapper);
      });
    }
  };

  /**
   * Attaches browser info behaviors.
   *
   * @property {function} attach
   *   Sets browser info from ua-parser library
   *
   * @see UAParser
   */
  Drupal.behaviors.feedbackCollectBrowserInfo = {
    attach: function(context, settings) {
      if (typeof $feedbackCollectFormCont === 'undefined') {
        $feedbackCollectFormCont = $('#feedbackCollect-form-container');
      }

      $feedbackCollectFormCont.find('textarea[name^=field_fc_browser_info]').once('browser-info', function() {
        if (typeof UAParser !== 'undefined') {
          var parser = new UAParser();
          var browserInfo = parser.getResult();

          // Make sure that object has properties before it attempts to delete them (future proof for library update).
          if (browserInfo.hasOwnProperty('cpu')) {
            delete browserInfo.cpu;
          }
          if (browserInfo.hasOwnProperty('ua')) {
            delete browserInfo.ua;
          }

          $(this).val(JSON.stringify(browserInfo));
        }
        else {
          // UserAgent is always a string, no need to convert to JSON.
          $(this).val(((window && window.navigator && window.navigator.userAgent) ? window.navigator.userAgent : ''));
        }
      });
    }
  };

  /**
   * Attaches saving form data on website leave.
   *
   * @property {function} attach
   *   Sets cookie and session if description is filled out
   */
  Drupal.behaviors.feedbackCollectSaveFormOnLeave = {
    attach: function(context, settings) {
      // Bind it only once on body.
      $('body').once('fc-save-form-session', function() {
        $(window).bind('beforeunload', function(e) {
          if (formOpen) {
            var $description = $('textarea[name^=field_fc_description]');
            if ($description.length && $description.val().length > 3) {
              // Required for old jQuery versions that don't support $.ajax function.
              $.ajaxSetup({async:false});

              fcSetFormCookie($feedbackCollectFormCont, true);
            }
          }

          // Required to set event to null to prevent popup opening on Firefox.
          e = null;
        });
      });
    }
  };

  /**
   * Open Feedback form, used on ajax callbacks.
   */
  Drupal.ajax.prototype.commands.feedbackCollectOpenForm = function(ajax, response, status) {
    var wrapperId = Drupal.settings.feedbackCollect.elements.wrapper;
    var $wrapper = $(wrapperId);
    var buttonId = Drupal.settings.feedbackCollect.elements.button;
    var $button = $(buttonId);
    var bootstrapSupport = response.bootstrapSupport && (typeof $().modal === 'function');
    var content = response.content;
    var viewport = fcViewport();
    var useBootstrapModal = bootstrapSupport && (viewport.width <= 768 || viewport.height <= 768);

    if ($wrapper.is('.modal') && !useBootstrapModal) {
      // Reset modal so tabbed form can be loaded properly.
      $wrapper
        .removeClass(modalClasses)
        .attr('role', '');
    }
    else if ($wrapper.hasClass(tabbedClass) && useBootstrapModal) {
      // Reset tabbed wrapper so modal can be loaded properly.
      $wrapper
        .removeClass(tabbedClass)
        .attr('style', '');
    }

    if (useBootstrapModal) {
      content = '<div class="modal-dialog"><div class="modal-content"><div class="modal-body">' + content + '</div></div></div>';
      $wrapper.addClass(modalClasses)
        .attr('role', 'dialog')
        .html(content)
        .modal('show');

      Drupal.settings.feedbackCollect.wrapperCopy = '';

      $wrapper.bind('hidden.bs.modal', function(e) {
        // Clone wrapper so we can use it in modal backdrop click.
        // Set manually value to preserve textarea value user added.
        var $wrapperCopy = $($wrapper[0].outerHTML);
        var descriptionSelector = 'textarea[name^=field_fc_description]';

        $wrapperCopy.find(descriptionSelector).val($wrapper.find(descriptionSelector).val());
        Drupal.settings.feedbackCollect.wrapperCopy = $wrapperCopy;
        fcCloseForm($wrapper, $button);

        // Prevent event bubbling.
        $(this).unbind(e);
      });

      $wrapper.find('.modal-backdrop').bind('click', function(e) {
        fcSetFormCookie(Drupal.settings.feedbackCollect.wrapperCopy);
        Drupal.settings.feedbackCollect.wrapperCopy = '';
        $(this).unbind(e);
      });
    }
    else {
      $wrapper.hide().html(content)
        .addClass(tabbedClass);

      $wrapper.feedbackCollectPositionForm();
    }

    // Prepopulate the form with browser-cookie data.
    var session = (typeof Drupal.settings.feedbackCollect.formData !== 'undefined' && Drupal.settings.feedbackCollect.formData) ?
      Drupal.settings.feedbackCollect.formData : false;
    var formCookie = fcGetFormCookie();

    if ((typeof session !== 'string' && session) || (typeof formCookie !== 'string' && formCookie)) {
      var message = Drupal.t('Retrieve your unsent feedback? ');
      var $alert = $('<div></div>').attr({
        'class': 'alert alert-block alert-info'
      });

      var $confirm = $('<input>').attr({
        'type': 'button',
        'class': 'feedbackCollect-confirm-retrieve form-submit ' + (bootstrapSupport ? 'btn btn-xs btn-primary' : 'button'),
        'style': 'margin-right: 5px;'
      }).val('Retrieve it');

      $confirm.bind('click', function(e) {
        fcPrepopulateForm($wrapper, session, formCookie);
        $(this).closest('.alert').remove();
        $wrapper.find(':input:visible:first').focus();
      });

      var $close = $('<a></a>').attr({
        'class': 'close',
        'data-dismiss': 'alert',
        'href': '#'
      }).text('×');

      $alert.append($close)
        .append(message)
        .append($confirm);

      $wrapper.find('form').before($alert);
    }

    formOpen = true;

    // Unbind event and remove ajax-processed class to indicate drupal to bind it again after closing the form.
    $button
      .unbind('click')
      .addClass('active')
      .click(function(e) {
        e.preventDefault();
        $(this).unbind('click');

        if (formOpen) {
          fcSetFormCookie($wrapper);
          fcCloseForm($wrapper, $button);
        }
      });

    // Re-attach behaviors to module's contexts after loading new form.
    Drupal.attachBehaviors(wrapperId + ', ' + buttonId);
  };

  /**
   * Close feedbackCollect form and remove cookie.
   *
   * @see fcCloseForm
   * @see jQuery.cookie
   */
  Drupal.ajax.prototype.commands.feedbackCollectCloseForm = function(ajax, response, status) {
    var $wrapper = $(Drupal.settings.feedbackCollect.elements.wrapper);
    var $button = $(Drupal.settings.feedbackCollect.elements.button);
    var deleteCookie = response.deleteCookie;

    if (deleteCookie) {
      if (cookiesSupported) {
        // Remove cookie.
        $.cookie('feedbackCollect_form', null, { expires: 7, path: '/' });
      }
    }

    fcCloseForm($wrapper, $button);
  };

  /**
   * Delay close form when feedback is successfully submitted.
   */
  Drupal.ajax.prototype.commands.feedbackCollectDelayClose = function(ajax, response, status) {
    var $wrapper = $(Drupal.settings.feedbackCollect.elements.wrapper);
    var $button = $(Drupal.settings.feedbackCollect.elements.button);

    fcCloseForm($wrapper, $button, true);
  };

  /**
   * Feedback Collect's jQuery plugin for positioning form element.
   *
   * @see getBoundingClientRect
   */
  $.fn.feedbackCollectPositionForm = function() {
    var $wrapper = $(this);
    var $button = $(Drupal.settings.feedbackCollect.elements.button);
    var $buttonWrapper = $button.parent();
    var btnPosition = $buttonWrapper.css('position') == 'fixed' ? $buttonWrapper[0].getBoundingClientRect() : false;

    // Reset style attribute on init of the wrapper.
    $wrapper.attr('style', '');

    var cornerPosition = false;
    var btnDimensions, viewport, windowSize, cssProp;
    var xPositionCheck, xPositionPercentage, yPositionCheck, yPositionPercentage, xDirection, yDirection, xProp, yProp;
    if (btnPosition) {
      // Fixed button position, open it according to where it actually is in context to browser's width and height.
      // Set CSS to absolute with top and left positioning so it doesn't change viewport sizes for inconcistensies.
      $wrapper.css({
        position: 'absolute',
        top: 0,
        left: 0
      });

      btnDimensions = {
        width: $button.outerWidth(),
        height: $button.outerHeight()
      };
      viewport = fcViewport();
      windowSize = {
        width: $(window).width(),
        height: $(window).height()
      };

      xPositionCheck = (viewport.width - (btnPosition.left + btnDimensions.width));
      xPositionPercentage = 100 - (xPositionCheck * 100 / viewport.width);
      if (xPositionPercentage > 50) {
        xDirection = 'left';
      }
      else {
        xDirection = 'right';
      }

      yPositionCheck = (viewport.height - (btnPosition.top + btnDimensions.height));
      yPositionPercentage = 100 - (yPositionCheck * 100 / viewport.height);
      if (yPositionPercentage > 50) {
        yDirection = 'above';
      }
      else {
        yDirection = 'below';
      }

      cssProp = {};
      cssProp.position = 'fixed';

      // Set form position to mimic button's position.
      // Alter the position depending on where the button is compared to the viewport (in percentages).
      if (yDirection == 'above') {
        cssProp.top = 'auto';
        // Copy bottom position from button.
        cssProp.bottom = windowSize.height - btnPosition.bottom;
        yProp = 'bottom';
      }
      else {
        // Copy top position from button.
        cssProp.top = btnPosition.top;
        cssProp.bottom = 'auto';
        yProp = 'top';
      }

      if (xDirection == 'left') {
        cssProp.left = 'auto';
        // Copy right position from button.
        cssProp.right = windowSize.width - btnPosition.right;
        xProp = 'right';
      }
      else {
        // Copy left position from button.
        cssProp.left = btnPosition.left;
        cssProp.right = 'auto';
        xProp = 'left';
      }

      if (xPositionPercentage >= 80 || xPositionPercentage <= 20) {
        if (yPositionPercentage >= 80 || yPositionPercentage <= 20) {
          cssProp[yProp] += (btnDimensions.height + 10);
          cornerPosition = true;
        }
      }

      // If button isn't within defined corners, logically add it closest to corners if it can fit in them.
      // Take in consideration form's width.
      if (!cornerPosition) {
        // One of those, or both, have to pass. Those that don't, don't need adjustments.
        if (xPositionPercentage < 80 && xPositionPercentage > 20) {
          // Horizontally in-between, position form's X axis to center above/below the button.
          cssProp[xProp] -= ($wrapper.outerWidth() / 2 - btnDimensions.width / 2);
          cssProp[yProp] += btnDimensions.height + 10;
        }
        if (yPositionPercentage < 80 && yPositionPercentage > 20) {
          // Vertically in-between, position form's Y axis to center left/right of the button.
          cssProp[xProp] += btnPosition.width + 10;
          cssProp[yProp] -= ($wrapper.outerHeight() / 2 - btnDimensions.height / 2);
        }

        // @todo bind event on attach init of the dragdropfile plugin to move form 50% from dropzone, or reinit again.
      }

      $wrapper.css(cssProp);

      // Check if form is fully visible and reposition it to browser chosen edge if it's not.
      var wrapperPosition = $wrapper[0].getBoundingClientRect();
      var passedChecks = true;
      // Checks for fit the Y axis.
      if (wrapperPosition.bottom >= windowSize.height) {
        cssProp[yProp] += ((wrapperPosition.bottom - windowSize.height) * 1.3);
        passedChecks = false;
      }
      else if (wrapperPosition.top < 0) {
        cssProp[yProp] = 30;
        passedChecks = false;
      }

      // Checks for fit on X axis.
      if (wrapperPosition.left < 0) {
        cssProp[xProp] = 30;
        passedChecks = false;
      }
      else if (wrapperPosition.right >= windowSize.width) {
        cssProp[xProp] += ((wrapperPosition.right - windowSize.width) * 1.3);
        passedChecks = false;
      }

      if (!passedChecks) {
        $wrapper.css(cssProp);
      }
    }
    else {
      // Relative/static button position, render the form just below the button and let theme worry about form styling.
      // @todo Maybe do a default behavior that always load it in the middle of the screen? Or some corner?
    }

    $wrapper.show();
  }
})(jQuery);
