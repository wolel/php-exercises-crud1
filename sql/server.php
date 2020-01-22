<!--<div id="glyph"> Connection OK &#9829</div>-->
<link rel="stylesheet" href="style.css">

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "colyseum";

//créer la connection-------------------------------------------
$conn  = new mysqli($servername, $username, $password);



//verifier qu'il n'y a pas d'erreur de connection----------------
if($conn->connect_error){
die("connection failed".$conn->connect_error);

}else{
    echo '<div id="glyph"> Connection OK &#9829</div>';
    $conn->select_db($dbname);
}
echo $conn->error;
echo "<br><br>";
