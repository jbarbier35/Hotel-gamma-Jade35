<?php
require_once "functions.php";
require_once "model/database.php";

$id = $_GET["id"];
$room = getOneRoom($id);
$photos = getAllPhotosByRoom($id);
// debug($room);

get_header();
?>

<section class="page-header room-header container">
    <img src="uploads/<?= $room["photo"]; ?>" class="img-responsive" alt="Gamma Hotel">
</section>

<section class="container room-content">
    <article class="room-description">
        <div class="room-description-images">
            <img src="uploads/<?= $room["photo"]; ?>" class="img-responsive" alt="<?= $room["name"]; ?>">
            <?php foreach ($photos as $photo) : ?>
                <img src="uploads/<?= $photo["filename"]; ?>" class="img-responsive" alt="<?= $photo["alt"]; ?>">
            <?php endforeach; ?>
        </div>
        <div class="room-description-content">
            <h1><?= $room["name"]; ?></h1>
            <ul class="room-features">
                <li><i class="fa fa-bed"></i> <?= $room["beds"]; ?></li>
                <li><i class="fa fa-user"></i> <?= $room["persons"]; ?></li>
                <li><i class="fa fa-expand"></i> <?= $room["size"]; ?>m<sup>2</sup></li>
                <li><i class="fa fa-euro"></i> <?= $room["price"]; ?></li>
            </ul>
            <p><?= $room["description"]; ?> 
            <?php
$array = array( 'Description ' => array(  ),
                 );

foreach( $array as $key => $value )
{
  echo $key . ': <br />';
 
  foreach( $value as $valeur )
    echo '  ' . $valeur . '<br />';
   
  echo '<br />';
}
?>

Ce logement de type chambre pour 2 personnes dispose de 1 lit et d'une surface totale de 40m2. Son prix est de 90€ par nuit
            
        </div>
    </article>
</section>

<?php get_footer(); ?>