<?php if($rows) : ?>
<div class="container pb30">
  <div class="row">
  <?php foreach ($view->style_plugin->rendered_fields as $key => $value) {  //print_r($value);exit;
      $name = $value['field_first_name'].' '.$value['field_last_name'];
    ?>
    <div class="col-sm-3">
      <div class="uou-block-6a">
        <?php if(isset($value['field_company_logo']))?>
        <?php print $value['field_company_logo']; ?>
        <h6><?php print $name; ?> <span><i class="fa fa-map-marker"></i> <?php print $value['country']; ?>, <?php print $value['province']; ?></span></h6>

      </div>
      <!-- end .uou-block-6a -->
    </div>
    <?php } ?>
  </div>
</div>
<?php endif; ?>
