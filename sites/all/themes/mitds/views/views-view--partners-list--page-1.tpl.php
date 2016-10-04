<?php if ($rows): ?>
<div class=" <?php print $classes; ?>">

  <?php foreach ($view->style_plugin->rendered_fields as $key => $value) {     
    $name = $value['field_first_name'].' '.$value['field_last_name'];       
    ?>

  <div class="row air-card mar-bot10">
    <div class="col-md-2">
      <?php print $value['field_company_logo']; ?>      
    </div>
    <div class="col-md-10">
      <h3><a href="<?php echo url("user/".$value['uid']);?>"><?php echo $name; ?></a></h3>
      
      <?php echo $value['field_overview']; ?>

      <div class="tag-cloud">
        <span class="btn btn-primary"><?php print $value['country']; ?></span>
        <span class="btn btn-primary"><?php print $value['field_organization_name']; ?></span>
        <span class="btn btn-primary"><?php print $value['field_organization_url']; ?></span>
      </div>

    </div>
  </div>
    
  <?php } ?>

</div>

  <?php elseif ($empty): ?>
    <div class="col-md-10 air-card mar-bot10">
      <?php print $empty; ?>
    </div>
  <?php endif; ?>