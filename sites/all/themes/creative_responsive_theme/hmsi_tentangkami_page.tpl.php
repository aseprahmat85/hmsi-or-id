<style>
    .tentang-kami-title {
        font-family: "ff-din-web-condensed",Helvetica, sans-serif;
        font-size: 20px;
        font-style: italic;
        color: #d16067;
        width: 100%;
        padding: 10px 0px 10px 10px;
        /* border-bottom: solid 1px; */
        margin-bottom: 10px;
        /* box-shadow: 0px 0px 20px -8px; */
        text-align: center;
    }
    
    .tentang-kami-body {
        font-family: "ff-din-web-condensed",Helvetica, sans-serif;
        font-size: 15px;
        padding: 15px 0px 25px 0px;
    }
    
    .tentang-kami-body b {
        font-weight: bolder;
    }
    .tentang-kami-body i {
        font-style: italic;
    }
    
    .visi, .misi {
        text-align: center;
        font-family: monospace;
        margin: 15px;
        font-size: larger;
        font-style: italic;
    }
    
    .misi {
        text-align: justify;
    }
    .divclear {
        clear: both;
    }
    
    .divseparator {
        border-bottom: 1px solid #b1bdb5;
    }
</style>
<?php
//echo "<pre>".print_r($data, true)."</pre>";
echo $data['page']->body['und'][0]['value'];
