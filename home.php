<?php

    $pageTitle="Home"; // in Header.php

    include 'templates/header.php';
    include 'templates/navbar.php';
    include 'api_class.php'; 
?>


        <div class="home">
            <form class="search" method="GET">
                <div class = "search">
                    <input type="text" name="name" id="name" placeholder="Search For a place" class="form-control " required> <!-- Bootstrap -->
                    <input style="margin-top:20px;" type="text" name="near" id="name" placeholder="Enter the city for this place" class="form-control" required> <!-- Bootstrap -->
                    <div>
                    <input type="submit" value="Search" class="button" style="color:#fff;">
                    </div>
                </div>
              </form>
         </div>









<?php

if(!empty($_GET['near']) & !empty($_GET['name'])){
    
    $var = new api();
    $place_url='https://api.foursquare.com/v2/venues/search?client_id=C0QMJGNOL53O4W01IO2BNSSQWZ0BLXPNAF1OAZVZ4LLLRFA4%20&client_secret=BXDI4JGMZ0D5DP415C5M1D1TXLJCNDG5WO5N2S1RT0G0I0Q5%20&ll=40.7,-74%20&near='.urlencode($_GET['near']).'&query='.urlencode($_GET['name']).'%20&v=20201212';
    $array_places = $var->get_api_data($place_url);
    

    
    $data_array = $var->get_api_data("https://www.googleapis.com/customsearch/v1?key=AIzaSyAOKuODuJ9nKDMOJyYAiN7wIIHSaHU0gF8&cx=004906003838209492194:c_8uv_cat9w&q=".urlencode($_GET['name'].' '.$_GET['near'])."&fields=items(link)&searchType=image&num=10");
    
    $weather_url = 'http://api.openweathermap.org/data/2.5/weather?q='.$_GET['near'].'&APPID=989d9b2eae298c39e435b59d2cc0848d';
    $weather_array = $var->get_api_data($weather_url);

echo'
    <div class="home">
    <div class="container">
        <div class="view">
            <div class="row">
    ' ;
                 echo'  <div class=" hov col-12">
                                <div class = "item" style="padding-left:20px;">       
                                    <div class="image">';
                                        echo '<h4 style= "text-align:center; font-weight:bold; padding-top:10px;">Information About '.$_GET['name'].' </h4>';
                                            echo '<b>Branches Of '.$_GET['name'].' in '.$_GET['near'].'</b>  <br><br>';
                                         for($i = 0 ; $i < sizeof($array_places['response']['venues'][0]) ; $i++){
                                             for($j =0 ; $j < sizeof($array_places['response']['venues'][0]['location']['formattedAddress']) ; $j++){
                                                 if(!empty($array_places['response']['venues'][$i]['location']['formattedAddress'][$j])){
                                                    $hena=$array_places['response']['venues'][$i]['location']['formattedAddress'][$j].' ,  ';
                                                    echo '<abbr> '.$hena.'</abbr>
                                                    ';
                                                 }
                                                 else 
                                                     continue;
                                             }
                                            echo '<br>';
                                        }
                                        $h = $weather_array['weather'][0]['icon'];
                                        $image =  "http://openweathermap.org/img/w/".$h.".png";
                                        $temp = (int)($weather_array['main']['temp'] - 273.15).'°C';
                                        $min_temp = (int)($weather_array['main']['temp_min'] - 273.15).'°C';
                                        $max_temp = (int)($weather_array['main']['temp_max'] - 273.15).'°C';
                                        $description = $weather_array['weather'][0]['description'];
                                        echo '<br> <b>Weather At '.$_GET['near'].'</b>  <br>
                                               <div style = "width:80px; height:40px;" >
                                                  <img src='.$image.'>
                                                  <div style="margin-left:20px;">
                                                  <b>'.$temp.'</b>
                                                  </div>
                                                </div>
                                                
                                        ';
                                        echo '<br><br><br>
                                              <b>Min Temp :'.$min_temp.'</b><br>
                                              <b>Max Temp :'.$max_temp.'</b><br>
                                              <b>Description :  '.$description.'</b>
                                              <br><br><br>
                                              </div>
                                              </div>
                                              </div>
                                              
                                              ';
                    
            for($i=0 ; $i < 10 ; $i++){
                if(!empty($data_array['items'][$i]['link'])){
                    echo'<div class=" hov col-4">
                            <div class = "item" >          
                                 <div class="image">';
                                        echo  '<img src='.$data_array['items'][$i]['link'].'>';
                                    
                                    echo ' </div>
                                           </div>
                                           </div>';
                            
                    }
                    else 
                        continue;
                }
                 echo ' </div>
                        </div>
                        </div>
                        </div> ';
}

?>

<?php include 'templates/footer.php'?>


<?php 

    echo '<form method = "POST" class="twitter" >
         <textarea class="form-control " name="tweet" placeholder = "  Twitter Tweet"  style= "width:50%; height:170px; margin-left:20px;"></textarea>
         <div>
         <input type="submit" value="Post In Twitter" class="button tweet">
         </div>
         </form>
         ';
    
    
$consumer="FPi2NDvj6gyOX4wQht4KgxRhd";
$secret="USFAQ5h8kTnax5AdS6oA7JCvfJvTKzrVeppa51STj3K8eO2tnm";
$accesstoken="1098634432154611712-lnCImR0e6Z6E2XlRF6vCD0aHB0KhXM";
$asecret="oCyIwr8rVDMFaOusSxSTSlywMqByTQauN6HjwX8m1GYXO";
//library include
require "twitteroauth-master/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

$connection= new TwitterOAuth($consumer,$secret,$accesstoken,$asecret);
$content= $connection->get("account/verify_credentials");

if(!empty($_POST['tweet'])){
    $status=$connection->get("statuses/home_timeline",["count"=>3,"exclude_replies"=>true]);
    $new_status= $connection->post("statuses/update",["status"=>$_POST['tweet']]);
    }


 $connection->post("statuses/destroy",["id"=>'1099099103450054656']);

?>




