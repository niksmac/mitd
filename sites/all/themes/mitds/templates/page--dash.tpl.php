<?php global $base_url; $theme_path = $base_url.'/'.drupal_get_path('theme', 'mitds');?>
<?php drupal_set_title($full_name); ?>
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
          <?php print render($page['main_menu_reg']); ?>
        </nav>
      </div>
    </div>
    <!-- end .uou-block-2b -->
  </div>

  <div class="profile-bnr user-profile-bnr">
      <div class="container">
        <div class="row">
           <div class="col-md-12">
          <div class="pull-left">
              <?php if ($full_name): ?>
                <h2 class="title" id="page-title"><?php print $full_name; ?></h2>
              <?php endif; ?>
              <?php if ($designation): ?>
                <h5><?php print $designation; ?></h5>
              <?php endif; ?>
          </div>
          <div class="right-top-bnr">
            <div class="connect">
              <div class="bt-ns"> <a href="#"><i class="fa fa-exclamation"></i> </a> </div>
            </div>
          </div>
          </div>
          <div class="col-md-12 tab-wrapper">
            <?php if ($tabs): ?><?php print render($tabs); ?><?php endif ?>
          </div>
        </div>
      </div>
  </div>

  <div class="container content-wrapper compny-profile">

    <?php print $messages; ?>

  <div class="row">
    <?php if ($page['sidebar_first']): ?>
      <div id="sidebar-first" class="col-md-3">
        <?php print render($page['sidebar_first']); ?>
      </div>
    <?php endif; ?>

    <div class="profile-main pages <?php echo $page_class; ?>">
      <div class="profile-company-content profile-in mar-top20">
        <?php print render($page['content']); ?>
      </div>
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
     <?php print render($page['footer']);  ?>
    </div>
    <div class="row">
     <div class="col-md-3">
      <?php if ($logo): ?>
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
          <img src="<?php print $theme_path;?>/logo.png" alt="<?php print t('Home'); ?>" />
        </a>
        <?php endif; ?>
     </div>
    </div>
  </div>
</div>
<!-- end .uou-block-4e -->

<div class="uou-block-4a secondary dark">
  <div class="container">
    <ul class="links">
      <li><a href="<?php echo url("node/358");?>">Privacy Policy</a></li>
      <li><a href="<?php echo url("node/348");?>">Terms &amp; Conditions</a></li>
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

