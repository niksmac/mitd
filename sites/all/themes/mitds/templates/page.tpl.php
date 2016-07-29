<?php global $base_url; $theme_path = $base_url.'/'.drupal_get_path('theme', 'mitds');?>
<div id="main-wrapper">

  <!-- Top Toolbar -->
  <div class="toolbar">
    <div class="uou-block-1a blog">
      <div class="container">
        <ul class="social">
          <li><a href="//facebook.com/makeitdeals" class="fa fa-facebook"></a></li>
          <li><a href="//twitter.com/makeitdeals" class="fa fa-twitter"></a></li>
          <li><a href="//plus.google.com" class="fa fa-google-plus"></a></li>
        </ul>
        <ul class="authentication">
          <?php if (user_is_logged_in()) : ?>
          <li><a href="<?php print url("user"); ?>"><span>My Account</span></a></li>
          <li><a href="<?php print url("user/logout"); ?>">Logout</a></li>
          <?php else: ?>
          <li><a href="<?php print url("user/register"); ?>">Register</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
    <!-- end .uou-block-1a -->
  </div>
  <!-- end toolbar -->

    <div class="box-shadow-for-ui">
    <div class="uou-block-2b">
      <div class="container">
      <?php if ($logo): ?>
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
          <img src="<?php print $theme_path;?>/logo.png" alt="<?php print t('Home'); ?>" />
        </a>
        <?php endif; ?> 
        <!-- <a href="index.html#" class="logo"><img src="<?php //print $theme_path;?>/logo.png" alt=""></a> <a href="index.html#" class="mobile-sidebar-button mobile-sidebar-toggle"><span></span></a> -->
        <nav class="nav">
        <?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('id' => 'main-menu', 'class' => array('sf-menu')), 'heading' => t(''))); ?>
        </nav>
      </div>
    </div>
    <!-- end .uou-block-2b -->
  </div>

  <div class="profile-bnr sub-bnr user-profile-bnr">
    <div class="position-center-center">
      <div class="container">
        <?php print render($title_prefix); ?>
          <?php if ($title): ?><h2 class="title" id="page-title"><?php print $title; ?></h2><?php endif; ?>
        <?php print render($title_suffix); ?>
      </div>

    </div>
  </div>

  <div class="container content-wrapper">
   <div class="row">
      <div class="col-md-12 mar-30-h">
          <?php if ($tabs): ?><?php print render($tabs); ?><?php endif; ?>
      </div>
   </div>

   <div class="row">
    <?php if ($page['sidebar_first']): ?>
      <div id="sidebar-first" class="col-md-3">
        <?php print render($page['sidebar_first']); ?>
      </div>
    <?php endif; ?>

    <div class="pages <?php echo $page_class; ?>">
      <?php print $messages; ?>
      <?php print render($page['content']); ?>
    </div>

    <?php if ($page['sidebar_second']): ?>
      <div id="sidebar-second" class="col-md-3">
        <?php print render($page['sidebar_second']); ?>
      </div>
    <?php endif; ?>
  </div>

   </div>
  </div>

</div>

<!-- Footer -->
<div class="uou-block-4e">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-6"> <a href="index.html#" class="logo"><img src="<?php print $theme_path;?>/logo.png" alt=""></a>
        <ul class="contact-info has-bg-image contain" data-bg-image="images/footer-map-bg.png">
          <li> <i class="fa fa-map-marker"></i>
            <address>
            795 Folsom Ave, Suite 600, San Francisco, CA 94107
            </address>
          </li>
          <li> <i class="fa fa-phone"></i> <a href="tel:#">(123) 456-7890</a> </li>
          <li> <i class="fa fa-envelope"></i> <a href="mailto:#">first.last@example.com</a> </li>
        </ul>
      </div>
      <div class="col-md-3 col-sm-6">
        <h5>Twitter Feed</h5>
        <ul class="twitter-feed">
          <li> RT <a href="index.html#">@no1son</a>: Now this <a href="index.html#">http://t.co/TSfMW1qMAW</a> is one hell of a stunning site!!! Awesome work guys <a href="index.html#">@AIRNAUTS</a> <a href="index.html#" class="time">May 25</a> </li>
          <li> Check out the wordpress version of Tucson - <a href="index.html#">http://t.co/sBlU3GbapT</a> <a href="index.html#" class="time">May 22</a> </li>
        </ul>
      </div>
      <div class="col-md-3 col-sm-6">
        <h5>Photostream</h5>
        <ul class="photos-list">
          <li><img src="<?php print $theme_path;?>/images/photostream4.jpg" alt=""></li>
          <li><img src="<?php print $theme_path;?>/images/photostream6.jpg" alt=""></li>
          <li><img src="<?php print $theme_path;?>/images/photostream3.jpg" alt=""></li>
          <li><img src="<?php print $theme_path;?>/images/photostream2.jpg" alt=""></li>
          <li><img src="<?php print $theme_path;?>/images/photostream1.jpg" alt=""></li>
          <li><img src="<?php print $theme_path;?>/images/photostream.jpg" alt=""></li>
        </ul>
      </div>
      <div class="col-md-3 col-sm-6">
        <h5>Newsletter</h5>
        <p>Subscribe to our newsletter to receive our latest news and updates. We do not spam.</p>
        <form class="newsletter-form" action="index.html#">
          <input type="email" placeholder="Enter your email address">
          <a href="<?php print $front_page; ?>" class="btn btn-primary" >Subscribe</a>
          <!-- <input type="submit" class="btn btn-primary" value="Subscribe"> -->
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end .uou-block-4e -->

<div class="uou-block-4a secondary dark">
  <div class="container">
    <ul class="links">
      <li><a href="#">Privacy Policy</a></li>
      <li><a href="#">Terms &amp; Conditions</a></li>
    </ul>
    <p>Copyright &copy; 2016 </p>  
  </div>
</div>
<!-- end .uou-block-4a -->

<div class="uou-block-11a">
  <h5 class="title">Menu</h5>
  <a href="index.html#" class="mobile-sidebar-close">&times;</a>
  <nav class="main-nav">
    <ul>
      <li class="active"><a href="index.html">Index</a></li>
      <li> <a href="listing-filter.html">Professionals</a> </li>
      <li><a href="profile_company.html">Profile Company</a></li>
      <li><a href="profile_company-no-tabs.html">Profile Company No Tabs</a></li>
      <li><a href="user-dashboard(connections)(hotkeys-disabled).html">User Dashboard 1</a></li>
      <li><a href="user-dashboard(connections)(hotkeys-enabled).html">User Dashboard 2</a></li>
      <li><a href="user-dashboard(followers).html">User Dashboard 3</a></li>
      <li><a href="user-dashboard(following).html">User Dashboard 4</a></li>
      <li><a href="blog-post.html">Blog Post</a></li>
      <li> <a href="user-profile(layout-1).html">User Profile</a></li>
      <li><a href="blog.html">Blog</a></li>
      <li><a href="gui-kit.html">GUI KIT</a></li>
    </ul>
  </nav>
  <hr>
</div>

