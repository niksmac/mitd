<div class="<?php print $classes; ?>">
  <div class="col-md-4">
    <?php if ($exposed): ?>
    <div class="view-filters">
      <?php print $exposed; ?>
    </div>
  <?php endif; ?>
</div>
<div class="col-md-8">
  <?php if ($rows): ?>
  <div class="view-content">
    
 <?php foreach ($view->style_plugin->rendered_fields as $key => $value) { ?>


 <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><?php echo $value['title']; ?> - <?php echo $value['field_organization_name']; ?> </h3>
  </div>
  <div class="panel-body">
  <div class="row">
   <div class="col-md-10"><?php echo $value['field_general_requirements']; ?></div>
  </div>
   <div class="alert alert-info" role="alert"><span class="lineage-item lineage-item-level-0"><?php echo $value['field_project_budget']; ?>  | <span class="date-display-single" property="dc:date" datatype="xsd:dateTime" content="2016-07-14T00:00:00+05:30"><?php echo $value['field_project_end_date']; ?></span>| 
  <?php 
    global $user;
    $proposal_data = mitd_nid($user->uid, $value['nid']);
    if($proposal_data){     
  ?>
  <a href="<?php echo url("node/".$value['nid']); ?>">View Proposal</a><?php } else{?>

  <a href="/makeitdeals/?q=node/add/proposals">Submit Proposal</a><?php } ?>
  </div>  
  </div>
</div>

  
  <?php } ?>



  </div>
<?php elseif ($empty): ?>
  <div class="view-empty">
    <?php print $empty; ?>
  </div>
<?php endif; ?>
<?php if ($pager): ?>
  <?php print $pager; ?>
<?php endif; ?>
<?php if ($feed_icon): ?>
  <div class="feed-icon">
    <?php print $feed_icon; ?>
  </div>
<?php endif; ?>
</div>
</div>
