<?php if ($rows): ?>
<?php foreach ($view->style_plugin->rendered_fields as $key => $value) {//print_r($value);exit;
	?>
<article class="uou-block-7f"> 
  <?php //print render($content['field_cover_image']); ?>

  <h1><?php echo $value['title']; ?></h1> 
  <p><?php echo $value['body']; ?></p>
  <a href="<?php echo url("node/".$value['nid']); ?>" class="btn btn-small btn-primary">Read More</a> 
  </article>
  <?php } ?> 
  <?php endif; ?>