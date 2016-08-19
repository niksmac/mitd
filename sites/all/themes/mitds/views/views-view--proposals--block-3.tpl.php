<?php if ($rows): ?>
<div class="similar">

	<?php 
 	if ( empty($title) ): 
   	$title = $view->get_title(); 
   	endif; 
   	if ($title): ?>
    	<div class="main-title"><b><?php print t($title)?></b></div>
    <?php endif; ?>	
	<?php foreach ($view->style_plugin->rendered_fields as $key => $value) { ?>
	<?php }?>
	<div class="media">
		<?php	
			$proposal_count = mitd_proposals_count($value['nid_1']);
			if(!empty($proposal_count)) {		
		?>
		<p><?php echo $proposal_count; ?> Proposals posted yet!!! </p>
		<?php } else { ?>
    		<p>No proposals found for this opportunity.....</p>
			<?php } ?>
	</div>
</div>

<?php elseif ($empty): ?>
    <div class="view-empty">
      <?php print $empty; ?>
    </div>
<?php endif; ?>
