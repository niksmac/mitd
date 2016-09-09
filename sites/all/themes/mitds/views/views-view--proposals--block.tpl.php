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
    <?php foreach ($view->style_plugin->rendered_fields as $key => $value) {//print_r($user->uid);exit;?>
    <div class="media">                           
        <div class="media-body list-title">
            <h5><?php echo $value['title']; ?></h5>            
            <p><?php echo $value['field_proposal_description']; ?></p>
            <?php if(!empty($value['field_first_name']) ||  !empty($value['field_last_name'])) { ?>
            <p class="text-success"><?php echo $value['field_first_name'].' '.$value['field_last_name']; ?></p><?php } ?>           
            <div class="share-w">
                <a href="<?php echo url("node/".$value['nid']); ?>" data-toggle="tooltip" data-placement="top" title="View">
                    <i class="fa fa-bookmark-o"></i>
                </a>
                
                <?php if(!(isset($value['uid']))) { ?>
                <?php if(isset($value['field_short_list']) && $value['field_short_list'] == 1) { ?>
                <a href="#" data-toggle="tooltip" data-placement="top" title="Shortlisted">
                    <i class="fa fa-star" aria-hidden="true"></i>
                </a> 
                <?php } else { ?>
                <a href="<?php echo url("proposal/".$value['nid'], array('query' => array('destination' => $_GET['q'])))?>" data-toggle="tooltip" data-placement="top" title="Shortlist">
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                </a>
                <?php } }?>                                
            </div>

        </div>        
    </div>
    <?php }?>
</div>
</div>
<?php elseif ($empty): ?>
    <div class="view-empty">
      <?php print $empty; ?>
    </div>
<?php endif;?>                                                                             