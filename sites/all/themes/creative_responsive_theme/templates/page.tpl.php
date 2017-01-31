<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to main-menu administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 */
$themes_path = drupal_get_path('theme', 'creative_responsive_theme');
?>

<header id="header" class="header-2">
    <div class="header-top">
        <div class="wrapper">
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <div class="header-info">
                    <div class="description-header">
                        Selamat datang di Organisasi HMSI
                    </div>
                    <div class="color-primary">
                        Berbeda tapi bersatu
                    </div>
		</div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <ul class="cont-share pull-right">
                    <li><span class="share-icon"><span class="ef social_facebook_square "></span></span></li>
                    <li><span class="share-icon"><span class="ef social_twitter_square "></span></span></li>
                    <li><span class="share-icon"><span class="ef social_youtube_square "></span></span></li>
                    <li><span class="share-icon"><span class="ef social_instagram_square "></span></span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="header-nav">
        <div class="wrapper">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <a href="." class="logo"></a>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6 cart-block-r">
                <div class="cart-block pull-right">
                    <a href="member.html" class="h-button text-uppercase pull-right">
                        <span class="cont-btn">
                            <span class="ef icon_documents"></span>
                            <span class="text-btn">Member</span>
                        </span>
                    </a>
		</div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-7 col-xs-12 nav-box">
                <span id="toggle-nav" class="ef icon_menu mobile-menu-toggle"></span>
		<nav class="nav-container">
                    <ul>
<!--                        <li class="search pull-right">
                            <form class="search-form form-inline" action="#" method="POST">
                                <div class="form-group">
                                    <label class="sr-only" for="searchQuery">Search...</label>
                                    <input type="search" class="search-field" id="searchQuery" placeholder="Search...">
                                </div>
                                <button type="submit" class="hidden"><span class="ef icon_search"></span></button>
                            </form>
                            <a class="iconSearch" href="#">
                                <span class="ef icon_search"></span>
                            </a>
			</li>-->
                        <li><a class="active" href=".">Beranda</a></li>
			<li><a class="#" href="tentang-kami.html">Tentang Kami</a>
                            <ul class="submenu">
                                <li>
                                    <a class="#" href="sambutan.html">Kata Sambutan</a>
                                </li>
                                <li>
                                    <a class="#" href="tugas.html">Tugas Dewan Pemimpin</a>
                                </li>
                            </ul>
                        </li>
			<li><a class="#" href="artikel.html">Artikel</a></li>
			<li><a class="#" href="galeri.html">Galeri</a></li>
			<li><a class="#" href="daftar.html">Daftar</a></li>
			<li><a class="#" href="donasi.html">Donasi</a></li>
			<li><a class="#" href="hubungi.html">Hubungi Kami</a></li>
                    </ul>
		</nav>
            </div>
        </div>
    </div>
</header>

<!--<div id="header_wrapper">
  <div id="inner_header_wrapper">

      <div class="menu_wrapper">
      <nav id="main-menu"  role="navigation">
        <a class="nav-toggle" href="#">Navigation</a>
        <div class="menu-navigation-container">
          <?php 
          if (module_exists('i18n')) {
            $main_menu_tree = i18n_menu_translated_tree(variable_get('menu_main_links_source', 'main-menu'));
          } else {
            $main_menu_tree = menu_tree(variable_get('menu_main_links_source', 'main-menu'));
          }
          print drupal_render($main_menu_tree);
          ?>
        </div>
        <div class="clear"></div>
      </nav> end main-menu 
    </div>
      
    <?php if (theme_get_setting('social_links', 'creative_responsive_theme')): ?>
      <div class="social-icons">
       <ul>
        <li><a href="<?php print $front_page; ?>/rss.xml"><img src="<?php print base_path() . drupal_get_path('theme', 'creative_responsive_theme') . '/images/rss.png'; ?>" alt="RSS Feed"/></a></li>
        <li><a href="http://www.facebook.com/<?php echo theme_get_setting('facebook_username', 'creative_responsive_theme'); ?>" target="_blank" rel="me"><img src="<?php print base_path() . drupal_get_path('theme', 'creative_responsive_theme') . '/images/facebook.png'; ?>" alt="Facebook"/></a></li>
        <li><a href="http://www.twitter.com/<?php echo theme_get_setting('twitter_username', 'creative_responsive_theme'); ?>" target="_blank" rel="me"><img src="<?php print base_path() . drupal_get_path('theme', 'creative_responsive_theme') . '/images/twitter.png'; ?>" alt="Twitter"/></a></li>
       </ul>
      </div>
    <?php endif; ?>

    <header id="header" role="banner">
      <?php if ($logo): ?><div id="logo"><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><img src="<?php print $logo; ?>"/></a></div>
      <?php endif; ?>
      <h1 id="site-title">
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a>
        <div id="site-description"><?php print $site_slogan; ?></div>
      </h1>
      <div class="clear"></div>
    </header>

    
  </div>
