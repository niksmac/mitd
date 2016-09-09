<?php
    $timeago = format_interval(time() - $node->created, 1) . ' ' . t('ago');
?>
<?php if($view_mode == "teaser") : ?>
  
<article class="uou-block-7f"> 
  <?php print render($content['field_cover_image']); ?>

  <div class="meta"> <span class="time-ago"><?php echo $timeago;?></span> 
    <!-- <span class="category">Category: <a href="blog.html#">Design</a></span> 
    <a href="blog.html#" class="comments">12 Comments</a> --> 
  </div>
  <h1><?php print  $content['body']['#object']->title;?></h1> 
  <p><?php print render($content['body']); ?></p>
  <a href="<?php echo url("node/".$nid); ?>" class="btn btn-small btn-primary">Read More</a> 
  </article>


<?php endif; ?>

<?php if($view_mode == "full") : ?>  
  <div class="profile-company-content">
          <article class="uou-block-7f blog-post-content">
            <div class="span8 blog-image">
              <?php print render($content['field_cover_image']); ?>
            </div>

            
            <div class="meta">
              <span class="time-ago"><?php echo $timeago;?></span>
              <span class="category">Category: <?php echo $node->field_blog_category['und']['0']['taxonomy_term']->name;?></span>
            </div>

            <h1><a href="<?php print  drupal_get_path_alias('node/'.$node->nid);?>"><?php print  $content['body']['#object']->title;?></a></h1>

            <p><?php print render($content['body']); ?></p>

            <div class="uou-share-story clearfix">
              <div class="row">
                <div class="col-sm-3">
                  <h5 class="sidebar-title">Share This Story</h5>

                </div>
                <div class="col-sm-9 ">
                  <div class="social-widget">
                    <div class="uou-block-4b">

                      <ul class="social-icons">
                        <li><a href="blog-post.html#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="blog-post.html#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="blog-post.html#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="blog-post.html#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="blog-post.html#"><i class="fa fa-dribbble"></i></a></li>
                      </ul>

                    </div> <!-- end .uou-block-4b -->
                  </div> <!-- end social widget -->
                </div>
              </div>
            </div>
          </article> <!-- end .uou-block-7f -->


  </div> <!-- end blog-content -->
<?php endif; ?>
