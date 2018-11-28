<?php
    $BASE_URL = "https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20weather.forecast%20where%20woeid%20in%20(select%20woeid%20from%20geo.places(1)%20where%20text%3D%22Sahagun%2C%20COL%22)&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";
    $yql_query = 'select * from weather.forecast where woeid in (select woeid from geo.places(1) where text="Sahagun, COL")';
    $yql_query_url = $BASE_URL . "?q=" . urlencode($yql_query) . "&format=json";
    // Make call with cURL
    $session = curl_init($yql_query_url);
    curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
    $json = curl_exec($session);
    $respon = json_decode($json, true);
    echo json_encode($respon);
    // Convert JSON to PHP object
    //$phpObj =  json_decode($json);
    //var_dump($phpObj);
    //echo json_encode($phpObj->{'results'}, JSON_UNESCAPED_UNICODE);
