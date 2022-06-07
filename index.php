<style>
    .stage{
        border:4px solid black;
        margin: 5px;
        padding: 0;
    }
</style>

<?php

$json = file_get_contents('./stagelist.json');
$stages = json_decode($json, true);

$counter = 0;

foreach ($stages as $index => $stage) {
    echo $stage['name'];
    echo "<img class='stage' width='50px' src='".$stage['thumbnail_url']."'>";

//    if ($counter == 11 ){
        echo "<br>";
//        $counter = 0;
//    } else {
//        $counter++;
//    }
}
