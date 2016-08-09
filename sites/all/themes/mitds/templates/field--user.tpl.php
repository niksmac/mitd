<div class="<?php print $classes; ?> row"<?php print $attributes; ?>>
  <?php if (!$label_hidden): ?>
    <h6 class="title col-xs-6"<?php print $title_attributes; ?>><?php print $label ?></h6>
  <?php endif; ?>
  <span class="subtitle <?php echo ($label_hidden) ? "col-xs-12" : "col-xs-6"; ?>"<?php print $content_attributes; ?>>
  	<?php foreach ($items as $delta => $item): ?>
  	 <div class="field-item <?php print $delta % 2 ? 'odd' : 'even'; ?>"<?php print $item_attributes[$delta]; ?>><?php print render($item); ?></div>
  	<?php endforeach; ?>
  </span>
</div>
