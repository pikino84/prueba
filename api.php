<?php
$ch = curl_init();
                  
curl_setopt($ch, CURLOPT_URL, "https://www.reddit.com/r/subreddit/new.json?sort=new");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//DESABILITA LA VERIFICACION SSL PARA TRABAJAR EN LOCAL HOST
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);
curl_close($ch);
//print_r($response);
$json = json_decode($response);

foreach($json->data->children as $k => $v){
    echo $v->data->title."<br>";
    echo $v->data->author_fullname."<br>";
    echo $v->data->thumbnail."<br>";
    echo $v->data->selftext."<br>";
    echo date('Y-m-d',$v->data->created)."<br>";
    echo "===========================<br>";
}

?>
