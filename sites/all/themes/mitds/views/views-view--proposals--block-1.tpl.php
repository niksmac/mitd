<div class="similar">
    <?php foreach ($view->style_plugin->rendered_fields as $key => $value) { ?>
    <div class="media">                           
        <div class="media-body">
            <h5><?php echo $value['title']; ?></h5>
            <p><?php echo $value['field_organization_name']; ?> - <?php echo $value['country']; ?> </p>
            <p><?php echo $value['field_general_requirements']; ?></p>
            <div class="share-w">
                <a href="#.">
                    <i class="fa fa-bookmark-o"></i>
                </a>                 
                <a href="<?php echo url("node/".$value['nid']); ?>">
                    <i class="fa fa-eye"></i>
                </a>
            </div>
        </div>        
    </div>
    <?php }?>
</div>                                                                               