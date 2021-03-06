<?php if ($rows): ?>
	<div class="<?php print $classes;?>">

		<?php if ($header): ?>
		<div class="view-header">
			<?php print $header;?>
		</div>
	<?php endif;?>



	<ul class="notifi">
		<?php foreach ($view->style_plugin->rendered_fields as $key => $value) {
	$msg = '';
	switch ($value['type']) {
	case 'notifyauthorproposal':
		$msg = 'Proposal Submitted';
		break;
	case 'commentslog':
		$msg = 'Comment Received';
		break;
	case 'notifyuserwhenopportunityawarded':
		$msg = 'Opportunity Awarded';
		break;
	case 'notifyuserwheninvited':
		$msg = 'You are invited';
		break;
	case 'notifyuserwheninvitedcollaboration':
		$msg = 'You are invited for collaboration';
		break;
	case 'notifyuserswhenaddedtocollaboration':
		$msg = 'You are added to the collaboration group';
		break;
	case 'notifyuserwhenproposalshortlisted':
		$msg = 'Your proposal has been shortlisted';
		break;
	default:
		# code...
		break;
	}
	?>

			<li class="<?php print $value['type'];?>">
				<strong><?php print $msg;?></strong>
				<p><?php print $value['message_render'];?></p>
				<span><?php print $value['timestamp'];?></span>
			</li>

			<?php }?>
		</ul>

		<?php if ($pager): ?>
		<?php print $pager;?>
	<?php endif;?>

</div>
<?php //endif; ?>


<?php elseif ($empty): ?>
	<div class="view-empty">
		<?php print $empty;?>
	</div>
<?php endif;?>