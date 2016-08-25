<?php if($view_mode == "full") : ?>
<div class="profile-company-content">
<div class="row">
  <?php //print_r($node);exit;?>
  <div class="col-md-8"> 
    <div class="sidebar">
      <h5 class="main-title">Proposal Description</h5>
      <div class="sidebar-information"> 
        <div class="single-category">
          <p><?php print render($content['field_proposal_description']); ?></p>
          <h5 class="main-title">Milestones</h5>
          <p><?php print render($content['field_milestones']); ?></p>
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
          <!-- <li class="row">
            <h6 class="title col-xs-6">Milestones</h6>
            <span class="subtitle col-xs-6"><?php //print render($content['field_milestones']); ?></span>
          </li> -->
          <li class="row">
            <h6 class="title col-xs-6">Cost(USD)</h6>
            <span class="subtitle col-xs-6"><?php print render($content['field_cost_usd_fixed']); ?></span>
          </li>
        </ul>        
      </div>
    </div> 
    <?php if($node->uid != $user->uid) {  ?>
    <?php if($node->field_short_list['und']['0']['value'] == 1) { ?>
      <a href="#" class="btn btn-default btn-block">Short Listed</a> 
    <?php } else { ?>
    <a href="<?php echo url("proposal/".$nid, array('query' => array('destination' => $_GET['q'])))?>" class="btn btn-primary btn-block">Short List</a>
    <?php } ?>
    <?php 
    $op_id = $node->field_opportunity['und']['0']['nid'];
    $awarded = _check_awarded_opportunity($op_id);    
    if($awarded == 1) {
    ?>
    
    <a href="#" class="btn btn-default btn-block">This opportunity is awarded</a> 
    <?php } else { ?>
  
    <a href="<?php echo url("proposal/award/".$nid, array('query' => array('destination' => $_GET['q'])))?>" class="btn btn-primary btn-block">Award Proposal</a>
    <?php } }?>
   
  </div>  
</div>
</div>
</div>
<?php print render($content['comments']); ?> 
<?php endif; ?>