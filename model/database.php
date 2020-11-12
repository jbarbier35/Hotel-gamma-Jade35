<?php
require_once __DIR__ . '/../config/parameters.php';

// Connexion à la base de données
$connection = new PDO("mysql:dbname=" . DB_NAME . ";host=" . DB_HOST, DB_USER, DB_PASS, [
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8', lc_time_names = 'fr_FR'",
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
]);

// FONCTIONS GENERIQUES

// TODO: Ajouter un paramètres pour gérer le tri (ORDER BY)
/**
 * Retourne l'ensemble des lignes dans une table
 * @param string $table Le nom de la table
 * @return array Les lignes de la table
 */
function getAllRows(string $table, array $where = []): array {
    global $connection;

    $query = "SELECT * FROM $table WHERE 1 = 1";

    foreach ($where as $column => $value) {
        $query = $query . " AND $column = :$column";
    }

    $stmt = $connection->prepare($query);
    foreach ($where as $column => $value) {
        $stmt->bindValue(":$column", $value);
    }
    $stmt->execute();

    return $stmt->fetchAll();
}

// FONCTIONS SPECIFIQUES

function getAllRooms(): array {
    global $connection;

    $query = "
        SELECT
            room.*,
            CONCAT(type.name, ' ', category.name) AS name,
            type.name AS type_name,
            category.name AS category_name
        FROM room
        INNER JOIN type ON type.id = room.type_id
        INNER JOIN category ON category.id = room.category_id;
    ";

    $stmt = $connection->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll();
}

function getOneRoom(int $id): array {
    global $connection;

    $query = "
        SELECT
            room.*,
            CONCAT(type.name, ' ', category.name) AS name,
            type.name AS type_name,
            category.name AS category_name
        FROM room
        INNER JOIN type ON type.id = room.type_id
        INNER JOIN category ON category.id = room.category_id
        WHERE room.id = :id;
    ";

    $stmt = $connection->prepare($query);
    $stmt->bindValue(":id", $id);
    $stmt->execute();

    return $stmt->fetch();
}

function getAllPhotosByRoom(int $id): array {
    global $connection;

    $query = "SELECT * FROM photo WHERE room_id = :id";

    $stmt = $connection->prepare($query);
    $stmt->bindValue(":id", $id);
    $stmt->execute();

    return $stmt->fetchAll();
}
