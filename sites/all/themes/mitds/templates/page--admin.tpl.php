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
        <nav class="nav">
          <?php print render($page['main_menu_reg']); ?>
        </nav>
      </div>
    </div>
    <!-- end .uou-block-2b -->
  </div>

  <div class="profile-bnr-admin">
      <div class="container">
        <div class="row">
           <div class="col-md-12">
            <div class="pull-left">
                  <h2 class="title" id="page-title">Admin Panel</h2>
            </div>
            <div class="right-top-bnr">
              <div class="connect">
                <h5><?php print $title; ?></h5>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>

  <div class="profile-bnr-tabs">
    <div class="container">
      <div class="row">
        <?php if ($tabs): ?><?php print render($tabs); ?><?php endif ?>
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

<div class="uou-block-4a secondary dark">
  <div class="container">
    <p>Copyright &copy; 2016 </p>
  </div>
</div>
<!-- end .uou-block-4a -->



