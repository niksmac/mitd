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
    <?php print $rows; ?>
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
