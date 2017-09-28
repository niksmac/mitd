
<div class="profile"<?php print $attributes;?>>
 <div class="row about-me mar-top20">
  <div class="col-md-2">

    <?php print render($user_profile['field_company_logo']);?>
    <?php if (arg(1) == $user->uid) {?>
      <a href="<?php echo url("user/" . $user->uid . "/edit"); ?>" class="btn btn-info btn-sm btn-block edit-btn">Edit</a>
      <?php }?>

  </div>

  <div class="col-md-10">
    <?php print render($user_profile['field_overview']);?>
  </div>

</div>
<?php
global $user;
$usr = user_load($user->uid);
if ($usr->roles[6]) {
	if ($usr->field_verified_value['und'][0]['value'] == 1) {
		?>
    <div class="verify"><p class="text-muted"><i class="fa fa-check" aria-hidden="true"></i>Mitd Verified</p></div><?php } else {?>

   <a href="<?php echo url("user/" . $user->uid . "/verify") ?>" class="btn btn-info btn-sm ">Please Verifed By Mitd Analyst</a>
      <?php }}?>

  <div class="row">
  	<div class="col-md-8">
  		<div class="sidebar">
            <h5 class="main-title">Product And Services</h5>
            <div class="sidebar-information">
                <div class="single-category">

                    <?php print render($user_profile['field_industry']);?>
                    <?php print render($user_profile['field_hardware_technology']);?>
                    <?php print render($user_profile['field_differentiator']);?>
                    <?php print render($user_profile['field_industry_sector']);?>
                </div>
            </div>
        </div>
        <div class="sidebar">
            <h5 class="main-title">Details</h5>
            <div class="sidebar-information">
                <div class="single-category">
                    <div class="row about-me">
                     <div class="col-md-2">
                            <?php print render($user_profile['field_picture']);?>
                             <?php if (isset($user->roles[17]) || isset($user->roles[18]) || isset($user->roles[19])) {?>
                                <div class="verify" data-toggle="tooltip" data-placement="bottom" title="Verified by MITD Analyst"><p class="text-muted"><i class="fa fa-check" aria-hidden="true"></i> Verified</p></div>
                            <?php }?>

                        </div>
                        <div class="col-md-10">

                          <div class="row">
                            <h6 class="title col-xs-6">Name</h6>
                            <span class="subtitle col-xs-6">
                              <?php echo $user_profile['field_first_name']['#object']->field_first_name['und'][0]['value'] . " " . $user_profile['field_last_name']['#object']->field_last_name['und'][0]['value']; ?>
                            </span>
                          </div>

                          <?php $count = _subscription_count_remaining($user->uid);?>

                          <div class="row">
                            <h6 class="title col-xs-6">No of bids</h6>
                            <span class="subtitle col-xs-6">
                              <?php echo $count; ?>
                            </span>
                          </div>

                          <?php print render($user_profile['field_designation']);?>
                           <?php print views_embed_view('paypal_payment', 'block', $user->uid);?>

                        </div>

                    </div>
                </div>
            </div>
        </div>

        <?php print views_embed_view('proposals', 'block_1');?>

  	</div>

    <div class="col-md-4">
        <div class="sidebar">
            <h5 class="main-title">Professional Details</h5>
            <div class="sidebar-information">

                <div class="single-category">

                    <?php print render($user_profile['field_organization_name']);?>

                    <?php print render($user_profile['field_phone_number']);?>

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
