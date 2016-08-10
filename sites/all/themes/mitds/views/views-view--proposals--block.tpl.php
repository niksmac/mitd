<?php if ($rows): ?>
<div class="air-card mar-bot50">
<div class="similar">

  <?php 
  if ( empty($title) ): 
    $title = $view->get_title(); 
    endif; 
    if ($title): ?>
      <h3 class="sub-title"><b><?php print t($title)?></b></h3>
    <?php endif; ?>
    <?php foreach ($view->style_plugin->rendered_fields as $key => $value) { ?>
    <div class="media">                           
        <div class="media-body">
            <h5><?php echo $value['title']; ?></h5>
            <h5>Proposal Description</h5>             
            <p><?php echo $value['field_proposal_description']; ?></p>           
            <div class="share-w">
                <a href="<?php echo url("node/".$value['nid']); ?>">
                    <i class="fa fa-bookmark-o"></i>
                </a>                                 
            </div>
        </div>        
    </div>
    <?php }?>
</div>
</div>
<?php endif;?>                                                                             