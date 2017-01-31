<?php
/**
 * Implements hook_form_FORM_ID_alter().
 *
 * @param $form
 *   The form.
 * @param $form_state
 *   The form state.
 */
function responsive_form_system_theme_settings_alter(&$form, &$form_state) {

  $form['resp_settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('Responsive Theme Settings'),
    '#collapsible' => FALSE,
    '#collapsed' => FALSE,
  );
  $form['resp_settings']['GKPS logo'] = array(
      '#type' => 'fieldset',
        '#title' => t('GKPS Logo'),
        '#collapsible' => FALSE,
        '#collapsed' => FALSE,
  );
    $form['resp_settings']['GKPS logo']['logo_tahunan_path'] = array(
      '#type' => 'textfield',
      '#title' => t('Path to "logo tahunan"'),
      '#default_value' => theme_get_setting('logo_tahunan_path', 'responsive'),
    );
    $form['resp_settings']['GKPS logo']['logo_gkps_path'] = array(
      '#type' => 'textfield',
      '#title' => t('Path to "logo GKPS"'),
      '#default_value' => theme_get_setting('logo_gkps_path', 'responsive'),
    );
    $form['resp_settings']['GKPS logo']['bg_body'] = array(
      '#type' => 'file',
      '#title' => t('Upload background image'),
      '#maxlength' => 40,
      '#description' => t("Make sure to naming your image file as 'bg_body.jpg' with minimum size 1920x1000")
    );
  $form['resp_settings']['header_color'] = array(
      '#type' => 'textfield',
    '#title' => t('Header Color'),
    '#default_value' => theme_get_setting('header_color','responsive'),
    '#description' => t("Color for <em>Header background</em>. You can use normal string like 'green', 'blue', or 'red'. Or use machine string like '#ffffff', '#dd55ee'. See for reference. And for multiple color (gradient) please use coma as color separator eg. 'red,blue' "),
      '#size' => 20,
    '#required' => false,
  );
  $form['resp_settings']['copyright_color'] = array(
      '#type' => 'textfield',
    '#title' => t('Copyright Color'),
    '#default_value' => theme_get_setting('copyright_color','responsive'),
    '#description' => t("Color for <em>Copyright background</em>. You can use normal string like 'green', 'blue', or 'red'. Or use machine string like '#ffffff', '#dd55ee'. See for reference. And for multiple color (gradient) please use coma as color separator eg. 'red,blue' "),
      '#size' => 20,
    '#required' => false,
  );
  $form['resp_settings']['breadcrumbs'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show breadcrumbs in a page'),
    '#default_value' => theme_get_setting('breadcrumbs','responsive'),
    '#description'   => t("Check this option to show breadcrumbs in page. Uncheck to hide."),
  );
  $form['resp_settings']['slideshow'] = array(
    '#type' => 'fieldset',
    '#title' => t('Front Page Slideshow'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  $form['resp_settings']['slideshow']['slideshow_display'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show slideshow'),
    '#default_value' => theme_get_setting('slideshow_display','responsive'),
    '#description'   => t("Check this option to show Slideshow in front page. Uncheck to hide."),
  );
    $form['resp_settings']['slideshow']['slide'] = array(
    '#markup' => t('You can change the description and URL of each slide in the following Slide Setting fieldsets.'),
  );
  $form['resp_settings']['slideshow']['slide1'] = array(
    '#type' => 'fieldset',
    '#title' => t('Slide 1'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  $form['resp_settings']['slideshow']['slide1']['slide1_desc'] = array(
    '#type' => 'textfield',
    '#title' => t('Slide Description'),
    '#default_value' => theme_get_setting('slide1_desc','responsive'),
  );
  $form['resp_settings']['slideshow']['slide1']['slide1_url'] = array(
    '#type' => 'textfield',
    '#title' => t('Slide URL'),
    '#default_value' => theme_get_setting('slide1_url','responsive'),
  );
  $form['resp_settings']['slideshow']['slide2'] = array(
    '#type' => 'fieldset',
    '#title' => t('Slide 2'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  $form['resp_settings']['slideshow']['slide2']['slide2_desc'] = array(
    '#type' => 'textfield',
    '#title' => t('Slide Description'),
    '#default_value' => theme_get_setting('slide2_desc','responsive'),
  );
  $form['resp_settings']['slideshow']['slide2']['slide2_url'] = array(
    '#type' => 'textfield',
    '#title' => t('Slide URL'),
    '#default_value' => theme_get_setting('slide2_url','responsive'),
  );
  $form['resp_settings']['slideshow']['slide3'] = array(
    '#type' => 'fieldset',
    '#title' => t('Slide 3'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  $form['resp_settings']['slideshow']['slide3']['slide3_desc'] = array(
    '#type' => 'textfield',
    '#title' => t('Slide Description'),
    '#default_value' => theme_get_setting('slide3_desc','responsive'),
  );
  $form['resp_settings']['slideshow']['slide3']['slide3_url'] = array(
    '#type' => 'textfield',
    '#title' => t('Slide URL'),
    '#default_value' => theme_get_setting('slide3_url','responsive'),
  );
  $form['resp_settings']['slideshow']['slideimage'] = array(
    '#markup' => t('To change the Slide Images, Replace the slide-image-1.jpg, slide-image-2.jpg and slide-image-3.jpg in the images folder of the responsive theme folder.'),
  );
  $form['resp_settings']['socialicon'] = array(
    '#type' => 'fieldset',
    '#title' => t('Social Icon'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  $form['resp_settings']['socialicon']['socialicon_display'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show Social Icon'),
    '#default_value' => theme_get_setting('socialicon_display','responsive'),
    '#description'   => t("Check this option to show Social Icon. Uncheck to hide."),
  );
  $form['resp_settings']['socialicon']['twitter_url'] = array(
    '#type' => 'textfield',
    '#title' => t('Twitter Profile URL'),
    '#default_value' => theme_get_setting('twitter_url', 'responsive'),
	  '#description'   => t("Enter your Twitter Profile URL. Leave blank to hide."),
  );
  $form['resp_settings']['socialicon']['facebook_url'] = array(
    '#type' => 'textfield',
    '#title' => t('Facebook Profile URL'),
    '#default_value' => theme_get_setting('facebook_url', 'responsive'),
	  '#description'   => t("Enter your Facebook Profile URL. Leave blank to hide."),
  );
  $form['resp_settings']['socialicon']['googleplus_url'] = array(
    '#type' => 'textfield',
    '#title' => t('Google+ Profile URL'),
    '#default_value' => theme_get_setting('googleplus_url', 'responsive'),
	  '#description'   => t("Enter your Google+ Profile URL. Leave blank to hide."),
  );
  $form['resp_settings']['socialicon']['linkedin_url'] = array(
    '#type' => 'textfield',
    '#title' => t('LinkedIn Profile URL'),
    '#default_value' => theme_get_setting('linkedin_url', 'responsive'),
	  '#description'   => t("Enter your LinkedIn Profile URL. Leave blank to hide."),
  );
}
