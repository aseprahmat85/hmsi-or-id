<style>
    
    .home-content {
        
    }
    .section {
        
    }
    .title {
        font-family: "ff-din-web-condensed",Helvetica, sans-serif;
        font-size: 2.5em;
        font-style: italic;
        color: #d16067;
        width: 100%;
        padding: 10px 0px 10px 10px;
        /* border-bottom: solid 1px; */
        margin-bottom: 10px;
        /*box-shadow: 0px 0px 20px -8px;*/
        text-align: center;
    }
    .article-box {
        width: 30%;
        /*border: 1px solid;*/
        float: left;
        margin: 10px 10px 20px 10px;
        padding: 0px;
    }
    .article-box:hover {
        outline: none;
        border-color: #f8a863;
        -webkit-border-radius: 8px;
        box-shadow: 0 0 10px #f8a863;
    }
    .article-box-banner {
        -webkit-border-radius: 8px 8px 0px 0px;
        margin-bottom: -5px;
        overflow: hidden;
    }
    
    .article-attribute {
        background-color: #f8a863;
        height: 50px;
        padding: 3px 10px 0px 10px;
        -webkit-border-radius: 0px 0px 8px 8px;
    }
    .article-box-title a {
        font-weight: bolder;
        height: 25px;
        font-size: 14px;
        color: #fefefe;
    }
    .article-box-title a:hover{
        cursor: pointer;
        color: #d16067;
    }
    .divclear {
        clear: both;
    }
    .article-box-date {
        float: left;
    }
    .article-box-commentcount {
        float: right;
    }
    .see-all {
        font-size: 15px;
        font-weight: bolder;
        font-style: italic;
        padding: 5px 10px 5px 10px;
        float: right;
        margin-bottom: 20px
    }
</style>
<div class="home-content">
    <?php
    
    // show an articles
    if(isset($data['articles']) && !empty($data['articles'])){
        ?>
    <div class="home-content section title">ARTIKEL</div>
    <?php
        $article_count = 0;
        foreach ($data['articles'] as $article){
            if(isset($article->field_image['und'][0]['fid'])){
                $image_div = "     <div class='article-box-banner'><img src='".image_style_url("artikelbanner", $article->field_image['und'][0]['uri'])."'></div>";
            }else{
                $image_div = "";
            }
            echo""
            . "<div class='article-box'>"
            . $image_div
            . "     <div class='article-attribute'>"
            . "         <div class='article-box-title'>". l(trim_text($article->title), "artikel/".$article->nid) ."</div><div class='divclear'></div>"
            . "         <div class='article-box-date'>".date("d / m / Y", $article->created)."</div><div class='article-box-commentcount'>". $article->comment_count ." comment". (($article->comment_count >= 2) ? 's' : '') ."</div>"
            . "     </div>"
            . "</div>";
            $article_count++;
            if($article_count == 3){
                echo "<div class='divclear'></div>";
            }
        }
        echo '<div class="divclear"></div>
        <div class="see-all">'.l('Lihat Semua Artikel >>', 'semua-artikel').'</div>
        <div class="divclear"></div>';
    }
    
    
    // show an image galeries
    if(isset($data['image_galeries']) && !empty($data['image_galeries'])){
        ?>
    <div class="home-content section title">GALERI</div>
    <?php
        $galery_count = 0;
        foreach ($data['image_galeries'] as $galery){
            if(isset($galery->field_galery_images['und'][0]['fid'])){
                $image_div = "     <div class='article-box-banner'><img src='".image_style_url("artikelbanner", $galery->field_galery_images['und'][0]['uri'])."'></div>";
                $galery_type = 'foto';
            }elseif($galery->type == 'youtube_galery' && isset($galery->field_youtube_url['und'][0]['video_id'])){
                $youtube_id = $galery->field_youtube_url['und'][0]['video_id'];
                $image_div = "     <div class='article-box-banner'><img src='https://img.youtube.com/vi/".$youtube_id."/sddefault.jpg'></div>";
                $galery_type = 'video';
            }else{
                $image_div = "";
                $galery_type = 'und';
            }
            echo""
            . "<div class='article-box'>"
            . " <div class='article-box-tipe-$galery_type'></div>"
            . $image_div
            . "     <div class='article-attribute'>"
            . "         <div class='article-box-title'><a target='_BLANK' href='". drupal_get_path_alias('node/'.$galery->nid) ."'>".trim_text($galery->title)."</a></div><div class='divclear'></div>"
            . "         <div class='article-box-date'>".date("d / m / Y", $galery->created)."</div><div class='article-box-commentcount'>". $galery->field_location['und'][0]['value'] ."</div>"
            . "     </div>"
            . "</div>";
            $galery_count++;
            if($galery_count == 3){
                echo "<div class='divclear'></div>";
            }
        }
        echo '<div class="divclear"></div>
        <div class="see-all">'.l('Lihat Semua Galeri >>', 'semua-galeri').'</div>
        <div class="divclear"></div>';
    }
    ?>
    
</div>
<div class="divclear"></div>
<?php

//echo "<pre>".print_r($data['image_galeries'], true)."</pre>";

