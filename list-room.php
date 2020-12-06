<?php
require_once "functions.php";
require_once "model/database.php";

$rooms = getAllRooms();
$types = getAllRows("type");
// debug($rooms);
get_header();
?>

<section class="container home-content">
    

    <!-- TODO: Faire fonctionner le formulaire de recherche -->
    <div>
    <h2>Nos logements</h2>
    <h2>Création</h2>
    </div>
    
    <div class="grid grid-rooms">

        <!-- TODO: Afficher dynamiquement la liste des chambres -->
        <?php foreach($rooms as $room): ?>
            <article>
                <header>
                    <img src="uploads/<?= $room["photo"]; ?>" class="img-responsive" alt="<?= $room["name"]; ?>">
                </header>
                <footer>
                    <h3><?= $room["name"]; ?></h3>
                    <ul class="room-features">
                        <li><i class="fa fa-bed"></i> <?= $room["beds"]; ?></li>
                        <li><i class="fa fa-user"></i> <?= $room["persons"]; ?></li>
                        <li><i class="fa fa-expand"></i> <?= $room["size"]; ?>m<sup>2</sup></li>
                        <li><i class="fa fa-euro"></i> <?= $room["price"]; ?></li>
                    </ul>
                    <a href="room.php?id=<?= $room["id"]; ?>" class="button button-primary" style="display: inline-block">
                        <i class="fa fa-eye"></i>
                        Voir plus
                    </a>
                    <a href="room.php?id=<?= $room["id"]; ?>" class="button button-primary" style="display: inline-block">
                        <i class="fa fa-edit"></i>
                        Edit
                    </a>
                    <a href="room.php?id=<?= $room["id"]; ?>" class="button button-primary" style="display: inline-block">
                        <i class="fas fa-trash-alt"></i>
                        Delete
                    </a>
                </footer>
            </article>
        <?php endforeach; ?>

    </div>
</section>