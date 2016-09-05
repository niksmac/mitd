<?php if($view_mode == "full") : ?>
<div class="profile-company-content">
    <div class="container">
      <div class="row">
      
        <div class="col-md-12">
          <article class="uou-block-7f blog-post-content">
            <div class="span8 blog-image">
            <?php print render($content['field_cover_image']); ?>
            </div>

             <?php 
              $timeago = format_interval(time() - $node->created, 1) . ' ' . t('ago'); 
             ?>
            <div class="meta">
              <span class="time-ago"><?php echo $timeago;?></span>
              <span class="category">Category: <?php echo $node->field_blog_category['und']['0']['taxonomy_term']->name;?></span>             
            </div>

            <h1><a href="blog-post.html#"><?php print print $content['body']['#object']->title;?></a></h1>

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


            <a class="btn btn-primary " href="blog-post.html#">Back To Blog List</a>

          </article> <!-- end .uou-block-7f -->

        </div> <!-- end grid layout -->


      </div> <!-- end row -->

    </div> <!-- edn cotainer -->

  </div> <!-- end blog-content -->
  <?php endif; ?>
