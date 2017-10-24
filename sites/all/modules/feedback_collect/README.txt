FEEDBACK COLLECT
----------------


CONTENTS OF THIS FILE
---------------------
   
 * Introduction
 * Requirements
 * Recommended modules
 * Installation
 * Configuration
 * Troubleshooting
 * Maintainers


INTRODUCTION
------------

The Feedback Collect module allows site builders to add feedback forms to their sites
 and gather end user feedback, bug reports or any kind of suggestions.
It is highly customizable.


REQUIREMENTS
------------

This module requires the following modules:
 * Features (https://www.drupal.org/project/features)
 * Libraries (https://www.drupal.org/project/libraries)

The following libraries are recommended in order to make the best of the module:

  * ua-parser (https://github.com/faisalman/ua-parser-js)
    - It is used to retrieve and parse browser info from which user has submitted feedback.


RECOMMENDED MODULES
-------------------

 * HTML5 Drag & Drop File (https://www.drupal.org/project/dragdropfile):
   When enabled, attachments can be added to feedback by dragging file and dropping it to the form, which makes it more user friendly.


INSTALLATION
------------

Install as you would normally install a contributed Drupal module. 
See: https://drupal.org/documentation/install/modules-themes/modules-7 for further information.

Download and install ua-parser libraries. See: https://www.drupal.org/node/1440066 for further information.

It is important that your file structure looks like: 

  - sites/all/libraries/ua_parser/src/ua-parser.js or profiles/your_profile/libraries/ua_parser/src/ua-parser.js. 


CONFIGURATION
-------------

 * Configure user permissions in Administration » People » Permissions:

   - Feedback: Create new content (Node module)
     If this permission is granted, users will be able to submit feedback.

   - View submitted feedback
     Access feedback content.


 * Customize the settings in Administration » Configuration and modules »
   User interface » Feedback Collect.


 * You may add the menu link to the feedback listing page in Administration » Structure » Menus.
   Menu link path is 'feedback-collect'.


TROUBLESHOOTING
---------------

 * If the "Collect Feedback" button does not display, check the following:

   - Check the button position in Administration » Configuration and modules » User interface » Feedback Collect.
     If "Use custom CSS" checkbox is checked, analyze your CSS to find where thebutton might be located.
   
   - Check the "Exclude paths" setting in Administration » Configuration and modules » User interface » Feedback Collect.

   - Is the "Feedback: Create new content" permission enabled for the appropriate roles?


 * If the menu link does not display, check the following:
   
   - Is the "View submitted feedback" permission enabled for the appropriate roles?


MAINTAINERS
-----------

Current maintainers:
 * Jelena Krmar (jelenakrmar) - https://www.drupal.org/user/3097287
 * Nikola Tucakovic (ntucakovic) - https://www.drupal.org/user/3222838

This project has been sponsored by:
 * Byteout Software
   Visit http://www.byteout.com/ for more information.
