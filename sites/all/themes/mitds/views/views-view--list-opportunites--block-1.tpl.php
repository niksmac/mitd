<?php if ($rows): ?>
<?php foreach ($view->style_plugin->rendered_fields as $key => $value) { //print_r($value);?>
<div class="row">

	<?php 
 	if ( empty($title) ): 
   	$title = $view->get_title(); 
   	endif; 
   	if ($title): ?>
    	<b><?php print t($title)?></b>
    <?php endif; ?>		

	<h3><?php echo $value['field_organization_name']; ?></h3>
	<p><?php echo $value['field_application_description']; ?></p>

	<?php
	global $user;	
	$opportunity_count = mitd_opportunity_count($value['uid']);
	$proposal_submit = mitd_nid($user->uid, $value['nid']);	
	
	?>	
	<p><?php echo $opportunity_count; ?> Opportunities Posted </p>	
	<p>Member Since <?php echo $value['created']; ?></p>
</div>
<hr>
	<?php
	$nid = node_load($value['nid']); 
	if($nid->uid != $user->uid) {
	if(!empty($proposal_submit)) { ?>
<div class="row">
	<a href="<?php echo url("node/".$proposal_submit[0])?>" class="btn btn-primary btn-block">View Proposal</a>
	
</div>
<?php } else { ?>

<div class="row">
	<a href="<?php echo url("node/add/proposals/".$value['nid'])?>" class="btn btn-primary btn-block">Submit Proposal</a>
	
</div>
<?php }}}?>
<?php elseif ($empty): ?>
    <div class="view-empty">
      <?php print $empty; ?>
    </div>
  <?php endif; ?>