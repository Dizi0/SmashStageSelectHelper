<style>
    .stage{
        border:4px solid black;
        margin: 5px;
        padding: 0;
    }
</style>

<?php
function downloadUrlToFile($url, $outFileName)
{
    if(is_file($url)) {
        copy($url, $outFileName);
    } else {
        $options = array(
            CURLOPT_FILE    => fopen($outFileName, 'w'),
            CURLOPT_TIMEOUT =>  28800, // set this to 8 hours so we dont timeout on big files
            CURLOPT_URL     => $url
        );

        $ch = curl_init();
        curl_setopt_array($ch, $options);
        curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return $httpcode;
    }
}

$json = file_get_contents('./stagelist.json');
$stages = json_decode($json, true);

$counter = 0;

foreach ($stages as $index => $stage) {
    echo $stage['name'];
    echo "<img class='stage' width='50px' src='".$stage['thumbnail_url']."'>";
    downloadUrlToFile($stage['thumbnail_url'] , $stage['name'] .'.jpg');

//    if ($counter == 11 ){
        echo "<br>";
//        $counter = 0;
//    } else {
//        $counter++;
//    }
}