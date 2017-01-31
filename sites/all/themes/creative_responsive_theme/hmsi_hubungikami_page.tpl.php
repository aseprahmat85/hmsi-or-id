<style>
    .hub-kami-title {
        font-family: "ff-din-web-condensed",Helvetica, sans-serif;
        font-weight: bolder;
        font-style: italic;
        font-size: 15px;
        border-bottom: solid 1px #e2e2e2;
        margin-bottom: 5px;
    }
    .divclear {
        clear: both;
    }
</style>
<?php
//echo "<pre>".print_r($data, true)."</pre>";
if(!empty($data['page']->body['und'][0]['value'])){
    echo $data['page']->body['und'][0]['value'];
}else{
//    drupal_not_found();
    drupal_exit();
}
