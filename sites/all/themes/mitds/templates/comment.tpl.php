<?php
$name = $node->name;
// print_r($comment);
?>
<li class="clearfix" >
  

<div class="message-data <?php echo ($name == $comment->name) ? ' align-right' : ''; ?>">
  
  <?php if($name == $comment->name) { ?> 
  <?php echo $permalink; ?><span class="message-data-time"><?php echo $created; ?></span> &nbsp; &nbsp;
  <span class="message-data-name"><?php echo $author; ?></span> <i class="fa fa-circle <?php echo ($name == $comment->name) ? ' me' : ' online'; ?>"></i>
  <?php } else { ?>
  <?php echo $permalink; ?><i class="fa fa-circle <?php echo ($name == $comment->name) ? ' me' : ' online'; ?>"></i><span class="message-data-name"><?php echo $author; ?></span>&nbsp; &nbsp; 
  <span class="message-data-time"><?php echo $created; ?></span>

  <?php } ?>

  
</div>
<div class="message <?php echo ($name == $comment->name) ? ' other-message float-right' : ' my-message'; ?>">


  <?php echo nl2br($comment->comment_body['und'][0]['safe_value']); ?>

  

  <?php if(isset($comment->field_proposal_files['und'])) { ?>
  
  <ol class="commentFiles mar-top10">
  <?php 
  $commentFiles = $comment->field_proposal_files['und'];
  foreach ($commentFiles as $key => $value) { 
    // $imgpath = file_load($value['uri']);
    $fpath = file_create_url($value['uri']);
?> 

    <li><a href="<?php echo $fpath; ?>"><?php echo $value['filename']; ?></a></li>
  
  <?php } ?>
  </ol>  

  <?php } ?>


</div>



</li>

