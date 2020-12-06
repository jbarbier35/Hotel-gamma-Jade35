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
    $connection = getAllRooms();
    $query = "SELECT * FROM room where id = '$id";
    $stmt = $con->query($requete);
    $rows = $stmt->fetchAll();
    if (!empty($rows)){
        return $rows[0];
    }
}

function createLogement($beds, $persons, $size, $price, $photo) {
    try {
        $connection = getAllRooms();
        $sql = "INSERT INTO room (beds, persons, size, price, photo) 
                VALUES ('$beds', '$persons', '$size' ,'$price, $photo')";
        $connection->exec($sql);
    }
    catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}
    

function udapteLogement($id, $beds, $persons, $size, $price, $photo) {
    try {
        $connection = getAllRooms();
        $query = "UPDATE room set 
                    lits = '$beds',
                    personnes = '$persons',
                    surface = '$size',
                    photo = '$photo',
                    prix = '$price' 
                    where id = '$id' ";
        $stmt = $connection->query($query);
    }
    catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}
  
    

function deleteLogement($id) {
    try {
        $connection = getAllRooms();
        $query = "DELETE from room where id = '$id' ";
        $stmt = $con->query($requete);
    }
    catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    
}

function getNewRoom() {
    $room['id'] = "";
    $room['beds'] = "";
    $room['persons'] = "";
    $room['size'] = "";
    $room['price'] = "";
    $room['photo'] = "";
    
}