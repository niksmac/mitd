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
 <div class="row about-me">
  <div class="col-md-2">
    <?php print render($user_profile['user_picture']); ?>
  </div>
  <div class="col-md-10">
    <?php print render($user_profile['field_overview']); ?>
  </div>
</div>

  <div class="row">
  	<div class="col-md-8">
  		<div class="sidebar">
            <h5 class="main-title">Skills</h5>
                <div class="job-skills">
                    <ul class="row">
                        <li class="col-sm-3">
                        	<h6><i class="fa fa-plus"></i> HTML5 and Css3</h6>
                        </li>
                        <li class="col-sm-9">
                            <div class="progress">
                              <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                            </div>
                        </li>
                    </ul>

                    <ul class="row">
                        <li class="col-sm-3">
                            <h6><i class="fa fa-plus"></i> Logo Design</h6>
                        </li>
                        <li class="col-sm-9">
                            <div class="progress">
                              <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"> </div>
                            </div>
                        </li>
                    </ul>

                    <ul class="row">
                        <li class="col-sm-3">
                            <h6><i class="fa fa-plus"></i> Web Design</h6>
                        </li>
                        <li class="col-sm-9">
                            <div class="progress">
                              <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                            </div>
                        </li>
                    </ul>

                    <ul class="row">
                        <li class="col-sm-3">
                            <h6><i class="fa fa-plus"></i> UI/UX</h6>
                        </li>
                        <li class="col-sm-9">
                            <div class="progress">
                              <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"> </div>
                            </div>
                            <p>Preferred languages are Arabic, French & Italian. Proin nibh augue, suscipit asce lerisque sed, lacinia in, mi.</p>
                        </li>
                    </ul>
                </div>
        </div>
        <div class="sidebar">
            <h5 class="main-title">Proposed Opportunities</h5>                                            
                <?php print views_embed_view('proposals','block_1'); ?>
        </div>
  	</div>

    <div class="col-md-4">
        <div class="sidebar">
            <h5 class="main-title">Professional Details</h5>
            <div class="sidebar-information">
                <ul class="single-category">
                    <li class="row">
                        <h6 class="title col-xs-6">Name</h6>
                        <?php
                            // $name = $user_profile['field_first_name']['#object']->field_first_name['und'][0]['value']." ".$user_profile['field_last_name']['#object']->field_last_name['und'][0]['value'];
                        ?>
                        <span class="subtitle col-xs-6"><?php echo $user_profile['field_first_name']['#object']->field_first_name['und'][0]['value']." ".$user_profile['field_last_name']['#object']->field_last_name['und'][0]['value'] ;?></span>
                    </li>
                    <li class="row">
                        <h6 class="title col-xs-6">Designation</h6>
                        <span class="subtitle col-xs-6"><?php print render($user_profile['field_designation']); ?></span>
                    </li>
                    <li class="row">
                        <h6 class="title col-xs-6">Organization</h6>
                        <span class="subtitle col-xs-6"><?php print render($user_profile['field_organization_name']); ?></span>
                    </li>
                    <li class="row">
                        <h6 class="title col-xs-6">Phone Number</h6>
                        <span class="subtitle col-xs-6"><?php print render($user_profile['field_phone_number']); ?></span>
                    </li>
                    <li class="row">
                        <h6 class="title col-xs-6">Year of Incorporation</h6>
                         <span class="subtitle col-xs-6"><?php print render($user_profile['field_year_of_incorporation']);?></span>
                    </li>                                                      
                    
                </ul>
            </div>
        </div>

                    <!-- Rating -->
                    <div class="sidebar">
                      <h5 class="main-title">Rating</h5>
                      <div class="sidebar-information">
                        <ul class="single-category com-rate">
                          <li class="row">
                            <h6 class="title col-xs-6">Expertise:</h6>
                            <span class="col-xs-6"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i></span> </li>
                          <li class="row">
                            <h6 class="title col-xs-6">Knowledge:</h6>
                            <span class="col-xs-6"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-half-o"></i> <i class="fa fa-star-o"></i></span> </li>
                          <li class="row">
                            <h6 class="title col-xs-6">Quality::</h6>
                            <span class="col-xs-6"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i></span> </li>
                          <li class="row">
                            <h6 class="title col-xs-6">Price:</h6>
                            <span class="col-xs-6"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i></span> </li>
                          <li class="row">
                            <h6 class="title col-xs-6">Services:</h6>
                            <span class="col-xs-6"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i></span> </li>
                        </ul>
                      </div>
                    </div>                    
        </div>
  </div>

</div>
