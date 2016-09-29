<?php if ($rows): ?>
<div class=" <?php print $classes; ?>">

  <?php foreach ($view->style_plugin->rendered_fields as $key => $value) { 

    // print_r($value);exit;
    // $isInvited = _check_opportunity_invited($value['nid'], $value['uid']);

    ?>

  <div class="col-md-12 air-card">
    <div class="col-md-2">
      <?php print $value['picture']; ?>
      <!-- <a href="" class="btn btn-warning btn-block" > Invite</a> -->
    </div>
    <div class="col-md-10">
      <h3>Nikhil Mohan</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis maxime voluptatibus quae? Praesentium aliquid ipsum, at vero accusantium eligendi obcaecati ex sapiente neque adipisci. Fugit laudantium non laborum illum rerum.</p>

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