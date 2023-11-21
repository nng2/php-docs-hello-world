<?php
    $url = 'https://example.com/api';
    $response = file_get_contents($url);
    echo "<h1>Messenger<h1>"
    echo "<hr>"
    echo $response;
?>