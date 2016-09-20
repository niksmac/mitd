<div class="sidebar">
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
    <div class="media">
        <div class="media-body">
            <h5><?php echo $value['title']; ?></h5>
            <p><?php echo $value['field_organization_name']; ?> - <?php echo $value['country']; ?> </p>
            <p><?php echo $value['field_general_requirements']; ?></p>
            <div class="share-w">
                <a href="<?php echo url("node/".$value['nid']); ?>" data-toggle="tooltip" data-placement="top" title="View My Proposal">
                    <i class="fa fa-bookmark-o"></i>
                </a>
                <a href="<?php echo url("node/".$value['nid_1']); ?>" data-toggle="tooltip" data-placement="top" title="View Opportunity">
                    <i class="fa fa-eye"></i>
                </a>
            </div>
        </div>
    </div>
    <?php }?>
</div>
<?php elseif ($empty): ?>
<div class="similar">
    <div class="view-empty">
      <?php print $empty; ?>
    </div>
</div>
<?php endif;?>
</div>
