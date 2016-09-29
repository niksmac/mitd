<?php if ($rows): ?>
<div class=" <?php print $classes; ?>">

  <?php foreach ($view->style_plugin->rendered_fields as $key => $value) { 
     
     $name = $value['field_first_name'].''.$value['field_last_name'];
     
    ?>

  <div class="col-md-12 air-card">
    <div class="col-md-2">
      <?php print $value['picture']; ?>
      <!-- <a href="" class="btn btn-warning btn-block" > Invite</a> -->
    </div>
    <div class="col-md-10">
      <h3><?php echo $name; ?></h3>
      <?php echo $value['field_application_description']; ?>

      <div class="tag-cloud">
        <span class="btn btn-primary"><?php print $value['field_geography_of_operation']; ?></span>
        <span class="btn btn-primary"><?php print $value['field_organization_name']; ?></span>
        <span class="btn btn-primary"><?php print $value['field_organization_name']; ?></span>
      </div>

    </div>
  </div>
  <?php } ?>
</div>
 <?php endif; ?>