<div class="similar">
    <div class="media"> 
                          
        <div class="media-body">
        	 <?php foreach ($view->style_plugin->rendered_fields as $key => $value) { ?>
            <!-- <h5>Media heading</h5> -->
            <h5><?php //echo $value['title']; ?></h5>
            <p><?php echo $value['field_organization_name']; ?> - <?php echo $value['country']; ?> </p>
            <p><?php echo $value['field_general_requirements']; ?></p>
                                                        
            <div class="share-w">
                                <a href="#.">
                                    <i class="fa fa-bookmark-o"></i>
                                </a> 
                                <a href="#.">
                                    <i class="fa fa-envelope-o"></i>
                                </a> 
                                <a href="#.">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </div>
                            <?php }?>
        </div>
        
    </div>
                                                                                                                                          
</div>