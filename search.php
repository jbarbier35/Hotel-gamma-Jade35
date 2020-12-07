<?php 
require_once "functions.php";
require_once "model/database.php";

$rooms = getAllRooms();
$types = getAllRows("type");

$q=$_get['q'];
$s=explode(" ",$q);
$sql="SELECT * FROM types  ";
$i=0;
foreach($s as $mot) {
    if($i==0){
$sql.=" WHERE ";}

 else{
    $sql.=" AND ";}
 }

$sql.="contenu LIKE'%$mot%'";
$i++;
?>