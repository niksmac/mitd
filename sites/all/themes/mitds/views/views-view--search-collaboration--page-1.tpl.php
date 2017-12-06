<?php if ($header): ?>
    			<div class="view-header">
      				<?php print $header;?>
    			</div>
  			<?php endif;?>

<?php if ($rows): ?>
<div class="profile"<?php print $attributes;?>>
	<div class="row">
		<div class="col-md-12">
			<?php if ($exposed): ?>
			<div class="view-filters">
				<?php print $exposed;?>
			</div>
			<?php endif;?>
		</div>
	</div>

	<?php foreach ($view->style_plugin->rendered_fields as $key => $value) {
	//print_r($value);?>
	<div class="listing listing-1 listing-new-style">
		<div class="listing-section">
			<div class="listing-ver-3">
				<div class="listing-heading">
					<h4><?php echo $value['title']; ?></h4>
				</div>
				<div class="listing-inner">
					<div class="listing-content">
						<h6 class="title-company">Type of Collaboration:<?php echo $value['field_type_of_collaboration']; ?></h6>
						<p><?php echo $value['field_general_requirements']; ?><a href="<?php echo url("node/" . $value['nid']); ?>">read more</a></p>
						<h6 class="title-tags">Software Technology Required:</h6>
						<ul class="tags list-inline">
						<?php
$soft_tech = explode(",", $value['field_software_technology']);
	foreach ($soft_tech as $val) {
		?>
							<li>
								<a href="#" class="soft-tech"><?php echo $val; ?></a>
							</li>
						<?php }?>
						</ul>
					</div>
				</div>

   			</div>
		</div>
	</div>
<?php }?>
	<?php if ($pager): ?>
		<?php print $pager;?>
	<?php endif;?>
</div>
</div>
	<?php elseif ($empty): ?>
	<div class="row">
		<div class="col-md-12">
		<?php if ($exposed): ?>
			<div class="view-filters">
				<?php print $exposed;?>
			</div>
		<?php endif;?>
			</div>
	</div>
	<div class="col-md-12 air-card mar-bot10">
    <?php print $empty;?>
	</div>
	<?php endif;?>
