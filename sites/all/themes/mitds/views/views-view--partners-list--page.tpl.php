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
        <?php if($value['country']!='') { ?>
        <span class="btn btn-primary"><?php print $value['country']; ?><?php } ?></span>
        <?php if($value['field_organization_name']!='') { ?>
        <span class="btn btn-primary"><?php print $value['field_organization_name']; ?><?php } ?></span>
        <?php if($value['field_organization_url']!='') { ?>
        <span class="btn btn-primary"><?php print $value['field_organization_url']; ?><?php } ?></span>
      </div>

    </div>
  </div>
    
  <?php } ?>

</div>

  <?php if ($pager): ?>
    <?php print $pager; ?>
  <?php endif; ?>

   <?php elseif ($empty): ?>

   <div class="row">  
    <div class="col-md-12">
      <?php if ($exposed): ?>
      <div class="view-filters">
      <?php print $exposed; ?>
      </div>
      <?php endif; ?>
    </div>    
  </div> 

    <div class="col-md-10 air-card mar-bot10">
      <?php print $empty; ?>
    </div>
  <?php endif; ?>