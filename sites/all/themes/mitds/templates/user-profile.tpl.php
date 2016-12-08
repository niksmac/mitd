<?php

/**
 * @file
 * Default theme implementation to present all user profile data.
 *
 * This template is used when viewing a registered member's profile page,
 * e.g., example.com/user/123. 123 being the users ID.
 *
 * Use render($user_profile) to print all profile items, or print a subset
 * such as render($user_profile['user_picture']). Always call
 * render($user_profile) at the end in order to print all remaining items. If
 * the item is a category, it will contain all its profile items. By default,
 * $user_profile['summary'] is provided, which contains data on the user's
 * history. Other data can be included by modules. $user_profile['user_picture']
 * is available for showing the account picture.
 *
 * Available variables:
 *   - $user_profile: An array of profile items. Use render() to print them.
 *   - Field variables: for each field instance attached to the user a
 *     corresponding variable is defined; e.g., $account->field_example has a
 *     variable $field_example defined. When needing to access a field's raw
 *     values, developers/themers are strongly encouraged to use these
 *     variables. Otherwise they will have to explicitly specify the desired
 *     field language, e.g. $account->field_example['en'], thus overriding any
 *     language negotiation rule that was previously applied.
 *
 * @see user-profile-category.tpl.php
 *   Where the html is handled for the group.
 * @see user-profile-item.tpl.php
 *   Where the html is handled for each item in the group.
 * @see template_preprocess_user_profile()
 *
 * @ingroup themeable
 */
?>
<div class="profile"<?php print $attributes; ?>>    
 <div class="row about-me mar-top20">  
  <div class="col-md-2">     
    <?php print render($user_profile['field_company_logo']); ?>
    <?php if(arg(1) == $user->uid) { ?>
      <a href="<?php echo url("user/".$user->uid."/edit"); ?>" class="btn btn-info btn-sm btn-block edit-btn">Edit</a>
      <?php } ?>

  </div>
  
  <div class="col-md-10">
    <?php print render($user_profile['field_overview']); ?>        
  </div>

</div>

  <div class="row">
  	<div class="col-md-8">
  		<div class="sidebar">
            <h5 class="main-title">Product And Services</h5>
            <div class="sidebar-information">
                <div class="single-category">

                    <?php print render($user_profile['field_industry']); ?>
                    <?php print render($user_profile['field_hardware_technology']); ?>
                    <?php print render($user_profile['field_differentiator']); ?>
                    <?php print render($user_profile['field_industry_sector']); ?>
                </div>
            </div>
        </div>        
        <div class="sidebar">
            <h5 class="main-title">Details</h5>
            <div class="sidebar-information">
                <div class="single-category">
                    <div class="row about-me">
                     <div class="col-md-2">
                            <?php print render($user_profile['field_picture']); ?>
                        </div>                        
                        <div class="col-md-10">
                          <h6 class="title col-xs-4">Name</h6>
                          <span class="subtitle col-xs-6">
                            <?php echo $user_profile['field_first_name']['#object']->field_first_name['und'][0]['value']." ".$user_profile['field_last_name']['#object']->field_last_name['und'][0]['value'] ;?>
                            
                          </span>                           
                            <span class="subtitle col-xs-10">
                              <?php print render($user_profile['field_designation']); ?>
                            </span>

                            <?php 
                              $subscription_type = _display_subscription($user->uid); 
                              if(isset($user->roles[6])) {
                            ?>
                            <h6 class="title col-xs-4">Subscription Type</h6>
                            <span class="subtitle col-xs-6">
                              <?php echo $subscription_type;?>
                            </span>
                              <?php } ?>

                        </div> 
                        
                    </div>
                </div>
            </div>
        </div>

        <?php print views_embed_view('proposals','block_1'); ?>

  	</div>

    <div class="col-md-4">
        <div class="sidebar">
            <h5 class="main-title">Professional Details</h5>
            <div class="sidebar-information">

                <div class="single-category">
                                        
                    <?php print render($user_profile['field_organization_name']); ?>

                    <?php print render($user_profile['field_phone_number']); ?>

                    <?php print render($user_profile['field_year_of_incorporation']);?>

                    <?php print render($user_profile['field_partner_type']);?>

                    <?php print render($user_profile['field_partner_type_of_project']);?>

                    <?php print render($user_profile['field_geography_of_operation']);?>

                    <?php print render($user_profile['field_partner_revenue']);?>

                    <?php print render($user_profile['field_part_quality_certification']);?>

                    <?php print render($user_profile['field_total_head_count']);?>

                    <?php print render($user_profile['field_preferred_technology']);?>

                    <?php print render($user_profile['field_preferred_partner_location']);?>

                    <?php print render($user_profile['field_preferred_services_buying_']);?>

                    <?php print render($user_profile['field_it_budget']);?>

                </div>
            </div>
        </div>
      </div>

  </div>
</div>
