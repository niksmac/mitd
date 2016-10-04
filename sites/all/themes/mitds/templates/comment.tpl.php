<?php
$name = $node->name;
// print_r($comment);
?>
<li class="clearfix" >
  

<div class="message-data <?php echo ($name == $comment->name) ? ' align-right' : ''; ?>">
  
  <?php if($name == $comment->name) { ?> 
  <span class="message-data-time"><?php echo $created; ?></span> &nbsp; &nbsp;
  <span class="message-data-name"><?php echo $author; ?></span> <i class="fa fa-circle <?php echo ($name == $comment->name) ? ' me' : ' online'; ?>"></i>
  <?php } else { ?>
  <i class="fa fa-circle <?php echo ($name == $comment->name) ? ' me' : ' online'; ?>"></i><span class="message-data-name"><?php echo $author; ?></span>&nbsp; &nbsp; 
  <span class="message-data-time"><?php echo $created; ?></span>

  <?php } ?>

  
</div>
<div class="message <?php echo ($name == $comment->name) ? ' other-message float-right' : ' my-message'; ?>">
  <?php echo $comment->comment_body['und'][0]['safe_value']; ?>
</div>

</li>

