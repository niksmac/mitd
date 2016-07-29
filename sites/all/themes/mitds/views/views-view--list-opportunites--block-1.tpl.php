<?php foreach ($view->style_plugin->rendered_fields as $key => $value) { ;?>
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
	<p><?php echo $opportunity_count; ?> Jobs Posted </p>
	<!-- <p>Member Since Feb 25, 2016</p> -->
	<p>Member Since <?php echo $value['created']; ?></p>
</div>
<hr>
<div class="row">
	<a class="btn btn-primary btn-block">Default</a>
	<a class="btn btn-warning btn-block">Primary</a>
</div>
<?php } ?>