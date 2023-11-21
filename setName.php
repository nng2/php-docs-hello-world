<?php
setcookie('name', $_GET["name"]);
setcookie('nameChanged', 1);
header("Location: index.php");
?>