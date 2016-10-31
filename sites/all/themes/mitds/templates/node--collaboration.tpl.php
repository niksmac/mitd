<?php if($view_mode == "full") : ?>
<div class="profile-company-content">
<div class="row"> 
  <div class="col-md-8"> 
    <div class="sidebar">
      <h5 class="main-title">General Requirements</h5>
      <div class="sidebar-information"> 
        <div class="single-category">
          <p><?php print render($content['field_general_requirements']); ?></p>
          <h5 class="main-title">Objective of Collaboration</h5>
          <p><?php print render($content['field_objective_of_collaboration']); ?></p>
          <h5 class="main-title">Collaboration Type</h5>
          <p><?php print render($content['field_type_of_collaboration']); ?></p>
          <h5 class="main-title">Description</h5>
          <p><?php print render($content['field_description']); ?></p>
        </div>
      </div>
    </div>
    <?php
    global $user;     
    $member = _og_members($node->vid);
    if(in_array($user->uid, $member)) {   
    ?>
   <?php print render($content['comments']); ?> 
   <?php }?> 
          
  </div>
  <div class="col-md-4"> 
<!-- Professional Details -->
    <div class="sidebar">
      <h5 class="main-title">Collaboration Details</h5>
      <div class="sidebar-information">
        <ul class="single-category">
          <li class="row">
            <h6 class="title col-xs-6">Collaboration</h6>
            <span class="subtitle col-xs-6"><?php print render($content['group_group']['#object']->title); ?></span>
          </li>
          <li class="row">
            <h6 class="title col-xs-6">Collbaoration Type</h6>
            <span class="subtitle col-xs-6"><?php print render($content['field_type_of_collaboration']); ?></span>
          </li>
          <li class="row">
            <h6 class="title col-xs-6">Industry</h6>
            <span class="subtitle col-xs-6"><?php print render($content['field_industry']); ?></span>
          </li>
          <li class="row">
            <h6 class="title col-xs-6">Software Technology</h6>
            <span class="subtitle col-xs-6"><?php print render($content['field_software_technology']); ?></span>
          </li>
          <li class="row">
            <h6 class="title col-xs-6">Hardware Technology</h6>
            <span class="subtitle col-xs-6"><?php print render($content['field_hardware_technology']); ?></span>
          </li>
          <li class="row">
            <h6 class="title col-xs-6">Start Date</h6>
            <span class="subtitle col-xs-6"><?php print render($content['field_collaboration_start_date']); ?></span>
          </li>
          <li class="row">
            <h6 class="title col-xs-6">End Date</h6>
            <span class="subtitle col-xs-6"><?php print render($content['field_collaboration_end_date']); ?></span>
          </li>
          <li class="row">
            <h6 class="title col-xs-6">Pricing</h6>
            <span class="subtitle col-xs-6"><?php print render($content['field_pricing']); ?></span>
          </li>
          <!-- <li class="row">
            <h6 class="title col-xs-6">Milestones</h6>
            <span class="subtitle col-xs-6"><?php //print render($content['field_milestones']); ?></span>
          </li> -->
          <li class="row">
            <h6 class="title col-xs-6">Cost(USD)</h6>
            <span class="subtitle col-xs-6">vcxvcv</span>
          </li>
        </ul>        
      </div>
    </div>
    <?php if(isset($user->roles['6'])) { ?>
    <?php print views_embed_view('collaboration_listing','block_1'); } ?>      
  </div>  
</div>
</div>
</div>

<?php endif; ?>