</div>-->
  
  <div id="container">

    <?php if ($is_front): ?>
      <?php print render($page['slideshow']); ?>
       <!-- Banner -->

       <?php if ($page['top_first'] || $page['top_second'] || $page['top_third']): ?> 
        <div id="top-area" class="clearfix">
          <?php if ($page['top_first']): ?>
          <div class="column"><?php print render($page['top_first']); ?></div>
          <?php endif; ?>
          <?php if ($page['top_second']): ?>
          <div class="column"><?php print render($page['top_second']); ?></div>
          <?php endif; ?>
          <?php if ($page['top_third']): ?>
          <div class="column"><?php print render($page['top_third']); ?></div>
          <?php endif; ?>
        </div>
      <?php endif; ?>
    <?php endif; ?>

    <div class="content-sidebar-wrap">

    <div id="content">
      <?php  if (theme_get_setting('breadcrumbs', 'creative_responsive_theme')): ?><div id="breadcrumbs"><?php if ($breadcrumb): print $breadcrumb; endif;?></div><?php endif;  ?>
      <section id="post-content" role="main">
        <?php print $messages; ?>
        <?php if (!empty($tabs['#primary'])): ?><div class="tabs-wrapper"><?php print render($tabs); ?></div><?php endif; ?>
        <?php print render($page['help']); ?>
        <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
        <?php print render($page['content']); ?>
      </section> <!-- /#main -->
    </div>
  
    <?php if ($page['sidebar_first']): ?>
      <aside id="sidebar-first" role="complementary">
        <?php print render($page['sidebar_first']); ?>
      </aside>  <!-- /#sidebar-first -->
    <?php endif; ?>
  
    </div>

    <?php if ($page['sidebar_second']): ?>
      <aside id="sidebar-second" role="complementary">
        <?php print render($page['sidebar_second']); ?>
      </aside>  <!-- /#sidebar-first -->
    <?php endif; ?>
  
</div>
      
<section class="full-width-box brands-2 bg-wrapper">
				<div class="wrapper wow fadeInDown top__element">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="section-title-box title-box-center wow pulse">
								<h2>Sponsor</h2>
							</div>
						<div id="owl-brends">
                                                    <div class="item"><img src="<?php echo $themes_path; ?>/images/sponsor/brand-1.jpg" alt="brand"></div>
                                                    <div class="item"><img src="<?php echo $themes_path; ?>/images/sponsor/brand-2.jpg" alt="brand"></div>
                                                    <div class="item"><img src="<?php echo $themes_path; ?>/images/sponsor/brand-3.jpg" alt="brand"></div>
                                                    <div class="item"><img src="<?php echo $themes_path; ?>/images/sponsor/brand-4.jpg" alt="brand"></div>
                                                    <div class="item"><img src="<?php echo $themes_path; ?>/images/sponsor/brand-5.jpg" alt="brand"></div>
						</div>
					</div>
				</div>
			</section>
      
