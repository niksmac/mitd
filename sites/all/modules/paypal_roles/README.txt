CONTENTS OF THIS FILE
---------------------

 * Introduction
 * Requirements
 * Installation
 * How does it work? (Example)
 * What happens if an "Anonymous" user subscribes?
 * How does the module connect the user account with the PayPal account?
 * How can I customize account details of the new user?
 * How to test your PayPal integration with sandbox?
 * Troubleshooting
 * Maintainers

INTRODUCTION
------------

If you ever wanted to turn your Drupal site into a membership site, 
PayPal Roles is probably the best option for doing just that.

REQUIREMENTS
------------

This module requires the following modules:
 * Chaos tool suite (ctools)
 * Views (v3)
 * Better Exposed Filters
 * Date Popup

INSTALLATION
------------

Step 1. Create your Paypal Business Account

Step 2. Install PayPal Roles

Install PayPal Roles (paypal_roles) module as described here
https://drupal.org/documentation/install/modules-themes/modules-7

Step 3. Configure PayPal Roles

Goto PayPal Roles settings page, and set your Paypal (live and sandbox) email
address.

Step 4. Create user roles, and memberships

Create one, or multiple user roles, and assign specific privileges. Goto PayPal
Roles settings, and create a membership with a specify user role. For example:
"Access to premium contents".

Step 5. Place Subscription blocks

After a membership has been created, a block generates with details of your
membership, and with a subscribe now button.

HOW DOES IT WORK? (EXAMPLE)
---------------------------

Let's create two user roles with different rights:
 * "Premium" role (access to special nodes)
 * "File downloader" role (for downloading files)

Afterwards, let’s make the memberships for the created roles, for example:
 * "Premium" membership, $2 / month
 * "File downloader" membership, $5 one-time purchase

As the next step, we can put the generated block to our site. If a user
subscribes for "Premium" membership, than the "Premium" role will be added
to the users account. If the user subscribes for "File downloader" membership,
than the "File downloader" role will also be added to the user account. Over
time, if the user cancels the "Premium" membership, then the module withdraws
the "Premium" role from the user, when the payed time is expired. However,
the "File downloader" role remains, as it is a one-time purchase and has no
expiry date.

WHAT HAPPENS IF AN "ANONYMOUS" USER SUBSCRIBES?
-----------------------------------------------

When the visitor have chosen a membership and clicked on the appropriate button,
he/she is redirected to PayPal’s subscribe page, where he/she can confirm
his/her intention to subscribe.
When this is done, PayPal sends an IPN message to your site, which contains the
subscribers data. This message is processed by the PayPal Roles module. The
module tries to match the subscriber to an existing drupal user (this step is
important, as the user could have a user account, but forgets to login). If the
module can’t find a match, than a new user is created with the details from
PayPal (name, email), and an email message is sent notifying the user about the
account creation.

HOW DOES THE MODULE CONNECT THE USER ACCOUNT WITH THE PAYPAL ACCOUNT?
---------------------------------------------------------------------

PayPal assigns a unique id (payer_id and subscr_id) to every Paypal account, so
even if the user changes his/her email address, this value stayes the same. After
receiving the IPN message the module primarily tries to match the user by the
"subscr_id" and "payer_id" variables. If this fails, than the module tries to
match by the email received in the "custom" variable, but this variable doesn’t
exist, only if the subscriber has a drupal user account and is logged in. If the
subscriber is Anonymous and there is no User ID (uid) matching the received
"payer_id" or "subscr_id", this means probably a new user registration is
required, but to be sure, the module examines the existing users by the email
address received from PayPal. In every case, when a successful subscribe is
created, but there is no User ID (uid) matching PayPal payer ID (payer_id) or
subscriber ID (subscr_id), the module creates this connection, so in the future,
if the Drupal user or the PayPal user changes the email address, the transactions
can be safely matched to existing Drupal user.

HOW CAN I CUSTOMIZE ACCOUNT DETAILS OF THE NEW USER?
----------------------------------------------------

Users created by the PayPal Role module will have the following fields by default:
 * name (“first_name" and “last_name" values received from PayPal combined, however
   if user exists with the given name a numeric value is appended, just to make it
   unique.)
 * pass (randomized password generated by Drupal)
 * mail (“payer_email" value received from PayPal)

If these values doesn’t satisfy us, or more field is required during the registration
process, we can implement the hook_paypal_roles_user_data_alter(). Where as the
first parameter is "$account_data", which is a reference and contains the default
values for creating the new user, and the second parameter for the hook is "$rawipn",
which contains the full IPN message received from PayPal.

Additional hooks are available too, check documentation in the file:
"paypal_roles.api.php"

HOW TO TEST YOUR PAYPAL INTEGRATION WITH SANDBOX?
-------------------------------------------------

 * Written by Giorgos Kontopoulos - https://www.drupal.org/user/62448

In order to test your paypal integration with sandbox follow these steps:

 * this module is using classic api read more here
 * register with paypal.com and get verified but getting verified takes some time so
   you should already be registered long before starting testing
 * use your credentials from above to login to developer.paypal.com
 * go to dashboard > accounts (under sandbox heading)
 * create at least one USER and one BUSINESS (MERCHANT) sandbox accounts
 * emails don't have to real because mails are never send
 * setup this module to use the sandbox using the sandbox merchant email you created
   on step 5.
 * login to sandbox.paypal.com as USER or MERCHANT to see your balances
 * setup some membership levels and roles to accompany those levels
 * test membership using the sandbox USER - you should be redirected to the
   sandbox.paypal.com site and complete the subscription
 * the MERCHANT user might have to login to sandbox.paypal.com and accept the payment
   (if its not setup in the settings)
 * The USER will now have a new user account with the appropriate ROLE or his account
   will be update to include that ROLE
 * if all goes as planned you can just setup the LIVE account

TROUBLESHOOTING
---------------
You can always contact me at juhasz.sandor@lonalore.hu, if you have any
question or queries about the project. Please feel free to report any bug found.

If you need any support, or find any issues, please use the issue queue:
https://www.drupal.org/project/issues/paypal_roles

MAINTAINERS
-----------
Current maintainers:
 * Sándor Juhász (Lóna Lore) - https://drupal.org/user/1539304

This module is sponsored by: Jeney Repro Ltd.
