
<?php

if(!empty($_GET['google'])){
$search_url = "https://www.googleapis.com/customsearch/v1?key=AIzaSyAOKuODuJ9nKDMOJyYAiN7wIIHSaHU0gF8&cx=004906003838209492194:c_8uv_cat9w&q=".$_GET['google']."&fields=items(link)&searchType=image&num=10";

   $search_json = file_get_contents($search_url);
   $search_array = json_decode($search_json , true);

    for($i=0 ; $i < sizeof($search_array['items']) ; $i++){
        echo '<img src='.$search_array['items'][$i]['link'].'>';
    }
}

?>




<!DOCTYPE html>

<html>

<body>
    <form>   
    
        <input type = "text" name = "temp"/>
        <input type = "text" name = "google"/>
        <button type = "submit">submit</button>
    
    </form>
</body>
    
    
</html>