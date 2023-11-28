<style><?php include 'CSS.css';?></style>
<?php

if(isset($_COOKIE['nameChanged']) and $_COOKIE['nameChanged']==1) {
    echo '<script>alert("Name Changed!")</script>';
    setcookie('nameChanged','', time()-1);
}

$name = "";
if(isset($_COOKIE['name'])) {
    $name = $_COOKIE['name'];
}

function getMessages() {
    $url = 'https://nng2finallogicapp.azurewebsites.net:443/api/nng2FinalMessageRequest/triggers/When_a_HTTP_request_is_received/invoke?api-version=2022-05-01&sp=%2Ftriggers%2FWhen_a_HTTP_request_is_received%2Frun&sv=1.0&sig=OpLlgf68M8TmaIG4OYYg8xctIOVyPmC-Y7dwTtuKa74';
    $response = file_get_contents($url);
    $data = json_decode($response);
    foreach ($data as $message) {
        echo "<div class='text'>" . $message->Sender . ": " . $message->Message . "</div>";
    }
}

    echo "
        <html>
        <h1>Messenger</h1>
        <hr>
        <form class='namediv' action='/setName.php'>
            <h3>Name:</h3>
            <input class='messagebox' type='text' id='name' name='name' value=" . $name . "><br><br>
            <input class='send' type='submit' value='Set'>
        </form>
        <hr>
        <div class='messages'>
    ";
    getMessages();
    echo "</div><hr>
    <form class='refresh' action='/refresh.php'>
        <input class='refresh' type='submit' value='Refresh'>
    </form>
    <hr>
    <form class='messagediv' action='/sendMessage.php'>
        <h3>Message:</h3>
        <input class='messagebox' type='text' id='text' name='text'>
        <input class='send' type='submit' value='Send'>
        <input type='hidden' name='name' id='name' value=" . $name . ">
    </form>
    
    </html>";
?>