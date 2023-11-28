<?php
    $url = 'https://nng2finallogicapp.azurewebsites.net:443/api/nng2FinalMessageRequest/triggers/When_a_HTTP_request_is_received/invoke?api-version=2022-05-01&sp=%2Ftriggers%2FWhen_a_HTTP_request_is_received%2Frun&sv=1.0&sig=OpLlgf68M8TmaIG4OYYg8xctIOVyPmC-Y7dwTtuKa74';
    $response = file_get_contents($url);
    $data = json_decode($response);
    foreach ($data as $message) {
        echo "<div class='text'>" . $message->Sender . ": " . $message->Message . "</div>";
    }
?>