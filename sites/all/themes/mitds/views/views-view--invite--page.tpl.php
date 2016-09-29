<?php if ($rows): ?>
<div class=" <?php print $classes; ?>">

  <div class="row">  
    <div class="col-md-12">
      <?php if ($exposed): ?>
      <div class="view-filters">
      <?php print $exposed; ?>
      </div>
      <?php endif; ?>
    </div>    
  </div>

  <?php foreach ($view->style_plugin->rendered_fields as $key => $value) { 
    $status = _check_awarded_opportunity(arg(1)); 
    $is_invited = _check_opportunity_invited(arg(1), $value['uid']);           
    $name = $value['field_first_name'].' '.$value['field_last_name'];
    ?>

  <div class="col-md-12 air-card mar-bot10">
    <div class="col-md-2">
      <?php print $value['picture']; ?>
      <?php if($is_invited == 1) { ?>
        <a href="javascript:void();" class="btn btn-success btn-block btn-small invited">Invited</a>
      <?php } ?>
      <?php if($status == false && $is_invited == 0) { ?>
        <a href="<?php echo url("invite/".arg(1)."/".$value['uid'],array('query' => array('destination' => $_GET['q'])))?>" class="btn btn-warning btn-block btn-small">Invite</a>
      <?php } ?>
    </div>
    <div class="col-md-10">
      <h3><?php echo $name; ?></h3>
      <?php echo $value['field_application_description']; ?>
      <div class="tag-cloud">
        <span class="btn btn-primary btn-small"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php print $value['field_geography_of_operation']; ?></span>
        <span class="btn btn-primary btn-small"><i class="fa fa-university" aria-hidden="true"></i> <?php print $value['field_organization_name']; ?></span>
        <span class="btn btn-primary btn-small"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> <?php print $value['field_year_of_incorporation']; ?></span>
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

    <div class="col-md-12 air-card mar-bot10">
      <?php print $empty; ?>
    </div>
<?php endif; ?>