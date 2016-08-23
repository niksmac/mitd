<?php
$name = $node->name;
?>
<div class="<?php print $classes; ?> <?php echo ($name == $comment->name) ? "message-author" : "message-other"; ?> clearfix"<?php print $attributes; ?>> 
  <div class="media">
    <div class="col-md-2 picture-wrapper">
      <div class="media-left">
        <?php print $picture ?>
      </div>
    </div>

    <?php if ($new): ?>
    <span class="new"><?php print $new ?></span>
    <?php endif; ?>

        
    <div class="col-md-10 messages">
      <div class="media-body">
        <h3 class="media-heading"<?php print $title_attributes; ?>><?php print $title ?></h3>
        <?php print render($content);?>
        
      </div>
    </div>
  </div>

</div>

