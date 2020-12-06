<?php

/**
 * Permet de débugger une variable
 * @param mixed $var La variable à débugger
 * @param bool $stop Permet d'activer / désactiver le die
 */
function debug($var, bool $stop = true) {
    echo "<pre>";
    print_r($var);
    echo "</pre>";
    if ($stop) {
        die;
    }
}

function get_header() {
    require_once "layout/header.php";
}

function get_footer() {
    require_once "layout/footer.php";
}

/*Pour le Crud Logement*/

function readLogement($id) {
    /*$con = getAllRooms;();
    $requete = "SELECT * FROM room where id = '$id";
    $stmt = $con->query($requete);
    $rows = $stmt->fetchAll();*/
}

function createLogement($beds, $persons, $size, $price, $photo) {
    
}

function udapteLogement($id, $beds, $persons, $size, $price, $photo) {
    
}


function deleteLogement($id) {
    
}