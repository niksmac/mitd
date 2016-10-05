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


          <?php if (user_is_logged_in()) : ?>
          <ul class="authentication">
            <li><a href="<?php print url("user"); ?>"><span>My Account</span></a></li>
            <li><a href="<?php print url("user/logout"); ?>">Logout</a></li>
          </ul>
          <?php endif; ?>

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

  <!-- HOME PRO-->
  <div class="home-pro">

    <!-- PRO BANNER HEAD -->
    <div class="banr-head">
      <div class="container">
        <div class="row">

          <!-- CONTENT -->
          <div class="col-sm-7">
            <div class="text-area">
              <div class="position-center-center col-md-10">
                <h1>MakeITDeals is a global Market Place for Technology Buyers and Sellers.</h1>
                <h6>Perfect search engine with Keyword Research, verified and secured database of Technology partners and deals with the end-to-end business solution procurement process. </h6>
              </div>
            </div>
          </div>

          <!-- FORM SECTION -->
          <div class="col-sm-5">
            <?php if (! user_is_logged_in()) : ?>
            <div class="login-sec">

              <!-- TABS -->
              <div class="uou-tabs">
                <ul class="tabs">
                  <li><a href="<?php print url("user/register"); ?>">Register Now</a></li>
                  <li class="active log-in">Member Login</li>
                </ul>


                <div class="content">
                  <!-- LOGIN -->
                  <div id="log-in" class="active">
                   <div class="col-md-12"><?php print $messages; ?></div>
                   <?php
                    $elements = drupal_get_form("user_login");
                    $form = drupal_render($elements);
                    echo $form;
                    ?>
                  </div>
                  <div id="forget">
                    <form>
                      <input type="email" placeholder="Email Address">
                      <button type="submit">Login</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <?php else: ?>
            <div class="login-sec"></div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>

    <!-- SERVICES -->
    <section class="services">

      <!-- SERVICES ROW -->
      <ul class="row">

        <!-- SECTION -->
        <li class="col-md-4">
          <div class="ser-inn">
          <i class="fa fa-globe"></i>
            <h4>Powerful Search Engine</h4>
            <i class="fa fa-globe big"></i>
            <p>Advanced and user friendly search engine to enable the Buyer to get to a short list of Sellers offering the relevant solution on a global basis with ease and speed.Thus we stay in connect them with.</p>
          </div>
        </li>

        <!-- SECTION -->
        <li class="col-md-4">
          <div class="ser-inn">
            <i class="fa fa-book"></i>
            <h4>Security</h4>
            <i class="fa fa-book big"></i>
            <p>MakeITDeals offers the highest-level encryption and security technology in order to protect client information posted on the platform. Our servers are housed in nondescript buildings and access is strictly controlled.</p>
          </div>
        </li>

        <!-- SECTION  -->
        <li class="col-md-4">
          <div class="ser-inn">
          <i class="fa fa-picture-o"></i>
            <h4>Deal Teasers</h4>
            <i class="fa fa-picture-o big"></i>
            <p>MakeITDeals digital teaser technology presents deal content in an elegant and user-friendly format. We've worked with industry experts to incorporate best practices in project marketing. 
            </p>
          </div>
        </li>
      </ul>
    </section>

    <!-- PRO SECTION -->
    <section class="pro-content">
      <div class="container-fluid">
        <div class="row">

          <!-- PRO IMAGE -->
          <div class="col-md-6 pro-inside" style="background:url(<?php print $theme_path;?>/images/pro-img-1.jpg) center center no-repeat;"></div>

          <!-- PRO CONTENT -->
          <div class="col-md-6 pro-inside">
            <div class="position-center-center col-md-6">
              <h1>Interact with other
                professionals</h1>
              <p> Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                accusantium doloremque laudantium, totam rem aperiam,
                eaque ipsa quae ab illo inventore veritatis et quasi architecto
                beatae vitae dicta sunt explicabo. </p>
            </div>
          </div>
        </div>
      </div>
      <!-- PRO SECTION -->
      <div class="container-fluid">
        <div class="row">

          <!-- PRO TEXT -->
          <div class="col-md-6 pro-inside">
            <div class="position-center-center col-md-6">
              <h1>Collaborate on a
                project</h1>
              <p> Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                accusantium doloremque laudantium, totam rem aperiam,
                eaque ipsa quae ab illo inventore veritatis et quasi architecto
                beatae vitae dicta sunt explicabo. </p>
            </div>
          </div>

          <!-- PRO BACKGROUND -->
          <div class="col-md-6 pro-inside" style="background:url(<?php print $theme_path;?>/images/pro-img-2.jpg) center center no-repeat;"></div>
        </div>
      </div>


    </section>

    <!-- APP IMAGE -->
    <section class="app-images">
      <div class="container">
        <div class="row">

          <!-- TEXT -->
          <div class="col-md-6 text-center text-area">
            <h1>SocialMe for your
              Smartphone</h1>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem
              accusantium doloremque laudantium, totam rem aperiam,
              eaque ipsa quae ab illo inventore veritatis et quasi architecto
              beatae vitae dicta sunt explicabo. </p>
            <a href="index.html#."><i class="fa fa-apple"></i> App Store</a> </div>

          <!-- APP IMAGE -->
          <div class="col-md-6 text-right"><img src="<?php print $theme_path; ?>/images/app-img.png" alt="" > </div>
        </div>
      </div>
    </section>

    <!-- TESTIMONIALS -->
    <section class="clients-says">
      <div class="container">
        <h3 class="section-title">what our users say </h3>
        <div class="testi">
          <div class="texti-slide">
            <!-- SLide -->
            <div class="clints-text">
              <div class="text-in">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue.</p>
              </div>
              <div class="avatar">
                <div class="media-left"> <a href="index.html#."> <img src="<?php print $theme_path;?>/images/clients-avatar-1.jpg" alt=""> </a> </div>
                <div class="media-body">
                  <h6>John Kevin Mara</h6>
                  <span>loremipsum.com</span> </div>
              </div>
            </div>

            <!-- SLide -->
            <div class="clints-text">
              <div class="text-in">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue.</p>
              </div>
              <div class="avatar">
                <div class="media-left"> <a href="index.html#."> <img src="<?php print $theme_path;?>/images/clients-avatar-1.jpg" alt=""> </a> </div>
                <div class="media-body">
                  <h6>John Kevin Mara</h6>
                  <span>loremipsum.com</span> </div>
              </div>
            </div>

            <!-- SLide -->
            <div class="clints-text">
              <div class="text-in">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue.</p>
              </div>
              <div class="avatar">
                <div class="media-left"> <a href="index.html#."> <img src="<?php print $theme_path;?>/images/clients-avatar-1.jpg" alt=""> </a> </div>
                <div class="media-body">
                  <h6>John Kevin Mara</h6>
                  <span>smashingmagazine.com</span> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- sponsors -->
    <div class="sponsors" style="background:url(<?php print $theme_path;?>/images/sponser-bg.jpg) no-repeat;">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="section-title">Our Sponsors</h3>
            <div class="sponsors-slider">
              <div class="item"><img src="<?php print $theme_path;?>/images/sponsor_logo1.png" alt="" class="img-responsive"></div>
              <div class="item"><img src="<?php print $theme_path;?>/images/sponsor_logo2.png" alt="" class="img-responsive"></div>
              <div class="item"><img src="<?php print $theme_path;?>/images/sponsor_logo3.png" alt="" class="img-responsive"></div>
              <div class="item"><img src="<?php print $theme_path;?>/images/sponsor_logo4.png" alt="" class="img-responsive"></div>
              <div class="item"><img src="<?php print $theme_path;?>/images/sponsor_logo5.png" alt="" class="img-responsive"></div>
              <div class="item"><img src="<?php print $theme_path;?>/images/sponsor_logo6.png" alt="" class="img-responsive"></div>
              <div class="item"><img src="<?php print $theme_path;?>/images/sponsor_logo4.png" alt="" class="img-responsive"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Footer -->
<div class="uou-block-4e">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-6">
      <!-- <a href="index.html#" class="logo">
        <img src="<?php //print $theme_path;?>/logo.png" alt="">
      </a> -->
      <?php if ($logo): ?>
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
          <img src="<?php print $theme_path;?>/logo.png" alt="<?php print t('Home'); ?>" />
        </a>
        <?php endif; ?>
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
