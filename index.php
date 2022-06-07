<?php

$json = file_get_contents('./stagelist.json');
$stages = json_decode($json, true);
foreach ($stages as $index => $stage) {
    echo $stage['name'];
    echo '<br>';
    echo "<img width='200px' src='".$stage['thumbnail_url']."'>";
    echo '<hr>';
}