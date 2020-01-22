<link rel="stylesheet" href="style.css">
<?php
include ('server.php');


function afficher_liste_clients(){
    global $conn;
    global $dbname;


    $afficher_clients = "SELECT * FROM clients where 1";
    $resultat  = $conn->query($afficher_clients);

    echo "<h2>Liste Clients : </h2>";

    while ($infos = $resultat->fetch_assoc()){
        echo "<ul><li>".'<b>'.$infos['lastName'].'</b> '.$infos['firstName']."</li></ul>";
    }
}
;


function afficher_available_show(){
    global $conn;
    echo "<h2>Titres Spectacles : </h2>";
    $afficher_show = "SELECT * FROM shows WHERE 1";
    $resultat = $conn->query($afficher_show);
    while ($infos = $resultat->fetch_assoc()){
        echo "<ul><li>".$infos['title'].'</div><br>'."</li></ul>";
    }

}

// AFFICHER les x premiers clients----------------------------//

function limit($limit){
   global $conn;

    $afficher_x_clients = "SELECT * FROM clients LIMIT $limit";
    echo "<h2>"."Liste des".' '.$limit." premiers clients :"."</h2>";

    $resultat= $conn->query($afficher_x_clients);
    while ($infos = $resultat->fetch_assoc()){
        echo "<ul><li>".$infos['lastName'].' '.$infos['firstName'].'</li></ul>';
    }

}


// AFFICHER les clients possédant une carte de fidélité----------------------------//

function afficher_X ($objet){
    global $conn;

    $afficher_X = "SELECT * FROM clients WHERE card = $objet";
    $resultat = $conn->query($afficher_X);

    echo "<h2>"."Clients possédant".' '.$objet.' '."carte de fidélité :"."</h2>";

    while ($infos = $resultat->fetch_assoc()){
        echo "<ul><li><b>".$infos['lastName'].'</b> '.$infos['firstName'].' '.'............nr. de carte : '.$infos['cardNumber'].'</li></ul>';
    }

}

afficher_X(1);
limit(12);
afficher_liste_clients() ;
afficher_available_show();


