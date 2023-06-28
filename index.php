<?php
$string = file("dictionnaire.txt", FILE_IGNORE_NEW_LINES);
$count = 0;
foreach($string as $str){
    $count++;
}
echo "il y a $count mots";
echo "<br />";
$count = 0;
foreach($string as $str){
    if(strlen($str)==15){
        $count++;
    }
}
    echo "il y a $count de mots qui contiennent 15 lettre";
    echo "<br />";
    
    $count = 0;
    foreach($string as $str){
        if(str_contains($str, 'w')){
            $count++;
        }
       
}
echo "il y a $count mot avec la lettre w";
echo "<br />";
$count = 0;
foreach($string as $str){
    if(str_ends_with($str, 'q')){
        $count++;
    }
   
}
echo "il y a $count mot avec la lettre q";
echo "<br />";
echo "<br />";
$string = file_get_contents("films.json", FILE_USE_INCLUDE_PATH);
$brut = json_decode($string, true);
$top = $brut["feed"]["entry"];

$count = 0;
foreach($top as $myTop){
    if($count < 10){
        $count++;
       echo $count." ".$myTop["im:name"]["label"]."</br>";
    }
}
echo "<br />";
echo "<br />";

$count = 1;
foreach($top as $myTop ){
    $index;
    if(str_contains($myTop["im:name"]["label"], 'Gravity')){
        $index = $count;
        echo $count." ".$myTop["im:name"]["label"]."</br>";
    }
    $count++;
}
echo "<br />";
echo "<br />";

$count = 1;
foreach($top as $myTop ){
    $index;
    if(str_contains($myTop["im:name"]["label"], 'LEGO Movie')){
        $index = $count;
        echo $count." ".$myTop["title"]["label"]."</br>";
    }
    $count++;
}
echo "<br />";
echo "<br />";
$count = 0;
foreach($top as $myTop ){
    $myDate = explode('-', $myTop["im:releaseDate"]["label"]);
    if($myDate[0] < 2000){
        $count++;
        echo $count." - ".$myTop["im:name"]["label"]."réalisé avant 2000</br>";
    }
}
echo "<br />";
echo "<br />";

$annee = strtotime($top[0]["im:releaseDate"]["attributes"]["label"]);
$array = [$top[0]["im:name"]["label"], $annee];
$array2 = [$top[0]["im:name"]["label"], $annee];

foreach($top as $myTop ){
    $myDate = strtotime($myTop["im:releaseDate"]["attributes"]["label"]);
    
    if($myDate < $annee){
    $array[1] = $myDate;
    $array[0] = $myTop["im:name"]["label"];
    }
    if($myDate > $annee){
        $array2[1] = $myDate;
        $array2[0] = $myTop["im:name"]["label"];
        }

}
echo $array[0]."<br />";
echo $array2[0];

echo "<br />";
echo "<br />";

foreach($top as $myTop){
    $tab[] = $myTop["category"]["attributes"]["label"]."<br />";
}
$cat = array_count_values($tab);

?>