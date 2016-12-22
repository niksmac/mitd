<?php if ($rows): ?>
<div class=" <?php print $classes; ?>">

  <?php foreach ($view->style_plugin->rendered_fields as $key => $value) { 
  //print_r($value);exit;    
    $name = $value['field_first_name'].' '.$value['field_last_name'];

    $alter = array(
      'max_length' => 30, //Integer
      'ellipsis' => TRUE, //Boolean
      'word_boundary' => TRUE, //Boolean
      'html' => TRUE, //Boolean
      );
    $trimmed_text = views_trim_text($alter, $name);         
    ?>

  <div class="row air-card mar-bot10">
    <div class="col-md-2">
      <?php print $value['field_picture']; ?>      
    </div>
    <div class="col-md-10">
    <h3><a href="<?php echo url("user/".$value['uid']);?>"><?php echo $trimmed_text; ?></a></h3>     
      <?php echo $value['field_overview']; ?>

      <div class="tag-cloud">
        <?php if($value['country']!='') { ?>
        <span class="label label-default"><?php print $value['country']; ?><?php } ?></span>
        <?php if($value['field_organization_name']!='') { ?>
        <span class="label label-primary org-name"><?php print $value['field_organization_name']; ?><?php } ?></span>
        <?php if($value['field_organization_url']!='') { ?>
        <span class="label label-default"><?php print $value['field_organization_url']; ?><?php } ?></span>
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