<div id="comments" class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <?php if ($content['comments'] && $node->type != 'forum'): ?>
    <?php print render($title_prefix); ?>
    <h2 class="title"><?php print t('Messages'); ?></h2>
    <?php print render($title_suffix); ?>
  <?php endif; ?>

  <?php if ($content['comment_form']): ?>
    <?php print render($content['comment_form']); ?>
  <?php endif; ?>
  
  <div class="chat">
    <div class="chat-history">
      <ul>
        <?php print render($content['comments']); ?>
      </ul>
    </div>
  </div>
  
</div>
