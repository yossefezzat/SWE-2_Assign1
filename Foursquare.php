<?php
    if(!empty($_GET['near'])&!empty($_GET['name']))
    $maps_url='https://api.foursquare.com/v2/venues/search?client_id=C0QMJGNOL53O4W01IO2BNSSQWZ0BLXPNAF1OAZVZ4LLLRFA4%20&client_secret=BXDI4JGMZ0D5DP415C5M1D1TXLJCNDG5WO5N2S1RT0G0I0Q5%20&ll=40.7,-74%20&near='.urlencode($_GET['near']).'&query='.urlencode($_GET['name']).'%20&v=20201212';
$maps_json=file_get_contents($maps_url);
    $array=json_decode($maps_json,true);
$lat=$array['response']['venues'][0]['location']['lat'];
$lng=$array['response']['venues'][0]['location']['lat'];
?>