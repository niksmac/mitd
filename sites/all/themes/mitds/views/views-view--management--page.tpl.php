<?php if ($rows): ?>
<div class="row testimonials text-left margin-bottom-md-2 management-team">

<?php foreach ($view->style_plugin->rendered_fields as $key => $value) { //print_r($value); ?>

    <div class="col-md-4 text-center col-sm-6 col-xs-12  team">
      <div class="staff1" data-toggle="tooltip" data-placement="bottom">
        <?php echo $value['field_manage_image']; ?>
        <h3 class="staff-name"><?php echo $value['title']; ?></h3>
        <p class=""><b>[ <?php echo $value['field_manage_designation']; ?> ]</b></p>
        <?php echo $value['body']; ?>
      </div>
    </div>

<?php }?>
</div>
<?php endif;?>

