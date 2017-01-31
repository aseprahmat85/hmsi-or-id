<?php
global $base_url;
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
 * - $is_admin: TRUE if the user has permission to access administration pages.
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
//print_r($logo);
//print_r(theme_get_setting('logo_tahunan_path', 'responsive'));echo '<br>';
//print_r(theme_get_setting('logo_gkps_path', 'responsive'));exit;
?>

<div class="container" id="header-contain">

  <header id="head" role="banner">
      <div class="eleven columns omega" id="headright">
      <div id="logo">
        <?php if ($logo): ?><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><img src="<?php echo $base_url;?>/<?php echo theme_get_setting('logo_gkps_path', 'responsive'); ?>" alt="<?php print t('Home'); ?>"/></a><?php endif; ?>
        <?php if ($logo): ?><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><img src="<?php echo $base_url;?>/<?php echo theme_get_setting('logo_tahunan_path', 'responsive'); ?>" alt="<?php print t('Home'); ?>"/></a><?php endif; ?>
        <?php if ($site_slogan): ?><div class="site-slogan"><?php print $site_slogan; ?></div>site slogan<?php endif; ?>
       </div>
      
      <nav id="navigation" role="navigation">
      <div id="main-menu">
        <?php 
          if (module_exists('i18n')) {
            $main_menu_tree = i18n_menu_translated_tree(variable_get('menu_main_links_source', 'main-menu'));
          } else {
            $main_menu_tree = menu_tree(variable_get('menu_main_links_source', 'main-menu'));
          }
          print drupal_render($main_menu_tree);
        ?>
       </div>
      </nav>
     </div>
  </header>
</div>
<?php if($page['runningtext']): ?>
<div class="container" id="header-contain">
<?php print render($page['runningtext']); ?>
</div>
<?php endif; ?>
<div class="container" id="content-contain">

  <?php if ($is_front): ?>
    <div class="container">
    <?php if (theme_get_setting('slideshow_display', 'responsive')): ?>
      <!-- Slides -->
      <?php 
      
      // getting banner
      $query = db_select('node', 'n');
      $query->addField('bc', 'field_banner_caption_value');
      $query->addField('bi', 'field_banner_image_fid');
      $query->addField('bu', 'field_banner_url_value');
      $query->leftJoin('field_data_field_banner_caption', 'bc', 'n.nid = bc.entity_id');
      $query->leftJoin('field_data_field_banner_image', 'bi', 'n.nid = bi.entity_id');
      $query->leftJoin('field_data_field_banner_url', 'bu', 'n.nid = bu.entity_id');
      $query->condition('n.type', 'banner');
      $query->condition('n.status', '1');
      
      $result = $query->execute();
      $sliderimage = "";
      while($data = $result->fetchAssoc()){
          $image = file_load($data['field_banner_image_fid']);
          $sliderimage .= '
            <li>
                <a href="'. ((isset($data['field_banner_url_value']) && !empty($data['field_banner_url_value'])) ? $data['field_banner_url_value'] : '#' ) .'">' .
                    '<img width="100%" height="400" src="'. $base_url . '/' . str_replace('public:/', variable_get('file_public_path', conf_path() . '/files'), $image->uri) .'"/></a>' .
                (((isset($data['field_banner_caption_value'])) && (!empty($data['field_banner_caption_value']))) ? '<div class="flex-caption"> <h3> '. $data['field_banner_caption_value'].' </h3> </div>' : '') .
            '</li>';
      }
      ?>
     <div class="flexslider">
      <ul class="slides">
        <?php echo $sliderimage; ?>
      </ul>
      </div>
     <?php endif; ?>
        
      <?php if ($page['front_welcome']): ?>
        <div id="front-welcome"> <?php print render($page['front_welcome']); ?></div>
      <?php endif; ?>
    </div>
  <?php endif; ?>
  
    
  
  <?php if ($page['header']): ?>
   <div id="header" class="sixteen columns">
    <?php print drupal_render($page['header']); ?>
   </div>
   <div class="clear"></div>
   <?php endif; ?>
  
 <?php if($page['sidebar_first']) { $contentwid= "eleven"; } else { $contentwid= "sixteen"; } ?>
 
 <div id="content" class="<?php print $contentwid; ?> columns">
  <div id="breadcrumbs"><?php if (theme_get_setting('breadcrumbs', 'responsive')): ?><?php if ($breadcrumb): print $breadcrumb; endif;?><?php endif; ?></div>
   <section id="post-content" role="main">
    <?php print $messages; ?>
    <?php if ($page['content_top']): ?><div id="content_top"><?php print render($page['content_top']); ?></div><?php endif; ?>
    <?php print render($title_prefix); ?>
    <?php if ($title): ?><h1 class="page-title"><?php print $title; ?></h1><?php endif; ?>
    <?php print render($title_suffix); ?>
    <?php if (!empty($tabs['#primary'])): ?><div class="tabs-wrapper"><?php print render($tabs); ?></div><?php endif; ?>
    <?php print render($page['help']); ?>
    <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
    <?php print render($page['content']); ?>
  </section> <!-- /#main -->
 </div>

  <?php if ($page['sidebar_first']): ?>
    <aside id="sidebar-first" role="complementary" class="sidebar five columns">
      <?php print render($page['sidebar_first']); ?>
    </aside>  <!-- /#sidebar-first -->
  <?php endif; ?>

  <div class="clear"></div>
  
  <?php if ($page['footer']): ?>
   <div id="foot" class="sixteen columns">
     <?php print render($page['footer']) ?>
   </div>
   <?php endif; ?>
  
</div>
 
<?php if ($page['footer_first'] || $page['footer_second'] || $page['footer_third'] || $page['footer_fourth']): ?> 
  <div id="bottom" class="container">
  <?php $botomwid = "four"; $bottom = ((bool) $page['footer_first'] + (bool) $page['footer_second'] + (bool) $page['footer_third'] + (bool) $page['footer_fourth']);
    switch ($bottom) { 
      case 1: $botomwid = "sixteen"; break; case 2: $botomwid = "eight"; break;
      case 3: $botomwid = "five"; break; case 4: $botomwid = "four";
    } ?>
    <?php if ($page['footer_first']): ?>
    <div class="<?php print $botomwid; ?> columns botblck"><?php print render($page['footer_first']); ?></div>
    <?php endif; ?>
    <?php if ($page['footer_second']): ?>
    <div class="<?php print $botomwid; ?> columns botblck"><?php print render($page['footer_second']); ?></div>
    <?php endif; ?>
    <?php if ($page['footer_third']): ?>
    <div class="<?php print $botomwid; ?> columns botblck"><?php print render($page['footer_third']); ?></div>
    <?php endif; ?>
    <?php if ($page['footer_fourth']): ?>
    <div class="<?php print $botomwid; ?> columns botblck"><?php print render($page['footer_fourth']); ?></div>
    <?php endif; ?>
    </div>
<?php endif; ?>
  
<div id="copyright" class="container">
 <div class="credit"><?php print t('Copyright'); ?> &copy; <?php echo date("Y"); ?>, <?php print $site_name; ?></div>
  <div class="clear"></div>
</div>