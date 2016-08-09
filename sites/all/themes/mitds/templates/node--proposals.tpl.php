<?php if($view_mode == "full") : ?>
<div class="profile-company-content">
<div class="row">
  
  <div class="col-md-8"> 
    <div class="sidebar">
      <h5 class="main-title">Proposal Description</h5>
      <div class="sidebar-information"> 
        <div class="single-category">
          <p><?php print render($content['field_proposal_description']); ?></p>
          <h5 class="main-title">Key Deliverables</h5>
          <p><?php print render($content['field_key_deliverables']); ?></p>
          <h5 class="main-title">Remarks</h5>
          <p><?php print render($content['field_remarks']); ?></p>
        </div>
      </div>
    </div>                 
  </div>
  <div class="col-md-4"> 
<!-- Professional Details -->
    <div class="sidebar">
      <h5 class="main-title">Proposal Details</h5>
      <div class="sidebar-information">
        <ul class="single-category">
          <li class="row">
            <h6 class="title col-xs-6">Opportunity</h6>
            <span class="subtitle col-xs-6"><?php print render($content['field_opportunity']); ?></span>
          </li>
          <li class="row">
            <h6 class="title col-xs-6">Project Duration(Weeks)</h6>
            <span class="subtitle col-xs-6"><?php print render($content['field_project_duration_weeks_']); ?></span>
          </li>
          <li class="row">
            <h6 class="title col-xs-6">Pricing</h6>
            <span class="subtitle col-xs-6"><?php print render($content['field_pricing']); ?></span>
          </li>
          <li class="row">
            <h6 class="title col-xs-6">Milestones</h6>
            <span class="subtitle col-xs-6"><?php print render($content['field_milestones']); ?></span>
          </li>
          <li class="row">
            <h6 class="title col-xs-6">Cost(USD)</h6>
            <span class="subtitle col-xs-6"><?php print render($content['field_cost_usd_fixed']); ?></span>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
</div>
<?php endif; ?>