<footer id="footer">
				<div class="footer-blocks">
					<div class="wrapper">
						<div class="row-footer">
							<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 wow fadeInLeft">
							<h4>Subscribe Newsletter</h4>
								<div class="f-b-box">
									<div class="f-subscribe">
										<div id="mc_embed_signup">
											<form action="//templines.us9.list-manage.com/subscribe/post?u=fe9a9cfcf8d73763bcc53f206&amp;id=319cafcc43" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
												<div id="mc_embed_signup_scroll">
													<div class="mc-field-group">
														<input type="email" value="#" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Enter your email">
													</div>
													<div id="mce-responses" class="clear">
														<div class="response" id="mce-error-response" style="display:none"></div>
														<div class="response" id="mce-success-response" style="display:none"></div>
													</div>
													<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
													<div style="position: absolute; left: -5000px;">
														<input type="text" name="b_fe9a9cfcf8d73763bcc53f206_319cafcc43" tabindex="-1" value="#">
													</div>
													<div class="clear">
														<button type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe"   class="btn btn-primary btn-icon-right"><span class="btn-icon"><i class="fa icon_mail_alt "></i></span> </button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 wow fadeInUp">
								<h4 class="border">Latest Tweets</h4>
								<div class="f-b-box">
									<ul class="lat-tw">
										<li>
											<span class="ef social_twitter_circle"></span>
											<div class="tw-message">
												Cras augues ipsum mpharetra inter integ anterl nuno <a href=".">http://t.co/JGwd</a>
											</div>
											<div class="tw-time">1 minute ago</div>
										</li>
										<li>
											<span class="ef social_twitter_circle"></span>
											<div class="tw-message">
												Cras augues ipsum mpharetra inter integ anterl nuno <a href=".">http://t.co/JGwd</a>
											</div>
											<div class="tw-time">35 minute ago</div>
										</li>
										<li>
											<span class="ef social_twitter_circle"></span>
											<div class="tw-message">
												Cras augues ipsum mpharetra inter integ anterl nuno <a href=".">http://t.co/JGwd</a>
											</div>
											<div class="tw-time">2 hours ago</div>
										</li>
									</ul>
								</div>
							</div>
							<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 wow fadeInUp">
								<h4 class="border">instagram Feed</h4>
								<div class="f-b-box">
									<div class="i-row">
										<div class="box-i-image">
											<a href="." class="i-image">
												<img src="<?php echo $themes_path; ?>/images/instagram/in1.jpg" alt="instagramm"/>
											</a>
										</div>
										<div class="box-i-image">
											<a href="." class="i-image">
												<img src="<?php echo $themes_path; ?>/images/instagram/in2.jpg" alt="instagramm"/>
											</a>
										</div>
										<div class="box-i-image">
											<a href="." class="i-image">
												<img src="<?php echo $themes_path; ?>/images/instagram/in3.jpg" alt="instagramm"/>
											</a>
										</div>
									</div>
									<div class="i-row">
										<div class="box-i-image">
											<a href="." class="i-image">
												<img src="<?php echo $themes_path; ?>/images/instagram/in1.jpg" alt="instagramm"/>
											</a>
										</div>
										<div class="box-i-image">
											<a href="." class="i-image">
												<img src="<?php echo $themes_path; ?>/images/instagram/in2.jpg" alt="instagramm"/>
											</a>
										</div>
										<div class="box-i-image">
											<a href="." class="i-image">
												<img src="<?php echo $themes_path; ?>/images/instagram/in3.jpg" alt="instagramm"/>
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 wow fadeInRight">
								<h4 class="border">Contact Info</h4>
								<div class="f-b-box">
									<div class="contact-f-wrapper">
										<div class="f-contact-box">
											<span class="contact-name">
												Alamat:
											</span>
											<span class="contact-info">
												Jl. Cimandiri No.6 Menteng Jakarta Pusat 10330
											</span>
										</div>
										<div class="f-contact-box">
											<span class="contact-name">
												No Telepon:
											</span>
											<span class="contact-info">
												021-21390242
											</span>
										</div>
										<div class="f-contact-box">
											<span class="contact-name">
												Telepon Kantor:
											</span>
											<span class="contact-info">
												021-21390242
											</span>
										</div>
										<div class="f-contact-box">
											<span class="contact-name">
												Email:
											</span>
											<span class="contact-info">
												info@hmsi.com
											</span>
										</div>
									</div>

									<a class="btn btn-border dark" href="."><span>Send Message</span></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="footer-bottom">
					<div class="wrapper">
						<div class="row-footer">
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 wow fadeInLeft">
								<span class="copiright">
									Copyright © <?php echo date("Y");?>, HMSI
								</span>
							</div>
						</div>
					</div>
				</div>
			</footer>  
      <script src="<?php echo $themes_path; ?>/plugins/switcher/js/bootstrap-select.js"></script> 
		<script src="<?php echo $themes_path; ?>/plugins/switcher/js/evol.colorpicker.min.js" type="text/javascript"></script> 
		<script src="<?php echo $themes_path; ?>/plugins/switcher/js/dmss.js"></script>
		
                <script src="<?php echo $themes_path; ?>/js/jquery-ui.min.js"></script>
		<script src="<?php echo $themes_path; ?>/js/modernizr.custom.js"></script>
		<script src="<?php echo $themes_path; ?>/js/smoothscroll.min.js"></script>
		<script src="<?php echo $themes_path; ?>/js/wow.min.js"></script>

		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->    

		<!--Owl Carousel-->
		<script src="<?php echo $themes_path; ?>/plugins/owl-carousel/owl.carousel.min.js"></script>
		<script src="<?php echo $themes_path; ?>/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
		<script src="<?php echo $themes_path; ?>/js/waypoints.min.js"></script>
		<script src="<?php echo $themes_path; ?>/js/jquery.easypiechart.min.js"></script>
		<script src="<?php echo $themes_path; ?>/js/func.js"></script>