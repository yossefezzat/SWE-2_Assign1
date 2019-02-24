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
    $new_status= $connection->post("statuses/update",["status"=>$_POST['tweet']]);
    }


 $connection->post("statuses/destroy",["id"=>'1099099103450054656']);
    $status=$connection->get("statuses/home_timeline",["count"=>3,"exclude_replies"=>true]);


?>