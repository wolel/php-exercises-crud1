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



//Afficher uniquement le nom et le prénom de tous les clients dont le nom commence par la lettre "M". Les afficher comme---//

function afficher_lettre_X($lettre){
    global $conn;

    $afficher_X = "SELECT * FROM clients WHERE lastName LIKE '$lettre%'";
    $resultat = $conn->query($afficher_X);

    echo "<h2>"."Clients dont la lettre commence par ".' '.$lettre."</h2>";
    while ($info = $resultat->fetch_assoc()){
        echo "<ul><li><b>".$info['lastName'].'</b>'.' '.$info['firstName'].'</li></ul>';
    }

}


//Afficher le titre de tous les spectacles ainsi que l'artiste, la date et l'heure. Trier les titres par ordre alphabétique.
// Afficher les résultat comme ceci : Spectacle par artiste, le date à heure.

function afficher_spectacles($order){

    global $conn;
    $afficher_spec = "SELECT * FROM shows ORDER BY title $order ";
    $resultat = $conn->query($afficher_spec);

    echo "<h2>Spectacles de la semaine</h2>";
    while ($infos =$resultat->fetch_assoc()){
        echo "TITRE : ".'<b>'.$infos['performer'].'</b>'.'.............'.' '.'DATE : '.$infos['date'].'.............. '.' HEURE : '.$infos['startTime'].'<br>';
    }
}



function afficher_coord_clients($card,$objet){
    global $conn;
    $afficher_clients = "SELECT * FROM clients WHERE $card = $objet";
    $resultat = $conn->query($afficher_clients);

    echo "<h2>"."Liste de tout les clients avec carte de fidélité :"."</h2>";

    while ($infos = $resultat->fetch_assoc()){

        if($infos['cardNumber']=== NULL){
            echo '<ul><li><b>'.$infos['lastName'].' </b>'.$infos['firstName'].'.............. '.' Date de naissances : '.'( '.$infos['birthDate'].' )'.'...........'."Carte de fidélité = non ;".'</li></ul>';
        }elseif(1 === $card){
            echo '<ul><li><b>'.$infos['lastName'].' </b>'.$infos['firstName'].'.............. '.' Date de naissances : '.'( '.$infos['birthDate'].' )'.'...........'."Carte de fidélité = <b>OUI &#x1F4F0".' '.' [ nr. '.' '.$infos['cardNumber'].' ]'.'</b></li></ul>';
        }
    }

}
function afficher_client_X(){


}

afficher_coord_clients(1,1);
afficher_spectacles('ASC');
afficher_lettre_X('M');
afficher_X(1);
limit(12);
afficher_liste_clients() ;
afficher_available_show();


