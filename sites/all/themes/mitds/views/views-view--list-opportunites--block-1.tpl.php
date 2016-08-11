<?php if ($rows): ?>
<?php foreach ($view->style_plugin->rendered_fields as $key => $value) { ?>
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
	$opportunity_count = mitd_opportunity_count($value['uid']);	
	?>
	<!-- <p>18 Jobs Posted </p> -->
	<p><?php echo $opportunity_count; ?> Opportunities Posted </p>
	<!-- <p>Member Since Feb 25, 2016</p> -->
	<p>Member Since <?php echo $value['created']; ?></p>
</div>
<hr>
<div class="row">
	<a href="<?php echo url("node/add/proposals/".$value['nid'])?>" class="btn btn-primary btn-block">Submit Proposal</a>
	
</div>
<?php } ?>
<?php elseif ($empty): ?>
    <div class="view-empty">
      <?php print $empty; ?>
    </div>
  <?php endif; ?>