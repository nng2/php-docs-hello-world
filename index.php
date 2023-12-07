<style><?php include 'CSS.css';?></style>
<?php
$page = $_SERVER['PHP_SELF'];
$sec = "10";

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
        <h1>Messenger 2</h1>
        <hr>
        <div class='namediv'>
            <h3>Name:</h3>
            <input class='namebox' form='messageform' type='text' id='name' name='name' value=" . $name . "><br><br>
        </div>
        <hr>
        <div class='messages'>
    ";
    //getMessages();
    echo '
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
    <script type="text/javascript">
        function messages() { 
            $("#Status").load("messages.php");
            setTimeout(messages, 5000);
        } 
        setTimeout(messages, 0);
    </script>
    <body>
    <div id="Status"></div>
    </body>';
    echo "</div><hr>
    <form id='messageform' class='messagediv' action='/sendMessage.php'>
        <h3>Message:</h3>
        <input class='messagebox' type='text' id='text' name='text'>
        <input class='send' type='submit' value='Send'>
    </form>
    </html>";
?>