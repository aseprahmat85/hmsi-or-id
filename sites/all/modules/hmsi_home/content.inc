<?php

function article_list (){
    $headers = array(
        'title'     => array('data' => t('Judul'), 'type' => 'none', 'property' => 'title'),
        'author'    => array('data' => t('Penulis'), 'type' => 'none', 'property' => 'author'),
        'created'   => array('data' => t('Tanggal'), 'type' => 'none', 'property' => 'created'),
        
    );
    $search_keyword = isset($_GET['search_keyword']) ? $_GET['search_keyword'] : '';
    
    $list = article_load(
            25, 
            $headers, 
            $search_keyword);
    $rows = array();
    foreach((array)$list as $value){
        $rows[] = array(
            l($value->title, 'artikel/' . $value->nid),
            $value->name, 
            date("d M Y H:i:s", $value->created));
    }
    
    $seacrh_form = drupal_get_form('article_search_form');
    
    return drupal_render($seacrh_form) . theme('table', array('header' => $headers, 'rows' => $rows)) . theme('pager', array());
}

/*
 * article_load
 * @author  Asep Rahmat
 * **/
function article_load($rowsperpage = 25, $headers = array(), $search_keyword = '') {
  $tableutama = db_select('node', 'n');
  $tableutama->join("users", "u", "u.uid = n.uid");
  $query = $tableutama->fields('n', array('nid', 'title', 'created', 'type'))
    ->fields('u', array('name', 'mail'))
    ->condition('n.type', 'article')
    ->condition('n.status', 1);
  if(!empty($search_keyword)){
    $query->condition('n.title', "%$search_keyword%", 'LIKE');
  }
    $query->extend('PagerDefault')
        ->limit($rowsperpage);
    
    $results = $query->execute()->fetchAll();
    return $results;
}

function galeri_list (){
    $headers = array(
        'title'     => array('data' => t('Judul'), 'type' => 'none', 'property' => 'title'),
        'image'     => array('data' => t('')),
        'author'    => array('data' => t('Pengunduh'), 'type' => 'none', 'property' => 'author'),
        'location'  => array('data' => t('Lokasi')),
        'created'   => array('data' => t('Tanggal'), 'type' => 'none', 'property' => 'created'),
        
    );
    $search_keyword = isset($_GET['search_keyword']) ? $_GET['search_keyword'] : '';
    
    $list = galeri_load(
            25, 
            $headers, 
            $search_keyword);
    $rows = array();
    foreach((array)$list as $value){
        $image_node = node_load($value->nid);
        if(isset($image_node->field_galery_images['und'][0]['fid'])){
            $image_div = "<img src='".image_style_url("seratus", $image_node->field_galery_images['und'][0]['uri'])."'></div>";
        }else{
            $image_div = "";
        }
//        echo "<pre>".print_r($image_node, true)."</pre>";
        $rows[] = array(
            l($value->title, drupal_get_path_alias('node/'.$value->nid)),
            $image_div,
            $value->name, 
            (isset($image_node->field_location['und'][0]['value']) ? $image_node->field_location['und'][0]['value'] : ""), 
            date("d M Y H:i:s", $value->created));
    }
    
    $seacrh_form = drupal_get_form('article_search_form');
    
    return drupal_render($seacrh_form) . theme('table', array('header' => $headers, 'rows' => $rows)) . theme('pager', array());
}

/*
 * article_load
 * @author  Asep Rahmat
 * **/
function galeri_load($rowsperpage = 25, $headers = array(), $search_keyword = '') {
  $tableutama = db_select('node', 'n');
  $tableutama->join("users", "u", "u.uid = n.uid");
  $query = $tableutama->fields('n', array('nid', 'title', 'created', 'type'))
    ->fields('u', array('name', 'mail'))
    ->condition('n.type', 'image_galery')
    ->condition('n.status', 1);
  if(!empty($search_keyword)){
    $query->condition('n.title', "%$search_keyword%", 'LIKE');
  }
    $query->extend('PagerDefault')
        ->limit($rowsperpage);
    
    $results = $query->execute()->fetchAll();
    return $results;
}

function article_search_form($form, &$form_state){
    $form = array();
    
    $form['article_search_form']['search_keyword'] = array(
        '#type'             => 'textfield',
        '#title'            => t('Pencarian dengan kata kunci: '),
        '#default_value'    => '',
        '#value'            => isset($_GET['search_keyword']) ? $_GET['search_keyword'] : '',
        '#attributes'        => array('onChange' => array('document.getElementById(\'article-search-form\').submit()'))
    );
    
    $form['article_search_form']['search_submit'] = array(
        '#type'     => 'submit',
        '#title'    => t('Cari'),
        '#value'    => 'Cari',
        '#attributes' => array('style' => array('display:none'))
    );
    $form['#method'] = 'get';
    return $form;
}

/**
 * built a home page
 */
function tentang_kami(){
    // get a page
    $nids = db_select('node', 'n')
    ->fields('n', array('nid'))
    ->fields('n', array('type'))
    ->condition('n.type', 'page')
    ->condition('n.status', 1)
    ->condition('n.title', "Tentang Kami")
    ->range(0, 6)
    ->execute()
    ->fetchAssoc(); // returns an indexed array
    $page = node_load($nids['nid']);
//    foreach ($articles as $page){
//        echo drupal_get_path_alias('node/'.$page->nid);
//    }
//    echo "<pre>".print_r($page, true)."</pre>";
//    echo 1;
    return theme("hmsi_tentangkami_page", array("data" => array("page" => $page)));
}

/**
 * built a home page
 */
function hubungi_kami(){
    // get a page
    $nids = db_select('node', 'n')
    ->fields('n', array('nid'))
    ->fields('n', array('type'))
    ->condition('n.type', 'page')
    ->condition('n.status', 1)
    ->condition('n.title', "Hubungi Kami")
    ->range(0, 6)
    ->execute()
    ->fetchAssoc(); // returns an indexed array
    $page = node_load($nids['nid']);
//    foreach ($articles as $page){
//        echo drupal_get_path_alias('node/'.$page->nid);
//    }
//    echo "<pre>".print_r($page, true)."</pre>";
//    echo 1;
    return theme("hmsi_hubungikami_page", array("data" => array("page" => $page)));
}