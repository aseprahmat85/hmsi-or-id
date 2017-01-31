<style>
    .article-title {
        font-family: "ff-din-web-condensed",Helvetica, sans-serif;
        font-size: 1.5em;
        font-style: italic;
        color: #d16067;
        width: 100%;
        padding: 10px 0px 10px 10px;
        /* border-bottom: solid 1px; */
        margin-bottom: 10px;
        /* box-shadow: 0px 0px 20px -8px; */
        text-align: center;
    }
    .article-author {
        font-size: 0.9em;
        font-style: italic;
        padding: 2px;
        color: #487148;
        background-color: rgba(255, 172, 94, 0.18);
        /* width: 500px; */
        -webkit-border-radius: 10px;
    }
    .article-body {
        font-family: "ff-din-web-condensed",Helvetica, sans-serif;
        font-size: 15px;
        padding: 15px 0px 25px 0px;
    }
    
    .article-body b {
        font-weight: bolder;
    }
    .article-body i {
        font-style: italic;
    }
    .divclear {
        clear: both;
    }
    .nav_article {
        font-size: 15px;
    }
    .nav_article img{
        opacity: 0.3;
    }
    
    .nav_article img:hover{
        opacity: 1.0;
    }
    
    .prev_article a {
        float: left;
        width: 200px;
        background-color: #ffac5e;
        height: 50px;
        padding: 10px 0px 40px 10px;
        height: 50px;
    }
    .prev_article a:hover {
        background-color: #fff45e;
    }
    .prev_article img {
        float: left;
    }
    .next_article a{
        float: right;
        width: 200px;
        text-align: right;
        background-color: #ffac5e;
        padding: 10px 10px 40px 0px;
        height: 50px;
    }
    .next_article a:hover {
        background-color: #fff45e;
    }
    .next_article img {
        float: right;
    }
    
    .article-comment {
        font-family: "ff-din-web-condensed",Helvetica, sans-serif;
        font-size: 15px;
        padding: 50px 0px 0px 0px;
    }
    .comment-container {
        padding: 25px 10px 10px 10px;
    }
    .comment-author {
        font-weight: bold;
        float: left;
        clear: both;
        width: 150px;
        border-right: dashed 1px #b7b3b3;
        height: 25px;
        margin-right: 10px;
        height: 100%
    }
    
    .comment-subject {
        font-weight: bold;
        font-size: 15px;
    }
    
    .comment-body {
        font-weight: normal;
        font-style: italic;
    }
    
    .time{
        font-weight: normal;
    font-size: 11px;
    color: #b9b3b3;
    font-style: italic;
    }
    
    .article-addcomment {
        font-size: 14px;
        padding: 10px 0px 10px 0px;
    }
    
    .addcomment-title {
        font-weight: bolder;
        font-size: 15px;
        width: 100%;
        border-bottom: 1px solid #b8b3b3;
        margin-bottom: 20px;
    }
</style>
<?php

global $base_url, $user;
echo'
<div class="article-content">
    <div class="article-title">'.$data['article']->title.'</div>
    <div class="article-banner"><img src="'.image_style_url("article_banner_view", $data['article']->field_image['und'][0]['uri']).'"></div>
    <div class="article-share-social">
        <div class="fb-share-button" data-href="'.$base_url.  '/artikel/' . $data['article']->nid .'" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Share</a></div>
    </div>    
    <div class="article-body">
        <div class="article-author">Disunting oleh '.$data['article']->name.' pada '.date("d M Y", $data['article']->created).'</div>
        <div class="divclear"></div>
        '.$data['article']->body['und'][0]['value'].'
    </div>
</div>
<div class="divclear"></div>
<div class="nav_article">
    '.( ( isset($data['prev_article']->nid)) ? '<div class="prev_article"><img src="'.image_style_url("seratus", $data['prev_article']->field_image['und'][0]['uri']).'">'.l('Sebelumnya : '.$data['prev_article']->title, "artikel/".$data['prev_article']->nid).'</div>' : '' ) . '
    '.( ( isset($data['next_article']->nid)) ? '<div class="next_article"><img src="'.image_style_url("seratus", $data['next_article']->field_image['und'][0]['uri']).'">'.l('Berikutnya : ' . $data['next_article']->title, "artikel/".$data['next_article']->nid).'</div>' : '' ) . '
</div>
<div class="divclear"></div>';

// load comment
$query =   db_select('comment', 'c');
$query->join("field_data_comment_body", 'cb', 'c.cid=cb.entity_id');
$result = $query->fields('c', array('name','subject', 'created'))
            ->fields('cb', array('comment_body_value'))
            ->condition('c.nid', $data['article']->nid)
            ->condition('c.status', 1)
            ->execute()
            ->fetchAll();
if(!empty($result)){
    echo "<div class='article-comment'>"
    . "<fieldset><legend>Komentar</legend>";
    foreach($result as $comment) {
       echo ""
        . "<div class='comment-container'>"
               . "<div class='comment-author'>".$comment->name."<br><span class='time'>".date("d M Y H:i:s", $comment->created)."</span></div><div class='comment-subject'>".$comment->subject."<br><span class='comment-body'>".$comment->comment_body_value."</span></div>"
        . "</div>";
    }
    echo "</fieldset></div>";
}
if(!empty($user->uid)){
echo "<div class='article-addcomment'><div class='addcomment-title'>Beri Komentar</div>" 
    .   drupal_render(drupal_get_form('hmsi_home_comment_form', array('redirect' => 'artikel/'.$data['article']->nid, 'nid' => $data['article']->nid)))
    . "</div>";
}
echo '<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=1412764782276073";
  fjs.parentNode.insertBefore(js, fjs);
}(document, \'script\', \'facebook-jssdk\'));</script>';