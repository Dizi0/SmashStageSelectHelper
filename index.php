<?php

$json = file_get_contents('./stagelist.json');
$stages = json_decode($json, true);

//var_dump($stages);
foreach ($stages as $stage) {
    echo "<img width='200px' src='".$stage['thumbnail_url']."'>";
    echo '<br>';
    echo $stage['name'] . '<hr>';
}
