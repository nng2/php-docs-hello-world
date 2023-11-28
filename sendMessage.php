<?php
if ($_GET['name']=="" or $_GET['text']=="") header("Location: index.php");

$url = "https://nng2finallogicapp.azurewebsites.net:443/api/nng2FinalLogicAppWorkflow/triggers/When_a_HTTP_request_is_received/invoke?api-version=2022-05-01&sp=%2Ftriggers%2FWhen_a_HTTP_request_is_received%2Frun&sv=1.0&sig=YmcKegqVevT7Bfe8MQtYx6sLLeN5Duvcf74WZUGCQzo";
$data = ['Sender' => $_GET['name'], 'Message' => $_GET['text']];
  
$content = json_encode($data);

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER,
        array("Content-type: application/json"));
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

$json_response = curl_exec($curl);
curl_close($curl);

header("Location: index.php");
?>